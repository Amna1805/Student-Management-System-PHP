<?php 
include_once('header.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/signup.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Sign Up</title>
</head>

<body>
   
    <!-- Students can register for student portal-->
    <div class="signup-container">
        <form class="signup-form">
            <div class="signup-intro">
                <h3>Create an Account</h3>
                <p>Register with your details</p>
            </div>
            <div class="form-group">
                <label for="registration-number">Registration Number</label>
                <input type="text" id="registration-number" name="registration-number"
                    placeholder="Enter your registration number" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <div class="input-with-icon">
                    <span class="icon">&#9993;</span> <!-- Email icon -->
                    <input type="email" id="email" name="email" class="email-input" placeholder="Enter your email"
                        required>
                </div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div class="password-input">
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                    <span class="eye-icon">&#128065;</span>
                </div>
            </div>
            <div class="form-group">
                <label for="password">Confirm Password</label>
                <div class="password-input">
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                    <span class="eye-icon">&#128065;</span>
                </div>
            </div>
            <div class="signup-button">
                <button type="submit">Sign Up</button>
            </div>

            <div class="login-link">
                <span>Already have an account? <a href="login.php">Login</a></span>
            </div>
        </form>
    </div>
    

</body>

</html>
<?php 
include_once('footer.php'); ?>