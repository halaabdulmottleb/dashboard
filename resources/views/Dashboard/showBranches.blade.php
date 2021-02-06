@extends('Dashboard.structure')
@section('structure_content') 
<div class="container">
  

      <a class="float-right" href="/dashboard/structure/addBranch"><button  type="button" class="btn btn-outline-primary" >
                <i class="fa fa-plus"></i>
          </button></a>
          <br> <br>
	<div class="row">

	@foreach($branches as $branch)
		<div class="col-md-4 mt-4">
			<div class="card text-center">
  				<div class="card-header">
  				  {{$branch->id}}
  				</div>
  				<div class="card-body">
  				  <h5 class="card-title"> {{$branch->name}}</h5>
            <div class="btn-group" role="group" aria-label="Basic example">

  				  <a href="/dashboard/structure/showBranch/{{$branch->id}}" class="btn btn-primary"><i class="fa fa-line-chart" title="Statistics"></i></a>
            <!-- Button trigger modal -->
            @if(Auth::user()->branch != $branch->id)
             <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal{{$branch->id}}">
              <i class="fa fa-trash" title="Statistics"></i>
             </button>
             @endif

             <!-- delete modal -->
             <div class="modal fade" id="modal{{$branch->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">{{$branch->name}}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body" style="color: red">
                      Are you sure ? 
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <a type="button" class="btn btn-danger" href="/dashboard/structure/Branch/delete/{{$branch->id}}">Delete</a>
                    </div>
                  </div>
                </div>
              </div>

             <!-- end delete -->

           </div>

            
  				</div>
			</div>
		</div>
	@endforeach
		
	</div>
	
</div>

@endsection