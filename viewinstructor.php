<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/adminheader.css">
    <link rel="stylesheet" type="text/css" href="css/profile.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
    <title>View Instructor</title>
</head>

<body>
    <header id="schoolify-header">
        <nav>
            <input type="checkbox" id="check" style="color: transparent">
            <label for="check" class="checkbtn">
                <div class="hamber">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </div>
            </label>
            <label class="logo">Schoolify</label>
            <ul>
                <li><a  href="adminportal.php">Home</a></li>
                <li><a  href="adminstudentpage.php">Student</a></li>
                <li><a class="active" href="adminInstructorPage.php">Instructor</a></li>
                <li><a href="adminProgramcopage.php">Program Coordinator</a></li>
                <li><a href="adminQApage.php">QA Officer</a></li>
                <li>
                    <a href="#">
                        <i class="fas fa-bell"></i>
                        <div class="notification-popup">
                            <p>No notifications yet</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-user"></i></a>
                    <ul class="dropdown">
                        <li><a href="adminprofile.php">Profile</a></li>
                        <li><a href="home.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <section></section>
    </header>
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
                <label for="registration_no"><i class="fas fa-id-card"></i> Employee ID:</label>
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
                <label for="semester"><i class="fas fa-chalkboard"></i> Designation:</label>
                <input type="text" id="semester" value="Your Semester" disabled>
              </div>
             
        </div>
      </div>
    </div>
  </div>
  <footer>
    <div class="content">
        <div class="left-box">
            <label for="logo" class="logo">Schoolify</label>
        </div>
        <div class="right-box">Contact Us
            <ul>
                <li>Email:something@something.com</li>
                <li>Tel No.:+34-354343</li>
            </ul>
        </div>
    </div>
    <hr class="Break">
    <br>
    <div class="middle-box">
        <ul>
            <li><a class="active" href="adminportal.php">Home</a></li>
            <li><a href="adminstudentpage.php">Student</a></li>
            <li><a href="adminInstructorPage.php">Instructor</a></li>
            <li><a href="adminProgramcopage.php">Program Coordinator</a></li>
            <li><a href="adminQApage.php">QA Officer</a></li>
            <li><a href="adminprofile.php">Profile</a></li>
            <li><a href="home.php">Logout</a></li>
        </ul>
    </div>
    <br>
    <div class="bottom">
        <p>Copyright © Schoolify Inc., All rights reserved.</p>
    </div>
    </div>

</footer>
</body>

</html>