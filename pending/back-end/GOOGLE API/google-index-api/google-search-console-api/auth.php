<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the Google API Client Libraries
require_once './vendor/autoload.php';

// Set up the OAuth 2.0 client
$client = new Google_Client();
$client->setApplicationName('Google Search Console API');
$client->setScopes(Google_Service_Webmasters::WEBMASTERS_READONLY);
$client->setAuthConfig('key.json');
$client->setAccessType('offline');

// Check if the access token is already available
if (file_exists('access_token.json')) {
    // Load the access token from a JSON file
    $accessToken = json_decode(file_get_contents('access_token.json'), true);
    $client->setAccessToken($accessToken);
}

// Check if the access token has expired
if ($client->isAccessTokenExpired()) {
    // Check if there is a refresh token available
    if ($client->getRefreshToken()) {
        // Refresh the access token
        $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
        // Save the new access token to a JSON file
        file_put_contents('access_token.json', json_encode($client->getAccessToken()));
    } else {
        // Prompt the user to log in and grant access
        $authUrl = $client->createAuthUrl();
        printf("Open the following link in your browser:\n%s\n", $authUrl);
        print('Enter verification code: ');
//        $authCode = trim(fgets(STDIN));
            $authCode = readline();
        // Exchange the authorization code for an access token
        $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
        $client->setAccessToken($accessToken);
        // Save the access token and refresh token to a JSON file
        $tokens = $client->getAccessToken();
        $tokens['refresh_token'] = $client->getRefreshToken();
        file_put_contents('access_token.json', json_encode($tokens));
    }
}

// Check if the access token is available
if (!$client->getAccessToken()) {
    throw new Exception('Access token not available');
}