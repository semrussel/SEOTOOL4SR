<?php
	include '../../../api/api_sql.php';
	$mysql = new mysql();

	$mysql->query('SELECT * FROM PROJECT WHERE PROJECTID = '.mysql_real_escape_string($_POST['id']).';');
	$proj = $mysql->row;

	unset($mysql);

	$mysql = new mysql();
	$mysql->query('SELECT FirstName, LastName, CompanyName FROM USER WHERE USERID = '.mysql_real_escape_string($proj[0]['ClientId']).';');
	
	$client = $mysql->row;

	unset($mysql);

	$mysql = new mysql();
	$mysql->query('SELECT FirstName, LastName, CompanyName FROM USER WHERE USERID = '.mysql_real_escape_string($proj[0]['AuthorId']).';');
	
	$author = $mysql->row;
	$date = new DateTime();
?>
<script src="modules/mod_projects/process/js/sort_report.js"></script>
<script src="modules/mod_projects/process/js/upload_report.js"></script>
<div id="mod_view_this">
	<div class="row-fluid">
		<div class="span6">
			<div class="widget">
				<div class="widget-header">
					<i class="icon-folder-close icon-white"></i>
					<h3>Project Summary</h3>
				</div>
				<div class="widget-content">
					<div class="well">
						<h5><?php echo $proj[0]['ProjectTitle']; ?></h5>
						<span class="details">Project Title</span>
					</div>
					<div class="project_detail">
						<span><?php echo $proj[0]['Description'] ?></h6>
						<span class="details">Project Description</span>
					</div>	
					<div class="project_detail">
						<span><?php echo $client[0]['FirstName'].' '.$client[0]['LastName'].' of '.$client[0]['CompanyName']; ?></h6>
						<span class="details">Client</span>
					</div>
					<div class="project_detail">
						<span><?php echo $author[0]['FirstName'].' '.$author[0]['LastName'].' of '.$author[0]['CompanyName']; ?></h6>
						<span class="details date_details"><?php echo $proj[0]['DateCreated']; ?></span>
						<span class="details">Created by</span>
					</div>
				</div>
			</div>
		</div>
		<div class="span6">
			<div class="widget">
				<div class="widget-header">
					<i class="icon-arrow-up icon-white"></i>
					<h3>Upload a Report for this Project</h3>
				</div>
				<div class="widget-content">
					<form enctype="multipart/form-data" method="POST" action="modules/mod_reports/process/save_upload.php">
						<div class="row-fluid">
							<input type="file" name="imagefile" id="imagefile" />
						</div>
						<div class="row-fluid" style="display: inline;">
							<span>For the month of:  </span>
							<input type="month" id="month" />
							<div class="image" id="check_cross" style="float:right;"></div>
						</div>
						<div class="row-fluid">
							<input type="text" name="title" placeholder="Project title..." id="proj_title" class="span12"/>
						</div>
						<div class="row-fluid">
							<button class="btn span12" id="upload_report_for_project">Upload</button>		
						</div>
						<input type="hidden" id="project_id" name="project_id" value="<?php echo $proj[0]['ProjectId']; ?>"/>
						<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
						<input type="hidden" name="completed" value="1" id="completed">
					</div>
				</form>
			</div>
			<div class="widget">
				<div class="widget-header">
					<i class="icon-list icon-white"></i>
					<h3>View all Reports</h3>
				</div>
				<div class="widget-content">
					
				</div>	
			</div>
		</div>
		<div class="span12" style="margin-left: 0px">
			<div class="widget">
				<div class="widget-header">
					<i class="icon-briefcase icon-white"></i>
					<h3>Project Reports</h3>
				</div>
				<div class="widget-content" id="reports_table">
				</div>
			</div>
		</div>
	</div>
</div>