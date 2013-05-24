<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="css/js/jquerymedia.js"></script>
<script type="text/javascript" src="modules/mod_reports/default.js"></script>


<script>   
	$("document").ready(function(){
    	$(".media").media();
    });
</script>

<div id="mod_reports">
	<div class="row-fluid">
		<div class="span12">
			<div class="widget">
				<div class="widget-header">
					<i class="icon-arrow-up icon-white"></i>
					<h3>Upload a report</h3>
				</div>
				<div class="widget-content">
					<form enctype="multipart/form-data" action="modules/mod_reports/process/save_upload.php" method="POST">
						<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
						<input type="hidden" name="completed" value="1">
						Please choose a .pdf to upload: <input type="file" id="imagefile" name="imagefile" /><br>
						Please enter the title of that document: <input name="title" /><br />
						Choose month and year for report:
						<input type="month" name="month" id="month" /> <br />
        				Please choose a project: <input type="text" placeholder="Search Project..." onkeyup="suggest_reports(this.value);" name = "project_title" id="project_title"/><br />
						<input type="hidden" name = "project_id" id="project_id" />
						<div id="report_suggestions"></div>
						<input type="submit" value="Upload" class="btn" />
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span3">
			<div class="widget">
				<div class="widget-header" id="pdf_preview">
					<i class="icon-list icon-white"></i>
					<h3>Previous Reports</h3>
				</div>
				<div class="widget-content">
					<table class="table table-striped table-hover">
						<?php
							//GET ALL REPORTS
							include 'api/api_sql.php';
							$mysql = new mysql();

							$mysql->query('SELECT * FROM REPORT;');
							$reports = $mysql->row;
						?>
						<tbody>
						<?php
							if($reports != null){
								foreach($reports as $row){
									//var_dump($row);
						?>
								<tr>
									<td>
										<a onclick="change_preview('<?php echo $row['File']; ?>');">
											<h6><?php echo $row['ReportTitle']; ?></h6>
											<span class="details" style="float: right;"><?php echo $row['DateCreated']; ?></span>
											<span class="details">Company for Report</span>
										</a>
									</td>
								</tr>
						<?php 	}
							}
							else echo '<i>List is empty.</i>';
							 ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="span9">
			<div class="widget">
				<div class="widget-header">
					<i class="icon-search icon-white"></i>
					<h3>Report Preview</h3>
				</div>
				<div class="widget-content">
					<?php 
						if(isset($_SESSION['status']) && $_SESSION['status'] == 1){
						?>
						<div class="alert alert-success">
							Successully uploaded the file. 
						</div>
						<?php
							unset($_SESSION['status']);
							
						}else if(isset($_SESSION['status']) && $_SESSION['status'] != 1){ ?>
						<div class="alert-warning">
							Something went wrong in uploading the file. Please try again.  
						</div>
					<?php } 
					//	if(isset($_SESSION['view_this'])){
					?>

						<a id="main_viewer" class="media {width: 800, height: 500}" href="docs/<?php echo isset($_SESSION['view_this'])?$_SESSION['view_this']:'' ; ?>.pdf"></a> 
						<?php unset($_SESSION['view_this']); ?>
					<?php// }
						//	else{
					 ?>
					 	<!--span class="i">No preview available.</span-->
					 	<?php// } ?>
				</div>
			</div>
		</div>
	</div>
</div>
