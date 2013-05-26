$(document).ready(function(){
	$('#company_reports_btn').click(function(){
		$.ajax({
			url : "modules/mod_reports/process/report_pdf_preview.php",
			data : {
				"company" : $('#companies').val(),
				"filter" : "company"
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