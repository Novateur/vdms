<?php	
	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$ref_no = sanitize($_POST['ref_no']);
	//$comp_id = get_comp_id_user();
	$sql="SELECT * FROM contract_docs WHERE ref_no='{$ref_no}'";
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
			<td>{$r['file_name']}</td>
			<td>{$r['file_title']}</td>
			<td><button type='button' class='btn btn-default btn-sm' onclick=\"delete_con_doc({$r['id']},'{$r['ref_no']}')\"><i class='i i-trashcan'></i></button></td>
			</tr>";
		}
		echo "</table>";
		echo "</form>";
	}
	else
	{
		echo "<h4>Upload signed documents attached to this contract</h4>";
	}

?>