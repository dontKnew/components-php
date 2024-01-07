<?php

/* Encryption Video */
$inputFile = 'blog.mp4';
$outputFile = 'encrypted/video.enc';

// encryption video
// $iv = openssl_random_pseudo_bytes(16);

// $encryptionKey = openssl_random_pseudo_bytes(32);
// $encryptedData = openssl_encrypt(file_get_contents($inputFile), 'aes-256-cbc', $encryptionKey, 0, $iv);

// file_put_contents($outputFile, $iv . $encryptedData);
// file_put_contents('key.txt', base64_encode($encryptionKey));


/* decryption video*/
$videoFile = 'encrypted/video.enc';
$decryptedFile = 'decrypted/video.mp4';

$encryptionKey = base64_decode(file_get_contents('key.txt'));
$encryptedData = file_get_contents($videoFile);
$iv = substr($encryptedData, 0, 16);
$encryptedData = substr($encryptedData, 16);

$decryptedData = openssl_decrypt($encryptedData, 'aes-256-cbc', $encryptionKey, 0, $iv);

// 1. save decrypted video file
//file_put_contents($decryptedFile, $decryptedData);

// 2. video page header...
// header('Content-Type: video/mp4');
//echo $decryptedData;

// 3. display in browser as video tag
//echo "<video controls><source src='data:video/mp4;base64," . base64_encode($decryptedData) . "'></video>";