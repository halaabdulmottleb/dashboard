@extends('Dashboard.structure')
@section('dashboard_heading')
  <p> PROFILES </p>
@endsection
@section('structure_content') 
	<div id="app-tasks">
		<div class="row">
			<div class="col-md-12">
				<user-component></user-component>
			</div>
			
		</div>
		
	</div>
 @endsection
 @section('dashboard_scripts') 
 <script src="{{ asset('js/app.js') }}"></script>
@endsection
