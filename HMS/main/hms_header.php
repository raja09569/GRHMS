
<!DOCTYPE html>
<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();  // Developed by www.infinithoughtsolutions.com
if (!(isset($_SESSION['login_username']) && $_SESSION['login_username'] != '')) {
	?>
<script> location.replace("../login.php"); </script>
	<?php
}
	//exit(header ("Location: ../login.php"));
?>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles.css">
<script src="http://code.jquery.com/jquery-latest.min.js"
	type="text/javascript"></script>
<script type="text/javascript"
	src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css"
	href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/css/bootstrap.css">
<link rel="stylesheet" type="text/css"
	href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
<script type="text/javascript"
	src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="min.js"></script>
<script src="script.js"></script>
<link rel="stylesheet" href="text.css">
<title>Hostel Management Software</title>
</head>
<body>
	<div class="wrap">
		<nav class="nav-bar navbar-inverse" role="navigation">
			<div id="top-menu" class="container-fluid active">
				<a class="navbar-brand" href="landing_page.php">Grpg for Boys</a>
				<ul class="nav navbar-nav">
					<form id="qform" class="navbar-form pull-left" role="search">
						<label style="color: #999; font-size: 13px;">Welcome :<?php 
						// if (session_is_registered('login_username'))
						// {
						echo  $_SESSION['login_username'];
						// }?></label>
						<address style="color: #999; font-size: 13px;">
							jaibheemnagar, Bangalore<br /> karnataka, 560068<br /> Mobile No:
							+91-9620620234<br /> Email: ramesh@grpg.co.in ram
						</address>
					</form>
					<li class="dropdown movable"><a href="#" class="dropdown-toggle"
						data-toggle="dropdown"><span class="caret"></span><span
							class="fa fa-4x fa-child"></span> </a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><span class="fa fa-user"></span>My Profile</a></li>
							<li><a href="#"><span class="fa fa-gear"></span>Settings</a></li>
							<li class="divider"></li>
							<li><a href="../logout.php"><span class="fa fa-power-off"></span>Logout</a>
							</li>
						</ul>
					</li>

				</ul>
			</div>
		</nav>
		<!-- end of templatemo_menu -->