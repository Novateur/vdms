<?php

require_once("../includes/db.inc");
require_once("../includes/functions.php");

	$ref_no = sanitize($_POST['ref_no']);
	//$comp_id = get_comp_id_user();
	$title = sanitize($_POST['title']);
	$tmp_file2=$_FILES['file2']['tmp_name'];
	$target_file2=basename($_FILES['file2']['name']);
	$size=$_FILES['file2']['size'];
	$type=$_FILES['file2']['type'];
	$extension=strtolower(substr($target_file2,strpos($target_file2,'.')+1));
	
	$rename = rand(0,1000)."CON".rand(0,1000).".".$extension;
	
	if($extension=="pdf" && $size<=1000000){
		$upload_dir2="../contract_docs";
		$db_upload=move_uploaded_file($tmp_file2, $upload_dir2."/".$rename);
		$query=$connection->query("INSERT into contract_docs (file_name,file_title,renamed,ref_no) VALUES ('{$target_file2}','{$title}','{$rename}','{$ref_no}')");
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
?>