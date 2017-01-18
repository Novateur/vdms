<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>VDMS :: sign in</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="css/animate.css" type="text/css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="css/icon.css" type="text/css" />
  <link rel="stylesheet" href="css/font.css" type="text/css" />
  <link rel="stylesheet" href="css/app.css" type="text/css" />  
    <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
    <style>
	.empty	{color:red}
  </style>
</head>
<body class="">
  <section id="content" class="m-t-lg wrapper-md animated fadeInUp">    
    <div class="container aside-xl">
      <a class="navbar-brand block" href="index.html">Novateur VDMS</a>
      <section class="m-b-lg">
        <header class="wrapper text-center">
          <strong>Sign in to get in touch</strong>
        </header>
        <form action="index.php" id="signin_form">
          <div class="list-group">
            <div class="list-group-item">
			  <div id="email_msg" class="empty"></div>
              <input type="email" placeholder="Email" class="form-control no-border" name="email" id="email">
            </div>
            <div class="list-group-item">
			   <div id="pass_msg" class="empty"></div>
               <input type="password" placeholder="Password" class="form-control no-border" name="password" id="password">
            </div>
          </div>
          <button type="submit" class="btn btn-lg btn-success btn-block">Sign in</button>
          <div class="text-center m-t m-b"><a href="#"><small>Forgot password?</small></a></div>
          <div class="line line-dashed"></div>
          <p class="text-muted text-center"><small>Do not have an account?</small></p>
          <a href="signup.php" class="btn btn-lg btn-default btn-block">Create an account</a>
        </form>
      </section>
    </div>
  </section>
  <!-- footer -->
  <footer id="footer">
    <div class="text-center padder">
      <p>
        <small>Novateur Nigeria Limited<br>&copy; 2016</small>
      </p>
    </div>
  </footer>
  <!-- / footer -->
  			<div id="error_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog" style="width:500px;margin-top:100px">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<p class="modal-title" id="myModalLabel"style="font-size:13px"><h4><i class="i i-notification"></i> Error</h4></p>
						</div>
						<div class="modal-body" style='font-size:14px'>
							Invalid Email/Password combination,If you've forgotten your password you can simply click on the <b>forgot password</b> link and follow the steps 
						</div>
						<div class="modal-footer">
							<a href='#' data-role='button' class="btn btn-success" data-dismiss="modal" aria-hidden="true">OK</a>
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
  <script src="js/app.plugin.js"></script>
  <script>
	$('#signin_form').submit(function(e){
		e.preventDefault();
		
		var email = $('#email').val();
		var pass = $('#password').val();
		
		if(email=="" || pass=="")
		{
			if(email=="")
			{
				$('#email_msg').html("The email field can't be empty");
			}			
			if(pass=="")
			{
				$('#pass_msg').html("The password field can't be empty");
			}
		}
		else
		{
				$.ajax({
					url:"handler/login.php",
					type:"POST",
					data: new FormData(this),
					cache:false,
					contentType:false,
					processData:false,
					success:function(data)
					{
						//alert(data);
						if(data=="yes")
						{
							location.assign("index.php");
						}
						else
						{
							$('#error_modal').modal('show');
						}
					}
				})
		}
	})
  </script>
</body>
</html>