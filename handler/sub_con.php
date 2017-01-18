<?php
	require_once("../includes/db.inc");
	require_once("../includes/functions.php");	
	
	$ref_no = $_POST['ref_no'];	
	
	//$comp_id = get_comp_id_user();
	$sql="SELECT * FROM contract_docs WHERE ref_no='{$ref_no}'";
	$query = $connection->query($sql);
	if($query->rowCount()>0)
	{
		echo "valid";
	}
	else
	{
		echo "invalid";
	}
	
?>