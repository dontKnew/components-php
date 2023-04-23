<?php

defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name: Rainbow PHP Framework
 * @copyright © 2018 ProThemes.Biz
 *
 */

$pageTitle = 'Ban IP Address';
$subTitle = 'Add User IP to Ban';
$fullLayout = 1; $footerAdd = false; $footerAddArr = array();

if($pointOut == 'delete'){
    $code = $args[0];
    if($args[0] != ''){
        $query = "DELETE FROM banned_ip WHERE id='$args[0]'";
        $result = mysqli_query($con, $query);
    
        if (mysqli_errno($con)) {
            $msg = errorMsgAdmin(mysqli_error($con));

        } else {
            header('Location:'.adminLink($controller,true));
            die();
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $ban_ip = escapeTrim($con, $_POST['ban_ip']);
    $banReason = escapeTrim($con, $_POST['reason']);
    
    if (!filter_var($ban_ip, FILTER_VALIDATE_IP) === false) {
    $query = "INSERT INTO banned_ip (added_at,ip,reason) VALUES ('$date','$ban_ip','$banReason')";
    mysqli_query($con, $query);
   
    if (mysqli_errno($con))
        $msg = errorMsgAdmin(mysqli_error($con));
    else 
        $msg =  successMsgAdmin('IP added to database successfully.');
   
    } else {
        $msg = errorMsgAdmin('IP is not valid!');
    }
}


$query =  "SELECT * FROM banned_ip";
$result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result)){
  $bannedList[]=$row;  
}

?>