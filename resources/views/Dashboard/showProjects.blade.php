<?php
use App\branch;

?>
@extends('layouts.dashboard')
@section('dashboard_heading')
  <p> PROJECTS </p>
@endsection
@section('dashboard_content')
<div class="container">
  <!-- search -->
  <div class="row">
    <div class="col-md-4 offset-md-4 mt-4">
      <input class="form-control" id="myInput" type="text" placeholder="Search..">
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
  			    <th scope="col">Branch</th>
            <th scope="col">Project ID</th>
  			    <th scope="col">Project Name</th>
  			    <th scope="col">Location</th>
   			    <th scope="col">Control</th>
            <th scope="col">Show/Export  <a href="/dashboard/addProject"><button type="button" class="btn btn-outline-primary showTitle float-right" title="Add project">
                <i class="fa fa-plus"></i>
          </button></a></th>
           
  			  </tr>
  			</thead>
  			<tbody id="myTable">
          @foreach($projects as $project)
  			  <tr>
  			    <th scope="row">
              <?php
                $branch = branch::find($project->branch);


              ?>
              {{ $branch->name}}
            </th>
            <th scope="row">{{$project->id}}</th>
  			    <td>{{$project->name}}</td>
  			    <td>{{$project->location}}</td>
  			    <td>
  			    	<div class="btn-group btn-group-toggle" >
         
          		  
                <!-- end show -->
                <!-- add -->
						    <button type="button" class="btn btn-primary showTitle" data-toggle="modal" data-target="#AddModal{{$project->id}}"  title="Add Task">
  								<i class="fa fa-plus"></i>
						    </button>
                <!-- end add -->

                    <!-- edit button -->
                <button class="btn btn-success showTitle" data-toggle="modal" data-target="#editModal{{$project->id}}" title="Edit">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>

                </button>
                <!-- delete button -->
                <button class="btn btn-danger showTitle" data-toggle="modal" data-target="#deleteModal{{$project->id}}" title="Delete">
                      <i class="fa fa-trash" aria-hidden="true"></i>
                </button> 
						 
			    	 </div>
  			    </td>

            <td>
              <!-- show -->
              <a href="/dashboard/project/tasks/{{$project->id}}"class="btn btn-warning showTitle" title="show project"> 
                  <i  class="fa fa-eye"></i>
                <a>
                  <!-- export it open a modal to choose form-to date  -->
                <button class="btn btn-warning showTitle" title="export project" data-toggle="modal" data-target="#exportModal{{$project->id}}">
                      <i  class="fa fa-file" ></i>
              </button>
              <!--  <a href="/excel/project/{{$project->id}}"class="btn btn-warning showTitle" title="export project"> 
                  <i  class="fa fa-file" ></i>
               <a> -->


                  
            </td>
  			  </tr>
         
          <!-- Add Modal -->
            <div class="modal fade" id="AddModal{{$project->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="AddModal{{$project->id}}" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="AddModal">{{$project->name}}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <!-- branch -->
                    <form method="post" action="/dashboard/addTask/{{$project->id}}">
                      @csrf
                      <input type="hidden" value="{{$project->id}}" name="project">
                        <!-- Task -->
                        <div class="form-row">
                          <div class="form-group col-md-12">
                            <label for="taskInput">Task</label>
                            <input type="text" class="form-control" id="taskInput"   name="taskInput">
                          </div>
                        </div>
                        <!-- end task -->
                         <!-- Task -->
                        <div class="form-row">
                          <div class="form-group col-md-12">
                            <label for="taskInput">Quantity</label>
                            <input type="number" class="form-control" id="quantity"   name="quantity">
                          </div>
                        </div>
                        <!-- end task -->
                        
                        <div class="form-row">
                          <div class="form-group col-md-12">
                            <label for="inputEmail4">Responsibilty</label>
                            <select id="disabledSelect" class="form-control" name="ResponsibiltyInput">
                                  @foreach($users as $user)
                                    <option value="{{$user->id}}"> {{$user->name}} - {{$user->email}}</option>
                                  @endforeach
                            </select>
                          </div>
                        </div>
                        
                        <!-- urgency -->
                        <div class="form-row">
                          <div class="form-group col-md-12">
                            <label for="inputEmail4">Urgency</label>
                            <select id="disabledSelect" class="form-control" name="urgency">
                                 <option style="color: red" value="2">Important</option>
                                 <option style="color: orange" value="1">less Important</option>
                                 <option style="color: green" value="0">Normal</option>
                            </select>
                          </div>
                        </div>
                        <!-- end urgency -->
                        
                        <!-- due time date -->
                        <div class="form-row">
                          <div class="form-group col-md-12">
                            <input type="datetime-local" class="form-control" id="date" name="dueDate">
                            {!! $errors->first('date', '<small style="color:red;">:message</small>')      !!}
                      
                          </div>
                          
                        </div>

                 <!-- end due time date -->
                       
                        <button type="submit" class="btn btn-primary float-right">Add</button>
                    </form>
                  <!-- end of branch -->
        
                      </div>
                    </div>
                  </div>
                </div>
              <!-- End of add modal -->
              <!-- Edit Modal -->
            <div class="modal fade" id="editModal{{$project->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="AddModal{{$project->id}}" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="AddModal">{{$project->name}}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <!-- branch -->
                    <form method="post" action="{{route('editProject')}}">
                      @csrf
                      <input type="hidden" value="{{$project->id}}" name="project">
                      <!-- name -->
                        <div class="form-row">
                          <div class="form-group col-md-12">
                            <label for="taskInput">Name</label>
                            <input type="text" class="form-control" id="name"   name="name">
                          </div>
                        </div>
                        <!-- end name -->
                        <!-- description -->
                        <div class="form-row">
                          <div class="form-group col-md-12">
                            <label for="taskInput">Description</label>
                            <input type="text" class="form-control" id="description"   name="description">
                          </div>
                        </div>
                        <!-- end description -->
                        <!-- location -->
                        <div class="form-row">
                          <div class="form-group col-md-12">
                            <label for="taskInput">Location</label>
                            <input type="text" class="form-control" id="location"   name="location">
                          </div>
                        </div>
                        <!-- end location -->
      
                        <button type="submit" class="btn btn-primary float-right">Update</button>
                    </form>
                  <!-- end of branch -->
        
                      </div>
                    </div>
                  </div>
                </div>
              <!-- End of Edit modal -->
                <!-- delete modal -->
                 <div class="modal fade" id="deleteModal{{$project->id}}" tabindex="-1" role="dialog"aria-labelledby="exampleModalLabel" aria-hidden="true">
                   <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">{{$project->name}} </h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body" style="color: red">
                          If you delete objective all data in relation with will be deleted .
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <form method="post" action="{{ route ('deleteProject') }}">
                            @csrf
                            <input type="hidden" value="{{$project->id}}" name="id">
                            <input type="submit" class="btn btn-danger" value="Delete">
                          </form>
                        </div>
                      </div>
                    </div>
                 </div>
                  <!-- end delete modal -->

                  <!-- export modal -->
                  <!-- Modal -->
                  <div class="modal fade" id="exportModal{{$project->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-body">
                         <!-- form to select from to data -->
                          <form method="get" action=" {{route('exportProject')}} ">
                            <input type="hidden" name="id" value="{{$project->id}}">
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="inputEmail4">From</label>
                                <input type="date" class="form-control" id="formInput" name="fromInput"  required >
                              </div>
                              <div class="form-group col-md-6">
                                <label for="inputPassword4">To</label>
                                <input type="date" class="form-control" id="toInput" name="toInput" required >
                              </div>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Export</button>
                          </form>
                         <!--end form  -->
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- end export modal -->
              
           @endforeach
  			   
  			</tbody>
        </table>
     </div>
			
	</div>
		
</div>


@endsection
