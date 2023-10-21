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
    <link rel="stylesheet" type="text/css" href="css/chatbtn.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
    <title>Teacher Results</title>
</head>

<body>
    <?php
    if (isset($_SESSION['instructor'])) {
        // Access the student's information
        $instructor = $_SESSION['instructor'];
        $teacher_id = $instructor['instructor_id'];

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
                <li><a href="teacherportal.php">Home</a></li>
                <li><a href="teachercourses.php">Courses</a></li>
                <li><a href="teacherexams.php">Exams</a></li>
                <li><a class="active" href="teacherresults.php">Results</a></li>
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
            <h1 class="image-text">RESULTS</h1>
        </div>
    </div>


    <!---RESULTS-->
    <div class="results">
        <div class="results">
            <?php
            $teacher_courses = get_teacher_courses($teacher_id);

            if (!empty($teacher_courses)) {
                foreach ($teacher_courses as $course_id) {
                    $course_details = get_course_details($course_id);

                    if ($course_details !== null) {
                        echo '<h6>Course: ' . $course_details['course_title'] . '</h6>';
                    } else {
                        echo '<h6>Course: Course Not Found</h6>';
                    }

                    // Get students taking this course
                    $students = get_course_students($course_id);
                    

                    if (!empty($students)) {
                        echo '<div class="responsivetable">';
                        echo '<table class="resultstable">';
                        echo '<thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Registration No</th>
                            <th>Total Marks (100)</th>
                            <th>GPA</th>
                            <th>CGPA</th>
                            <th>Action</th>
                        </tr>
                    </thead>';
                        echo '<tbody>';

                        foreach ($students as $student_id) {
                            $student_details = get_student_details($student_id);
                            $student_result = get_student_result($student_id, $course_id);

                            echo '<tr>';
                            echo '<td>' . $student_details['std_name'] . '</td>';
                            echo '<td>' . $student_details['std_reg_no'] . '</td>';
                            if($student_result){
                            echo '<td>' . $student_result['obtained_marks'] . '</td>';
                            echo '<td>' . $student_result['grade'] . '</td>';
                            echo '<td>' . $student_result['cgpa'] . '</td>';
                            }
                            echo '<td>
                            <form action="teacherdetailedresult.php" method="POST">
                                <input type="hidden" name="student_id" value="' . $student_id . '">
                                <input type="hidden" name="course_id" value="' . $course_id . '">
                                <button type="submit" class="view-button">View Details</button>
                            </form>
                        </td>';
                            echo '</tr>';
                        }

                        echo '</tbody>';
                        echo '</table>';
                        echo '</div>';
                    } else {
                        echo '<p style="text-align: center; margin: 0; padding: 50px;">No students found for this course.</p>';
                    }
                }
            } else {
                echo '<h6>Course: No Courses Found</h6>';
            }
            ?>

        </div>

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
                <li><a href="teacherportal.php">Home</a></li>
                <li><a href="teachercourses.php">Courses</a></li>
                <li><a href="teacherexams.php">Exams</a></li>
                <li><a class="active" href="teacherresults.php">Results</a></li>
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