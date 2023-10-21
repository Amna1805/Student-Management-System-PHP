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
    <link rel="stylesheet" type="text/css" href="css/teacherresult.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
    <title>View Results</title>
</head>

<body>
<?php
 if (isset($_SESSION['instructor'])) {
     // Access the student's information
     $instructor = $_SESSION['instructor'];
     $teacher_id=$instructor['instructor_id'];
     
 
 } 
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['exam_id'])) {
        $exam_id = $_POST['exam_id'];
        $exam_det = get_exam_details($exam_id);
    } else {
        $exam_id =99;
    }
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
                <li><a  href="teacherportal.php">Home</a></li>
                <li><a href="teachercourses.php">Courses</a></li>
                <li><a class="active" href="teacherexams.php">Exams</a></li>
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
            <h1 class="image-text">GRADES</h1>
        </div>
    </div>


    <!---RESULTS-->
    
    <div class="results">

        <h6>EXAM:<?php echo $exam_det['exam_title'] ?></h6> <!-- Change the course name as needed -->
        <div class="responsivetable">
            <table class="resultstable">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Registration No</th>
                        <th>Total Marks</th>
                        <th>Obtained Marks</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
               
            
                <tbody>
    <!-- Student details -->
    <?php
    $student_exams = get_student_exams($exam_id);
    $total_students = count($student_exams); // Total number of students
    $passed_students = 0; // Counter for students who passed
    $total_marks = 0; // Total marks obtained by all students

    foreach ($student_exams as $student_exam) {
        $student_det = get_student_details($student_exam['std_id']);
        $marks_obtained = $student_exam['marks_obtained'];
        $total_marks += $marks_obtained;

        // Check if the student passed (marks obtained > 7)
        if ($marks_obtained > 7) {
            $passed_students++;
        }
        ?>
        <tr>
            <td><?php echo $student_det['std_name']; ?></td>
            <td><?php echo $student_det['std_reg_no']; ?></td>
            <td><?php echo $exam_det['exam_total_marks']; ?></td>
            <td><?php echo $marks_obtained; ?></td>
            <td><?php echo $student_exam['remarks']; ?></td>
        </tr>
    <?php } ?>

    <!-- Total Students -->
    <tr>
        <td colspan="4"><strong>Total Students</strong></td>
        <td colspan="1"><?php echo $total_students; ?></td>
    </tr>

    <!-- Passed Students -->
    <tr>
        <td colspan="4"><strong>Passed Students</strong></td>
        <td colspan="1"><?php echo $passed_students; ?></td>
    </tr>

    <!-- Average Percentage -->
    <tr>
        <td colspan="4"><strong>Average Percentage</strong></td>
        <td colspan="1"><?php echo ($total_marks / $total_students) . '%'; ?></td>
    </tr>
</tbody>

            </table>
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
                <li><a href="teacherportal.php">Home</a></li>
                <li><a href="teachercourses.php">Courses</a></li>
                <li><a class="active" href="teacherexams.php">Exams</a></li>
                <li><a  href="teacherresults.php">Results</a></li>
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