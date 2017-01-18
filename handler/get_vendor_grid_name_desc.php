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
		echo"<div class='row'>";
		echo"<div class='col-sm-4'>";
		echo"<button type='button' style='margin-top:-2px;margin-left:15px' class='btn btn-success btn-sm dropdown-toggle' data-toggle='dropdown'>choose task <i class='i i-arrow-down4'></i></button><br/>
				<ul class='dropdown-menu'>
					<li><a href='new_vendor.php'><i class='i i-domain3'></i> New vendor</a></li>
					<li><a href='#' onclick=\"invite_vendor()\"><i class='i i-tag'></i> Invite vendor</a></li>
				</ul>";
		echo "</div>";
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
		echo "</div>";
		
		
		//echo"<a href='new_vendor.php' data-role='button' style='margin-top:-20px;margin-left:15px' class='btn btn-success btn-sm'>New vendor</a> <a href='#' onclick=\"invite_vendor()\" data-role='button' style='margin-top:-20px' class='btn btn-primary btn-sm'>Invite vendor</a><br/>";
		echo "<div class='row'>";
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			echo "<div class='col-md-3 col-sm-6'>
				<div class='panel b-a'>
					<div class='panel-heading no-border bg-default lt' style='height:62px'>
						<p style='color:#5bc0de'><a href='#' style='color:#5bc0de'><i class='i i-domain3'></i> ";if($r['name']==""){ echo $r['first_name']." ".$r['last_name'];}else{ echo $r['name'];} echo "</a></p>"; 
						if($r['rc_no']!=""){echo "RC: ".$r['rc_no'];}
					echo "</div>
					<div class='padder-v text-center clearfix' style='height:20px;background-color:#f9fafc'>                            
						<div class='col-xs-12 b-r'>
							<p class='text-muted pull-right dropdown-toggle' data-toggle='dropdown' style='margin-top:-10px'><a href='#'><i class='i i-bars3'></i></a>
								<ul class='dropdown-menu pull-right'>
								  <li><a href='#' onclick=\"del_vendor({$r['id']},'grid','name_grid_desc',{$page})\"><i class='i i-trashcan'></i> Delete</a></li>
								</ul>
							</p>
						</div>
					</div>
				</div>
			</div>";
		}
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
			echo"</div>";
	}

?>