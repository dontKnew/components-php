<?php
 
$table = 'csc_country';
$primaryKey = 'id';
$columns = array(
    array( 'db' => 'name', 'dt' => 0 ),
    array( 'db' => 'iso2',  'dt' => 1 ),
    array( 'db' => 'currency',   'dt' => 2 ),
    array(
        'db'        => 'created_at',
        'dt'        => 3,
        'formatter' => function( $d, $row ) {
            return date( 'jS M y', strtotime($d));
        }
    )
);
 
// SQL server connection information
$sql_details = array(
    'user' => 'sajid',
    'pass' => '1',
    'db'   => 'a1642dcu_shipmiles',
    'host' => 'localhost'
    // ,'charset' => 'utf8' // Depending on your PHP and MySQL config, you may need this
);
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( 'ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);