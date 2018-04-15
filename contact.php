<?php

	$message = "";
	$message = $message . "My email address is " . $_POST["emailAddress"] . "<br>";
	$message = $message . "My name is " . $_POST["name"]. "<br>";
	$message = $message . "My message to you guys is " . $_POST["textMessage"];
	$message = $message . "<br> Thankyou!";



//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Asia/Karachi');

require 'PHPmailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "faizan00780@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "cool00780";

//Set who the message is to be sent from
$mail->setFrom('faizan00780@gmail.com', 'Faizan Ejaz');


//Set who the message is to be sent to
$mail->addAddress('mirzafaizanejaz@gmail.com', 'faizan ejaz');

//Set the subject line
$mail->Subject = 'PHPMailer GMail SMTP test';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML($message);



//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . "Not Sent";
} else {
    echo "Message sent!";
}
?>