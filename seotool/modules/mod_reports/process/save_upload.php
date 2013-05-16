<?php
	
	include '../../../api/api_sql.php'; 

	session_start();
	$mysql = new mysql();

	// CREATE DIRECTORY

	$_SESSION['status'] = 0;
	if ($_SESSION['status'] == 0) {
		if ($_REQUEST['completed'] == 1) {
			
			//GET DATE FOR TIMESTAMP
			$date = new DateTime();

				// INSERT TO DATABASE
				$mysql->query("CALL save_upload('', '".$_REQUEST['title']."', ".$_FILES['imagefile']['size'].", '".$date->format('Y-m-d H:i:s')."', ".$_SESSION['user']['UserId'].");");

				$_SESSION['last_id'] = $mysql->row[0]['last_insert_id()'];
				//echo "CALL save_upload('', '".$_REQUEST['title']."', ".$_FILES['imagefile']['size'].", '".$date->format('Y-m-d H:i:s')."', ".$_SESSION['user']['UserId'].");";

				//var_dump($mysql->row);
		        //COPY FILE TO SERVER
		        move_uploaded_file($_FILES['imagefile']['tmp_name'],"../../../docs/".$_SESSION['last_id'].".pdf");
		        $_SESSION['status'] = 1;
		}
	}
	header("location: ../../../index.php?mod=mod_reports");
?>