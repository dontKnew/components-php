<?php
// include your composer dependencies
require_once 'vendor/autoload.php';
try {
    $client = new Google\Client();
    $ok = $client->setAuthConfig('./google-api-review.json');
    $client->addScope(Google\Service\Drive::DRIVE);
    $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
    $check = $client->setRedirectUri($redirect_uri);
    var_dump($ok);
} catch (Exception $e) {
    echo $e->getMessage();
}