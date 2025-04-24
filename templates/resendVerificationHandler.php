<?php
// resend_verification.php
require 'config/config.php';
require 'config/mailer.php';
require 'config/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);

    $stmt = $conn->prepare("SELECT verification_token, is_verified FROM users WHERE email = :email");
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && !$user['is_verified']) {
        $verifyLink = getenv('APP_URL').getenv('APP_NAME')."/verify_email.php?token=" . $user['verification_token'];
        $subject = "Resend Email Verification";
        $message = "Click the link to verify your email: $verifyLink";
        sendEmail($email, $subject, $message);
        echo "Verification email sent.";
    } else {
        echo "Email is either verified already or doesn't exist.";
    }
}
?>