<?php	
	
	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	if(isset($_POST['opps']))
	{
		$opps=$_POST['opps'];
		array_map('sanitize',$opps);
		$opps=implode(',',$opps);
		
		$sql="DELETE FROM oppurtunity WHERE id IN ({$opps})";
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