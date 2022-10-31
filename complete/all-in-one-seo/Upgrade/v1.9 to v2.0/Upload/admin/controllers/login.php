<?php
defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name: Rainbow PHP Framework
 * @copyright © 2018 ProThemes.Biz
 *
 */
 
$remUserName = $remPassword = $remBox = $lock = '';

if(isset($_SESSION[N_APP.'AdminToken'])){
    header('Location: '. $adminBaseURL);
    echo '<meta http-equiv="refresh" content="1;url='.$adminBaseURL.'">';
    exit();
}

if(isset($_COOKIE[N_APP.'_admin_remember']) && $_COOKIE[N_APP.'_admin_remember'] == 'on') {
    $remUserName = raino_trim($_COOKIE[N_APP.'_admin_email']);
    $remPassword = raino_trim($_COOKIE[N_APP.'_admin_password']);
    $remBox = ' checked="" ';
}

//Load Image Verifcation
extract(loadCapthca($con));
$admin_login_page = filBoolean($admin_login_page);

if($admin_login_page){
    $cap_type = strtolower($cap_type);
    $customCapPath = PLG_DIR.'captcha'.DIRECTORY_SEPARATOR.$cap_type.'_cap.php';
    define('CAP_GEN',1);
    define('CAP_VERIFY',1);
}
    
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    if(isset($_POST['email']) && isset($_POST['password'])){
        
        $emailBox = escapeTrim($con,$_POST['email']);
        $passwordBox = passwordHash(escapeTrim($con,$_POST['password']));
    
        if(isset($_POST['remember'])){
            setcookie(N_APP.'_admin_email', $_POST['email'], time() + (86400 * 300));
            setcookie(N_APP.'_admin_password', $_POST['password'], time() + (86400 * 300)); 
            setcookie(N_APP.'_admin_remember', 'on', time() + (86400 * 300));         
        }else{
             setcookie(N_APP.'_admin_remember', 'off', time() + (86400 * 300));    
        }
        
        if($admin_login_page)
            require LIB_DIR.'verify-verification.php';
        
        if(!isset($error)){ 
            $row = mysqliPreparedQuery($con, "SELECT * FROM admin WHERE user=?",'s',array($emailBox));
            if($row !== false) {
                $adminPssword = Trim($row['pass']);
                $adminID =   Trim($row['id']);
                if ($adminPssword == $passwordBox) {
                    $admin_login_page = false;
                    $lock = 'disabled="" ';
                    $msg = successMsgAdmin('Login Successful. Redirect to dashboard page wait...'); 
                    $_SESSION[N_APP.'AdminToken'] = true;
                    $_SESSION[N_APP.'AdminID'] = $adminID;
                    echo '<meta http-equiv="refresh" content="1;url='.$adminBaseURL.'">';
                    $remUserName = $remPassword = $remBox = '';
                } else {
                    $msg = errorMsgAdmin('Password is Wrong. Try Again!');
                }
           } else {
             $msg = errorMsgAdmin('Login Failed. Try Again! ');
           }
       }else{
            $msg = errorMsgAdmin($error);
       }
   }else{
        $msg = errorMsgAdmin('All fields must be filled in!');
   }
}

if($admin_login_page)
    require LIB_DIR.'generate-verification.php';
?>