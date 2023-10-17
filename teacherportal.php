<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/portalheader.css">
    <link rel="stylesheet" type="text/css" href="css/imagewithtext.css">
    <link rel="stylesheet" type="text/css" href="css/features.css">
    <link rel="stylesheet" type="text/css" href="css/coursescard.css">
    <link rel="stylesheet" type="text/css" href="css/chatbtn.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
    <title>Teacher Portal</title>
</head>

<body>
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
                <li><a class="active" href="teacherportal.php">Home</a></li>
                <li><a href="teachercourses.php">Courses</a></li>
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
            <h2 class="image-text">WELCOME TO TEACHER PORTAL!</h2>
        </div>
    </div>

    <div class="feature-container">
        <a href="teachercourses.php" class="feature-box">
            <div class="feature-text">Courses</div>
            <img src="./images/courses.jpg" alt="Courses">
        </a>
        <a href="teacherexams.php"  class="feature-box">
            <div class="feature-text">Exams</div>
            <img src="./images/exam.jpg" alt="Exams">
        </a>



        <a href="teacherresults.php"  class="feature-box">
            <div class="feature-text">Results</div>
            <img src="./images/result.jpg" alt="Results">
        </a>
    </div>


    <div class="courses">
        <h6>MY COURSES</h6>
        <div class="cards">
            <!--Course 1-->
            <a href="teachercoursepage.php"  class="card">
                <img src="images/Ai_ML.jpg" alt="Ai and ML">
                <h3>Artificial Intelligence and Machine Learning</h3>
                <p>Unlock the power of AI and ML. Dive into the world of intelligent algorithms, data-driven insights,
                    and autonomous systems. Navigate through advanced concepts, from deep learning to reinforcement
                    learning, and pave the way for a smarter future, where machines learn and adapt alongside you.</p>
                </a>
            <!-- Course 2-->
            <a href="teachercoursepage.php"  class="card">
                <img src="images/cyber_security.jpg" alt="Cyber Security">
                <h3>Advanced Security</h3>
                <p>Cybersecurity at its peak. Unleash advanced defense techniques, conquer cyber threats, and shield
                    critical assets. Master cutting-edge strategies to safeguard against modern attacks. Explore the
                    intricacies of ethical hacking and stay one step ahead in the digital battlefield, ensuring a secure
                    digital future.</p>
                </a>
            <!-- Course 3-->
            <a href="teachercoursepage.php"  class="card">
                <img src="images/database.png" alt="Database">
                <h3>Database Implementation</h3>
                <p>Database Implementation Mastery. Delve into the core of data management, database design, and
                    implementation. Explore advanced topics in database systems, SQL optimization, and scalability.
                    Elevate your expertise in crafting efficient, high-performance databases that drive modern
                    applications and empower businesses.</p>
                </a>
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
                <li><a class="active" href="teacherportal.php">Home</a></li>
                <li><a href="teachercourses.php">Courses</a></li>
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