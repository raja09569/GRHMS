<?php
//require("class.PHPMailer.php");
require('C:\xampp\php\PEAR\class.phpmailer.php');

//include("C:\xampp\php\PEAR\class.phpmailer.php"); 

$mail = new PHPMailer();

$mail->IsSMTP();                                      // set mailer to use SMTP
$mail->Host = "smtp.gmail.com" ;//smtp1.example.com;smtp2.example.com";  // specify main and backup server
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "ramanjaneyulu786@gmail.com";  // SMTP username
$mail->Password = "bhavani786"; // SMTP password

$mail->From = "ramanjaneyulu786@gmail.com";
$mail->FromName = "Mailer";
$mail->AddAddress("ram.mtlm2000@gmail.com", "RAM John");
//$mail->AddAddress("ellen@example.com");                  // name is optional
//$mail->AddReplyTo("info@example.com", "Information");

$mail->WordWrap = 50;                                 // set word wrap to 50 characters
//$mail->AddAttachment("/var/tmp/file.tar.gz");         // add attachments
//$mail->AddAttachment("/tmp/image.jpg", "new.jpg");    // optional name
$mail->IsHTML(true);                                  // set email format to HTML

$mail->Subject = "Here is the subject";
$mail->Body    = "This is the HTML message body <b>in bold!</b>";
$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}

echo "Message has been sent";
?>