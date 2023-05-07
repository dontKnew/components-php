<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$response = pdfshift(array (
    'source' => 'https://rapidexworldwide.in',
    'sandbox' => true
));

header('Content-Type: application/pdf');
function pdfshift($params, $apiKey="") {
    $curl = curl_init();

    curl_setopt_array ($curl, array (
        CURLOPT_URL => "https://api.pdfshift.io/v3/convert/pdf",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($params),
        CURLOPT_HTTPHEADER => array ('Content-Type:application/json'),
        CURLOPT_USERPWD => 'api:'.$apiKey
    ));

    $response = curl_exec($curl);
    $error = curl_error($curl);
    $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);

    if (!empty($error)) {
        throw new Exception($error);
    } elseif ($statusCode >= 400) {
        $body = json_decode($response, true);
        if (isset($body['error'])) {
            throw new Exception($body['error']);
        } else {
            throw new Exception($response);
        }
    }

    return $response;
}