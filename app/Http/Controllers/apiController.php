<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\task;
use App\branch;
use App\project;
use App\task_respon;
use App\Http\Resources\task as userResource ;

class apiController extends Controller
{
    public function getUsers() {
        //check authntication
     //   if(Auth)
        $users = User::all('id' , 'name' , 'branch' , 'email' , 'address' , 'mobile');
        return  userResource::collection($users);
    }

    public function getUserInformation($id , $year)
    {   $user = user::find($id);
        $tasks_ids = User::find($id)->tasks()->get('id');
        $tasks_all = task::whereIn('id' , $tasks_ids )->whereYear('created_at',$year)->get();
        /////////////
        $tasks = [] ;
         foreach ($tasks_all as $task ) {

             $res = task_respon::where('id' , '=' , $task->id)->first();
             $user = user::find($res->user_id);
             //echo $user;
                     

                 $tasks [] = [
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


        /////////////
        $paper = User::find($id)->user_papers()->get();
        //all
         $tasksJunu = task::whereIn('id' , $tasks_ids )->whereYear('created_at',$year)->whereMonth('created_at', '=',"1")->count();
        $tasksfeb = task::whereIn('id' , $tasks_ids )->whereYear('created_at',$year)->whereMonth('created_at', '=',"2")->count();
        $tasksMar = task::whereIn('id' , $tasks_ids )->whereYear('created_at',$year)->whereMonth('created_at', '=',"3")->count();
        $tasksApr = task::whereIn('id' , $tasks_ids )->whereYear('created_at',$year)->whereMonth('created_at', '=',"4")->count();
        $tasksMay = task::whereIn('id' , $tasks_ids )->whereYear('created_at',$year)->whereMonth('created_at', '=',"5")->count();
        $tasksJun = task::whereIn('id' , $tasks_ids )->whereYear('created_at',$year)->whereMonth('created_at', '=',"6")->count();
        $tasksJul= task::whereIn('id' , $tasks_ids )->whereYear('created_at',$year)->whereMonth('created_at', '=',"7")->count();
        $tasksAug = task::whereIn('id' , $tasks_ids )->whereYear('created_at',$year)->whereMonth('created_at', '=',"8")->count();
        $tasksSep = task::whereIn('id' , $tasks_ids )->whereYear('created_at',$year)->whereMonth('created_at', '=',"9")->count();
        $tasksOct = task::whereIn('id' , $tasks_ids )->whereYear('created_at',$year)->whereMonth('created_at', '=',"10")->count();
        $tasksNov = task::whereIn('id' , $tasks_ids )->whereYear('created_at',$year)->whereMonth('created_at', '=',"11")->count();
        $tasksDec = task::whereIn('id' , $tasks_ids )->whereYear('created_at',$year)->whereMonth('created_at', '=',"12")->count();
        // done
        $donetasksJunu = task::whereIn('id' , $tasks_ids )->where('status' , '=' , 'done')->whereYear('created_at',$year)->whereMonth('created_at', '=',"1")->count();
        $donetasksfeb = task::whereIn('id' , $tasks_ids )->where('status' , '=' , 'done')->whereYear('created_at',$year)->whereMonth('created_at', '=',"2")->count();
        $donetasksMar = task::whereIn('id' , $tasks_ids )->where('status' , '=' , 'done')->whereYear('created_at',$year)->whereMonth('created_at', '=',"3")->count();
        $donetasksApr = task::whereIn('id' , $tasks_ids )->where('status' , '=' , 'done')->whereYear('created_at',$year)->whereMonth('created_at', '=',"4")->count();
        $donetasksMay = task::whereIn('id' , $tasks_ids )->where('status' , '=' , 'done')->whereYear('created_at',$year)->whereMonth('created_at', '=',"5")->count();
        $donetasksJun = task::whereIn('id' , $tasks_ids )->where('status' , '=' , 'done')->whereYear('created_at',$year)->whereMonth('created_at', '=',"6")->count();
        $donetasksJul= task::whereIn('id' , $tasks_ids )->where('status' , '=' , 'done')->whereYear('created_at',$year)->whereMonth('created_at', '=',"7")->count();
        $donetasksAug = task::whereIn('id' , $tasks_ids )->where('status' , '=' , 'done')->whereYear('created_at',$year)->whereMonth('created_at', '=',"8")->count();
        $donetasksSep = task::whereIn('id' , $tasks_ids )->where('status' , '=' , 'done')->whereYear('created_at',$year)->whereMonth('created_at', '=',"9")->count();
        $donetasksOct = task::whereIn('id' , $tasks_ids )->where('status' , '=' , 'done')->whereYear('created_at',$year)->whereMonth('created_at', '=',"10")->count();
        $donetasksNov = task::whereIn('id' , $tasks_ids )->where('status' , '=' , 'done')->whereYear('created_at',$year)->whereMonth('created_at', '=',"11")->count();
        $donetasksDec = task::whereIn('id' , $tasks_ids )->where('status' , '=' , 'done')->whereYear('created_at',$year)->whereMonth('created_at', '=',"12")->count();

        //canceled
        $canceledtasksJunu = task::whereIn('id' , $tasks_ids )->where('status' , '=' , 'canceled')->whereYear('created_at',$year)->whereMonth('created_at', '=',"1")->count();
        $canceledtasksfeb = task::whereIn('id' , $tasks_ids )->where('status' , '=' , 'canceled')->whereYear('created_at',$year)->whereMonth('created_at', '=',"2")->count();
        $canceledtasksMar = task::whereIn('id' , $tasks_ids )->where('status' , '=' , 'canceled')->whereYear('created_at',$year)->whereMonth('created_at', '=',"3")->count();
        $canceledtasksApr = task::whereIn('id' , $tasks_ids )->where('status' , '=' , 'canceled')->whereYear('created_at',$year)->whereMonth('created_at', '=',"4")->count();
        $canceledtasksMay = task::whereIn('id' , $tasks_ids )->where('status' , '=' , 'canceled')->whereYear('created_at',$year)->whereMonth('created_at', '=',"5")->count();
        $canceledtasksJun = task::whereIn('id' , $tasks_ids )->where('status' , '=' , 'canceled')->whereYear('created_at',$year)->whereMonth('created_at', '=',"6")->count();
        $canceledtasksJul= task::whereIn('id' , $tasks_ids )->where('status' , '=' , 'canceled')->whereYear('created_at',$year)->whereMonth('created_at', '=',"7")->count();
        $canceledtasksAug = task::whereIn('id' , $tasks_ids )->where('status' , '=' , 'canceled')->whereYear('created_at',$year)->whereMonth('created_at', '=',"8")->count();
        $canceledtasksSep = task::whereIn('id' , $tasks_ids )->where('status' , '=' , 'canceled')->whereYear('created_at',$year)->whereMonth('created_at', '=',"9")->count();
        $canceledtasksOct = task::whereIn('id' , $tasks_ids )->where('status' , '=' , 'canceled')->whereYear('created_at',$year)->whereMonth('created_at', '=',"10")->count();
        $canceledtasksNov = task::whereIn('id' , $tasks_ids )->where('status' , '=' , 'canceled')->whereYear('created_at',$year)->whereMonth('created_at', '=',"11")->count();
        $canceledtasksDec = task::whereIn('id' , $tasks_ids )->where('status' , '=' , 'canceled')->whereYear('created_at',$year)->whereMonth('created_at', '=',"12")->count();
        


        //delayed
       
        $delayedtasksJunu = task::whereIn('id' , $tasks_ids )->where('status' , '=' , 'delayed')->whereYear('created_at',$year)->whereMonth('created_at', '=',"1")->count();
        $delayedtasksfeb = task::whereIn('id' , $tasks_ids )->where('status' , '=' , 'delayed')->whereYear('created_at',$year)->whereMonth('created_at', '=',"2")->count();
        $delayedtasksMar = task::whereIn('id' , $tasks_ids )->where('status' , '=' , 'delayed')->whereYear('created_at',$year)->whereMonth('created_at', '=',"3")->count();
        $delayedtasksApr = task::whereIn('id' , $tasks_ids )->where('status' , '=' , 'delayed')->whereYear('created_at',$year)->whereMonth('created_at', '=',"4")->count();
        $delayedtasksMay = task::whereIn('id' , $tasks_ids )->where('status' , '=' , 'delayed')->whereYear('created_at',$year)->whereMonth('created_at', '=',"5")->count();
        $delayedtasksJun = task::whereIn('id' , $tasks_ids )->where('status' , '=' , 'delayed')->whereYear('created_at',$year)->whereMonth('created_at', '=',"6")->count();
        $delayedtasksJul= task::whereIn('id' , $tasks_ids )->where('status' , '=' , 'delayed')->whereYear('created_at',$year)->whereMonth('created_at', '=',"7")->count();
        $delayedtasksAug = task::whereIn('id' , $tasks_ids )->where('status' , '=' , 'delayed')->whereYear('created_at',$year)->whereMonth('created_at', '=',"8")->count();
        $delayedtasksSep = task::whereIn('id' , $tasks_ids )->where('status' , '=' , 'delayed')->whereYear('created_at',$year)->whereMonth('created_at', '=',"9")->count();
        $delayedtasksOct = task::whereIn('id' , $tasks_ids )->where('status' , '=' , 'delayed')->whereYear('created_at',$year)->whereMonth('created_at', '=',"10")->count();
        $delayedtasksNov = task::whereIn('id' , $tasks_ids )->where('status' , '=' , 'delayed')->whereYear('created_at',$year)->whereMonth('created_at', '=',"11")->count();
        $delayedtasksDec = task::whereIn('id' , $tasks_ids )->where('status' , '=' , 'delayed')->whereYear('created_at',$year)->whereMonth('created_at', '=',"12")->count();






        //late




        $branch = branch::find($user->branch);

        return response()->json([

            'tasks' =>  $tasks,
            'papers' => $paper,
            'branch' => $branch->name,
            'userAddress' => $user->address,
            'tasksJunu' =>$tasksJunu,
            'tasksfeb' => $tasksfeb ,
            'tasksMar' => $tasksMar , 
            'tasksApr' => $tasksApr , 
            'tasksMay' => $tasksMay,
            'tasksJun' => $tasksJun, 
            'tasksJul' => $tasksJul,
            'tasksAug' => $tasksAug , 
            'tasksSep' => $tasksSep , 
            'tasksOct' => $tasksOct , 
            'tasksNov' => $tasksNov , 
            'tasksDec' => $tasksDec , 
            'done' => [         

                     'tasksJunu' =>$donetasksJunu,
                     'tasksfeb' => $donetasksfeb ,
                     'tasksMar' => $donetasksMar , 
                     'tasksApr' => $donetasksApr , 
                     'tasksMay' => $donetasksMay,
                     'tasksJun' => $donetasksJun, 
                     'tasksJul' => $donetasksJul,
                     'tasksAug' => $donetasksAug , 
                     'tasksSep' => $donetasksSep , 
                     'tasksOct' => $donetasksOct , 
                     'tasksNov' => $donetasksNov , 
                     'tasksDec' => $donetasksDec , 
                   ], 
            'canceled' => [         

                     'tasksJunu' =>$canceledtasksJunu,
                     'tasksfeb' => $canceledtasksfeb ,
                     'tasksMar' => $canceledtasksMar , 
                     'tasksApr' => $canceledtasksApr , 
                     'tasksMay' => $canceledtasksMay,
                     'tasksJun' => $canceledtasksJun, 
                     'tasksJul' => $canceledtasksJul,
                     'tasksAug' => $canceledtasksAug , 
                     'tasksSep' => $canceledtasksSep , 
                     'tasksOct' => $canceledtasksOct , 
                     'tasksNov' => $canceledtasksNov , 
                     'tasksDec' => $canceledtasksDec , 
                   ], 
                   
            'delayed' => [         

                     'tasksJunu' =>$delayedtasksJunu,
                     'tasksfeb' => $delayedtasksfeb ,
                     'tasksMar' => $delayedtasksMar , 
                     'tasksApr' => $delayedtasksApr , 
                     'tasksMay' => $delayedtasksMay,
                     'tasksJun' => $delayedtasksJun, 
                     'tasksJul' => $delayedtasksJul,
                     'tasksAug' => $delayedtasksAug , 
                     'tasksSep' => $delayedtasksSep , 
                     'tasksOct' => $delayedtasksOct , 
                     'tasksNov' => $delayedtasksNov , 
                     'tasksDec' => $delayedtasksDec , 
                   ], 
                   

            ]);

    
    }

     public function statisticsTasks($year)
    {   

        //all
        $tasksJunu = task::whereYear('created_at',$year)->whereMonth('created_at', '=',"1")->count();
        $tasksfeb = task::whereYear('created_at',$year)->whereMonth('created_at', '=',"2")->count();
        $tasksMar = task::whereYear('created_at',$year)->whereMonth('created_at', '=',"3")->count();
        $tasksApr = task::whereYear('created_at',$year)->whereMonth('created_at', '=',"4")->count();
        $tasksMay = task::whereYear('created_at',$year)->whereMonth('created_at', '=',"5")->count();
        $tasksJun = task::whereYear('created_at',$year)->whereMonth('created_at', '=',"6")->count();
        $tasksJul= task::whereYear('created_at',$year)->whereMonth('created_at', '=',"7")->count();
        $tasksAug = task::whereYear('created_at',$year)->whereMonth('created_at', '=',"8")->count();
        $tasksSep = task::whereYear('created_at',$year)->whereMonth('created_at', '=',"9")->count();
        $tasksOct = task::whereYear('created_at',$year)->whereMonth('created_at', '=',"10")->count();
        $tasksNov = task::whereYear('created_at',$year)->whereMonth('created_at', '=',"11")->count();
        $tasksDec = task::whereYear('created_at',$year)->whereMonth('created_at', '=',"12")->count();
        //done
        $donetasksJunu = task::whereYear('created_at',$year)->where('status' , '=' , 'done')->whereMonth('created_at', '=',"1")->count();
        $donetasksfeb = task::whereYear('created_at',$year)->where('status' , '=' , 'done')->whereMonth('created_at', '=',"2")->count();
        $donetasksMar = task::whereYear('created_at',$year)->where('status' , '=' , 'done')->whereMonth('created_at', '=',"3")->count();
        $donetasksApr = task::whereYear('created_at',$year)->where('status' , '=' , 'done')->whereMonth('created_at', '=',"4")->count();
        $donetasksMay = task::whereYear('created_at',$year)->where('status' , '=' , 'done')->whereMonth('created_at', '=',"5")->count();
        $donetasksJun = task::whereYear('created_at',$year)->where('status' , '=' , 'done')->whereMonth('created_at', '=',"6")->count();
        $donetasksJul= task::whereYear('created_at',$year)->where('status' , '=' , 'done')->whereMonth('created_at', '=',"7")->count();
        $donetasksAug = task::whereYear('created_at',$year)->where('status' , '=' , 'done')->whereMonth('created_at', '=',"8")->count();
        $donetasksSep = task::whereYear('created_at',$year)->where('status' , '=' , 'done')->whereMonth('created_at', '=',"9")->count();
        $donetasksOct = task::whereYear('created_at',$year)->where('status' , '=' , 'done')->whereMonth('created_at', '=',"10")->count();
        $donetasksNov = task::whereYear('created_at',$year)->where('status' , '=' , 'done')->whereMonth('created_at', '=',"11")->count();
        $donetasksDec = task::whereYear('created_at',$year)->where('status' , '=' , 'done')->whereMonth('created_at', '=',"12")->count();
        //delayed
        $delayedtasksJunu = task::whereYear('created_at',$year)->where('status' , '=' , 'delayed')->whereMonth('created_at', '=',"1")->count();
        $delayedtasksfeb = task::whereYear('created_at',$year)->where('status' , '=' , 'delayed')->whereMonth('created_at', '=',"2")->count();
        $delayedtasksMar = task::whereYear('created_at',$year)->where('status' , '=' , 'delayed')->whereMonth('created_at', '=',"3")->count();
        $delayedtasksApr = task::whereYear('created_at',$year)->where('status' , '=' , 'delayed')->whereMonth('created_at', '=',"4")->count();
        $delayedtasksMay = task::whereYear('created_at',$year)->where('status' , '=' , 'delayed')->whereMonth('created_at', '=',"5")->count();
        $delayedtasksJun = task::whereYear('created_at',$year)->where('status' , '=' , 'delayed')->whereMonth('created_at', '=',"6")->count();
        $delayedtasksJul= task::whereYear('created_at',$year)->where('status' , '=' , 'delayed')->whereMonth('created_at', '=',"7")->count();
        $delayedtasksAug = task::whereYear('created_at',$year)->where('status' , '=' , 'delayed')->whereMonth('created_at', '=',"8")->count();
        $delayedtasksSep = task::whereYear('created_at',$year)->where('status' , '=' , 'delayed')->whereMonth('created_at', '=',"9")->count();
        $delayedtasksOct = task::whereYear('created_at',$year)->where('status' , '=' , 'delayed')->whereMonth('created_at', '=',"10")->count();
        $delayedtasksNov = task::whereYear('created_at',$year)->where('status' , '=' , 'delayed')->whereMonth('created_at', '=',"11")->count();
        $delayedtasksDec = task::whereYear('created_at',$year)->where('status' , '=' , 'delayed')->whereMonth('created_at', '=',"12")->count();
        //cancled
        $canceledtasksJunu = task::whereYear('created_at',$year)->where('status' , '=' , 'cancled')->whereMonth('created_at', '=',"1")->count();
        $canceledtasksfeb = task::whereYear('created_at',$year)->where('status' , '=' , 'cancled')->whereMonth('created_at', '=',"2")->count();
        $canceledtasksMar = task::whereYear('created_at',$year)->where('status' , '=' , 'cancled')->whereMonth('created_at', '=',"3")->count();
        $canceledtasksApr = task::whereYear('created_at',$year)->where('status' , '=' , 'cancled')->whereMonth('created_at', '=',"4")->count();
        $canceledtasksMay = task::whereYear('created_at',$year)->where('status' , '=' , 'cancled')->whereMonth('created_at', '=',"5")->count();
        $canceledtasksJun = task::whereYear('created_at',$year)->where('status' , '=' , 'cancled')->whereMonth('created_at', '=',"6")->count();
        $canceledtasksJul= task::whereYear('created_at',$year)->where('status' , '=' , 'cancled')->whereMonth('created_at', '=',"7")->count();
        $canceledtasksAug = task::whereYear('created_at',$year)->where('status' , '=' , 'cancled')->whereMonth('created_at', '=',"8")->count();
        $canceledtasksSep = task::whereYear('created_at',$year)->where('status' , '=' , 'cancled')->whereMonth('created_at', '=',"9")->count();
        $canceledtasksOct = task::whereYear('created_at',$year)->where('status' , '=' , 'cancled')->whereMonth('created_at', '=',"10")->count();
        $canceledtasksNov = task::whereYear('created_at',$year)->where('status' , '=' , 'cancled')->whereMonth('created_at', '=',"11")->count();
        $canceledtasksDec = task::whereYear('created_at',$year)->where('status' , '=' , 'cancled')->whereMonth('created_at', '=',"12")->count();

        return response()->json([
           
            'tasksJunu' =>$tasksJunu,
            'tasksfeb' => $tasksfeb ,
            'tasksMar' => $tasksMar , 
            'tasksApr' => $tasksApr , 
            'tasksMay' => $tasksMay,
            'tasksJun' => $tasksJun, 
            'tasksJul' => $tasksJul,
            'tasksAug' => $tasksAug , 
            'tasksSep' => $tasksSep , 
            'tasksOct' => $tasksOct , 
            'tasksNov' => $tasksNov , 
            'tasksDec' => $tasksDec , 
           'done' => [         

                     'tasksJunu' =>$donetasksJunu,
                     'tasksfeb' => $donetasksfeb ,
                     'tasksMar' => $donetasksMar , 
                     'tasksApr' => $donetasksApr , 
                     'tasksMay' => $donetasksMay,
                     'tasksJun' => $donetasksJun, 
                     'tasksJul' => $donetasksJul,
                     'tasksAug' => $donetasksAug , 
                     'tasksSep' => $donetasksSep , 
                     'tasksOct' => $donetasksOct , 
                     'tasksNov' => $donetasksNov , 
                     'tasksDec' => $donetasksDec , 
                   ], 
            'canceled' => [         

                     'tasksJunu' =>$canceledtasksJunu,
                     'tasksfeb' => $canceledtasksfeb ,
                     'tasksMar' => $canceledtasksMar , 
                     'tasksApr' => $canceledtasksApr , 
                     'tasksMay' => $canceledtasksMay,
                     'tasksJun' => $canceledtasksJun, 
                     'tasksJul' => $canceledtasksJul,
                     'tasksAug' => $canceledtasksAug , 
                     'tasksSep' => $canceledtasksSep , 
                     'tasksOct' => $canceledtasksOct , 
                     'tasksNov' => $canceledtasksNov , 
                     'tasksDec' => $canceledtasksDec , 
                   ], 
                   
            'delayed' => [         

                     'tasksJunu' =>$delayedtasksJunu,
                     'tasksfeb' => $delayedtasksfeb ,
                     'tasksMar' => $delayedtasksMar , 
                     'tasksApr' => $delayedtasksApr , 
                     'tasksMay' => $delayedtasksMay,
                     'tasksJun' => $delayedtasksJun, 
                     'tasksJul' => $delayedtasksJul,
                     'tasksAug' => $delayedtasksAug , 
                     'tasksSep' => $delayedtasksSep , 
                     'tasksOct' => $delayedtasksOct , 
                     'tasksNov' => $delayedtasksNov , 
                     'tasksDec' => $delayedtasksDec , 
                   ], 

            ]);

    
    }



    public function branches (){
        $branches  = branch::all();
        return  userResource::collection($branches);

    }
    public function editUser(Request  $request){
        $user = user::find($request->id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->branch = $request->input('branch');
        $user->address = $request->input('address');
        $user->mobile = $request->input('mobile');
         if ($user->save()) {
            return new userResource($user);
        }
    }

    // get all brnaches 

     public function projects (){

         $projects  = project::all();
        return  userResource::collection($projects);
    }
    
}
