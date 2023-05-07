<?php
    require_once '../database/UserClass.php';
    if(isset($_SESSION['user_data'])){
        $user = new User;
        $user->setUserId($_SESSION['user_data']['user_id']);
        $user->setUserStatus("offline");
        $user->update_user_status();
        
        unset($_SESSION['user_data']);
        session_destroy();
        header("location:../login/");
    }else {
        echo "something wrong";
    }
?>