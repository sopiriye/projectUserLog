<?php
// reset_password_request.php
require 'config/db_connect.php';
require 'config/mailer.php';
require 'config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $verification_token = bin2hex(random_bytes(16));

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }
    

    $checkStmt = $conn->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
    $checkStmt->execute([':email' => $email]);
    $user = $checkStmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo "Email not found. Please check and try again.";
        exit;
    }


    $stmt = $conn->prepare("UPDATE users SET verification_token = :token WHERE email = :email");
    $stmt->execute([':token' => $verification_token, ':email' => $email]);


    $template = file_get_contents(__DIR__ . '/includes/emailVerificationTemplate.html');
    $resetLink = getenv('APP_URL').getenv('APP_NAME')."/templates/resetPassword.php?token=$verification_token";
    $subject = "Reset Your Password";


    $replacements = [
    'https://yourdomain.com/' => $resetLink,
    'Verify Email' => 'Reset Password',
    'If you did not create this account' => 'If you did not reset password'
        ];

    $message = str_replace(array_keys($replacements), array_values($replacements), $template);

    if (sendEmail($email, $subject, $message)) {
    echo "Password reset link sent if email exists.";
    } else {
    echo "Password Reset failed. Retry!!!.";
    }


}
?>