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
	
	<div class='row'>
	<div class="col-md-6 col-xs-12 col-lg-6 card" style="margin-left:85px;margin-top:30px;">
	 
	  <div class="card-header">
	    <h5 class="">
	    <textarea rows="3" style="resize: none;" maxlength='200'  class='form-control'></textarea>
	    </h5>
	     </div>
	    <div class="card-body">
	    
	    <div>
	    <input type='text' maxlength='50' style='width:80%;display: inline;' class='form-control polloptiontext1'>
	    <button type='button' class='btn removeoption' style='float:right;'>*</button>
	    </div>
	    
	    <div style='margin-top:10px;'>
	    <input type='text' maxlength='50' style='width:80%;display: inline;' class='form-control addnewopt polloptiontext2'>
	    <button type='button' class='btn removeoption' style='float:right;'>*</button>
	   </div>
   <!--  <button type='button' class="btn btn-primary" id='addoption' style='float:right;'>+</button> -->
    </div>
    
 
</div>
  
  </div>
</body>
	<script type="text/javascript" src="/js/textpoll.js"></script>
<script>
</script>
</html>

