<?php
	
	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$id = get_comp_id_user();
	$type = $_GET['type'];
	$sort = $_GET['sort_type'];
	
	$sql_pag="SELECT COUNT(*) FROM vendors WHERE company_id={$id}";
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
	
	$sql = "SELECT * FROM vendors WHERE company_id={$id} ORDER BY name DESC LIMIT $start, $limit";
	$query = $connection->query($sql);

	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		echo "<form id='ma_multi_del'>";
		echo"<div class='row'>";
		echo"<div class='col-sm-4'>";
			echo"<button type='button' style='margin-top:-2px' class='btn btn-success btn-sm dropdown-toggle' data-toggle='dropdown'>Choose task <i class='i i-arrow-down4'></i></button>
				<ul class='dropdown-menu'>
					<li><a href='new_vendor.php'><i class='i i-domain3'></i> New vendor</a></li>
					<li><a href='#' onclick=\"invite_vendor()\"><i class='i i-tag'></i> Invite vendor</a></li>
					<li><a href='#' onclick=\"mark_all()\"><i class='fa fa-check'></i> Mark all</a></li>
				</ul>";
		/*echo "<a href='#' data-role='button' style='margin-top:-20px' onclick=\"mark_all()\" class='btn btn-warning btn-sm'>Mark all</a> <a href='new_vendor.php' data-role='button' style='margin-top:-20px' class='btn btn-success btn-sm'>New vendor</a> <a href='#' data-role='button' style='margin-top:-20px' onclick=\"invite_vendor()\" class='btn btn-primary btn-sm'>Invite vendor</a> */echo "<button id='cancel' type='button' class='btn btn-default btn-sm' style='margin-top:-2px;border:1px solid blue;display:none' onclick=\"cancel_del()\"><i class='i i-cancel'></i> Cancel</button> <button id='btn' type='button' class='btn btn-danger btn-sm' style='margin-top:-2px;display:none' onclick=\"del_multi({$sort},{$page},{$type})\"><i class='i i-trashcan'></i> Delete</button>";
		echo"</div>";		
		echo"<div class='col-sm-8'>";
			echo "<div class='pull-right'>";
			echo"<button type='button' class='btn btn-default btn-sm dropdown-toggle' data-toggle='dropdown' id='choose_sort'>Sequence ascending <i class='i i-arrow-down4'></i></button>
				<ul class='dropdown-menu'>
					<li><a href='#' onclick=\"name_ascending({$type})\">Name ascending</a></li>
					<li><a href='#' onclick=\"name_descending({$type})\">Name descending</a></li>
					<li><a href='#' onclick=\"seq_ascending({$type})\">Sequence ascending</a></li>
					<li><a href='#' onclick=\"seq_descending({$type})\">Sequence descending</a></li>
				</ul>";
		echo"</div>";
		echo"</div>";
		echo"</div>";
		echo "<table class='table table-striped table-responsive'>
			<tr>
			<th><b>Name</b></th>
			<th><b>Address</b></th>
			<th><b>Email</b></th>
			<th><b>Phone</b></th>
			<th><b>Operation</b></th>
			</tr>";
		foreach($query as $r)
		{
			echo "<tr>
			<td><div class='checkbox i-checks'>
                    <label>
                        <input type='checkbox' name='vendors[]' value='{$r['id']}' onclick=\"verify_check(this.name)\" class='ma_vendors'>
                        <i></i>
						<a href='#'>";if($r['name']==""){ echo $r['first_name']." ".$r['last_name'];}else{ echo $r['name'];} echo "</a>
                    </label>
            </div></td>
			<td>{$r['add1']}</td>
			<td>{$r['email']}</td>
			<td>{$r['phone']}</td>
			<td><button type='button' class='btn btn-default btn-sm dropdown-toggle' data-toggle='dropdown'><i class='i i-bars3'></i></button>
                            <ul class='dropdown-menu'>
                              <li><a href='#' onclick=\"del_vendor({$r['id']},'list','name_list_desc',{$page})\"><i class='i i-trashcan'></i> Delete</a></li>
                            </ul>
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
							echo "<button type='button'class='btn btn-default btn-sm' onclick=\"paginate({$previous},{$page},{$type},{$sort})\">Previous</button> ";
						}
						for($i=1;$i<=$total_num_pages;$i++)
						{
							if($i==$page)
							{
								echo "<button type='button'class='btn btn-success btn-sm'>{$i}</button> ";
							}
							else
							{
								echo "<button type='button' class='btn btn-default btn-sm' onclick=\"paginate({$i},{$page},{$type},{$sort})\">{$i}</button> ";
							}
						}
						if($next<=$total_num_pages)
						{
							echo "<button type='button'class='btn btn-success btn-sm' onclick=\"paginate({$next},{$page},{$type},{$sort})\">Next</button>";
						}
					}
				echo "</div>";
			echo "</div>";
		echo "</div>";
	}

?>