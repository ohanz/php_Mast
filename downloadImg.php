<?php
// Get the file name from the URL parameter
$file = $_GET['sm.png'];

// Set the file path and name
// $filePath = 'path/to/files/' . $file;
// htdocs\php_Mast\h-images
$filePath = 'C:\xampp\htdocs\php_Mast\h-images' . $file;

// Check if the file exists
if (file_exists($filePath)) {
  // Set the headers
  header("Content-Type: image/png");
  header("Content-Disposition: attachment; filename='$file'");

  // Output the file content
  readfile($filePath);
  exit;
} else {
  echo "File not found.";
}
?>