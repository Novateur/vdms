<?php
	
	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$name = $_POST['name'];
	$email=$_POST['email'];
	$password=sha1(md5($_POST['password']));
	$loca=$_POST['loca'];
	
	$sql = "INSERT INTO users (name,email,pass,loca,photo) VALUES ('{$name}','{$email}','{$password}','{$loca}','avatar.png')";
	$query = $connection->query($sql);
	if($query)
	{
		$_SESSION['username']=$email;
		echo "inserted";
	}
	else
	{
		echo "error";
	}

?>