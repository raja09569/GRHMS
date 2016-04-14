<!doctype html>
<html lang=''>
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
      <!-- <h2>Dashboard</h2> -->
      <h3></h3>
	  <div class="search">
	    <form id="qform" class="navbar-form pull-left" role="search">
	  <!--	<form action="index.php" method="get">-->
			<input type="text" name="action" value="searchresults" id="search_input" />
			<input type="submit" id="search_btn" />
		</form>
	  </div>
	  <table>
		<tr>
			<th></th>
			<th>icon</th>
			<th>Name</th>
			<th>Room no</th>
			<th>Join Date</th>
		</tr>
	  </table>
    </section>
</div>
</div>
</body>
<html>