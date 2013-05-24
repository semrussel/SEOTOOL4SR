<?php
	session_start();

	date_default_timezone_set("Asia/Manila");

	$userId = $_SESSION['user']['UserId'];
	$reportId = mysql_real_escape_string($_POST['reportId']);
	$dateCreated = date('Y-m-d H:i:s', time());
	$content = mysql_real_escape_string($_POST['value']);


	require_once('../../../api/api_sql.php');

	$mysql = new mysql();


	$mysql->query("INSERT into Comment (UserId, ReportId, DateCreated, Content) VALUES ({$userId}, {$reportId}, '{$dateCreated}', '{$content}');");
	$mysql->query("SELECT max(CommentId) AS max FROM Comment;");

	if($mysql->row!=NULL){
		foreach($mysql->row as $myrow){
			echo $myrow['max'];
		}
	}

?>