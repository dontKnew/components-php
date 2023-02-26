<?php
require_once  "vendor/autoload.php";
$httpClient = new \GuzzleHttp\Client();
$response = $httpClient->get('https://books.toscrape.com/');

