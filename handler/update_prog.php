<?php
	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$progress = sanitize($_POST['prog']);
	$id = sanitize($_POST['con_id']);
	$comment = sanitize($_POST['comment']);
	$user_id = get_user_id();
	$percent = $_POST['ma_slider'];
	$s = time(); 
	$date_time=strftime("%d/%m/%Y at %H:%M",$s);
	
	
	if($progress=="Ongoing")
	{
		$sql="UPDATE contracts SET progress='{$progress}',comment='{$comment}',percent='{$percent}',last_updated='{$date_time}',user_id={$user_id} WHERE id={$id}";
	}
	else
	{
		$sql="UPDATE contracts SET progress='{$progress}',comment='{$comment}',last_updated='{$date_time}',percent='',user_id={$user_id} WHERE id={$id}";
	}
	$query = $connection->query($sql);
	if($query)
	{
		echo "updated";
	}
	else
	{
		echo "error";
	}
?>