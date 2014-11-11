<?php
require_once("PHPMailer_v5.1/class.phpmailer.php"); // *** This should be the correct path to the phpmailer module ***
define('GUSER', 'dobividama@gmail.com'); // GMail username (without <>)
define('GPWD', 'dobividama1'); // GMail password (without <>)

function smtpmailer($to, $from, $from_name, $subject, $body) { 
	global $error;
	$mail = new PHPMailer();  // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 1;  // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true;  // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
	$mail->Host = 'smtp.gmail.com'; // Google mailserver address
	$mail->Port = 465; // Google mailserver network port
	$mail->Username = GUSER;  
	$mail->Password = GPWD;           
	$mail->SetFrom($from, $from_name);
	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->AddAddress($to);
		
	if(!$mail->Send())
	{
		echo "Error: " . $mail->ErrorInfo;;
	}
	else
	{
		echo "Mail sent.";
	}

}

$message=$_POST['name'].' with the email address '.$_POST['email'].' has the following comments: '.$_POST['subject'].' message: '. $_POST['message'];
// The statement below makes a call to the smtpmailer function with mail parameters (without <>).
smtpmailer('juztmejuztme@yahoo.com', 'dobividama@gmail.com', 'Feedback', 'From the website contact form', $message);
?>