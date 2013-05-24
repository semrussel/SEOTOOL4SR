<p id="searchresults">
<?php
	
	require_once('../../../api/api_sql.php');
	$mysql = new mysql();
	
	$db = $mysql->mysql;
	
	if(!$db) {
		
		echo 'ERROR: Could not connect to the database.';
	} else {
		
		if(isset($_POST['queryString'])) {
			$queryString = mysql_real_escape_string($_POST['queryString']);
			$queryString = strtolower($queryString);
			$countRep = 0;
			$countProj = 0;
			
			if(strlen($queryString) >0) {
				$query = mysql_query("SELECT * FROM Project WHERE ProjectTitle LIKE  '%{$queryString}%' LIMIT 4;");
				$query1 =  mysql_query("SELECT * FROM Report WHERE ReportTitle LIKE  '%{$queryString}%' LIMIT 4;");
				
				if($query && $query1) {
					$project_id = 0;
					$report_id = 0;
					
				
					while ($result = mysql_fetch_assoc($query)) {
						if($result['ProjectId'] != $project_id) { 
							
							$project_id = $result['ProjectId'];
						}	
								
							if ($countProj === 0) {	
								echo '<span class="category"><b>'.'Projects'.'</b></span>';
							}	
	         			echo '<a href="'.'show_profile.php'.'">';
	         				         			
	         			$name = "{$result['ProjectTitle']}";
	         			if(strlen($name) > 35) { 
	         				$name = substr($name, 0, 35) . "...";
	         			}	         			
	         			echo '<span class="searchheading">&nbsp;&nbsp;'.htmlspecialchars($name).'</span>';
	         			
	         			$description = $result['DateCreated'];
	         			if(strlen($description) > 80) { 
	         				$description = substr($description, 0, 80) . "...";
	         			}
	         			
	         			echo '<span>&nbsp;&nbsp;'.htmlspecialchars($description).'</span></a>';
						$countProj++;
						
						}
						while ($result1 = mysql_fetch_assoc($query1)) {
						if($result1['ReportId'] != $report_id) { 
							
							$report_id = $result['ReportId'];
						}	
								
							if ($countRep === 0) {	
								echo '<span class="category"><b>'.'Reports'.'</b></span>';
							}	
	         			echo '<a href="'.'show_profile.php'.'">';
	         		
	         			$name1 = "{$result1['ReportTitle']}";
	         			if(strlen($name1) > 35) { 
	         				$name1 = substr($name1, 0, 35) . "...";
	         			}	         			
	         			echo '<span class="searchheading">&nbsp;&nbsp;'.htmlspecialchars($name1).'</span>';
	         			
	         			$description1 = "{$result1['DateCreated']}";
	         			if(strlen($description1) > 80) { 
	         				$description1 = substr($description1, 0, 80) . "...";
	         			}
	         			
	         			echo '<span>&nbsp;&nbsp;'.htmlspecialchars($description1).'</span></a>';
						$countRep++;
	         		}
					if (($countProj===0)&&($countRep==0)) {	
						echo '<span class="seperator">No results found.</span><br class="break" />';
					}else {
						echo '<span class="seperator"></span><br class="break" />';
					}
				} else {
					echo 'ERROR: There was a problem with the query.';
				}
			} else {
				// Dont do anything.
			} // There is a queryString.
		} else {
			echo 'There should be no direct access to this script!';
		}
	}
?>
</p>