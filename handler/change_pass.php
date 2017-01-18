<?php

	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$id = get_user_id();
	
	$current_pass = sha1(md5($_POST['pass']));
	$new_pass = $_POST['pass1'];
	$con_pass = $_POST['pass2'];
	
	$sql="SELECT pass FROM users WHERE pass='{$current_pass}' AND id={$id}";
	$query = $connection->query($sql);
	if($query->rowCount()==1)
	{
		if($new_pass==$con_pass)
		{
			$hashed_new_pass = sha1(md5($new_pass));
			$sql="UPDATE users SET pass='{$hashed_new_pass}' WHERE id={$id}";
			$query = $connection->query($sql);
			if($query)
			{
				echo "updated";
			}
			else
			{
				echo "Password updating error";
			}
		}
		else
		{
			echo "Password mismatch";
		}
	}
	else
	{
		echo "The password you inputed is incorrect";
	}

?>