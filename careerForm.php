<?php

	$message = " Hi! <br> ";
	$message = $message . "Name : " . $_POST["name"]. "<br>";
	$message = $message . "Phone : " . $_POST["phone"] . "<br>";
	$message = $message . "Place Of Birth : " . $_POST["placeOf"] . "<br>";
	$message = $message . "Email : " . $_POST["email"] . "<br>";
	$message = $message . "Date Of Birth : " . $_POST["dob"] . "<br>";
	$message = $message . "Marital Status : " . $_POST["status"] . "<br>";
	$message = $message . "Address : " . $_POST["address"] . "<br>";
	$message = $message . "Last Degree : " . $_POST["lastDegree"] . "<br>";
	$message = $message . "Message : " . $_POST["message"] . "<br>";
	$message = $message . "Last Job : " . $_POST["lastJob"] . "<br>";
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
$mail->SMTPDebug = 1;

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
$mail->Username = "email here";

//Password to use for SMTP authentication
$mail->Password = "password here";

//Set who the message is to be sent from
$mail->setFrom('iconnectelnetworks.com', 'ALI');


//Set who the message is to be sent to
$mail->addAddress($_POST["email"], $_POST["name"]);

//Set the subject line
$mail->Subject = 'iConnectel';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML($message);

//attach File

if (isset($_FILES['UploadCV']) &&
    $_FILES['UploadCV']['error'] == UPLOAD_ERR_OK) {
    $mail->AddAttachment($_FILES['UploadCV']['tmp_name'],
                         $_FILES['UploadCV']['name']);
}



//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . "Not Sent";
} else {
    echo "Message sent!";
}

 
?>
