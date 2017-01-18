<?php
	
	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$id = $_POST['id'];
	$name = sanitize($_POST['name']);
	$email = sanitize($_POST['email']);
	$position = sanitize($_POST['position']);
	$access = sanitize($_POST['access']);
	$pass = sha1(md5($_POST['pass']));
	
	if($pass!="")
	{
		$sql="UPDATE users SET name='{$name}',email='{$email}',position='{$position}',pass='{$pass}',level='{$access}' WHERE id={$id}";
		$query = $connection->query($sql);
		if($query)
		{
			echo "updated";
		}
		else
		{
			echo "error";
		}
	}
	else
	{
		$sql="UPDATE users SET name='{$name}',email='{$email}',position='{$position}',level='{$access}' WHERE id={$id}";
		$query = $connection->query($sql);
		if($query)
		{
			echo "updated";
		}
		else
		{
			echo "error";
		}
	}

?>