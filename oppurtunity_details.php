<?php

	ob_start();
	require_once("includes/functions.php");
	
	if(!isset($_SESSION['username']))
	{
		header("location:signin.php");
	}
	
	if(isset($_GET['opp_ref']) && !empty($_GET['opp_ref']))
	{ 
		$opp_id = $_GET['opp_ref'];
	}
	else
	{
		header("location:oppurtunity.php");
	}
?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>VDMS :: Oppurtunity</title>
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
<?php echo "<body onload=\"get_opp_grid()\">";?>
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
                          <a href="oppurtunity.php" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span>View Oppurtunity</span>
                          </a>
                        </li>
                        <li >
                          <a href="add_opp.php" class="auto">                                                        
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
                <section class="scrollable padder"><br/> 
					<div class="row">
						<!--<div class="col-sm-12">
						  <div class="alert alert-success"><h2 class="m-b-xs text-black"><i class="i i-grid2 "></i> oppurtunity</h2></div>
						</div>-->
						<div class="col-sm-12">
							<div class="panel panel-default">
								
									<?php
										get_opp_details($opp_id);
									?>

							</div>
						</div>
					</div>
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
	  		<div id="delete_oppurtunity" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog" style="width:400px;max-height:90px">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<p class="modal-title" id="myModalLabel"style="font-size:13px"><h4><i class="i i-trashcan"></i> Confirm</h4></p>
						</div>
						<div class="modal-body" style='font-size:14px'>
							Are you sure you want to delete this vendor?
						</div>
						<div class="modal-footer">
							<button class="btn btn-default" style='border:1px solid #357ebd' data-dismiss="modal" aria-hidden="true">Cancel</button>
							<span id='paste_proceed_btn'></span>
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
  </script>
</body>
</html>