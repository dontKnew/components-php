<?php

$data = array(
    "url"=>"http://localhost:8888/",
);

// Data should be passed as json format
$data_json = json_encode($data);

$url = "https://api.whatsapp.com/v1/webhooks/inbound";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response  = curl_exec($ch);

curl_close($ch);

print_r ($response);

?>