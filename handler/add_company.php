<?php
	
	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$country = $_POST['country'];
	$company_name=$_POST['com_name'];
	$add1=$_POST['add1'];
	$add2=$_POST['add2'];
	$city=$_POST['city'];
	$zip=$_POST['zip'];
	$state=$_POST['state'];
	$phone=$_POST['phone'];
	$image=basename($_FILES['file1']['name']);
	
	$admin_id = get_user_id();
	
	if($image!="")
	{
		
		$tmp_file2=$_FILES['file1']['tmp_name'];
		$target_file2=basename($_FILES['file1']['name']);
		$size=$_FILES['file1']['size'];
		$type=$_FILES['file1']['type'];
		$extension=strtolower(substr($target_file2,strpos($target_file2,'.')+1));
		
		if($extension=="jpg" || $extension=="jpeg" || $extension=="gif" || $extension=="png" && $type=="image/jpeg" || $type=="image/png" || $type=="image/gif" && $size<=1000000){
			$upload_dir2="../logos";
			$db_upload=move_uploaded_file($tmp_file2, $upload_dir2."/".$target_file2);
			$sql="INSERT INTO companies (country,add1,add2,city,zip,state,phone,com_name,logo,admin_id)
			VALUES ('{$country}','{$add1}','{$add2}','{$city}','{$zip}','{$state}','{$phone}','{$company_name}','{$target_file2}','{$admin_id}')";
			$query = $connection->query($sql);
			if($query)
			{
				$comp_id = get_comp_id($admin_id);
				$sql1="UPDATE users SET company_id={$comp_id},level='admin',position='Manager' WHERE email='{$_SESSION['username']}'";
				$query1 = $connection->query($sql1);
				if($query1)
				{
					echo "inserted";
				}
			}
			else
			{
				echo "error";
			}
		}
		else
		{
			echo "error";
		}
	}
	else
	{
		$sql="INSERT INTO companies (country,add1,add2,city,zip,state,phone,com_name,logo,admin_id)
		VALUES ('{$country}','{$add1}','{$add2}','{$city}','{$zip}','{$state}','{$phone}','{$company_name}','com_logo.png','{$admin_id}')";
		$query = $connection->query($sql);
		if($query)
		{
			$comp_id = get_comp_id($admin_id);
			$sql1="UPDATE users SET company_id={$comp_id},level='admin',position='Manager' WHERE email='{$_SESSION['username']}'";
			$query1 = $connection->query($sql1);
			if($query1)
			{
				echo "inserted";
			}
		}
		else
		{
			echo "error";
		}
	}
	
	
?>