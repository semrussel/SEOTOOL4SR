<?php
	include '../../../api/api_sql.php';

	$mysql = new mysql();
	$mysql->query('SELECT ProjectID, ProjectTitle FROM PROJECT;');
	$projects = $mysql->row;

?>
<div id="advanced_form">
	<div class="row-fluid">
		<input type="text" class="span9" id="report_title_contains" placeholder="Report title contains..." />
		<select class="span3" id="conj_1">
			<option value="OR">OR</option>
			<option value="AND">AND</option>
		</select>
	</div>
	<div class="row-fluid">
		<input type="text" class="span9" id="file_title_contains" placeholder="File title contains..." />
		<select class="span3" disabled="disabled">
			<option value="OR">IN</option>
		</select>
	</div>
	<div class="row-fluid">
		<select class="span9" id="in_project">
			<option value="">--Select Project--</option>
<?php
	foreach($projects as $row){
?>
		<option value="<?php echo htmlspecialchars($row['ProjectID']); ?>"><?php echo htmlspecialchars($row['ProjectTitle']); ?></option>
<?php
	}
?>
		</select>
		<select class="span3" id="conj_2">
			<option value="OR">OR</option>
			<option value="AND">AND</option>
		</select>
	</div>
	<div class="row-fluid">
		<div class="span9">
			<input type="month" id="for_month_of" class="span12"/>
		</div>
		<div class="span3">
			<button class="span12 btn" id="advanced_search_submit">Go!</button>
		</div>
	</div>
</div>

<script src="modules/mod_reports/process/js/advanced_reports.js"></script>