<?php

	$username=mysql_real_escape_string($_POST['username']);
	$password=md5($_POST['password']);
	$fname=mysql_real_escape_string($_POST['fname']);
	$lname=mysql_real_escape_string($_POST['lname']);
	$email=mysql_real_escape_string($_POST['email']);
	$compname=mysql_real_escape_string($_POST['compname']);
	$usertype="Client";

	require_once('../../../api/api_sql.php');

	$mysql = new mysql();
	$mysql->query("INSERT into User (Username, Password, UserType, Email, FirstName, LastName, CompanyName) values 
		('{$username}','{$password}','{$usertype}','{$email}','{$fname}','{$lname}','{$compname}');");

?>