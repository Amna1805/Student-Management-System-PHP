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

    <div class="courses">
        <h6>My Courses</h6>
    <div class="responsivetable">
        <table class="course-table">
            <thead>
                <tr>
                    <th>Course Name</th>
                    <th>Credits</th>
                    <th>Hours</th>
                    <th colspan="3">Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Course 1 -->
                <tr>
                    <td>Artificial Intelligence and Machine Learning</td>
                    <td>3</td>
                    <td>45</td>
                    <td>
                        <a href="viewcourse.php" class="action-button view">View</a>
                    </td>
                    <td>
                        <a href="updatecourse.php" class="action-button update">Update</a>
                    </td>
                    <td>
                        <a href="deletecourse.php" class="action-button delete">Delete</a>
                    </td>
                </tr>

                <!-- Course 2 -->
                <tr>
                    <td>Advanced Security</td>
                    <td>4</td>
                    <td>60</td>
                    <td>
                        <a href="viewcourse.php" class="action-button view">View</a>
                    </td>
                    <td>
                        <a href="updatecourse.php" class="action-button update">Update</a>
                    </td>
                    <td>
                        <a href="deletecourse.php" class="action-button delete">Delete</a>
                    </td>
                </tr>

                <!-- Course 3 -->
                <tr>
                    <td>Database Implementation</td>
                    <td>3</td>
                    <td>40</td>
                    <td>
                        <a href="createcourse.php" class="action-button view">View</a>
                    </td>
                    <td>
                        <a href="updatecourse.php" class="action-button update">Update</a>
                    </td>
                    <td>
                        <a href="deletecourse.php" class="action-button delete">Delete</a>
                    </td>
                </tr>
                <!-- Course 4 -->
                <tr>
                    <td>Web Development</td>
                    <td>3</td>
                    <td>40</td>
                    <td>
                        <a href="viewcourse.php" class="action-button view">View</a>
                    </td>
                    <td>
                        <a href="updatecourse.php" class="action-button update">Update</a>
                    </td>
                    <td>
                        <a href="deletecourse.php" class="action-button delete">Delete</a>
                    </td>
            </tbody>
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