<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer classes
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

// Create mail instance
$mail = new PHPMailer(true);

try {
    // SMTP Configuration
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';               // Gmail SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'sopiriyerobinson2003@gmail.com';     // 🔁 Replace with your Gmail
    $mail->Password = 'rswnrgexfywmnpuw';        // 🔁 Replace with Gmail App Password
    $mail->SMTPSecure = 'ssl';                    // TLS encryption
    $mail->Port = 465;                            // Gmail SMTP port for TLS

    // Email settings
    $mail->setFrom('sopiriyerobinson2003@gmail.com', 'Mailer Test'); // Sender
    $mail->addAddress('sopiriyerobinson@gmail.com');            // 🔁 Replace with your own/test email
    $mail->isHTML(true);
    $mail->Subject = 'PHPMailer Test ✅';
    $mail->Body    = '<h2>This is a PHPMailer test message</h2><p>If you received this, it works!</p>';

    $mail->send();
    echo 'Test email sent successfully!';
} catch (Exception $e) {
    echo 'Email could not be sent.<br>';
    echo 'Error: ' . $mail->ErrorInfo;
}
?>
