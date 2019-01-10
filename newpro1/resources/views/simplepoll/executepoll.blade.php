<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>NewPro</title>


</head>

 @include('layouts.navbar') 
 @include('layouts.navsidebar') 

<body>

<form name='executepoll' id='asd' style='margin:100px'>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	{{ csrf_field() }}
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

