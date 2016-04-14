<?php
 if(!ob_start('ob_gzhandler'))
	ob_start();
include("hms_header.php");
include("hms_sidebar.php");
/*
-- sample sql script to populate database for demo

create table if not exists country
( country_id int unsigned not null auto_increment primary key
, country_name varchar(255)
) character set utf8 collate utf8_general_ci;

insert into country(country_name) values ('Canada'), ('United States'), ('Mexico');

create table if not exists market
( market_id int unsigned not null auto_increment primary key
, market_name varchar(255)
, photo varchar(255)
, contact_email varchar(255)
, country_id int unsigned
, is_active tinyint(1)
, create_date date
, notes text
) character set utf8 collate utf8_general_ci;

insert into market(market_name, contact_email, country_id, is_active, create_date, notes) values 
('Great North', 'jane@superco.com', 1, 1, curdate(), 'nothing new'),
('The Middle', 'sue@superco.com', 2, null, '2001-01-01', 'these are notes'),
('Latin Market', 'john@superco.com', 1, 1, '1999-10-31', 'expanding soon');

*/
error_reporting(E_ALL ^ E_DEPRECATED);
error_reporting(E_ALL);

// speed things up with gzip plus ob_start() is required for csv export


include('guest_payment_lazy_mofo.php');
include("../db_config.php");

echo "
	<link rel='stylesheet' type='text/css' href='lazy_mofo_style.css'>
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
$lm->table = 't_guest_details';


// identity / primary key for table
$lm->identity_name = 'gp_sno';


// optional, make friendly names for fields
$lm->rename['room_sno'] = 'RoomNo';


// optional, define input controls on the form
//$lm->form_input_control['g_profile_image'] = '--image';
//$lm->form_input_control['g_isactive'] = "select 1, 'Yes' union select 0, 'No' union select 2, 'Maybe'; --radio";
//$lm->form_input_control['room_sno'] = 'select room_sno,room_no from t_room_details; --select';


// optional, define editable input controls on the grid
//$lm->grid_input_control['g_isactive'] = '--checkbox';


// optional, define output control on the grid 
//$lm->grid_output_control['g_email'] = '--email'; // make email clickable
//$lm->grid_output_control['g_profile_image'] = '--image'; // image clickable  


// new in version >= 2015-02-27 all searches have to be done manually
$lm->grid_show_search_box = true;


// optional, query for grid(). LAST COLUMN MUST BE THE IDENTITY for [edit] and [delete] links to appear
$lm->grid_sql = "
select 
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
where coalesce(m.g_first_name, '') like :_search 
or    coalesce(m.room_sno, '') like :_search 
or    coalesce(m.g_last_name, '') like :_search 
order by m.gp_sno asc
";
$lm->grid_sql_param[':_search'] = '%' . trim(@$_REQUEST['_search']) . '%';


// optional, define what is displayed on edit form. identity id must be passed in also.  
$lm->form_sql = "
select 
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
where m.gp_sno = :gp_sno
";
$lm->form_sql_param[":$lm->identity_name"] = @$_REQUEST[$lm->identity_name]; 


// optional, validation. input:  regular expression (with slashes), error message, tip/placeholder
// first element can also be a user function or 'email'
$lm->on_insert_validate['g_first_name'] = array('/.+/', 'Missing First Name', 'this is required'); 
$lm->on_insert_validate['room_sno'] = array('/.+/', 'Missing Room No', 'this is required'); 


// copy validation rules to update - same rules
$lm->on_update_validate = $lm->on_insert_validate;  


    $lm->return_to_edit_after_insert = false;
    $lm->return_to_edit_after_update = false;
$lm->grid_show_images = true;
// use the lm controller
$lm->run();


echo "";
