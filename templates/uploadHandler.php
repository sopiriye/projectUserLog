<?php
// upload_handler.php - File upload logic
session_start();
require_once 'config/db_connect.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    exit("Access denied.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['document'])) {
    $uploadDir = 'uploads/';
    $filename = basename($_FILES['document']['name']);
    $targetFile = $uploadDir . $filename;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    if ($_FILES['document']['size'] > 2000000) {
        echo "File is too large. Max size is 2MB.";
        exit;
    }

    $allowedTypes = ['pdf', 'doc', 'docx', 'txt'];
    if (!in_array($fileType, $allowedTypes)) {
        echo "Only PDF, DOC, DOCX, and TXT files are allowed.";
        exit;
    }

    if (move_uploaded_file($_FILES['document']['tmp_name'], $targetFile)) {
        echo "File uploaded successfully!";

        // Save upload info to DB
        $stmt = $conn->prepare("INSERT INTO uploads (user_id, file_name, uploaded_at, file_path) VALUES (:user_id, :filename, NOW(), :filepath)");
        $stmt->execute([
            ':user_id' => $_SESSION['user_id'],
            ':filename' => $filename,
            ':filepath' => $targetFile
        ]);
    } else {
        echo "Error uploading file.";
    }
} else {
    echo "No file selected.";
}
?>