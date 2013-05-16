<?php
	var_dump($_POST);
?>
<div id="mod_projects">
	<div class="row-fluid">
		<div class="span6">
			<div class="widget">
				<div class="widget-header">
					<i class="icon-folder-open icon-white"></i>
					<h3>Create new project</h3>
				</div>
				<div class="widget-content">
					<form id="create_project" method="POST" autocomplete="off" action="#">
						<div class="row-fluid">
							<div class="row-fluid">
								<div class="input-prepend">
									<span class="add-on"><i class="icon-book"></i></span>
									<input type="text" id="prependedInput" style="width: 94%;" class="input-xlarge span12" placeholder="Title of the Project..." />
								</div>
								<textarea class="span12" placeholder="A brief description of the project..."></textarea>	
								<input type="text" class="span12 input-dropdown" name="get_client" id="get_client" placeholder="Enter Client..." />
								<input type="hidden" id="get_userId"></input>
								<div id="client_suggestions" style="display:none;"></div>
								<input type="checkbox" name="client" id="client" style="display: inline; " onchange="toggle('get_client');" />
								<label style="display: inline; " for = "client">Pending client</label>
								<a class="btn span6" href="#" style="margin: 0px;" disabled="true">Create Project</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="span6">
			<div class="widget">
				<div class="widget-header">
					<i class="icon-bookmark icon-white"></i>
					<h3>Current Projects</h3>
				</div>
				<div class="widget-content">
					<table class="table table-bordered table-striped table-hover project">
						<thead>
							<tr>
								<th>Project Name</th>
								<th>Company</th>
								<th>Date Created</th>
								<th>Actions</th>
							<tr>
						</thead>
						<tbody>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						</tbody>	
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="modules/mod_projects/default.js"></script>