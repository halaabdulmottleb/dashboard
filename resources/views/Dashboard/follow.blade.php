<?php
use App\user;

?>
@extends('Dashboard.structure')
@section('dashboard_heading')
  <p> PENDING TASKS</p>
@endsection
@section('structure_content') 
<div class="container">
  <div class="row">
    <div class="col-md-4">
      <div class="row">
        <div class="col-md-2">
            <div class="square" style="background-color:#f2dede;"></div> 
        </div>
        <div class="col-md-2">
           IMPORTANT
        </div>
      </div>
      <div class="row">
        <div class="col-md-2">
             <div class="square" style="background-color:#fcf8e3;"></div>
        </div>
        LESS IMPORTANT

      </div>
       <div class="row">
        <div class="col-md-2">
            <div class="square" style="background-color: #dff0d8;"></div>
        </div>
        <div class="col-md-2">
            NORMAL
        </div>

      </div>



      
     
      

    </div>
    
  </div>
  <!-- search -->
  <div class="row">
    <div class="col-md-11 ml-1">
        <div class="row"> 
             <div class="col-md-2 mt-4">
                    <select class="form-control" id="statusFilterSelect">
                      <option value="">All</option>
                      <option value="done">Done</option>
                      <option value="late">Late</option>
                      <option value="Delayed" >Delayed</option>
                      <option value="Transfer">Transfer</option>
                    </select> 
             </div>
             <div class="col-md-4 mt-4 offset-md-2 float-right">
               <input class="form-control" id="myInput" type="text" placeholder="Search..">
             </div>
             
       </div>
    </div>
  </div>
  <!-- end search -->
  <div class="row">
    <div class="col-md-11 ml-1 mt-4">
    <div style="overflow-x:auto; overflow-y: auto;
    height:500px;">
    <table class="table table-bordered table-fixed"
            style="width:1500px";
            padding:2px;
            >
         <thead class="thead-dark">
                      <tr>
                        <th scope="col">Project</th>
                        <th scope="col"> Task ID </th>                       
                        <th scope="col"style="width:50%">Task</th>                    
                         <th scope="col" >Quantity</th>
                          <th scope="col" >Done Quantity</th>
                        <th scope="col" >Responsibility</th>
                        <th scope="col"   >Created at</th>
                        <th scope="col" >Due date</th>
                        <th scope="col" >Status</th>
                        <th scope="col" >Status Date</th>
                        <th scope="col"   >Confirmation</th>
                        <th scope="col" >Notes</th>
                        
                      </tr>
                    </thead>
                    <tbody id="myTable">
                      @foreach($tasks as $task)
                        <tr style="background-color: <?php
                            if($task->urgency == 0 )
                                echo  "#dff0d8" ;
                            else if ($task->urgency == 1)
                                echo  "#fcf8e3" ;
                            else
                            echo  "#f2dede"

                            ?>

                        "> 
                          <td  >{{$task->project()->first()->name}}</td>
                          <td  > {{$task->id}}</td>
                          <td  >
                            {{$task->description}}
                          
                          <td  > {{$task->quantity}}</td>
                            <td> {{$task->doneQuantity}}</td>
                          </td>
                           <td  >
                            <?php
                              $reps  = $task->tasks()->get();
                             ?>
                              
                             
                        <!-- RESPONSIBILTY DRO DOWN MENUE  -->
                            @foreach($reps as $res)
                                <a style="color: blue" class="dropdown-item" href="/dashboard/profile/ {{$res->user()->first()->id}}"> {{$res->user()->first()->name}}
                                  
                                </a>
                              <?php $responsibility =$res->user_id;  ?>    
                            @endforeach
                        <!-- END RESPONSIBILTY  -->

                                 
                           
                        </td>
                        <td  >
                           @if($task->isApproved == 0)
                                {{$task->created_at}} by user
                            @elseif ($task->isApproved)
                              @if(is_null($task->approveTaskDate))
                                  {{$task->created_at}} by admin
                              @else
                                <p> {{$task->created_at}}</p>
                                <p> approved at </p>
                                <p> {{$task->approveTaskDate}}</p>

                              @endif
                            @endif
                        </td>
                        <td  >{{$task->dueDate}}</td>
                          <td  >  
                            <?php
                             $papers = $task->task_papers()->get();
                             $destination ="" ;
                               foreach( $papers as  $paper) {
                                $destination = $paper->destination;
                               }
                             ?>
                                <a href="/dashboard/task/downloadPaper/{{ $destination}}"> 
                                  <b> <i>{{$task->status}}</i> </b> 
                               </a>
                            @if($task->status == 'transfer')
                             
                               <span style="color: red"> to </span>
                               <?php
                                  $user = user::find($task->alternative);
                               ?>
                                {{$user->email}} 

                            @elseif($task->status == 'late')

                             {{$task->lateDate}}
                           
                            @endif
                          </td>

                          <td>
                            {{$task->statusDate}}
                          </td>
                          <td >
                            <div class="row">
                              <!-- notApproved -->
                             
                              @if($task->isApproved == 0)
                                <div class="col-md-6">
                                    <form action = "{{ route ('taskConfirmation')}}" method="post">
                                      @csrf
                                      <input type="hidden" name="id" value="{{$task->id}}">
                                      <button type="submit" class="btn btn-success showTitle" title="approve task">
                                        
                                        <i class="fa fa-check" aria-hidden="true"></i>      

                                      </button>          
                                    </form>   
                                  </div>
                                  <div class="col-md-6"> 

                                     <form action = "{{ route ('taskDenay')}}" method="post">
                                      @csrf
                                      <input type="hidden" name="id" value="{{$task->id}}">
                                      <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash" aria-hidden="true"></i>      

                                      </button>
                                    </form>
                                 </div>
                              
                              @elseif(is_null($task->status))
                              <div class="col-md-12">
                                <p> not updated yet </p>
                                </div>
                              @elseif(!is_null($task->status))
                                <!-- check if approved transfered -->
                                 @if($task->alternative != $responsibility )
                                   <div class="col-md-6"> 
                                        <form action = "{{route('statusConfirmation')}}" method="post">
                                          @csrf
                                          <input type="hidden" name="id" value="{{$task->id}}">
                                          <button type="submit" class="btn btn-success showTitle" title="approve Status" >
                                            
                                           <i class="fa fa-check" aria-hidden="true"></i>          

                                          </button> 
                                        </form>
                                    </div>
                                    <div class="col-md-6">
                                        <form action = "{{route('statusDenay')}}" method="post">
                                          @csrf
                                          <input type="hidden" name="id" value="{{$task->id}}">
                                          <button type="submit" class="btn btn-danger">
                                            
                                            <i class="fa fa-trash" aria-hidden="true"></i>          

                                          </button>
                                        </form>
                                    </div>
                                @else 
                                <div class="col-md-12"> 
                                    <p> not updated yet </p>
                                </div>


                              @endif


                              
                              @endif
                            </div>

                          </td>
                          <td  >
                           <?php $notes = $task->notes()->get() ?>
								@foreach($notes as $note)
								  <p style="background-color : #b3d7ff"> <b> {{$note->note}} <b> <p> 
								
								@endforeach
                          </td>
                        </tr>
                      @endforeach

                      
                    </tbody>
        </table>
        </div> 
     </div>
      
  </div>
    
</div>
@endsection
