<?php

require_once '../vendor/autoload.php';

use FFMpeg\FFMpeg;
use FFMpeg\Format\Video\X264;

$input_file = 'rtsp://example.com/live/stream';
$output_file = 'rtmp://example.com/live/stream';

// Set the path to the FFmpeg binaries directory
$ffmpeg_path = '/path/to/ffmpeg/bin/';

// Create the FFMpeg object with the path to the binaries
$ffmpeg = FFMpeg::create(array(
    'ffmpeg.binaries' => $ffmpeg_path . 'ffmpeg',
    'ffprobe.binaries' => $ffmpeg_path . 'ffprobe',
    'ffplay.binaries' => $ffmpeg_path . 'ffplay'
));

// Open the input file
$video = $ffmpeg->open($input_file);

// Set the output format and options
$format = new X264('libmp3lame');
$format->setAudioCodec('libmp3lame');
$format->setVideoCodec('libx264');
$format->setAdditionalParameters(array('-preset', 'fast'));
$format->on('progress', function ($video, $format, $percentage) {
    // Display the transcoding progress
    echo "Progress: $percentage %\n";
});

// Create the output file and start streaming
$video->save($format, $output_file);
