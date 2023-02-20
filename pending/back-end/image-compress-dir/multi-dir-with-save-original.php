<?php

// Define the path to the directory
$dir = './image/Oxford Shoes';

// Define the path to the new directory to move the original images
$newDir = './image/Oxford Shoes/originals';

// Recursively scan the directory for image files
$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($dir),
    RecursiveIteratorIterator::SELF_FIRST
);

// Loop through each file
foreach ($files as $file) {

    // Check if the file is an image
    if (in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png'])) {
        // Get the file path and name
        $filePath = $file->getPathname();
        $fileName = $file->getFilename();

        // Move the original image to the new directory
        if (!file_exists($newDir)) {
            mkdir($newDir, 0777, true);
        }
        $newFilePath = $newDir . '/' . $fileName;
        rename($filePath, $newFilePath);

        // Compress the image
        $compressedImage = compressImage($newFilePath);

        // Save the compressed image back to the original file
        file_put_contents($filePath, $compressedImage);
    }
}
// Function to compress an image
function compressImage($filePath) {
    // Get the image type
    $type = exif_imagetype($filePath);

    // Create an image resource
    if ($type == IMAGETYPE_JPEG) {
        $image = imagecreatefromjpeg($filePath);
    } elseif ($type == IMAGETYPE_PNG) {
        $image = imagecreatefrompng($filePath);
    } else {
        return false;
    }

    // Compress the image
    ob_start();
    imagejpeg($image, null, 80);
    $compressedImage = ob_get_clean();

    // Free up memory
    imagedestroy($image);

    // Return the compressed image
    return $compressedImage;
}