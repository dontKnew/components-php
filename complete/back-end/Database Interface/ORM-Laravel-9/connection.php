<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Eloquent\Model;
$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => '162.241.119.108',
    'database'  => 'apnamgzf_hiremyescort',
    'username'  => 'apnamgzf_test',
    'password'  => 'F)Xre9RQtVSt',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

class User extends Model
{
    protected $table = 'admins';
}


$user = User::all();
foreach($user  as $k){
	echo $k->email. "<br>";
}