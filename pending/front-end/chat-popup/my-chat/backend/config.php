<?php

/*
    Learn More about - https://laravel.com/docs/9.x/eloquent
    Or https://github.com/dontKnew/cheatsheet/blob/master/php/laravel/laravel%208x.txt - Line 878
*/
date_default_timezone_set('Asia/Kolkata');

header("Access-Control-Allow-Origin: http://localhost:1111");
header("Access-Control-Allow-Credentials: true");
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';
use Illuminate\Database\Capsule\Manager as DatabaseManager;

$db = new DatabaseManager;
$db->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'popup_chat',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$db->setAsGlobal();
$db->bootEloquent();

if (!$db->getDatabaseManager()->connection()->getPdo()) {
    echo json_encode(array('status'=>500, "msg"=>"Could not connect to the database. Please check your configuration."));
    exit;
}

function display($arr){
    echo "<pre>";
    echo print_r($arr);
    echo "</pre>";
    exit;
}