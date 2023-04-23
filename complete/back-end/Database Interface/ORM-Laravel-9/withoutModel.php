<?php

/* 
    Learn More about - https://laravel.com/docs/9.x/eloquent
    Or https://github.com/dontKnew/cheatsheet/blob/master/php/laravel/laravel%208x.txt - Line 878
*/


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DatabaseManager;

$capsule = new DatabaseManager;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => '',
    'username'  => '',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

if (!$capsule->getDatabaseManager()->connection()->getPdo()) {
    die("Could not connect to the database. Please check your configuration.");
}
$users = $capsule->table('admins')->limit(1)->get();
print_r($users[0]->name);
exit;

