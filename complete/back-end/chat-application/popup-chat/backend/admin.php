<?php
session_start();
if(!isset($_SESSION['isLogged'])){
    $_SESSION['id'] = 12;
    $_SESSION['name'] = "Mark Zuckerberg";
    $_SESSION['isLogged'] = true;
    $_SESSION['email'] = "mark@facebook.com";
    echo "You are logged Now";
}else {
    echo "You are already logged";
}