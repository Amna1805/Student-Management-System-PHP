<?php
// Start or resume session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['instructor'])) {
    // If not logged in, redirect to login page
    header("Location: instructorlogin.php");
    exit();
}
include_once('adminheader.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/adminheader.css">
    <link rel="stylesheet" type="text/css" href="css/imagewithtext.css">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link rel="stylesheet" type="text/css" href="css/chatbtn.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
    <title>Admin Portal</title>
</head>

<body>
<?php
 if (isset($_SESSION['admin'])) {
     // Access the student's information
     $admin = $_SESSION['admin'];
 
 } 
 ?>
   
    <div class="image-with-text">
        <div class="overlay"></div>
        <img src="./images/bg1.jpeg" alt="University Image">
        <div class="image-text-container">
        <h2 class="image-text">HELLO <span style="text-transform: capitalize;"><?php echo $admin['admin_name']; ?></span></h2>
            <h2 class="image-text">WELCOME TO ADMIN PORTAL!</h2>
        </div>
    </div>

    <div class="feature-container">
        <a href="adminstudentpage.php" class="feature-box">
            <div class="feature-text">Student</div>
            <img src="./images/student.webp" alt="Student Courses">
        </a>


        <a href="adminProgramcopage.php" class="feature-box">
            <div class="feature-text">Program Coordinator</div>
            <img src="./images/programcoordinator.jpg" alt="Program Coordinator Courses">
        </a>
        <a href="adminInstructorPage.php" class="feature-box">
            <div class="feature-text">Instructor</div>
            <img src="./images/instructor.jpg" alt="Instructor Courses">
        </a>

        <a href="adminQApage.php" class="feature-box">
            <div class="feature-text">QA Officer</div>
            <img src="./images/QA.jpg" alt="QA Officer Courses">
        </a>

    </div>
    <div class="statistics">
        <div class="icon-box">

            <div class="text">
                <i class="fas fa-user"></i>
                <h2>Students</h2>
            </div>
            <p>500</p>
        </div>

        <div class="icon-box">

            <div class="text">
                <i class="fas fa-chalkboard-teacher"></i>
                <h2>Instructors</h2>

            </div>
            <p>20</p>
        </div>

        <div class="icon-box">

            <div class="text">
                <i class="fas fa-book"></i>
                <h2>Courses</h2>

            </div>
            <p>25</p>
        </div>
        <div class="icon-box">

            <div class="text">
                <i class="fas fa-clipboard"></i>
                <h2>Exam Rate</h2>

            </div>
            <p>70%</p>
        </div>
    </div>
    <div class="user-activity">
        <h1 class="title">User Activity on Current Date</h1>
        <table class="activity-table">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Role</th>
                    <th>Action</th>
                    <th>Timestamp</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>User 1</td>
                    <td>Student</td>
                    <td>Logged in</td>
                    <td>2023-09-19 14:30:00</td>
                </tr>
                <tr>
                    <td>User 2</td>
                    <td>Instructor</td>
                    <td>Updated profile</td>
                    <td>2023-09-19 15:45:00</td>
                </tr>
                <!-- Add more rows for each user activity -->
            </tbody>
        </table>
        <div class="view-more">
            <span>View More</span>
            <i class="fas fa-chevron-down"></i>
        </div>
    </div>

    <div class="report-container">
        <h1 class="title">Program Performance</h1>
        <img src="./images/performance.png" class="chart">
    </div>
    <div class="report">
        <h1 class="title">Course Performance Report</h1>
        <div class="table-container">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>Course</th>
                        <th>Success Rate (%)</th>
                        <th>Average Score</th>
                        <th>Completion Rate (%)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Machine Learning</td>
                        <td>85</td>
                        <td>90</td>
                        <td>70</td>
                    </tr>
                    <tr>
                        <td>Cloud Computing</td>
                        <td>85</td>
                        <td>90</td>
                        <td>70</td>
                    </tr>
                    <tr>
                        <td>Data Science</td>
                        <td>85</td>
                        <td>90</td>
                        <td>70</td>
                    </tr>
                    <tr>
                        <td>Web Development</td>
                        <td>85</td>
                        <td>90</td>
                        <td>70</td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
            <div class="view-more">
                <span>View More</span>
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>
    </div>





    <a class="myBtn" href="adminchat.php">
        <span class="icon"></span>
        Chat
    </a>

 
    <script src="script.js"></script>
</body>

</html>
<?php 
include_once('adminfooter.php'); ?>