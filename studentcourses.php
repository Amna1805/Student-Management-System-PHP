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
    <link rel="stylesheet" type="text/css" href="css/portalheader.css">
    <link rel="stylesheet" type="text/css" href="css/imagewithtext.css">
    <link rel="stylesheet" type="text/css" href="css/studentcourses.css">
    <link rel="stylesheet" type="text/css" href="css/coursescard.css">
    <link rel="stylesheet" type="text/css" href="css/chatbtn.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
    <title>Student Courses</title>
</head>

<body>
<?php
 if (isset($_SESSION['student'])) {
    include_once('functions.php');
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
            <h1 class="image-text">COURSES</h1>
        </div>
    </div>
    

    <div class="courses">
    <?php

// Loop through semesters from the current semester to the first semester
for ($semester = $currentSemester; $semester >= 1; $semester--) {
    // Get courses for the current semester
    $courses = get_student_courses($std_id, $semester);
    $semesterType = $semester % 2 === 0 ? 'SPRING' : 'FALL';
?>
    <h6>SEMESTER  <?php echo $semesterType  ?>(<?php echo $semester ?>)</h6>
    <div class="cards">

        <?php  foreach ($courses as $course) {
            $course_det = get_course_details($course); ?>
            <!--Course 1-->
            <a href="studentcoursepage.html" class="card">
            <img src="<?php echo isset($student['std_image']) ? 'data:image/jpeg;base64,' . base64_encode($course_det['course_image']) : 'path_to_placeholder_image.jpg'; ?>" alt="Not found">
                <h3><?php echo $course_det['course_title'] ?></h3>
                <p><?php echo $course_det['course_desc'] ?></p>
            </a>
        <?php }?>
        </div>
<?php }
?>

</div>

    <a class="myBtn" href="studentchat.php">
        <span class="icon"></span>
        Chat
      </a>

</body>

</html>

<?php include_once('studentfooter.php'); ?>