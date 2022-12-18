<?php

defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name: Rainbow PHP Framework
 * @copyright © 2018 ProThemes.Biz
 *
 */

$pageTitle = 'DDoS Protection';
$subTitle = 'Application Level DDoS Detection';
$fullLayout = 1; $footerAdd = true; $footerAddArr = array();
$date = date('Y-m-d');

$taskData =  mysqli_query($con, "SELECT * FROM rainbowphp_temp where task='ddos'");
$taskRow = mysqli_fetch_array($taskData);
$taskData = dbStrToArr($taskRow['data']);

$siteInfo =  mysqli_query($con, "SELECT * FROM site_info where id='1'");
$siteInfoRow = mysqli_fetch_array($siteInfo);
$other = dbStrToArr($siteInfoRow['other_settings']);

if($pointOut == 'delete'){
    $delKey = $args[0];
    if($args[0] != ''){
        if(isset($taskData[$date]['banned'][$delKey])){
            unset($taskData[$date]['banned'][$delKey]);
            $taskSet = arrToDbStr($con,$taskData);
            $query = "UPDATE rainbowphp_temp SET data='$taskSet' WHERE task='ddos'";
            mysqli_query($con, $query);
        
            if (mysqli_errno($con)) {
                $msg = errorMsgAdmin(mysqli_error($con));
            } else {
                header('Location:'.adminLink($controller,true));
                die();
            }
        }else{
            $msg = errorMsgAdmin('IP not found on DDoS database');
        }
    }else{
        header('Location:'.adminLink($controller,true));
        die();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $ddos = isSelected(escapeTrim($con, $_POST['ddos']));
    $maxcount = escapeTrim($con, $_POST['maxcount']);
    
    $other['other']['ddos'] = $ddos;
    $other_settings = arrToDbStr($con,$other);
    
    $taskData['maxcount'] = $maxcount;
    $taskSet = arrToDbStr($con,$taskData);
    
    $query = "UPDATE site_info SET other_settings='$other_settings' WHERE id='1'";
    mysqli_query($con, $query);
    
    $query = "UPDATE rainbowphp_temp SET data='$taskSet' WHERE task='ddos'";
    mysqli_query($con, $query);
    
    if (mysqli_errno($con))
        $msg = errorMsgAdmin(mysqli_error($con));
    else
        $msg = successMsgAdmin('DDoS settings saved successfully');
}

?>