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
                <li><a  class="active" href="teacherresults.php">Results</a></li>
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
        <h6>Course: Cloud Computing</h6> <!-- Change the course name as needed -->
        <div class="view-all">
            <span>View all</span>
            <i class="fas fa-arrow-right"></i>
        </div>
        <div class="responsivetable">
            <table class="resultstable">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Registration No</th>
                        <th>Total Marks (100)</th>
                        <th>GPA</th>
                        <th>CGPA</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Student 1 -->
                    <tr>
                        <td>Student 1</td>
                        <td>123456</td>
                        <td>67</td>
                        <td>3.7</td>
                        <td>3.5</td>
                        <td><a href="teacherdetailedresult.php" class="view-button">View Details</a></td>
                    </tr>

                    <!-- Student 2 -->
                    <tr>
                        <td>Student 2</td>
                        <td>654321</td>
                        <td>39</td>
                        <td>3.5</td>
                        <td>3.6</td>
                        <td><a href="teacherdetailedresult.php" class="view-button">View Details</a></td>
                    </tr>
                    <tr>
                        <td>Student 2</td>
                        <td>654321</td>
                        <td>88</td>
                        <td>3.5</td>
                        <td>3.6</td>
                        <td><a href="teacherdetailedresult.php" class="view-button">View Details</a></td>
                    </tr>
                    <tr>
                        <td>Student 2</td>
                        <td>654321</td>
                        <td>55</td>
                        <td>3.5</td>
                        <td>3.6</td>
                        <td><a href="teacherdetailedresult.php" class="view-button">View Details</a></td>
                    </tr>
                    <tr>
                        <td colspan="5"><strong>Total Students</strong></td>
                        <td colspan="1">55</td>
                    </tr>
                    <tr>
                        <td colspan="5"><strong>Passed Students</strong></td>
                        <td colspan="1">40</td>
                    </tr>
                    <tr>
                        <td colspan="5"><strong>Average Pecentage</strong></td>
                        <td colspan="1">80%</td>
                    </tr>
                    <!-- Add more students and their details as needed -->
                </tbody>
            </table>
        </div>
    </div>
    <div class="results">
        <h6>Course: Machine Learning</h6> <!-- Change the course name as needed -->
        <div class="view-all">
            <span>View all</span>
            <i class="fas fa-arrow-right"></i>
        </div>
        <div class="responsivetable">
            <table class="resultstable">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Registration No</th>
                        <th>Total Marks (100)</th>
                        <th>GPA</th>
                        <th>CGPA</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Student 1 -->
                    <tr>
                        <td>Student 1</td>
                        <td>123456</td>
                        <td>67</td>
                        <td>3.7</td>
                        <td>3.5</td>
                        <td><a href="teacherdetailedresult.php" class="view-button">View Details</a></td>
                    </tr>

                    <!-- Student 2 -->
                    <tr>
                        <td>Student 2</td>
                        <td>654321</td>
                        <td>39</td>
                        <td>3.5</td>
                        <td>3.6</td>
                        <td><a href="teacherdetailedresult.php" class="view-button">View Details</a></td>
                    </tr>
                    <tr>
                        <td>Student 2</td>
                        <td>654321</td>
                        <td>88</td>
                        <td>3.5</td>
                        <td>3.6</td>
                        <td><a href="teacherdetailedresult.php" class="view-button">View Details</a></td>
                    </tr>
                    <tr>
                        <td>Student 2</td>
                        <td>654321</td>
                        <td>55</td>
                        <td>3.5</td>
                        <td>3.6</td>
                        <td><a href="teacherdetailedresult.php" class="view-button">View Details</a></td>
                    </tr>
                    <tr>
                        <td colspan="5"><strong>Total Students</strong></td>
                        <td colspan="1">55</td>
                    </tr>
                    <tr>
                        <td colspan="5"><strong>Passed Students</strong></td>
                        <td colspan="1">40</td>
                    </tr>
                    <tr>
                        <td colspan="5"><strong>Average Pecentage</strong></td>
                        <td colspan="1">80%</td>
                    </tr>
                    <!-- Add more students and their details as needed -->
                </tbody>
            </table>
        </div>
    </div>
    <div class="results">
        <h6>Course: Data Science</h6> <!-- Change the course name as needed -->
        <div class="view-all">
            <span>View all</span>
            <i class="fas fa-arrow-right"></i>
        </div>
        <div class="responsivetable">
            <table class="resultstable">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Registration No</th>
                        <th>Total Marks (100)</th>
                        <th>GPA</th>
                        <th>CGPA</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Student 1 -->
                    <tr>
                        <td>Student 1</td>
                        <td>123456</td>
                        <td>67</td>
                        <td>3.7</td>
                        <td>3.5</td>
                        <td><a href="teacherdetailedresult.php" class="view-button">View Details</a></td>
                    </tr>

                    <!-- Student 2 -->
                    <tr>
                        <td>Student 2</td>
                        <td>654321</td>
                        <td>39</td>
                        <td>3.5</td>
                        <td>3.6</td>
                        <td><a href="teacherdetailedresult.php" class="view-button">View Details</a></td>
                    </tr>
                    <tr>
                        <td>Student 2</td>
                        <td>654321</td>
                        <td>88</td>
                        <td>3.5</td>
                        <td>3.6</td>
                        <td><a href="teacherdetailedresult.php" class="view-button">View Details</a></td>
                    </tr>
                    <tr>
                        <td>Student 2</td>
                        <td>654321</td>
                        <td>55</td>
                        <td>3.5</td>
                        <td>3.6</td>
                        <td><a href="teacherdetailedresult.php" class="view-button">View Details</a></td>
                    </tr>
                    <tr>
                        <td colspan="5"><strong>Total Students</strong></td>
                        <td colspan="1">55</td>
                    </tr>
                    <tr>
                        <td colspan="5"><strong>Passed Students</strong></td>
                        <td colspan="1">40</td>
                    </tr>
                    <tr>
                        <td colspan="5"><strong>Average Pecentage</strong></td>
                        <td colspan="1">80%</td>
                    </tr>
                    <!-- Add more students and their details as needed -->
                </tbody>
            </table>
        </div>
    </div>
    <div class="view-more">
        <span>View More</span>
        <i class="fas fa-chevron-down"></i>
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