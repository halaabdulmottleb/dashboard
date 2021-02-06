@extends('Dashboard.structure')
@section('dashboard_heading')
  <p> DONE TASKS </p>
@endsection
@section('structure_content') 
<div class="container">
  <!-- urgency -->
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
  <!-- end urgency -->
  <!-- search -->
  <div class="row">
    <div class="col-md-4 offset-md-4 mt-4">
      <input class="form-control" id="myInput" type="text" placeholder="Search..">
      <a href="/dashboard/Tasks/print" class="btn btn-primary  btn-lg btn-block mt-4">PRINT <i class="fa fa-arrow-right" aria-hidden="true"></i>
</a>

    </div>
  </div>
  <!-- end search -->
	<div class="row">
	  <div class="col-md-10 offset-md-1 mt-4">
		<div style="overflow-x:auto; overflow-y: auto;
                      ">
                    <table class="table table-bordered table-fixed"
                          
                         >
  			 <thead class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Project</th>
                        <th scope="col">Description</th>
                         <th scope="col">Quantity</th>
                        
                       
                        <th scope="col">Responsibility</th>
                        <th scope="col">Status</th>
                        <th scope="col">Dates</th>
                        <th scope="col"> </th>
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
                        <td> {{$task->id}}</td>
                        <td><a href="/dashboard/project/tasks/{{$task->project()->first()->id}}">  {{$task->project()->first()->name}} </a></td>
                        <td> {{$task->description}} </td>
                        <td> {{$task->quantity}} </td>
                        
                        <td>
                            <?php
                              $reps  = $task->tasks()->get();
                             ?>
                              
                             
                        <!-- RESPONSIBILTY DRO DOWN MENUE  -->
                            @foreach($reps as $res)
                                <a class="dropdown-item" href="/dashboard/profile/ {{$res->user()->first()->id}}"> {{$res->user()->first()->name}}
                                </a>
                                           
                            @endforeach
                        <!-- END RESPONSIBILTY  -->

                                 
                           
                        </td>
                        <td>
                          <?php
                              $paper = $task->task_papers()->first();
                          ?>
                         @if(isset($paper))
                          <a href="/dashboard/task/downloadPaper/{{$paper->destination}}"> 
                            <b> <i>{{$task->status}}</i> </b> 
                          </a>
                         @else 
                             <b > <i>{{$task->status}}</i> </b> 
                         @endif
                         
                           
                        </td>
                        <td>
                          <!-- dates collaps  -->
                          <p>
                           <a class="btn btn-primary" data-toggle="collapse" href="#collapse{{$task->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                              Dates
                            </a>
                          </p>
                          <div class="collapse" id="collapse{{$task->id}}">
                            <div class="card card-body">
                             
                                <!-- end date -->
                                <p> Due Date : </p> <p>{{$task->dueDate}}</p>
                                 @if($task->isApproved == 0)
                                  <p> Created by user at : </p>  <p> {{$task->created_at}} </p> 
                                  @elseif ($task->isApproved)
                                    @if(is_null($task->approveTaskDate))
                                    <p> Created by admin at : </p>   <p> {{$task->created_at}} </p> 
                                    @else
                                       <p> Created by user at : </p>
                                      <p> {{$task->created_at}}</p>
                                      <p> approved at </p>
                                      <p> {{$task->approveTaskDate}}</p>      

                                    @endif
                                  @endif
                                <p> Updated at :</p> <p> {{$task->statusDate}}</p>
                                <p> Confirmed at : </p> <p> {{$task->statusDateApp}}</p>
                            </div>
                          </div>

                           
                        </td>
                        <td> 
                            <div class="btn-group btn-group-toggle" >
                                 <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$task->id}}">
                                  <i class="fa fa-trash" aria-hidden="true"></i>
                                </button> 
                               
                            </div>

                        </td>
                      </tr>
                      <!-- delete modal -->
                      <div class="modal fade" id="deleteModal{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">{{$task->description}} </h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body" style="color: red">
                              If you delete task all data in relation with will be deleted .
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <form method="post" action="{{ route ('deleteTask') }}">
                                @csrf
                               <input type="hidden" value="{{$task->id}}" name="id">
                                <input type="submit" class="btn btn-danger" value="Delete">
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                     <!-- end delete modal -->
                      <!-- edit modal -->
                      <div class="modal fade" id="editModal{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">{{$task->description}} </h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body" >
                              
                             <form method="post" action="{{ route ('editTask')}}">
                               @csrf
                                 <!-- Task -->
                                 <input type="hidden" name="id" value="{{$task->id}}">
                              
                                     <!-- project Name -->
                                        <div class="form-row">
                                         <div class="form-group col-md-12">
                                             <label for="description">Description</label>
                                             <input type="text" class="form-control" id="description" name="description">
                                             {!! $errors->first('description', '<small style="color:red;">:message</small>') !!}                       
                                         </div>
                                        </div>
                                        <!-- end Task Name -->
                                        <!-- task description -->
                                        <div class="form-row">
                                          <div class="form-group col-md-12">
                                            <label for="objDescription">Responsibilty</label>
                                            <select id="user" class="form-control" name="user">
                                              @foreach ($users as $user)
                                               <option value="{{$user->id}}">{{$user->id}} - {{$user->name}}</option>
                                               @endforeach
                                             </select>               
                                             {!! $errors->first('objective', '<small style="color:red;">:message</small>') !!}

                                          </div>
                                        </div>
                                        <!-- end task description -->
                                        <!-- due time date -->
                                         <div class="form-row">
                                           <div class="form-group col-md-12">
                                            <label>Due Date</label>
                                             <input type="date" class="form-control" id="date" name="date">
                                             {!! $errors->first('date', '<small style="color:red;">:message</small>') !!}
                                             
                                           </div>
                                           
                                         </div>                       

                                        <!-- end due time date -->                       
                                 <!-- end of project -->
                                 
                                 <br>
                                 <button type="submit" class="btn btn-primary">Add</button>
                             </form>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                             
                            </div>
                          </div>
                        </div>
                      </div>
                     <!-- end edit modal -->
                     
                    @endforeach
                      
                    </tbody>
        </table>
     </div>
			
	</div>
		
</div>
@endsection
