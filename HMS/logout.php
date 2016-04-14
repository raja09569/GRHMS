<?php
session_start();  // Developed by www.freestudentprojects.com
session_destroy();
unset($_COOKIE["mysite_username"]);
unset($_COOKIE["wrong_username"]);
header("Location: login.php");
?>