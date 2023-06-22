<?php

// Path to the input video file
$inputFile = 'video.mkv';

// Path to the output video file
$outputFile = 'video_noisereduced.mkv';

// FFmpeg command to perform video noise reduction
//$ffmpegCommand = "ffmpeg -i $inputFile -c:v libx264 -c:a copy -vf 'noise=alls=20:allf=t+u' -y $outputFile";
//$ffmpegCommand = "ffmpeg -i $inputFile -c:v libx264 -c:a copy -vf 'nlmeans=s=2:h=5' -y $outputFile";
$ffmpegCommand = "ffmpeg -i $inputFile -c:v libx264 -c:a copy -filter_complex 'hqdn3d=3:3:6:6' -y $outputFile";




// Execute the FFmpeg command
exec($ffmpegCommand, $output, $returnCode);

// Check if the command was executed successfully
if ($returnCode === 0) {
    echo 'Video noise reduction completed successfully.';
} else {
    echo 'Error occurred during video noise reduction.';
}

?>
