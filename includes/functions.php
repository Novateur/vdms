<?php
session_start();
require_once("db.inc");

function sanitize($input)
{
	$my_input=htmlspecialchars(addslashes(trim($input)));
	return $my_input;
}

function get_time_interval_sm($date){
	$mydate=date("Y-m-d H:i:s");
	$theDiff="";
	$datetime1 = date_create($date);
	$datetime2 = date_create($mydate);
	$interval = date_diff($datetime1, $datetime2);
	$min = $interval->format('%i');
	$sec = $interval->format('%s');
	$hour = $interval->format('%h');
	$mon = $interval->format('%m');
	$day = $interval->format('%d');
	$year = $interval->format('%y');
	if($interval->format('%i%h%d%m%y')=="00000"){
		if($sec<10){
			return "just now";
		}
		else{
			return $sec." secs ";
		}
	}
	else if($interval->format('%h%d%m%y')=="0000"){
		if($min==1){
			return $min." min";
		}
		else{
			return $min." mins";
		}
	}
	else if($interval->format('%d%m%y')=="000"){
		if($hour==1){
			return $hour." hr";
		}
		else{
			return $hour." hrs";
		}
	}
	else if($interval->format('%m%y')=="00"){
		if($day==1){
			return $day." day";
		}
		else{
			return $day." days";
		}
	}
	else if($interval->format('%y')=="0"){
		if($mon==1){
			return $mon." mth";
		}
		else{
			return $mon." mths";
		}
	}
	else{
		if($year==1){
			return $year." yr";
		}
		else{
			return $year." yrs";
		}
	}
}

function get_user_image()
{
	global $connection;
	$sql="SELECT photo FROM users WHERE email='{$_SESSION['username']}'";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			return $r['photo'];
		}
	}
}

function get_user_image_by_id($id)
{
	global $connection;
	$sql="SELECT photo FROM users WHERE id='{$id}'";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			return $r['photo'];
		}
	}
}

function get_user_location()
{
	global $connection;
	$sql="SELECT loca FROM users WHERE email='{$_SESSION['username']}'";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			return $r['loca'];
		}
	}
}

function get_user_location_by_id($id)
{
	global $connection;
	$sql="SELECT loca FROM users WHERE id='{$id}'";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			return $r['loca'];
		}
	}
}

function get_user_name()
{
	global $connection;
	$sql="SELECT name FROM users WHERE email='{$_SESSION['username']}'";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			return $r['name'];
		}
	}
}

function get_user_name_by_id($id)
{
	global $connection;
	$sql="SELECT name FROM users WHERE id='{$id}'";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			return $r['name'];
		}
	}
}

function get_user_id()
{
	global $connection;
	$sql="SELECT id FROM users WHERE email='{$_SESSION['username']}'";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			return $r['id'];
		}
	}
}

function get_comp_id($id)
{
	global $connection;
	$sql="SELECT id FROM companies WHERE admin_id={$id}";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			return $r['id'];
		}
	}
}

function get_comp_id_user()
{
	global $connection;
	$id = get_user_id();
	$sql="SELECT company_id FROM users WHERE id={$id}";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			return $r['company_id'];
		}
	}
}

function get_com_info()
{
	global $connection;
	$id = get_comp_id_user();
	$sql="SELECT * FROM companies WHERE id={$id}";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			    echo "<header class='panel-heading font-bold'>
                  <h4>Company Information</h4>
                </header><br/>
					<div class='panel-body' style='max-height:500px;overflow:auto'>
						<div class='row'>
							<div class='col-sm-6' id='paste_logo'>
								<img src='logos/{$r['logo']}' width='250' height='200' class='img-responsive col-sm-offset-2'/>
							</div>							
							<div class='col-sm-6'>
								<p>Your company logo will be used on quotes,invoices, and other printable documents</p>
								<form id='logo_form'>
									<p id='logo_msg' class='req'></p>
									<input type='hidden' value=\"{$r['id']}\" name='id'/>
									<p><input type='file' name='file1' class='form-control' id='input_logo'/></p>
									<p><button type='submit' class='btn btn-default' style='border:1px solid #357ebd'>Upload new logo</button></p>
									<p class='muted-text'>Recommended file types: .GIF, .PNG, .JPG less than 1MB</p>
								</form>
							</div>
						</div><br/>
				<form class='form-horizontal' id='edit_form'>
						<input type='hidden' value=\"{$r['id']}\" name='id'/>
						<div class='form-group'>
						  <label class='col-sm-2 control-label'>Company name<span style='color:red'>*</span></label>
						  <div class='col-sm-10'>
							<div id='comp_name_msg' class='req'></div>
							<input type='text'  class='form-control' value=\"{$r['com_name']}\" name='com_name' id='com_name'>
						  </div>
						</div>
						<div class='line line-dashed b-b line-lg pull-in'></div>
						<div class='form-group'>
						  <label class='col-lg-2 control-label'>Address box</label>
						  <div class='col-lg-10'>
							<input class='form-control' type='text' value=\"{$r['add1']}\" name='add1'>
						  </div>                      
						  <label class='col-lg-2 control-label'></label>
						  <div class='col-lg-10'><br/>
							<input class='form-control' type='text' value=\"{$r['add2']}\" name='add2'>
						  </div>
						</div>
						<div class='line line-dashed b-b line-lg pull-in'></div>
						<div class='form-group'>
						  <label class='col-lg-2 control-label'>City</label>
						  <div class='col-lg-10'>
							<input class='form-control' type='text' value=\"{$r['city']}\" name='city'>
						  </div>
						</div>
						<div class='line line-dashed b-b line-lg pull-in'></div>
						<div class='form-group'>
						  <label class='col-lg-2 control-label'>Postal/Zip code</label>
						  <div class='col-lg-10'>
							<input class='form-control' type='text' value=\"{$r['zip']}\" name='zip'>
						  </div>
						</div>
						<div class='line line-dashed b-b line-lg pull-in'></div>
						<div class='form-group'>
						  <label class='col-lg-2 control-label'>Country<span class='req'>*</span></label>
						  <div class='col-lg-10'>
							<div id='country_msg' class='req'></div>
							<input class='form-control' type='text' value=\"{$r['country']}\" name='country' id='country'>
						  </div>
						</div>
						<div class='line line-dashed b-b line-lg pull-in'></div>
						<div class='form-group'>
						  <label class='col-lg-2 control-label'>Phone number</label>
						  <div class='col-lg-10'>
							<input class='form-control' type='text' value=\"{$r['phone']}\" name='phone'>
						  </div>
						</div>						
						<div class='line line-dashed b-b line-lg pull-in'></div>
						<div class='form-group'>
						  <label class='col-lg-2 control-label'>Fax</label>
						  <div class='col-lg-10'>
							<input class='form-control' type='text' value=\"{$r['fax']}\" name='fax'>
						  </div>
						</div>						
						<div class='line line-dashed b-b line-lg pull-in'></div>
						<div class='form-group'>
						  <label class='col-lg-2 control-label'>RC Number</label>
						  <div class='col-lg-10'>
							<input class='form-control' type='text' value=\"{$r['rc_no']}\" name='rc_no'>
						  </div>
						</div>						
						<div class='line line-dashed b-b line-lg pull-in'></div>
						<div class='form-group'>
						  <label class='col-lg-2 control-label'>Email</label>
						  <div class='col-lg-10'>
							<input class='form-control' type='text' value=\"{$r['email']}\" name='email'>
						  </div>
						</div>						
						<div class='line line-dashed b-b line-lg pull-in'></div>
						<div class='form-group'>
						  <label class='col-lg-2 control-label'>Website</label>
						  <div class='col-lg-10'>
							<input class='form-control' type='text' value=\"{$r['website']}\" name='website'>
						  </div>
						</div>
						
					</div>
						<header class='panel-heading font-bold' style='padding:30px'>
							<div class='form-group' style='margin-top:-10px;float:right'>
								<div class='col-sm-4 col-sm-offset-2'>
									<button type='submit' class='btn btn-success'>Done</button>
								</div>
							</div>
						</header>
				</form>";
		}
	}
}

function get_vendor_form()
{
			    echo "<header class='panel-heading font-bold'>
                  <h4>Add new vendor <small>(Company)</small></h4>
                </header><br/>
					<div class='panel-body' style='max-height:600px;overflow:auto'>
				<form class='form-horizontal' id='vendor_form'>
						<div class='form-group'>
						  <label class='col-sm-2 control-label'>Company name<span style='color:red'>*</span></label>
						  <div class='col-sm-10'>
							<div id='comp_name_msg' class='req'></div>
							<input type='text'  class='form-control' name='com_name' id='com_name'>
						  </div>
						</div>
						<div class='line line-dashed b-b line-lg pull-in'></div>
						<div class='form-group'>
						  <label class='col-lg-2 control-label'>Address box</label>
						  <div class='col-lg-10'>
							<input class='form-control' type='text' name='add1'>
						  </div>                      
						  <label class='col-lg-2 control-label'></label>
						  <div class='col-lg-10'><br/>
							<input class='form-control' type='text' name='add2'>
						  </div>						  
						  <label class='col-lg-2 control-label'></label>
						  <div class='col-lg-10'><br/>
							<input class='form-control' type='text' name='add3'>
						  </div>
						</div>
						<div class='line line-dashed b-b line-lg pull-in'></div>
						<div class='form-group'>
						  <label class='col-lg-2 control-label'>City</label>
						  <div class='col-lg-10'>
							<input class='form-control' type='text' name='city'>
						  </div>
						</div>
						<div class='line line-dashed b-b line-lg pull-in'></div>
						<div class='form-group'>
						  <label class='col-lg-2 control-label'>Postal/Zip code</label>
						  <div class='col-lg-10'>
							<input class='form-control' type='text' name='zip'>
						  </div>
						</div>
						<div class='line line-dashed b-b line-lg pull-in'></div>
						<div class='form-group'>
						  <label class='col-lg-2 control-label'>Country<span class='req'>*</span></label>
						  <div class='col-lg-10'>
							<div id='country_msg' class='req'></div>
							<select id='country' name='country' class='form-control'>
								<option value=''>--Select a country--</option>
								<option value='Nigeria'>Nigeria</option>
								<option value='Ghana'>Ghana</option>
								<option value='United Kingdom'>United Kingdom(UK)</option>
							</select>
						  </div>
						</div>
						<div class='line line-dashed b-b line-lg pull-in'></div>
						<div class='form-group'>
						  <label class='col-lg-2 control-label'>Phone number</label>
						  <div class='col-lg-10'>
							<input class='form-control' type='text' name='phone'>
						  </div>
						</div>						
						<div class='line line-dashed b-b line-lg pull-in'></div>
						<div class='form-group'>
						  <label class='col-lg-2 control-label'>RC Number</label>
						  <div class='col-lg-10'>
							<input class='form-control' type='text' name='rc_no'>
						  </div>
						</div>						
						<div class='line line-dashed b-b line-lg pull-in'></div>
						<div class='form-group'>
						  <label class='col-lg-2 control-label'>Email</label>
						  <div class='col-lg-10'>
							<input class='form-control' type='text' name='email'>
						  </div>
						</div>						
						<div class='line line-dashed b-b line-lg pull-in'></div>
						<div class='form-group'>
						  <label class='col-lg-2 control-label'>Website</label>
						  <div class='col-lg-10'>
							<input class='form-control' type='text' name='website'>
						  </div>
						</div>
						
					</div>
						<header class='panel-heading font-bold' style='padding:30px'>
							<div class='form-group' style='margin-top:-10px;float:right'>
								<div style='margin-top:-10px;margin-right:5px'>
									<a href='vendors.php' data-role='button' class='btn btn-default' style='border:1px solid #357ebd'>Cancel</a> <button type='submit' class='btn btn-success'>Done</button>
								</div>
							</div>
						</header>
				</form>";
}

function get_opp_form()
{
			    echo "<header class='panel-heading font-bold'>
                  <h4>Add new oppurtunity</h4>
                </header><br/>
					<div class='panel-body' style='max-height:500px;overflow:auto'>
				<form class='form-horizontal' id='opp_form'>
						<div class='form-group'>
						  <label class='col-sm-2 control-label'>Name<span style='color:red'>*</span></label>
						  <div class='col-sm-10'>
							<div id='opp_name_msg' class='req'></div>
							<input type='text'  class='form-control' name='opp_name' id='opp_name'>
						  </div>
						</div>
						<div class='line line-dashed b-b line-lg pull-in'></div>
						<div class='form-group'>
						  <label class='col-lg-2 control-label'>Introduction<span style='color:red'>*</span></label>
						  <div class='col-lg-10'>
							<div id='intro_msg' class='req'></div>
							<textarea class='form-control' name='intro' id='intro' rows='5'></textarea>
						  </div>                      						  
						</div>						
						<div class='line line-dashed b-b line-lg pull-in'></div>
						<div class='form-group'>
						  <label class='col-lg-2 control-label'>Scope of work<span style='color:red'></span></label>
						  <div class='col-lg-10'>
							<div id='scope_msg' class='req'></div>
							<textarea class='form-control' name='scope' id='scope' rows='5'></textarea>
						  </div>                      						  
						</div>						
						<div class='line line-dashed b-b line-lg pull-in'></div>
						<div class='form-group'>
						  <label class='col-lg-2 control-label'>Requirements<span style='color:red'>*</span></label>
						  <div class='col-lg-10'>
							<div id='requirements_msg' class='req'></div>
							<textarea class='form-control' name='requirements' id='requirements' rows='5'></textarea>
						  </div>                      						  
						</div>						
						<div class='line line-dashed b-b line-lg pull-in'></div>
						<div class='form-group'>
						  <label class='col-lg-2 control-label'>Terms and Conditions<span style='color:red'></span></label>
						  <div class='col-lg-10'>
							<div id='terms_msg' class='req'></div>
							<textarea class='form-control' name='terms' id='terms' rows='5'></textarea>
						  </div>                      						  
						</div>
						<div class='line line-dashed b-b line-lg pull-in'></div>
						<div class='form-group'>
						  <label class='col-lg-2 control-label'>Location<span class='req'>*</span></label>
						  <div class='col-lg-10'>
							<div id='loca_msg' class='req'></div>
							<select id='loca' name='loca' class='form-control'>
								<option value=''>--Select location--</option>
								<option value='Abia'>Abia</option>
								<option value='Adamawa'>Adamawa</option>
								<option value='Akwa-Ibom'>Akwa-Ibom</option>
								<option value='Anambara'>Anambara</option>
								<option value='Bauchi'>Bauchi</option>
								<option value='Bayelsa'>Bayelsa</option>
								<option value='Borno'>Borno</option>
								<option value='Cross River'>Cross River</option>
								<option value='Delta'>Delta</option>
								<option value='Ebonyi'>Ebonyi</option>
								<option value='Edo'>Edo</option>
								<option value='Ekiti'>Ekiti</option>
								<option value='Enugu'>Enugu</option>
								<option value='FCT/Abuja'>FCT/Abuja</option>
								<option value='Gombe'>Gombe</option>
								<option value='Imo'>Imo</option>
								<option value='Jigawa'>Jigawa</option>
								<option value='Kaduna'>Kaduna</option>
								<option value='Katsina'>Katsina</option>
								<option value='Kano'>Kano</option>
								<option value='Kebbi'>Kebbi</option>
								<option value='Kogi'>Kogi</option>
								<option value='Kwara'>Kwara</option>
								<option value='Lagos'>Lagos</option>
								<option value='Nassarawa'>Nassarawa</option>
								<option value='Ogun'>Ogun</option>
								<option value='Ondo'>Ondo</option>
								<option value='Osun'>Osun</option>
								<option value='Oyo'>Oyo</option>
								<option value='Plateau'>Plateau</option>
								<option value='Rivers'>Rivers</option>
								<option value='Sokoto'>Sokoto</option>
								<option value='Taraba'>Taraba</option>
								<option value='Yobe'>Yobe</option>
								<option value='Zamfara'>Zamfara</option>
							</select>
						  </div>
						</div>						
						<div class='line line-dashed b-b line-lg pull-in'></div>
						<div class='form-group'>
						  <label class='col-lg-2 control-label'>Type<span class='req'>*</span></label>
						  <div class='col-lg-10'>
							<div id='type_msg' class='req'></div>
							<select id='type' name='type' class='form-control'>
								<option value=''>--Select type--</option>
								<option value='Tender'>Tender</option>
								<option value='RFQ'>RFQ</option>
								<option value='RFP'>RFP</option>
								<option value='EOI'>EOI</option>
								<option value='Proposal'>Proposal</option>
							</select>
						  </div>
						</div>						
						<div class='line line-dashed b-b line-lg pull-in'></div>
						<div class='form-group'>
						  <label class='col-lg-2 control-label'>Add attachment</label>
						  <div class='col-lg-10'>
							<input type='file' class='form-control' name='file1' id='file1'/>
							<p>Supported file format: .pdf, .doc, .docx</p>
						  </div>
						</div>
					</div>
					<div id='paste'></div>
						<header class='panel-heading font-bold' style='padding:30px'>
							<div class='form-group' style='margin-top:-10px;float:right'>
								<div style='margin-top:-10px;margin-right:5px'>
									<a href='oppurtunity.php' data-role='button' class='btn btn-default' style='border:1px solid #357ebd'>Cancel</a> <button type='submit' class='btn btn-success'>Done</button>
								</div>
							</div>
						</header>
				</form>";
}

function get_vendor_form2()
{
			    echo "<header class='panel-heading font-bold'>
                  <h4>Add new vendor <small>(Individual)</small></h4>
                </header><br/>
					<div class='panel-body' style='max-height:600px;overflow:auto'>
				<form class='form-horizontal' id='vendor_form'>
						<div class='form-group'>
						  <label class='col-sm-2 control-label'>First name<span style='color:red'>*</span></label>
						  <div class='col-sm-10'>
							<div id='first_name_msg' class='req'></div>
							<input type='text'  class='form-control' name='first_name' id='first_name'>
						  </div>
						</div>						
						<div class='form-group'>
						  <label class='col-sm-2 control-label'>Last name<span style='color:red'>*</span></label>
						  <div class='col-sm-10'>
							<div id='last_name_msg' class='req'></div>
							<input type='text'  class='form-control' name='last_name' id='last_name'>
						  </div>
						</div>
						<div class='line line-dashed b-b line-lg pull-in'></div>
						<div class='form-group'>
						  <label class='col-lg-2 control-label'>Address box</label>
						  <div class='col-lg-10'>
							<input class='form-control' type='text' name='add1'>
						  </div>                      
						  <label class='col-lg-2 control-label'></label>
						  <div class='col-lg-10'><br/>
							<input class='form-control' type='text' name='add2'>
						  </div>						  
						  <label class='col-lg-2 control-label'></label>
						  <div class='col-lg-10'><br/>
							<input class='form-control' type='text' name='add3'>
						  </div>
						</div>
						<div class='line line-dashed b-b line-lg pull-in'></div>
						<div class='form-group'>
						  <label class='col-lg-2 control-label'>City</label>
						  <div class='col-lg-10'>
							<input class='form-control' type='text' name='city'>
						  </div>
						</div>
						<div class='line line-dashed b-b line-lg pull-in'></div>
						<div class='form-group'>
						  <label class='col-lg-2 control-label'>Postal/Zip code</label>
						  <div class='col-lg-10'>
							<input class='form-control' type='text' name='zip'>
						  </div>
						</div>
						<div class='line line-dashed b-b line-lg pull-in'></div>
						<div class='form-group'>
						  <label class='col-lg-2 control-label'>Country<span class='req'>*</span></label>
						  <div class='col-lg-10'>
							<div id='country_msg' class='req'></div>
							<select id='country' name='country' class='form-control'>
								<option value=''>--Select a country--</option>
								<option value='Nigeria'>Nigeria</option>
								<option value='Ghana'>Ghana</option>
								<option value='United Kingdom'>United Kingdom(UK)</option>
							</select>
						  </div>
						</div>
						<div class='line line-dashed b-b line-lg pull-in'></div>
						<div class='form-group'>
						  <label class='col-lg-2 control-label'>Phone number</label>
						  <div class='col-lg-10'>
							<input class='form-control' type='text' name='phone'>
						  </div>
						</div>						
						<div class='line line-dashed b-b line-lg pull-in'></div>
						<div class='form-group'>
						  <label class='col-lg-2 control-label'>RC Number</label>
						  <div class='col-lg-10'>
							<input class='form-control' type='text' name='rc_no'>
						  </div>
						</div>						
						<div class='line line-dashed b-b line-lg pull-in'></div>
						<div class='form-group'>
						  <label class='col-lg-2 control-label'>Email</label>
						  <div class='col-lg-10'>
							<input class='form-control' type='text' name='email'>
						  </div>
						</div>						
						<div class='line line-dashed b-b line-lg pull-in'></div>
						<div class='form-group'>
						  <label class='col-lg-2 control-label'>Website</label>
						  <div class='col-lg-10'>
							<input class='form-control' type='text' name='website'>
						  </div>
						</div>
						
					</div>
						<header class='panel-heading font-bold' style='padding:30px'>
							<div class='form-group' style='margin-top:-10px;float:right'>
								<div style='margin-top:-10px;margin-right:5px'>
									<a href='vendors.php' data-role='button' class='btn btn-default' style='border:1px solid #357ebd'>Cancel</a> <button type='submit' class='btn btn-success'>Done</button>
								</div>
							</div>
						</header>
				</form>";
}

function get_user_position()
{
	global $connection;
	$id = get_user_id();
	$sql="SELECT position FROM users WHERE id={$id}";
	$query = $connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			return $r['position'];
		}
	}
}

function get_user_com_name()
{
	global $connection;
	$id = get_user_id();
	$sql="SELECT com_name FROM companies WHERE id IN (SELECT company_id FROM users WHERE email='{$_SESSION['username']}')";
	$query = $connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			return $r['com_name'];
		}
	}
}

function get_com_name($id)
{
	global $connection;
	$sql="SELECT com_name FROM companies WHERE id={$id}";
	$query = $connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			return $r['com_name'];
		}
	}
}

function get_company_users()
{
	global $connection;
	$id = get_comp_id_user();
	$sql="SELECT * FROM users WHERE company_id={$id}";
	$query = $connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		echo "<form>";
		echo "<button id='btn' style='display:none' onclick=\"del_marked()\" type='button' class='btn btn-danger pull-right'><i class='glyphicon glyphicon-trash'></i> Marked</button><br/><br/>";
		echo "<table class='table table-striped table-responsive'>
			<tr>
			<th><b>Name</b></th>
			<th><b>Email</b></th>
			<th><b>Position</b></th>
			<th><b>Level</b></th>
			<th><b>Status</b></th>
			</tr>";
		foreach($query as $r)
		{
			echo "<tr>
			<td><a href='#' onclick=\"fetch_details({$r['id']})\"><i class='i i-user2'></i> {$r['name']}</a></td>
			<td>{$r['email']}</td>
			<td>{$r['position']}</td>
			<td>{$r['level']}</td>
			<td>{$r['status']}</td>
			</tr>";
		}
		echo "</table>";
		echo "</form>";
	}
}

function get_opp_details($id)
{
	global $connection;
	$sql="SELECT * FROM oppurtunity WHERE id={$id}";
	$query = $connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			echo"<div class='panel-body'>
				<h3>{$r['name']}</h3>
				<h4>Ref Number</h4>
				{$r['ref_no']}			
				<h4>Location</h4>
				{$r['location']}			
				<h4>Type</h4>
				{$r['type']}
				<h4>Company/Parastatal name</h4>".
				get_com_name($r['company_id'])."			
				<h4>Scope of work</h4>";
				if($r['scope']=="")
				{
					echo "Scope of work to be done was not specified";
				}
				else
				{
					echo $r['scope'];
				}
				echo "<h4>Requirements</h4>
				{$r['Requirements']}			
				<h4>Terms and Conditions</h4>";
				if($r['terms']=="")
				{
					echo "No terms and conditions was attached to this oppurtunity";
				}
				else
				{
					echo $r['terms'];
				}				
				echo "<h4>Attached document</h4>";
				if($r['doc']=="")
				{
					echo "No document is attached to this oppurtunity";
				}
				else
				{
					echo "<a href='download_opp_doc.php?name={$r['doc']}' data-role='button' class='btn btn-success'><i class='i i-file'></i> Download document</a>";
				}
			echo "</div>";
			echo "<header class='panel-heading font-bold' style='padding:30px'>
				<div class='form-group' style='margin-top:-10px;float:right'>
					<div style='margin-top:-10px;margin-right:5px'>
						<a href='oppurtunity.php' data-role='button' class='btn btn-default' style='border:1px solid #357ebd'>Cancel</a>"; 													
							if(!get_applied_for($r['id']))
							{
								if(get_comp_id_user()==$r['company_id'])
								{
									echo "";
								}
								else
								{
									echo " <a href='apply.php?opp_id={$id}' data-role='button' class='btn btn-success'>Apply</a>";
								}
							}
							else
							{
								echo "";
							}

					echo "</div>
				</div>
			</header>";
		}
	}
	else
	{
		header("location:404.php");
	}
}

function get_con_details($id)
{
	global $connection;
	$sql="SELECT * FROM contracts WHERE id={$id}";
	$query = $connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			$photo = get_user_image_by_id($r['user_id']);
			$name = get_user_name_by_id($r['user_id']);
			$loca = get_user_location_by_id($r['user_id']);
			echo"
			<div class='col-sm-12'>
				<h3>{$r['contract_name']}</h3>
			</div>
			<div class='col-sm-6'>
				<h4>Reference Number</h4>
				{$r['ref_no']}
			</div>			
			<div class='col-sm-6'>
				<h4>Starting date</h4>
				{$r['start_date']}
			</div>
			<div class='col-sm-6'>
				<h4>Company/Parastatal (From)</h4>
				{$r['com_from']}
			</div>			
			<div class='col-sm-6'>
				<h4>Expected end date</h4>
				{$r['end_date']}
			</div>
			<div class='col-sm-6'>
				<h4>Company/Parastatal (Given to)</h4>
				{$r['com_to']}
			</div>			
			<div class='col-sm-6'>
				<h4>Date Added</h4>
				{$r['date_added']}
			</div>
			<div class='col-sm-6'>
				<h4>Contract progress</h4>
				{$r['progress']}";
				if($r['progress']=="Ongoing")
				{
					echo "<h4>Progress rate</h4>
					{$r['percent']}%";
				}
				else
				{
					echo "";
				}
			echo "</div>			
			<div class='col-sm-6'>
				<h4>Last updated</h4>
				{$r['last_updated']}
			</div>
			<div class='col-sm-12'>";
				if($r['comment']=="")
				{
					echo "<h4>Comment</h4>";
					echo "<i class='i i-chat3'></i> No comment has been attached to this contract
					<h4></h4><br/>";
				}
				else
				{
					echo "<h4>Comment</h4><img src='uploads/{$photo}' width='60' height='60'/><br/>
					<b>{$name}</b> ({$loca} branch) says :
					{$r['comment']}
					<h4></h4><br/>";
				}
			echo "</div>
			<div class='col-sm-12'>";
				echo get_con_docs_details($r['ref_no']);
			echo "</div>";
		}
	}
	else
	{
		header("location:404.php");
	}
}

function get_app_details($id)
{
	global $connection;
	$sql="SELECT * FROM apllicants WHERE opp_id={$id}";
	$query = $connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			//$photo = get_user_image_by_id($r['user_id']);
			//$name = get_user_name_by_id($r['user_id']);
			//$loca = get_user_location_by_id($r['user_id']);
			echo"
			<div class='col-sm-12'>
				<h3>Applicant details</h3>
			</div>
			<div class='col-sm-6'>
				<h4>First Name</h4>
				{$r['first_name']}
			</div>			
			<div class='col-sm-6'>
				<h4>Last Name</h4>
				{$r['last_name']}
			</div>
			<div class='col-sm-6'>
				<h4>Address</h4>
				{$r['add']}
			</div>			
			<div class='col-sm-6'>
				<h4>City located</h4>
				{$r['city']}
			</div>
			<div class='col-sm-6'>
				<h4>Zip code</h4>
				{$r['zip']}
			</div>			
			<div class='col-sm-6'>
				<h4>State</h4>
				{$r['state']}
			</div>
			<div class='col-sm-6'>
				<h4>Phone Number</h4>
				{$r['phone']}
			</div>			
			<div class='col-sm-6'>
				<h4>Company Name</h4>".
				get_user_com_name()."
			</div>
			<div class='col-sm-12'>";
				echo get_app_docs_details($r['opp_id']);
			echo "</div>";
		}
	}
	else
	{
		header("location:404.php");
	}
}

function get_con_docs_details($ref_no)
{
	global $connection;
	$sql="SELECT * FROM contract_docs WHERE ref_no='{$ref_no}'";
	$query = $connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		echo "<h4>Uploaded signed documents</h4>";
		echo "<form>";
		echo "<table class='table table-striped table-responsive'>
			<tr>
			<th><b>File name</b></th>
			<th><b>File title</b></th>
			<th><b>Download</b></th>
			</tr>";
		foreach($query as $r)
		{
			echo "<tr>
			<td><i class='i i-file-pdf'></i> {$r['file_name']}</td>
			<td>{$r['file_title']}</td>
			<td><a href='download.php?name={$r['renamed']}' data-role='button' class='btn btn-default btn-sm'><i class='fa fa-cloud-download'></i></a></td>
			</tr>";
		}
		echo "</table>";
		echo "</form>";
	}
	else
	{
		echo "<h4>Upload signed documents attached to this contract</h4>";
	}
}

function get_app_docs_details($ref_no)
{
	global $connection;
	$sql="SELECT * FROM docs WHERE opp_id='{$ref_no}'";
	$query = $connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		echo "<h3>Uploaded required documents</h3>";
		echo "<form>";
		echo "<table class='table table-striped table-responsive'>
			<tr>
			<th><b>File name</b></th>
			<th><b>File title</b></th>
			<th><b>Download</b></th>
			</tr>";
		foreach($query as $r)
		{
			echo "<tr>
			<td><i class='i i-file-pdf'></i> {$r['file']}</td>
			<td>{$r['title']}</td>
			<td><a href='download_app_doc.php?name={$r['renamed']}' data-role='button' class='btn btn-default btn-sm'><i class='fa fa-cloud-download'></i></a></td>
			</tr>";
		}
		echo "</table>";
		echo "</form>";
	}
	else
	{
		echo "<h4>Upload signed documents attached to this contract</h4>";
	}
}

function get_requirements($id)
{
	global $connection;
	$sql="SELECT Requirements FROM oppurtunity WHERE id={$id}";
	$query = $connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			return $r['Requirements'];
		}
	}
}

function check_application($id)
{
	global $connection;
	$comp_id = get_comp_id_user();
	$sql="SELECT opp_id,company_id FROM apllicants WHERE opp_id={$id} AND company_id={$comp_id}";
	$query = $connection->query($sql);
	if($query->rowCount()==1)
	{
		return true;
	}
}

function get_opp_poster_logo($id)
{
	global $connection;
	$sql="SELECT logo FROM companies WHERE id IN (SELECT company_id FROM oppurtunity WHERE id = {$id})";
	$query = $connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			return $r['logo'];
		}
	}
}

function get_user_com_logo()
{
	global $connection;
	$id = get_comp_id_user();
	$sql="SELECT logo FROM companies WHERE id = {$id}";
	$query = $connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			return $r['logo'];
		}
	}
}

function get_opp_success($id)
{
	global $connection;
	$sql="SELECT * FROM oppurtunity WHERE id = {$id}";
	$query = $connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			echo "<div align='center'><h2>{$r['name']}</h2><h4>{$r['ref_no']}</h4></div>
			<div style='font-size:15px'>bunch of text goes here,and this will act as evidence or prove that you've applied for this oppurtunity
			bunch of text goes here,and this will act as evidence or prove that you've applied for this oppurtunity
			bunch of text goes here,and this will act as evidence or prove that you've applied for this oppurtunity
			bunch of text goes here,and this will act as evidence or prove that you've applied for this oppurtunity
			bunch of text goes here,and this will act as evidence or prove that you've applied for this oppurtunity
			bunch of text goes here,and this will act as evidence or prove that you've applied for this oppurtunity
			bunch of text goes here,and this will act as evidence or prove that you've applied for this oppurtunity
			bunch of text goes here,and this will act as evidence or prove that you've applied for this oppurtunity
			bunch of text goes here,and this will act as evidence or prove that you've applied for this oppurtunity
			bunch of text goes here,and this will act as evidence or prove that you've applied for this oppurtunity
			bunch of text goes here,and this will act as evidence or prove that you've applied for this oppurtunity
			bunch of text goes here,and this will act as evidence or prove that you've applied for this oppurtunity
			bunch of text goes here,and this will act as evidence or prove that you've applied for this oppurtunity</div><br/><br/><br/>
			<div align='left'style='font-size:15px'>Signature and Date<br/><br/>----------------------------</div>";
		}
	}
}

function get_opp_name($id)
{
	global $connection;
	$sql="SELECT name from oppurtunity WHERE id={$id}";
	$query = $connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			return $r['name'];
		}
	}
}

function get_opp_last_id()
{
	global $connection;
	$sql="SELECT id FROM oppurtunity ORDER BY id DESC LIMIT 0,1";
	$query = $connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			return $r['id'];
		}
	}
}

function get_applied_for($id)
{
	global $connection;
	$comp_id = get_comp_id_user();
	$sql="SELECT complete FROM apllicants WHERE opp_id={$id} AND company_id={$comp_id}";
	$query = $connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			if($r['complete']==1)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}
}
?>