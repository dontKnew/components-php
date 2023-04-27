<?php
function copyFolder($source, $destination)
{
    // Check if source is a folder
    if (is_dir($source)) {
        // Create destination folder if it doesn't exist
        if (!file_exists($destination)) {
            mkdir($destination, 0755, true);
        }

        // Copy all files and folders recursively
        $files = scandir($source);
        foreach ($files as $file) {
            if ($file != "." && $file != "..") {
                if (is_dir($source . '/' . $file)) {
                    copyFolder($source . '/' . $file, $destination . '/' . $file);
                } else {
                    copy($source . '/' . $file, $destination . '/' . $file);
                    chmod($destination . '/' . $file, fileperms($source . '/' . $file));
                }
            }
        }
    } else {
        // Copy single file and set permissions
        copy($source, $destination);
        chmod($destination, fileperms($source));
    }
}

