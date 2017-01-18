<?php
	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$id = $_POST['id'];
	
	$del_sql="SELECT renamed FROM docs WHERE id={$id}";
	$query_del=$connection->query($del_sql);
	if($query_del->rowCount()==1)
	{
		$query_del->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query_del as $r)
		{
			unlink("../docs/{$r['renamed']}");
			$sql="DELETE FROM docs WHERE id={$id}";
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
	}
?>