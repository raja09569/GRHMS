<?php
 if(!ob_start('ob_gzhandler'))
	ob_start();
include("hms_header.php");
include("hms_sidebar.php");

error_reporting(E_ALL ^ E_DEPRECATED);
error_reporting(E_ALL);

// speed things up with gzip plus ob_start() is required for csv export


include('room_view_lazy_mofo.php');
include("../db_config.php");

echo "

	<link rel='stylesheet' type='text/css' href='lazy_mofo_style.css'>
<link href=&quot;//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css&quot; rel=&quot;stylesheet&quot;>


"; 


// enter your database host, name, username, and password
$db_host = $server;
$db_name = $database;
$db_user = $db_user;
$db_pass = $db_pass;


// connect with pdo 
try {
	$dbh = new PDO("mysql:host=$db_host;dbname=$db_name;", $db_user, $db_pass);
}
catch(PDOException $e) {
	die('pdo connection error: ' . $e->getMessage());
}

// create LM object, pass in PDO connection
$lm = new lazy_mofo($dbh); 


// table name for updates, inserts and deletes
$lm->table = 't_room_details';


// identity / primary key for table
$lm->identity_name = 'room_sno';


// optional, make friendly names for fields
$lm->rename['room_no'] = 'RoomNo';


// optional, define input controls on the form
$lm->form_input_control['g_profile_image'] = '--image';
$lm->form_input_control['g_isactive'] = "select 1, 'Yes' union select 0, 'No' union select 2, 'Maybe'; --radio";
$lm->form_input_control['room_id'] = 'select room_id from t_room_details; --select';


// optional, define editable input controls on the grid
$lm->grid_input_control['g_isactive'] = '--checkbox';


// optional, define output control on the grid 
//$lm->grid_output_control['alloted_members'] = '--link'; // make link clickable
$lm->grid_output_control['g_profile_image'] = '--image'; // image clickable  


// new in version >= 2015-02-27 all searches have to be done manually
$lm->grid_show_search_box = true;


// optional, query for grid(). LAST COLUMN MUST BE THE IDENTITY for [edit] and [delete] links to appear
$lm->grid_sql = "
select 
  m.room_sno
  , m.room_no
, m.floor_sno
, m.actual_members
, m.alloted_members
,m.room_sno 
from  t_room_details m 
where coalesce(m.room_sno, '') like :_search 
or    coalesce(m.floor_sno, '') like :_search 
order by m.room_sno asc
";
$lm->grid_sql_param[':_search'] = '%' . trim(@$_REQUEST['_search']) . '%';


// optional, define what is displayed on edit form. identity id must be passed in also.  
$lm->form_sql = "
select 
  m.room_sno
  , m.room_no
, m.floor_sno
, m.actual_members
, m.alloted_members
,m.room_sno 
from  t_room_details m 
where m.room_sno = :room_sno
";
$lm->form_sql_param[":$lm->identity_name"] = @$_REQUEST[$lm->identity_name]; 


// optional, validation. input:  regular expression (with slashes), error message, tip/placeholder
// first element can also be a user function or 'email'
$lm->on_insert_validate['room_id'] = array('/.+/', 'Missing Room No', 'this is required',true); 
$lm->on_insert_validate['floor_id'] = array('/.+/', 'Missing Floor No', 'this is required'); 


// copy validation rules to update - same rules
$lm->on_update_validate = $lm->on_insert_validate;  


// use the lm controller
$lm->run();


echo "";
