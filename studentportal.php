<?php
// Start or resume session
session_start();

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
    <link rel="stylesheet" type="text/css" href="css/imagewithtext.css">
    <link rel="stylesheet" type="text/css" href="css/features.css">
    <link rel="stylesheet" type="text/css" href="css/coursescard.css">
    <link rel="stylesheet" type="text/css" href="css/chatbtn.css">
    <title>Document</title>
</head>
<body>

 <?php
 if (isset($_SESSION['student'])) {
     // Access the student's information
     $student = $_SESSION['student'];
 
 } 
 ?>
 
<div class="image-with-text">
        <div class="overlay"></div>
        <img src="./images/bg1.jpeg" alt="University Image">
        <div class="image-text-container">
        <h2 class="image-text">HELLO <span style="text-transform: capitalize;"><?php echo $student['std_name']; ?></span></h2>
            <h2 class="image-text">WELCOME TO STUDENT PORTAL!</h2>
        </div>
    </div>

    <div class="feature-container">
        <a href="studentcourses.php" class="feature-box">
            <div class="feature-text">Courses</div>
            <img src="./images/courses.jpg" alt="Courses">
        </a>
        <a href="studentexams.php"  class="feature-box">
            <div class="feature-text">Exams</div>
            <img src="./images/exam.jpg" alt="Exams">
        </a>



        <a href="studentresults.php"  class="feature-box">
            <div class="feature-text">Results</div>
            <img src="./images/result.jpg" alt="Results">
        </a>
    </div>


    <div class="courses">
        <h6>SEMESTER:FALL 2023(Current)</h6>
        <div class="cards">
            <!--Course 1-->
            <a href="studentcoursepage.php"  class="card">
                <img src="images/Ai_ML.jpg" alt="Ai and ML">
                <h3>Artificial Intelligence and Machine Learning</h3>
                <p>Unlock the power of AI and ML. Dive into the world of intelligent algorithms, data-driven insights,
                    and autonomous systems. Navigate through advanced concepts, from deep learning to reinforcement
                    learning, and pave the way for a smarter future, where machines learn and adapt alongside you.</p>
                </a>
            <!-- Course 2-->
            <a href="studentcoursepage.php"  class="card">
                <img src="images/cyber_security.jpg" alt="Cyber Security">
                <h3>Advanced Security</h3>
                <p>Cybersecurity at its peak. Unleash advanced defense techniques, conquer cyber threats, and shield
                    critical assets. Master cutting-edge strategies to safeguard against modern attacks. Explore the
                    intricacies of ethical hacking and stay one step ahead in the digital battlefield, ensuring a secure
                    digital future.</p>
                </a>
            <!-- Course 3-->
            <a href="studentcoursepage.php"  class="card">
                <img src="images/database.png" alt="Database">
                <h3>Database Implementation</h3>
                <p>Database Implementation Mastery. Delve into the core of data management, database design, and
                    implementation. Explore advanced topics in database systems, SQL optimization, and scalability.
                    Elevate your expertise in crafting efficient, high-performance databases that drive modern
                    applications and empower businesses.</p>
                </a>
        </div>
    </div>
    <a class="myBtn" href="studentchat.php">
        <span class="icon"></span>
        Chat
      </a>
</body>
</html>

<?php include_once('studentfooter.php'); ?>