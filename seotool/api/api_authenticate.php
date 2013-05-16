<?php
	
	session_start();

	if (isset($_SESSION['user'])) {
	}else {
		header("HTTP/1.0 404 Not Found");
	}

?>