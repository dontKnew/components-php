<?php
//https://github.com/norkunas/youtube-dl-php
declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use YoutubeDl\Options;
use YoutubeDl\YoutubeDl;

$yt = new YoutubeDl();

$yt->setBinPath('yt-dlp.exe');
$collection = $yt->download(
    Options::create()
        ->downloadPath('/video/video')
        ->url('https://www.youtube.com/watch?v=sgRhOjyubEQ') // will download also playlist : https://www.youtube.com/watch?v=za1kG2-dvlE&list=RDza1kG2-dvlE&start_radio=1
);

/*
 * Use Ajax to get currently progress
 * $yt->onProgress(static function (?string $progressTarget, string $percentage, string $size, string $speed, string $eta, ?string $totalTime): void {
    echo "Download file: $progressTarget; Percentage: $percentage; Size: $size";
    if ($speed) {
        echo "; Speed: $speed <br>";
    }
    if ($eta) {
        echo "; ETA: $eta <br>";
    }
    if ($totalTime !== null) {
        echo "; Downloaded in: $totalTime <br>";
    }
});*/

foreach ($collection->getVideos() as $video) {
    if ($video->getError() !== null) {
        echo "Error downloading video: {$video->getError()}.";
    } else {
        echo $video->getTitle(); // Will return Phonebloks
        // $video->getFile(); // \SplFileInfo instance of downloaded file
    }
}


