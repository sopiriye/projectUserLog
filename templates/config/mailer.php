<?php
// mailer.php - Email handler using PHPMailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../../vendor/phpMailer/phpMailer/src/Exception.php';
require_once __DIR__ . '/../../vendor/phpMailer/phpMailer/src/PHPMailer.php';
require_once __DIR__ . '/../../vendor/phpMailer/phpMailer/src/SMTP.php';
require_once __DIR__ . '/config.php'; // Load .env variables
// require_once __DIR__ . '/../PHPMailer/src/SMTP.php';

// alternative for move up a directory folder
// require_once dirname(__DIR__, 3) . '/PHPMailer/src/Exception.php';

function sendEmail($to, $subject, $body) {
    $mail = new PHPMailer(true);

    try {
        // SMTP configuration (from .env)
        $mail->isSMTP();
        $mail->Host       = getenv('MAIL_HOST');  // Use your SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = getenv('MAIL_USERNAME');  // Replace with your email
        $mail->Password   = getenv('MAIL_PASSWORD');     // Replace with your app password
        $mail->SMTPSecure = getenv('MAIL_ENCRYPTION');
        $mail->Port       = getenv('MAIL_PORT');

        // Email headers
        $mail->setFrom(getenv('MAIL_FROM_ADDRESS'), getenv('MAIL_FROM_NAME'));
        $mail->addAddress($to);
        $mail->isHTML(true);

        $mail->Subject = $subject;
        $mail->Body    = $body;

        $mail->send();
        return true;
    } catch (Exception $e) {
        // echo "Mailer Error: " . $mail->ErrorInfo;
        error_log("Mailer Error: " . $mail->ErrorInfo);
        return false;
    }
}
?>