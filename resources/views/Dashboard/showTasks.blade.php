@extends('Dashboard.structure')
@section('structure_content') 
<div class="container">
  <!-- search -->
  <div class="row">
    <div class="col-md-4 offset-md-4 mt-4">
      <input id="myInput" type="text" placeholder="Search..">
    </div>
  </div>
  <!-- end search -->
	<div class="row">
	  <div class="col-md-10 offset-md-1 mt-4">
		<table class="table">
  			 <thead class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Task</th>
                        <th scope="col">Status</th>
                        
                      </tr>
                    </thead>
                    <tbody id="myTable">
                      @foreach($tasks as $task)
                        <tr> 
                          <td>{{$task->id}}</td>
                          <td>{{$task->description}}</td>
                          <td>{{$task->status}}</td>
                        </tr>
                      @endforeach

                      
                    </tbody>
        </table>
     </div>
			
	</div>
		
</div>
@endsection