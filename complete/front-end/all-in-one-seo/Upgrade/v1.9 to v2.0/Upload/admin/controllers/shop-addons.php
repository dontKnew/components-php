<?php
defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));


/*
 * @author Balaji
 * @name: Rainbow PHP Framework
 * @copyright © 2018 ProThemes.Biz
 *
 */
 
$pageTitle = 'Shop Addons';
$subTitle = 'AtoZ SEO Tools Addons';
$fullLayout = 1; $footerAdd = true; $footerAddArr = array();

if($pointOut == 'ajax'){
    $query = http_build_query($_GET) . "\n";
    echo getMyData('http://api.prothemes.biz/tools/shop_addon.php?'.$query);
    die();
}


?>