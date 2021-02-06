<?php
use App\branch;
?>
@extends('layouts.dashboard')
@section('dashboard_heading')
  <p> OBJECTIVES </p>
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
                      height:500px;">
                    <table class="table table-bordered table-fixed"
                          
                         >
  			<thead class="thead-dark">
  			  <tr>
  			    <th scope="col">objective ID</th>
  			    <th scope="col">objective description</th>
  			    <th scope="col">Projects</th>
  			   
            <th><a href="/dashboard/objectives" class="btn btn-outline-primary float-right">
  							<i class="fa fa-plus float"></i>
					</a></th>
  			  </tr>
  			</thead>
  			<tbody id="myTable">
  			 @foreach($objectives as $objective)
  			  <tr>
  			  		<td>{{$objective->id}} </td>
  			  		<td>{{$objective->description}} </td>
  			  		<td>
  			  			<?php
  					    		$projects = $objective->projects()->get();

  					    	?>
  					    	
  					    	@foreach($projects as $project) 

                     <a  class="dropdown-item" href="/dashboard/project/tasks/{{$project->id}}">{{$project->name}} - 
                      ( 
                        <?php 
                            $branch = branch::find($project->branch) ;
                        ?>
                      {{$branch->name}})
                    </a>
  					    	@endforeach
  					  </td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <!-- delete button -->
                    <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$objective->id}}">
                      <i class="fa fa-trash" aria-hidden="true"></i>
                    </button> 
                    <!-- edit button -->
                      <button class="btn btn-success" data-toggle="modal" data-target="#editModal{{$objective->id}}">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>

                    </button>
                </div>
              
              </td>
  			  	
  			   
  			    
  			  </tr>
  			<!-- delete modal -->
          <div class="modal fade" id="deleteModal{{$objective->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">{{$objective->description}} </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" style="color: red">
                  If you delete objective all data in relation with will be deleted .
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <form method="post" action="{{ route ('deleteObjective') }}">
                    @csrf
                    <input type="hidden" value="{{$objective->id}}" name="id">
                    <input type="submit" class="btn btn-danger" value="Delete">
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- end delete modal -->
          <!-- edit modal -->
          <div class="modal fade" id="editModal{{$objective->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">{{$objective->description}} </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" >
                  <form method="post" action="{{ route ('editObjective') }}">
                    @csrf
                    <input type="hidden" value="{{$objective->id}}" name="id">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                          <label>Description</label>
                          <input type="text" name="description" class="form-control" value="{{$objective->description}}">
                           {!! $errors->first('description', '<small style="color:red;">:message</small>') !!}
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success float-right" value="update">
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">
                      Close
                  </button>
                </div>
              </div>
            </div>
          </div>
          
  			 @endforeach
  			 
  			</tbody>
        </table>
     </div>
			
	</div>
		
</div>

@endsection
