<?php
	
	include '../../../api/api_sql.php'; 

	session_start();
	$mysql = new mysql();

	$_SESSION['status'] = 0;
	if ($_SESSION['status'] == 0) {
		if ($_REQUEST['completed'] == 1) {
			
			//GET DATE FOR TIMESTAMP
			$date = new DateTime();

			// INSERT TO DATABASE
			// INSERT TO FILE
			$mysql->query("CALL save_upload('', '".$_REQUEST['title']."', ".$_FILES['imagefile']['size'].", '".$date->format('Y-m-d H:i:s')."', ".$_SESSION['user']['UserId'].");");

			//GET LAST ID
			$_SESSION['last_id'] = $mysql->row[0]['last_insert_id()'];
			
			unset($mysql);
			$mysql = new mysql();

			//GET CLIENTID
			$mysql->query("SELECT CLIENTID FROM PROJECT WHERE PROJECTID = ".$_REQUEST['project_id'].";");
			
			$client_id = $mysql->row;
			unset($mysql);
			$mysql = new mysql();

			//DETERMINE IF TIGERVINCI PROJECT
			$tigervinci = 0;
			if($_SESSION['user']['UserType'] == 'Tigervinci')
				$tigervinci = 1;

			//INSERT TO REPORT
			$mysql->query('CALL ADD_REPORT("", '.$_REQUEST['project_id'].', '.$client_id[0]['CLIENTID'].', '.$_SESSION['user']['UserId'].', "'.$date->format('Y-m-d H:i:s').'", '.$_SESSION['last_id'].', '.$tigervinci.', "'.$_REQUEST['title'].'", "'.$_REQUEST['month'].'-01");');

			$latest_report_id = $mysql->row[0]['last_insert_id()'];

			//COPY FILE TO SERVER FILENAME: file_id.pdf
		    $status = false;
		    $status = move_uploaded_file($_FILES['imagefile']['tmp_name'],"../../../docs/".$_SESSION['last_id'].".pdf");
		       
		    if($status){
		    	$_SESSION['status'] = 1;
		    }
		    else{
		    	//MOVING FAILED - DELETE FILE AND REPORT
		    	$_SESSION['status'] = 0;
		    	unset($mysql);
		    	$mysql = new mysql();
		    	$mysql->query('DELETE FROM FILE WHERE FILEID = '.$_SESSION['last_id'].';');
		    	$mysql->query('DELETE FROM REPORT WHERE REPORTID = '.$latest_report_id.';');
			}
		    unset($_SESSION['last_id']);
		}
	}
	header("location: ../../../index.php?mod=mod_reports#pdf_preview");
?>