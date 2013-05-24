<?php
	include '../../../api/api_sql.php';

	$mysql = new mysql();

//	echo 'UPDATE PROJECT 
//		SET CLIENTID = '.mysql_real_escape_string($_POST['client_id']).', DESCRIPTION = "'.mysql_real_escape_string($_POST['desc']).'", PROJECTTITLE = "'.mysql_real_escape_string($_POST['title']).'"
//		WHERE PROJECTID = '.mysql_real_escape_string($_POST['id']).';';

	$mysql->query('UPDATE PROJECT 
		SET CLIENTID = '.mysql_real_escape_string($_POST['client_id']).', DESCRIPTION = "'.mysql_real_escape_string($_POST['desc']).'", PROJECTTITLE = "'.mysql_real_escape_string($_POST['title']).'"
		WHERE PROJECTID = '.mysql_real_escape_string($_POST['id']).';');

	unset($mysql);
	$mysql = new mysql();

	$mysql->query('SELECT * FROM PROJECT WHERE PROJECTID = '.$_POST['id'].';');
	echo var_dump($mysql->row);
	
	$row = 	$mysql->row;

	unset($mysql);
	$mysql = new mysql();

	$mysql->query('SELECT COMPANYNAME FROM USER WHERE USERID = '.mysql_real_escape_string($_POST['client_id']).';');

	if($mysql->result == false){
		echo 'fail';
	}
	else{
		echo '
			<tr id="id'.htmlspecialchars($row[0]['ProjectId']).'">
				<td>'.htmlspecialchars($row[0]['ProjectTitle']).'</td>
				<td>'.htmlspecialchars($mysql->row[0]['COMPANYNAME']).'</td>
				<td class="no_right_border">'.htmlspecialchars($row[0]['DateCreated']).'</td>
				<form method="POST">
					<td class="actions" style="overflow: hidden;">
						<a onclick="toggle_accordion(\'edit_'.htmlspecialchars($row[0]['ProjectId']).'\', \''.$_POST['row_in_div'].'\')" class="btn" title="Edit"><i class="icon-edit"></i>
					</td>
				</form>
			</tr>
		';
	}

?>