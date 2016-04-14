

<?php
error_reporting(E_ALL ^ E_DEPRECATED);
include("db_config.php"); 
session_start(); 
// connect to the mysql server
$link = mysql_connect($server, $db_user, $db_pass)
or die ("Could not connect to mysql because ".mysql_error());

// select the database
mysql_select_db($database)
or die ("Could not select database because ".mysql_error());

$username=$_POST['email'];

$match = "select username from $table where email = '".$_POST['email']."'
and password = '".$_POST['password']."';"; 

$qry = mysql_query($match)
or die ("Could not match data because ".mysql_error());
$num_rows = mysql_num_rows($qry); 

if ($num_rows <= 0) { 
echo "Sorry, there is no username $username with the specified password.";
echo "Try again";
$wrong_username="wrong_username";
setcookie($wrong_username, " Please check Username or Password");
$_SESSION[$wrong_username] = "Please check Username or Password";
header("location:login.php");
echo " from cookie " .$_COOKIE[$wrong_username];
exit; 
} else {
	$login_username="login_username";
	$_SESSION[$login_username] = $username;
	

setcookie("loggedin", "TRUE", time()+(3600 * 24));
setcookie("mysite_username", $username);
echo "You are now logged in!"; 
echo "Continue to the members section.";
header("location:main/landing_page.php");
}
?>