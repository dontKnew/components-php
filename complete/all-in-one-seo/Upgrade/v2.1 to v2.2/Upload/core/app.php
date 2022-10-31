<?php
defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name: Rainbow PHP Framework
 * @copyright 2018 ProThemes.Biz
 *
 */

//Current Date & User IP
$date = date('jS F Y');
$ip = getUserIP(); 

//Higher Level Plugin Execution
if(PLUG_SYS)
    require LIB_DIR.'user_levelx.php';

//Load Basic Settings
$siteInfo =  mysqli_query($con, "SELECT * FROM site_info where id='1'");
$siteInfoRow = mysqli_fetch_array($siteInfo);

$title = $siteInfoRow['title'];
$des = $siteInfoRow['des'];
$keyword = $siteInfoRow['keyword'];
$site_name = $siteInfoRow['site_name'];
$adminEmail = trim($siteInfoRow['email']);
$social_links = dbStrToArr($siteInfoRow['social_links']);
$doForce = dbStrToArr($siteInfoRow['doForce']);
$copyright = $siteInfoRow['copyright'];
$other = dbStrToArr($siteInfoRow['other_settings']);
$ga = $other['other']['ga'];
$ddosDetect = filter_var($other['other']['ddos'], FILTER_VALIDATE_BOOLEAN);
$forceHttps = filter_var($doForce[0], FILTER_VALIDATE_BOOLEAN);
$forceWww = filter_var($doForce[1], FILTER_VALIDATE_BOOLEAN);

//Application Level DDoS Check
if($ddosDetect)
    ddosCheck($con,$ip);

//WWW Redirect
if($forceWww){
    if ((strpos($_SERVER['HTTP_HOST'], 'www.') === false)) {
        $protocol = isset($_SERVER["HTTPS"]) ? 'https://' : 'http://';
        header('Location: '.$protocol.'www.'. $serverHost . $_SERVER["REQUEST_URI"],true,301);
        exit();
    }
}

//HTTPS Redirect
if($forceHttps) {
    if (!isset($_SERVER["HTTPS"])) {
        header('Location: '.'https://'. $serverHost . $_SERVER["REQUEST_URI"],true,301);
        exit();
    }
}

//Load AD Codes
$dbAd = mysqli_query($con, "SELECT * FROM ads where id='1'");
$dbAdRow = mysqli_fetch_array($dbAd);
$ads_720x90 = htmlspecialchars_decode($dbAdRow['ad720x90']);
$ads_250x300 = htmlspecialchars_decode($dbAdRow['ad250x300']);
$ads_250x125 = htmlspecialchars_decode($dbAdRow['ad250x125']);
$ads_468x70 = htmlspecialchars_decode($dbAdRow['ad480x60']);
$text_ads = htmlspecialchars_decode($dbAdRow['text_ads']);

//Load User Settings
$query = mysqli_query($con,"SELECT * FROM user_settings WHERE id='1'");
$userRow = mysqli_fetch_array($query);
$enable_reg =  filter_var(Trim($userRow['enable_reg']), FILTER_VALIDATE_BOOLEAN);
$enable_oauth =  filter_var(Trim($userRow['enable_oauth']), FILTER_VALIDATE_BOOLEAN);
$quick_login =  filter_var(Trim($userRow['enable_quick']), FILTER_VALIDATE_BOOLEAN);
$oauth_keys = dbStrToArr($userRow['oauth_keys']);
$visitors_limit = intval($userRow['visitors_limit']);

//Check User IP is banned
ipBanCheck($con,$ip,$site_name);

//Get the default theme
$default_theme = '';
if(isset($_SESSION[N_APP.'UserSelectedTheme']))
    $default_theme = raino_trim($_SESSION[N_APP.'UserSelectedTheme']); //User Selected Theme
elseif(isset($_SESSION[N_APP.'AdminSelectedTheme'])){
    $default_theme = raino_trim($_SESSION[N_APP.'AdminSelectedTheme']); //Admin Selected Theme
    $footerAddArr[] = previewBox();
}else
    $default_theme = getTheme($con); //Load Default Theme
    
$theme_path = $baseURL.'theme' . '/' . $default_theme . '/';
define('THEMEURL', $theme_path);
define('THEME_DIR', ROOT_DIR .'theme' . D_S . $default_theme . D_S);

//Load theme settings
$themeOptions = getThemeOptions($con,$default_theme,$baseURL);

//Load Language 
$isRTL = false;
$loadedLanguages = getAvailableLanguages($con);
if(!isset($_GET['route'])){
    
    if(isset($_SESSION[N_APP.'UserSelectedLang']))
        $loadLangCode = strtolower(raino_trim($_SESSION[N_APP.'UserSelectedLang'])); //User Selected Language
    else
        $loadLangCode = getLang($con);  //Default Language
        
    define('ACTIVE_LANG',$loadLangCode);
    $lang = getLangData($loadLangCode,$con);
}

//Load Router System
require ROU_DIR.'router.php';

//Loaded Language is RTL
$isRTL = isRTLlang($loadedLanguages);

//Apply Short Code to title,des etc...
$title = shortCodeFilter($title);
$des = shortCodeFilter($des);
$keyword = shortCodeFilter($keyword);
$site_name = shortCodeFilter($site_name);
$copyright = htmlspecialchars_decode(shortCodeFilter($copyright));

//Maintenance Mode
if(isSelected($other['other']['maintenance'])){
    if(!isset($_SESSION[N_APP.'AdminToken']))
        $controller = 'maintenance';
}

//Base Link with Language Code
$baseLink = createLink('',true);

//User Logout
if(isset($_GET['logout'])){
    unset($_SESSION[N_APP.'Token']);
    unset($_SESSION[N_APP.'Oauth_uid']);
    unset($_SESSION[N_APP.'Username']);
    unset($_SESSION[N_APP.'Pic']);
    unset($_SESSION[N_APP.'UserToken']);
    header('Location: '.$baseLink);
    exit();
}

//Controller - Higher Level Plugin Execution
if(PLUG_SYS)
    require LIB_DIR.'user_level1.php';

$path = CON_DIR . $controller . '.php';
   	if(file_exists($path)){
        require($path);
	} else {
	    writeLog('Controller File ("'.$controller.'.php") Not Found');
        $controller = CON_ERR;
        require(CON_DIR. $controller . '.php');
	}

//Controller - Lower Level Plugin Execution
if(PLUG_SYS)
    require LIB_DIR.'user_level2.php';

//Last Callback Link
$_SESSION[N_APP.'LastCallbackLink'] = $currentLink;

//Generate Menubar Links
$menuBarLinks = getMenuBarLinks($con, $currentLink);
$headerLinks = $menuBarLinks[0];
$footerLinks = $menuBarLinks[1];

if($enable_reg)
    $loginNav = makeLoginNav($quick_login,$baseURL,$lang);

//Generate Page Title
if(!isset($metaTitle)){
    $metaTitle = ''; 
    if(isset($pageTitle)) { 
        $metaTitle = $pageTitle.' | '. $site_name; 
    } else { 
        $metaTitle = $title;
    }
}

//Lower Level Plugin Execution
if(PLUG_SYS)
    require LIB_DIR.'user_levely.php';

define('VIEW', $controller);