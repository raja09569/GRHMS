<?php 
include("hms_header.php");
include("hms_sidebar.php");
include("../db_config.php");

/*try {
	$dbh = new PDO("mysql:host=$db_host;dbname=$db_name;", $db_user, $db_pass);
}
catch(PDOException $e) {
	die('pdo connection error: ' . $e->getMessage());
}*/

$num_rec_per_page=10;
mysql_connect($server,$db_user, $db_pass);
mysql_select_db($database);
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page; 
$sqlQuery="select 
m.gp_sno
 ,m.g_sno
, m.room_sno
, m.g_first_name
, m.g_last_name
, m.gp_actual_rent
, m.gp_paid_rent
, m.gp_due_rent
, m.gp_month
, m.gp_paid_date
,m.gp_rent_collected_by
,m.gp_sno 
from  t_guest_payment_details m ";

$whereCondtion="";
if (isset($_GET["g_sno"])){
$whereCondtion = "where g_sno=".$_GET["g_sno"] ;
$sqlQuery =$sqlQuery.$whereCondtion;
}

$sql = $sqlQuery." LIMIT $start_from, $num_rec_per_page"; 
$rs_result = mysql_query ($sql); //run the query
?> 
<style type='text/css'>

#payment_table {
 margin-top: 20px;
 margin-left: 260px;
}
</style>
 <div class="content">
    <div class="top-bar">
      <a href="#menu" class="cssmenu-link burger">
        <span class='burger_inside' id='bgrOne'></span>
        <span class='burger_inside' id='bgrTwo'></span>
        <span class='burger_inside' id='bgrThree'></span>
      </a>
    </div>
    <section class="content-inner">
      <h2>Payment</h2>
      <h3></h3>
   
<table name="payment_table" id="payment_table" border="1" cellpadding="1" cellspacing="1">
<tr><td>Proof ID</td><td>First Name</td></tr>
<?php 
while ($row = mysql_fetch_assoc($rs_result)) { 
?> 
            <tr>
            <td><?php echo $row['g_sno']; ?></td>
            <td><?php echo $row['g_first_name']; ?></td>            
            </tr>
<?php 
}; 
?> 
</table>
 </section>
</div>
<?php 
$sqlQuery = "select 
m.gp_sno
 ,m.g_sno
, m.room_sno
, m.g_first_name
, m.g_last_name
, m.gp_actual_rent
, m.gp_paid_rent
, m.gp_due_rent
, m.gp_month
, m.gp_paid_date
,m.gp_rent_collected_by
,m.gp_sno 
from  t_guest_payment_details m 

";

$whereCondtion="";
if (isset($_GET["g_id"])){
$whereCondtion = "where g_id=".$_GET["g_id"] ;
$sqlQuery =$sqlQuery.$whereCondtion;
}

$rs_result = mysql_query($sqlQuery); //run the query
$total_records = mysql_num_rows($rs_result);  //count number of records
$total_pages = ceil($total_records / $num_rec_per_page); 

echo "<a href='pagination.php?page=1'>".'|<'."</a> "; // Goto 1st page  

for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a href='pagination.php?page=".$i."'>".$i."</a> "; 
}; 
echo "<a href='pagination.php?page=$total_pages'>".'>|'."</a> "; // Goto last page
?>