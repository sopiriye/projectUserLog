<?php
// reset_password_request.php
require 'config/config.php';
require 'config/mailer.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $token = bin2hex(random_bytes(16));

    $stmt = $conn->prepare("UPDATE users SET reset_token = :token WHERE email = :email");
    $stmt->execute([':token' => $token, ':email' => $email]);

    $resetLink = "http://localhost/projectUserLog/reset_password.php?token=$token";
    $subject = "Reset Your Password";
    $message = "Click here to reset your password: $resetLink";
    sendEmail($email, $subject, $message);

    echo "Password reset link sent if email exists.";
}
?>

<form method="POST">
    <input type="email" name="email" placeholder="Enter your email" required><br>
    <button type="submit">Send Reset Link</button>
</form>
