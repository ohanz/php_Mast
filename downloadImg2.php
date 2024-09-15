<?php
// Set allowed file extensions
$allowedExtensions = array('png', 'jpg', 'jpeg', 'gif');

// Get the file name from the URL parameter
$file = $_GET['file'];

// Get file extension
$extension = pathinfo($file, PATHINFO_EXTENSION);

// Check if file extension is allowed
if (in_array($extension, $allowedExtensions)) {
    // Set the file path and name
    $filePath = '/xampp/htdocs/php_Mast/h-images/' . $file;

    // Check if the file exists
    if (file_exists($filePath)) {
        // Set the headers
        header("Content-Type: application/octet-stream");
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