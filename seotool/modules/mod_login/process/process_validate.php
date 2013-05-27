<?php

	session_start();
	
	$username = mysql_real_escape_string($_POST['username']);
	$password = md5($_POST['password']);


	require_once('../../../api/api_sql.php');

	$mysql = new mysql();

	$mysql->query("SELECT * from User where Username = '{$username}' and Password = '{$password}';");


		if ($mysql->row===null) {
			$myrow=null;
		}else {
			foreach ($mysql->row as $myrow) {}
		}
			
		if ($mysql->count===1) {
			$_SESSION['user']= $myrow;
			echo "valid";
		}else {
			echo "invalid";
		}

?>