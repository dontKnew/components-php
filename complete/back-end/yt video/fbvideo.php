<?php

function download_facebook_video($url, $path) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $html = curl_exec($ch);
    curl_close($ch);

    if ($html === false) {
        return false;
    }

    preg_match('/hd_src:"([^"]+)"/', $html, $matches);
    if (!isset($matches[1])) {
        preg_match('/sd_src:"([^"]+)"/', $html, $matches);
        if (!isset($matches[1])) {
            return false;
        }
    }

    $url = str_replace('&amp;', '&', $matches[1]);
    $path = realpath($path);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $video = curl_exec($ch);
    curl_close($ch);
    return $video;
//    if ($video === false) {
//        return false;
//    }

//    file_put_contents($path, $video)
}

// Example usage
$url = 'https://www.facebook.com/watch?v=505739268395864';
$path = 'video.mp4';
var_dump(download_facebook_video($url, $path));