
	function confirm_logout(){
		return confirm("Are you sure you want to log out from this account?");
	};

	function suggest(value){
			  $.ajax({
            	    type: "POST",
               		url: "modules/mod_home/process/process_suggest.php",
               		data: {queryString:value}
           		 }).done(function( result ) {
           		 	if (result.length==28){
           		 		$("#suggestions2").hide();
           		 	}else {
						$("#suggestions2").hide();
            			$("#suggestions2").fadeIn(result);
                		$("#suggestions2").html(result);
                	}
            	
            	});
	}

	$(document).ready(function(){		
	 $(".search-query").blur(function(){
	 	$('#suggestions2').fadeOut();
	 });
});
