<?php
// Start or resume session
include_once('functions.php');
// Check if the user is logged in
if (!isset($_SESSION['instructor'])) {
    // If not logged in, redirect to login page
    header("Location: instructorlogin.php");
    exit();
}
if (isset($_POST['update_exam'])) {
    if (updateExam()) {
        echo '<script>alert("Exam updates  Succesfully!")</script>';
    } else {
        echo '<script>alert("Failed!")</script>';
    }
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/portalheader.css">
    <link rel="stylesheet" type="text/css" href="css/takeexam.css">
    <link rel="stylesheet" type="text/css" href="css/createexam.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
    <title>Update Exams</title>
    <script>
function validateForm() {
    // Get the values of the exam title and time allotted fields
    var examTitle = document.getElementById("exam_title").value;
    var timeAllot = document.getElementById("time_allot").value;
    var regex = /^[a-zA-Z0-9\s.,?-]+$/;
    // Check if the exam title and time allotted are empty
    if (!regex.test(examTitle.trim())) {
        alert("Please enter a valid exam title (Only alphabets, spaces, numbers, commas, and periods).");
        return false;
    }

    if (timeAllot.trim() === "") {
        alert("Time allotted cannot be empty");
        return false;
    }
    var questionInputs = document.getElementsByClassName("question");

// Validate each question
for (var i = 0; i < questionInputs.length; i++) {
    var questionInput = questionInputs[i];
    var questionText = questionInput.value;

    if (!regex.test(questionText.trim())) {
        alert("Please enter a valid question for Question " + (i + 1) + ".");
        return false;
    }

    // Get all option input elements by class name
    var optionInputs = document.getElementsByClassName("option");

    // Validate each option
    for (var j = 0; j < optionInputs.length; j++) {
        var optionInput = optionInputs[j];
        var optionText = optionInput.value;

        if (!regex.test(optionText.trim())) {
            alert("Please enter a valid option for Questions.");
            return false;
        }
    }
}

// All validations passed
return true;
        
}
</script>

</head>

<body>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['exam_id'])) {
        $exam_id = $_POST['exam_id'];
        $exam_det = get_exam_details($exam_id);
        $exam_question=get_question_details($exam_id);
        // Fetch and display course details based on $course_id
        // ...
        // Your code to fetch and display course details goes here
        // ...
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
                <input type="text" placeholder="Exam Title" name="exam_title" value="Cloud Computing" id="exam_title">
            </div>
            <div class="time-remaining">
                <span>Time Alloted: </span>
                <input  type="text" placeholder="Time Remaining" name="time_allot" value="00:49" id="time_allot">
            </div>
        </div>
        <div class="exam-mcqs">
        <?php
$questionCounter = 1;
foreach ($exam_question as $question) {
    ?>
   <div class="mcq">
    <div class="questionsdiv">
        <p><?php echo $questionCounter; ?>.</p>
        <input class="question" type="text" placeholder="Question <?php echo $questionCounter; ?>" name="question[]" id="question<?php echo $questionCounter; ?>" value="<?php echo htmlspecialchars($question['question']); ?>">
    </div>

    <div class="optionsdiv">
        <label for="mcq<?php echo $questionCounter; ?>_option1">
            <input type="radio" name="option1[]" value="option1" id="mcq<?php echo $questionCounter; ?>_opt1">
            <input type="text" class="option" placeholder="Option 1" name="option1[]" value="<?php echo $question['option_1']; ?>">
        </label>
    </div>

    <div class="optionsdiv">
        <label for="mcq<?php echo $questionCounter; ?>_option2">
            <input type="radio" nname="option2[]" value="option2" id="mcq<?php echo $questionCounter; ?>_option2">
            <input type="text" class="option" placeholder="Option 2" name="option2[]" value="<?php echo $question['option_2']; ?>">
        </label>
    </div>
</div>

    <?php
    $questionCounter++;
}
?>


            <div class="create-button">
                <button type="submit" name="update_exam">Update</button>
            </div>
        </div>
    </section>
    <input type="text" name="exam_id" hidden  value="<?php echo $exam_id;  ?>">
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
                <li><a  href="teacherportal.php">Home</a></li>
                <li><a  href="teachercourses.php">Courses</a></li>
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