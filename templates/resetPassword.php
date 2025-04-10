<?php
// reset_password.php
require 'config/config.php';

$token = $_GET['token'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newPass = $_POST['password'];
    $token = $_POST['token'];

    if (strlen($newPass) < 6) {
        echo "Password must be at least 6 characters.";
        exit;
    }

    $hashed = password_hash($newPass, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("UPDATE users SET password = :pass, reset_token = NULL WHERE reset_token = :token");
    $stmt->execute([':pass' => $hashed, ':token' => $token]);

    echo "Password reset successful.";
}
?>

<form method="POST">
    <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
    <input type="password" name="password" placeholder="New Password" required><br>
    <button type="submit">Reset Password</button>
</form>