<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\objective;
use App\project;
use Illuminate\Support\Facades\Validator;
use App\user;
use App\task;
use App\task_respon;
use App\branch;
use Auth;
use App\task_paper;
use DB;
use Response;
use Carbon\Carbon;
use App\note;



class userTaskController extends Controller
{
    public function addTask(Request $request , $id) {

    	// validate Input
       
         try
         {
            for ($i=1 ; $i <= $request->count ; $i++) { 
               
            $project = project::find($id);
            $task = new task ; $request->input('name'.$i);
            $task->description = $request->input('taskInput'.$i);
            $task->dueDate = $request->input('date'.$i);
            $task->urgency = $request->input('urgency'.$i);
              $task->quantity = $request->input('quantity'.$i);
            $project->tasks()->save($task);

            $res = new task_respon ;
            $res->user_id = Auth::user()->id;
            $task->tasks()->save($res);
            }
            // select project
            // echo ($id);

         } 
         catch (\Exception $e) 
         {
                return redirect()->back()->with('fail', 'all fields rquierd');
         }

         return redirect()->back()->with('success', 'Branch is Added');

    	

    }
    public function status (Request $request) {
        echo $request->status;
        // validate Input
           //  $Validator=  Validator::make($request->all(),[    

           //     'status' =>'required',
               

           //  ])->validate();

       
         if ($request->status == 'transfer') {
            $Validator=  Validator::make($request->all(),[    

                'alternative' =>'required',    

            ])->validate();
         }

         // try
         // {
            // select project
            $task = task::find($request->id);
           
            $file = $request->file('file');
             if($file) {
                          // generate a new filename. getClientOriginalExtension() for the file extension
             $filename = $request->id .'-' . time() . '.' . $file->getClientOriginalExtension();
                          // save to storage/app/photos as the new $filename
                         // $path = $file->storeAs('files', $filename);
                         // $path = $file->store('toPath', ['disk' => 'public']);
            $destination = public_path('/task_paper');
            $file->move($destination , $filename );

            $paper = new task_paper;
            $paper->destination = $filename;
            $task->task_papers()->save($paper);
            }
            // late
            if($request->status == 'late') {

                  DB::table('tasks')
                 ->where('id', $request->id)  // find your user by their email
                 ->limit(1)  // optional - to ensure only one record is updated.
                 ->update(
                    array
                    (
                        'status'    => $request->status,
                         'lateDate' => $request->lateDate,
                        'statusDate' => Carbon::now()->toDateTimeString(),
                    )
                    );  // update the record in the DB.

             // transfer

            }else if ($request->status == 'transfer') {

                 DB::table('tasks')
                 ->where('id', $request->id)  // find your user by their email
                 ->limit(1)  // optional - to ensure only one record is updated.
                 ->update(
                    array
                    (
                        'status'    => $request->status,
                         'alternative' => $request->alternative,
                         'statusDate' => Carbon::now()->toDateTimeString(),
                         'from' =>Auth::user()->id,
                    )
                    );  // update the record in the DB. 

            }else {


            //else
            DB::table('tasks')
                 ->where('id', $request->id)  // find your user by their email
                 ->limit(1)  // optional - to ensure only one record is updated.
                 ->update(array(
                 'status' =>$request->status,
                 'statusDate' => Carbon::now()->toDateTimeString(),

                 ));  // update the record in the DB. 
            }
            
            //update quntity
             //else
             if ($task->quantity >= $request->quantity && $request->status == "")
               {
                 if($task->quantity == $request->quantity)
                     { DB::table('tasks')
                       ->where('id', $request->id)  // find your user by their email
                       ->limit(1)  // optional - to ensure only one record is updated.
                       ->update(array(
                        'doneQuantity' =>$request->quantity,
                        'status' =>"done",
                      
                      
                       ));  // update the record in the DB. 
                      }
                   else {
                       DB::table('tasks')
                       ->where('id', $request->id)  // find your user by their email
                       ->limit(1)  // optional - to ensure only one record is updated.
                       ->update(array(
                        'doneQuantity' =>$request->quantity,
                       
                      
                      
                       ));  // update the record in the DB. 
                   }
                }
       

         // } 
         // catch (\Exception $e) 
         // {
         //        return redirect()->back()->with('fail', 'all fields rquierd');
         // }

         return redirect()->back()->with('success', 'Branch is Added');

    }
    public function add_note (Request $request) {
		
		$note = new note();
		$note->note = $request->note ;
		$note->task_id = $request->id ;
		$note->user_id = Auth::user()->id ;
		$note->save();
		 return redirect()->back()->with('success', 'Branch is Added');
		
		
	}

    // download status resources
    public function getDownload($destination){

        $file = public_path()."\\task_paper\\" . $destination ;
        $headers = array('Content-Type: application/pdf',);
          if (file_exists($file)) {
              return  Response::download($file, $destination,$headers);
          }
      
      return redirect()->back()->with('failur', 'Branch is Added');
    }
    public function shownotes(){
		
		 $tasks = task::all();
        return view('Dashboard.showNotes')->with('tasks' , $tasks);
	}
}
