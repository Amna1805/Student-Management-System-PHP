<?php 
include_once('header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="stylesheet" type="text/css" href="css/resetpassword.css">
    <title>Document</title>
</head>
<body>
 <!-- Reset password using new password-->
 <div class="reset-password-container">
    <form class="reset-password-form">
      <div class="reset-intro">
        <h3 class="welcome-text">Reset Password</h3>
        <p>Enter your new password and confirm it</p>
      </div>

      <div class="form-group">
        <label for="new-password">New Password</label>
        <input type="password" id="new-password" name="new-password" class="password-input"
          placeholder="Enter your new password" required>
      </div>

      <div class="form-group">
        <label for="confirm-password">Confirm Password</label>
        <input type="password" id="confirm-password" name="confirm-password" class="password-input"
          placeholder="Confirm your new password" required>
      </div>

      <div class="reset-button">
        <button type="submit">Reset Password</button>
      </div>
    </form>
  </div>
    </div>
</body>
</html>
<?php include_once('footer.php'); ?>
