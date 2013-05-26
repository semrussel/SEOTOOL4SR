<?php
	include '../../../api/api_sql.php';

	$mysql = new mysql();

	$mysql->query('SELECT DISTINCT COMPANYNAME FROM USER WHERE UserType = "Client";');
?>

<div id="company_reports">
	<div class="row-fluid">
		<select id="companies" class="span12">
			<option value="">--Select Company--</option>
<?php
		$companies = $mysql->row; 
		foreach($mysql->row as $row){

?>	
			<option value="<?php echo htmlspecialchars($row['COMPANYNAME']); ?>"><?php echo htmlspecialchars($row['COMPANYNAME']); ?></option>
<?php		}
?>
		</select>
	</div>
	<div class="row-fluid">
		<button class="span12 btn" id="company_reports_btn">Go!</button>
	</div>
</div>

<script src="modules/mod_reports/process/js/company_reports.js"></script>