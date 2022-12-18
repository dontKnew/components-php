<?php

/*
 * @author Balaji
 * @name: A to Z SEO Tools - PHP Script
 * @copyright © 2018 ProThemes.Biz
 *
 */
 
function getSiteSnap($site,$item_purchase_code){

$image_url = "http://screen2.prothemes.biz/api2/ss.php?site=$site";

if (file_exists(HEL_DIR."site_snapshot/$site.jpg")){
    $myimage = HEL_DIR."site_snapshot/$site.jpg";
}else{
    $linkToSS = strrev(MY_API_DOMAIN);
    $name = HEL_DIR."site_snapshot/$site.jpg";
    $imgSrc = simpleCurlGET('http://'.$linkToSS.'/atoz_screen.php?site='.$site.'&domain='.$_SERVER['HTTP_HOST'].'&code='.$item_purchase_code.'&link='.createLink('',true));
    $myFile = $name;
    $fh = fopen($myFile, 'w') or die("Can't open file");
    $stringData = $imgSrc;
    fwrite($fh, $stringData);
    fclose($fh);
    $ssimage = imagecreatefromjpeg($myFile);

    if ($imgSrc == ''){
        unlink($name);
        $myimage = HEL_DIR."site_snapshot/no-preview.png";
    } else {
        $myimage = HEL_DIR."site_snapshot/$site.jpg";
        $name = $myimage;
        $thumb_width = 600;
        $thumb_height = 450;

        $width = imagesx($ssimage);
        $height = imagesy($ssimage);

        $original_aspect = $width / $height;
        $thumb_aspect = $thumb_width / $thumb_height;

        if ($original_aspect >= $thumb_aspect){
            // If image is wider than thumbnail (in aspect ratio sense)
            $new_height = $thumb_height;
            $new_width = $width / ($height / $thumb_height);
        } else {
            // If the thumbnail is wider than the image
            $new_width = $thumb_width;
            $new_height = $height / ($width / $thumb_width);
        }

        $thumb = imagecreatetruecolor($thumb_width, $thumb_height);

        $co = imagecolorallocate($thumb, 241, 241, 241);
        imagefill($thumb, 0, 0, $co);
        $text_color = imagecolorallocate($thumb, 153, 153, 153);
        imagestring($thumb, 200, 400, 300, 'No Preview Available', $text_color);

        // Resize and crop
        imagecopyresampled($thumb, $ssimage, 0,
            //- ($new_width - $thumb_width) / 2, // Center the image horizontally
            0, // - ($new_height - $thumb_height) / 2, // Center the image vertically
            0, 0, $new_width, $new_height, $width, $height);
        
        
        imagejpeg($thumb, $myimage, 80);

        if (filesize($name) == 0){
            unlink($name);
            $myimage = HEL_DIR."site_snapshot/no-preview.png";
        } elseif (filesize($name) <= 4){
            unlink($name);
            $myimage = HEL_DIR."site_snapshot/no-preview.png";
        } else {
            $myimage = HEL_DIR."site_snapshot/$site.jpg";
        }
    }
}
return $myimage;
}
 
?>