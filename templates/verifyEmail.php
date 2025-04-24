<?php

require_once 'config/db_connect.php';

$token = $_GET['token'] ?? '';

if ($token) {
    $stmt = $conn->prepare("UPDATE users SET email_verified = 1, verification_token = NULL WHERE verification_token = :token");
    $stmt->execute([':token' => $token]);

    echo $stmt->rowCount() > 0 ? "Email verified successfully. You can now log in." : "Invalid or expired verification link.";
} else {
    echo "No token provided.";
}
?>