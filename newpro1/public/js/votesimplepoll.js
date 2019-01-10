
$(document).ready(function() {

  //SAVE A VOTE
	      $('body').on("click","#save_executed_poll", function(){
	    	 
	    	 
	    	    if($('input:radio:checked').val())
	    	    {
	    	    	var selected_options = $('input:radio:checked').val();
	    	    	var selected_id = $('input:radio:checked').attr('id');
	    	    }
	    	  if($('input:checkbox:checked').val())
	    	  {
	    		  var selected_options = $("input:checkbox:checked").map(function(){
		    	        return this.value;
		    	    }).toArray();
	    		  
	    		  
	    		  var selected_id = $("input:checkbox:checked").map(function(){
		    	        return $(this).attr('id');
		    	    }).toArray();
	    	  }
	    	  selected_options = JSON.stringify(selected_options);
	    	  selected_id = JSON.stringify(selected_id);
	    	  $.ajax({
	    	         type: 'get',
	    	         url: '/execute_simple_poll',
	    	         data:{'selected_poll_options':selected_options,'selected_poll_ids':selected_id},
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

	      
	      
			//------------------------------------

});
