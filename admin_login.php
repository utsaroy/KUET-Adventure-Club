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

      <form class="auth-form" id="login-form">
        <div class="form-group">
          <label for="login-email" class="form-label">Email Address</label>
          <input type="email" id="login-email" name="email" class="form-input" placeholder="your@kuet.ac.bd" required>
        </div>

        <div class="form-group">
          <label for="login-password" class="form-label">Password</label>
          <input type="password" id="login-password" name="password" class="form-input"
            placeholder="Enter your password" required>
        </div>

        <div class="form-row">
          <label class="checkbox-label">
            <input type="checkbox" id="remember-me" class="checkbox-input">
            <span class="checkbox-custom"></span>
            Remember me
          </label>
        </div>

        <button type="submit" class="btn btn-primary btn-full" id="login-btn">
          <span>Sign In</span>
        </button>
      </form>
      <br>
      <p class="auth-switch">
        Don't have an account?
        <a href="register.html" class="form-link">Create one →</a>
      </p>

    </div>
  </main>

</body>

</html>