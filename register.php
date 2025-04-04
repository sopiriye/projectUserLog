<!-- register.php - User registration form -->
<?php include 'templates/includes/header.php'; ?>
<div class="container py-5">
  <h2 class="text-center mb-4">Register</h2>
  <form method="POST" action="templates/registerHandler.php">
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" name="username" class="form-control" id="username" placeholder="Enter username" required>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required>
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
  </form>
</div>
<?php include 'templates/includes/footer.php'; ?>