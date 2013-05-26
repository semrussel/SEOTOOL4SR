<?php
	include '../../../api/api_sql.php';

	$mysql = new mysql();

	$_POST = array_map('mysql_real_escape_string', $_POST);
	$query = 'SELECT COUNT(*) AS COUNT FROM REPORT WHERE "'.$_POST['month'].'" IN (SELECT DATE_FORMAT(MONTHYEAR,"%Y-%m") FROM REPORT ) AND WEBSITEID = '.$_POST['id'].';';

	$mysql->query($query);

	if($mysql->row[0]['COUNT'] > 0){ ?>
		<img src="img/cross.png" id="img_src" />
<?php	}
	else{ ?>
		<img src="img/check.png" id="img_src" />	
<?php	} ?>