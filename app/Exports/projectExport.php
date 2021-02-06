<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\project;
use App\user;
use App\task;
use DateTime;


class projectExport implements FromCollection , WithHeadings, ShouldAutoSize
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
        $canceled  = 0 ;
        $done     = 0 ;
        $late     = 0 ;
        $delay    = 0 ;
        $project = project::find($this->id); 
        // get tasks related to this project 
        $relatedTasks = $project->tasks()->get();

        $user_ids = array();
        $data = array();

        foreach ($relatedTasks as $row) {
        	array_push( $user_ids , $row->tasks()->first()->user_id);
        }

        foreach ( array_unique($user_ids) as $user_id) {
        	$user = user::find($user_id);
        	$user_tasks = $user->tasks()->get();
        	$data[] = [$user->name , '' , ''];
        	foreach ($user_tasks as $row) {
        		$task = task::where('id' , $row->task_id)->first();
                 // dates format
                $dueDateFormt = new DateTime($task->dueDate);
                $dueDateFormt = $dueDateFormt->format('d-m-Y'); 
                // compare Dates
              if(strtotime($dueDateFormt) >= strtotime($this->from) 
                                    && 
                strtotime($dueDateFormt) <= strtotime( $this->to) )  {


              
                if($task->project_id == $this->id  ) 
                {


                    if($task->statusApproved) {
        		      $data[] = ['' , $task->description , $task->status , $task->dueDate , $task->created_at , (is_null($task->approveTaskDate)) ?'admin ' : $task->approveTaskDate , $task->statusDate , $task->statusDateApp

                  ];
                      switch ( $task->status) {
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
                    }else{
                      if ($task->isApproved) {
                        
                        $data []  = ["" , $task->description,($task->status == '')?'NULL':$task->status  ,$task->dueDate ,$task->created_at , (is_null($task->approveTaskDate)) ?'admin ' : $task->approveTaskDate , '' , ''];
                      }else{

                        $data []  = ["" , $task->description,'not approved' ,$task->dueDate ,$task->created_at , 'not approved' , '' , '' ];
                      }

                    }


                      // calculate tasks status
                }
            }

        	}
        }
       $data [] = ['','','','','','','','done' , $done];
       $data [] = ['','','','','','','','late' , $late];
       $data [] = ['','','','','','','','canceled' , $canceled];
       $data [] = ['','','','','','','','delay' , $delay];
        return collect($data);
    }
     public function headings(): array
    {
        return [
            'responsibility',
            'tasks',
            'Task status',
            'Due Date',
            'Created at',
            'Task confirmed at',
            'status updated at',
            'Status confirmed at',

           
        ];
    }
}
