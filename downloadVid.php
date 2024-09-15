<?php
// Set allowed file extensions
$allowedExtensions = array('mp4', 'avi', 'mov', 'wmv', 'mp3');

// Get the file name from the URL parameter
$file = $_GET['file'];

// Get file extension
$extension = pathinfo($file, PATHINFO_EXTENSION);

// Check if file extension is allowed
if (in_array($extension, $allowedExtensions)) {
    // Set the file path and name
    // $filePath = 'xampp/htdocs/php_Mast/h-videos/' . $file; // or h-audios for MP3s
    // Set the file path and name based on file type
    if ($extension == 'mp3') {
        $filePath = '/xampp/htdocs/php_Mast/h-audios/' . $file;
    } else {
        $filePath = '/xampp/htdocs/php_Mast/h-videos/' . $file;
    }
    // OR
    // if ($extension == 'mp3') {
    //     $filePath = realpath('/xampp/htdocs/php_Mast/h-audios/') . '/' . $file;
    // } else {
    //     $filePath = realpath('/xampp/htdocs/php_Mast/h-videos/') . '/' . $file;
    // }

    echo $filePath;
    echo '<br/>';
    // Check if the file exists
    if (file_exists($filePath)) {
        // Set the headers
        if ($extension == 'mp3') {
            header("Content-Type: audio/mpeg");
        } else {
            header("Content-Type: video/" . $extension);
        }
        header("Content-Disposition: attachment; filename=$file");

        // Output the file content
        readfile($filePath);
        exit;
    } else {
        echo "File not found.";
    }
} else {
    echo "Invalid file type.";
}
?>