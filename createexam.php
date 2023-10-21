<?php
// Start or resume session
include_once('functions.php');
// Check if the user is logged in
if (!isset($_SESSION['instructor'])) {
    // If not logged in, redirect to login page
    header("Location: instructorlogin.php");
    exit();
}
if (isset($_POST['create_exam'])) {
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
    <title>Student Exams</title>
   
       <script type="text/javascript">
    function validateForm() {
        console.log("calles")
        var examTitle = document.getElementById("exam_title").value;
        var examDesc = document.getElementById("exam_desc").value;
        var examCourse = document.getElementById("exam_course").value;
        var timeAlloted = document.getElementById("time_alloted").value;

        // Regular expression pattern for valid characters (letters, spaces, full stops, and commas)
        var validChars = /^[a-zA-Z ,.]+$/;

        if (!validChars.test(examTitle)) {
            alert("Invalid exam title. Only letters, spaces, full stops, and commas are allowed.");
            return false;
        }

        if (!validChars.test(examDesc)) {
            alert("Invalid exam description. Only letters, spaces, full stops, and commas are allowed.");
            return false;
        }

        if (examCourse === "") {
            alert("Please select a course.");
            return false;
        }

        // Validate time allotted (customize the regex pattern as needed)
        var timeAllotedRegex = /^\d+(\.\d+)?$/;
        if (!timeAllotedRegex.test(timeAlloted)) {
            alert("Invalid time allotted. Please enter a valid number.");
            return false;
        }

        // Validate questions and options
        for (var i = 1; i <= 10; i++) {
            var question = document.getElementById("question" + i).value;
            var option1 = document.getElementById("question" + i + "_option1").value;
            var option2 = document.getElementById("question" + i + "_option2").value;

            if (!validChars.test(question)) {
                alert("Invalid question for Question " + i + ". Only letters, spaces, full stops, and commas are allowed.");
                return false;
            }

            if (!validChars.test(option1)) {
                alert("Invalid option 1 for Question " + i + ". Only letters, spaces, full stops, and commas are allowed.");
                return false;
            }

            if (!validChars.test(option2)) {
                alert("Invalid option 2 for Question " + i + ". Only letters, spaces, full stops, and commas are allowed.");
                return false;
            }
        }

        // If all validations pass, the form will submit
        return true;
    }
</script>
<style>
        .custom-select {
    background-color: #5295c2;
    color: white; /* text color */
    border-radius: 10px; /* adjust as needed */
    padding: 5px; /* adjust as needed */
    /* Add other styles as needed */
}

        </style>

</head>

<body>
<?php
 if (isset($_SESSION['instructor'])) {
     // Access the student's information
     $instructor = $_SESSION['instructor'];
     $teacher_id=$instructor['instructor_id'];
  $courses = get_teacher_courses($teacher_id);
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
            <input type="text" placeholder="Exam Title" name="exam_title" id="exam_title" autofocus>
        </div>
        <div class="exam-info-heading">
            <input type="text" placeholder="Exam Desc" name="exam_desc" id="exam_desc">
        </div>
        <div class="exam-info-heading">
            <select name="exam_course" class="custom-select" id="exam_course">
                <option value="">Select a Course</option>
                <?php
                foreach ($courses as $course) { 
                    $course_det = get_course_details($course);
                ?>
                <option value="<?php echo $course_det['course_id']?>" style="color:blue;"><?php echo $course_det['course_title']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="time-remaining">
            <input type="date" placeholder="due_date" name="due_date" id="due_date">
        </div>
    </div>

    <div class="exam-mcqs">
        <?php for ($i = 1; $i <= 10; $i++) { ?>
        <div class="mcq">
            <div class="questionsdiv">
                <p><?php echo $i; ?>.</p>
                <input class="question" type="text" placeholder="Question <?php echo $i; ?>" name="question<?php echo $i; ?>" id="question<?php echo $i; ?>">
            </div>

            <div class="optionsdiv">
                <label>
                    <input type="radio" name="question<?php echo $i; ?>_option" value="option1" id="question<?php echo $i; ?>_option1">
                    <input type="text" class="option" placeholder="Option 1" name="question<?php echo $i; ?>_option1">
                </label>
            </div>

            <div class="optionsdiv">
                <label>
                    <input type="radio" name="question<?php echo $i; ?>_option" value="option2" id="question<?php echo $i; ?>_option2">
                    <input type="text" class="option" placeholder="Option 2" name="question<?php echo $i; ?>_option2">
                </label>
            </div>
        </div>
        <?php } ?>
    </div>
</section>

   

    <div class="create-button">
        <button type="submit"  name="create_exam">Create</button>
    </div>
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