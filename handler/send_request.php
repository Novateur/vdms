<?php
	//require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	require ("../PHPMailer/PHPMailerAutoload.php");

	$mail = new PHPMailer;

	$email = sanitize($_POST['invite_email']);
	$cname = get_user_com_name();
	$com_id = get_comp_id_user();
	
	$mail->isSMTP();                                   // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                            // Enable SMTP authentication
	$mail->Username = 'akobundumichael94@gmail.com';          // SMTP username
	$mail->Password = 'akobundumic?'; // SMTP password
	$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                 // TCP port to connect to

	$mail->setFrom('email@codexworld.com', 'CodexWorld');
	$mail->addReplyTo('email@codexworld.com', 'CodexWorld');
	$mail->addAddress($email);   // Add a recipient
	//$mail->addCC('cc@example.com');
	//$mail->addBCC('bcc@example.com');

	$mail->isHTML(true);  // Set email format to HTML
	
	$bodyContent = "<h1>Invitation as a vendor by {$cname}</h1>";
	$bodyContent .= "<p>This is the HTML email sent from localhost using PHP script by <b>Novateur Nigeria</b></p>";

	$mail->Subject = "Email from Localhost by Novateur Nigeria";
	$mail->Body    = $bodyContent;

	if(!$mail->send()) {
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
		echo 'sent';
	}
?>