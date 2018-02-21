/*
This is set up to use the Google mail along with the PHPMailer plugin to test locally.
*/


<?php

	// Variables
	$name 	= trim(filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING));
	$email 	= trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));
	$msg 	= trim(filter_input(INPUT_POST, "msg", FILTER_SANITIZE_FULL_SPECIAL_CHARS));

	// Spam Check
	if ($_POST["verify"] != "") {
		exit;
	}

	// Email Inbox Message
	$email_body = "";
	$email_body .= "Name: " . $name . "\n";
	$email_body .= "Email: " . $email . "\n";
	$email_body .= "Message: " . $msg . "\n";

	// Load PHPMailer Plugin
	require("phpmailer/PHPMailerAutoload.php");

	// Initialize PHP Mailer
	$mail = new PHPMailer;
	
	// Setup
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';						  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'xxxxxxxxxx';                       // SMTP username
	$mail->Password = 'xxxxxxxxxx';                       // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to
	$mail->setFrom($email);
	$mail->addAddress('hello@andrewbennett.us', 'Andrew');
	$mail->isHTML(false);
	$mail->Subject = 'Contact Form Submission';
	$mail->Body = $email_body;

	// Send Email
	$mail->send();

?>