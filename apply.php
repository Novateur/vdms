<?php

	ob_start();
	require_once("includes/functions.php");
	
	if(!isset($_SESSION['username']))
	{
		header("location:signin.php");
	}
	
	if(isset($_GET['opp_id']) && !empty($_GET['opp_id']))
	{
		$opp_id = $_GET['opp_id'];
	}
	else
	{
		header("location:oppurtunity.php");
	}
	
	//echo password_hash(1,PASSWORD_DEFAULT);
	
?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>VDMS :: Apply</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="css/animate.css" type="text/css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="css/icon.css" type="text/css" />
  <link rel="stylesheet" href="css/font.css" type="text/css" />
  <link rel="stylesheet" href="css/app.css" type="text/css" />   
  <link rel="stylesheet" href="js/calendar/bootstrap_calendar.css" type="text/css" />
  <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
  <style>
	.req	{color:red}
  </style>
</head>
<?php 
if(check_application($opp_id))
{
	echo "<body onload=\"check_application({$opp_id})\">";
}
else
{
	echo "<body onload=\"get_docs({$opp_id})\">";
}
?>
  <section class="vbox">
    <header class="bg-white header header-md navbar navbar-fixed-top-xs box-shadow">
      <div class="navbar-header aside-md dk">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav">
          <i class="fa fa-bars"></i>
        </a>
        <a href="index.php" class="navbar-brand">
          <img src="images/logo.PNG"  alt="scale" height="200" width="50">
          <span class="hidden-nav-xs">VDMS</span>
        </a>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user">
          <i class="fa fa-cog"></i>
        </a>
      </div>
      <form class="navbar-form navbar-left input-s-lg m-t m-l-n-xs hidden-xs" role="search">
        <!--<div class="form-group">
          <div class="input-group">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-sm bg-white b-white btn-icon"><i class="fa fa-search"></i></button>
            </span>
            <input type="text" class="form-control input-sm no-border" placeholder="Search apps, projects...">            
          </div>
        </div>-->
		<button type="submit" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"> Find your way from here &nbsp;&nbsp;&nbsp;<i class="fa fa-search"></i></button>
		<ul class="dropdown-menu animated fadeInLeft" style="width:200px">            
            <li>
              <span class="arrow top"></span>
              <a href="index.php"><i class="i i-home"></i> Home</a>
            </li>
            <li>
              <a href="oppurtunity.php"><i class="i i-grid2"></i> Oppurtunity</a>
            </li>
            <li>
              <a href="vendors.php" ><i class="i i-users3"></i> Vendors</a>
            </li>            
			<li>
              <a href="settings.php" ><i class="i i-cog2"></i> Settings</a>
            </li>
        </ul>
      </form>
      <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="thumb-sm avatar pull-left">
			<?php
			   $image = get_user_image();
              echo "<img src='uploads/{$image}' class='dker' alt='profile picture'/>
            </span>".get_user_name()."<b class='caret'></b>";
			?>
          </a>
          <ul class="dropdown-menu animated fadeInRight">            
            <li>
              <span class="arrow top"></span>
              <a href="#" onclick="show_profile()">User settings</a>
            </li>
            <li>
              <a href="docs.html">Help</a>
            </li>
            <li class="divider"></li>
            <li>
              <a href="logout.php" >Logout</a>
            </li>
          </ul>
        </li>
      </ul>      
    </header>
    <section>
      <section class="hbox stretch">
        <!-- .aside -->
        <aside class="bg-black aside-md hidden-print" id="nav">          
          <section class="vbox">
            <section class="w-f scrollable">
              <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
                <div class="clearfix wrapper dk nav-user hidden-xs">
                      <span class="thumb avatar pull-left m-r">
						<?php
							$image = get_user_image();
							echo "<img src='uploads/{$image}' class='dker' alt='...'>
                        <i class='on md b-black'></i>
                      </span>
                      <span class='hidden-nav-xs clear'>
                        <span class='block m-t-xs'>
                          <strong class='font-bold text-lt'>".get_user_name()."</strong>
                        </span>
                        <span style='color:#eee'>".get_user_com_name()."</span>
                        <span style='color:#eee'>".get_user_position()."</span>
                      </span>";
					  ?>
                </div>                


                <!-- nav -->                 
                <nav class="nav-primary hidden-xs">
                  <ul class="nav nav-main" data-ride="collapse">
                    <li >
                      <a href="index.php" class="auto">
                        <i class="i i-home icon">
                        </i>
                        <span class="font-bold">OVERVIEW</span>
                      </a>
                    </li>
					<li class="active">
                      <a href="oppurtunity.php" class="auto">
                        <span class="pull-right text-muted">
                          <i class="i i-circle-sm-o text"></i>
                          <i class="i i-circle-sm text-active"></i>
                        </span>
                        <i class="i i-grid2 icon">
                        </i>
                        <span class="font-bold">OPPURTUNITY</span>
                      </a>
                      <ul class="nav dk">
                        <li class="active">
                          <a href="add_opp.php" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span>View Oppurtunity</span>
                          </a>
                        </li>
                        <li >
                          <a href="#" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span>Tender oppurtunity</span>
                          </a>
                        </li>
                      </ul>
                    </li>
					<li >
                      <a href="applications.php" class="auto">
                        <span class="pull-right text-muted">
                          <i class="i i-circle-sm-o text"></i>
                          <i class="i i-circle-sm text-active"></i>
                        </span>
                        <i class="i i-folder2 icon">
                        </i>
                        <span class="font-bold">APPLICATIONS</span>
                      </a>
                    </li>
                    <li >
                      <a href="vendors.php" class="auto">
                        <span class="pull-right text-muted">
                          <i class="i i-circle-sm-o text"></i>
                          <i class="i i-circle-sm text-active"></i>
                        </span>
                        <i class="i i-users3 icon">
                        </i>
                        <span class="font-bold">VENDORS</span>
                      </a>
                      <ul class="nav dk">
                        <li >
                          <a href="new_vendor.php" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span>Add vendor</span>
                          </a>
						</li>
						<li >
						  <a href="vendors.php" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span>View vendor</span>
                          </a>
                        </li>
					  </ul>
                    </li>
					<li >
					  <a href="contracts.php" class="auto">
                        <span class="pull-right text-muted">
                          <i class="i i-circle-sm-o text"></i>
                          <i class="i i-circle-sm text-active"></i>
                        </span>
                        <i class="fa fa-suitcase icon">
                        </i>
                        <span class="font-bold">CONTRACTS</span>
                      </a>
                    </li>
					<li >
                      <a href="settings.php" class="auto">
                        <span class="pull-right text-muted">
                          <i class="i i-circle-sm-o text"></i>
                          <i class="i i-circle-sm text-active"></i>
                        </span>
                        <i class="i i-cog2 icon">
                        </i>
                        <span class="font-bold">SETTINGS</span>
                      </a>
                      <ul class="nav dk">
                        <li >
                          <a href="com_set.php" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span>Company settings</span>
                          </a>
                        </li>
                        <li >
                          <a href="layout-hbox.html" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span>Manage users</span>
                          </a>
                        </li>
                        <li >
                          <a href="layout-boxed.html" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span>Manage subscription</span>
                          </a>
                        </li>
                        <li >
                          <a href="layout-fluid.html" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span>License</span>
                          </a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                  <div class="line dk hidden-nav-xs"></div>
                </nav>
                <!-- / nav -->
              </div>
            </section>
            
            <footer class="footer hidden-xs no-padder text-center-nav-xs">
              <a href="logout.php" class="btn btn-icon icon-muted btn-inactive pull-right m-l-xs m-r-xs hidden-nav-xs">
                <i class="i i-logout"></i>
              </a>
              <a href="#nav" data-toggle="class:nav-xs" class="btn btn-icon icon-muted btn-inactive m-l-xs m-r-xs">
                <i class="i i-circleleft text"></i>
                <i class="i i-circleright text-active"></i>
              </a>
            </footer>
          </section>
        </aside>
        <!-- /.aside -->
        <section id="content">
          <section class="hbox stretch">
            <section>
  <section class="vbox">
      <section class="hbox stretch">
        <section id="content">
          <section class="hbox stretch">
            <section>
              <section class="vbox">
                <section class="scrollable padder" style="margin-top:30px">              
                  <section class="row m-b-md">
                    <div class="col-sm-6 text-right text-left-xs m-t-md pull-right">
                    </div>
                  </section>
					<div class="col-sm-1">
					</div>
                    <div style="margin-left:20px;margin-top:-50px" class="col-sm-10">
					<section class="panel panel-default">
						<header class="panel-heading font-bold">
						  <h4><i class="i i-stats"></i> Apply for <?php echo get_opp_name($opp_id);?></h4>
						</header>
						<div id="inst">
							<div class="panel-body">
										<div align="center"><i class="i i-circle-sm text-success-dk"></i> <i class="i i-circle-sm text"></i> <i class="i i-circle-sm text"></i></div>
										<h3 style='text-align:center'>Read the instruction carefully</h3>
										<div><br/>
											//Please note that,this space is for instruction (instruction text goes here)
										</div><br/>
									<header class="panel-heading font-bold" style="padding:30px">
										<div class="form-group " style="margin-top:-10px;float:right">
											<div class="col-sm-4 col-sm-offset-2">
												<button type="" class="btn btn-success" onclick="show_first()">Next</button>
											</div>
										</div>
									</header>
							</div>
						</div>
						<div id="first_form" style="display:none">
							<form id="form1">
								<div class="panel-body">
									<div align="center"><i class="i i-circle-sm text"></i> <i class="i i-circle-sm text-success-dk"></i>  <i class="i i-circle-sm text"></i></div>
									<h3 style='text-align:center'>Provide your contact details</h3>
									<div class="row"><br/>
										<?php echo "<input type='hidden' name='opp_id' value={$opp_id}>"; ?>
										<div class="col-sm-6">
											<label style="margin-left:15px">First name <span class="req">*</span></label><br/>
											<div class="col-sm-12">
												<div id="fname_msg" class="req"></div>
												<input type="text"  class="form-control" placeholder="First name" name="fname" id="fname">
											</div>
										</div>
										<div class="col-sm-6">
											<label style="margin-left:15px">Last name <span class="req">*</span></label><br/>
											<div class="col-sm-12">
												<div id="lname_msg" class="req"></div>
												<input type="text"  class="form-control" placeholder="Last name" name="lname" id="lname">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<label style="margin-left:15px">Address <span class="req">*</span></label><br/>
											<div id="add_msg" class="req" style="margin-left:15px"></div>
											<div class="col-sm-12">
												<input type="text"  class="form-control" placeholder="Address" name="add" id="add">
											</div>
										</div>
									</div>
									<div class="row"><br/>
										<div class="col-sm-4">
											<label style="margin-left:15px">City</label><br/>
											<div class="col-sm-12">
												<input type="text"  class="form-control" placeholder="city" name="city">
											</div>
										</div>
										<div class="col-sm-4">
											<label style="margin-left:15px">Postal/Zip code</label><br/>
											<div class="col-sm-12">
												<input type="text"  class="form-control" placeholder="Postal/Zip code" name="zip">
											</div>
										</div>								
										<div class="col-sm-4">
											<label style="margin-left:15px">State</label><br/>
											<div class="col-sm-12">
												<input type="text"  class="form-control" placeholder="State" name="state">
											</div>
										</div>
									</div>
									<div class="row"><br/>
										<div class="col-sm-4">
											<label style="margin-left:15px">Phone number</label><br/>
											<div class="col-sm-12">
												<input type="text"  class="form-control" placeholder="Phone number" name="phone">
											</div>
										</div>
										<div class="col-sm-8">
											<p style="margin-left:30px">Please not that you're a representative of <b><?php echo get_user_com_name(); ?></b> and therefore you're
											applying as <b><?php echo get_user_com_name();?></b>.</p>
										</div>
									</div>
								</div>
								<header class="panel-heading font-bold" style="padding:30px">
									<div class="form-group " style="margin-top:-10px;float:right">
										<div class="col-sm-4 col-sm-offset-2">
											<button type="submit" class="btn btn-success" >Save & Continue</button>
										</div>
									</div>
								</header>
							</form>
						</div>
						<div id="second_form" style="display:none">
							<form id="form2">
								<div class="panel-body">
									<div align="center"><i class="i i-circle-sm text"></i> <i class="i i-circle-sm text"></i> <i class="i i-circle-sm text-success-dk"></i></div>
									<h3 style='text-align:center'>Upload required documents</h3>
									<div class="row"><br/>
										<?php echo "<input type='hidden' name='opp_id' id='opp_id' value={$opp_id}>"; ?>
										<div class="col-sm-12">
											<div class="col-sm-12">
												<h4>Requirements</h4>
												<?php echo get_requirements($opp_id); ?>
											</div>
										</div>										
										<div class="col-sm-12"><br/>
											<label style="margin-left:15px">Upload files<span class="req">*</span></label><br/>
											<div class="col-sm-12">
												<div id="file_msg" class="req"></div>
												<input type="file"  class="form-control" name="file2" id="file2">
											</div>
										</div>										
										<div class="col-sm-12">
											<label style="margin-left:15px">File title<span class="req">*</span></label><br/>
											<div class="col-sm-12">
												<div id="file_title_msg" class="req"></div>
												<input type="text"  class="form-control" name="title" id="title" placeholder="File title"><br/>
												<button type="submit" class="btn btn-default btn-sm" style='border:1px solid #357ebd'>Upload</button>
											</div>
										</div>
									</div>
									<div class="row"><br/>
										<div class="col-sm-12">
											<div class="col-sm-12" id="paste_table">
										
											</div>
										</div>
									</div>
								</div>
								<header class="panel-heading font-bold" style="padding:30px">
									<div class="form-group " style="margin-top:-10px;float:right">
										<div class="col-sm-4 col-sm-offset-2" id="paste_sub">
				
										</div>
									</div>
								</header>
							</form>
						</div>
					</section>
                  </div>
				  <div class="col-sm-1">
				  </div>
                </section>
            </section>

          </section>
        </section>
      </section>
    </section>
  </section>
            </section>

          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
      </section>
    </section>
  </section>
      <div id="user_setings" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <p class="modal-title" id="myModalLabel"style="font-size:13px"><h4><i class="i i-pencil2"></i> Change profile picture</h4></p>
            </div>
            <div class="modal-body">
              <form id="user_setings_form">
				<div id="paste_profile">
					
				</div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-default" style='border:1px solid #357ebd' data-dismiss="modal" aria-hidden="true">Cancel</button>
              <button type="submit"class="btn btn-success">Done</button>
            </div>
			  </form>
          </div>
        </div>
      </div>       
	  <div id="change_pass" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <p class="modal-title" id="myModalLabel"style="font-size:13px"><h4><i class="i i-pencil2"></i> Change password</h4></p>
            </div>
            <div class="modal-body">
              <form id="change_pass_form">
				<div class='row'>
					<div class='col-sm-12'>
							<label class='control-label'>Current password<span class='req'>*</span></label><br/>
							<div id="cur_pass_msg" class='req'></div>
							<input type='password' name='pass' class='form-control' id='cur_pass'/><br/>							
							<label class='control-label'>New password<span class='req'>*</span></label><br/>
							<div id="new_pass_msg" class='req'></div>
							<input type='password' name='pass1' class='form-control' id='new_pass'/><br/>							
							<label class='control-label'>Confirm password<span class='req'>*</span></label><br/>
							<div id="con_pass_msg" class='req'></div>
							<input type='password' name='pass2' class='form-control' id='con_pass'/><br/>
					</div>
				</div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-default" style='border:1px solid #357ebd' data-dismiss="modal" aria-hidden="true">Cancel</button>
              <button type="submit"class="btn btn-success">Done</button>
            </div>
			  </form>
          </div>
        </div>
      </div>      
	  <div id="user_setings_main" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" style="margin-top:100px">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
              <p class="modal-title" id="myModalLabel"style="font-size:13px"><h4><i class="i i-cog2"></i> User settings</h4></p>
            </div>
            <div class="modal-body">
				<div class='row'>
					<a href="#"onclick="change_ma_dp()"><div class="col-md-4 col-sm-12">
							  <div class="panel b-a">
								<div class="panel-heading no-border bg-danger lt text-center">
								  
									<i class="i i-user3 fa fa-3x m-t m-b text-white"></i>

								</div>
								<div class="padder-v text-center clearfix" >                            
								  <div class="col-xs-12 b-r">
									<span class="text-muted">change profile picture</span>
								  </div>
								</div>
							  </div>
						</div></a>					
						<a href="#"onclick="change_ma_pass()"><div class="col-md-4 col-sm-12">
							  <div class="panel b-a">
								<div class="panel-heading no-border bg-success lt text-center">
								  
									<i class="fa fa-key fa fa-3x m-t m-b text-white"></i>

								</div>
								<div class="padder-v text-center clearfix" >                            
								  <div class="col-xs-12 b-r">
									<span class="text-muted">Change password</span>
								  </div>
								</div>
							  </div>
						</div></a>
				</div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-default" style='border:1px solid #357ebd' data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
			  </form>
          </div>
        </div>
      </div>
	  		<div id="delete_doc" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog" style="width:400px;max-height:90px">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<p class="modal-title" id="myModalLabel"style="font-size:13px"><h4><i class="i i-trashcan"></i> Confirm</h4></p>
						</div>
						<div class="modal-body" style='font-size:14px'>
							Are you sure you want to delete this document?
						</div>
						<div class="modal-footer">
							<button class="btn btn-default" style='border:1px solid #357ebd' data-dismiss="modal" aria-hidden="true">Cancel</button>
							<span id='paste_proceed_btn'></span>
						</div>
					</div>
				</div>
			</div>
			<div id="update_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog" style="width:500px;">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<p class="modal-title" id="myModalLabel"style="font-size:13px"><h4><i class="i i-checked"></i> Updated</h4></p>
						</div>
						<div class="modal-body" style='font-size:14px'>
							You have successfully applied for this oppurtunity,you'll be notified once your application is considered.
						</div>
						<div class="modal-footer">
							<a href='oppurtunity.php' data-role='button' class="btn btn-success">OK</a>
						</div>
					</div>
				</div>
			</div>
			<div id="error_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog" style="width:500px;">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<p class="modal-title" id="myModalLabel"style="font-size:13px"><h4><i class="i i-notification"></i> Error</h4></p>
						</div>
						<div class="modal-body" style='font-size:14px'>
							An error occured while trying to upload your document,it might be that the file is not in .doc,.docx,.pdf or that the file is less than 1MB
						</div>
						<div class="modal-footer">
							<a href='#' onclick="location.reload(true)" data-role='button' class="btn btn-success">OK</a>
						</div>
					</div>
				</div>
			</div>
  <script src="js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="js/bootstrap.js"></script>
  <!-- App -->
  <script src="js/app.js"></script>  
  <script src="js/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/charts/easypiechart/jquery.easy-pie-chart.js"></script>
  <script src="js/charts/sparkline/jquery.sparkline.min.js"></script>
  <script src="js/charts/flot/jquery.flot.min.js"></script>
  <script src="js/charts/flot/jquery.flot.tooltip.min.js"></script>
  <script src="js/charts/flot/jquery.flot.spline.js"></script>
  <script src="js/charts/flot/jquery.flot.pie.min.js"></script>
  <script src="js/charts/flot/jquery.flot.resize.js"></script>
  <script src="js/charts/flot/jquery.flot.grow.js"></script>
  <script src="js/charts/flot/demo.js"></script>

  <script src="js/calendar/bootstrap_calendar.js"></script>
  <script src="js/calendar/demo.js"></script>

  <script src="js/sortable/jquery.sortable.js"></script>
  <script src="js/app.plugin.js"></script>
  <script>
	function show_profile()
	{
		$.get("handler/get_user_profile.php",function(response){
			$('#paste_profile').html(response);
			$('#user_setings_main').modal('show');
		})
	}
	$('#user_setings_form').submit(function(e){
		e.preventDefault();
		var image = $('#file1').val();
		if(image=="")
		{
			alert("This field can't be empty");
		}
		else
		{
			$.ajax({
					url:"handler/update_profile_pic.php",
					type:"POST",
					data: new FormData(this),
					cache:false,
					contentType:false,
					processData:false,
					success:function(data)
					{
						if(data=="updated")
						{
							location.reload(true);
						}
						else
						{
							alert(data);
						}
					}
				})
		}
	})
	function change_ma_dp()
	{
		$('#user_setings_main').modal('hide');
		$('#user_setings').modal('show');
	}	
	function change_ma_pass()
	{
		$('#user_setings_main').modal('hide');
		$('#change_pass').modal('show');
	}
	$('#change_pass_form').submit(function(e){
		e.preventDefault();
		var cur_pass = $('#cur_pass').val();
		var new_pass = $('#new_pass').val();
		var con_pass = $('#con_pass').val();
		
		if(cur_pass=="" || new_pass=="" || con_pass=="")
		{
			if(cur_pass=="")
			{
				$('#cur_pass_msg').html("Your current password is required");
			}			
			if(new_pass=="")
			{
				$('#new_pass_msg').html("Your new password is required");
			}			
			if(con_pass=="")
			{
				$('#con_pass_msg').html("Kindly confirm your password");
			}
		}
		else
		{
				$.ajax({
					url:"handler/change_pass.php",
					type:"POST",
					data: new FormData(this),
					cache:false,
					contentType:false,
					processData:false,
					success:function(data)
					{
						if(data=="updated")
						{
							location.reload(true);
						}
						else
						{
							alert(data);
						}
					}
				})
		}
	})
	$('#form1').submit(function(e){
		e.preventDefault();
		var fname = $('#fname').val();
		var lname = $('#lname').val();
		var add = $('#add').val();
		
		if(fname=="" || lname=="" || add=="")
		{
			if(fname=="")
			{
				$('#fname_msg').html("Your first name is required");
			}			
			if(lname=="")
			{
				$('#lname_msg').html("Your last name is required");
			}			
			if(add=="")
			{
				$('#add_msg').html("Your address is required");
			}
		}
		else
		{
				$.ajax({
					url:"handler/sub_apply.php",
					type:"POST",
					data: new FormData(this),
					cache:false,
					contentType:false,
					processData:false,
					success:function(data)
					{
						if(data=="inserted")
						{
							var first = document.getElementById("first_form").style.display="none";
							var second	= document.getElementById("second_form").style.display="block";
						}
						else
						{
							alert(data);
						}
					}
				})
		}
	})	
	$('#form2').submit(function(e){
		e.preventDefault();
		var doc = $('#file2').val();
		var title = $('#title').val();
		var id = $('#opp_id').val();
		
		if(doc=="" || title=="")
		{
			if(doc=="")
			{
				$('#file_msg').html("document filed can't be empty");
			}			
			if(title=="")
			{
				$('#file_title_msg').html("Name of your document is needed as required above");
			}			
		}
		else
		{
				$.ajax({
					url:"handler/sub_docs.php",
					type:"POST",
					data: new FormData(this),
					cache:false,
					contentType:false,
					processData:false,
					success:function(data)
					{
						if(data=="inserted")
						{
							get_docs(id);
							$('#file2').val("");
							$('#title').val("");
							$.post("handler/sub_btn.php",{id:id},function(response){
								if(response=="valid")
								{
									$('#paste_sub').html("<button type='button' class='btn btn-success' onclick=\"final_submit("+id+")\">Submit</button>");
								}
								else
								{
									$('#paste_sub').html("<button type='button' class='btn btn-success'disabled>Submit</button>");
								}
							})
						}
						else
						{
							$('#error_modal').modal('show');
						}
					}
				})
		}
	})
	function check_application(id)
	{
		var first = document.getElementById("first_form").style.display="none";
		var second	= document.getElementById("second_form").style.display="block";
		
		$.post("handler/my_docs.php",{id:id},function(response){
			$('#paste_table').html(response);
		})		
		$.post("handler/sub_btn.php",{id:id},function(response){
			//alert(response);
			if(response=="valid")
			{
				$('#paste_sub').html("<button type='button' class='btn btn-success' onclick=\"final_submit("+id+")\">Submit</button>");
			}
			else
			{
				$('#paste_sub').html("<button type='button' class='btn btn-success'disabled>Submit</button>");
			}
		})
	}
	function get_docs(id)
	{
		$.post("handler/my_docs.php",{id:id},function(response){
			$('#paste_table').html(response);
		})
		/*$.post("handler/sub_btn.php",{id:id},function(response){
			alert(response);
			if(response=="valid")
			{
				$('paste_sub').html("<button type='button' class='btn btn-success'>Submit</button>");
			}
			else
			{
				$('paste_sub').html("<button type='button' class='btn btn-success'disabled>Submit</button>");
			}
		})*/
	}
	function delete_doc(id,opp_id)
	{
		$('#paste_proceed_btn').html("<button class='btn btn-danger' id='proceed_del' value='"+id+"'onclick=\"cont_del_opp(this.value,"+opp_id+")\">Proceed</button>");
		$('#delete_doc').modal('show');
	}
	function cont_del_opp(id,opp_id)
	{
		$.post("handler/delete_doc.php",{id:id},function(response){
			
			//alert(response);
			if(response=="deleted")
			{
				$('#delete_doc').modal('hide');
				get_docs(opp_id);
				$.post("handler/sub_btn.php",{id:opp_id},function(response){
					//alert(response);
					if(response=="valid")
					{
						$('#paste_sub').html("<button type='button' class='btn btn-success' onclick=\"final_submit("+opp_id+")\">Submit</button>");
					}
					else
					{
						$('#paste_sub').html("<button type='button' class='btn btn-success'disabled>Submit</button>");
					}
				})
			}
			else
			{
				alert(response);
			}
		});
	}
	function final_submit(id)
	{
		$.post("handler/complete_apply.php",{id:id},function(response){
			if(response=="submitted")
			{
				$('#update_modal').modal('show');
			}
			else
			{
				alert(response);
			}
		})
	}	
	function show_first()
	{
		document.getElementById("inst").style.display="none";
		document.getElementById("first_form").style.display="block";
		
	}
  </script>
</body>
</html>