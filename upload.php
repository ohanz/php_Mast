<?php
$target_dir = "uploads/";
// to esure it's writable
if (!is_writable($target_dir)) {
    chmod($target_dir, 0755); // or 0777
}
//checks
if (is_writable($target_dir)) {
    echo "Directory is writable! ";
} else {
    echo "Directory is not writable! ";
}

$target_file = $target_dir . basename($_FILES["document"]["name"]);

if (move_uploaded_file($_FILES["document"]["tmp_name"], $target_file)) {
    echo "Document uploaded successfully!";
} else {
    echo "Error uploading document.";
}
?>