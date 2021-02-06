@extends('Dashboard.structure')
@section('dashboard_heading')
  <p> ADD BRANCH  </p>
@endsection
@section('structure_content') 
<!-- branch -->
 <div id="branch"  class="mt-4">
  <div class="row">
    <div class="col-md-4 offset-md-4">
      <h3 style="color: grey">Add Branch</h3>
    </div>
    <div class="col-md-8 offset-md-2">
      <form method="post" action="{{ route('addBranch') }}" >
        @csrf
          <div class="form-row">
            <!-- Name -->
            <div class="form-group col-md-12">
              <label for="branchName">Name</label>
              <input type="text" class="form-control" id="branchName" name="branchName">
              {!! $errors->first('branchName', '<small style="color:red;">:message</small>') !!}
            </div>
          </div>
          <button type="submit" class="btn btn-primary float-right ">Add</button>
      </form>
    </div>
  </div>
 </div>

 <!-- end of branch -->
 @endsection