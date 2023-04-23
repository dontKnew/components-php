<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use YoutubeDl\Options;
use YoutubeDl\YoutubeDl;

$yt = new YoutubeDl();
$yt->setBinPath('yt-dlp.exe');
$collection = $yt->download(
    Options::create()
        ->downloadPath('/audio')
        ->url('https://www.youtube.com/watch?v=jD-PPbSqi3c')
        ->extractAudio(true)
        ->audioFormat('mp3')
);

foreach ($collection->getVideos() as $video) {
    if ($video->getError() !== null) {
        echo "Error downloading video: {$video->getError()}.";
    } else {
        echo $video->getTitle(); // Will return Phonebloks
        // $video->getFile(); // \SplFileInfo instance of downloaded file
    }
}
