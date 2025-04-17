<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Resend Verification</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow">
        <div class="card-header text-center bg-primary text-white">
          <h4>Resend Verification Email</h4>
        </div>
        <div class="card-body">
          <form method="POST" action="resendVerificationHandler.php">
            <div class="mb-3">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter your registered email" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Resend Verification</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>