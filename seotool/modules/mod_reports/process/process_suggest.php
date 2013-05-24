<?php
	require_once('../../../api/api_sql.php');
	$mysql = new mysql();
	
	$db = $mysql->mysql;
	
	if(!$db) { 
		echo 'ERROR: Could not connect to the database.';
	} 
	else {
		
		if(isset($_POST['queryString'])) {
			$queryString = mysql_real_escape_string($_POST['queryString']);
			$queryString = strtolower($queryString);
			
			if(strlen($queryString) > 0) {
				$query = mysql_query("SELECT * FROM Project WHERE ProjectTitle LIKE '%{$queryString}%' LIMIT 4;");
				
				if($query) {
				
					while ($result = mysql_fetch_assoc($query)) {
						$mysql->query("SELECT CompanyName FROM user WHERE UserId = ".$result['ClientId'].";");
						
						echo '<div class="suggestion"><a onclick="get_project(\''.htmlspecialchars($result['ProjectTitle']).'\', '.htmlspecialchars($result['ProjectId']).');">';
						echo '<span class="searchheading">'.htmlspecialchars($result['ProjectTitle']).'</span>';
						echo '<span class="details">'.htmlspecialchars($mysql->row[0]['CompanyName']).'</span>';
						echo '</a></div>';
					}
				} else {
					echo 'ERROR: There was a problem with the query.';
				}
			} else {
				// Dont do anything.
			} // There is a queryString.
		} 
		else {
			echo 'There should be no direct access to this script!';
		}
	}
?>