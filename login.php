<!-- login.php - Login form -->
<?php include 'templates/includes/header.php'; ?>

<div class="container py-5">
  <h2 class="text-center mb-4">Login</h2>
  
  <form method="POST" action="templates/loginHandler.php">
    <div class="mb-3">
      <label for="loginUsername" class="form-label">Username</label>
      <input type="text" name="username" class="form-control" id="loginUsername" placeholder="Enter username" required>
    </div>

    <div class="mb-3">
      <label for="loginPassword" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" id="loginPassword" placeholder="Enter password" required>
    </div>

    <button type="submit" class="btn btn-success">Login</button>
  </form>
</div>

<?php include 'templates/includes/footer.php'; ?>