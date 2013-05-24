<?php
	include '../../../api/api_sql.php';

	$mysql = new mysql();

	$mysql->query('SELECT * FROM PROJECT WHERE PROJECTTITLE = "'.$_POST['q'].'";'); 

	if($mysql->row == null && $_POST['q'] != ""){
		echo '<img src = "img/check.png" class="img"/>';
	}
	else{
		echo '<img src = "img/cross.png" class="img"/>';
	}
?>