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

//Load Configuration & Functions
require CONFIG_DIR.'config.php';
require APP_DIR.'functions.php';

echo 'Upgraded started.... <br />';

mysqli_query($con, 'ALTER TABLE pages ADD sort_order text, ADD lang text, ADD status text, ADD access text, ADD type text');
$result = mysqli_query($con, 'SELECT * FROM pages');
while ($row = mysqli_fetch_array($result)){
    
    if(updateToDbPrepared($con, 'pages', array(
        'sort_order' => '3',
        'lang' => 'all',
        'status' => 'on',
        'access' => 'all',
        'type' => 'page'
    ), array( 'id' => $row['id']))){
        echo 'Upgrading page '.$row['page_name'].' failed <br />';
    }else{
        echo 'Upgrading "'.$row['page_name'].'" page success <br />';
    }
}
mysqli_query($con, 'RENAME TABLE ban_user TO banned_ip');
mysqli_query($con, 'ALTER TABLE banned_ip CHANGE COLUMN last_date added_at text');
mysqli_query($con, 'ALTER TABLE banned_ip ADD reason text');
mysqli_query($con, 'DROP TABLE capthca');
mysqli_query($con, 'DROP TABLE interface');
mysqli_query($con, 'DROP TABLE maintenance');
mysqli_query($con, 'ALTER TABLE mail CHANGE COLUMN auth smtp_auth text');
mysqli_query($con, 'ALTER TABLE mail CHANGE COLUMN socket smtp_socket text');
mysqli_query($con, 'ALTER TABLE user_settings ADD enable_quick text, ADD oauth_keys text, ADD other_settings text');
$result = mysqli_query($con,"SELECT * FROM user_settings WHERE id='1'");   
$row = mysqli_fetch_array($result);
$oauth_keys['oauth']['g_client_id'] = Trim($row['g_client_id']);
$oauth_keys['oauth']['g_client_secret'] = Trim($row['g_client_secret']);
$oauth_keys['oauth']['fb_app_id'] = Trim($row['fb_app_id']);
$oauth_keys['oauth']['fb_app_secret'] = Trim($row['fb_app_secret']);
$oauth_keys['oauth']['fb_redirect_uri'] = $baseURL. '?route=facebook';
$oauth_keys['oauth']['g_redirect_uri'] = $baseURL. '?route=google';
$oauth_keys['oauth']['twitter_redirect_uri'] = $baseURL. '?route=twitter';
$oauthStr = arrToDbStr($con, $oauth_keys);
mysqli_query($con, "UPDATE user_settings SET oauth_keys='$oauthStr', enable_quick='on' WHERE id='1'");
mysqli_query($con, 'ALTER TABLE user_settings DROP COLUMN fb_app_id,DROP COLUMN fb_app_secret,DROP COLUMN g_client_id,DROP COLUMN g_client_secret,DROP COLUMN g_redirect_uri');
mysqli_query($con, 'ALTER TABLE site_info ADD social_links text, ADD other_settings text');
  

$other = $social_links = array();
$result = mysqli_query($con,"SELECT * FROM site_info WHERE id='1'");
$row = mysqli_fetch_array($result);
$social_links['twit'] =   Trim($row['twit']);
$social_links['face'] =   Trim($row['face']);
$social_links['gplus'] =   Trim($row['gplus']);
$social_links['linkedin'] =   'https://linkedin.com';
$other['other']['maintenance_mes'] = 'We expect to be back within the hour.&lt;br/&gt;Sorry for the inconvenience.';
$other['other']['footer_tags'] = 'seo, turbo, balaji';
$other['other']['ddos_check'] = '';
$other['other']['ddos'] = '1';
$other['other']['maintenance'] = '';
$other['other']['ga'] =  Trim($row['ga']);
$other['other']['dbbackup'] = array('gzip' => 'on', 'cronopt' => 'daily');
$other['other']['sitemap'] = array('cronopt' => 'daily','auto' => 'on','gzip' => '','cron' => '','multilingual' => '','priority' => '0.9',
'freqrange' => 'daily',);
$otherStr = arrToDbStr($con, $other);
$socialStr = arrToDbStr($con, $social_links);
mysqli_query($con, "UPDATE site_info SET social_links='$socialStr', other_settings='$otherStr' WHERE id='1'");
mysqli_query($con, 'ALTER TABLE site_info DROP COLUMN twit,DROP COLUMN face,DROP COLUMN gplus,DROP COLUMN ga');
mysqli_query($con, 'ALTER TABLE users ADD added_date text, ADD firstname text, ADD lastname text, ADD company text, ADD telephone text, ADD address1 text,  ADD address2 text,  ADD city text,  ADD state text,  ADD statestr text, ADD postcode text,  ADD country text,  ADD userdata text');


echo 'Installing new tables and queries <br />';

$completed = true;

$completed = installMySQLdb($con, INSTALL_DIR.'upgrade.sql');

if($completed)
    echo 'Installation Completed!';  
else
    echo 'Installation Completed with Errors!';  

if($completed){
//Clear the Installer Files
    unlink(INSTALL_DIR.'install.php');
    unlink(INSTALL_DIR.'process.php');
    unlink(INSTALL_DIR.'finish.php');
    unlink(INSTALL_DIR.'atozseoinstall.sql');
    unlink(INSTALL_DIR.'upgrade.sql');
    unlink(INSTALL_DIR.'upgrade.php');
    unlink(ROOT_DIR.'config.php');
    
    if(file_exists(INSTALL_DIR.'install.php'))
        echo '<br /> Alert: Unable to delete installation files.<br /> 
        Manually delete installation folder ("/admin/install/") before accessing your site.';
}
die();
?>