<?php
 

// GitHub API configuration 
define('CLIENT_ID', ''); 
define('CLIENT_SECRET',''); 
define('REDIRECT_URL', "http://localhost/PHP/Auth-Providers/github/"); 
 
// Start session 
if(!session_id()){ 
    session_start(); 
} 
 
// Include Github client library 
require_once './github/Github_OAuth_Client.php'; 
 
// Initialize Github OAuth client class 
$gitClient = new Github_OAuth_Client(array( 
    'client_id' => CLIENT_ID, 
    'client_secret' => CLIENT_SECRET, 
    'redirect_uri' => REDIRECT_URL 
)); 
 
// Try to get the access token 
if(isset($_SESSION['access_token'])){ 
    $accessToken = $_SESSION['access_token']; 
}

?>
