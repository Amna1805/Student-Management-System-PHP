<?php 
include_once('header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <title>Document</title>
</head>
<body>
<div class="login-container">
        <form class="login-form">
            <div class="welcome">
                <h1 class="welcome-text">Welcome Back!</h1>
                <p style="margin-top: -10px;">Login below or Create Account</p>
            </div>

            <div class="form-group">
                <label for="username">Registration No</label>
                <input type="text" id="regno" name="regno" placeholder="Type your Registration No" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div class="password-input">
                    <input type="password" id="password" name="password" placeholder="Type your password" required>
                    <span class="eye-icon">&#128065;</span>
                </div>
            </div>


            <div class="forgot-password">
                <a href="forgetpassword.php">Forgot password?</a>
            </div>
            <div class="login-button">
                <button type="submit">Sign In</button>
            </div>


            <div class="signup-link">
                <span>Don't have an account? <a href="signup.php">Sign Up</a></span>
            </div>
        </form>
    </div>
</body>
</html>
<?php include_once('footer.php'); ?>
