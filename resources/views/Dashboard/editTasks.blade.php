@extends('Dashboard.structure')
@section('dashboard_heading')
  <p> ALL TASKS  </p>
@endsection
@section('structure_content') 
 <div class="container">
   <div id="app-tasks">
      <tasks-component> </tasks-component>
   </div>
    
</div>
 <!-- End of user section -->
@endsection
<!-- add scripts  -->
@section('dashboard_scripts') 
 <script src="{{ asset('js/app.js') }}"></script>
@endsection
