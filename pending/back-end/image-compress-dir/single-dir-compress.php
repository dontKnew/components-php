<?php

// Define the path to the directory
$dir = './image/hiremyescort';

// Recursively scan the directory for image files
$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($dir),
    RecursiveIteratorIterator::SELF_FIRST
);

foreach ($files as $file) {
    if (in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png'])) {
        $compressedImage = compressImage($file);
        file_put_contents($file, $compressedImage);
    }
}

// Function to compress an image
function compressImage($image) {
    if(isset($image)){
        $type = exif_imagetype($image);
        if ($type == IMAGETYPE_JPEG) {
            $image = imagecreatefromjpeg($image);
        } elseif ($type == IMAGETYPE_PNG) {
            $image = imagecreatefrompng($image);
        } else {
            return false;
        }

        ob_start();
        imagejpeg($image, null, 50);
        $compressedImage = ob_get_clean();
        imagedestroy($image);

        return $compressedImage;
    }
}

?>


