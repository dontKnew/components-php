<?php
defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name: Rainbow PHP Framework
 * @copyright © 2017 ProThemes.Biz
 *
 */

//Page Title
$pageTitle = trans('Contact Us',$lang['RF2'],true);
$des = $keyword = $name = $from = $to = $replyTo = $sub = $message = '';

//Load Image Verifcation
extract(loadCapthca($con));

$cap_contact = filter_var($contact_page, FILTER_VALIDATE_BOOLEAN);

if($cap_contact){
    $cap_type = strtolower($cap_type);
    $customCapPath = PLG_DIR.'captcha'.DIRECTORY_SEPARATOR.$cap_type.'_cap.php';
    define('CAP_VERIFY',1);
    define('CAP_GEN',1);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $name = raino_trim($_POST['name']);
    $from = $replyTo = raino_trim($_POST['email']);
    $sub = raino_trim($_POST['sub']);
    $message = raino_trim($_POST['message']);
    $nowDate = date('m/d/Y h:i:sA'); 
    
    if(isset($_SESSION[N_APP.'Username']))
        $username = $_SESSION[N_APP.'Username'];
    else
        $username = $lang['RF26'];
    
    //Verify image verification.
    if ($cap_contact)
        require LIB_DIR.'verify-verification.php';  
    
    if(!isset($error)){
        //No Error - Continue
        if ($name != null && $replyTo != null && $sub != null && $message != null && $adminEmail != null){
            
            $htmlMessage = '<html><body><p><b>'.$lang['RF30'].':</b> <br> '.nl2br($message).'</p><p><b>'.$lang['RF31'].':</b> <br>'.$lang['RF32'].': '.$username.' <br>'.$lang['RF33'].':'.$ip.' <br>'.$lang['RF34'].': '.$nowDate.'</p></body></html>';
        
            //Load Mail Settings
            extract(loadMailSettings($con));
            
            if($protocol == '1'){
                //PHP Mail
                if(default_mail($adminEmail, $name, $replyTo, $name, $adminEmail, $sub, $htmlMessage)){
                    //Your message has been sent successfully
                    $success = $lang['RF27'];
                    $message = $body = $from = $name = $sub = '';
                }else{
                    //Failed to send your message
                    $error = $lang['RF28'];
                }
            }else{
                //SMTP Mail
                if(smtp_mail($smtp_host, $smtp_port, isSelected($smtp_auth), $smtp_username, $smtp_password, $smtp_socket,
                        $adminEmail, $name, $replyTo, $name, $adminEmail, $sub, $htmlMessage)){
                    //Your message has been sent successfully   
                    $success = $lang['RF27'];
                    $message = $body = $from = $name = $sub = '';
                }else{
                    //Failed to send your message
                    $error = $lang['RF28'];
                }
            }
        }else{
            $error = $lang['RF25'];
        }
    }
}

//Generate Image Verification
if ($cap_contact)
    require LIB_DIR.'generate-verification.php';
?>