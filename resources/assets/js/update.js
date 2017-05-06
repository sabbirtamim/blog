
 $(function() {

		// $(".form-group").addClass("active_status_checked");
	if ($("input[type='checkbox']#active_status:checked").length > 0) {

		$("input[type='checkbox']#active_status:checked").removeAttr("id", "active_status").attr("id","active_status_checked");
		$("input[type='checkbox']#active_status").removeAttr("id", "active_status").attr("id","not_active_status");

	 	$("input[type='checkbox']#active_status_checked").on("change",function(){

			// $("input[type='checkbox']#not_active_status").removeAttr("disabled", "disabled");
			$(this).removeAttr("id", "active_status_checked").attr("id","not_active_status");
	 		
	   if($(this).is(":checked"))
	      $(this).val("1").removeAttr("id","not_active_status").attr("id", "active_status_checked").parents().find('table.table td input#not_active_status').attr("disabled", "disabled");
	    else
	      $(this).val("0");
		});

		$("input[type='checkbox']#not_active_status").on("change",function(){
	 	
	   if($(this).is(":checked"))	
	      $(this).val("1").removeAttr("id","not_active_status").attr("id", "active_status_checked").parents().find('table.table td input#not_active_status').attr("disabled", "disabled");  
	    else
	      $(this).val("0").removeAttr("id", "active_status_checked").attr("id","not_active_status").parents().find('table.table td input#not_active_status').removeAttr("disabled", "disabled"); 
	 			
		});
	}else{
	    	$("input[type='checkbox']#active_status:checked").removeAttr("id", "active_status").attr("id","active_status_checked");
		// $("input[type='checkbox']#active_status").attr("disabled", "disabled").removeAttr("id", "active_status").attr("id","not_active_status");
	    	$("input[type='checkbox']#active_status").removeAttr("id", "active_status").attr("id","not_active_status");

	 	$("input[type='checkbox']#active_status_checked").on("change",function(){

			// $("input[type='checkbox']#not_active_status").removeAttr("disabled", "disabled");
			$(this).removeAttr("id", "active_status_checked").attr("id","not_active_status");
	 		
	   if($(this).is(":checked"))
	      $(this).val("1").removeAttr("id","not_active_status").attr("id", "active_status_checked").parents().find('table.table td input#not_active_status').attr("disabled", "disabled");
	    else
	      $(this).val("0");
		});

		$("input[type='checkbox']#not_active_status").on("change",function(){
	 	
	   if($(this).is(":checked"))	
	      $(this).val("1").removeAttr("id","not_active_status").attr("id", "active_status_checked").parents().find('table.table td input#not_active_status').attr("disabled", "disabled");  
	    else
	      $(this).val("0").removeAttr("id", "active_status_checked").attr("id","not_active_status").parents().find('table.table td input#not_active_status').removeAttr("disabled", "disabled"); 
	 			
		});

	}

});