<?php
	
	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$id = get_comp_id_user();
	$type = $_GET['type'];
		//echo "<br/><br/><br/>";
	//$sort = $_GET['sort_type'];

	$sql_pag="SELECT COUNT(*) FROM oppurtunity";
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
	$sql = "SELECT * FROM oppurtunity LIMIT $start, $limit";
	$query = $connection->query($sql);
	if($query->rowCount()>0)
	{
		echo"<div class='row'>";
		echo"<div class='col-sm-4'>";
		echo"<button type='button' style='margin-top:-15px;margin-left:0px' class='btn btn-success btn-sm dropdown-toggle' data-toggle='dropdown' id='choose_task'>View all tenders <i class='i i-arrow-down4'></i></button><br/>
				<ul class='dropdown-menu'>
					<span class='arrow top'></span>
					<li><a href='#' onclick=\"my_tender()\"><i class='i i-user2'></i> View my tenders</a></li>
					<li><a href='add_opp.php'><i class='i i-plus'></i> Tender oppurtunity</a></li>
				</ul>";
		echo "</div>";
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
		echo "</div>";
		
		
		//echo"<a href='new_vendor.php' data-role='button' style='margin-top:-20px;margin-left:15px' class='btn btn-success btn-sm'>New vendor</a> <a href='#' onclick=\"invite_vendor()\" data-role='button' style='margin-top:-20px' class='btn btn-primary btn-sm'>Invite vendor</a><br/>";
		echo "<div class='row'>";
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
						echo "<div class='col-md-3 col-sm-6'>
							<div class='panel b-a' style='width:230px'>
								<div class='panel-heading no-border bg-default lt' style='height:90px'>
									<p style='color:#5bc0de'><a href='oppurtunity_details.php?opp_ref={$r['id']}&page={$page}&type={$type}' style='color:#5bc0de'><i class='i i-clip'></i> {$r['name']}</a></p> 
									<p>".get_com_name($r['company_id'])."</p> 
									<p>{$r['ref_no']}</p> 
								</div>
								<div class='padder-v text-center clearfix' style='height:20px;background-color:#f9fafc'>                            
									<div class='col-xs-12 b-r'>
										<p class='text-muted pull-right dropdown-toggle' data-toggle='dropdown' style='margin-top:-10px'><a href='#'><i class='i i-bars3'></i></a></p>
											<ul class='dropdown-menu'>
											  <span class='arrow top'></span>";
												if($id==$r['company_id'])
												{
													echo "<li><a href='#' onclick=\"del_opp({$r['id']},{$page},{$type})\"><i class='i i-trashcan'></i> Delete</a></li>";
												}
												else
												{
													if(!get_applied_for($r['id']))
													{
														echo "<li><a href='oppurtunity_details.php?opp_ref={$r['id']}'><i class='i i-paperplane'></i> Apply</a></li>";
													}
													else
													{
														echo "Already applied for";
													}
												}
											echo "</ul>
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
							echo "<button type='button'class='btn btn-default btn-sm' onclick=\"paginate({$previous},{$page},{$type})\">Previous</button> ";
						}
						for($i=1;$i<=$total_num_pages;$i++)
						{
							if($i==$page)
							{
								echo "<button type='button'class='btn btn-success btn-sm'>{$i}</button> ";
							}
							else
							{
								echo "<button type='button' class='btn btn-default btn-sm' onclick=\"paginate({$i},{$page},{$type})\">{$i}</button> ";
							}
						}
						if($next<=$total_num_pages)
						{
							echo "<button type='button'class='btn btn-success btn-sm' onclick=\"paginate({$next},{$page},{$type})\">Next</button>";
						}
					}
				echo "</div>";
				echo "</div>";
			echo"</div>";
	}
	else
	{
		echo "<h2 style='text-align:center'>No oppurtunity has been posted yet</h2>";
	}

?>