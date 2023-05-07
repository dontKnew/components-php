<?php

require_once './vendor/autoload.php';

$client = new Google_Client();

// service_account_file.json is the private key that you created for your service account.
$client->setAuthConfig('service_account.json');
$client->addScope('https://www.googleapis.com/auth/indexing');

// Get a Guzzle HTTP Client
$httpClient = $client->authorize();
$endpoint = 'https://indexing.googleapis.com/v3/urlNotifications:publish';

// Define contents here. The structure of the content is described in the next step.
$content = '{
  "url": "https://rapidexworldwide.com/international-courier-service-delhi/el-salvador.php",
  "type": "URL_UPDATED"
}';

$response = $httpClient->post($endpoint, ['body'=>$content]);
$status_code = $response->getStatusCode();


