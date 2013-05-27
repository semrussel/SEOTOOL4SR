//DECLARE DEFAULT SORT
var accdg = 'MONTHYEAR';
var asc = 'ASC';

$(document).ready(function(){
	
	$.ajax({
		url : "modules/mod_projects/process/sort_table.php",
		data : {
			"id" : $('#project_id').val(),
			"accdg" : accdg,
			"asc" : asc
		},
		type : "POST",
		success: function(response){
			$("#reports_table").html(response);				
		}
	});
});

function view_report(id){
	$.ajax({
		url : "modules/mod_projects/process/view_report.php",
		type : "POST",
		data : {
			"id" : id
		},
		success : function(response){
			console.log(response);
			document.location.href = "index.php?mod=mod_reports#pdf_preview";
		}
	});
};

function sort(cat){
	accdg = cat;
	$.ajax({
		url : "modules/mod_projects/process/sort_table.php",
		data : {
			"id" : $('#project_id').val(),
			"accdg" : accdg,
			"asc" : asc
		},
		type : "POST",
		success: function(response){
			$("#reports_table").fadeOut('slow', function(){
				$("#reports_table").html(response);
			});				
			$("#reports_table").fadeIn('slow');								
		}
	});
};

function sort_2(method){
	asc = method;
	$.ajax({
		url : "modules/mod_projects/process/sort_table.php",
		data : {
			"id" : $('#project_id').val(),
			"accdg" : accdg,
			"asc" : asc
		},
		type : "POST",
		success: function(response){
		//	console.log('CLICK SUCCESS!');
			$("#reports_table").fadeOut();				
			$("#reports_table").html(response);
			$("#reports_table").fadeIn();								
		}
	});
};
