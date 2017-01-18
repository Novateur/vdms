<?php
	require_once("../includes/db.inc");
	require_once("../includes/functions.php");	
	
	$ref_no = $_POST['ref_no'];	
	$comp_id = get_comp_id_user();
	
	$sql="UPDATE contracts SET complete=1 WHERE company_id={$comp_id} AND ref_no='{$ref_no}'";
	$query = $connection->query($sql);
	if($query)
	{
		echo "added";
	}
	else
	{
		echo "error";
	}
	
?>