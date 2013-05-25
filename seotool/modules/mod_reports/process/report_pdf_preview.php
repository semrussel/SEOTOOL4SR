<table class="table table-striped table-hover">
	<?php

		//GET ALL REPORTS
		include '../../../api/api_sql.php';
		$mysql = new mysql();

		//IF INTEGER CONVERT TO CURRENT ABBREVIATED MONTH
		$month = $_POST['month'];
		$year = $_POST['year'];  
		if(is_numeric($month)){
			$month = date('M'); 
			$year = date('Y');
		}

		$mysql->query('SELECT * FROM REPORT WHERE DATE_FORMAT(MONTHYEAR, "%b") = "'.$month.'" AND YEAR(MONTHYEAR) = '.$year.';');
		$reports = $mysql->row;
		unset($mysql);

		$mysql = new mysql();
	?>
	<tbody>
	<?php
		if($reports != null){ ?>
		<tr>
			<td>Displaying reports for <?php echo $month.', '.$year; ?></td>
		</tr>
	<?php
			foreach($reports as $row){
				$mysql->query('SELECT PROJECTTITLE FROM PROJECT WHERE PROJECTID = '.$row['WebsiteId'].';');
	?>
			<tr>
				<td>
					<a onclick="change_preview('<?php echo $row['File']; ?>');">
						<h6><?php echo $row['ReportTitle']; ?></h6>
						<span class="details" style="float: right;"><?php echo $row['DateCreated']; ?></span>
						<span class="details"><?php echo $mysql->row[0]['PROJECTTITLE']; ?></span>
					</a>
				</td>
			</tr>
	<?php 	}
		}
		else echo '<i>There are no reports for the month of: '.$month.', '.$_POST["year"].'</i>';
		 ?>
	</tbody>
</table>