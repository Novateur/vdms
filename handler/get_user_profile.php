<?php

	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$id = get_user_id();
	
	$sql = "SELECT * FROM users WHERE id={$id}";
	$query= $connection->query($sql);

	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach ($query as $r) 
		{
			echo "<div class='row'>
					<div class='col-sm-12'>
							<div align='center'><img src='uploads/{$r['photo']}' width='150' height='150' class='img-circle'/></div>
							<label class='control-label'>Change profile picture<span class='req'></span></label>
							<input type='file' name='file1' class='form-control' id='file1'/><br/>
							<p>Required file type:File to be uploaded must be in .JPG, .JPEG, .PNG, .GIF and must be less than 1MB</p>
					</div>

			</div>";
		}
	}
	

?>