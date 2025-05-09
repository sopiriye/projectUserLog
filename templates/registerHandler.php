<?php
// register_handler.php - Register handler logic
require 'config/config.php';
require 'config/mailer.php';
require 'config/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";
    $role = 'user'; // Force role to 'user' only

    // Validate input
    if (empty($username) || empty($email) || empty($password)) {
        echo "All fields are required.";
        exit;
    }

    // validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // make sure the password is more than 6 characters
    if (strlen($password) < 6) {
        echo "Password must be at least 6 characters long.";
        exit;
    }



    // check if the user to be registered is already registered
    $stmt = $conn->prepare("SELECT user_id FROM users WHERE email = :email OR username = :username");
    $stmt->execute(['email' => $email, 'username' => $username]);
    if ($stmt->fetch()) {
        echo "Username or email already exists.";
        exit;
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $verification_token = bin2hex(random_bytes(16));

    $stmt = $conn->prepare("INSERT INTO users (username, email, password, role, verification_token) VALUES (:username, :email, :password, :role, :token)");
    $stmt->execute([
        ':username' => $username,
        ':email' => $email,
        ':password' => $hashedPassword,
        ':role' => $role,
        ':token' => $verification_token
    ]);

    
    $template = file_get_contents(__DIR__ . '/includes/emailVerificationTemplate.html');

    $verifyLink = getenv('APP_URL').getenv('APP_NAME')."/templates/verifyEmail.php?token=$verification_token";
    $subject = "Verify your email";

    $message = str_replace('https://yourdomain.com/', $verifyLink, $template);
   
    // chec
    if (sendEmail($email, $subject, $message)) {
    echo "Registration successful. Check your email to verify.";
    } else {

    $stmt = $conn->prepare("DELETE FROM users WHERE email = :email");
    $stmt->execute([
        ':email' => $email
        
    ]);

    echo "Registration failed. Could not send verification email.";
    }

    // echo "Registration successful! Please check your email to verify your account.";
    // header("Location: /projectUserLog/login.php"); // Redirect to login page
}
?>
