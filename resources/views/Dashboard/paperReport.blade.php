@extends('layouts.dashboard')
@section('dashboard_heading')
  <p> PAPERS REPORT </p>
@endsection
@section('dashboard_content')
<div class="container">
  <!-- search -->
  <div class="row">
    <div class="col-md-4 offset-md-4 mt-4">
      <input class="form-control" id="myInput" type="text" placeholder="Search..">
    </div>
  </div>
  <!-- end search -->

		<div class="row mt-4" style=" white-space: nowrap;">
			<div class="col-md-12">
				<div style="overflow-x:auto; overflow-y: auto;  height:500px;
                      ">
                    <table class="table table-bordered table-fixed"
                          
                         >
  		              	<thead class="thead-dark">
                			  <tr>
                			  	<th> User/paper</th>
                			 		@foreach ($papers as $paper)
                			 			<th> {{$paper->name}} </th>
                			 		@endforeach
                         
                			  </tr>
                			</thead>
                			<tbody id="myTable">
                				@foreach($users as $user)
                				<?php 
                					$usePapers = $user->user_papers()->get();
                				?>
                				    <tr onmouseover="this.style.color='grey'" onmouseout="this.style.color='black'" >
                    					<td>{{$user->name}}</td>
                    					@foreach ($papers as $paper)
                    						@if($usePapers->isEmpty())
                    							<td style="background-color: #C85250">NULL</td>
                    						@else
                    						    @foreach($usePapers as $userPaper)
                        							@if($userPaper->paper == $paper->name)
                        								<td style="background-color: #FFE9E4">
                        									<a href="/dashboard/structure/downloadPaper/{{$userPaper->destination}}"> {{$userPaper->paper}}	 </a>
                        								</td>
                        							@else 
                        								<td style="background-color:#C85250">NULL</td>
                        							@endif
                        						@endforeach
                        					@endif
                			 			@endforeach
                    					
      			                    </tr>
  			                    @endforeach
                               
                			</tbody>
                	</table>
                            

              	</div>			
		</div>		
	</div>
</div>
 @endsection

