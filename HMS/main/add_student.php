<!doctype html>
<html lang=''>
<?php
include("header.php"); 
include("sidebar.php");
?>
<link rel="stylesheet" href="std.css" >

<head>
      <style type="text/css">
.form-style-1 {
    margin:10px auto;
    max-width: 400px;
    padding: 20px 12px 10px 20px;
    font: 13px "Lucida Sans Unicode", "Lucida Grande", sans-serif;
}
.form-style-1 li {
    padding: 0;
    display: block;
    list-style: none;
    margin: 10px 0 0 0;
}
.form-style-1 label{
    margin:0 0 3px 0;
    padding:0px;
    display:block;
    font-weight: bold;
}
.form-style-1 input[type=text], 
.form-style-1 input[type=date],
.form-style-1 input[type=datetime],
.form-style-1 input[type=number],
.form-style-1 input[type=search],
.form-style-1 input[type=time],
.form-style-1 input[type=url],
.form-style-1 input[type=email],
textarea, 
select{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    border:1px solid #BEBEBE;
    padding: 7px;
    margin:0px;
    -webkit-transition: all 0.30s ease-in-out;
    -moz-transition: all 0.30s ease-in-out;
    -ms-transition: all 0.30s ease-in-out;
    -o-transition: all 0.30s ease-in-out;
    outline: none;  
}
.form-style-1 input[type=text]:focus, 
.form-style-1 input[type=date]:focus,
.form-style-1 input[type=datetime]:focus,
.form-style-1 input[type=number]:focus,
.form-style-1 input[type=search]:focus,
.form-style-1 input[type=time]:focus,
.form-style-1 input[type=url]:focus,
.form-style-1 input[type=email]:focus,
.form-style-1 textarea:focus, 
.form-style-1 select:focus{
    -moz-box-shadow: 0 0 8px #88D5E9;
    -webkit-box-shadow: 0 0 8px #88D5E9;
    box-shadow: 0 0 8px #88D5E9;
    border: 1px solid #88D5E9;
}
.form-style-1 .field-divided{
    width: 49%;
}

.form-style-1 .field-long{
    width: 100%;
}
.form-style-1 .field-select{
    width: 100%;
}
.form-style-1 .field-textarea{
    height: 100px;
}
.form-style-1 input[type=submit], .form-style-1 input[type=button]{
    background: #4B99AD;
    padding: 8px 15px 8px 15px;
    width: 160px;
    height: 45px;
    font-size: 18px;
    border: none;
    color: #fff;
}
.form-style-1 input[type=submit]:hover, .form-style-1 input[type=button]:hover{
    background: #4691A4;
    box-shadow:none;
    -moz-box-shadow:none;
    -webkit-box-shadow:none;
}
.form-style-1 .required{
    color:red;
}
</style>
</head>
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
      <center><h1>Add Student</h1></center> 
      <h3></h3>
	  <form action="all_students.html">
		<div class="form">
			<img src="profile.png" >
			<input name="image_file" type="file" />
			<button style="width: 200px; height: 32px; font-weight:bold;">Upload</button>
		</div>
		<div class="form">
		<ul class="form-style-1">
			<li><label>Full Name <span class="required">*</span></label><input type="text" name="field1" class="field-divided" placeholder="First" />&nbsp;<input type="text" name="field2" class="field-divided" placeholder="Last" /></li>
			<li>
				<label>Email <span class="required">*</span></label>
				<input type="email" name="field3" class="field-long" />
			</li>
			<li>
				<label>MobileNo : <span class="required">*</span></label>
				<input type="email" name="field3" class="field-long" />
			</li>
			<li>
				<label>Permanant Address :<span class="required">*</span></label>
				<textarea name="field5" id="field5" class="field-long field-textarea"></textarea>
			</li>
			
		</ul>
		</div>
		<div class="form">
		<ul class="form-style-1">
			<li>
				<label>Temporary Address :<span class="required">*</span></label>
				<textarea name="field5" id="field5" class="field-long field-textarea"></textarea>
			</li>
			<li>
				<label>Room No : <span class="required">*</span></label>
				<input type="email" name="field3" class="field-long" /><button>Allot</button>
			</li>
			<li>
				<label>Id proof : <span class="required">*</span></label>
				<input name="image_file" type="file" />
			</li>
		</ul>
		</div>
		<div style="clear: both;"></div>
		<ul class="form-style-1" style="margin-top: 0;margin-right: 100px;">
			<li style="float: left; margin-right: 40px;">
				<input type="submit" value="Save" />
			</li>
			<li>
				<input type="submit" value="Save & Add" />
			</li>
		</ul>
	  </form>
    </section>
</div>
</div>
</body>
<html>