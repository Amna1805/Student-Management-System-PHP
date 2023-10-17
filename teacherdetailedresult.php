<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/portalheader.css">
    <link rel="stylesheet" type="text/css" href="css/detailedresult.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
    <title>Detailed Result</title>
</head>

<body>
    <!-- Header -->
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
    <!-- Detailed results -->
    <div class="Detail_container">
        <div class="coursename">
            <h1>Web Development</h1>
        </div>
        <div class="student_nameroll">
            <p><strong>Name: </strong>John Martini</p>
            <p><strong>Registration Number:</strong>013422453</p>
        </div>

        <div class="Tests">
            <h2>Tests</h2>
            <div class="three-tests">
                <div class="Test">
                    <h3>Test 1</h3>
                    <table>
                        <tr>
                            <th>Topic</th>
                            <th>Total Marks</th>
                            <th>Obtained Marks</th>
                            <th>Class Average</th>
                            <th>Remarks</th>
                        </tr>
                        <tr>
                            <td>HTML,CSS and JS</td>
                            <td>10</td>
                            <td>8</td>
                            <td>7.5</td>
                            <td class="test_remarks">
                                <p class="excellent">Excellent</p><br>
                               
                            </td>
                        </tr>
                    </table>
                    <div class="note">
                        <p>No Note Added</p>
                    </div>
                </div>
                <div class="Test">
                    <h3>Test 2</h3>
                    <table>
                        <tr>
                            <th>Topic</th>
                            <th>Total Marks</th>
                            <th>Obtained Marks</th>
                            <th>Class Average</th>
                            <th>Remarks</th>
                        </tr>
                        <tr>
                            <td>Backend and Web Security</td>
                            <td>10</td>
                            <td>6</td>
                            <td>7</td>
                            <td class="test_remarks">
                                <p class="good">Good</p><br>
                               
                            </td>
                        </tr>
                    </table>
                    <div class="note">
                        <p>No Note Added</p>
                    </div>
                </div>
                <div class="Test">
                    <h3>Test 3</h3>
                    <table>
                        <tr>
                            <th>Topic</th>
                            <th>Total Marks</th>
                            <th>Obtained Marks</th>
                            <th>Class Average</th>
                            <th>Remarks</th>
                        </tr>
                        <tr>
                            <td>Full-Stack Development</td>
                            <td>10</td>
                            <td>4</td>
                            <td>7.5</td>
                            <td class="test_remarks">
                                <p class="improve">Needs Improvement</p>
                               
                            </td>
                        </tr>
                    </table>
                    <div class="note">
                        <p>Conepts related to API and few concepts related to Back-end need more practice.</p>
                    </div>
                </div>

            </div>

        </div>
        <!-- Assignments -->
        <div class="Assignments">
            <h2>Assignments</h2>
            <div class="three-assignments">
                <div class="Assignment">
                    <h3>Assignment 1</h3>
                    <table>
                        <tr>
                            <th>Description</th>
                            <th>Total Marks</th>
                            <th>Obtained Marks</th>
                            <th>Class Average</th>
                            <th>Remarks</th>
                        </tr>
                        <tr>
                            <td>Front-End (Html, CSS, JS)</td>
                            <td>10</td>
                            <td>9</td>
                            <td>7.5</td>
                            <td class="Assignment_remarks">
                                <p class="excellent">Excellent</p><br>
                            </td>
                        </tr>
                    </table>
                    <div class="note">
                        <p>No Note Added</p>
                    </div>
                </div>


                <div class="Assignment">
                    <h3>Assignment 2</h3>
                    <table>
                        <tr>
                            <th>Description</th>
                            <th>Total Marks</th>
                            <th>Obtained Marks</th>
                            <th>Class Average</th>
                            <th>Remarks</th>
                        </tr>
                        <tr>
                            <td>Backend and Web Security</td>
                            <td>10</td>
                            <td>5</td>
                            <td>7.5</td>
                            <td class="Assignment_remarks">
                                <p class="improve">Needs Improvement</p>  
                            </td>
                            
                        </tr>
                    </table>
                    <div class="note">
                        <p>Improve backend concepts, focus more on NodeJS. Do proper testing to ensure security.</p>
                    </div>
                </div>


                <div class="Assignment">
                    <h3>Assignment 3</h3>
                    <table>
                        <tr>
                            <th>Topic</th>
                            <th>Total Marks</th>
                            <th>Obtained Marks</th>
                            <th>Class Average</th>
                            <th>Remarks</th>
                        </tr>
                        <tr>
                            <td>Full-Stack Development</td>
                            <td>10</td>
                            <td>7</td>
                            <td>6</td>
                            <td class="Assignment_remarks">
                                <p class="good">Good</p><br>
                               
                            </td>
                        </tr>
                    </table>
                    <div class="note">
                        <p>No Note Added</p>
                    </div>
                </div>
            </div>

        </div>
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