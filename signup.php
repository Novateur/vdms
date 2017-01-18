<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>VDMS :: Register</title>
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
  <section id="content" class="m-t-lg wrapper-md animated fadeInDown">
    <div class="container aside-xl">
      <a class="navbar-brand block" href="index.html">Novateur VDMS</a>
      <section class="m-b-lg">
        <header class="wrapper text-center">
          <strong>Sign up to find interesting thing</strong>
        </header>
        <form action="index.html" id="signup_form">
          <div class="list-group">
            <div class="list-group-item">
			  <div id="name_msg" class="empty"></div>
              <input type="text" placeholder="Name" class="form-control no-border" name="name" id="name">
            </div>
            <div class="list-group-item">
			  <div id="email_msg" class="empty"></div>
              <input type="email" placeholder="Email" class="form-control no-border" name="email" id="email">
            </div>
            <div class="list-group-item">
			   <div id="password_msg" class="empty"></div>
               <input type="password" placeholder="Choose a password" class="form-control no-border" name="password" id="password">
            </div>            
			<div class="list-group-item">
			   <div id="location_msg" class="empty"></div>
               <input type="text" placeholder="City" class="form-control no-border" name="loca" id="loca">
            </div>
          </div>
          <div class="checkbox m-b">
            <label>
              <input type="checkbox"> Agree the <a href="#">terms and policy</a>
            </label>
          </div>
          <button type="submit" class="btn btn-lg btn-success btn-block" >Sign up</button>
          <div class="line line-dashed"></div>
          <p class="text-muted text-center"><small>Already have an account?</small></p>
          <a href="signin.php" class="btn btn-lg btn-default btn-block">Sign in</a>
        </form>
      </section>
    </div>
  </section>
  <!-- footer -->
  <footer id="footer">
    <div class="text-center padder clearfix">
      <p>
        <small>Novateur Nigeria Limited<br>&copy; 2016</small>
      </p>
    </div>
  </footer>
  <!-- / footer -->
  <script src="js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="js/bootstrap.js"></script>
  <!-- App -->
  <script src="js/app.js"></script>  
  <script src="js/slimscroll/jquery.slimscroll.min.js"></script>
  <script src="js/parsley/parsley.min.js"></script>
  <script src="js/wizard/jquery.bootstrap.wizard.js"></script>
<script src="js/wizard/demo.js"></script>
    <script src="js/app.plugin.js"></script>
	<script>
		$('#signup_form').submit(function(e){
			e.preventDefault();
			var name = $('#name').val();
			var email = $('#email').val();
			var pass = $('#password').val();
			var loca = $('#loca').val();
			
			if(name=="" || email=="" || pass=="" || loca=="")
			{
				if(name=="")
				{
					$('#name_msg').html("Your name is required");
				}				
				if(email=="")
				{
					$('#email_msg').html("Your email is required");
				}				
				if(pass=="")
				{
					$('#password_msg').html("Your password is required");
				}				
				if(loca=="")
				{
					$('#location_msg').html("Your location is required");
				}
			}
			else
			{
				$.ajax({
					url:"handler/register.php",
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
							location.assign("setup.php");
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