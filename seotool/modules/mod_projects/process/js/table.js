<script>
$(document).ready(function(){
	//DISABLE ALL SAVE BUTTONS
	$('button[id^="save_btn"]').attr("disabled", "disabled");

	//TYPEAHEAD SEARCH
	$('input[id^="newclient"]').typeahead({
	    source: function(query, process) {
	    	var id = ($(this)[0]["$element"][0]["id"]);
	        idNo = id.charAt(id.length-1);
	        $.ajax({
	            url: 'modules/mod_projects/process/clients.php',
	            data: {
	                "q" : query,
	                "divname": "newclient"+idNo,
	                "divid": "newclientid"+idNo
	            },
	            type: "POST",
	            success: function(response) {
	               $("#new_client_suggestions"+idNo).fadeIn();
	               $("#new_client_suggestions"+idNo).html(response); 
	               $("#new_client_suggestions"+idNo).css("z-index", "10");
	                return process(response);
	            }
	        });
	    },
	    minLength: 1
	});

	$('input[id^="newclient"]').on("blur", function(){
	    var myId = this.id.charAt(this.id.length-1);
	    $("#new_client_suggestions"+myId).fadeOut();
	});

	//UNIQUE TITLE VALIDATION
	$('input[id^="new_title"]').keyup(function(){
		e = $(this);
		var id = e[0]['id'].charAt(e[0]['id'].length-1);
		console.log(id);
		$.ajax({
	        url: 'modules/mod_projects/process/check_title.php',
	        data: {
	            "q" : e.val().trim()
	        },
	        type: "POST",
	        success: function(response) {
	        	console.log(response);
	            $('#check_title_icon'+id).html(response);
	        	$('#check_title_icon'+id).fadeIn();
	        }
	    });
	});

	//ENABLING SAVE BUTTON
	$('input[id^="new"]').keyup(function(){
		e = $(this);
		var id = e[0]['id'].charAt(e[0]['id'].length-1);

		console.log($('#newclientid'+id).val());

		if($('#new_title'+id).val().trim().length > 0
			&& $('#new_desc'+id).val().trim().length > 0
			&& $('#check_title_icon'+id+' img').attr('src') == 'img/check.png'
			&& $('#newclientid'+id).val().length > 0){
				$('#save_btn'+id).removeAttr("disabled");
		}
		else{
			$('#save_btn'+id).attr("disabled", "disabled");
		}
	});


	//AT SAVE BUTTON
	$('button[id^="save_btn"]').click(function(){
		e = $(this);
		var id = e[0]['id'].charAt(e[0]['id'].length-1);

		$.ajax({
			url: 'modules/mod_projects/process/update_row.php',
			data: {
				"id" : $('#update_this_id'+id).val(),
				"client_id" : $('#newclientid'+id).val(),
				"desc" : $('#new_desc'+id).val(),
				"title" : $('#new_title'+id).val(),
				"row_in_div" : id
			},	
			type: "POST",
			success: function(response){
				$('#id'+id).html(response);
				refresh_table();
				window.location.assign('#id'+id);
			}
		});
	});

	//VIEW A PROJECT
	$('.clickable').click(function(){
		e = $(this);
	//	console.log(e);
		var id = e[0]['parentNode']['children'][0]['value'];
		$.ajax({
			url : "modules/mod_projects/process/view_this_project.php",
			data: {
				"id" : id
			},
			type : "POST",
			success: function(response){
				$('#content').html(response);
			}
		});
	});

});

</script>