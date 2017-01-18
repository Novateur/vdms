<?php
	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$comp_id = get_comp_id_user();
	
	$sql="DELETE FROM contracts WHERE company_id={$comp_id} AND complete IS NULL";
	$query=$connection->query($sql);
?>