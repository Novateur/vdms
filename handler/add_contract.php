<?php

	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$con_name = sanitize($_POST['con_name']);
	$comp_id = get_comp_id_user();
	$from = sanitize($_POST['from']);
	$to = sanitize($_POST['to']);
	$ref = sanitize($_POST['ref']);
	$start = sanitize($_POST['start']);
	$end = sanitize($_POST['end']);
	$s = time(); 
	$date_time=strftime("%d/%m/%Y at %H:%M",$s);
	
	$sql="INSERT INTO contracts (contract_name,com_from,com_to,ref_no,progress,company_id,start_date,end_date,date_added,last_updated) 
	VALUES ('{$con_name}', '{$from}', '{$to}', '{$ref}', 'Initiated',{$comp_id},'{$start}','{$end}','{$date_time}','{$date_time}')";
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