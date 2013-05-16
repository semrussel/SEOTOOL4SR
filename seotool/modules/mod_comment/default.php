	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src="css/js/jquery.autosize-min.js"></script>
	<script src="modules/mod_comment/default.js"></script>

	<script>
			$(function(){
				$('#postComment').autosize();
			});
	</script>

	<div id="dynamicComment"></div>
	<div class="row-fluid">
		<a href="#" id="userName"><?php echo"{$_SESSION['user']['FirstName']} {$_SESSION['user']['LastName']}"; ?></a><br/>
		<a href="#" id="userType"><?php echo"{$_SESSION['user']['UserType']}"; ?></a>

		<br />
		<form name="comment" method="POST" action="modules/mod_comment/process/process_comment.php">
			<div><textarea class="span12" name="postComment" id="postComment" autocomplete="off" placeholder="Write a comment..."></textarea></div>
			<input type="hidden" name="fullname" id="fullname" value="<?php echo htmlspecialchars("{$_SESSION['user']['FirstName']} {$_SESSION['user']['LastName']}"); ?>" />	
			<input type="hidden" name="role" id="role" value="<?php echo htmlspecialchars($_SESSION['user']['UserType']); ?>" />
			<input type="submit" name="submit" id="submit" hidden="hidden" />
		</form>
	</div>
  
