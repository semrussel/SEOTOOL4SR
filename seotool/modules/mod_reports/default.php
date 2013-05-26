<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="css/js/jquerymedia.js"></script>
<script type="text/javascript" src="modules/mod_reports/default.js"></script>


<script>   
	$("document").ready(function(){
    	
    });
</script>

<div id="mod_reports">
	<div class="row-fluid">
		<div class="span5 <?php echo $_SESSION['user']['UserType'] == 'SEO Specialist'?'5':'9'; ?>">
			<div class="widget">
				<div class="widget-header">
					<i class="icon-eye-open icon-white"></i>
					<h3>View Reports</h3>			
				</div>
				<div class="widget-content">
					<div class="row-fluid">
							Display reports:
					</div>
					<div class="row-fluid">
						<div class="span8">
							<div id="sort_category" class="span12"></div>
						</div>
						<div class="span4">
							<div class="row-fluid category_div">
								<button class="btn category_btn span12" id="cat_month"><i class="icon-calendar"></i>Monthly</button>
							</div>
							<div class="row-fluid category_div">
								<button class="btn category_btn span12" id="cat_company"><i class="icon-briefcase"></i>Company</button>
							</div>
							<div class="row-fluid category_div">
								<button class="btn category_btn span12" id="cat_project"><i class="icon-folder-open"></i>Project</button>
							</div>
							<div class="row-fluid category_div">
								<button class="btn category_btn span12" id="cat_advanced"><i class="icon-filter"></i>Advanced</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php 
		if($_SESSION['user']['UserType'] == 'SEO Specialist'){
		?>
			<div class="span7">
				<div class="widget">
					<div class="widget-header">
						<i class="icon-arrow-up icon-white"></i>
						<h3>Upload a report</h3>
					</div>
					<div class="widget-content">
						<form enctype="multipart/form-data" action="modules/mod_reports/process/save_upload.php" method="POST">
							<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
							<input type="hidden" name="completed" value="1">
							<div id="create_report_form">
								<div class="row-fluid input-prepend">
									<span class="add-on"><i class="icon-folder-close"></i></span>
									<input type="text" name="title" placeholder="Report Title" class="span10" id="input_title"/>
									<span id="title_validate" class="span1 pull-right"></span>
								</div>
								<div class="row-fluid input-prepend">
									<span id="project_validate" class="span1 pull-right"></span>
									<span class="add-on"><i class="icon-briefcase"></i></span>
	        						<input type="text" placeholder="Search Project..." onkeyup="suggest_reports(this.value);" name = "project_title" id="project_title" class="span10"/><br />
									<input type="hidden" name = "project_id" id="project_id" />
								</div>
								<div class="row-fluid input-prepend">
									<span class="add-on"><i class="icon-calendar"></i></span>
									<input title="Choose Month and Year for the report" type="month" name="month" id="input_month" class="span9"/>
									<span id="month_year_validate" class="span1 pull-right"></span>
								</div>
								<div class="row-fluid">
									Please choose a .pdf to upload: <input type="file" class="span12" id="imagefile" name="imagefile" />
								</div>
							</div>
							<div id="report_suggestions"></div>
							<input type="submit" value="Upload" class="btn" id="upload_report_btn"/>
						</form>
					</div>
				</div>
			</div>
		<?php } 
		else{ ?>

	<?php	}
		?>
	</div>
	<div  id="report_previews"></div>
	<div class="row-fluid">
		<div class="span3">
			<div class="widget">
				<div class="widget-header" id="pdf_preview">
					<i class="icon-list icon-white"></i>
					<h3>Reports</h3>
				</div>
				<div class="widget-content" id="all_reports">
				</div>
			</div>
		</div>
		<div class="span9">
			<div class="widget">
				<div class="widget-header">
					<i class="icon-search icon-white"></i>
					<h3>Report Preview</h3>
				</div>
				<div class="widget-content" style="height: 500px">
					<?php 
						if(isset($_SESSION['status']) && $_SESSION['status'] == 1){
						?>
						<div class="alert alert-success">
							Successully uploaded the file. 
						</div>
						<?php
							unset($_SESSION['status']);
							
						}else if(isset($_SESSION['status']) && $_SESSION['status'] != 1){ ?>
						<div class="alert alert-error">
							Something went wrong in uploading the file. Please try again.  
						</div>
						<?php } 
							unset($_SESSION['status']);
							$a = "";
							if(isset($_SESSION['newly_uploaded'])){
								$a = $_SESSION['newly_uploaded'];
								unset($_SESSION['newly_uploaded']);
							}
						?>

						<a id="main_viewer" class="media" style="height: 500px"></a>
					 	<span id="initial">Please select report to preview.</span>
				</div>
			</div>
		</div>
	</div>
	<div class="row-fluid">
		<div class="well span12" id="pdf_details">

		</div>
	</div>
	<div class="row-fluid" id="report_comments">
		<div class="span12 widget">
			<div class="widget-content">
				<?php// include 'modules/mod_comment/default.php'; ?>
			</div>
		</div>
	</div>
</div>
