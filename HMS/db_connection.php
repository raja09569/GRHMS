<?php
error_reporting(E_ALL ^ E_DEPRECATED);
// mysql_connect($server, $db_user, $db_pass)
include("db_config.php");
 $host=$server;
 $uname=$db_user;
 $pass=$db_pass;
 $database = $database;
 $connection=mysql_connect($host,$uname,$pass) 
 or die("Database Connection Failed");
 
 $result=mysql_select_db($database)
 or die("database cannot be selected");
 
?>