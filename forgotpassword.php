<?php 
include_once('header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="stylesheet" type="text/css" href="css/forgotpassword.css">
    <title>Document</title>
</head>
<body>
     <!-- Here Email is required to reset password-->
  <div class="forgot-password-container">
    <form class="forgot-password-form">
      <div class="forgot-intro">
        <h3 class="welcome-text">Forgot Password</h3>
        <p>Enter your email and we will send you a link to reset your Password</p>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <div class="input-with-icon">
          <span class="icon">&#9993;</span>
          <input type="email" id="email" name="email" class="email-input" placeholder="Enter your email" required>
        </div>
      </div>

      <div class="reset-button">
        <button type="submit">Send Email</button>
      </div>

      <div class="login-link">
        <a href="login.php">Back to Login </a>
      </div>
    </form>
  </div>
</body>
</html>
<?php include_once('footer.php'); ?>
