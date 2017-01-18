<?php
	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$first_name = sanitize($_POST['first_name']);
	$last_name = sanitize($_POST['last_name']);
	$add1 = sanitize($_POST['add1']);
	$add2 = sanitize($_POST['add2']);
	$add3 = sanitize($_POST['add3']);
	$city = sanitize($_POST['city']);
	$zip = sanitize($_POST['zip']);
	$country = sanitize($_POST['country']);
	$phone = sanitize($_POST['phone']);
	$email = sanitize($_POST['email']);
	$website = sanitize($_POST['website']);
	$rc_no = sanitize($_POST['rc_no']);
	$comp_id = get_comp_id_user();
	$name = $first_name." ".$last_name;
	
	$sql="INSERT INTO vendors (first_name,last_name,add1,add2,add3,city,zip,country,phone,email,website,company_id,rc_no,name) VALUES 
	('{$first_name}','{$last_name}','{$add1}','{$add2}','{$add3}','{$city}','{$zip}','{$country}','{$phone}','{$email}','{$website}',{$comp_id},'{$rc_no}','{$name}')";
	$query=$connection->query($sql);
	if($query)
	{
		echo "inserted";
	}
	else
	{
		echo "error";
	}
?>