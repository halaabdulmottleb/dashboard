@extends('layouts.dashboard')

@section('dashboard_content')
<div class="container">
  <div class="row ">
    <div class="col-md-4 offset-md-4 mt-4">
      <div class="card" style="width: 18rem;">
        <ul class="list-group list-group-flush text-center">
          <li class="list-group-item"> <p> <b> <i> Name :  </i> </b>{{$project->name}}</p> </li>
          <li class="list-group-item"><p> <b> <i> Location : </i> </b> {{$project->location}}</p></li>
          <li class="list-group-item"><p> <b> <i> Description : </i> </b> {{$project->description}}</p></li>
        </ul>
      </div>
    </div>
    
  </div>
	<div class="row">
	  <div class="col-md-10 offset-md-1 mt-4">
		<table class="table">
  			<thead class="thead-dark">
  			  <tr>
  			    <th scope="col">task ID</th>
            <th scope="col">task description</th>
            <th scope="col">Urgency</th>
            <th scope="col">task status</th>
            <th scope="col">task responsibility</th>
  			 
           <th scope="col">
              <a href="/dashboard/addProject"><button type="button" class="btn btn-outline-primary" >
                <i class="fa fa-plus"></i>
          </button></a>
            </th>
  			  </tr>
  			</thead>
  			<tbody>
          @foreach($tasks as $task)
  			  <tr>
  			    <th scope="row">{{$task->id}}</th>
  			    <td>{{$task->description}}</td>
            <!-- urgency -->
            <td>
              @if($task->urgency == 0)
                 <span style="color:green ; background-color: green">U</span></td>

              @elseif($task->urgency == 1)
                  <span style="color:orange ; background-color: orange">U</span></td>

              @else
                 <span style="color:red ; background-color: red">U</span></td>
              @endif
            </td>
            <!-- end urgency -->
  			    <td>{{$task->status}}</td>
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
  			  </tr>
         
     
           @endforeach
  			   
  			</tbody>
        </table>
     </div>
			
	</div>
		
</div>



	

	

@endsection