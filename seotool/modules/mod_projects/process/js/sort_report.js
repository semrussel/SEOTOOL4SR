//DECLARE DEFAULT SORT
var accdg = 'MONTH, YEAR';
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
		//	console.log('success!');
		//	console.log(response);
			$("#reports_table").html(response);				
		}
	});

});

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
	})
};