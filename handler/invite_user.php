<?php
	
	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
			echo "

			<div class='panel panel-default'>
				<div class='panel-body'>
					<div class='row'>
						<form id='invite_form'>
							<div class='col-sm-6'>
								<label style='margin-left:15px'>Name<span class='req'>*</span></label><br/>
									<div class='col-sm-12'>
										<div id='name_msg' class='req'></div>
										<input type='text' class='form-control' name='name' id='name'>
									</div>
							</div>
							<div class='col-sm-6'>
								<label style='margin-left:15px'>Position<span class='req'>*</span></label><br/>
									<div class='col-sm-12'>
										<div id='position_msg' class='req'></div>
										<input type='text' class='form-control' name='position' id='position'>
									</div>
							</div>
						</div>					
						<div class='row'>
							<div class='col-sm-6'>
								<label style='margin-left:15px'>Email<span class='req'>*</span></label><br/>
									<div class='col-sm-12'>
										<div id='email_msg' class='req'></div>
										<input type='email' class='form-control' name='email' id='email'>
									</div>
							</div>
							<div class='col-sm-6'>
								<label style='margin-left:15px'>Access level<span class='req'>*</span></label><br/>
								<div class='col-sm-12'>
									<div id='access_msg' class='req'></div>
									<select class='form-control' name='access' id='access'>
										<option value=''>--Select access level--</option>
										<option value='user'> User</option>
										<option value='admin'> Administrator</option>
									</select>
								</div>
							</div>
						</div>					
				</div>
					<header class='panel-heading font-bold' style='padding:30px'>
						<div class='form-group' style='margin-top:-15px;margin-left:-15px'>
							<div class='col-sm-6'>
								<button type='submit' class='btn btn-default' id='send_invite' onclick=\"send_invite()\" style='border:1px solid #357ebd;min-width:40px'>Send</button>
								<a href='#' onclick=\"location.reload(true)\" class='btn btn-default' style='border:1px solid #357ebd'>Cancel</a>
							</div>
						</div>
					</header>
				</form>
			</div>";
?>