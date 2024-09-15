<?php
// Set allowed file extensions
$allowedExtensions = array('php','pdf', 'docx', 'xlsx', 'pptx', 'zip', 'rar', 'txt', 'mp3', 'mp4', 'avi', 'mov', 'wmv');

// Get the file name from the URL parameter
$file = $_GET['file'];

// Get file extension
$extension = pathinfo($file, PATHINFO_EXTENSION);

// Check if file extension is allowed
if (in_array($extension, $allowedExtensions)) {
    // Set the file path and name
    $filePath = '/xampp/htdocs/php_Mast/' . $file;

    // Check if the file exists
    if (file_exists($filePath)) {
        // Set the headers
        switch ($extension) {
            case 'php':
                header("Content-Type: text/plain");
                break;
            case 'pdf':
                header("Content-Type: application/pdf");
                break;
            case 'docx':
                header("Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");
                break;
            case 'xlsx':
                header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
                break;
            case 'pptx':
                header("Content-Type: application/vnd.openxmlformats-officedocument.presentationml.presentation");
                break;
            case 'zip':
                header("Content-Type: application/zip");
                break;
            case 'rar':
                header("Content-Type: application/x-rar-compressed");
                break;
            case 'txt':
                header("Content-Type: text/plain");
                break;
            case 'mp3':
                header("Content-Type: audio/mpeg");
                break;
            case 'mp4':
                header("Content-Type: video/mp4");
                break;
            case 'avi':
                header("Content-Type: video/x-msvideo");
                break;
            case 'mov':
                header("Content-Type: video/quicktime");
                break;
            case 'wmv':
                header("Content-Type: video/x-ms-wmv");
                break;
            default:
                header("Content-Type: application/octet-stream");
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
