<?php

// Google API configuration
define('GOOGLE_CLIENT_ID', '-');
define('GOOGLE_CLIENT_SECRET', '-');
define('GOOGLE_REDIRECT_URL', 'http://localhost/PHP/authgoogle/');

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId(GOOGLE_CLIENT_ID);

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret(GOOGLE_CLIENT_SECRET);

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri(GOOGLE_REDIRECT_URL);

$google_client->addScope('email');
$google_client->addScope('profile');

session_start();
?>