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
    <link rel="stylesheet" type="text/css" href="css/teacherexams.css">
    <link rel="stylesheet" type="text/css" href="css/chatbtn.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
    <title>Exams Information</title>
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
            <h1 class="image-text">EXAMS</h1>
        </div>
    </div>
    <a href="createexam.php" class="create-course-button">Create New Exam</a>

    <!---EXAMS-->
    <?php
    $exams = get_teacher_exams($teacher_id);
?>
    <div class="exam-information">
        <h6>EXAMS INFORMATION</h6>
        <div class="responsivetable">
            <table class="exam-table">
                <thead>
                    <tr>
                        <th>Exam Name</th>
                        <th>Description</th>
                        <th>Course</th>
                        <th>Exam Due date</th>
                        <th>Exam Total Marks</th>
                        <th colspan="4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php  foreach ($exams as $exam) {
             
             $exam_det = get_exam_details($exam); 
              $course_det = get_course_details($exam_det['course_id']); ?>
                    <!-- Exam 1 -->
                    <tr>
                        <td><?php echo $exam_det['exam_title'] ?></td>
                        <td><?php echo $exam_det['exam_desc'] ?></td>
                        <td><?php echo $course_det['course_title'] ?></td>
                        <td><?php echo $exam_det['exam_due_date'] ?></td>
                        <td><?php echo $exam_det['exam_total_marks'] ?></td>
                        <td>
                    <form action="viewexam.php" method="POST">
                    <input type="hidden" name="exam_id" value="<?php echo  $exam_det['exam_id']; ?>">
                    <button type="submit" class="action-button view">View</button>
                    </form>
                    </td>
                    <td>
                    <form action="updateexam.php" method="POST">
                    <input type="hidden" name="exam_id" value="<?php echo  $exam_det['exam_id']; ?>">
                    <button type="submit" class="action-button update">Update</button>
                    </form>
                    </td>
                    <td>
                    <form action="deletcourse.php" method="POST">
                    <input type="hidden" name="exam_id" value="<?php echo  $exam_det['exam_id']; ?>">
                    <button type="submit" class="action-button delete">Delete</button>
                    </form>
                    </td>
                    </tr>
                   
                    <!-- Add more exam rows as needed -->
                </tbody>
                <?php } ?>
            </table>
        </div>

    </div>
    <div class="exam-information">
        <h6>GRADE EXAMS</h6>
        <div class="responsivetable">
            <table class="exam-table">
                <thead>
                    <tr>
                        <th>Exam Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Exam 1 -->
                    <tr>
                        <td>Artificial Intelligence</td>
                        <td>This exam covers advanced AI concepts and applications.</td>
                        <td class="red">
                            Not Graded
                        </td>
                        <td>
                            <a href="providegrade.php" class="action-button grade">Grade Students</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Cloud Computing</td>
                        <td>This exam assesses your knowledge of cloud platforms and services.</td>
                        <td class="red">
                            Not Graded
                        </td>
                        <td>
                            <a href="providegrade.php" class="action-button grade">Grade Students</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Machine Learning</td>
                        <td>This exam assesses your knowledge of Machine platforms and services.</td>
                        <td class="green">
                            Graded
                        </td>
                        <td>
                            <a href="viewgrade.php" class="action-button view">View Grades</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Data Science</td>
                        <td>This exam assesses your knowledge of Data Science Concepts.</td>
                        <td class="green">
                            Graded
                        </td>
                        <td>
                            <a href="viewgrade.php" class="action-button view">View Grades</a>
                        </td>
                    </tr>
                    <!-- Add more exam rows as needed -->
                </tbody>
            </table>
        </div>

    </div>
    <a class="myBtn" href="teacherchat.php">
        <span class="icon"></span>
        Chat
      </a>
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