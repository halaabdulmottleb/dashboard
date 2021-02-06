@extends('layouts.dashboard')
@section('dashboard_content')
<div class="container">
<br> <br>
<div id="user" class="mt-4">
  <div class="row">
    <div class="col-md-4 offset-md-4">
      <h3 style="color: grey">Add Objectives</h3>
    </div>
    <div class="col-md-8 offset-md-2">

      <form method="post" action="{{ route ('addObjective')}}"  autoComplete="off">
        @csrf
          
        <!-- Objective description -->
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="objDescription">Objective Description</label>
              <input type="text" class="form-control" id="objDescription" name="objDescription" >
               {!! $errors->first('objDescription', '<small style="color:red;">:message</small>') !!}

            </div>
          </div>
          <!-- end of ojective Description -->
          <!-- project -->
          <fieldset class="border p-2">

    		      <legend style="color: grey">Projects:</legend>
              <!-- project Name -->
               	 <div class="form-row">
               	 	<div class="form-group col-md-12">
               	 	    <label for="projectName">Project</label>
               	 	    <input type="text" class="form-control" id="projectName" name="projectName">
                      {!! $errors->first('projectName', '<small style="color:red;">:message</small>') !!}

               	 	</div>
               	 </div>
                 <!-- end project Name -->
                 <!-- project description -->
               	 <div class="form-row">
               	 	<div class="form-group col-md-12">
               	 	    <label for="proDescription">Project Description</label>
               	 	    <input type="text" class="form-control" id="proDescription" name="proDescription">
                      {!! $errors->first('proDescription', '<small style="color:red;">:message</small>') !!}

               	 	</div>
               	 </div>
                 <!-- end project description -->

                 <!-- project Location -->
 			           <div class="form-row">
               	  	<div class="form-group col-md-12">
               	 	    <label for="projectLocation" >Project Location</label>
               	 	    <input type="text" class="form-control" id="projectLocation" name="projectLocation">
                      {!! $errors->first('projectLocation', '<small style="color:red;">:message</small>') !!}

               	  	</div>
               	  </div>
                  <!-- end project Location -->
                    <!-- project Branch -->
                   <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="projectLocation" >Project Branch</label>
                      <select name="branch"  class="form-control" >
                        @foreach ($branches as $branch)
                          <option value="{{$branch->id}}">{{$branch->id}} - {{$branch->name}} </option>
                          @endforeach
                        </select>               
                        {!! $errors->first('branch', '<small style="color:red;">:message</small>') !!}
                    </div>
                  </div>

                  <!-- end brNCH -->
      
            </fieldset>
          <!-- end of project -->
          
           
          <br>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
    </div>
  </div>
</div>
@endsection