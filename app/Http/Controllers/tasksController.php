<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\task as taskResource ;

use App\task ;
use App\User;
use App\branch;
use App\project;
use App\task_respon;
class tasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('Dashboard.editTasks');
    }

    public function tasks($from , $to)
    {
       $data = [] ;
       $tasks = task::whereBetween('created_at', [$from ,$to])->get();


       foreach ($tasks as $task ) {

        $res = task_respon::where('id' , '=' , $task->id)->first();
        $user = user::find($res->user_id);
        //echo $user;
           

            $data[] = [
                'id'                =>    $task->id ,  
                'description'       =>    $task->description,
                'branch'            =>    branch::find($user->branch)->name ,
                'project'           =>    project::find($task->project_id)->first()->name,
                'reponsibilty'      =>    $user->name,
                'quantity'          =>    $task->quantity,
                'doneQuantity'      =>    $task->doneQuantity,
                'urgency'           =>    $task->urgency,
                'Due Date'          =>    $task->dueDate,
                'lateDate'          =>    $task->lateDate,
                'status'            =>    $task->status,
                'isApproved'        =>    $task->isApproved,
                'statusApproved'    =>    $task->statusApproved,
            ]; 

       }
        //return $data;
      
      return response()->json($data);
  


    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $task = task::find($request->input('id'));
         $task->description = $request->input('description');
         $task->quantity = $request->input('quantity');
         $task->doneQuantity = $request->input('doneQuantity');
         $task->urgency = $request->input('urgency');
         $task->isApproved = $request->input('isApproved');
         $task->statusApproved = $request->input('statusApproved');
         $task->status = $request->input('status');

         if ($task->save()) {
             return new taskResource($task);
         }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = task::find($id);
        if(is_null($task )) {
            return response()->json([
                   'msg' => 'Already deleted',
                   
                 ]);
        }else{

            if($task->delete()) {    

                return response()->json([
                   'msg' => 'Deleted',
                   
                 ]);   

            }else{    

                return response()->json([
                   'msg' => 'Fail',
                   
                 ]);
            }
        }

       
    }
}
