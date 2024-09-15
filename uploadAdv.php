<!-- Advance -->
<?php
$allowedExtensions = array('pdf', 'docx');
$maxFileSize = 5 * 1024 * 1024; // 5MB
$uploadDir = 'uploadsADV/';

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

	// Move uploaded file to destination
	if (move_uploaded_file($file['tmp_name'], $uploadDir . $sanitizedFileName)) {
		echo "File uploaded successfully!";
	} else {
		echo "Error uploading file.";
	}
} else {
	echo "No file selected.";
}
?>