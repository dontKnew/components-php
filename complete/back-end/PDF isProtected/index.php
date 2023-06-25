<?php

function isPDFLocked($file) {
    if (!file_exists($file)) {
        return 'File not found';
    }
    $extension = pathinfo($file, PATHINFO_EXTENSION);
    if (strtolower($extension) !== 'pdf') {
        return 'Please upload a PDF file';
    }

    $contents = file_get_contents($file);
    if (stristr($contents, "/Encrypt")) {
        return "PDF is locked";
    }else {
        return 'Pdf is not locked';
    }
}

echo isPDFLocked('my_locked_file.pdf')

?>