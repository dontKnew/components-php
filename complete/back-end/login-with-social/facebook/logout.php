<?php    
    session_start();
    session_destroy();
    unset($_SESSION['facebook_access_token']);
    unset($_SESSION['fb_id']);
    unset($_SESSION['fb_name']) ;
    unset($_SESSION['fb_email']);
    unset($_SESSION['fb_pic']);
    
    header("location:./");
?>