<?php
	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$id = $_POST['id'];
	$comp_id = get_comp_id_user();
	
	$sql="UPDATE apllicants SET complete=1 WHERE opp_id={$id} AND company_id={$comp_id}";
	$query=$connection->query($sql);
	if($query)
	{
		echo "submitted";
	}
	else
	{
		echo "error";
	}
		
?>