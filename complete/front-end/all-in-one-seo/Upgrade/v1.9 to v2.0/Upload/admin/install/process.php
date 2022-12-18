<?php

/*
 * @author Balaji
 */

error_reporting(1);

//ROOT Path
define('ROOT_DIR', realpath(dirname(dirname(dirname(__FILE__)))) .DIRECTORY_SEPARATOR);

//Application Path
define('APP_DIR', ROOT_DIR .'core'.DIRECTORY_SEPARATOR);

//Configuration Path
define('CONFIG_DIR', APP_DIR .'config'.DIRECTORY_SEPARATOR);

//Installer Path
define('INSTALL_DIR', ROOT_DIR .'admin'.DIRECTORY_SEPARATOR.'install'.DIRECTORY_SEPARATOR);

$data_host = htmlspecialchars(Trim($_POST['data_host']));
$data_name = htmlspecialchars(Trim($_POST['data_name']));
$data_user = htmlspecialchars(Trim($_POST['data_user']));
$data_pass = htmlspecialchars(Trim($_POST['data_pass']));
$data_sec = htmlspecialchars(Trim($_POST['data_sec']));
$domain = urlencode($_POST['data_domain']);
$licPath = 'http://lic.prothemes.biz/atozseov2.php';

$con = mysqli_connect($data_host,$data_user,$data_pass,$data_name);

if (mysqli_connect_errno()){
    echo "Database Connection failed";
    die();
}

// Don't crack license checker. It will crash whole site and handle incorrectly!

// If you want to request new purchase code for "localhost" installation and for "development" site (or)
// Reset the old code for your new domain name than contact support! 

// For Support, mail to us: rainbowbalajib [at] gmail.com

$stats = Trim(file_get_contents($licPath."?code=$data_sec&domain=$domain"));
$stats = explode("::",$stats);

$sucRate = Trim($stats[0]);
$authCode = Trim($stats[1]);

if ($sucRate == '1') {
    //Fine
}elseif ($sucRate == '0') {
    echo 'Item purchase code not valid';
    die();
}elseif ($sucRate == '2') {
    echo 'Already code used on another domain! Contact Support';
    die();
}elseif ($sucRate == '') {
    echo 'Unable Connect to Server!';
    die();
}else {
    echo 'Item purchase code not valid / banned';
    die();
}

if($authCode == '')
    $authCode = Md5($domain);
    
$domain = str_replace(array('http://','https://','www.'), '', urldecode($domain));
if(substr($domain, -1) != '/') $domain = $domain.'/';

$data = '<?php
defined(\'ROOT_DIR\') or die(header(\'HTTP/1.0 403 Forbidden\'));

/*
 * @author Balaji
 * @name: Rainbow PHP Framework v1.4
 * @copyright © 2017 ProThemes.Biz
 *
 */

// --- Database Settings ---

// Database Hostname
$dbHost = \''.$data_host.'\';

// Database Username
$dbUser = \''.$data_user.'\';

// Database Password
$dbPass = \''.$data_pass.'\';

// Database Name
$dbName = \''.$data_name.'\';

//Base URL (Without http:// & https://)
$baseURL = \''.$domain.'\';

//Item Purchase Code
$item_purchase_code = \''.$data_sec.'\';

//Domain Security Code
$authCode = \''.$authCode.'\';

';

file_put_contents(CONFIG_DIR.'db.config.php',$data);

echo '1';
die();
?>