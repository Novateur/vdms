<?php
	
	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$id = $_POST['id'];
	
	$sql="DELETE FROM users WHERE id={$id}";
	$query = $connection->query($sql);
	if($query)
	{
		echo "deleted";
	}
	else
	{
		echo "error";
	}

?>