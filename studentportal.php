<?php
// Start or resume session
// Check if the user is logged in
include_once('functions.php');
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
    <link rel="stylesheet" type="text/css" href="css/imagewithtext.css">
    <link rel="stylesheet" type="text/css" href="css/features.css">
    <link rel="stylesheet" type="text/css" href="css/coursescard.css">
    <link rel="stylesheet" type="text/css" href="css/chatbtn.css">
    <title>Document</title>
</head>
<body>

<?php
 if (isset($_SESSION['student'])) {
     // Access the student's information
     $student = $_SESSION['student'];
     $admission_year=$student['std_admission_year'];
     $std_id=$student['std_id'];
     function getCurrentSemester($admissionYear) {
        // Assume a typical academic year with two semesters: Fall and Spring
        // Replace this with your specific logic to determine the current semester
        $currentYear = date('Y');
        $currentMonth = date('n');
    
        if ($currentMonth >= 1 && $currentMonth <= 6) {
            // Spring semester
            return ($currentYear - $admissionYear) * 2 + 2;
        } else {
            // Fall semester
            return ($currentYear - $admissionYear) * 2 + 1;
        }
    }
    $currentSemester = getCurrentSemester($admission_year);
 } 
 ?>
 
<div class="image-with-text">
        <div class="overlay"></div>
        <img src="./images/bg1.jpeg" alt="University Image">
        <div class="image-text-container">
        <h2 class="image-text">HELLO <span style="text-transform: capitalize;"><?php echo $student['std_name']; ?></span></h2>
            <h2 class="image-text">WELCOME TO STUDENT PORTAL!</h2>
        </div>
    </div>

    <div class="feature-container">
        <a href="studentcourses.php" class="feature-box">
            <div class="feature-text">Courses</div>
            <img src="./images/courses.jpg" alt="Courses">
        </a>
        <a href="studentexams.php"  class="feature-box">
            <div class="feature-text">Exams</div>
            <img src="./images/exam.jpg" alt="Exams">
        </a>



        <a href="studentresults.php"  class="feature-box">
            <div class="feature-text">Results</div>
            <img src="./images/result.jpg" alt="Results">
        </a>
    </div>

    <div class="courses">
    <?php

// Loop through semesters from the current semester to the first semester
    // Get courses for the current semester
    $courses = get_student_courses($std_id, $currentSemester);
    $semesterType = $currentSemester % 2 === 0 ? 'SPRING' : 'FALL';
?>
    <h6>SEMESTER  <?php echo $semesterType.' '.$admission_year.' '?>(Current <?php echo $currentSemester ?>)</h6>
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
    <a class="myBtn" href="studentchat.php">
        <span class="icon"></span>
        Chat
      </a>
</body>
</html>

<?php include_once('studentfooter.php'); ?>