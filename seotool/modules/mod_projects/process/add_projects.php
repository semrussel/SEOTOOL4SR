<?php
	include '../../../api/api_sql.php';

	$mysql = new mysql();
	$date = new DateTime();
	
	$user_seo = 1;
	$mysql->query("SELECT * FROM USER WHERE USERID = ".$_POST['author_id']." AND USERTYPE = 'Seo Specialist';");
	$user_seo = $mysql->row;
	
	// IF AUTHOR IS SEO SPECIALIST
	if($user_seo != null)
		$tigervinci = 0;
	
	//echo var_dump($user_seo);

	$mysql->query("INSERT INTO PROJECT VALUES('', ".$_POST['author_id'].", ".$_POST['client_id'].", '".$date->format('Y-m-d H:i:s')."', '".$_POST['desc']."', ".$tigervinci.", '".$_POST['title']."');");
	
	if($mysql->result == false)
		echo "fail";
	else
		echo "success";
?>