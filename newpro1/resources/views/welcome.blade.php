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
	
	<div class='row'>
	<div class="col-md-6 col-xs-12 col-lg-6 card" style="margin-left:85px;margin-top:30px;">
	   <form name='abc' id='abc'>
	   <input type="hidden" name="_token" value="{{ csrf_token() }}">
	  <div class="card-header">
	 	  
	 	  <button type='button' class='btn-sm' id='mcqoption' style='float:right;opacity:0.4;' title='Multiple Choice'> <img src='/img/icons/checkbox-img.png' alt = 'Multiple Choice' ></button>
	      <button type='button' class='btn-sm' id='singlechoiceoption' style='float:right;background-color:#30CFCF' title='Single Choice'> <img src='/img/icons/radio-button-img.png' alt = 'Single Choice' ></button>
	   
	      {{ csrf_field() }}
	      <textarea rows="3" style="resize: none;" maxlength='200' id='poll_question' class='form-control'></textarea>
	   </div>
	    <div class="card-body">
	    
		    <div>
		    <input type='text' maxlength='50' style='width:80%;display: inline;' class='form-control poll_opt polloptiontext1'>
		    <button type='button' class='btn removeoption' style='float:right;'>&times;</button>
		    </div>
	    
		    <div style='margin-top:10px;'>
		    <input type='text' maxlength='50' style='width:80%;display: inline;' class='form-control poll_opt addnewopt polloptiontext2'>
		    <button type='button' class='btn removeoption' style='float:right;'>&times;</button>
		   </div>
	   <!--  <button type='button' class="btn btn-primary" id='addoption' style='float:right;'>+</button> -->
	    </div>
	     <button type='submit' class='btn btn-primary' id='save_poll' style='float:right;'>Save</button>
          </form>
</div>

  </div>
</body>
	<script type="text/javascript" src="/js/textpoll.js"></script>
<script>
</script>
</html>

