<?php

function encryptFile($plaintextFile, $key)
{
    $cipher = "aes-256-cbc"; // AES encryption with CBC mode
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivlen); // Generate a random initialization vector
    $plaintext = file_get_contents($plaintextFile); // Read the plaintext file into a string
    $ciphertext = openssl_encrypt($plaintext, $cipher, $key, OPENSSL_RAW_DATA, $iv); // Encrypt the plaintext
    $encryptedFile = $plaintextFile. ".enc"; // Append any extension to the plaintext file name for the encrypted file
    file_put_contents($encryptedFile, base64_encode($iv . $ciphertext)); // Write the encoded ciphertext and IV to the encrypted file
}

$key = "iloveindia"; // Replace with your own key
$plaintextFile = "key.txt"; // Replace with your own file path
//encryptFile($plaintextFile, $key);

function decryptFile($encryptedFile, $key)
{
    $cipher = "aes-256-cbc"; // AES encryption with CBC mode
    $ivlen = openssl_cipher_iv_length($cipher);
    $encryptedData = file_get_contents($encryptedFile); // Read the encrypted file into a string
    $encryptedData = base64_decode($encryptedData); // Decode the base64-encoded ciphertext and IV string
    $iv = substr($encryptedData, 0, $ivlen); // Extract the IV from the encrypted data
    $ciphertext = substr($encryptedData, $ivlen); // Extract the ciphertext from the encrypted data
    $plaintext = openssl_decrypt($ciphertext, $cipher, $key, OPENSSL_RAW_DATA, $iv); // Decrypt the ciphertext
    $decryptedFile = substr($encryptedFile, 0, -4); // Remove the .enc suffix from the encrypted file name for the decrypted file
    file_put_contents($decryptedFile, $plaintext); // Write the decrypted plaintext to the decrypted file
}


$key = "iloveindia"; 
$encryptedFile = "key.txt.enc"; // Replace with the path file to your encrypted file
decryptFile($encryptedFile, $key);
