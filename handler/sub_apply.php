<?php
	
	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$fname = sanitize($_POST['fname']);
	$lname = sanitize($_POST['lname']);
	$add = sanitize($_POST['add']);
	$city = sanitize($_POST['city']);
	$zip = sanitize($_POST['zip']);
	$state = sanitize($_POST['state']);
	$phone = sanitize($_POST['phone']);
	$opp_id = $_POST['opp_id'];
	$comp_id = get_comp_id_user();
	
	$sql="INSERT INTO apllicants (`first_name`,`last_name`,`add`,`city`,`zip`,`state`,`phone`,`company_id`,`opp_id`) 
	VALUES ('{$fname}','{$lname}','{$add}','{$city}','{$zip}','{$state}','{$phone}','{$comp_id}','{$opp_id}')";
	
	$query = $connection->query($sql);
	if($query)
	{
		echo "inserted";
	}
	else
	{
		echo "error";
	}

	
	
?>