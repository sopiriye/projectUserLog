<?php
// mailer.php - Email handler using PHPMailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../../vendor/phpMailer/phpMailer/src/Exception.php';
require_once __DIR__ . '/../../vendor/phpMailer/phpMailer/src/PHPMailer.php';
require_once __DIR__ . '/../../vendor/phpMailer/phpMailer/src/SMTP.php';
// require_once __DIR__ . '/../PHPMailer/src/SMTP.php';

// alternative for move up a directory folder
// require_once dirname(__DIR__, 3) . '/PHPMailer/src/Exception.php';

function sendEmail($to, $subject, $body) {
    $mail = new PHPMailer(true);

    try {
        // SMTP server configuration
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';  // Use your SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'sopiriyerobinson2003@gmail.com';  // Replace with your email
        $mail->Password   = 'rswnrgexfywmnpuw';     // Replace with your app password
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;

        // Email headers
        $mail->setFrom('sopiriyerobinson2003@gmail.com', 'projectUserLog');
        $mail->addAddress($to);
        $mail->isHTML(true);

        $mail->Subject = $subject;
        $mail->Body    = $body;

        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
        // error_log("Mailer Error: " . $mail->ErrorInfo);
        return false;
    }
}
?>