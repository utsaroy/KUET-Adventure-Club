<?php
session_start();
require 'db_connect.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  if (!empty($username) && !empty($password)) {
    $stmt = $conn->prepare("SELECT id, password FROM admins WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
      $admin = $result->fetch_assoc();
      if ($password === $admin['password']) {
        $_SESSION['admin_id'] = $admin['id'];
        header("Location: admin_dashboard.php");
        exit;
      } else {
        $error = "Invalid password.";
      }
    } else {
      $error = "Admin username not found.";
    }
    $stmt->close();
  } else {
    $error = "Please enter both username and password.";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Login to KUET Adventure Club member portal.">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="auth.css">
  <title>Login — KUET Adventure Club</title>
</head>

<body class="auth-body">
  <main class="auth-main">
    <div class="auth-card" id="login-card">

      <div class="auth-header">
        <h1 class="auth-title">Welcome Back</h1>
        <p class="auth-subtitle">Sign in to your Adventure Club account</p>
      </div>

      <?php if ($error): ?>
        <div
          style="background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.3); color: #ef4444; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-size: 0.9rem; text-align: center;">
          <?php echo htmlspecialchars($error); ?>
        </div>
      <?php endif; ?>

      <form class="auth-form" id="login-form" method="POST" action="admin_login.php">
        <div class="form-group">
          <label for="login-username" class="form-label">Username</label>
          <input type="text" id="login-username" name="username" class="form-input" placeholder="admin" required>
        </div>

        <div class="form-group">
          <label for="login-password" class="form-label">Password</label>
          <input type="password" id="login-password" name="password" class="form-input"
            placeholder="Enter your password" required>
        </div>



        <button type="submit" class="btn btn-primary btn-full" id="login-btn">
          <span>Sign In</span>
        </button>
      </form>
      <br>
      <p class="auth-switch">
        <a href="index.php" class="form-link">Back to Homepage</a>
      </p>

    </div>
  </main>

</body>

</html>