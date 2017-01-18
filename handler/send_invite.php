<?php
	
	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$com_id = get_comp_id_user();
	$cname = get_user_com_name();
	$name = sanitize($_POST['name']);
	$email = sanitize($_POST['email']);
	$access = sanitize($_POST['access']);
	$position = sanitize($_POST['position']);
	
	$email_from = 'info@novateur.ng';
    $email_to = $email;//replace with your email
	$subject="Invitation as a user for Novateur VDMS";
    $body = 'company Name: ' . $cname . "\n\n" . 'position: '.$position."\n\n <a href='accept_invite.php?ref_no={$com_id}' data-role='button'>Accept invite</a>";

     $success= @mail($email_to, $subject, $body, 'From: <'.$email_from.'>');
	 if($success)
	 {
		$sql="INSERT INTO users (name,email,photo,company_id,level,position,status) VALUES ('{$name}','{$email}','avatar.png',{$com_id},'{$access}','{$position}','invited')";
		$query = $connection->query($sql);
		if($query)
		{
			echo "sent";
		}
		else
		{
			echo "error";
		}
	 }
	 else
	 {
		echo "error";
	 }
	
?>