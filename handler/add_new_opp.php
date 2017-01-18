<?php

	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$image=basename($_FILES['file1']['name']);
	$opp_name = sanitize($_POST['opp_name']);
	$intro = sanitize($_POST['intro']);
	$scope = sanitize($_POST['scope']);
	$requirements = sanitize($_POST['requirements']);
	$terms = sanitize($_POST['terms']);
	$loca = sanitize($_POST['loca']);
	$type = sanitize($_POST['type']);
	$comp_id = get_comp_id_user();
	$com_name = get_user_com_name();
	
	$date_time = time();
	$year = strftime("%Y",$date_time);
	
	$ref_no = substr(strtoupper($loca),0,3)."/".$year."/".substr(strtoupper($com_name),0,2)."/".rand(0,1000000);
	
	if($image!="")
	{
		$tmp_file2=$_FILES['file1']['tmp_name'];
		$target_file2=basename($_FILES['file1']['name']);
		$size=$_FILES['file1']['size'];
		$type1=$_FILES['file1']['type'];
		$extension=strtolower(substr($target_file2,strpos($target_file2,'.')+1));
		
		$rename = rand(0,1000)."OPP".rand(0,1000).".".$extension;
		
		if($extension=="pdf" || $extension=="docx" || $extension=="doc" && $size<=1000000)
		{
			$upload_dir2="../opp_docs";
			$db_upload=move_uploaded_file($tmp_file2, $upload_dir2."/".$rename);
			$query=$connection->query("INSERT INTO oppurtunity (name,introduction,scope,Requirements,terms,location,type,company_id,ref_no,doc) 
			VALUES ('{$opp_name}', '{$intro}', '{$scope}', '{$requirements}', '{$terms}', '{$loca}', '{$type}',{$comp_id},'{$ref_no}','{$rename}')");
			if($query)
			{
				echo "inserted";
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
		$sql="INSERT INTO oppurtunity (name,introduction,scope,Requirements,terms,location,type,company_id,ref_no) VALUES 
		('{$opp_name}', '{$intro}', '{$scope}', '{$requirements}', '{$terms}', '{$loca}', '{$type}',{$comp_id},'{$ref_no}')";
		$query = $connection->query($sql);
		if($query)
		{
			echo "inserted";
		}
		else
		{
			echo "error";
		}
	}
?>