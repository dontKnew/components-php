<?php

require_once './vendor/autoload.php';

// Read URLs from CSV file
$urls = array();
if (($handle = fopen("not_index3.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $urls[] = $data[0];
    }
    fclose($handle);
} 
exit;
// Define contents here. The structure of the content is described in the next step.
$ok_responses = array();
$other_responses = array();
foreach ($urls as $url) {
        
    $client = new Google_Client();
    
    // service_account_file.json is the private key that you created for your service account.
    $client->setAuthConfig('service_account.json');
    $client->addScope('https://www.googleapis.com/auth/indexing');
    
    // Get a Guzzle HTTP Client
    $httpClient = $client->authorize();
    $endpoint = 'https://indexing.googleapis.com/v3/urlNotifications:publish';
    
    $content = json_encode(array("url" => $url, "type" => "URL_UPDATED"));

    $response = $httpClient->post($endpoint, ['body' => $content]);
    $status_code = $response->getStatusCode();

    // Store response and URL for checking and printing later
    $decoded_response = json_decode($response->getBody(), true);
    if ($status_code == 200) {
        $ok_responses[] = array("url" => $url, "response" => $decoded_response);
    } else {
        $other_responses[] = array("url" => $url, "response" => $decoded_response);
    }
}

// Display all responses
echo "200 OK Responses: <br>";
foreach ($ok_responses as $response) {
    echo "Response: " . json_encode($response['response']) . "<br>";
}

echo "<br> <br> Other Responses: <br>";
foreach ($other_responses as $response) {
    echo "URL: " . $response['url'] . " | Response: " . json_encode($response['response']) . "<br>";
}
