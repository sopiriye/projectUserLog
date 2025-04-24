<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer classes
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require_once __DIR__ . '/templates/config/config.php'; // Load .env variables

// Create mail instance
$mail = new PHPMailer(true);

try {
    // SMTP Configuration
    $mail->isSMTP();
        $mail->Host       = getenv('MAIL_HOST');  // Use your SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = getenv('MAIL_USERNAME');  // Replace with your email
        $mail->Password   = getenv('MAIL_PASSWORD');     // Replace with your app password
        $mail->SMTPSecure = getenv('MAIL_ENCRYPTION');
        $mail->Port       = getenv('MAIL_PORT');                     // Gmail SMTP port for TLS


    $template = file_get_contents(__DIR__ . '/templates/includes/emailVerificationTemplateTest.html');

    $verificationLink = "http://yourdomain.com/verify.php?token=";
    $body = str_replace('{{verification_link}}', $verificationLink, $template);

    // Email settings
    $mail->setFrom(getenv('MAIL_FROM_ADDRESS'), getenv('MAIL_FROM_NAME')); // Sender
    $mail->addAddress('sopiriyerobinson@gmail.com');            // 🔁 Replace with your own/test email
    $mail->isHTML(true);
    $mail->Subject = 'PHPMailer Test ✅';
    $mail->Body    = $body;
    // $mail->Body    = '<h2>This is a PHPMailer test message</h2><p>If you received this, it works!</p>';

    $mail->send();
    echo 'Test email sent successfully!';
} catch (Exception $e) {
    echo 'Email could not be sent.<br>';
    echo 'Error: ' . $mail->ErrorInfo;
}
?>
