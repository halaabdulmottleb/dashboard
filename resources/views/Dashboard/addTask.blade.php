@extends('layouts.dashboard')
@section('dashboard_content')
<div class="container">
<br> <br>
<div id="user" class="mt-4">
  <div class="row">
    <div class="col-md-4 offset-md-4">
      <h3 style="color: grey">Add Task</h3>
    </div>
    <div class="col-md-8 offset-md-2">

      <form method="post" action="{{ route ('addProject')}}">
        @csrf
          
        <!-- project description -->
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="objDescription">Project</label>
              <select id="objective" class="form-control" name="id">
                @foreach ($projects as $project)
                 <option value="{{$project->id}}">{{$project->id}} - {{$project->description}}</option>
                 @endforeach
               </select>               
               {!! $errors->first('objective', '<small style="color:red;">:message</small>') !!}

            </div>
          </div>
          <!-- end of project Description -->
          <!-- Task -->
          <fieldset class="border p-2">

    		      <legend style="color: grey">Task:</legend>
              <!-- project Name -->
               	 <div class="form-row">
               	 	<div class="form-group col-md-12">
               	 	    <label for="projectName">Description</label>
               	 	    <input type="text" class="form-control" id="projectName" name="projectName">
                      {!! $errors->first('projectName', '<small style="color:red;">:message</small>') !!}

               	 	</div>
               	 </div>
                 <!-- end Task Name -->
                 <!-- task description -->
               	 <div class="form-row">
               	 	<div class="form-group col-md-12">
               	 	    <label for="proDescription">Responsibility</label>
               	 	    <input type="text" class="form-control" id="proDescription" name="proDescription">
                      {!! $errors->first('proDescription', '<small style="color:red;">:message</small>') !!}

               	 	</div>
               	 </div>
                 <!-- end task description -->
                 <!-- due time date -->
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <input type="date" class="form-control" id="date" name="date">
                      {!! $errors->first('date', '<small style="color:red;">:message</small>') !!}
                      
                    </div>
                    
                  </div>

                 <!-- end due time date -->

               
      
            </fieldset>
          <!-- end of project -->
          
           
          <br>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
    </div>
  </div>
</div>
@endsection