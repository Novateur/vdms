<?php

	require_once("../includes/db.inc");
	require_once("../includes/functions.php");

	$id = get_comp_id_user();
	
	$sql_pag="SELECT COUNT(*) FROM contracts WHERE company_id={$id}";
	$totalpage=$connection->query($sql_pag);
	$totalpage->setFetchMode(PDO::FETCH_ASSOC);
	foreach($totalpage as $t)
	{
		$totalpage1=array_shift($t);
	}
	$limit=20;
	$page=$_GET['page'];
	if($page)
	{
		$start=($page-1) * $limit;
	}
	else
	{
		$start=0;
	}
	$sql="SELECT * FROM contracts WHERE company_id={$id} LIMIT $start, $limit";
	$query = $connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		echo "<form>";
		echo "<button id='btn' style='display:none' onclick=\"del_marked()\" type='button' class='btn btn-danger pull-right'><i class='glyphicon glyphicon-trash'></i> Marked</button><br/><br/>";
		echo "<table class='table table-striped table-responsive'>
			<tr>
			<th><b>Action</b></th>
			<th><b>Contract Name</b></th>
			<th><b>From</b></th>
			<th><b>To</b></th>
			<th><b>Ref_Number</b></th>
			<th><b>Progress</b></th>
			</tr>";
		foreach($query as $r)
		{
			echo "<tr>
			<td><button type='button' class='btn btn-sm btn-default dropdown-toggle' data-toggle='dropdown'><i class='i i-bars3'></i></button>
				<ul class='dropdown-menu'>
					<li><a href='contract_details.php?ref_no={$r['id']}&user_ref={$r['company_id']}&page={$page}' >View details</a></li>
					<li><a href='#' onclick=\"update_progress({$r['id']})\">Update progress</a></li>
				</ul>
			</td>
			<td>{$r['contract_name']}</td>
			<td>{$r['com_from']}</td>
			<td>{$r['com_to']}</td>
			<td>{$r['ref_no']}</td>
			<td>{$r['progress']}</td>
			</tr>";
		}
		echo "</table>";
		echo "</form>";
		echo "</div>";
			echo"<div class='row'>";
				echo "<div class='col-sm-12'>";
					echo "<div align='center'id='paginate1'>";
						$previous=$page-1;
						$next=$page+1;
						$total_num_pages=ceil($totalpage1/$limit);
						if($total_num_pages>1)
						{
							if($previous>=1)
							{
								echo "<button type='button'class='btn btn-default btn-sm' onclick=\"paginate({$previous})\">Previous</button> ";
							}
							for($i=1;$i<=$total_num_pages;$i++)
							{
								if($i==$page)
								{
									echo "<button type='button'class='btn btn-success btn-sm'>{$i}</button> ";
								}
								else
								{
									echo "<button type='button' class='btn btn-default btn-sm' onclick=\"paginate({$i})\">{$i}</button> ";
								}
							}
							if($next<=$total_num_pages)
							{
								echo "<button type='button'class='btn btn-success btn-sm' onclick=\"paginate({$next})\">Next</button>";
							}
						}
					echo "</div>";
				echo "</div>";
			echo"</div>";
	}
	else
	{
		echo "<h2 style='text-align:center'>No contract has been added to this archive yet</h2>";
	}


?>