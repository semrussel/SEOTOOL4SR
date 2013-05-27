<?php
	session_start();
	include '../../../api/api_sql.php';
	include '../../../api/api_filter.php';
	$mysql = new mysql();

	$_POST = array_map("mysql_real_escape_string", $_POST);
	$mysql->query('SELECT * FROM PROJECT WHERE PROJECTID = '.$_POST['id'].';');
	$proj = $mysql->row;
	if($proj != null)
		array_walk_recursive($proj, "filter");

	unset($mysql);

	$mysql = new mysql();
	$proj[0] = array_map("mysql_real_escape_string", $proj[0]);
	$mysql->query('SELECT FirstName, LastName, CompanyName FROM USER WHERE USERID = '.($proj[0]['ClientId']).';');
	
	$client = $mysql->row;
	if($client != null)
		array_walk_recursive($client, "filter");

	unset($mysql);

	$mysql = new mysql();
	$mysql->query('SELECT FirstName, LastName, CompanyName FROM USER WHERE USERID = '.($proj[0]['AuthorId']).';');
	
	$author = $mysql->row;
	if($author != null)
		array_walk_recursive($author, "filter");
	$date = new DateTime();
?>
<div id="mod_view_this">
	<div class="row-fluid">
		<div class="span<?php echo $_SESSION['user']['UserType']=='SEO Specialist'?'6':'12'; ?>">
			<div class="widget">
				<div class="widget-header">
					<i class="icon-folder-close icon-white"></i>
					<h3>Project Summary</h3>
				</div>
				<div class="widget-content">
					<input type="hidden" id="project_id" name="project_id" value="<?php echo ($proj[0]['ProjectId']); ?>"/>
					<div class="well">
						<h5><?php echo ($proj[0]['ProjectTitle']); ?></h5>
						<span class="details">Project Title</span>
					</div>
					<div class="project_detail">
						<span><?php echo ($proj[0]['Description']); ?></span>
						<span class="details">Project Description</span>
					</div>	
					<div class="project_detail">
						<span><?php echo ($client[0]['FirstName']).' '.($client[0]['LastName']).' of '.($client[0]['CompanyName']); ?></span>
						<span class="details">Client</span>
					</div>
					<div class="project_detail">
						<span><?php echo ($author[0]['FirstName']).' '.($author[0]['LastName']).' of '.($author[0]['CompanyName']); ?></span>
						<span class="details date_details"><?php echo ($proj[0]['DateCreated']); ?></span>
						<span class="details">Created by</span>
					</div>
					<?php
					if($_SESSION['user']['UserType'] != "Client"){
					?>
					<div class="row-fluid">
						<button class="btn btn-danger pull-right" id="delete_this_project">Delete this project</button>
					</div>
					<?php } ?>
					<div id="temp"></div>
				</div>
			</div>
		</div>
		<?php
		if($_SESSION['user']['UserType']=='SEO Specialist'){
		?>
			<div class="span6">
				<div class="widget">
					<div class="widget-header">
						<i class="icon-arrow-up icon-white"></i>
						<h3>Upload a Report for this Project</h3>
					</div>
					<div class="widget-content">
						<form enctype="multipart/form-data" method="POST" action="modules/mod_reports/process/save_upload.php">
							<input type="hidden" id="project_id" name="project_id" value="<?php echo ($proj[0]['ProjectId']); ?>"/>
							<div class="row-fluid">
								<div class="input-prepend span10">
									<span class="add-on"><i class="icon-folder-close"></i></span>
									<input type="text" name="title" placeholder="Report title..." id="proj_title" class="span12"/>
								</div>
								<div id="report_title_validation" class="span1"></div>
							</div>
							<div class="row-fluid input-prepend">
								<span class="add-on"><i class="icon-calendar"></i></span>
								<input type="month" id="month" name="month" class="span10"/>
								<div class="image" id="check_cross" style="float:right;"></div>
							</div>
							<div class="row-fluid">
								<input type="file" name="imagefile" id="imagefile" />
							</div>
							<div class="row-fluid">
								<button class="btn span12" id="upload_report_for_project">Upload</button>		
							</div>
							<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
							<input type="hidden" name="completed" value="1" id="completed">
						</div>
					</form>
				</div>
			<?php } ?>
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
<script src="modules/mod_projects/process/js/sort_report.js"></script>
<script src="modules/mod_projects/process/js/upload_report.js"></script>
<script src="modules/mod_projects/process/js/delete_project.js"></script>