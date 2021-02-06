<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\task;
use DB;
use App\User;
use Carbon\Carbon;
use App\project;
use Mail;


class followTaskController extends Controller
{
    public function index() {
    	$tasks = task::where('isApproved' ,'=', '0')->orWhere('statusApproved' ,'=' , '0')->get();
    	return  view('Dashboard.follow')->with('tasks' , $tasks);
    }

    public function taskConfirmation(Request $request){

    	DB::table('tasks')
                 ->where('id', $request->id)  // find your user by their email
                 ->limit(1)  // optional - to ensure only one record is updated.
                 ->update(array(
                 'isApproved' =>1,
                 'approveTaskDate' => Carbon::now()->toDateTimeString(),
                 ));  // update the record in the DB. 
    

       // send confirmation msg
        // send msg
            // select user 
                $task = task::find( $request->id);
                $user_id = $task->tasks->first()->user_id;
                $user = user::find($user_id);
                $email = $user->email;
                $project = project::find($task->project_id);
                $msg =  $task->description . ' has been confirmed';
                $emailContent =array(
                'Name' =>$user->name,
                'msg' =>$msg ,
                'projectName' =>$project->name ,
                 );

            Mail::send(['html' => 'msg'], $emailContent, function ($message) use ($emailContent , $email) {
                    
                 $message->to($email)->subject('Task Confirmation')->from('pm@dashboard.mishkatnour.org', 'Mishkat Nour');
                            

                        });


        return redirect()->back()->with('success', 'Branch is Added');

    }
    public function taskDenay(Request $request){
        $task = task::find($request->id);
        $task->delete();
       
        return redirect()->back()->with('Deleted', 'Branch is Added');

    }
    public function statusDenay(Request $request){

        $task = task::find($request->id);
        $task->delete();
        return redirect()->back()->with('Deleted', 'Branch is Added');

    }
    
    public function statusConfirmation(Request $request){
        // case status = transfer
        $task = task::find($request->id) ;
        $user_id = $task->alternative ;
        $from = $task->tasks()->first()->user_id;
        if($task->status == 'transfer') {
            // update responsibility 
            DB::table('task_respons')
                 ->where('task_id', $request->id)  
                 ->limit(1)  
                 ->update(array('user_id' => $user_id ));  

            // update confirmation
                 DB::table('tasks')
                 ->where('id', $request->id)  
                 ->limit(1)  
                 ->update(array(
                    'isApproved'     => 1,
                    'statusApproved' => 0,
                    'from' => $from ,
                    'statusDateApp' => Carbon::now()->toDateTimeString(),
                ));  
        // transferd msg
                  // send confirmation msg
        // send msg to user that transferd to 
            // select user 

                $fromUser = user::find($from);
                $task = task::find( $request->id);
                // to 
                $user = user::find($user_id);
                $email = $user->email;
                $msg =  'You have new transfered task'  ;
                 $project = project::find($task->project_id);
                $emailContent =array(
                'Name' =>$user->name,
                'msg' =>$msg ,
                'projectName' =>$project->name ,
                 );

            Mail::send(['html' => 'msg'], $emailContent, function ($message) use ($emailContent , $email) {
                    
                 $message->to($email)->subject('New Task')->from('pm@dashboard.mishkatnour.org', 'Mishkat Nour');
                            

                        });
        

        }else {


    	DB::table('tasks')
                 ->where('id', $request->id)  
                 ->limit(1)  
                 ->update(array(
                    'statusApproved' =>1,
                    'statusDateApp' => Carbon::now()->toDateTimeString(),

                ));  
             // send confirmation msg
        // send msg
            // select user 
                $task = task::find( $request->id);
                $user_id = $task->tasks->first()->user_id;
                $user = user::find($user_id);
                $email = $user->email;
                $project = project::find($task->project_id);
                $msg =  $task->description . ' status has been confirmed';
                $emailContent =array(
                'Name' =>$user->name,
                'msg' =>$msg ,
                'projectName' =>$project->name ,
                 );

            Mail::send(['html' => 'msg'], $emailContent, function ($message) use ($emailContent , $email) {
                    
                 $message->to($email)->subject('Status Confirmation')->from('pm@dashboard.mishkatnour.org', 'Mishkat Nour');
                            

                        });
        }
    return redirect()->back()->with('success', 'Branch is Added');

    }
    
}
