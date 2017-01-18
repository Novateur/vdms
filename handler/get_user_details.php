<?php
	
	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$id = $_POST['id'];
	
	$sql="SELECT * FROM users WHERE id={$id}";
	$query = $connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			echo "

			<div class='panel panel-default'>
				<div class='panel-body'>
					<div class='row'>
						<div class='col-sm-12'>
							<p style='margin-left:15px'><button type='button' class='btn btn-default' style='border:1px solid #357ebd' onclick=\"invite_user()\">Invite a user</button> 
							<button type='button' onclick=\"delete_user({$r['id']})\"class='btn btn-danger'>Delete User</button></p><br/>
						</div>
						<form id='edit_user_form'>
							<div class='col-sm-6'>
								<label style='margin-left:15px'>Name<span class='req'>*</span></label><br/>
									<div class='col-sm-12'>
										<div id='name_msg' class='req'></div>
										<input type='text' class='form-control' value=\"{$r['name']}\" name='name' id='name'>
									</div>
							</div>
							<div class='col-sm-6'>
								<label style='margin-left:15px'>Position<span class='req'>*</span></label><br/>
									<div class='col-sm-12'>
										<div id='position_msg' class='req'></div>
										<input type='text' class='form-control' value=\"{$r['position']}\" name='position' id='position'>
									</div>
							</div>
						</div>					
						<div class='row'>
							<div class='col-sm-6'>
								<label style='margin-left:15px'>Email<span class='req'>*</span></label><br/>
									<div class='col-sm-12'>
										<div id='email_msg' class='req'></div>
										<input type='email' class='form-control' value=\"{$r['email']}\" name='email' id='email'>
									</div>
							</div>
							<div class='col-sm-6'>
								<label style='margin-left:15px'>Access level</label><br/>
								<div class='col-sm-12'>
									<div id='access_msg' class='req'></div>
									<select class='form-control' name='access' id='access'>
										<option value=''>{$r['level']}</option>
										<option value='user'> User</option>
										<option value='admin'> Administrator</option>
									</select>
								</div>
							</div>
						</div>					
						<div class='row'>
							<div class='col-sm-6'>
								<label style='margin-left:15px'>Password (New Password)</label><br/>
									<div class='col-sm-12'>
										<input type='password' class='form-control' placeholder='Input a new password' name='pass' id='pass'>
									</div>
							</div>				
						</div>
					</div>
					<header class='panel-heading font-bold' style='padding:30px'>
						<div class='form-group' style='margin-top:-15px;margin-left:-15px'>
							<div class='col-sm-6'>
								<button type='button' class='btn btn-default' onclick=\"save_user_edit({$r['id']})\" style='border:1px solid #357ebd'>Save</button>
								<a href='#' onclick=\"location.reload(true)\" class='btn btn-default' style='border:1px solid #357ebd'>Cancel</a>
							</div>
						</div>
					</header>
				</form>
			</div>";
		}
	}
?>