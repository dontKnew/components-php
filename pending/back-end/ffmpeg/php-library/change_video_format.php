<?php

require_once 'vendor/autoload.php';
use FFMpeg\FFMpeg;
use FFMpeg\Format\Video\X264;

$input_file = 'input/video.mp4';
$output_file = 'output/video.avi';

// Set the path to the FFmpeg binaries directory if you dont setup system environment variables
$ffmpeg = FFMpeg::create(array(
    'ffmpeg.binaries' =>  __DIR__.'/../ffmpeg-exe/ffmpeg.exe',
    'ffprobe.binaries' =>  __DIR__.'/../ffmpeg-exe/ffprobe.exe',
    'ffplay.binaries' => __DIR__.'/../ffmpeg-exe/ffplay.exe'
));

$video = $ffmpeg->open($input_file);
$format = new X264('libmp3lame');
$format->setAudioCodec('libmp3lame');
$format->setVideoCodec('libx264');
$format->setAdditionalParameters(array('-preset', 'fast'));
$video->save($format, $output_file);

echo 'Video conversion completed.';

?>
