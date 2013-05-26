$(document).ready(function(){
	$('#project_reports_submit').click(function(){
		$.ajax({
			url : "modules/mod_reports/process/report_pdf_preview.php",
			data : {
				"project_id" : $('#select_project').val(),
				"filter" : "project"
			},
			type : "POST"
		}).done(function(response){
			$('#all_reports').fadeOut('slow', function(){
				$('#all_reports').html(response);
			});
			$('#all_reports').fadeIn('slow');
		});
	});
});