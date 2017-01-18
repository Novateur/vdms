<?php
	ob_start();
	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$email=$_POST['email'];
	$password=sha1(md5($_POST['password']));
	
	
	$sql="SELECT * FROM users WHERE email='{$email}' AND pass='{$password}'";
	$query = $connection->query($sql);
	if($query->rowCount()==1)
	{
		$_SESSION['username']=$email;
		echo "yes";
	}
	else
	{
		echo "no";
	}
?>