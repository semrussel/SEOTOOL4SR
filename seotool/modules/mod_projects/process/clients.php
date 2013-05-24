<?php 
	include '../../../api/api_sql.php';

	$mysql = new mysql();

    $q = $_POST["q"];
    $divname = $_POST["divname"];
    $divid = $_POST["divid"];

	$mysql->query("SELECT * FROM USER WHERE FirstName LIKE '%".$q."%' OR LastName LIKE '%".$q."%' OR COMPANYNAME LIKE '%".$q."%' LIMIT 10;");


	$i = 0;  
    if($mysql->row != null){
	    foreach($mysql->row as $row) {
	       	$row['FirstName'] = htmlspecialchars($row['FirstName']);
          $row['LastName'] = htmlspecialchars($row['LastName']);
          $row['CompanyName'] = htmlspecialchars($row['CompanyName']);
          $row['UserId'] = htmlspecialchars($row['UserId']);

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
