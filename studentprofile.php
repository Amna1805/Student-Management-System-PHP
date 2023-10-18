<?php
// Start or resume session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['student'])) {
    // If not logged in, redirect to login page
    header("Location: studentlogin.php");
    exit();
}

include_once('studentheader.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/profile.css">
    <link rel="stylesheet" type="text/css" href="css/chatbtn.css">
    <title>Document</title>
</head>
<body>
<?php

 if (isset($_SESSION['student'])) {
     // Access the student's information
     $student = $_SESSION['student'];
 } 
 ?>
<!--PROFILE-->
<div class="profile-card">
    <div class="profile-image">
    <img src="<?php echo isset($student['std_image']) ? 'data:image/jpeg;base64,' . base64_encode($student['std_image']) : 'path_to_placeholder_image.jpg'; ?>" alt="Profile Image">
    </div>
    <div class="profile-info">
      <h2><?php echo $student['std_name']; ?></h2>
      <div class="profile-details">
        <!-- Row 1: Registration No, Identity No, Father's Name -->
        <div class="detail-row">
            <div class="detail-item">
                <label for="father_name"><i class="fas fa-user-friends"></i> Father's Name:</label>
                <input type="text" id="father_name" value="<?php echo $student['std_father_name']; ?>" readonly>
              </div>
              <div class="detail-item">
                <label for="department"><i class="fas fa-building"></i> Department:</label>
                <input type="text" id="program" value="<?php echo $student['std_dept']; ?>" readonly>
              </div>
              <div class="detail-item">
                <label for="email"><i class="fas fa-envelope"></i> Email:</label>
                <input type="email" id="email" value="<?php echo $student['std_email']; ?>" readonly>
              </div>
          
          
        </div>
      
        <!-- Row 2: Program, Semester -->
        <div class="detail-row">
            <div class="detail-item">
                <label for="registration_no"><i class="fas fa-id-card"></i> Registration No:</label>
                <input type="text" id="registration_no" value="<?php echo $student['std_reg_no']; ?>" readonly>
              </div>
          <div class="detail-item">
            <label for="program"><i class="fas fa-graduation-cap"></i> Program:</label>
            <input type="text" id="program" value="<?php echo $student['std_program']; ?>" readonly>
          </div>
          <div class="detail-item">
            <label for="phone_no"><i class="fas fa-phone"></i> Phone No:</label>
            <input type="text" id="phone_no" value="<?php echo $student['std_phone_no']; ?>" readonly>
          </div>
        </div>
      
        <!-- Row 3: Email, Phone No -->
        <div class="detail-row">
            <div class="detail-item">
                <label for="identity_no"><i class="fas fa-id-card"></i> Identity No:</label>
                <input type="text" id="identity_no" value="<?php echo $student['std_identity_no']; ?>" readonly>
              </div>
            <div class="detail-item">
                <label for="semester"><i class="fas fa-chalkboard"></i> Semester:</label>
                <input type="text" id="semester" value="not dealed yet" readonly>
              </div>
             
        </div>
      </div>
      <button class="edit-button">Edit Details</button>
    </div>
  </div>
  <a class="myBtn" href="studentchat.php">
    <span class="icon"></span>
    Chat
  </a>
       
</body>
</html>

<?php include_once('footer.php'); ?>