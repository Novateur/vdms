<?php	
	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$id = $_POST['id'];
	$comp_id = get_comp_id_user();
	$sql="SELECT * FROM docs WHERE opp_id={$id} AND company_id={$comp_id}";
	$query = $connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		echo "<form>";
		echo "<table class='table table-striped table-responsive'>
			<tr>
			<th><b>File name</b></th>
			<th><b>File title</b></th>
			<th><b>Delete</b></th>
			</tr>";
		foreach($query as $r)
		{
			echo "<tr>
			<td>{$r['file']}</td>
			<td>{$r['title']}</td>
			<td><button type='button' class='btn btn-default btn-sm' onclick=\"delete_doc({$r['id']},{$id})\"><i class='i i-trashcan'></i></button></td>
			</tr>";
		}
		echo "</table>";
		echo "</form>";
	}
	else
	{
		echo "<h4>No document uploaded yet</h4>";
	}

?>