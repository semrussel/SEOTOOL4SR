<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="css/js/jquerymedia.js"></script>

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
					<form enctype="multipart/form-data" action="modules/mod_reports/process/save_upload.php" method="post">
						<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
						<input type="hidden" name="completed" value="1">
						Please choose a .pdf to upload: <input type="file" name="imagefile" /><br>
						Please enter the title of that document: <input name="title" /><br />
						<input type="submit" value="Upload" class="btn" />
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span3">
			<div class="widget">
				<div class="widget-header">
					<i class="icon-list icon-white"></i>
					<h3>Previous Reports</h3>
				</div>
				<div class="widget-content">
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
						if(isset($_SESSION['status']) && $_SESSION['status'] = 1){
						?>
						<div class="alert alert-success">
							Successully uploaded the file. 
						</div>
						<?php
							unset($_SESSION['status']);
							
							$file_href = $_SESSION['last_id'];
							echo $file_href;
						}else if(isset($_SESSION['status']) && $_SESSION['status'] != 1){ ?>
						<div class="alert-warning">
							Something went wrong.  
						</div>
					<?php } 
						if(isset($_SESSION['last_id'])){
					?>

						<a class="media {width: 100%, height: 100%}" href="docs/<?php echo $_SESSION['last_id']; ?>.pdf">PDF File</a> 
						<?php unset($_SESSION['last_id']); ?>
					<?php }
							else{
					 ?>
					 	<span class="i">No preview available.</span>
					 	<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
