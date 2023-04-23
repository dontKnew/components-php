<?php

/*
 * To download audio from yt video, required an ffmpeg or avconv and ffprobe or avprobe*/

declare(strict_types=1);
require __DIR__ . '/vendor/autoload.php';

use YoutubeDl\Options;
use YoutubeDl\YoutubeDl;

$yt = new YoutubeDl();
$yt->setBinPath('yt-dlp.exe');
$collection = $yt->download(
    Options::create()
        ->downloadPath('/audio')
        ->extractAudio(true)
        ->audioFormat('mp3')
        ->audioQuality('0') // best
        ->output('%(title)s.%(ext)s')
        ->url('https://www.youtube.com/watch?v=jD-PPbSqi3c')
);
foreach ($collection->getVideos() as $video) {
    if ($video->getError() !== null) {
        echo "Error downloading video: {$video->getError()}.";
    } else {
        $video->getFile(); // audio file
    }
}