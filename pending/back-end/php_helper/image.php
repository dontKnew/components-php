<?php

function imageWithLetter($text, $fontFile, $fontSize, $width, $height, $pathFileName) {
  // Create a blank image
  $image = imagecreatetruecolor($width, $height);

  // Set the background color
  $bgColor = imagecolorallocate($image, 255, 255, 255);
  imagefill($image, 0, 0, $bgColor);

  // Set the text color
  $fgColor = imagecolorallocate($image, 0, 0, 0);

  // Load the font
  $font = imageloadfont($fontFile);

  // Calculate the maximum radius based on the width and height of the image
  $radius = min($width, $height) / 2;

  // Calculate the size of the text
  $textSize = imagettfbbox($fontSize, 0, $fontFile, $text);

  // Calculate the x and y coordinates of the center of the circle
  $x = $width / 2;
  $y = $height / 2;

  // Calculate the x and y offset for the text based on the size of the text
  $xOffset = ($textSize[2] - $textSize[0]) / 2;
  $yOffset = ($textSize[7] - $textSize[1]) / 2;

  // Draw the text on the image
  imagettftext($image, $fontSize, 0, $x - $xOffset, $y - $yOffset, $fgColor, $fontFile, $text);

  // Output the image to the browser
//   header('Content-Type: image/png');

  /*save the image*/
  imagepng($image, $pathFileName.".png");

  imagepng($image);
  imagedestroy($image);
}
createCircleImage("Z", "./font/OpenSans-Bold.ttf", 50, 100, 100, "./image/myfile");
