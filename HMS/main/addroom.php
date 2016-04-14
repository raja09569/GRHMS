<!DOCTYPE html>
<html lang="en">
	<head>
	<style type="text/css" >
		.form_row label {
			display: inline-block;
			position: relative;
			font-size: 1em;
		}
		.form_row input {
			display: block;
			min-height: 35px;
		}
		.form_row select {
			display: block;
			width: 100px;
			min-height: 35px;
		}
	</style>
	</head>
	<body>
		<?php
		include("header.php");
		include("sidebar.php");
		?>
		<!--Body content-->
		  <div class="content">
			<div class="top-bar">
			  <a href="#menu" class="cssmenu-link burger">
				<span class='burger_inside' id='bgrOne'></span>
				<span class='burger_inside' id='bgrTwo'></span>
				<span class='burger_inside' id='bgrThree'></span>
			  </a>
			</div>
			<section class="content-inner">
			  <h2>Add Rooms</h2>
			  <h3></h3>
			  <form class="room">
					<div class="form_row">					
					<label>Floor No : </label>
					<input type="text" >
					</div>
					<div class="form_row">
					<label>Room No :</label>
					<input type="text" >
					</div>
					<div class="form_row">
					<label>Actual Members :</label>
					<input type="text" >
					</div>
					<div class="form_row">
					<label>Allotted Members :</label>
					<input type="text" >
					</div>
					<div class="form_row">
					<label>Room Type :</label>
					<select>
					  <option value="guest">Guest</option>
					  <option value="staff">Staff</option>
					  <option value="store">Store</option>
					</select>
					</div>
					<button>Submit</button>
			  </form>
			</section>
		</div>
		</div>
	</body>
</html>