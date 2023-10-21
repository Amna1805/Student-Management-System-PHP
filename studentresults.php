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
    <link rel="stylesheet" type="text/css" href="css/studentresults.css">
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
 ?>
<div class="image-with-text">
        <div class="overlay"></div>
        <img src="./images/bg1.jpeg" alt="University Image">
        <div class="image-text-container">
            <h1 class="image-text">RESULTS</h1>
        </div>
    </div>


   
    <?php

// Loop through semesters from the current semester to the first semester
for ($semester = $currentSemester; $semester >= 1; $semester--) {
    // Get courses for the current semester
    $courses = get_student_courses($std_id, $semester);
    $semesterType = $semester % 2 === 0 ? 'SPRING' : 'FALL';
?>
    <div class="results">
    <h6>SEMESTER  <?php echo $semesterType  ?>(<?php echo $semester ?>)</h6>
  
        <div class="responsivetable">  <table class="resultstable">
            <thead>
                <tr>
                    <th>Course</th>
                    <th>Assessment 1(10)</th>
                    <th>Assessment 2(10)</th>
                    <th>Assessment 3(10)</th>
                    <th>Sessional Marks(20)</th>
                    <th>Mid Marks(25)</th>
                    <th>Final Marks(25)</th>
                    <th>Grade</th>
                    <th>GPA</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $student_courses = get_student_courses($std_id, $semester);
                if ($student_courses) {
                    foreach ($student_courses as $student_course) {
                        $course_det = get_course_details($student_course);
                        $course_exams = get_course_exam($student_course);
                        if ($course_exams) {
                            $exams = get_all_exams_for_course($student_course); // Get all exams for the course
                            $totalMarks = 0;

                            // Initialize arrays to store assessment marks
                            $assessmentMarks = array_fill(1, 3, 0);

                            foreach ($exams as $exam) {
                                $exam_det = get_exam_details($exam['exam_id']);
                                $student_exam_details = get_studentexam_details($exam_det['exam_id'], $std_id);

                                if ($student_exam_details) {
                                    // Add the marks to the respective assessment
                                    $assessmentNumber = isset($exam['assessment_number']) ? $exam['assessment_number'] : 0;

                                    $assessmentMarks[$assessmentNumber] = $student_exam_details['marks_obtained'];
                                }
                            }

                            // $totalMarks = array_sum($assessmentMarks) + $course_exams['sessional_marks'] + $course_exams['mid_marks'] + $course_exams['final_marks'];
                ?>
                <tr>
                    <td><?php echo $course_det['course_title'] ?></td>
                    <td><?php echo $assessmentMarks[1] ?></td>
                    <td><?php echo $assessmentMarks[2] ?></td>
                    <td><?php echo $assessmentMarks[3] ?></td>
                    <td>N/A</td>
                    <td>N/A</td>
                    <td>N/A</td>
                    <!-- Here you can calculate the grade and GPA based on the totalMarks -->
                    <td>N/A</td>
                    <td>N/A</td>
                </tr>
                <?php
                        }
                    }
                }
                ?>
                <tr>
                    <td colspan="8">Overall CGPA</td>
                    <td>4.15</td> <!-- Example CGPA value -->
                </tr>
            </tbody>
        </table></div>
      
    </div>
    <?php }?>
    <a class="myBtn" href="studentchat.php">
        <span class="icon"></span>
        Chat
      </a>
</body>
</html>

<?php include_once('studentfooter.php'); ?>