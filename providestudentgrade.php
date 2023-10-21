<?php
// Start or resume session
include_once('functions.php');
// Check if the user is logged in
if (!isset($_SESSION['instructor'])) {
    // If not logged in, redirect to login page
    header("Location: instructorlogin.php");
    exit();
}
if (isset($_POST['provide_remark'])) {
    if (provideRemark()) {
        echo '<script>alert("Remarks provided successfully.!");</script>';
        header("Location: teacherexams.php");
    } else {
        echo '<script>alert("Failed!");</script>';
    }
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
    <link rel="stylesheet" type="text/css" href="css/takeexam.css">
    <link rel="stylesheet" type="text/css" href="css/createexam.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
    <title>Grade Student</title>
</head>

<body>
<?php
 if (isset($_SESSION['instructor'])) {
     // Access the student's information
     $instructor = $_SESSION['instructor'];
     $teacher_id=$instructor['instructor_id'];
     
 
 } 
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['exam_id']) && isset($_POST['std_id']) && isset($_POST['std_exam_id'])) {
        $exam_id = $_POST['exam_id'];
        $std_id = $_POST['std_id'];
        $std_exam_id = $_POST['std_exam_id'];

        $exam_det = get_exam_details($exam_id);
        $questin_details=get_question_details($exam_id);
        $student_det = get_student_details($std_id);
        $student_exam_details=get_studentexam_details($exam_id,$std_id);
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
    <form method="POST" onsubmit="return validateForm();">
    <section class="exam-info-section">
        <div class="exam-info">
            <div class="exam-info-heading">
                <h2><?php echo $exam_det['exam_title'] ?></h2>
            </div>
            <div class="student-info-heading">
                <h2><?php echo $student_det['std_name'] ?></h2>
            </div>
            <div class="time-remaining">
                <span>Marks:</span>
                <span class="green-text"><?php echo $student_exam_details['marks_obtained'] ?>/<?php echo $exam_det['exam_total_marks'] ?></span>
            </div>
        </div>

        <div class="remarks-section red-text">
            <label for="remarks">Remarks:</label>
            <textarea id="remarks" name="remarks" rows="4" cols="50" 
                autofocus><?php echo $student_exam_details['remarks'] ?></textarea>
                <div class="create-button">
        <button type="submit"  name="provide_remark">Provide Remark</button>
    </div>
        </div>
        <div class="exam-mcqs">
         
    <?php
    $questionCounter = 1; // Initialize the question counter
    foreach ($questin_details as $question) {
    ?>
        <div class="mcq">
            <p><?php echo $questionCounter . ". " . $question['question']; ?></p>
            <input type="radio" name="mcq<?php echo $questionCounter; ?>" id="mcq<?php echo $questionCounter; ?>_opt1">
            <label for="mcq<?php echo $questionCounter; ?>_opt1"><?php echo $question['option_1']; ?></label><br>
            <input type="radio" name="mcq<?php echo $questionCounter; ?>" id="mcq<?php echo $questionCounter; ?>_opt2">
            <label for="mcq<?php echo $questionCounter; ?>_opt2"><?php echo $question['option_2']; ?></label><br>
        </div>
    <?php
        $questionCounter++; // Increment the question counter
    }
    ?>
</div>

    </section>
    <input type="hidden" name="exam_id" value="<?php echo  $exam_id; ?>">
                    <input type="hidden" name="std_id" value="<?php echo $std_id; ?>">
</form>

    <!-- Footer -->

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
                <li><a href="teacherexams.php">Exams</a></li>
                <li><a href="teacherresults.php">Results</a></li>
                <li><a class="active" href="teacherprofile.php">Profile</a></li>
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