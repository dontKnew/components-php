<?php

// Set the encryption key
$key = 'nevergiveup';

// Open the directory containing the files to be encrypted
$dir = opendir('./myproject/');

// Loop through each file in the directory
while (($file = readdir($dir)) !== false) {
  // Skip the current and parent directories
  if ($file == '.' || $file == '..') continue;

  // Read the contents of the file into a string
  $contents = file_get_contents('/path/to/folder/' . $file);

  // Encrypt the contents of the file using openssl_encrypt
  $encrypted = openssl_encrypt($contents, 'aes-256-cbc', $key);

  // Save the encrypted contents back to the file
  file_put_contents('./myproject/' . $file, $encrypted);
}

// Close the directory
closedir($dir);

