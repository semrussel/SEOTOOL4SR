<?php 
  include '../../../api/api_sql.php';
	include '../../../api/api_filter.php';

	$mysql = new mysql();

    $_POST = array_map('mysql_escape_string', $_POST);

    $q = $_POST["q"];
    $divname = $_POST["divname"];
    $divid = $_POST["divid"];

	$mysql->query("SELECT * FROM USER WHERE FirstName LIKE '%".$q."%' OR LastName LIKE '%".$q."%' OR COMPANYNAME LIKE '%".$q."%' LIMIT 10;");


	$i = 0;  
    if($mysql->row != null){
	    foreach($mysql->row as $row) {
          array_walk_recursive($row, "filter");

          echo '
	       	<a onclick="select(\''.$row['FirstName'].' '.$row['LastName'].'\',\''.$row['UserId'].'\', \''.$divname.'\', \''.$divid.'\');">
	       		<div class="suggestion" id="division'.$i.'>
       			<form name="selector">	
       				<span class="suggestion_label'.$i.'">'
       				.$row['FirstName'].
       				'&nbsp;'
       				.$row['LastName'].
       				'</span>
       				<span class="details">'
       				.$row['CompanyName'].
       				'</span>
   				</div></a>';
	    	$i++;
	    }
	}
?>
