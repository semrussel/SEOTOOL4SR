$(document).ready(function(){
	$('#upload_report_for_project').attr('disabled', 'disabled');

	//MONTH CHECK
	$('#month').change(function(){
		$.ajax({
			url : "modules/mod_projects/process/check_report.php",
			data: {
				"month" : $('#month').val(),
				"id" : $('#project_id').val()
			},
			type : "POST",
			success: function(response){
				$('#check_cross').html(response);
			}
		});
	});

	//BUTTON ENABLING FOR UPLOADING REPORT TO A SPECIFIC PROJECT
	$("#proj_title").keyup(function(){
	//	console.log("KEYUP");
	//	console.log($('#imagefile').val()+'<-value');
	//	console.log($('#check_cross')[0]['children'][0]['src']);
		console.log($("#proj_title").val().length);
		if($('#img_src').attr('src') == 'img/check.png'
			&& $("#imagefile").val().length > 0
			&& $("#proj_title").val().length > 0
		){
			console.log("OKAY NA");
			$('#upload_report_for_project').removeAttr('disabled');
		}
		else{
			$('#upload_report_for_project').attr('disabled', 'disabled');
		}
	});

	//BUTTON ENABLING FOR UPLOADING REPORT TO A SPECIFIC PROJECT
	$("#month").change(function(){
		if($('#img_src').attr('src') == 'img/check.png'
			&& $("#imagefile").val().length > 0
			&& $("#proj_title").val().length > 0
		){
			console.log("OKAY NA");
			$('#upload_report_for_project').removeAttr('disabled');
		}
		else{
			$('#upload_report_for_project').attr('disabled', 'disabled');
		}
	});

	//BUTTON ENABLING FOR UPLOADING REPORT TO A SPECIFIC PROJECT
	$("#imagefile").change(function(){
		if($('#img_src').attr('src') == 'img/check.png'
			&& $("#imagefile").val().length > 0
			&& $("#proj_title").val().length > 0
		){
			console.log("OKAY NA");
			$('#upload_report_for_project').removeAttr('disabled');
		}
		else{
			$('#upload_report_for_project').attr('disabled', 'disabled');
		}
	});

});