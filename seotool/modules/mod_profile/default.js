$(document).ready(function(){
	$('#edit_div').hide();
	$('#full_name_text').hide();
	$('#username_text').hide();
	$('#email_text').hide();
	$('#edit_button').hide();

	$('#edit_profile').click(function(){
		$('#full_name').fadeOut('slow', function(){
			$('#full_name_text').fadeIn('slow');
		});
		$('#username').fadeOut('slow', function(){
			$('#username_text').fadeIn('slow');
		});
		$('#email').fadeOut('slow', function(){
			$('#email_text').fadeIn('slow');
		});
		$('#edit_button').fadeIn();
	});
	
	$('#edit_button').click(function(){
		$('#full_name_text').fadeOut('slow', function(){
			$('#full_name').fadeIn('slow');
		});
		$('#username_text').fadeOut('slow', function(){
			$('#username').fadeIn('slow');
		});
		$('#email_text').fadeOut('slow', function(){
			$('#email').fadeIn('slow');
		});
		$('#edit_button').fadeOut();
	});
});