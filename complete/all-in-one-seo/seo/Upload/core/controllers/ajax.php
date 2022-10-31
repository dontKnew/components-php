<?php
defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name: Rainbow PHP Framework
 * @copyright © 2018 ProThemes.Biz
 *
 */

//AJAX ONLY

//POST Request Handler
if ($_SERVER['REQUEST_METHOD'] =='POST') {

    //AJAX Image Verification
    if($pointOut == 'verification') {
        //Load Image Verifcation
        extract(loadCapthca($con));

        $cap_type = strtolower($cap_type);
        $customCapPath = PLG_DIR.'captcha'.DIRECTORY_SEPARATOR.$cap_type.'_cap.php';
        define('CAP_VERIFY',1);

        //Verify image verification.
        require LIB_DIR.'verify-verification.php';

        if(isset($args[0]) && $args[0] == 'get-auth'){
            if(!isset($error)){
                $secKey = randomChar(9);
                $_SESSION[N_APP.'sec'.$secKey] = array(1,strtotime("+5 minutes"));
                echo '1:::'.$secKey;
            }else
                echo '0:::0';
        }else{
            if(!isset($error))
                echo '1';  //Verified
            else
                echo $error; //Failed Verification
        }
        die();
    }
}

//PHP Image Verification
if($pointOut == 'phpcap'){
    $phpCap = ''; $captcha_config = array();
    if(isset($args[0]) && $args[0] != ''){
        if($args[0] == 'reload'){
            extract(loadCapthca($con));
            $phpCap = elite_captcha($color,$mode,$mul,$allowed);
            $_SESSION[N_APP.'Cap'.$phpCap['page']] = $phpCap;
            echo $phpCap['image_src'] .':::'. $phpCap['page'];
        }elseif($args[0] == 'image'){
            $captcha_config = unserialize($_SESSION[N_APP.'_CAPTCHA']['config']);
            if( !$captcha_config ) exit();
            unset($_SESSION[N_APP.'_CAPTCHA']);
            drawPHPCap($captcha_config);
        }
        die();
    }
}

//Set Language
if($pointOut == 'lang') {
    $langCode = raino_trim($args[0]);
    if($langCode != ''){
        $_SESSION[N_APP.'UserSelectedLang'] = $langCode;
        if(isset($_SESSION[N_APP.'LastCallbackLink']))
            $goToLink = $_SESSION[N_APP.'LastCallbackLink'];
        else
            $goToLink = createLink('',true);
        header('Location:'.$goToLink,true,301);
    }else{
        echo 'Language code missing!';
    }
    die();
}

//Set Theme
if($pointOut == 'theme'){
    $themeCode = raino_trim($args[0]);
    if($themeCode == 'unset'){
        unset($_SESSION[N_APP.'UserSelectedTheme']);
        unset($_SESSION[N_APP.'AdminSelectedTheme']);
        header('Location:'. createLink('',true));
        die();
    }
    if($themeCode != ''){
        if(isThemeExists($themeCode)){
            $_SESSION[N_APP.'UserSelectedTheme'] = $themeCode;
            header('Location:'. createLink('',true));
        }else{
            stop('Theme fails to load!');
        }
    }else{
        stop('Theme name missing!');
    }

}

//Say Hello
if($pointOut == 'hello'){
    echo 'Hello';
    die();
}

//Geo IP Information
if($pointOut == 'ip-info'){
    header('Content-Type: application/json');
    echo getMyGeoInfo($ip, $item_purchase_code, true);
    die();
}

//Account Verification
if($pointOut == 'account-verify'){
    if(isset($_SESSION[N_APP.'Username'])){
        redirectTo(createLink('',true));
        die();
    }
    if($args[0] != '' && $args[1] != ''){

        $username = raino_trim($args[0]);
        $code = raino_trim($args[1]);

        $row = mysqliPreparedQuery($con, "SELECT * FROM users WHERE username=?",'s',array($username));

        if($row !== false){
            //Username found
            $db_email_id = Trim($row['email_id']);
            $db_verified = $row['verified'];

            $ver_code = Md5(HASH_CODE . $db_email_id . HASH_CODE);

            if ($db_verified == '1'){
                die($lang['RF90']);
            }
            if ($ver_code == $code){
                if(updateToDbPrepared($con, 'users', array('verified' => '1'), array('username' => $username))) {
                    $error = $lang['RF91'];
                } else{
                    header("Location: ".createLink('account/login/verification-success',true));
                    echo '<meta http-equiv="refresh" content="1;url='.createLink('account/login/verification-success',true).'">';
                    exit();
                }
            } else {
                die($lang['RF92']);
            }
        } else {
            die($lang['RF48']);
        }

    }else{
        die($lang['RF48']);
    }
    die();
}

//Custom AJAX
define('AJAX_CUS', true);
require CON_DIR.'atoz-ajax.php';

//Master JS Code
if($pointOut == 'master-js'){
    header('Content-Type: application/javascript');
    $tools = $toolsURL = array();
    $result = mysqli_query($con, 'SELECT * FROM seo_tools ORDER BY CAST(tool_no AS UNSIGNED) ASC');
    while ($row = mysqli_fetch_array($result)){
        if(isSelected($row['tool_show'])){
            $tools[] = shortCodeFilter($row['tool_name']);
            $toolsURL[] = createLink($row['tool_url'],true);
        }
    }
    echo 'tools = '. json_encode($tools) .'; toolsURL = '. json_encode($toolsURL).';searchNo = \''. makeJavascriptStr($lang['AS38']) .'\'; keyCheck = \''. makeJavascriptStr($lang['AS37']) .'\'; desCheck = \''. makeJavascriptStr($lang['AS36']) .'\'; titleCheck = \''. makeJavascriptStr($lang['AS35']) .'\'; capRefresh = \''. makeJavascriptStr($lang['AS34']) .'\'; charLeft = \''. makeJavascriptStr($lang['AS33']) .'\'; inputURL = \''. makeJavascriptStr($lang['AS32']) .'\'; inputEm = \''. makeJavascriptStr($lang['AS5']) .'\'; capCodeWrg = \''. makeJavascriptStr($lang['RF4']) .'\'; imageVr = \''. makeJavascriptStr($lang['RF29']) .'\'; emptyStr = \''. makeJavascriptStr($lang['AS31']) .'\'; oopsStr = \''. makeJavascriptStr($lang['RF82']) .'\'; baseUrl = \''. $baseURL .'\'; axPath = \''. createLink('ajax',true) .'\'; var trackLink = \''.createLink('rainbow/track',true).'\'; '.detectAdBlockScript($con);
    ?>
    function parseHost(url) {
    var a=document.createElement('a');
    a.href=url;
    return a.hostname;
    }
    jQuery(document).ready(function(){
    var screenSize = window.screen.width + 'x' + window.screen.height;
    var myUrl = window.location.href;
    var myHost = window.location.hostname;
    var refUrl = document.referrer;
    var refHost = parseHost(refUrl);
    if(myHost == refHost)
    refUrl = 'Direct';
    jQuery.post(trackLink,{page:myUrl,ref:refUrl,screen:screenSize},function(data){
    });
    if(xdEnabled){
    var xdBlockEnabled = false;
    var testAd = document.createElement('div');
    testAd.innerHTML = '&nbsp;';
    testAd.className = 'pub_300x250 adsbox';
    document.body.appendChild(testAd);
    window.setTimeout(function() {
    if (testAd.offsetHeight === 0) {
    xdBlockEnabled = true;
    }
    testAd.remove();
    if(xdBlockEnabled){
    if(xdOption == 'link'){
    window.location = xdData1;
    }else if(xdOption == 'close'){
    $('#xdTitle').html(xdData1);
    $('#xdContent').html(xdData2);
    $('#xdBox').modal('show');
    }else if(xdOption == 'force'){
    $('#xdClose').hide();
    $('#xdTitle').html(xdData1);
    $('#xdContent').html(xdData2);
    $('#xdBox').modal({
    backdrop: 'static',
    keyboard: false
    });
    $('#xdBox').modal('show');
    }
    }
    }, 100);
    }
    });
    <?php
    die();
}

//Only Authenticated Users

//Admin Ajax Controller
if(isset($_SESSION[N_APP.'AdminToken'])){

    //Themes Preview
    if($pointOut == 'templates'){
        $themeDir = raino_trim($args[0]);
        if(isThemeExists($themeDir)){
            unset($_SESSION[N_APP.'UserSelectedTheme']);
            $_SESSION[N_APP.'AdminSelectedTheme'] = $themeDir;
            header('Location:'. createLink('',true));
        }else{
            stop('Theme fails to load!');
        }
        die();
    }

    //User Account Login
    if($pointOut == 'user-acc'){
        if(isset($args[1]) && $args[1] != ''){
            $username = $args[1];
            $row = mysqliPreparedQuery($con, "SELECT * FROM users WHERE username=?",'s',array($username));
            if($row !== false){
                $db_oauth_uid = $row['oauth_uid'];
                $db_id = $row['id'];
                $_SESSION[N_APP.'UserToken'] = passwordHash($db_id . $username);
                $_SESSION[N_APP.'Token'] = Md5($db_id.$username);
                $_SESSION[N_APP.'Oauth_uid'] = $db_oauth_uid;
                $_SESSION[N_APP.'Username'] = $username;

                //Premium Membership Settings
                if(file_exists(CON_DIR.'premium.php')){
                    $subArr = subscriptionCheck($username,$con);
                    if($subArr[0]){
                        if($subArr[1]){
                            //Premium Active User
                            $dataPlan = getPlanInfo($subArr[4],$con);
                            if($dataPlan[0]){
                                //Plan Found
                                $_SESSION[N_APP.'premiumClient'] = 1;
                                $_SESSION[N_APP.'premiumToken'] = array($subArr[2],$subArr[3],$subArr[4],$dataPlan[1],$dataPlan[2],$dataPlan[3],$dataPlan[4],$dataPlan[5],$subArr[6],$dataPlan[6]);
                            }else{
                                //Plan Not Found!
                                $_SESSION[N_APP.'premiumClient'] = 1;
                                $_SESSION[N_APP.'premiumError'] = $lang['AD735'].' "'.$subArr[5].'" '.$lang['AD736'].' <br> '.str_replace('[contact-link]','<a href="'.createLink('contact',true).'">'.$lang['AD738'].'</a>',$lang['AD737']).'<br>';
                            }
                        }else{
                            //Premium Non-Active User
                            $_SESSION[N_APP.'premiumError'] = $lang['AD731'].' <br> '.$lang['AD732'].' '.$subArr[3].' <br> '.$lang['AD733'].' <a href="'.createLink('invoice/'.$subArr[4],true).'">'.$lang['AD734'].'</a>.<br>';
                        }
                    }
                }

                redirectTo(createLink('',true));
                die();
            }
        }
    }
}

//Script Information
if($pointOut == 'phpinfo'){
    if(isset($args[0]) && $args[0] != ''){
        if(raino_trim($args[0]) == $item_purchase_code) phpinfo();
        die();
    }
}

if($pointOut == 'appinfo'){
    if(isset($args[0]) && $args[0] != ''){
        if(raino_trim($args[0]) == $item_purchase_code){
            echo '<table>
            <tbody>
                <tr><td>Script Name: </td><td>'. APP_NAME .'</td></tr>
                <tr><td>Script Version: </td><td>'. VER_NO .'</td></tr>
                <tr><td>Framework Version: </td><td>'. getFrameworkVersion() .'</td></tr>
                <tr><td>PHP Version: </td><td>'. phpversion() .' <a href="'.createLink($controller.'/phpinfo/'.$item_purchase_code,true).'" target="_blank">(View PHP Info)</a></td></tr>
                <tr><td>MySQL Version: </td><td>'. mysqli_get_server_info($con) .'</td></tr>
                <tr><td>Script Root Dir: </td><td>'. ROOT_DIR .'</td></tr>
                <tr><td>Base URL: </td><td>'. $baseURL .'</td></tr>
                <tr><td>Admin Base URL: </td><td>'. adminLink('',true) .'</td></tr>
                <tr><td>Server IP: </td><td>'. $_SERVER['SERVER_ADDR'] .'</td></tr>
                <tr><td>Server CPU Usage: </td><td>'. getServerCpuUsage() .'</td></tr>
                <tr><td>Server Memory Usage: </td><td>'. round(getServerMemoryUsage(),2) .'</td></tr>
            </tbody>
        </table>';
        }
    }
    die();
}

//AJAX END
die();