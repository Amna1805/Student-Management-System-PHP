<?php
// Start or resume session
include_once('functions.php');
// Check if the user is logged in
if (!isset($_SESSION['instructor'])) {
    // If not logged in, redirect to login page
    header("Location: instructorlogin.php");
    exit();
}
if (isset($_POST['delete_name'])) {
    if (deleteCourse()) {
        echo '<script>alert("Course Deleted Succesfully!")</script>';
        header('location:teachercourses.php');
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
    <link rel="stylesheet" type="text/css" href="css/coursescard.css">
    <link rel="stylesheet" type="text/css" href="css/imagewithtext.css">
    <link rel="stylesheet" type="text/css" href="css/teachercourses.css">
    <link rel="stylesheet" type="text/css" href="css/chatbtn.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
    <title>Teacher courses</title>
    <script>
        function completeDeletion() {
            const response = confirm('Are you sure you want to delete this course?')
            if (response) {
                return true
            } else {
                return false
            }
        }
    </script>
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
                <li><a  href="teacherportal.php">Home</a></li>
                <li><a class="active" href="teachercourses.php">Courses</a></li>
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
            <h2 class="image-text">WELCOME BACK!</h2>
        </div>
    </div>
    <a href="createcourse.php" class="create-course-button">Create New Course</a>
    <?php
    $courses = get_teacher_courses($teacher_id);
?>
    <div class="courses">
        <h6>My Courses</h6>
    <div class="responsivetable">
        <table class="course-table">
        <thead>
             <tr>
                 <th>Course Name</th>
                 <th>Credits</th>
                 <th>Class Duration</th>
                 <th colspan="3">Actions</th>
             </tr>
         </thead>
        <?php  foreach ($courses as $course) {
             
            $course_det = get_course_details($course); ?>
           
            <tbody>
                <!-- Course 1 -->
                <tr>
                    <td><?php echo $course_det['course_title'] ?></td>
                    <td><?php echo $course_det['credit_hours'] ?></td>
                    <td><?php echo $course_det['class_duration'] ?></td>
                    <td>
                    <form action="viewcourse.php" method="POST">
                    <input type="hidden" name="course_id" value="<?php echo $course_det['course_id']; ?>">
                    <button type="submit" class="action-button view">View</button>
                    </form>
                    </td>
                    <td>
                    <form action="updatecourse.php" method="POST">
                    <input type="hidden" name="course_id" value="<?php echo $course_det['course_id']; ?>">
                    <button type="submit" class="action-button update">Update</button>
                    </form>
                    </td>
                    <td>
                    <form method="POST" onsubmit="return completeDeletion()">
                    <input type="hidden" name="course_id" value="<?php echo $course_det['course_id']; ?>">
                    <button type="submit" class="action-button delete" name="delete_course">Delete</button>
                    </form>
                    </td>
                </tr>
            </tbody>
            <?php } ?>
        </table>

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
                <li><a class="active" href="teachercourses.php">Courses</a></li>
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