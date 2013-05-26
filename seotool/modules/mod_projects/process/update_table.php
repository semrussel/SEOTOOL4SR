<?php
	session_start();

	include '../../../api/api_sql.php';
	include '../../../api/api_filter.php';

	$mysql = new mysql();

	$q = 0;
	
	//SET QUERY FOR TIGERVINCI
	if($_SESSION['user']['UserType'] == "Tigervinci"){
		$q = 1;
	}

	$mysql->query("SELECT * FROM PROJECT WHERE TIGERVINCI = ".mysql_escape_string($q).";");
	$projects = $mysql->row;

	if($projects != null)
		array_walk_recursive($projects, "filter");

?>
	<table class="table table-striped table-hover project" id="table_refresh">
		<thead>
			<tr onhover="edit_appear();">
				<th>Project Name</th>
				<th>Company</th>
				<th class="no_right_border">Date Created</th>
				<th class="action"></th>
			<tr>
		</thead>
		<tbody>		
<?php
	if($projects != null){
		$i=0;
		foreach($projects as $row){
			$row = array_map('mysql_real_escape_string', $row);
			$mysql->query("SELECT COMPANYNAME FROM USER WHERE USERID = ".$row['ClientId'].";");
			if($mysql->row != null)
				array_walk_recursive($mysql->row, "filter");
			$companyname = $mysql->row;
?>
				<tr id="id<?php echo $row['ProjectId']; ?>">
					<input type="hidden" value="<?php echo $row['ProjectId']; ?>" />
					<td  class="clickable"><?php echo $row['ProjectTitle']; ?></td>
					<td class="clickable"><?php echo $companyname[0]['COMPANYNAME']; ?></td>
					<td class="clickable"><?php echo $row['DateCreated']; ?></td>
					<td class="actions">
						<a onclick="toggle_accordion('edit_<?php echo $row['ProjectId']; ?>', '<?php echo $i; ?>')" class="btn edit_btn" title="Edit"><i class="icon-edit"></i></a>
					</td>
				</tr>
				<tr>
					<td colspan="4" class="edit_project inactive_acc" id="edit_<?php echo $row['ProjectId']; ?>">
						<div class="row-fluid">
							<div class="row-fluid">
								<div class="span11">
									<input type="hidden" value="<?php echo $row['ProjectId'] ; ?>" id="update_this_id<?php echo $i ; ?>"/>
									<input type="text" class="edit_project_input span12" id="new_title<?php echo $i ; ?>" placeholder="<?php echo $row['ProjectTitle'] ; ?>"/>
								</div>
								<div class="span1" id="check_title_icon<?php echo $i ; ?>"></div>
							</div>
							<div class="row-fluid">
								<div class="span11">
									<textarea class="edit_project_input span12" id="new_desc<?php echo $i ; ?>" placeholder="<?php echo $row['Description'] ; ?>"></textarea>
								</div>
								<div class="span1"></div>
							</div>
							<div class="row-fluid">
								<div class="span9">
									<input type="text" placeholder="<?php echo ($companyname[0]['COMPANYNAME']) ; ?>" id="newclient<?php echo $i ; ?>" name="new_client" class="edit_project_input span12" />
									<input type="hidden" id="newclientid<?php echo $i ; ?>" />
								</div>
								<div class="span1">
									<button class="btn btn-primary" href="#" title="Save" id="save_btn<?php echo $i ; ?>"><i class="icon-ok icon-white"></i></button>
								</div>
								<div class="span1">
									<button class="btn btn-danger" href="#" title="Cancel" onclick="toggle_accordion('edit_<?php echo ($row['ProjectId']) ; ?>', '<?php echo $i ; ?>')"><i class="icon-remove icon-white"></i></button>
								</div>
							</div>
							<div id="new_client_suggestions<?php echo $i ; ?>" class="span12"></div>
						</div>
					</td>
				</tr>
<?php			
			$i++;
		}
	}
	else{ 
?>
		<tr><td colspan="4">No data to display.</td></tr>
<?php	} ?>

	</tbody>	
</table>

<?php include 'js/table.js'; ?>