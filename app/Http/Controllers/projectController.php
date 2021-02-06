<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\objective;
use App\project;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\task;
use App\task_respon;
use App\branch;
use Auth;
use DB;
use Mail;

class projectController extends Controller
{
    // OBJECTIVE
    public function objectiveIndex() {
        $branches = branch::all();
        return view('Dashboard.objectives')->with('branches' , $branches);
    }
    public function addObjective (Request $request)
    {
    	// validate Input
         $Validator=  Validator::make($request->all(),[

            'objDescription' =>'required',
            'projectName' =>'required',
            'proDescription' =>'required',
            'projectLocation' =>'required',
            'branch' =>'required',

        ])->validate();

         try
         {

         	$objective = new objective ;
         	$objective->description = $request->objDescription;
         	$objective->save();

         	$project = new project ;
         	$project->name = $request->projectName ;
         	$project->description = $request->proDescription;
         	$project->location = $request->projectLocation;
            $project->branch = $request->branch;
         	$objective->projects()->save($project);
         } 
         catch (\Exception $e) 
         {
                return redirect()->back()->with('fail', 'all fields rquierd');
         }

         return redirect()->back()->with('success', 'Branch is Added');



    }

    public function showObjectives(){
    	$objectives = objective::all();
        $users = user::all();
    	return view('Dashboard.showObectives')->with(['objectives' => $objectives , 'users' => $users]);
    }
    public function deleteObjective(Request $request) {

        $objective = objective::find($request->id) ;
        $objective->delete();
        return redirect()->back()->with('deleted', 'Branch is Added');

    }
    public function editObjective (Request $request) {

         DB::table('objectives')
                 ->where('id', $request->id)  
                 ->limit(1)  
                 ->update(
                    array('description' => $request->description )
                  );  

        return redirect()->back()->with('Updated', 'Branch is Added');



    }
    /////////////////////////////////////////////////////////////
    //  PROJECT
    public function projectIndex(){
    	$objectives = objective::all();
        $Branches = branch::all();
    	return view('Dashboard.addProject')->with(['objectives' => $objectives ,'Branches' => $Branches  ]);
    }
    public function addProject(Request $request){

    	// validate Input
         $Validator=  Validator::make($request->all(),[

            'id' =>'required',
            'projectName' =>'required',
            'proDescription' =>'required',
            'projectLocation' =>'required',
            'branch' =>'required',

        ])->validate();

         // try
         // {

         	$project = new project ;
         	$project->name = $request->projectName ;
         	$project->description = $request->proDescription;
         	$project->location = $request->projectLocation;
         	$project->objective_id = $request->id;
            $project->branch = $request->branch;
         	$project->save();
         // } 
         // catch (\Exception $e) 
         // {
         //        return redirect()->back()->with('fail', 'all fields rquierd');
         // }

         return redirect()->back()->with('success', 'Branch is Added');

    }
    // show all projects 
    public function showProjects(){

    	$projects = project::all();
        $users = user::all();
    	return view('Dashboard.showProjects')->with(['projects' => $projects , 'users' => $users]);
    }

    // show specific project
    public function showProject($id) {
        $project = project::find($id);
        $tasks = $project->tasks()->get();
       return view('Dashboard.project')->with(['project' => $project , 'tasks' => $tasks]);


    }

    public function deleteProject(Request $request) {

        $project = project::find($request->id) ;
        $project->delete();
        return redirect()->back()->with('deleted' , 'deleted') ;
    }
    public function editProject (Request $request) {

          DB::table('projects')
                 ->where('id', $request->project)  
                 ->limit(1)  
                 ->update(
                    array(

                        'name' => $request->name,
                        'description' => $request->description,
                        'location' => $request->location

                         )
                  );  
        return redirect()->back()->with('updated' , 'updated');

    }




    public function projectTasks() {
        $tasks = task::all();
    	return view('Dashboard.showProject')->with('tasks' , $tasks);
    }
     public function showTasks() {
        $tasks = task::where('statusApproved' , '=' , 1)->get();
        $user  = user::where('admin' , '=' , 0)->get();
    	return view('Dashboard.tasks')->with(['tasks' => $tasks , 'users' =>$user]);
    }
    public function printTasks() {
        $tasks = task::where('statusApproved' , '=' , 1)->get();
        $user  = user::where('admin' , '=' , 0)->get();
        return view('Dashboard.tasksPrint')->with(['tasks' => $tasks , 'users' =>$user]);
    }
    
    public function addTask(Request $request ,$id){

        // validate Input
         $Validator=  Validator::make($request->all(),[

            'ResponsibiltyInput' =>'required',
            'taskInput' =>'required',
            'dueDate' =>'required',

        ])->validate();

         try
         {
            // echo $id;
            // select project
            $project = project::find($id);

            $task = new task ;
            $task->description = $request->taskInput;
            $task->isApproved = 1;
            $task->dueDate = $request->dueDate;
            $task->urgency = $request->urgency;
            $task->quantity = $request->quantity;
            $project->tasks()->save($task);

            $res = new task_respon ;
            $res->user_id = $request->ResponsibiltyInput;
            $task->tasks()->save($res);

         } 
         catch (\Exception $e) 
         {
                return redirect()->back()->with('fail', 'all fields rquierd');
         }

         // send msg
            // select user 
             $user = user::find($request->ResponsibiltyInput);
             $email = $user->email;
             $msg = 'You have new task' . $task->description;
              $emailContent =array(
                'Name' =>$user->name,
                'msg' =>$msg ,
                'projectName' =>$project->name ,
                 );

            Mail::send(['html' => 'msg'], $emailContent, function ($message) use ($emailContent , $email) {
                    
                 $message->to($email)->subject('New Task')->from('pm@dashboard.mishkatnour.org', 'Mishkat Nour');
                            

                        });

         return redirect()->back()->with('success', 'Branch is Added');

    	
    }
    public function deleteTask(Request $request) {

        $task = task::find($request->id)->delete();
        return redirect()->back()->with('deleted', 'Branch is Added');

    }
    public function editTask (Request $request) {

          DB::table('tasks')
                 ->where('id', $request->id)  
                 ->limit(1)  
                 ->update(
                    array(

                        'description' => $request->description,
                        'dueDate' => $request->date

                         )
                  );  

        DB::table('task_respons')
                 ->where('task_id', $request->id)  
                 ->limit(1)  
                 ->update(
                    array(

                        'user_id' => $request->user,

                         )
                  );  
         

        return redirect()->back()->with('updated' , 'updated');

    }
    // available project
    public function myproject () {
        $users = user::all();
        $id = Auth::User()->id;
        $user = User::find($id);
        $rows = $user->tasks()->get()->sortBy('status');
        // echo $rows;
        // // $task_id = $rows->task_id;
        // $tasks = task::find($task_id)->first();
        $branch_id = Auth::user()->branch; 
        $projects = project::where('branch' , '=', $branch_id)->get();
       return view('Dashboard.myProject')->with(['projects' => $projects , 'rows' => $rows , 'users' => $users]);

    }






}
