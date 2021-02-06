@extends('Dashboard.structure')
@section('dashboard_heading')
  <p> FAMILIES </p>
@endsection
@section('structure_content') 
<!-- branch -->
 <div id="branch"  class="mt-4">
  <div class="row">
    <div class="col-md-4 offprojectset-md-4">
      <h3 style="color: grey"></h3>
    </div>
           
        </table>
    </div>
 
    <!-- end test table -->
    <div class="col-md-12">
    <table class="table " id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th scope="col">Project</th>
                <th scope="col"></th>
             
              </tr>
            </thead>
            <tbody>
              @foreach($projects as $project)
              <tr>
                <td>
                  {{$project->id}} - {{$project->name}} 
                </td>
                <td>
                  <form method="post" action="/dashboard/addFamily"> 
                    @csrf
                    <input type="hidden" name="project" value="{{$project->id}}">
                    <div class="btn-group float-right" role="group" aria-label="Basic example">
                      <button type="submit" class="btn btn-secondary">ADD</button>
                      <a href="/dashboard/Family/project/{{$project->id}}/show" class="btn btn-secondary" >SHOW</a>
                      
                    </div>
                   </form>
                    
                </td>
              </tr>
              @endforeach
             
            </tbody>
          </table>
    </div>
  </div>
 </div>

 <!-- end of branch -->
 @endsection