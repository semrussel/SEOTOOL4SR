<?php
	include '../../../api/api_sql.php';
	include '../../../api/api_filter.php';

	//CLEAN QUERY, CLEAN RESULTS
	$mysql = new mysql();
	$_POST = array_map('mysql_real_escape_string', $_POST);
	$mysql->query('SELECT ReportTitle, DateCreated, WebsiteId, DATE_FORMAT(MonthYear, "%b") AS MONTH, DATE_FORMAT(MonthYear, "%Y") AS YEAR FROM REPORT WHERE FILE = '.$_POST['id'].';');
	if($mysql->row != null){
		array_walk_recursive($mysql->row, 'filter');
	}
	$report = $mysql->row;

	unset($mysql);
	$mysql = new mysql();
	$mysql->query('SELECT PROJECTTITLE FROM PROJECT WHERE PROJECTID = '.$report[0]['WebsiteId'].';');
	if($mysql->row != null){
		array_walk_recursive($mysql->row, 'filter');
	}
	$comp = $mysql->row;
?>

<div class="row-fluid pdf_detail">
	<div class="span3">
		<span class="detail"><?php echo $report[0]['ReportTitle']; ?></span>
	</div>
	<div class="span3">
		<span class="detail row-fluid"><?php echo $report[0]['DateCreated']; ?></span>
	</div>
	<div class="span3">
		<span class="detail row-fluid"><?php echo $report[0]['MONTH'].', '.$report[0]['YEAR']; ?></span>
	</div>
	<div class="span3">
		<span class="detail row-fluid"><?php echo $comp[0]['PROJECTTITLE']; ?></span>
	</div>
</div>
<div class="row-fluid pdf_detail">
	<div class="span3">
		<span class="details row-fluid">Report title</span>
	</div>
	<div class="span3">
		<span class="details row-fluid">Date Created</span>
	</div>
	<div class="span3">
		<span class="details row-fluid">Month and Year of Report</span>
	</div>
	<div class="span3">
		<span class="details row-fluid">Project</span>
	</div>
</div>