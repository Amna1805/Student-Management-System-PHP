<?php 
include_once('qaheader.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php
// Start or resume session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['qa_officer'])) {
    // If not logged in, redirect to login page
    header("Location: qalogin.php");
    exit();
}
include_once('qaheader.php');
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/portalheader.css">
    <link rel="stylesheet" type="text/css" href="css/profile.css">
    <link rel="stylesheet" type="text/css" href="css/chatbtn.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
    <title>QA Officer Profile</title>
</head>

<body>
  
<?php
 if (isset($_SESSION['qa_officer'])) {
     // Access the instructor's information
     $qa = $_SESSION['qa_officer'];

 } 
 ?>
   
<div class="profile-card">
    <div class="profile-image">
    <img src="<?php echo isset($qa['qa_image']) ? 'data:image/jpeg;base64,' . base64_encode($qa['qa_image']) : 'path_to_placeholder_image.jpg'; ?>" alt="Profile Image">
    </div>
<div class="profile-info">
      <h2><?php echo $qa['qa_name']; ?></h2>
      <div class="profile-details">
        <!-- Row 1: Registration No, Identity No, Father's Name -->
        <div class="detail-row">
            <div class="detail-item">
                <label for="father_name"><i class="fas fa-user-friends"></i> Father's Name:</label>
                <input type="text" id="father_name" value="<?php echo $qa['qa_father_name']; ?>" readonly>
              </div>
              <div class="detail-item">
                <label for="department"><i class="fas fa-building"></i> Department:</label>
                <input type="text" id="program" value="<?php echo $qa['qa_dept']; ?>" readonly>
              </div>
              <div class="detail-item">
                <label for="email"><i class="fas fa-envelope"></i> Email:</label>
                <input type="email" id="email" value="<?php echo $qa['qa_email']; ?>" readonly>
              </div>
          
          
        </div>
      
        <!-- Row 2: Program, Semester -->
        <div class="detail-row">
            <div class="detail-item">
                <label for="registration_no"><i class="fas fa-id-card"></i> Employee ID:</label>
                <input type="text" id="registration_no" value="<?php echo $qa['employee_id']; ?>" readonly>
              </div>
          <div class="detail-item">
            <label for="phone_no"><i class="fas fa-phone"></i> Phone No:</label>
            <input type="text" id="phone_no" value="<?php echo $qa['qa_phone_no']; ?>" readonly>
          </div>
        </div>
      
        <!-- Row 3: Email, Phone No -->
        <div class="detail-row">
            <div class="detail-item">
                <label for="identity_no"><i class="fas fa-id-card"></i> Identity No:</label>
                <input type="text" id="identity_no" value="<?php echo $qa['qa_identity_no']; ?>" readonly>
              </div>
             
        </div>
      </div>
      <button class="edit-button">Edit Details</button>
    </div>
</div>
    <a class="myBtn" href="qachat.php">
        <span class="icon"></span>
        Chat
    </a>
   
</body>

</html>
<?php include_once('qafooter.php'); ?>