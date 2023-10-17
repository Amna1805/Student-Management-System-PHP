<?php 
include_once('header.php'); ?>

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
<!--PROFILE-->
<div class="profile-card">
    <div class="profile-image">
      <img src="./images/secrratory.avif" alt="Profile Image">
    </div>
    <div class="profile-info">
      <h2>Your Name</h2>
      <div class="profile-details">
        <!-- Row 1: Registration No, Identity No, Father's Name -->
        <div class="detail-row">
            <div class="detail-item">
                <label for="father_name"><i class="fas fa-user-friends"></i> Father's Name:</label>
                <input type="text" id="father_name" value="Father's Name" disabled>
              </div>
              <div class="detail-item">
                <label for="department"><i class="fas fa-building"></i> Department:</label>
                <input type="text" id="program" value="Your Department" disabled>
              </div>
              <div class="detail-item">
                <label for="email"><i class="fas fa-envelope"></i> Email:</label>
                <input type="email" id="email" value="yourname@example.com" disabled>
              </div>
          
          
        </div>
      
        <!-- Row 2: Program, Semester -->
        <div class="detail-row">
            <div class="detail-item">
                <label for="registration_no"><i class="fas fa-id-card"></i> Registration No:</label>
                <input type="text" id="registration_no" value="Your Registration No" disabled>
              </div>
          <div class="detail-item">
            <label for="program"><i class="fas fa-graduation-cap"></i> Program:</label>
            <input type="text" id="program" value="Your Program" disabled>
          </div>
          <div class="detail-item">
            <label for="phone_no"><i class="fas fa-phone"></i> Phone No:</label>
            <input type="text" id="phone_no" value="Your Phone No" disabled>
          </div>
        </div>
      
        <!-- Row 3: Email, Phone No -->
        <div class="detail-row">
            <div class="detail-item">
                <label for="identity_no"><i class="fas fa-id-card"></i> Identity No:</label>
                <input type="text" id="identity_no" value="Your Identity No" disabled>
              </div>
            <div class="detail-item">
                <label for="semester"><i class="fas fa-chalkboard"></i> Semester:</label>
                <input type="text" id="semester" value="Your Semester" disabled>
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