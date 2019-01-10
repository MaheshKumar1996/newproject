<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>NewPro</title>


</head>

 @include('layouts.navbar') 
 @include('layouts.navsidebar') 

<body>

<form action="" name='executepoll'  style='margin:100px'>
<?php 

$poll_options = explode('|,|',$polldetails['options']);
$poll_options = array_filter($poll_options);

print_r ('<h5>'.$polldetails['question'].'<h5>');

    $poll_type = 'radio';
	if($polldetails['option_type'] == 'SCQ')
	{  $poll_type = 'radio';  }
	else 
	{  $poll_type = 'checkbox';}
	
	
foreach($poll_options as $key => $options)
{
	print_r('<div class="'.$poll_type.'">
  <label><input type="'.$poll_type.'" name="optradio" id="opt'.$key.'" value="'.$options.'">'.$options.'</label>
</div>');
	//print_r("<input type='".$poll_type."'>".$options."<br>");
}
?>
 <button type='submit' class='btn btn-primary' id='save_executed_poll' style='float:left;'>Vote</button>
          </form>


</body>
<script>
</script>
	<script type="text/javascript" src="/js/votesimplepoll.js"></script>

</html>

<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {

var options = {
	animationEnabled: true,
	title: {
		text: "GDP Growth Rate - 2016"
	},
	axisY: {
		title: "Growth Rate (in %)",
		suffix: "%",
		includeZero: false
	},
	axisX: {
		title: "Countries"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.0#"%"",
		dataPoints: [
			{ label: "Yes", y: 50 },	
			{ label: "No", y: 555 },	
			{ label: "Maybe", y: 60 },

		]
	}]
};
$("#chartContainer").CanvasJSChart(options);

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 300px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
</body>
</html>
