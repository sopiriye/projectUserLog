<?php
// login_handler.php - Login handler logic
require_once 'config/config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? "");
    $password = $_POST["password"] ?? "";

    // makes sure the users enter an input the the respective field
    if (empty($username) || empty($password)) {
        echo "Username and password are required.";
        exit;
    }

    // collects the data of the user into an associative array
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute([':username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);



    if ($user && password_verify($password, $user['password'])) {

        if (!$user['email_verified']) {
            echo "Please verify your email before logging in.";
            exit;
        }


        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['last_activity'] = time();

        if ($user['role'] === 'admin') {
            header("Location: adminDashboard.php");
        } else {
            header("Location: userDashboard.php");
        }
        exit;
    } else {
        echo "Invalid username or password.";
    }
}
?>