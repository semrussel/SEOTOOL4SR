<table class="table table-striped table-hover">
	<?php
		session_start();
		//GET ALL REPORTS
		include '../../../api/api_sql.php';
		include '../../../api/api_filter.php';

		$mysql = new mysql();

		$query = "";

		$_POST = array_map('mysql_real_escape_string', $_POST);

		$tigervinci = 0;
		if($_SESSION['user']['UserType'] == 'Tigervinci'){
			$tigervinci = 1;
		}		

		//ACCORDING TO MONTH
		if($_POST['filter'] == 'month'){
			//IF INTEGER CONVERT TO CURRENT ABBREVIATED MONTH
			$month = $_POST['month'];
			$year = $_POST['year'];  
			if(is_numeric($month)){
				$month = date('M'); 
				$year = date('Y');
			}

			$query = 'SELECT * FROM REPORT WHERE DATE_FORMAT(MONTHYEAR, "%b") = "'.$month.'" AND YEAR(MONTHYEAR) = '.$year.' AND TIGERVINCI = '.$tigervinci.';';
			$filter = $month.', '.$year;
		}
		//ACCORDING TO PROJECT
		else if($_POST['filter'] == 'project') {
			$query = 'SELECT * FROM REPORT WHERE WebsiteId = '.mysql_real_escape_string($_POST['project_id']).' AND TIGERVINCI = '.$tigervinci.';';
		}
		//ACCORDING TO COMPANY
		else if($_POST['filter'] == 'company') {
			$query = 'SELECT * FROM REPORT WHERE CLIENTID IN (SELECT USERID FROM USER WHERE COMPANYNAME="'.$_POST['company'].'") AND TIGERVINCI = '.$tigervinci.';';
			$filter = $_POST['company'];
		}
		//ADVANCED FILTER
		else if($_POST['filter'] == 'advanced'){
			$query = "SELECT * FROM REPORT WHERE ";
			if($_POST['report_title'] != ""){
				$query.= " REPORTTITLE LIKE '%".$_POST['report_title']."%' ";
			}
			if($_POST['file_title'] != ""){
				if($_POST['report_title'] != ""){
					$query.= " ".$_POST['conj_1']." ";
				}
				$query.= " REPORTTITLE LIKE '%".$_POST['report_title']."%' ";
			}
			if($_POST['in_project'] != ""){
				if($_POST['file_title'] != ""){
					$query.= " AND ";
				}
				$query .= " WEBSITEID = ".$_POST['in_project']." ";
			}
			if($_POST['monthyear'] != ""){
				if($_POST['report_title'] != "" && $_POST['in_project'] != ""){
					$query.= " ".$_POST['conj_2']." ";
				}
				$query.= " DATE_FORMAT(MONTHYEAR, '%Y-%m') = '".$_POST['monthyear']."' ";
			}
			if($_POST['report_title'] == "" && $_POST['file_title'] == "" && $_POST['in_project'] == "" && $_POST['monthyear'] == ""){
				$query .= "0";
			}
			$query .= " AND TIGERVINCI = ".$tigervinci.";";
			$filter = 'your search.';
		}

		if($query!=''){
			$mysql->query($query);
			$reports = $mysql->row;

			if($reports != null){
				array_walk_recursive($reports, "filter");
			}

			unset($mysql);

		?>
		<tbody>
		<?php
			if($_POST['filter'] == 'project'){
				//SET PROJECT TITLE FOR FILTER TITLE
				$mysql = new mysql();
				$mysql->query('SELECT PROJECTTITLE FROM PROJECT WHERE PROJECTID = '.mysql_real_escape_string($_POST['project_id']).';');
				
				array_walk_recursive($mysql->row, "filter");
				$filter = $mysql->row[0]['PROJECTTITLE'];
				unset($mysql);
			}
			if($reports != null){ 
			?>
			<tr>
				<td>Displaying reports for <?php echo $filter; ?></td>
			</tr>
		<?php
				$mysql = new mysql();
				foreach($reports as $row){
					$mysql->query('SELECT PROJECTTITLE FROM PROJECT WHERE PROJECTID = '.$row['WebsiteId'].';');

					//CLEAN STRING
					array_walk_recursive($mysql->row, "filter");
		?>
				<tr onclick="change_preview('<?php echo $row['File']; ?>');">
					<td>
						<a>
							<h6><?php echo $row['ReportTitle']; ?></h6>
							<span class="details" style="float: right;"><?php echo $row['DateCreated']; ?></span>
							<span class="details"><?php echo $mysql->row[0]['PROJECTTITLE']; ?></span>
						</a>
					</td>
				</tr>
		<?php 	}
			}
			else{

				echo '<i>There are no reports for: '.$filter.'</i>';
			}
			 ?>
		</tbody>
<?php	}
		else{ ?>
		There was something wrong with the query.
<?php }
 ?>
</table>