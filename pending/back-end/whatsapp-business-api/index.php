<?php

// Require the Composer autoloader.
require 'vendor/autoload.php';
use Netflie\WhatsAppCloudApi\WhatsAppCloudApi;
use Netflie\WhatsAppCloudApi\Message\Media\LinkID;


// Instantiate the WhatsAppCloudApi super class.
$whatsapp_cloud_api = new WhatsAppCloudApi([
    'from_phone_number_id' => '111588701765023',
    'access_token' => 'EAAJD1IZBZA8tkBAJcYWI7kSyZBtOwDnsM08Y4GhDJ5U3Ypc3rmCS6J2Lp82kmHfeBwHhtdlIgUBIMxcbfgoeHp1UL3zem0olHV4Wk0fZBX2ysUPl849DbB1ra5A5OnvGZCfDpqUC8itHkqeZAbtQ4gHlVRZBMaQcl4RfB4QWXuV0zURDFitEAwVU5hgZBhltSDzgiN0LZAvJUZBOlydI2ftD36I7UGLZAEzGzEZD',
]);

try {
    //$response =  $whatsapp_cloud_api->sendTemplate('916205881326', 'hello_world', 'en_US'); // Language is optional
    //$response = $whatsapp_cloud_api->sendTextMessage('916205881326', 'Normal Message sending here');
    $audio_link = 'https://netflie.es/wp-content/uploads/2022/05/file_example_OOG_1MG.ogg';
    $link_id = new LinkID($audio_link);
    $response = $whatsapp_cloud_api->sendAudio('916205881326', $link_id);
    echo "<pre>";
    print_r($response); // You can still check the Response returned from Meta servers
    echo "</pre>";
} catch (\Netflie\WhatsAppCloudApi\Response\ResponseException $e) {
	     echo "<pre>";
	    print_r($e->response()); // You can still check the Response returned from Meta servers
	echo "</pre>";
}

