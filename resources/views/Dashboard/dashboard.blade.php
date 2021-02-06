@extends('layouts.dashboard')
@section('dashboard_content')
<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2 mt-4">
			<div class="card text-center">
  				<div class="card-body">
  				  <h5 class="card-title">Dashboard</h5>
  				  <p class="card-text">Welcome , {{Auth::user()->name}}</p>
  				</div>
			</div>
		</div>
	</div>
</div>
@endsection