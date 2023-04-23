<?php
/*cmd :  php run.php */
$ffmpegPath = __DIR__ . '/../ffmpeg-exe/ffmpeg.exe';
$inputFile = 'video.mp4';
$outputFile = 'outout_video.wav';

// your ffmpeg command
/* 1. Convert video to another format : ffmpeg -i input_file.mp4 -codec copy output_file.avi
 Or ffmpeg -i input_file.mp4 -codec:v libx264 -crf 23 -preset veryfast output_file.mp4 */
//$command = "$ffmpegPath -i $inputFile -codec:v libx264 -crf 23 -preset veryfast $outputFile";

/* 2. Extract The audio : ffmpeg -i input_file.mp4 -vn -ar 44100 -ac 2 -ab 192k output_file.mp3 */
//$command = "$ffmpegPath -i $inputFile -vn -ar 44100 -ac 2 -ab 192k $outputFile";

/*3. Extrac Iframes/images from video : ffmpeg -i input.mp4 -vf "select=eq(pict_type\,I)" -vsync vfr -q:v 2 frames_%03d.jpg*/
//$command = "$ffmpegPath -i $inputFile -vf \"select=eq(pict_type\,I)\" -vsync vfr -q:v 2 image/frames_%03d.jpg";

/*4. Extract audio from video and convert to mp3 : ffmpeg -i input.mp4 -vn -acodec libmp3lame -ac 2 -ab 192k -ar 44100 output.mp3*/

/*5. Convert Audio Format to Another Format : ffmpeg -i input.wav -c:a aac -b:a 128k output.aac*/
//$command = "$ffmpegPath -i $inputFile -c:a aac -b:a 128k $outputFile";

exec($command, $output, $returnCode);
if ($returnCode != 0) {
    echo 'Failed to convert video.';
} else {
    echo 'Video converted successfully.';
}
