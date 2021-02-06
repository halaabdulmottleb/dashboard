@extends('Dashboard.structure')
@section('dashboard_heading')
  <p> FAMILIES </p>
@endsection
@section('structure_content') 
  <div id="app-tasks">
    <div class="row">
      <div class="col-md-12">
        <family-component :family ="{{$family}}"></family-component>
      </div>
      
    </div>
    
  </div>
 @endsection
 @section('dashboard_scripts') 
 <script src="{{ asset('js/app.js') }}"></script>
 @endsection
