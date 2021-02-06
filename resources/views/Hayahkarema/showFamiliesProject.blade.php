@extends('Dashboard.structure')
@section('dashboard_heading')
  <p> show Families </p>
 <p class="text-center"> أسر  {{$project->name}} </p>
@endsection
@section('structure_content') 
  
    <div class="row">

      <div class="col-md-12">
		 <div style="overflow-x:auto; overflow-y: auto;
             height:500px;">
                <table class="table table-bordered table-fixed"
            
            padding:2px;"
            >
  			<thead class="thead-dark">
  			  <tr>
  			    <th scope="col">ID</th>
  			    <th scope="col">محافظة</th>
                <th scope="col">مركز</th>              
  			    <th scope="col">قرية </th>
  			    <th scope="col">وحدة</th>
  			    <th scope="col">مستفيد</th>
  			    <th scope="col">عنوان</th>
   			   
   			   
  			  </tr>
  			</thead>
  			<tbody id="myTable" >
  				@foreach($families as $family)
  					<tr>
  						<td><a href="/dashboard/Family/{{$family->id}}/show">{{$family->id}}</a></td>
  						<td>{{$family->mohafza}}</td>
  						<td>{{$family->markaz}}</td>
  						<td>{{$family->qarya}}</td>
  						<td>{{$family->we7da}}</td>
  						<td>{{$family->mostafid}}</td>
  						<td>{{$family->address}}</td>
  						
  					</tr>
  				@endforeach
  			</tbody>
  		</table>
      </div>
      
    </div>
    
  </div>
 @endsection
 @section('dashboard_scripts') 
 @endsection
