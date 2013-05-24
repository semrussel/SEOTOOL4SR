<?php
	include '../../../api/api_sql.php';

	$mysql = new mysql();
	$query = 'SELECT COUNT(*) AS COUNT FROM REPORT WHERE "'.mysql_real_escape_string($_POST['month']).'" IN (SELECT DATE_FORMAT(MONTHYEAR,"%Y-%m") FROM REPORT ) AND WEBSITEID = '.mysql_real_escape_string($_POST['id']).';';

	$mysql->query($query);

	if($mysql->row[0]['COUNT'] > 0){ ?>
		<img src="img/cross.png" id="img_src" />
<?php	}
	else{ ?>
		<img src="img/check.png" id="img_src" />	
<?php	} ?>