<?php

require_once("../includes/db.inc");
require_once("../includes/functions.php");

	$opp_id = $_POST['opp_id'];
	$comp_id = get_comp_id_user();
	$title = sanitize($_POST['title']);
	$tmp_file2=$_FILES['file2']['tmp_name'];
	$target_file2=basename($_FILES['file2']['name']);
	$size=$_FILES['file2']['size'];
	$type=$_FILES['file2']['type'];
	$extension=strtolower(substr($target_file2,strpos($target_file2,'.')+1));
	
	$rename = rand(0,1000).".".$extension;
	
	if($extension=="doc" || $extension=="docx" || $extension=="pdf" && $size<=1000000){
		$upload_dir2="../docs";
		$db_upload=move_uploaded_file($tmp_file2, $upload_dir2."/".$rename);
		$query=$connection->query("INSERT into docs (file,title,opp_id,company_id,renamed) VALUES ('{$target_file2}','{$title}','{$opp_id}','{$comp_id}','{$rename}')");
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