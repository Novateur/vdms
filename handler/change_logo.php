<?php
header('Content-type: application/json');
session_start();
require_once("../includes/db.inc");

	$id = $_POST['id'];
	$tmp_file2=$_FILES['file1']['tmp_name'];
	$target_file2=basename($_FILES['file1']['name']);
	$size=$_FILES['file1']['size'];
	$type=$_FILES['file1']['type'];
	$extension=strtolower(substr($target_file2,strpos($target_file2,'.')+1));
	
	if($extension=="jpg" || $extension=="jpeg" || $extension=="png" || $extension=="gif" && $type=="image/gif" || $type=="image/png" || $type=="image/jpeg" && $size<=1000000){
		$upload_dir2="../logos";
		$db_upload=move_uploaded_file($tmp_file2, $upload_dir2."/".$target_file2);
		$query=$connection->query("UPDATE companies SET logo='{$target_file2}' WHERE id={$id}");
		if($query)
		{
			$reply=array('status'=>'updated','comid'=>$id);
			echo json_encode($reply);
		}
		else
		{
			$reply=array('status'=>'error');
			echo json_encode($reply);
		}
	}
	else
	{
		$reply=array('status'=>'error');
		echo json_encode($reply);
	}
?>