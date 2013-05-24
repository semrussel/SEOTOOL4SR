<?php
	session_start();



	$commentId = $_POST['commentId'];



	require_once('../../../api/api_sql.php');

	$mysql = new mysql();


	$mysql->query("DELETE FROM comment where commentid = {$commentId};");

?>