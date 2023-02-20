<?php

/*
codeigniter version 1.0.0
*/
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define( 'BASEPATH', realpath( dirname( __FILE__ ) ) . '/system/' );  // system whereas ci code
define( 'APPPATH', realpath( dirname( __FILE__ ) ) ); // root of project

include_once('system/database/DB.php');

/*driver mysql & pdo function depcricated so can not used*/

$db = DB("mysqli://apnamgzf_sajid:EY6%gbEY5s3N@localhost/apnamgzf_hiremyescort");
$query = $db->get('admins');
foreach($query->result_array() as $data){
    show_error($query);
}
