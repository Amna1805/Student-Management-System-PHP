<?php 
<<<<<<< HEAD
session_start();

include_once('header.php'); 
include_once('functions.php'); 
if(isset($_POST['login-submit'])) {
    student_login();
=======
include_once('header.php'); 
include_once('functions.php'); 
if(isset($_POST['login-submit'])) {
    user_login();
>>>>>>> 739417ec290b25d73a7bb4f9da45da4db51e8cc6
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <title>Document</title>
    <script type="text/javascript">
<<<<<<< HEAD
     function validateForm() {
    // Get form values
    var regNo = document.getElementById("regno").value;
    var password = document.getElementById("password").value;

    // Validate registration number (you can customize the regex pattern)
    var regNoRegex = /^[a-zA-Z0-9]+$/;
    if (!regNoRegex.test(regNo.trim())) {
        alert("Please enter a valid registration number.");
        return false;
    }


    // You can add more specific validations if needed

    return true;
}

=======
        function validateForm() {
            // Get form values
            var name = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            var question = document.getElementById("question").value;

            // Validate name (only alphabets and spaces)
            var nameRegex = /^[a-zA-Z\s]+$/;
            if (!nameRegex.test(name.trim())) {
                alert("Please enter a valid name (only alphabets and spaces).");
                return false;
            }

            // Validate email
            var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            if (!emailRegex.test(email.trim())) {
                alert("Please enter a valid email address.");
                return false;
            }

            // Validate question
            if (question.trim() === "") {
                alert("Please describe your issue.");
                return false;
            }

            // You can add more specific validations if needed

            return true;
        }
>>>>>>> 739417ec290b25d73a7bb4f9da45da4db51e8cc6
    </script>
</head>
<body>
<div class="login-container">
        <form class="login-form" method="POST" onsubmit="return validateForm();">
            <div class="welcome">
                <h1 class="welcome-text">Welcome Back!</h1>
                <p style="margin-top: -10px;">Login below or Create Account</p>
            </div>

            <div class="form-group">
                <label for="username">Registration No</label>
                <input type="text" id="regno" name="login_id" placeholder="Type your Registration No" required>
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
                <button type="submit" name="login-submit">Sign In</button>
            </div>


            <div class="signup-link">
                <span>Don't have an account? <a href="signup.php">Sign Up</a></span>
            </div>
        </form>
    </div>
</body>
</html>
<?php include_once('footer.php'); ?>
