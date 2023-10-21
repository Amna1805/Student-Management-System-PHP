<?php
// Start or resume session
include_once('functions.php');

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
    <link rel="stylesheet" type="text/css" href="css/studentexams.css">
    <link rel="stylesheet" type="text/css" href="css/imagewithtext.css">
    <link rel="stylesheet" type="text/css" href="css/chatbtn.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
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
 $courses = get_student_courses($std_id, $currentSemester);
 ?>   

<div class="image-with-text">
        <div class="overlay"></div>
        <img src="./images/bg1.jpeg" alt="University Image">
        <div class="image-text-container">
            <h1 class="image-text">EXAMS</h1>
        </div>
    </div>


    <!---EXAMS-->
   
    <div class="exam-information">
        <h6>EXAMS INFORMATION</h6>
        <div class="responsivetable">
            <table class="exam-table">
                <thead>
                    <tr>
                        <th>Exam Name</th>
                        <th>Exam Course</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Due Date</th>
                        <th>Marks</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                <?php
foreach ($courses as $course) { 
    $course_exams = get_course_exam($course);
    if ($course_exams) {
        $course_det = get_course_details($course); 
        $exam_det = get_exam_details($course_exams['exam_id']); 
        $student_exam_details = get_studentexam_details($exam_det['exam_id'], $std_id);
        $current_date = date('Y-m-d');
        ?>
        <!-- Exam 1 -->
        <tr>
            <td><?php echo $exam_det['exam_title']; ?></td>
            <td><?php echo $exam_det['exam_desc']; ?></td>
            <td><?php echo $course_det['course_title']; ?></td>
            <?php if ($student_exam_details) { ?>
                <td><p class="status-button completed">Completed</p></td>
                <td><?php echo $exam_det['exam_due_date']; ?></td>
                <?php if ($student_exam_details['is_graded'] == 0) { ?>
                    <td>Not graded yet</td>
                    <td>Not graded yet</td>
                <?php } else { ?>
                    <td><?php echo $student_exam_details['marks_obtained']; ?></td>
                    <td><?php echo $student_exam_details['remarks']; ?></td>
                <?php } ?>
            <?php } else {
                if ($current_date > $exam_det['exam_due_date']) { ?>
                    <td><p class="status-button expire">Expired</p></td>
                    <td><?php echo $exam_det['exam_due_date']; ?></td>
                    <td>N/A</td>
                    <td>N/A</td>
                <?php } else { ?>
                    <form action="takeexam.php" method="POST">
                        <input type="hidden" name="exam_id" value="<?php echo $exam_det['exam_id']; ?>">
                        <td><button type="submit" class="status-button due">Take Exam</button></td>
                    </form>
                    <td><?php echo $exam_det['exam_due_date']; ?></td>
                    <td>N/A</td>
                    <td>N/A</td>
                <?php } ?>
            <?php } ?>
        </tr>
    <?php } 
}
?>
                        
                    <!-- Add more exam rows as needed -->
                    </tr>
                   
                </tbody>
            </table>
        </div>
       
    </div>
    <a class="myBtn" href="studentchat.php">
        <span class="icon"></span>
        Chat
      </a>
</body>
</html>

<?php include_once('studentfooter.php'); ?>