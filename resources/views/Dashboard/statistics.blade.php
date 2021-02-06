@extends('Dashboard.structure')
@section('dashboard_CSS')
<link rel="stylesheet" href="{{ asset('css/statistics.css')}}">
@endsection
@section('structure_content') 
  <div id="app-tasks">
         <statistics> </statistics>
   </div>
 @endsection
@section('dashboard_scripts') 
  <script src="{{ asset('js/app.js') }}"></script>
@endsection
