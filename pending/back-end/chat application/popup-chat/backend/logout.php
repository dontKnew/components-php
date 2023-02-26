<?php
session_start();
if(isset($_SESSION['isLogged'])){
    unset($_SESSION['isLogged']);
    unset($_SESSION['name']);
    unset($_SESSION['id']);
    unset($_SESSION['email']);
    session_destroy();
    echo "You are signed out";
}else {
    echo "Please Login First";
}