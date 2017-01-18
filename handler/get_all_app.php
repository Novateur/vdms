<?php

	require_once("../includes/db.inc");
	require_once("../includes/functions.php");

	$id = get_comp_id_user();
	$sql="SELECT * FROM oppurtunity WHERE id IN (SELECT opp_id FROM apllicants WHERE company_id={$id} AND complete=1)";
	$query = $connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		echo "<form>";
		echo "<button id='btn' style='display:none' onclick=\"del_marked()\" type='button' class='btn btn-danger pull-right'><i class='glyphicon glyphicon-trash'></i> Marked</button><br/><br/>";
		echo "<table class='table table-striped table-responsive'>
			<tr>
			<th><b>Action</b></th>
			<th><b>Name</b></th>
			<th><b>Ref_No</b></th>
			<th><b>Company</b></th>
			</tr>";
		foreach($query as $r)
		{
			echo "<tr>
			<td><button type='button' class='btn btn-sm btn-default dropdown-toggle' data-toggle='dropdown'><i class='i i-bars3'></i></button>
				<ul class='dropdown-menu'>
					<li><a href='application_details.php?ref_no={$r['id']}' >View details</a></li>
				</ul>
			</td>
			<td>{$r['name']}</td>
			<td>{$r['ref_no']}</td>
			<td>".get_user_com_name($r['company_id'])."</td>
			</tr>";
		}
		echo "</table>";
		echo "</form>";
	}
	else
	{
		"<h2>You have not submitted any application yet</h2>";
	}


?>