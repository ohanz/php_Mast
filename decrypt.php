<!-- Note: 
   ---Note:
   ---Note: 
       This file should be placed be on the server-side and not client-side for security purposes -->
<?php
// function decryptFile($filePath, $encryptionKey, $initializationVector) {
//     // Check if file exists
//     if (!file_exists($filePath)) {
//         throw new Exception("File not found: $filePath");
//     }

//     // Read encrypted file contents
//     $encryptedFileContents = file_get_contents($filePath);

//     // Decrypt file contents
//     $decryptedFileContents = openssl_decrypt(
//         $encryptedFileContents,
//         'AES-256-CBC',
//         $encryptionKey,
//         0,
//         $initializationVector
//     );

//     // Return decrypted contents
//     return $decryptedFileContents;
// }
function decryptFile($filePath, $encryptionKey, $initializationVector) {
    if (!file_exists($filePath)) {
        throw new Exception("File not found: $filePath");
    }
    $encryptedFileContents = file_get_contents($filePath);
    if (strlen($initializationVector) !== 16) {
        throw new Exception("IV must be 16 bytes long");
    }
    $decryptedFileContents = openssl_decrypt($encryptedFileContents, 'AES-256-CBC', $encryptionKey, 0, $initializationVector);
    return $decryptedFileContents;
    // $encryptedFileContents = file_get_contents($filePath);
    // $decryptedFileContents = openssl_decrypt($encryptedFileContents, 'AES-256-CBC', $encryptionKey, 0, $initializationVector);
    // return $decryptedFileContents;
}

?>