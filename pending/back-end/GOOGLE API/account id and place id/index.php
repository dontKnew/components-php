<?php

// Set the API endpoint for your business
$api_endpoint = "https://mybusiness.googleapis.com/v4/accounts";

// Set the OAuth 2.0 access token for authentication
$access_token = "your_access_token";

// Set the request headers
$headers = array(
    "Authorization: Bearer $access_token",
    "Content-Type: application/json"
);

// Set the cURL options
$options = array(
    CURLOPT_URL => $api_endpoint,
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_RETURNTRANSFER => true
);

// Initialize the cURL session
$curl = curl_init();

// Set the cURL options for the session
curl_setopt_array($curl, $options);

// Execute the cURL request
$response = curl_exec($curl);

// Check the status code of the response
$status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
if ($status_code == 200) {
    // If the request was successful, print the account ID and place ID
    $accounts = json_decode($response)->accounts;
    foreach ($accounts as $account) {
        echo "Account ID: " . explode("/", $account->name)[-1] . "\n";
        foreach ($account->locations as $location) {
            echo "Place ID: " . explode("/", $location->name)[-1] . "\n";
        }
    }
} else {
    // If the request was unsuccessful, print the error message
    print($response);
}

// Close the cURL session
curl_close($curl);
