<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Password Reset Request</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .reset-container {
      max-width: 420px;
      margin: 80px auto;
      padding: 30px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 20px rgba(5, 3, 3, 0.08);
    }
    .btn-primary {
      width: 100%;
    }
  </style>
</head>
<body>

<div class="reset-container">
  <h4 class="text-center mb-4">Reset Your Password</h4>
  <form method="POST" action="resetPasswordRequestHandler.php">
    <div class="mb-3">
      <label for="email" class="form-label">Email Address</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
    </div>
    <button type="submit" class="btn btn-primary">Send Reset Link</button>
  </form>
  <p class="text-center mt-3 mb-0">
      <a href="/projectUserLog/login.php" class="text-decoration-none">← Back to Login</a>
  </p>
</div>

</body>
</html>