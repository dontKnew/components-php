<?php

defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name: Rainbow PHP Framework
 * @copyright © 2018 ProThemes.Biz
 *
 */


$pageTitle = 'Domain License';
$subTitle = 'License Change';
$fullLayout = 1; $footerAdd = false;

//Domain License Info
$jsonData = simpleCurlGET('http://api.prothemes.biz/tools/info.php?link='.createLink('',true).'&code='.$item_purchase_code);
$licArr = json_decode($jsonData,true);

?>