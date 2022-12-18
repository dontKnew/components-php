<?php

defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name: Rainbow PHP Framework
 * @copyright © 2018 ProThemes.Biz
 *
 */


$pageTitle = 'Miscellaneous';
$subTitle = 'Miscellaneous Task';
$fullLayout = 1; $footerAdd = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if(isset($_POST['action'])){
    
    $action = raino_trim($_POST['action']);
    
    //Clean up all temporary directories
    if($action == 'temp'){
        $folders = array(APP_DIR.'temp', ROOT_DIR.'resources'.D_S.'pdf-reports'.D_S, ROOT_DIR.'uploads'.D_S.'temp'.D_S);

        foreach($folders as $delDir){
            $files = array_diff(scandir($delDir), array('.', '..','.htaccess','index.php'));
            foreach ($files as $file){
                (is_dir("$delDir/$file")) ? delDir("$delDir/$file") : unlink("$delDir/$file");
            }
        }
        
        $msg = successMsgAdmin('All temporary directories data has been deleted successfully');   
    }
    
    //Clear all cached screenshots
    if($action == 'screen'){
        $delDir = HEL_DIR.'site_snapshot';
        $files = array_diff(scandir($delDir), array('.', '..','no-preview.png','index.php'));
    
        foreach ($files as $file){
            (is_dir("$delDir/$file")) ? delDir("$delDir/$file") : unlink("$delDir/$file");
        }
    
        $msg = successMsgAdmin('Screenshot data has been deleted successfully');
    }
        
    //Clear all recent history data
    if($action == 'recent'){
        mysqli_query($con,'DELETE FROM recent_history'); 
        if (mysqli_errno($con))
            $msg = errorMsgAdmin(mysqli_error($con));
        else{
            mysqli_query($con,'DELETE FROM user_input_history'); 
            if (mysqli_errno($con))
                $msg = errorMsgAdmin(mysqli_error($con));
            else
                $msg = successMsgAdmin('Recent history has been deleted successfully');
        } 
    }
    
    //Clear all analytics data
    if($action == 'analytics'){
        mysqli_query($con,'DELETE FROM rainbow_track'); 
        if (mysqli_errno($con))
            $msg = errorMsgAdmin(mysqli_error($con));
        else
            $msg = successMsgAdmin('All analytics data has been successfully cleared');
    }
    
    //Clear all admin login history data
    if($action == 'admin'){
        mysqli_query($con,'DELETE FROM admin_history'); 
        if (mysqli_errno($con))
            $msg = errorMsgAdmin(mysqli_error($con));
        else
            $msg = successMsgAdmin('Admin logged history has been successfully cleared');
    }
    
    //Clear all unverified users accounts
    if($action == 'unverified'){
        mysqli_query($con,"DELETE FROM users where verified='0'"); 
        if (mysqli_errno($con))
            $msg = errorMsgAdmin(mysqli_error($con));
        else
            $msg = successMsgAdmin('All unverified user accounts has been deleted successfully');
    }
    
    //Clear all users accounts
    if($action == 'users'){
        mysqli_query($con,'DELETE FROM users'); 
        if (mysqli_errno($con))
            $msg = errorMsgAdmin(mysqli_error($con));
        else
            $msg = successMsgAdmin('All users accounts has been deleted successfully');
    }
        
    }
}
?>