$(document).ready(function(){
	
	//GET CURRENT YEAR
	$('#year_curr').html(year);

	//YEAR - 1
	$('#year_neg').click(function(){
		var curr = $('#year_curr')[0]['innerText'];
	
		//MINIMUM YEAR
		if(curr-1 > 1900){
			$('#year_curr').html(curr-1);
		}
	});

	//YEAR + 1
	$('#year_pos').click(function(){
		var curr = $('#year_curr')[0]['innerText'];

		//MAXIMUM YEAR (+50 YEARS)
		max_year = Number(date.getFullYear())+50;
		
		if(curr++ < max_year){
			$('#year_curr').html(curr++);
		}
	});

	//ON MONTH CLICK
	$('.cal_month').click(function(){

		//GET SELECTED MONTH & YEAR
		month = $(this)[0]['innerHTML'];
		year = $('#year_curr')[0]['innerHTML'];

	//	console.log(this);

		$.ajax({
			url : "modules/mod_reports/process/report_pdf_preview.php",
			data : {
				"month" : month,
				"year" : year
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