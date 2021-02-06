@extends('Dashboard.structure')
@section('structure_content') 
    <!-- statistics Section  -->
<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<div class="card">
   				<div class="col-md-4 mt-4">
              <div id="piechart"></div>
              <!-- pieChart -->
               <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

               <script type="text/javascript">
          // Load google charts
               google.charts.load('current', {'packages':['corechart']});
               google.charts.setOnLoadCallback(drawChart);

          // Draw the chart and set the chart values
                function drawChart() {
                  var data = google.visualization.arrayToDataTable([
                  ['Task', 'Hours per Day'],
                  ['Delayed', {{$data['delay']}}],
                  ['canceled', {{$data['canceled']}}],
                  ['late', {{$data['late']}}],
                  ['done', {{$data['done']}}],
                    ]);
        
          // Optional; add a title and set the width and height of the chart
                  var options = {'title':'  ', 'width':500, 'height':300};

            // Display the chart inside the <div> element with id="piechart"
                  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                  chart.draw(data, options);
                }
                </script>  
            </div>
   			 	<div class="card-body">
   			 	  <h5 class="card-title">{{$user->name}} - {{$user->email}} </h5>
   			 	  <hr>
            <p style="color: grey">PAPER</p>
   			 	  <?php 
   			 	  		$papers = $user->user_papers()->get();
   			 	  ?>
   			 	  <div class="row">
              @if($papers->count()== 0)
              <div class="col-md-4 offset-md-4">
                
   			 	  	<p style="color: red"> HAS NO PAPERS YET </p>
              </div>
              @endif
              <!-- paper list -->
              <ul> 
   			 	 	 @foreach($papers as $paper)
   			 	  		<li>
   			 	  			 <a href="/dashboard/structure/downloadPaper/{{$paper->destination}}">	 <i>{{ $paper->paper}} </i>

   			 	  			</a>

   			 	  	   </li>


                  <small style="color: grey">{{$paper->created_at}}</small>
                  <br>
                  <form method="post" action="{{route('deleteUserPaper' , $paper->id)}}">
                    @csrf
                    
                    <input type="submit" value="delete" class="btn btn-danger">
                  </form>
                 
                   <br><br>
                   
   			 	 	 @endforeach
              </ul>

            <!-- add new paper -->
            <!-- end paper -->
   			 	  	</div>
              <!-- add new paper -->
                <a href="" class="btn btn-primary float-left" data-toggle="modal" data-target="#paperModal">ADD</a>
              <!-- end add paper -->
  			 	 </div>
           <!-- end card body -->
 			 </div>
		</div>
	</div>
  <!-- add paper modal -->
                  <!-- Modal -->
                  <div class="modal fade" id="paperModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-body">
                         <!-- form for uploading paper -->
                          <form method="post" action=" {{route('uploadPaper')}} " enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value ="{{$user->id}}" name="userID">
                            <!-- paper names -->
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="inputEmail4">Paper</label>
                                <select class="form-control" id="paperInput" name="paperName" required>
                                  @foreach($paperNames as $row)
                                    <option value="{{$row->name}}"> {{$row->name}} </option>     
                                  @endforeach
                                    
                                </select>
                              </div>
                              <div class="form-group col-md-6">
                                <label for="inputEmail4">File</label>
                                <input type="file" class="form-control" id="paperInput" name="file" required >
                              </div>
                              
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Upload</button>
                          </form>
                         <!--end form  -->
                        </div>
                      </div>
                    </div>
                  </div>


   <!-- end add paper modal -->


@endsection
