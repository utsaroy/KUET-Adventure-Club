<?php
require 'db_connect.php';

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = trim($_POST['name'] ?? '');
  $student_id = trim($_POST['student_id'] ?? '');
  $department = trim($_POST['department'] ?? '');
  $email = trim($_POST['email'] ?? '');
  $phone = trim($_POST['phone'] ?? '');

  if (!empty($name) && !empty($student_id) && !empty($department) && !empty($email) && !empty($phone)) {
    $stmt = $conn->prepare("INSERT INTO members (name, student_id, department, email, phone) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $student_id, $department, $email, $phone);
    if ($stmt->execute()) {
        $success = "Registration successful! Welcome to the club.";
    } else {
        $error = "An error occurred during registration. Please try again.";
    }
    $stmt->close();
  } else {
    $error = "Please fill in all required fields.";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Register for KUET Adventure Club.">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="auth.css">
  <title>Join the Club — KUET Adventure Club</title>
</head>

<body class="auth-body">
  <main class="auth-main">
    <div class="auth-card" id="register-card" style="max-width: 500px;">

      <div class="auth-header">
        <h1 class="auth-title">Join the Adventure</h1>
        <p class="auth-subtitle">Become a member of KUET Adventure Club</p>
      </div>

      <?php if ($error): ?>
        <div
          style="background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.3); color: #ef4444; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-size: 0.9rem; text-align: center;">
          <?php echo htmlspecialchars($error); ?>
        </div>
      <?php endif; ?>

      <?php if ($success): ?>
        <div
          style="background: rgba(74, 222, 128, 0.1); border: 1px solid rgba(74, 222, 128, 0.3); color: #4ade80; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-size: 0.9rem; text-align: center;">
          <?php echo htmlspecialchars($success); ?>
        </div>
        <div style="text-align: center; margin-top: 20px;">
           <a href="index.php" class="btn btn-primary btn-full">Return to Homepage</a>
        </div>
      <?php else: ?>

      <form class="auth-form" id="register-form" method="POST" action="register.php">
        <div class="form-group">
          <label class="form-label">Full Name</label>
          <input type="text" name="name" class="form-input" placeholder="Enter your full name" required>
        </div>

        <div style="display: flex; gap: 16px;">
            <div class="form-group" style="flex: 1;">
            <label class="form-label">Student ID</label>
            <input type="text" name="student_id" class="form-input" placeholder="e.g. 1907001" required>
            </div>

            <div class="form-group" style="flex: 1;">
            <label class="form-label">Department</label>
            <input type="text" name="department" class="form-input" placeholder="e.g. CSE" required>
            </div>
        </div>

        <div class="form-group">
          <label class="form-label">Email Address</label>
          <input type="email" name="email" class="form-input" placeholder="Enter your email" required>
        </div>

        <div class="form-group">
          <label class="form-label">Phone Number</label>
          <input type="text" name="phone" class="form-input" placeholder="Enter your phone number" required>
        </div>

        <button type="submit" class="btn btn-primary btn-full" id="register-btn" style="margin-top: 10px;">
          <span>Submit Registration</span>
        </button>
      </form>
      <?php endif; ?>

      <br>
      <p class="auth-switch">
        <a href="index.php" class="form-link">Back to Homepage</a>
      </p>

    </div>
  </main>

</body>

</html>
