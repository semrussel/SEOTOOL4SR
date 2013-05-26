<?php
	include '../../../api/api_sql.php';
	include '../../../api/api_filter.php';
	unset($mysql);

//	var_dump($_POST);

	$mysql = new mysql();

	$_POST = array_map('mysql_real_escape_string', $_POST);
	$mysql->query('SELECT MONTH(DATECREATED) AS MONTH, YEAR(DATECREATED) AS YEAR, REPORTTITLE, DATECREATED, REPORTID, FILE FROM REPORT WHERE WEBSITEID = '.$_POST['id'].' ORDER BY '.$_POST['accdg'].' '.$_POST['asc'].';');
//	var_dump($mysql->row);
?>
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th></th>
				<th>Month</th>
				<th>Title</th>
				<th>Date Uploaded</th>
				<th class="sort_by">Sort by:
					<button class="btn" title="Month" id="sort_by_month" onclick="sort('MONTH, YEAR');"><i class="icon-calendar"></i></button>
					<button class="btn" title="Title" id="sort_title" onclick="sort('REPORTTITLE')"><i class="icon-tag"></i></button>
					<button class="btn" title="Date Uploaded" id="sort_dateupload" onclick="sort('DATECREATED')"><i class="icon-arrow-up"></i></button>
				</th>
				<th class="sort_by_2">
					<button class="btn" title="Ascending" id="sort_ascending" onclick="sort_2('ASC')"><i class="icon-hand-up"></i></button>
					<button class="btn" title="Descending" id="sort_descending" onclick="sort_2('DESC')"><i class="icon-hand-down"></i></button>
				</th>
			</tr>
		</thead>
		<tbody >

<?php
	if($mysql->row != null){
		$no = 1;
		foreach($mysql->row as $row){ 
			array_walk_recursive($row, "filter");
			?>
			<tr class="clickable_report" onclick="view_report(<?php echo $row['FILE']; ?>);">
				<input class="hidden" value="<?php echo $row['REPORTID']; ?>" id="id" />
				<td><?php echo $no; ?></td>
				<td><?php echo date("F Y", mktime(0,0,0,$row['MONTH'],1,$row['YEAR'])); ?></td>
				<td><?php echo $row['REPORTTITLE']; ?></td>
				<td colspan="3" class="clickable_report"><?php echo $row['DATECREATED']; ?></td>
			</tr>
	<?php	
		$no++;	
		}
	}
	else{ ?>
		<tr><td colspan="6">No data to display.</tr>
<?php	}
	?>
		</tbody>
	</table>
