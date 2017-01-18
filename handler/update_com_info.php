<?php

	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$id = $_POST['id'];
	$com_name = sanitize($_POST['com_name']);
	$add1 = sanitize($_POST['add1']);
	$add2 = sanitize($_POST['add2']);
	$city = sanitize($_POST['city']);
	$zip = sanitize($_POST['zip']);
	$country = sanitize($_POST['country']);
	$phone = sanitize($_POST['phone']);
	$fax = sanitize($_POST['fax']);
	$rc_no = sanitize($_POST['rc_no']);
	$email = sanitize($_POST['email']);
	$website = sanitize($_POST['website']);
	
	$sql="UPDATE companies SET com_name='{$com_name}',add1='{$add1}',add2='{$add2}',city='{$city}',zip='{$zip}',country='{$country}',phone='{$phone}',fax='{$fax}',rc_no='{$rc_no}',email='{$email}',website='{$website}' WHERE id={$id}";
	$query=$connection->query($sql);
	if($query)
	{
		echo "updated";
	}
	else
	{
		echo "error";
	}
	
?>