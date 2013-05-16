<?php 
	include '../../../api/api_sql.php';

	$mysql = new mysql();


    $table = $_POST["column"];
    $q = $_POST["q"];

	$mysql->query("SELECT * FROM USER WHERE FirstName LIKE '%".$q."%' OR LastName LIKE '%".$q."%' LIMIT 10;");


	$i = 0;  
    if($mysql->row != null){
	    foreach($mysql->row as $row) {
	       	$row['FirstName'] = htmlspecialchars($row['FirstName']);
          $row['LastName'] = htmlspecialchars($row['LastName']);
          $row['CompanyName'] = htmlspecialchars($row['CompanyName']);
          $row['UserId'] = htmlspecialchars($row['UserId']);

          echo '
	       	<a onclick="select(\''.$row['FirstName'].' '.$row['LastName'].'\',\''.$row['UserId'].'\');">
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
