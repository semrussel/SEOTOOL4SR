<?php
	include '../../../api/api_sql.php';
	include '../../../api/api_filter.php';

	$mysql = new mysql();

	$_POST = array_map('mysql_real_escape_string', $_POST);
	$mysql->query('UPDATE PROJECT 
		SET CLIENTID = '.$_POST['client_id'].', DESCRIPTION = "'.$_POST['desc'].'", PROJECTTITLE = "'.$_POST['title'].'"
		WHERE PROJECTID = '.$_POST['id'].';');

	unset($mysql);
	$mysql = new mysql();

	$mysql->query('SELECT * FROM PROJECT WHERE PROJECTID = '.$_POST['id'].';');
	
	$row = 	$mysql->row;

	if($row != null)
		array_walk_recursive($row, "filter");

	unset($mysql);
	$mysql = new mysql();

	$mysql->query('SELECT COMPANYNAME FROM USER WHERE USERID = '.$_POST['client_id'].';');
	if($mysql->row != null)
		array_walk_recursive($mysql->row, "filter");

	if($mysql->result == false){
		echo 'fail';
	}
	else{
		echo '
			<tr id="id'.$row[0]['ProjectId'].'">
				<td>'.$row[0]['ProjectTitle'].'</td>
				<td>'.$mysql->row[0]['COMPANYNAME'].'</td>
				<td class="no_right_border">'.$row[0]['DateCreated'].'</td>
				<form method="POST">
					<td class="actions" style="overflow: hidden;">
						<a onclick="toggle_accordion(\'edit_'.$row[0]['ProjectId'].'\', \''.$_POST['row_in_div'].'\')" class="btn" title="Edit"><i class="icon-edit"></i>
					</td>
				</form>
			</tr>
		';
	}

?>