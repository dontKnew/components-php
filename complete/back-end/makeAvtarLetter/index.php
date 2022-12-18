<?php

    // $path = "".__DIR__ . "image/thor.jpg"';
    $image = imagecreate(200, 200);
    $red = rand(0, 255);
    $green = rand(0, 255);
    $blue = rand(0, 255);
    imagecolorallocate($image, $red, $green, $blue);
    $textcolor = imagecolorallocate($image, 255, 255, 255);

    $font = __DIR__ . 'image/font/arial.ttf';
    imagettftext($image, 100, 0, 55, 150, $textcolor, $font, "sajid");
    imagepng($image, $path);
    imagedestroy($image);

?>