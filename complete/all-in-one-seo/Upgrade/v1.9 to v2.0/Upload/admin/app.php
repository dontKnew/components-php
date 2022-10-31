<?php

defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name: Rainbow PHP Framework
 * @copyright © 2017 ProThemes.Biz
 *
 */

//Current Date & User IP
$date = date('jS F Y');
$ip = getUserIP();
$browser = escapeTrim($con,getUA());

//Application Level DDoS Check
$siteInfo =  mysqli_query($con, "SELECT other_settings FROM site_info where id='1'");
$siteInfoRow = mysqli_fetch_array($siteInfo);
$other = dbStrToArr($siteInfoRow['other_settings']);

if(filter_var($other['other']['ddos'], FILTER_VALIDATE_BOOLEAN))
    ddosCheck($con,$ip);

//Theme Settings
$theme_path = $adminBaseURL.'theme' . '/' . $admin_theme . '/';
define('THEMEURL', $theme_path);
$fullLayout = 0;

//Load Language
$defaultLang = getLang($con); 
define('ACTIVE_LANG',$defaultLang);
$lang = getLangData($defaultLang,$con);

if(isset($_SESSION[N_APP.'AdminToken'])){
    
    $adminID = $_SESSION[N_APP.'AdminID'];
    $row = mysqliPreparedQuery($con, "SELECT * FROM admin where id=?", 's', array($adminID));    
    $adminUser =  Trim($row['user']);
    $adminPssword = Trim($row['pass']);
    $adminName =   Trim($row['admin_name']);
    $adminLogo =   Trim($row['admin_logo']);
    $admin_logo_path = createLink($adminLogo,true);
    
    $last_id = getLastID($con,'admin_history');
    $row = mysqliPreparedQuery($con, "SELECT * FROM admin_history where id=?", 's', array($last_id));    
    $last_date =  $row['last_date'];
    $last_ip =  $row['ip'];
    
    $logAdmin = false;
    if($last_ip == $ip) {
        if($last_date != $date)
            $logAdmin = true;
    } else 
        $logAdmin = true;
    
    if($logAdmin)
        insertToDbPrepared($con, 'admin_history', array('last_date' => $date,'ip' => $ip,'browser' => $browser));  

    $controller = $route = $pointOut = null;
    $args = $custom_route = array(); 
    
    if(isset($_GET['route'])) {
        $route = escapeTrim($con,$_GET['route']); 
        $route = explode('/',$route);
        $controller = $route[0];
        if(isset($route[1]))
            $pointOut = $route[1];
        $args = array_slice($route, 2);
        $argWithPointOut = array_slice($route, 1);
        if(trim($controller) == '')
           $controller = 'dashboard';
    }else{
        $controller = 'dashboard';  
    }
}else{
    $controller = 'login';  
}

//Create Link
$baseLink = createLink('',true);

$path = ADMIN_CON_DIR . $controller . '.php';
   	if(file_exists($path)){
        require($path);
	} else {
        $controller = "error";
        require(ADMIN_CON_DIR. $controller . '.php');
	}

define('VIEW', $controller);
?>