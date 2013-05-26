<?php
	include '../../../api/api_sql.php';

	session_start();

	$mysql = new mysql();
	$date = new DateTime();
	
	$_POST = array_map('mysql_real_escape_string', $_POST);
	
	// IF AUTHOR IS SEO SPECIALIST
	$tigervinci = 0;
	if($_SESSION['user']['UserType'] == "Tigervinci"){
		$tigervinci = 1;
	}

	$mysql->query("INSERT INTO PROJECT VALUES('', ".$_POST['author_id'].", ".$_POST['client_id'].", '".$date->format('Y-m-d H:i:s')."', '".$_POST['desc']."', ".$tigervinci.", '".$_POST['title']."');");
	
	if($mysql->result == false)
		echo "fail";
	else
		echo "success";
?>