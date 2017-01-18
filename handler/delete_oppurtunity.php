<?php
	header('Content-type: application/json');
	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$id = $_POST['id'];
	$type = $_POST['type'];
	//$sort = $_POST['sort_type'];
	
	$sql="DELETE FROM oppurtunity WHERE id={$id}";
	$query=$connection->query($sql);
	if($query)
	{
		$reply=array("status"=>"deleted","type"=>"{$type}");
		echo json_encode($reply);
	}
	else
	{
		$reply=array("status"=>"error","type"=>"{$type}");
		echo json_encode($reply);
	}
?>