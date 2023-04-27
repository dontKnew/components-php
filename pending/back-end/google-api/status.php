<?php

require_once './vendor/autoload.php';

$client = new Google_Client();

// service_account_file.json is the private key that you created for your service account.
$client->setAuthConfig('service_account.json');
$client->addScope('https://www.googleapis.com/auth/indexing');

// Get a Guzzle HTTP Client
$httpClient = $client->authorize();
$url = "https://rapidexworldwide.com/international-courier-service-delhi/afghanistan.php";
$endpoint = 'https://indexing.googleapis.com/v3/urlNotifications/metadata?url='.rawurlencode($url);


$response = $httpClient->get($endpoint);
$payload = $response->getBody()->getContents();
echo "<pre>";
print_r($payload);
echo "</pre>";
$status_code = $response->getStatusCode();


