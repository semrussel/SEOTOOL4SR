<?php

require_once('../../../api/api_sql.php');


	if ((isset($_POST['value'])) && (isset($_POST['fieldID']))) {
		$value=trim($_POST['value']);
		$fieldID=$_POST['fieldID'];

		switch($fieldID){

			case 'username':
				validateUsername($value);
				break;
			case 'email':
				validateEmail($value);
				break;
		}

	}

	function validateUsername($input){
		$mysql = new mysql();
		$mysql->query("SELECT count(*) as count from User where Username='{$input}';");

		if ($mysql->row===null) {
			$myrow=null;
		}else {
			foreach ($mysql->row as $myrow) {
			}
		}

		if ($myrow['count']==='0'){
			echo "valid";
		}else {
			echo "invalid";
		}
		
	}

	function validateEmail($input){
		$mysql = new mysql();
		$mysql->query("SELECT count(*) as count from User where Email='{$input}';");

		if ($mysql->row===null) {
			$myrow=null;
		}else {
			foreach ($mysql->row as $myrow) {
			}
		}

		if(preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i', $input)){
			if ($myrow['count']==='0'){
				echo "valid";
			}else {
				echo "invalid";
			}
		}else {
			echo "invalidPattern";
		}
		
	}

?>