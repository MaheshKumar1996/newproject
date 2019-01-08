$(document).ready(function() {
	var polloptiontextnumber = 2;
	var expand = '.polloptiontext'+polloptiontextnumber;
	
	      $(document).on("keypress",".addnewopt", function(){
		  $(expand).removeClass("addnewopt");
		  polloptiontextnumber++;
	    	 expand = '.polloptiontext'+polloptiontextnumber;
	    	
	    	// ADD TEXTBOX.
         //   $('div.card-body').append("<div style='margin-top:10px;'><input type='text' maxlength='50' style='width:80%;display: inline;' class='form-control polloptiontext"+polloptiontextnumber+"'><button type='button' class='btn' id='addoption' style='float:right;'>*</button></div>");
            $("<div style='margin-top:10px;'><input type='text' maxlength='50' style='width:80%;display: inline;' class='form-control addnewopt polloptiontext"+polloptiontextnumber+"'><button type='button' class='btn removeoption' style='float:right;'>*</button></div>").appendTo('div.card-body')

		  });
	      
	      
	      
	      $(document).on("click",".removeoption", function(){
	    	
	    	var number_options = $('.removeoption').length;
	    	if(number_options > '2')
	    	{	
	    		if($( this ).prev().hasClass('addnewopt'))
	    			{
	    			  // alert('it is');
	    			}else
	    				{
	    				$( this ).parent().remove();
	    				}
	    	  
	    	} 
	      });      
});
