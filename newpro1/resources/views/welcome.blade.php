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
    <input type='text' maxlength='50' style='width:100%;' class='form-control'>
    <input type='text' maxlength='50' style='width:100%;margin-top:10px;' class='form-control'>
    <button type='button' class="btn btn-primary" id='addoption' style='float:right;'>+</button>
    </div>
    
 
</div>
  
  </div>
</body>
	<script type="text/javascript" src="/js/textpoll.js"></script>
<script>
</script>
</html>

