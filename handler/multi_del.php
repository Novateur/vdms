<?php	
	
	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	if(isset($_POST['vendors']))
	{
		$vendors=$_POST['vendors'];
		array_map('sanitize',$vendors);
		$vendors=implode(',',$vendors);
		
		$sql="DELETE FROM vendors WHERE id IN ({$vendors})";
		$query=$connection->query($sql);
		if($query)
		{
			echo "deleted";
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