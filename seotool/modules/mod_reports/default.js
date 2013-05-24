function suggest_reports(value){
  $.ajax({
    type: "POST",
 		url: "modules/mod_reports/process/process_suggest.php",
 		data: {queryString:value}
	 }).done(function(result){
	 	console.log(result);
    if (result.length==0){
	 		$("#report_suggestions").hide();
	 	}else {
      $("#report_suggestions").hide();
		  $("#report_suggestions").fadeIn(result);
  		$("#report_suggestions").html(result);
  	}
  });
}

$(document).ready(function(){		
	$('#report_suggestions').fadeOut();
});

function get_project(title, id){
  $("#project_title").val(title);
  $("#project_id").val(id);
  $("#report_suggestions").fadeOut();
}

function change_preview(id){
  $("#main_viewer").attr("href", "docs/"+id+".pdf");
  $(".media").media();
}