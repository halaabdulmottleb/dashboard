<?php

namespace App\Exports;

use App\User;
use App\task;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class profileExport implements FromCollection , WithHeadings, ShouldAutoSize
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
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       $user = user::find($this->id);
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
           array_push($projects ,$task->project()->first() );
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

                   $data [] = [$project,'task', 'Status' , 'Due Date'];
         foreach ($task as $row) {

                  // push this user tasks
                  if($row->tasks()->first()->user_id == $this->id) {
                    // check range 
                         // dates format
                $dueDateFormt = new DateTime($row->dueDate);
                $dueDateFormt = $dueDateFormt->format('d-m-Y'); 
                // compare Dates
              if(strtotime($dueDateFormt) >= strtotime($this->from) 
                                    && 
                strtotime($dueDateFormt) <= strtotime( $this->to) )  {

                         $data []  = ["-" , $row->description, $row->status , $row->dueDate];

                  }
                }
         }
       

       }
       return collect($data);

    }
     public function headings(): array
    {
        return [
            'Project',
            'Tasks',
            'Status',
        ];
    }
}
