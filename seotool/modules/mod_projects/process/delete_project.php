<?php
	include '../../../api/api_sql.php';

	$mysql = new mysql();
	$_POST = array_map('mysql_escape_string', $_POST);
	$mysql->query('DELETE FROM PROJECT WHERE PROJECTID='.$_POST['id'].';');
	
	echo $mysql->result;
?>