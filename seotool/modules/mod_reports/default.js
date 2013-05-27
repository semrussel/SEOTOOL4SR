var date = new Date(),
	title_validation = proj_validation = month_validation = file_validation = 0,
	month = date.getMonth() + 1, year = date.getFullYear();
$(document).ready(function(){
	$('#report_suggestions').fadeOut();
	$(".media").media();					//INITIAL OPTIONS
	$('#upload_report_btn').attr('disabled', 'disabled');
	$('#input_month').attr('disabled', 'disabled');
	set_filter('monthly_calendar');
	$.post("modules/mod_reports/process/report_pdf_preview.php", 	//INITIAL REPORT SUGGESTIONS
		{"month" : month, "year" : year, "filter" : "month"},
		function(response){
			$("#all_reports").html(response);
	});
	$('#input_title').keyup(function(){ 	//UPLOAD A REPORT VALIDATION, TITLE VLIDATION
		$.post("modules/mod_reports/process/validate_title.php",{"title" : $(this).val().trim()},
			function(response){
				$('#title_validate').html(response);
				title_validation = ($('#title_validation_result').attr('src')=='img/check.png') ? title_validation + 1 : 0;
				validate();
			});
	});
	$('#input_month').change(function(){ 	//MONTH YEAR VALIDATION
		$.post("modules/mod_projects/process/check_report.php",{ "month" : $(this).val(), "id" : $('#project_id').val()},
			function(response){
				$('#month_year_validate').html(response);
				month_validation = ($('#img_src').attr('src') == 'img/check.png') ? month_validation + 1 : 0;
				validate();
			});
	});
	$('#project_title').keyup(function(){ 	//UPLOAD BUTTON ENABLING
		$('#input_month').attr('disabled', 'disabled');
		proj_validation = 0;
		validate();
	});
	$('#imagefile').change(function(){
		file_validation = ($(this).val() != '')? file_validation+1: 0;
		validate();
	});
	$('button[id^="cat_"]').click(function(){ 	//FILTERS
		switch(this.id){
			case 'cat_month': set_filter('monthly_calendar'); break;
			case 'cat_company': set_filter('company_reports'); break;
			case 'cat_project': set_filter('project_reports'); break;
			case 'cat_advanced': set_filter('advanced_reports');
		}
	});
});
function set_filter(filter){
	$.post("modules/mod_reports/process/"+filter+".php",{},
		function(response){
			$('#sort_category').fadeOut('slow', function(){$('#sort_category').html(response)}).fadeIn('slow');
		});
}
function validate(){
	if(title_validation > 0 && proj_validation > 0 && month_validation > 0 && file_validation > 0)
		$('#upload_report_btn').removeAttr('disabled');
	else
		$('#upload_report_btn').attr('disabled', 'disabled');
}
function suggest_reports(value){
	$.post("modules/mod_reports/process/process_suggest.php",{queryString:value},
		function(result){
			if (result.length === 0)
				$("#report_suggestions").hide();
			else
				$("#report_suggestions").html(result).fadeIn(result);
		});
}
function get_project(title, id){
	$("#project_title").val(title);
	$("#project_id").val(id);
	$("#report_suggestions").fadeOut();
	$('#input_month').removeAttr('disabled');
	proj_validation++;
}
function change_preview(id){
	$("#main_viewer").fadeIn().attr("href", "docs/"+id+".pdf");
	$(".media").media();
	$('#initial').fadeOut();
	$.post("modules/mod_reports/process/load_pdf_details.php",{"id" : id},
		function(response){
			$('#pdf_details').html(response);
		});
}