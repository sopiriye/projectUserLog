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

<div class="container d-flex justify-content-center align-items-center min-vh-100">
  <div class="card shadow p-4" style="max-width: 400px; width: 100%;">
    <h4 class="mb-3 text-center">Set New Password</h4>
    <form method="POST" action="resetPasswordHandler.php">
      <div class="mb-3">
        <label for="password" class="form-label">New Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password" required>
      </div>
      <div class="mb-3">
        <label for="confirm_password" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm new password" required>
      </div>
      <button type="submit" class="btn btn-success w-100">Update Password</button>
    </form>
  </div>
</div>

</body>
</html>