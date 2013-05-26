$(document).ready(function(){
	$('#delete_this_project').click(function(){
		if(confirm('Are you sure you want to delete this project?')){
			$.ajax({
				url : 'modules/mod_projects/process/delete_project.php',
				data : {
					"id" : $('#project_id').val()
				},
				type : "POST"
			}).done(function(response){
				if(response){
					alert('Project successfully deleted.');
					location.reload();
				}
				else{
					alert('There was something wrong upon deleting the project. Please try again.');
				}
			});
		}
	});
});