<?php

use Google\Client;
use Google\Service\Drive;
function uploadAppData()
{
   try {
    $client = new Client();
    $client->useApplicationDefaultCredentials();
    $client->addScope(Drive::DRIVE);
    $client->addScope(Drive::DRIVE_APPDATA);
    $driveService = new Drive($client);
    $fileMetadata = new Drive\DriveFile(array(
        'name' => 'config.json',
        'parents' => array('appDataFolder')
    ));
    $content = file_get_contents('config.json');
    $file = $driveService->files->create($fileMetadata, array(
        'data' => $content,
        'mimeType' => 'application/json',
        'uploadType' => 'multipart',
        'fields' => 'id'));
    printf("File ID: %s\n", $file->id);
    return $file->id;

   } catch(Exception $e) {
     echo "Error Message: ".$e;
   }  
}