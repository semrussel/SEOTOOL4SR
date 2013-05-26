<?php $date = new DateTime(); ?>
<div id="mod_projects">
	<div class="row-fluid">
		<div class="span5">
			<div class="widget">
				<div class="widget-header">
					<i class="icon-folder-open icon-white"></i>
					<h3>Create new project</h3>
				</div>
				<div class="widget-content">
					<div class="row-fluid">
						<div class="row-fluid">
							<form id="create_project" method="POST" onsubmit="return add_project();" autocomplete="off">
								<div class="input-prepend">
										<span class="add-on"><i class="icon-book"></i></span>
										<input type="text" name="title" id="prependedInput" style="width: 94%;" class="input-xlarge span12" onchange="check();" placeholder="Title of the Project..." />
								</div>
								<textarea name = "desc" onkeyup="check();" id = "proj_desc" class="span12" placeholder="A brief description of the project..."></textarea>	
								<input type="text" onkeyup="check();" class="span12 input-dropdown" name="get_client" id="get_client" placeholder="Enter Client..." />
								<input type="hidden" name= "client_id" id="get_userId"></input>
								<input type="hidden" name="author_id" id="author_id" value="<?php echo $_SESSION['user']['UserId']; ?>"/>
								<div id="client_suggestions" style="display:none;"></div>
								<input type="submit" data-loading-text="Creating..." class="btn span6" style="margin: 0px;" id="something" name="create_project" value="Create Project" />
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="widget">
				<div class="widget-header">
					<i class="icon-exclamation-sign"></i>
					<h3>Pending Project Reports</h3>
				</div>
				<div class="widget-content">
				</div>
			</div>
		</div>
		<div class="span7">	
			<div class="alert alert-success" id="alert_success">
				<a class="close" data-dismiss="alert">×</a>
				Successfully created a project!
			</div>
			<div class="alert alert-error" id="alert_fail">
				<a class="close" data-dismiss="alert">×</a>
				A problem occured while creating the project.
			</div>
			<div class="widget" id="current_projects">
				<div class="widget-header">
					<span title="Refresh table" onclick="return refresh_table();"><i class="icon-refresh icon-white pull-right header_icon"></i></span>
					<i class="icon-bookmark icon-white"></i>
					<h3>Current Projects</h3>
				</div>
				<div class="widget-content">
					<div id="table_refresh" class="row-fluid"></div>
					<!--table class="table table-striped table-hover project" id="table_refresh">	
					</table-->
				</div>
			</div>
		</div>
	</div>
</div>

<script src="modules/mod_projects/default.js"></script>
