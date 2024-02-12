<?php
session_start();
require '../config.php';

use Google\Client;
use Google\Service\Drive;

/**
 * Returns an authorized API client.
 * @return Client the authorized client object
 */

function getClient()
{
    $scopes = [
        'https://www.googleapis.com/auth/drive',
        'https://www.googleapis.com/auth/drive.file',
        'https://www.googleapis.com/auth/drive.readonly',
        'https://www.googleapis.com/auth/drive.metadata.readonly',
        'https://www.googleapis.com/auth/drive.metadata',
        'https://www.googleapis.com/auth/drive.appdata',
    ];
    $client = new Client();
    $client->setApplicationName('Google Drive API PHP Quickstart');
    $client->setAuthConfig(OAUTH_FILE);
    $client->setScopes($scopes);
    $client->setAccessType('offline');
    $client->setPrompt('select_account consent');

    if(!empty($_GET['code'])){
        $accessToken = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        if (array_key_exists('error', $accessToken)) {
            throw new Exception(join(', ', $accessToken));
        }else{
            $_SESSION['access_token'] = $accessToken;
            header("Location: /google-drive");
        }
    }
    if (!empty($_SESSION['access_token']) && !array_key_exists('error', $_SESSION['access_token'])) {
        $accessToken = $_SESSION['access_token'];
        $r = $client->setAccessToken($accessToken);
    }
    try{
        if ($client->isAccessTokenExpired()) {
            if ($client->getRefreshToken()) {
                $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
            } else {
                $authUrl = $client->createAuthUrl();
                    header("Location:$authUrl");
                    exit;
            }
        }
    }
    catch(Exception $e) {
        echo 'Some error occured: '.$e->getMessage();
    }
    return $client;
}

$client = getClient();
$auth = $client->createAuthUrl();
echo "<a href='$auth'>Refresh Auth</a> <br> <br>";

// $driveService = new Drive($client);

echo "<pre>";
print_r(downloadFile("18slUGhHEkSSPBjNrEH44ZbnLByDkpYB8mfHP1PGwebEYrhZoacA"));
echo "</pre>";
exit;


function downloadFile($id)
 {
    global $client;
    try {
      $driveService = new Drive($client);
      $response = $driveService->files->get($id, array(
          'alt' => 'media'));
      $content = $response->getBody()->getContents();
      return $content;

    } catch(Exception $e) {
      echo "Error Message: ".$e;
    }

}

function listAppData()
{
    global $client;
    try {
        $driveService = new Drive($client);
        $response = $driveService->files->listFiles(array(
            'q' => "name = 'WhatsApp'", // Adjust search criteria as needed
            'spaces' => 'appDataFolder',

        ));
        return $response->files;
    }catch(Exception $e) {
        echo "Error Message: ".$e;
    }
   
}

function storeAppFile(){
    global $client;
        $driveService = new Drive($client);
        $fileMetadata = new Drive\DriveFile(array(
            'name' => 'oauth_credentials',
            'parents' => array('appDataFolder')
        ));
        $content = file_get_contents('../oauth.json');

        $file = $driveService->files->create($fileMetadata, array(
            'data' => $content,
            'mimeType' => 'application/json',
            'uploadType' => 'multipart',
            'fields' => 'id, name'));
        printf("File ID: %s\n", $file->id);
        return $file->id;
}