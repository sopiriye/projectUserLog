<?php
// user_dashboard.php - Dashboard for regular users
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    exit("Access denied.");
}

if (time() - $_SESSION['last_activity'] > 900) {
    session_unset();
    session_destroy();
    exit("Session expired.");
} else {
    $_SESSION['last_activity'] = time();
}
?>



<?php include 'includes/header.php'; ?>

<div class="container py-5">
  <h2 class="text-center mb-4">User Dashboard</h2>
  <p class="text-center">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>! You can upload your documents below.</p>

  <form method="POST" enctype="multipart/form-data" action="uploadHandler.php" class="text-center">
    <input type="file" name="document" class="form-control mb-3 w-50 mx-auto" required>
    <button type="submit" class="btn btn-primary">Upload</button>
  </form>

  <a href="logout.php">Logout</a>
</div>

<?php include 'includes/footer.php'; ?>
