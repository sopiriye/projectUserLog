<?php
// reset_password.php
require 'config/config.php';

$token = $_GET['token'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newPass = $_POST['password'];
    $confirmNewPass = $_POST['confirm_password'];
    // $token = $_POST['token'];


    if (empty($newPass) || empty($confirmNewPass)) {
        echo "All fields are required.";
        exit;
    }

    if (strlen($newPass) < 6 || strlen($confirmNewPass) < 6) {
        echo "Password must be at least 6 characters.";
        exit;
    }

    if ($newPass!=$confirmNewPass){
        echo "password not the same in the fields";
    }


    $hashed = password_hash($newPass, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("UPDATE users SET password = :pass WHERE verification_token = :token");
    $stmt->execute([':pass' => $hashed, ':token' => $token]);

    echo "Password reset successful.";
}
?>