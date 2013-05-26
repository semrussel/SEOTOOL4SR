<?php
	session_start();
	$_SESSION['newly_uploaded'] = $_POST['id'];
	echo $_SESSION['newly_uploaded'];
?>