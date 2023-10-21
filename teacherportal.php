<?php
// Start or resume session
include_once('functions.php');
// Check if the user is logged in
if (!isset($_SESSION['instructor'])) {
    // If not logged in, redirect to login page
    header("Location: instructorlogin.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/portalheader.css">
    <link rel="stylesheet" type="text/css" href="css/imagewithtext.css">
    <link rel="stylesheet" type="text/css" href="css/features.css">
    <link rel="stylesheet" type="text/css" href="css/coursescard.css">
    <link rel="stylesheet" type="text/css" href="css/chatbtn.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
    <title>Teacher Portal</title>
</head>

<body>
<?php
 if (isset($_SESSION['instructor'])) {
     // Access the student's information
     $instructor = $_SESSION['instructor'];
     $teacher_id=$instructor['instructor_id'];
 
 } 
 ?>
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
            <ul class="iconsnav">
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
                        <li><a href="teacherprofile.php">Profile</a></li>
                        <li><a href="home.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="navmenu">
                <li><a class="active" href="teacherportal.php">Home</a></li>
                <li><a href="teachercourses.php">Courses</a></li>
                <li><a href="teacherexams.php">Exams</a></li>
                <li><a href="teacherresults.php">Results</a></li>
                <li class="hidethem"><a href="teacherprofile.php">Profile</a></li>
                <li class="hidethem"><a href="home.php">Logout</a></li>
            </ul>
        </nav>
        <section></section>
    </header>
    <div class="image-with-text">
        <div class="overlay"></div>
        <img src="./images/bg1.jpeg" alt="University Image">
        <div class="image-text-container">
        <h2 class="image-text">HELLO <span style="text-transform: capitalize;"><?php echo $instructor['instructor_name']; ?></span></h2>
            <h2 class="image-text">WELCOME TO TEACHER PORTAL!</h2>
        </div>
    </div>

    <div class="feature-container">
        <a href="teachercourses.php" class="feature-box">
            <div class="feature-text">Courses</div>
            <img src="./images/courses.jpg" alt="Courses">
        </a>
        <a href="teacherexams.php"  class="feature-box">
            <div class="feature-text">Exams</div>
            <img src="./images/exam.jpg" alt="Exams">
        </a>



        <a href="teacherresults.php"  class="feature-box">
            <div class="feature-text">Results</div>
            <img src="./images/result.jpg" alt="Results">
        </a>
    </div>


    <div class="courses">
    <?php

// Loop through semesters from the current semester to the first semester
    // Get courses for the current semester
    $courses = get_teacher_courses($teacher_id);
?>
    <h6>MY COURSES</h6>
    <div class="cards">

        <?php  foreach ($courses as $course) {
            $course_det = get_course_details($course); ?>
            <!--Course 1-->
            <a href="studentcoursepage.html" class="card">
            <img src="<?php echo displayImage($course_det['course_image']); ?>" alt="Not found">
                <h3><?php echo $course_det['course_title'] ?></h3>
                <p><?php echo $course_det['course_desc'] ?></p>
            </a>
        <?php }?>
        </div>
        </div>
    <a class="myBtn" href="teacherchat.php">
        <span class="icon"></span>
        Chat
      </a>
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
                <li><a class="active" href="teacherportal.php">Home</a></li>
                <li><a href="teachercourses.php">Courses</a></li>
                <li><a href="teacherexams.php">Exams</a></li>
                <li><a href="teacherresults.php">Results</a></li>
                <li><a href="teacherprofile.php">Profile</a></li>
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