<?php
	include '../../../api/api_sql.php';

	$mysql = new mysql();

	if($_POST['title'] != ''){
		$mysql->query('SELECT COUNT(*) AS COUNT FROM REPORT WHERE REPORTTITLE = "'.$_POST['title'].'";');
	//	var_dump($mysql->row[0]['COUNT']);

		if($mysql->row[0]['COUNT'] > 0){ ?>
			<img src="img/cross.png" id="title_validation_result" />
	<?php	}
		else{ ?>
			<img src="img/check.png" id="title_validation_result" />
	<?php	}
	}
	else{ ?>
		<img src="img/cross.png" id="title_validation_result" />
<?php	} ?>