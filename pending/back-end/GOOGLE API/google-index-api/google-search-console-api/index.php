<?php

// Include the Google API Client Libraries
require_once __DIR__ . '/vendor/autoload.php';

// Set up authentication
$client = new Google_Client();
$client->setApplicationName('Google Search Console API');
$client->setScopes(Google_Service_Webmasters::WEBMASTERS_READONLY);
$client->setAuthConfig('key.json');
$client->setAccessType('offline');

// Load the access token from a JSON file
$accessToken = json_decode(file_get_contents('access_token.json'), true);
$client->setAccessToken($accessToken);

// Check if the access token has expired
if ($client->isAccessTokenExpired()) {
  // Refresh the access token
  $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
  // Save the new access token to a JSON file
  file_put_contents('access_token.json', json_encode($client->getAccessToken()));
}

/*
// Build a service object for the Search Console API
$service = new Google_Service_Webmasters($client);

// Get a list of your website's sitemaps
$response = $service->sitemaps->listSitemaps('http://rapidexworldwide.com/sitemap.xml');
$sitemaps = $response->getSitemap();
foreach ($sitemaps as $sitemap) {
  echo $sitemap['path'];
}

*/