<!DOCTYPE html>
<?php
session_start();  // Developed by www.infinithoughtsolutions.com
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">

<script src="min.js" type="text/javascript"></script>
<script type="text/javascript"
	src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link
	href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600'
	rel='stylesheet' type='text/css'>
<style type="text/css">
.modalDialog {
	position: fixed;
	font-family: Arial, Helvetica, sans-serif;
	top: 0;
	right: 0;
	bottom: 0;
	left: 0;
	background: rgba(0, 0, 0, 0.8);
	z-index: 99999;
	opacity: 0;
	-webkit-transition: opacity 400ms ease-in;
	-moz-transition: opacity 400ms ease-in;
	transition: opacity 400ms ease-in;
	pointer-events: none;
}

.modalDialog:target {
	opacity: 1;
	pointer-events: auto;
}

.modalDialog>div {
	width: 400px;
	position: relative;
	margin: 10% auto;
	padding: 5px 20px 13px 20px;
	border-radius: 10px;
	background: #fff;
	background: -moz-linear-gradient(#fff, #999);
	background: -webkit-linear-gradient(#fff, #999);
	background: -o-linear-gradient(#fff, #999);
}

.close {
	background: #606061;
	color: #FFFFFF;
	line-height: 25px;
	position: absolute;
	right: -12px;
	text-align: center;
	top: -10px;
	width: 24px;
	text-decoration: none;
	font-weight: bold;
	-webkit-border-radius: 12px;
	-moz-border-radius: 12px;
	border-radius: 12px;
	-moz-box-shadow: 1px 1px 3px #000;
	-webkit-box-shadow: 1px 1px 3px #000;
	box-shadow: 1px 1px 3px #000;
}

.close:hover {
	background: #00d9ff;
}
</style>

<script type="text/javascript">

function checkValidations(){
	 //alert("Iam on submit button");
	 if($('#register_password').val() != $('#register_retype_password').val()){
		 	alert("Please re-enter confirm password");
		 	$('#register_retype_password').val('');
		 	$('#register_retype_password').focus();
		 	return false;
		 }
	 return true;
}
/*$(document).ready(function(){

	alert("Iam on ready");


	 $('#register_submit').click(function(event){
		 alert("Iam on submit button");
	 if($('#register_password').val() != $('#register_retype_password').val()){
	 	alert("Please re-enter confirm password");
	 	$('#register_retype_password').val('');
	 	$('#register_retype_password').focus();
	 	return false;
	 }
		$.post("submit_demo_captcha.php?"+$("#register").serialize(),
				 { }, 
		   function(response){
	        if(response==1){
	           $(".imgcaptcha").attr("src","demo_captcha.php?_="+((new Date()).getTime()));
	           clear_form();
	           alert("Data Submitted Successfully.")
	        }else{
	           alert("wrong captcha code!");
	        }
		}); 

		$.post( 
		          "gmail.php",
		         {register_email:$('#register_email').val(),
					register_first_name:$('#register_first_name').val(),register_last_name:$('#register_last_name').val(),
					register_password:$('#register_password').val(),register_retype_password:$('#register_retype_password').val()
				 },
		          function(data) {
					 alert(data);
		             
		           // alert(" <h2>Thank you, for registering with us</h2><p>we will revert back with confirmation mail soon.......</p>");
		          }
		       );
		return false;
	    });
});*/
</script>
</head>
<body>
	<!-- <div class="form"> -->

	<!-- <ul class="tab-group">
			<li class="tab active"><a href="#signup">Sign Up</a></li>
			<li class="tab"><a href="#login">Log In</a></li>
		  </ul> -->

	<!-- <div class="tab-content">
			 -->
	<header>
		<h1>Hostel Management Software Indu</h1>
	</header>
	<section>
	
	<?php
		if (isset($_SESSION['$message_sent'])) {

		 ?>
		<div id="openModal" class="modalDialog">



			<div>
				<a href="#close" title="Close" class="close">X</a>
				<h2>
				<?php echo  $_SESSION['message_sent']; ?>
				</h2>

			</div>
		</div>
		<?php
		session_destroy();
		}
		?>

		<p>
			<font color='red'><strong><?php 
			if (isset($_SESSION['message_sent'])) {
				echo  $_SESSION['message_sent'];
				session_destroy();
			}

			?>
			</strong> </font>
		</p>
		<!-- 
			<div id="signup">  -->

		<h1>Sign Up for Free</h1>

		<!-- <form action="#openModal" method="post"> action="gmail.php" -->
		<form  method="post"  name="register_form" id="register_form" 
		action="gmail.php"  onsubmit="return checkValidations() ;" >

	<div class="top-row">
				<div class="field-wrap">
					<label> First Name<span class="req">*</span> </label> <input
						type="text" id="register_first_name" name="register_first_name"
						required autocomplete="off" value="ram" />
				</div>

				<div class="field-wrap">
					<label> Last Name<span class="req">*</span> </label> <input
						type="text" id="register_last_name" name="register_last_name"
						required autocomplete="off"  value="anji"/>
				</div>
			</div>

			<div class="field-wrap">
				<label> Email Address<span class="req">*</span> </label> <input
					type="email" id="register_email" name="register_email" required
					autocomplete="on" value="ram.mtlm2000@gmail.com"/>
			</div>

			<div class="field-wrap">
				<label> Set A Password<span class="req">*</span> </label> <input
					type="password" id="register_password" name="register_password" 
					 required autocomplete="off" value="r" />
			</div>

			<div class="field-wrap">
				<label> Retype Password<span class="req">*</span> </label> <input
					type="password" id="register_retype_password"  name="register_retype_password"  
					required autocomplete="off" value="r" />
			</div>

			<button type="submit" id="register_submit" name="register_submit"
			 class="button button-block"  >
			Create Account
			</button>


		</form>
		<!-- 
			  </div> -->
		
	</section>
	<div class="clear"></div>
	<!-- </div> -->
	<section>
		<!-- <div id="login" >  -->

		<h1>Welcome Back!</h1>

		<form action="login_check.php" method="post">

			<div class="field-wrap" id="login_et">
				<label> Email Address<span class="req">*</span> </label> <input
					type="email" id="email" name="email" required autocomplete="off" />
			</div>

			<div class="field-wrap" id="login_et">
				<label> Password<span class="req">*</span> </label> <input
					type="password" id="password" name="password" required
					autocomplete="off" />
			</div>

			<p class="forgot">
				<a href="#">Forgot Password?</a>
			</p>
			<p>
				<font color='red'><strong><?php 
				if (isset($_SESSION['wrong_username'])) {
					echo  $_SESSION['wrong_username'];
					session_destroy();
				}
					
			 ?></strong> </font>
			</p>
			<button class="button button-block" />
			Log In
			</button>

		</form>
		<!-- 
			</div> -->
	</section>
	
	<div class="clear"></div>
	<!-- </div> -->
	<!-- tab-content -->

	<!-- </div> -->
	<!-- /form -->


</body>
</html>
