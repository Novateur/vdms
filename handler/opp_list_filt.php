<?php
	
	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$id = get_comp_id_user();
	$type = $_GET['type'];
	//$sort = $_GET['sort_type'];
	
	$sql_pag="SELECT COUNT(*) FROM oppurtunity WHERE company_id={$id}";
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
	
	$sql = "SELECT * FROM oppurtunity WHERE company_id={$id} LIMIT $start, $limit";
	$query = $connection->query($sql);

	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		echo "<form id='ma_multi_del'>";
		echo"<div class='row'>";
		echo"<div class='col-sm-4'>";
			echo"<button type='button' style='margin-top:-2px' class='btn btn-success btn-sm dropdown-toggle' data-toggle='dropdown' id='choose_task'>Choose task <i class='i i-arrow-down4'></i></button>
				<ul class='dropdown-menu'>
					<li><span class='arrow top'></span><a href='#' onclick=\"get_opp_list()\"><i class='i i-clip'></i> View all tenders</a></li>
					<li><a href='add_opp.php'><i class='i i-plus'></i> Tender oppurtunity</a></li>
					<li><a href='#' onclick=\"mark_all()\"><i class='fa fa-check'></i> Mark all</a></li>
				</ul>";
		echo "<button id='cancel' type='button' class='btn btn-default btn-sm' style='margin-top:-2px;border:1px solid blue;display:none' onclick=\"cancel_del()\"><i class='i i-cancel'></i> Cancel</button> <button id='btn' type='button' class='btn btn-danger btn-sm' style='margin-top:-2px;display:none' onclick=\"del_multi({$page},{$type})\"><i class='i i-trashcan'></i> Delete</button>";
		echo"</div>";		
		echo"<div class='col-sm-8'>";
			/*echo "<div class='pull-right'>";
			echo"<button type='button' class='btn btn-default btn-sm dropdown-toggle' data-toggle='dropdown' id='choose_sort'>Sequence ascending <i class='i i-arrow-down4'></i></button>
				<ul class='dropdown-menu'>
					<li><a href='#' onclick=\"name_ascending({$type})\">Name ascending</a></li>
					<li><a href='#' onclick=\"name_descending({$type})\">Name descending</a></li>
					<li><a href='#' onclick=\"seq_ascending({$type})\">Sequence ascending</a></li>
					<li><a href='#' onclick=\"seq_descending({$type})\">Sequence descending</a></li>
				</ul>";
		echo"</div>";*/
		echo"</div>";
		echo"</div>";
		echo "<table class='table table-striped table-responsive'>
			<tr>
			<th><b>Name</b></th>
			<th><b>Ref number</b></th>
			<th><b>Location</b></th>
			<th><b>Type</b></th>
			<th><b>Company</b></th>
			<th><b>Operation</b></th>
			</tr>";
		foreach($query as $r)
		{
			echo "<tr>
			<td><div class='checkbox i-checks'>
                    <label>
                        <input type='checkbox' name='opps[]' value='{$r['id']}' onclick=\"verify_check(this.name)\" class='ma_opps'>
                        <i></i>
						<a href='oppurtunity_details.php?opp_ref={$r['id']}'>{$r['name']}</a>
					</label>
			</div></td>
			<td>{$r['ref_no']}</td>
			<td>{$r['location']}</td>
			<td>{$r['type']}</td>
			<td>".get_com_name($r['company_id'])."</td>
			<td><button type='button' class='btn btn-default btn-sm dropdown-toggle' data-toggle='dropdown'><i class='i i-bars3'></i></button>
                            <ul class='dropdown-menu'>";
							if($id==$r['company_id'])
							{
                              echo "<li><a href='#' onclick=\"del_opp_filt({$r['id']},{$page},{$type})\"><i class='i i-trashcan'></i> Delete</a></li>";
							}
							else
							{
                              echo "<li><a href='#' onclick=\"del_vendor()\"><i class='i i-paperplane'></i> Apply</a></li>";
							}
                            echo "</ul>
						</td>
			</tr>";
		}
		echo "</table>";
		echo "</form>";
		
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
							echo "<button type='button'class='btn btn-default btn-sm' onclick=\"paginate_filt({$previous},{$page},{$type})\">Previous</button> ";
						}
						for($i=1;$i<=$total_num_pages;$i++)
						{
							if($i==$page)
							{
								echo "<button type='button'class='btn btn-success btn-sm'>{$i}</button> ";
							}
							else
							{
								echo "<button type='button' class='btn btn-default btn-sm' onclick=\"paginate_filt({$i},{$page},{$type})\">{$i}</button> ";
							}
						}
						if($next<=$total_num_pages)
						{
							echo "<button type='button'class='btn btn-success btn-sm' onclick=\"paginate({$next},{$page},{$type})\">Next</button>";
						}
					}
				echo "</div>";
			echo "</div>";
		echo "</div>";
	}
	else
	{
		echo "<h2 style='text-align:center'>No oppurtunity has been posted yet</h2>";
	}

?>