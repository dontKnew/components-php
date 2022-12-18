<?php

defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name: A to Z SEO Tools - PHP Script
 * @copyright © 2017 ProThemes.Biz
 *
 */

if(!isset($_POST['tokenKey'])){
    $controller = "error";
    require(CON_DIR. $controller . '.php');
}

$site = raino_trim($_POST['site']);
$toolName = raino_trim($_POST['toolName']);
$token = raino_trim($_POST['tokenKey']);
$tokenKey = raino_trim($_SESSION['getWebSnap']);
    
if(!isset($token))
die();
if($token==null||$token=="")
die();
if($tokenKey != $token){
header("Location: ../");
die();   
}

$_SESSION['getWebSnap'] = "Reset Code";
$site = clean_url($site); $site = "http://$site";
$site = parse_url(Trim($site));
$host = $site['host'];
if (file_exists(HEL_DIR."site_snapshot/$host.jpg")) {
$file = HEL_DIR."site_snapshot/$host.jpg";
}else {
$file = HEL_DIR."site_snapshot/no-preview.png";
}


header("Content-type: image/jpg");
header('Content-Disposition: attachment; filename="'.$host.'.jpg"');
readfile("$file");
die();
?>