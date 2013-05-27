<?php
	include 'api/api_sql.php';
	include 'api/api_filter.php';
?>
<div id="mod_dashboard">	
	<div class="row-fluid">
		<div class="widget-content shortcuts">
			<?php if($_SESSION['user']['UserType']=='SEO Specialist'){ ?>
			<button class="btn shortcut span4" id="upload_report">
				<i class="icon-arrow-up"></i>
				<span>Upload a Report</span>
			</button>
			<?php } ?> 
			<?php 
				// FOR SEO SPECIALISTS 
			if($_SESSION['user']['UserType']=='SEO Specialist' || $_SESSION['user']['UserType']=='Tigervinci'){ ?>
			<button class="btn shortcut span4" id="create_project">
				<i class="icon-folder-open"></i>
				<span>Create Project</span>
			</button>
			<button class="btn shortcut span4" id="view_reports">
				<i class="icon-th-list"></i>
				<span>View all Reports</span>
			</button>
			<?php } 
			?>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span8">
			<div class="widget">
				<div class="widget-header">
					<i class="icon-bookmark icon-white"></i>
					<h3>Ongoing Projects</h3>
				</div>
				<div class = "widget-content">
					<div id="ongoing_projects">
					</div>
				</div>
			</div>
		</div>
		<div class= "span4">
			<div class="widget">
				<div class="widget-header">
					<i class="icon-pencil icon-white"></i>
					<h3>Reports for <?php echo date('M', time()); ?></h3>
				</div>
				<div class="widget-content" id="dash_reports">
				</div>
			</div>
		</div>
	</div>
	<div class="row-fluid">
	</div>
</div>

<script src="modules/mod_dashboard/default.js"></script>
<script src="modules/mod_projects/default.js"></script>