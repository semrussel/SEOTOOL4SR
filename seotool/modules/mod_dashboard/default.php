<div id="mod_dashboard">	
	<div class="row-fluid">
		<div class="span3">
			<div class="widget">
				<div class="widget-header">
					<i class="icon-star  icon-white"></i>
					<h3>Quick shortcuts</h3>
				</div>
				<div class="widget-content">
					<div class="shortcuts">
						<?php 
							// FOR SEO SPECIALISTS 
						if($_SESSION['user']['UserType']=='SEO Specialist'){ ?>
						<a class="shortcut">
							<i class="icon-arrow-up"></i>
							<span>Upload a Report</span>
						</a>
						<?php } 
							// FOR SEO SPECIALISTS AND TIGRVINCI PERSONNEL
						if($_SESSION['user']['UserType']=='SEO Specialist' || $_SESSION['user']['UserType']=='Tigervinci'){ ?>
						<a class="shortcut">
							<i class="icon-folder-open"></i>
							<span>Create Project</span>
						</a>
						<a class="shortcut">
							<i class="icon-th-list"></i>
							<span>View all Reports</span>
						</a>
						<?php } 
							// FOR ALL REGISTERED USERS
						?>
						<a class="shortcut">
							<i class="icon-calendar"></i>
							<span>View Calendar</span>
						</a>
					</div>
				</div>
			</div>
			<div class="widget">
				<div class="widget-header">
					<i class="icon-bookmark icon-white"></i>
					<h3>Ongoing Projects</h3>
				</div>
				<div class = "widget-content" style="padding: 0px;">
					<ul class="widget-list">
						<li class="widget-item-list">
							<h3><a href="#">Project Name</a></h3>
							<h6>Company name/Client name</h6>
						</li>
						<li class="widget-item-list">
							<h3><a href="#">Project Name</a></h3>
							<h6>Company name/Client name</h6>
						</li>
						<li class="widget-item-list">
							<h3><a href="#">Project Name</a></h3>
							<h6>Company name/Client name</h6>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class= "span9">
			<div class="widget">
				<div class="widget-header">
					<i class="icon-pencil icon-white"></i>
					<h3>Reports for May</h3>
				</div>
				<div class="widget-content">
					<table class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th>No.</th>
								<th>Company</th>
								<th>Client name</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php
								for($i=0;$i<10;$i++){
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo "Company $i"; ?></td>
								<td><?php echo "Full Name $i"; ?></td>
								<td>Status</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row-fluid summary">
		<div class="span4">
			<div class="summary-item"></div>
		</div>
		<div class="span4">
		</div>
		<div class="span4">
		</div>
	</div>	
</div>