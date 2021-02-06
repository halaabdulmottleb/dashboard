@extends('layouts.dashboard')
@section('dashboard_content')
<div class="container">
	
<div class="row">
	<div class="col-md-2 offset-md-4">
		<div id="piechart"></div>
		
	</div>
	
</div>

</div>
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
  ['Deleted', 8],
  ['canceled', 2],
  ['late', 4],
  ['Delayed', 2],
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Average Tasks', 'width':500, 'height':500};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>  

@endsection