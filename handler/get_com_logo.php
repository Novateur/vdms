<?php

session_start();
require_once("../includes/db.inc");
	
	$id = $_POST['id'];
	
	$sql="SELECT logo FROM companies WHERE id={$id}";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			echo "<img src='logos/{$r['logo']}' width='250' height='200' class='img-responsive col-sm-offset-2'/>";
		}
	}
	else
	{
		echo "error";
	}
	
?>