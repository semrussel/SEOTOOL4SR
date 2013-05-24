<?php
	include '../../../api/api_sql.php';

	$mysql = new mysql();

	$mysql->query("SELECT * FROM PROJECT;");
	$projects = $mysql->row;

	$i=0;
		
	echo
		'<table class="table table-striped table-hover project" id="table_refresh">
			<thead>
				<tr onhover="edit_appear();">
					<th>Project Name</th>
					<th>Company</th>
					<th class="no_right_border">Date Created</th>
					<th class="action"></th>
				<tr>
			</thead>
			<tbody>';

	foreach($projects as $row){
		
//	echo var_dump($row['ProjectId']);
		$mysql->query("SELECT COMPANYNAME FROM USER WHERE USERID = ".$row['ClientId'].";");
		$companyname = $mysql->row;
		

		echo '
			<tr id="id'.htmlspecialchars($row['ProjectId']).'">
				<input type="hidden" value="'.$row['ProjectId'].'" />
				<td  class="clickable">'.htmlspecialchars($row['ProjectTitle']).'</td>
				<td class="clickable">'.htmlspecialchars($companyname[0]['COMPANYNAME']).'</td>
				<td class="clickable">'.htmlspecialchars($row['DateCreated']).'</td>
				<td class="actions">
					<a onclick="toggle_accordion(\'edit_'.htmlspecialchars($row['ProjectId']).'\', \''.$i.'\')" class="btn edit_btn" title="Edit"><i class="icon-edit"></i>
				</td>
			</tr>
			<tr>
				<td colspan="4" class="edit_project inactive_acc" id="edit_'.htmlspecialchars($row['ProjectId']).'">
					<div class="row-fluid">
						<div class="row-fluid">
							<div class="span11">
								<input type="hidden" value="'.htmlspecialchars($row['ProjectId']).'" id="update_this_id'.$i.'"/>
								<input type="text" class="edit_project_input span12" id="new_title'.$i.'" placeholder="'.htmlspecialchars($row['ProjectTitle']).'"/>
							</div>
							<div class="span1" id="check_title_icon'.$i.'"></div>
						</div>
						<div class="row-fluid">
							<div class="span11">
								<textarea class="edit_project_input span12" id="new_desc'.$i.'" placeholder="'.htmlspecialchars($row['Description']).'"></textarea>
							</div>
							<div class="span1"></div>
						</div>
						<div class="row-fluid">
							<div class="span9">
								<input type="text" placeholder="'.htmlspecialchars($companyname[0]['COMPANYNAME']).'" id="newclient'.$i.'" name="new_client" class="edit_project_input span12" />
								<input type="hidden" id="newclientid'.$i.'" />
							</div>
							<div class="span1">
								<button class="btn btn-primary" href="#" title="Save" id="save_btn'.$i.'"><i class="icon-ok icon-white"></i></button>
							</div>
							<div class="span1">
								<button class="btn btn-danger" href="#" title="Cancel" onclick="toggle_accordion(\'edit_'.htmlspecialchars($row['ProjectId']).'\', \''.$i.'\')"><i class="icon-remove icon-white"></i></button>
							</div>
						</div>
						<div id="new_client_suggestions'.$i.'" class="span12"></div>
					</div>
				</td>
			</tr>
			';
		$i++;
	}
	echo '
		</tbody>	
	</table>';

	include 'js/table.js'; 

?>