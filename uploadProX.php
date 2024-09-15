<?php
// Upload handling logic...

// Include decryption logic
require_once 'decrypt.php';

$allowedExtensions = array('pdf', 'docx');
$maxFileSize = 5 * 1024 * 1024; // 5MB
$uploadDir = 'uploadsPX/';
$encryptionKey = 'your_secret_key'; // Keep this secret!

if (!empty($_FILES['document']['name']) && isset($_FILES['document'])) {
    $file = $_FILES['document'];
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);

    // Validate file type and size
    if (!in_array($extension, $allowedExtensions) || $file['size'] > $maxFileSize) {
        echo "Invalid file type or size.";
        exit;
    }

    // Sanitize file name
    $sanitizedFileName = preg_replace('/[^a-zA-Z0-9-_\.]/', '', $file['name']);
    $sanitizedFileName = time() . '_' . $sanitizedFileName;

    // Encrypt file contents
    // $encryptedFileContents = openssl_encrypt(file_get_contents($file['tmp_name']), 'AES-256-CBC', $encryptionKey, 0, 'your_initialization_vector'); // Keep the initialization vector secret!

    // // Write encrypted contents to file
    // file_put_contents($uploadDir . $sanitizedFileName, $encryptedFileContents);
    $initializationVector = openssl_random_pseudo_bytes(16);
$encryptedFileContents = openssl_encrypt(file_get_contents($file['tmp_name']), 'AES-256-CBC', $encryptionKey, 0, $initializationVector);
file_put_contents($uploadDir . $sanitizedFileName, $encryptedFileContents);

    echo "File uploaded and encrypted successfully!";
} else {
    echo "Please select a document to upload.";
    exit;
}


// Set encryption key and initialization vector
$encryptionKey = 'your_secret_key';
// $initializationVector = 'your_initialization_vector';

// Upload file logic...
$uploadedFilePath = 'uploads/' . $sanitizedFileName;

// Decrypt uploaded file
// try {
//     $decryptedContents = decryptFile($uploadedFilePath, $encryptionKey, $initializationVector);
//     echo "File decrypted successfully!";
// } catch (Exception $e) {
//     echo "Error decrypting file: " . $e->getMessage();
// }

$decryptedContents = '';
try {
    $decryptedContents = decryptFile($uploadDir . $sanitizedFileName, $encryptionKey, $initializationVector);
    echo " Status(2): File now decrypted successfully!";
} catch (Exception $e) {
    echo "Error decrypting file: " . $e->getMessage();
}

// try {
//     $decryptedContents = decryptFile($uploadDir . $sanitizedFileName, $encryptionKey, $initializationVector);
//     echo "File decrypted successfully!";
// } catch (Exception $e) {
//     echo "Error decrypting file: " . $e->getMessage();
// }

// Save decrypted contents to a new file (optional)
$decryptedFilePath = 'decrypted_' . $sanitizedFileName;
file_put_contents($decryptedFilePath, $decryptedContents);

?>
