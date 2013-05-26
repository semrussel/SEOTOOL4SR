<?php
	include '../../../api/api_sql.php';

	$mysql = new mysql();
	$mysql->query('SELECT * FROM PROJECT');
?>
	<div class="row-fluid" style="margin-top: 10px;">
		<select id="select_project" class="span12">
		<?php
		foreach($mysql->row as $project){ ?>
			<option value="<?php echo htmlspecialchars($project['ProjectId']); ?>"><?php echo htmlspecialchars($project['ProjectTitle']); ?></option>
		<?php	} ?>
		</select>
	</div>
	<div class="row-fluid">
		<a class="btn span12" id="project_reports_submit">Go!</a>
	</div>
<script src="modules/mod_reports/process/js/project_reports.js"></script>