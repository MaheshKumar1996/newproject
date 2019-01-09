$(document).ready(function() {
	var polloptiontextnumber = 2;
	var expand = '.polloptiontext'+polloptiontextnumber;
	var optiontype = 'single';
	      $(document).on("keypress",".addnewopt", function(){
		  $(expand).removeClass("addnewopt");
		  polloptiontextnumber++;
	    	 expand = '.polloptiontext'+polloptiontextnumber;
	    	
	    	// ADD TEXTBOX . 
         //   $('div.card-body').append("<div style='margin-top:10px;'><input type='text' maxlength='50' style='width:80%;display: inline;' class='form-control polloptiontext"+polloptiontextnumber+"'><button type='button' class='btn' id='addoption' style='float:right;'>*</button></div>");
            $("<div style='margin-top:10px;'><input type='text' maxlength='50' style='width:80%;display: inline;' class='form-control poll_opt addnewopt polloptiontext"+polloptiontextnumber+"'><button type='button' class='btn removeoption' style='float:right;'>*</button></div>").appendTo('div.card-body')

		  });
	      
	      
	      
	      $(document).on("click",".removeoption", function(){
	    	
	    	var number_options = $('.removeoption').length;
	    	if(number_options > '2')
	    	{	
	    		if($( this ).prev().hasClass('addnewopt'))
	    			{}
	    		else
	    			{
	    				$( this ).parent().remove();
	    			}
	    	  
	    	} 
	      });      
	      
	      
	      $(document).on("click","#mcqoption", function(){
	    	  optiontype = 'multiple';
               $(this).css('background-color','#30CFCF');
               $(this).css('opacity','1');
               $('#singlechoiceoption').css('opacity','0.4');
               $('#singlechoiceoption').css('background-color','#eeeeee');
              
		   });      
	      
	      $(document).on("click","#singlechoiceoption", function(){
	    	  optiontype = 'single';
              $(this).css('background-color','#30CFCF');
              $(this).css('opacity','1');
              $('#mcqoption').css('opacity','0.4');
              $('#mcqoption').css('background-color','#eeeeee');
		   });   
	      
	      $(document).on("click","#save_poll", function(){
	    	
	    	  var number_options = $('.removeoption').length;
	    	  var inputs = $(".poll_opt");
	    	  var poll_options = ''; 
		    	if(number_options >= '2')
		    	{	
		    		for(var i = 0 ; i < number_options ; i++)
		    			{
		    			poll_options += $(inputs[i]).val()+'|,|';
		    			}
		    	}

		    	var poll_question = $('#poll_question').val();
	    	  $.ajax({
	    	         type: 'get',
	    	         url: '/add_simple_poll',
	    	         data:{'poll_options':poll_options,'poll_type':optiontype,'question':poll_question},
	    	         async : false,
	    	         //contentType: "application/json; charset=utf-8",
	    	         traditional: true,
	    	         success: function (result) {
	    	        //  window.close();
	    	           console.log("Updated123");
	    	          //document.location.href="{{ url('acceptRejectProposal/'.$proposal->id.'/view/'.$sendproposaldetails->verification_string.'/tag/2') }}";
	    	          // alert('Changes are saved.')
	    	         },
	    	     error:function(data)
	    	     {
	    	      // alert("Error: please close the document and open it again");
	    	       var error=JSON.stringify(data);
	    	       alert(error);
	    	     }
	    	     });  
	    	  
	    	  
		   });   
	      
});
