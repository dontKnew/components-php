<?php
/* 
    Learn More about - https://laravel.com/docs/9.x/eloquent
    Or https://github.com/dontKnew/cheatsheet/blob/master/php/laravel/laravel%208x.txt - Line 878
*/
require_once "connection.php";
$user = new User;
$data = $user->all();
foreach($data as $k){
    echo $k->name . "<br>";
}