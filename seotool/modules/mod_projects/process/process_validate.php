<?php

	include '../../../api/api_sql.php';
	$mysql = new mysql();

	echo $_POST['id'];
/*
	$mysql->query("SELECT * FROM USER WHERE (SELECT CONCAT_WS(' ', FirstName, LastName) AS NAME) = '".$_POST['name']."' AND USERID = ".$_POST['id'].";");
	if($mysql->row == null)
		echo 'invalid';
	else
		echo 'valid';
*/
?>