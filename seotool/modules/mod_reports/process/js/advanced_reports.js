$(document).ready(function(){
	$('#advanced_search_submit').click(function(){
		$.ajax({
			url : "modules/mod_reports/process/report_pdf_preview.php",
			data : {
				"report_title" : $('#report_title_contains').val(),
				"conj_1" : $('#conj_1').val(),
				"file_title" : $("#file_title_contains").val(),
				"conj_2" : $("#conj_2").val(),
				"in_project" : $("#in_project").val(),
				"monthyear" : $("#for_month_of").val(),
				"filter" : "advanced"
			},
			type : "POST"
		}).done(function(response){
			$("#all_reports").fadeOut('slow', function(){
				$("#all_reports").html(response);
			});
			$("#all_reports").fadeIn('slow');
		});
	});
});