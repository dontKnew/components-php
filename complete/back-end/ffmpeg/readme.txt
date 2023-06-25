Download Link for window 64bit- 
https://www.gyan.dev/ffmpeg/builds/packages/ffmpeg-2023-03-05-git-912ac82a3c-full_build.7z

What can you do with ffmpeg ?
     - Change the  format of a video/audio file
     - Extract audio from video file
     - Merge audio and video streams
     - Change the bitrate of a video/audio file
     - Create GIF from a video file
     - Extract still images from a video file
     - To embed subtitles into a video file
     - To compress or resize a video/audio file
     - Record a live stream


=> Setups
    ffmpeg directory path add to the system path variable to access anywhere in the system. :)

= You directly use the command line to use ffmpeg.
    1.  Convert video to any  format
        ffmpeg -i video_name.exetension_name -codec copy output_video_name.exetension_name
    2. Extract audio from video file
        ffmpeg -i video_name.exetension_name -codec copy output_audio_name.exetension_name
    3. Merge audio and video streams
        ffmpeg -i video_name.exetension_name -i audio_name.exetension_name -codec copy output_video_name.exetension_name
    4. Change the bitrate of a video/audio file
        ffmpeg -i video_name.exetension_name -b:v 1000k output_video_name.exetension_name
    5. Create GIF from a video file
        ffmpeg -i video_name.exetension_name -vf fps=10,scale=320:-1:flags=lanczos,palettegen palette.png
        ffmpeg -i video_name.exetension_name -i palette.png -filter_complex "fps=10,scale=320:-1:flags=lanczos[x];[x][1:v]paletteuse" output_gif_name.exetension_name


