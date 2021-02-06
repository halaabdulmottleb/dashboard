@extends('Dashboard.structure')
@section('structure_content') 
<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2 mt-4" >
      <div class="card" style="width: 18rem;">
        <ul class="list-group list-group-flush">
          <li class="list-group-item text-center" style="color: grey">{{$branch->name}} - Statstics</li>
        </ul>
      </div>
    </div>
    <div class="col-md-8 offset-md-2 mt-4" style="overflow: hidden;">
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
          var options = {'title':' statistics ', 'width':450, 'height':300};

            // Display the chart inside the <div> element with id="piechart"
          var chart = new google.visualization.PieChart(document.getElementById('piechart'));
          chart.draw(data, options);
        }
        </script>  
    </div>
    
  </div>
  <div class="row">
    <div class="col-md-4 offset-md-4 mt-4" >
      <div class="card" style="width: 18rem;">
        <ul class="list-group list-group-flush">
          <li class="list-group-item text-center" style="color: grey">{{$branch->name}} - Projects</li>
        </ul>
      </div>
    </div>
    
  </div>
  <div class="row">

    <div class="col-md-8 offset-md-2 mt-4">
      <div id="accordion">
        <!-- card -->
        @if(!$projects->count())
          <p class="text-center" style="color: red">No projects added yet </p>
        @endif
        @foreach($projects as $project)
          <div class="card">
            <div class="card-header" id="heading{{$project->id}}">
              <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$project->id}}" aria-expanded="true" aria-controls="collapseOne">
                        {{$project->name}} 
                </button>
                 
              </h5>
           </div>

             <div id="collapse{{$project->id}}" class="collapse show" aria-labelledby="heading{{$project->id}}" data-parent="#accordion">
               <div class="card-body">
                <?php
                  $tasks = $project->tasks()->get() ;
                ?>
                @foreach($tasks as $task)
                  <p> 
                    {{$task->id}} - {{$task->description}} 
                     @if($task->urgency == 0)
                            <span style="color:green ; background-color: green">U</span></td>

                      @elseif($task->urgency == 1)
                            <span style="color:orange ; background-color: orange">U</span></td>

                      @else
                            <span style="color:red ; background-color: red">U</span></td>
                      @endif
                    @if(!is_null($task->status ))
                    <span class="float-right" >  {{$task->status}} </span>
                    @endif 

                    
                  </p>
                  <hr>
                  @endforeach
               </div>
             </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>

@endsection