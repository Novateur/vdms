<?php

	ob_start();
	require_once("includes/functions.php");
	
	if(!isset($_SESSION['username']))
	{
		header("location:signin.php");
	}
?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>VDMS :: Welcome</title>
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
<body>
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
					<div class="col-sm-2">
					</div>
                    <div style="margin-left:20px;margin-top:-50px" class="col-sm-8">
					<section class="panel panel-default">
						<header class="panel-heading font-bold">
						  <h4><i class="fa fa-key"></i> Account set up</h4>
						</header>
						<form id="setup_form">
							<div id="first_set">
								<div class="panel-body">
									<div align="center"><i class="i i-circle-sm text-success-dk"></i> <i class="i i-circle-sm text"></i></div>
									<h3 style='text-align:center'>What is your company's contact information?</h3>
									<div class="row">
										<div class="col-sm-12">
											<label style="margin-left:15px">Country <span class="req">*</span></label><br/>
											<div id="country_msg" class="req" style="margin-left:15px"></div>
											<div class="col-sm-12">
												<input type="text"  class="form-control" placeholder="Country" name="country" id="country">
											</div>
										</div>
									</div>
									<div class="row"><br/>
										<div class="col-sm-6">
											<label style="margin-left:15px">Address box 1</label><br/>
											<div class="col-sm-12">
												<input type="text"  class="form-control" placeholder="Address 1" name="add1">
											</div>
										</div>
										<div class="col-sm-6">
											<label style="margin-left:15px">Address box 2</label><br/>
											<div class="col-sm-12">
												<input type="text"  class="form-control" placeholder="Address 2" name="add2">
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
										<p style="margin-left:30px">We will use this number if we want to contact you about your account for support or administrative purposes
										<b>we promise we will never ever sell or share this information</b></p>
										<div class="col-sm-4">
											<label style="margin-left:15px">Phone number</label><br/>
											<div class="col-sm-12">
												<input type="text"  class="form-control" placeholder="Phone number" name="phone">
											</div>
										</div>
									</div>
								</div>
								<header class="panel-heading font-bold" style="padding:30px">
									<div class="form-group " style="margin-top:-10px;float:right">
										<div class="col-sm-4 col-sm-offset-2">
											<button type="button" class="btn btn-success" onclick="process1()">Next</button>
										</div>
									</div>
								</header>
							</div>
							<div id="second_set" style="display:none">
								<div class="panel-body">
									<div align="center"><i class="i i-circle-sm text"></i> <i class="i i-circle-sm text-success-dk"></i></div>
									<h3 style='text-align:center'>Do you want to add your logo?</h3>
									<div class="row"><br/>
										<div class="col-sm-12">
											<label style="margin-left:15px">Company name <span class="req">*</span></label><br/>
											<div class="col-sm-12">
												<div id="com_name_msg" style="margin-left:0px" class="req"></div>
												<input type="text"  class="form-control" placeholder="Company name" name="com_name" id="com_name">
											</div>
										</div>
									</div>
									<div class="row"><br/>
										<div class="col-sm-6">
											<div class="form-group">
												<div class="col-sm-12">
													<label style="margin-left:0px">Select logo</label><br/>
													<input type="file" class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" id="filestyle-0" name="file1" style="position:fixed;left:-500px">
													<div class="bootstrap-filestyle" style="display:inline;">
														<input type="text" class="form-control inline v-middle input-s"/>
														<label for="filestyle-0" class="btn btn-default"><span>Choose file</span></label>
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-6">
											<p>Your company logo will be used on quotes,invoices, and other printable documents.</p>
											<p>Recommended file types: .GIF, .PNG, or .JPG less than 1MB.
										</div>
									</div>
								</div>
								<header class="panel-heading font-bold" style="padding:30px">
									<div class="form-group " style="margin-top:-10px;float:right">
										<div class="col-sm-4 col-sm-offset-2">
											<button type="submit" class="btn btn-success">Start</button>
										</div>
									</div>
								</header>
							</div>
						</form>
					</section>
                  </div>           
                </section>
            </section>

          </section>
        </section>
      </section>
    </section>
  </section>
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
	function process1()
	{
		var country = $('#country').val();
		if(country=="")
		{
			$('#country_msg').html("Your country is required");
		}
		else
		{
			document.getElementById("first_set").style.display="none";
			document.getElementById("second_set").style.display="block";
		}
	}
	$('#setup_form').submit(function(e){
		e.preventDefault();
		var company_name = $('#com_name').val();
		if(company_name=="")
		{
			$('#com_name_msg').html("Your company name is required");
		}
		else
		{
				$.ajax({
					url:"handler/add_company.php",
					type:"POST",
					data: new FormData(this),
					cache:false,
					contentType:false,
					processData:false,
					success:function(data)
					{
						//alert(data);
						if(data=="inserted")
						{
							location.assign("index.php");
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