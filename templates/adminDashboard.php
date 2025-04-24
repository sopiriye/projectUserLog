<?php
// admin_dashboard.php - Dashboard for admin users
session_start();
require_once 'config/db_connect.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    exit("Access denied.");
}

if (time() - $_SESSION['last_activity'] > 900) {
    session_unset();
    session_destroy();
    exit("Session expired.");
} else {
    $_SESSION['last_activity'] = time();
}

// Fetch uploaded files
$stmt = $conn->prepare("SELECT u.username, f.file_name, f.uploaded_at FROM uploads f JOIN users u ON f.user_id = u.user_id ORDER BY f.uploaded_at DESC");
$stmt->execute();
$uploads = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>



<?php include 'includes/header.php'; ?>

<div class="container py-5">
  <h2 class="text-center mb-4">Welcome Admin, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
  <p class="text-center">Welcome, Admin! Here's a list of uploaded files by users:</p>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Username</th>
        <th>Filename</th>
        <th>File Size (KB)</th>
        <th>Uploaded At</th>
        <th>Action</th>
      </tr>
    </thead>

    <?php foreach ($uploads as $file): 
        $filePath = 'uploads/' . $file['file_name'];
        $fileSize = file_exists($filePath) ? round(filesize($filePath) / 1024, 2) : 'N/A';
    ?>

    <tbody>
      <tr>
        <td><?php echo htmlspecialchars($file['username']); ?></td>
        <td><?php echo htmlspecialchars($file['file_name']); ?></td>
        <td><?php echo $fileSize; ?></td>
        <td><?php echo htmlspecialchars($file['uploaded_at']); ?></td>
        <td><a href="<?php echo $filePath; ?>" download>Download</a></td>
      </tr>
    </tbody>

    <?php endforeach; ?>

  </table>

  <a href="logout.php">Logout</a>
</div>

<?php include 'includes/footer.php'; ?>




