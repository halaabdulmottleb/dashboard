<?php

namespace App\Exports;

use App\User;
use App\task;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use DateTime;


class UsersExport implements FromCollection , WithHeadings, ShouldAutoSize
{
    protected $data;

    function __construct($data) {
           $this->id = $data['id'];

           $this->from = new DateTime($data['from']);
           $this->to = new DateTime($data['to']);
           // format
           $this->from =  $this->from->format('d-m-Y'); 
           $this->to =  $this->to->format('d-m-Y'); 

    }
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $trans = 0;
      // calculated tranfered
        $tranfered_tasks = task::where('from' ,'=' , $this->id )->get();
        foreach($tranfered_tasks as $task){
          $trans ++;

        }

      // end 
        // for statistics 

        $canceled  = 0 ;
        $done     = 0 ;
        $late     = 0 ;
        $delay    = 0 ;

        // end statistics
       $user = user::find($this->id );
       $res_tasks = $user->tasks()->get();
       $task_ids = array();
       $data = array();
       foreach ( $res_tasks as $row) {

             array_push($task_ids,$row->task_id )  ;
       }
       // get projects related to user 
       $projects = array();
       foreach ( $task_ids as $row) {
        $task = task::find($row);
          // check range 

         // dates format
                $dueDateFormt = new DateTime($task->dueDate);
                $dueDateFormt = $dueDateFormt->format('d-m-Y'); 
                // compare Dates
              if(strtotime($dueDateFormt) >= strtotime($this->from) 
                                    && 
                strtotime($dueDateFormt) <= strtotime( $this->to) )  {


             array_push($projects ,$task->project()->first() );
         }
       }
       $user_tasks = array();

       foreach (array_unique($projects) as $row) {

        array_push($user_tasks, $row->tasks()->get());
       }

       foreach ($user_tasks as $task) {
            $task_row = array();
                  // to get project 
            $project = '';
                  foreach ($task as $row ) {
                       $project = $row->project()->first()->name;
                  }
                  // first row

                   $data [] = [$project,'-', '-'];
         foreach ($task as $row) {
                  // push this user tasks
                  if($row->tasks()->first()->user_id == $this->id) {
                    if($row->statusApproved) {
                        $data []  = ["" , $row->description, $row->status , $row->dueDate , $row->created_at , (is_null($row->approveTaskDate)) ?'admin ' : $row->approveTaskDate , $row->statusDate , $row->statusDateApp];
                        // statistics 
                           switch ($row->status) {
                                case 'late':
                                    $late ++ ;
                                    break;
                                case 'done':
                                    $done ++ ;
                                    break;
                                case 'delayed':
                                    $delay ++ ;
                                    break;
                                case 'canceled':
                                    $canceled ++ ;
                                    break;
                            }


                        // end statistics
                    }else{
                      if ($row->isApproved) {
                        
                        $data []  = ["" , $row->description,'NULL' ,$row->dueDate ,$row->created_at , (is_null($row->approveTaskDate)) ?'admin ' : $row->approveTaskDate , '' , ''];
                      }else{

                        $data []  = ["" , $row->description,'not approve' ,$row->dueDate ,$row->created_at , 'not approved' , '' , '' ];
                      }

                    }
                  }



         }
       

       }
       $data [] = ['','','','' ,'', '','','','done' , $done];
       $data [] = ['','','','','', '','','','late' , $late];
       $data [] = ['','','','','', '','','','canceled' , $canceled];
       $data [] = ['','','','','', '','','','delay' , $delay];
       $data [] = ['','','','','', '','','','tranfered' , $trans];

       // Done Late Delayed 

       return collect($data);

         return collect($data);
    }
    public function headings(): array
    {
        return [
            'project Name',
            'tasks',
            'Task status',
            'Due Date',
            'Created at',
            'Task Confirmed at',
            'Status Updated at',
            'Status Confirmed at',
           
        ];
    }
}
