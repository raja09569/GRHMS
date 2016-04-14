<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
include("db_config.php");

$link = mysql_connect($server, $db_user, $db_pass)
or die ("Could not connect to mysql because ".mysql_error());

// select the database
mysql_select_db($database)
or die ("Could not select database because ".mysql_error());


$register_email=$_POST['register_email'];
		$register_first_name=$_POST['register_first_name'];
		$register_last_name=$_POST['register_last_name'];
		$register_password=$_POST['register_password'];
		$register_retype_password=$_POST['register_retype_password'];

$full_name=$register_first_name . $register_last_name;
$message_sent="message_sent";

$match = "select username from $table where email = '".$_POST['register_email']."';";
$qry = mysql_query($match) or die ("Could not match data because ".mysql_error());
$num_rows = mysql_num_rows($qry);


//$q=mysql_query("select * from login where name='".$name."' or mail='".$mail."' ") or die(mysql_error());
//  $n=mysql_fetch_row($q);
if($num_rows>0)
{
	$message_value='The username  mail '.$register_email.' is already present in our database';
	$_SESSION[$message_sent] = $message_value;
			echo $message_value;
}
else
{
	$insert=mysql_query("insert into $table ( `email`, `username`, `password`, `role`, `hostel_reg_id`, `status`) values('".$register_email."','".$full_name."','"
	.$register_password."','user','','enabled')") or die(mysql_error());
	if($insert)
	{
		$er='Values are registered successfully';
		require 'mail/PHPMailerAutoload.php';
		$mail = new PHPMailer(); // create a new object
		$mail->IsSMTP(); // enable SMTP
		$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true; // authentication enabled
		$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 465; // or 587
		$mail->IsHTML(true);
		$mail->Username = "hms.noreply999@gmail.com";
		$mail->Password = "hmsnoreply";
		$mail->SetFrom("ramanjaneyulu786@gmail.com");
		$mail->Subject = "Test";
		

		$mail->Body = "Hey " .$register_first_name .$register_last_name . "! \r\n Thank you for registering in HOSTEL MANAGEMENT Account we will reply you soon !";


		$mail->AddAddress($register_email);

		

		if(!$mail->Send()) {
			echo "Mailer Error: " . $mail->ErrorInfo;
			$message_value=$mail->ErrorInfo;
			$_SESSION[$message_sent] = $message_value;
		} else {

			$message_value="Thank you, for registering with us \r \n
					we will revert back with confirmation mail soon.......";
			$_SESSION[$message_sent] = $message_value;
			echo "Message has been sent";
		}

		
	}
	else
	{
		$er='Values are not registered';
	}
}
header("Location: login.php");
?>