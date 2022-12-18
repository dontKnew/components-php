<?php
defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name: A to Z SEO Tools - PHP Script
 * @copyright © 2018 ProThemes.Biz
 *
 */

$pageTitle = 'Manage SEO Tools';
$subTitle = 'Tools List';
$fullLayout = 1; $footerAdd = true; $footerAddArr = array();

if(isset($_GET['disable'])){
    $dID = raino_trim($_GET['id']);
    $query = "UPDATE seo_tools SET tool_show='no' WHERE id='$dID'";
    if (!mysqli_query($con,$query))
        $msg = errorMsgAdmin('Something Went Wrong!');
    else
        $msg = successMsgAdmin('SEO Tool disabled Successfully!');
}

if(isset($_GET['enable'])){
    $dID = raino_trim($_GET['id']);
    $query = "UPDATE seo_tools SET tool_show='yes' WHERE id='$dID'";
    if (!mysqli_query($con,$query))
        $msg = errorMsgAdmin('Something Went Wrong!');
    else
        $msg = successMsgAdmin('SEO Tool enabled Successfully!');
}

$query =  "SELECT * FROM seo_tools";
$result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result)){
  $toolList[]=$row;  
}
?>