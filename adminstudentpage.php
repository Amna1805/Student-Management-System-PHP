<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/adminheader.css">
    <link rel="stylesheet" type="text/css" href="css/imagewithtext.css">
    <link rel="stylesheet" type="text/css" href="css/adminpage.css">
    <link rel="stylesheet" type="text/css" href="css/chatbtn.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
    <title>Monitor Students</title>
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
            <ul>
                <li><a href="adminportal.php">Home</a></li>
                <li><a class="active" href="adminstudentpage.php">Student</a></li>
                <li><a href="adminInstructorPage.php">Instructor</a></li>
                <li><a href="adminProgramcopage.php">Program Coordinator</a></li>
                <li><a href="adminQApage.php">QA Officer</a></li>
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
                        <li><a href="adminprofile.php">Profile</a></li>
                        <li><a href="home.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <section></section>
    </header>
    <div class="image-with-text">
        <div class="overlay"></div>
        <img src="./images/bg1.jpeg" alt="University Image">
        <div class="image-text-container">
            <h1 class="image-text">Students</h1>
        </div>
    </div>
    <a href="createstudent.php" class="create-course-button">Create New Student</a>

    <!---EXAMS-->

    <div class="role-information">
        <h6>STUDENTS </h6>
        <p><strong>Batch: </strong>2021-2023</p>
        <div class="responsivetable">
            <table class="role-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Registration Number</th>
                        <th colspan="4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Student 1 -->
                    <tr>
                        <td>Student 1</td>
                        <td>146832501</td>
                        <td>
                            <a href="viewstudent.php" class="action-button view">View</a>
                        </td>
                        <td>
                            <a href="updatestudent.php" class="action-button update">Update</a>
                        </td>
                        <td>
                            <a href="deleteexam.php" class="action-button delete">Delete</a>
                        </td>
                        <td>
                            <a href="studentactivities.php" class="action-button monitor">Monitor</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Student 1</td>
                        <td>146832501</td>
                        <td>
                            <a href="viewstudent.php" class="action-button view">View</a>
                        </td>
                        <td>
                            <a href="updatestudent.php" class="action-button update">Update</a>
                        </td>
                        <td>
                            <a href="deleteexam.php" class="action-button delete">Delete</a>
                        </td>
                        <td>
                            <a href="studentactivities.php" class="action-button monitor">Monitor</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Student 1</td>
                        <td>146832501</td>
                        <td>
                            <a href="viewstudent.php" class="action-button view">View</a>
                        </td>
                        <td>
                            <a href="updatestudent.php" class="action-button update">Update</a>
                        </td>
                        <td>
                            <a href="deleteexam.php" class="action-button delete">Delete</a>
                        </td>

                        <td>
                            <a href="studentactivities.php" class="action-button monitor">Monitor</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Student 1</td>
                        <td>146832501</td>
                        <td>
                            <a href="viewstudent.php" class="action-button view">View</a>
                        </td>
                        <td>
                            <a href="updatestudent.php" class="action-button update">Update</a>
                        </td>
                        <td>
                            <a href="deleteexam.php" class="action-button delete">Delete</a>
                        </td>

                        <td>
                            <a href="studentactivities.php" class="action-button monitor">Monitor</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Student 1</td>
                        <td>146832501</td>
                        <td>
                            <a href="viewstudent.php" class="action-button view">View</a>
                        </td>
                        <td>
                            <a href="updatestudent.php" class="action-button update">Update</a>
                        </td>
                        <td>
                            <a href="deleteexam.php" class="action-button delete">Delete</a>
                        </td>
                        <td>
                            <a href="studentactivities.php" class="action-button monitor">Monitor</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Student 1</td>
                        <td>146832501</td>
                        <td>
                            <a href="viewstudent.php" class="action-button view">View</a>
                        </td>
                        <td>
                            <a href="updatestudent.php" class="action-button update">Update</a>
                        </td>
                        <td>
                            <a href="deleteexam.php" class="action-button delete">Delete</a>
                        </td>
                        <td>
                            <a href="studentactivities.php" class="action-button monitor">Monitor</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Student 1</td>
                        <td>146832501</td>
                        <td>
                            <a href="viewstudent.php" class="action-button view">View</a>
                        </td>
                        <td>
                            <a href="updatestudent.php" class="action-button update">Update</a>
                        </td>
                        <td>
                            <a href="deleteexam.php" class="action-button delete">Delete</a>
                        </td>

                        <td>
                            <a href="studentactivities.php" class="action-button monitor">Monitor</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Student 1</td>
                        <td>146832501</td>
                        <td>
                            <a href="viewstudent.php" class="action-button view">View</a>
                        </td>
                        <td>
                            <a href="updatestudent.php" class="action-button update">Update</a>
                        </td>
                        <td>
                            <a href="deleteexam.php" class="action-button delete">Delete</a>
                        </td>

                        <td>
                            <a href="studentactivities.php" class="action-button monitor">Monitor</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Student 1</td>
                        <td>146832501</td>
                        <td>
                            <a href="viewstudent.php" class="action-button view">View</a>
                        </td>
                        <td>
                            <a href="updatestudent.php" class="action-button update">Update</a>
                        </td>
                        <td>
                            <a href="deleteexam.php" class="action-button delete">Delete</a>
                        </td>

                        <td>
                            <a href="studentactivities.php" class="action-button monitor">Monitor</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Student 1</td>
                        <td>146832501</td>
                        <td>
                            <a href="viewstudent.php" class="action-button view">View</a>
                        </td>
                        <td>
                            <a href="updatestudent.php" class="action-button update">Update</a>
                        </td>
                        <td>
                            <a href="deleteexam.php" class="action-button delete">Delete</a>
                        </td>

                        <td>
                            <a href="studentactivities.php" class="action-button monitor">Monitor</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Student 1</td>
                        <td>146832501</td>
                        <td>
                            <a href="viewstudent.php" class="action-button view">View</a>
                        </td>
                        <td>
                            <a href="updatestudent.php" class="action-button update">Update</a>
                        </td>
                        <td>
                            <a href="deleteexam.php" class="action-button delete">Delete</a>
                        </td>

                        <td>
                            <a href="studentactivities.php" class="action-button monitor">Monitor</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Student 1</td>
                        <td>146832501</td>
                        <td>
                            <a href="viewstudent.php" class="action-button view">View</a>
                        </td>
                        <td>
                            <a href="updatestudent.php" class="action-button update">Update</a>
                        </td>
                        <td>
                            <a href="deleteexam.php" class="action-button delete">Delete</a>
                        </td>

                        <td>
                            <a href="studentactivities.php" class="action-button monitor">Monitor</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
    <a class="myBtn" href="adminchat.php">
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
                <li><a href="adminportal.php">Home</a></li>
                <li><a class="active" href="adminstudentpage.php">Student</a></li>
                <li><a href="adminInstructorPage.php">Instructor</a></li>
                <li><a href="adminProgramcopage.php">Program Coordinator</a></li>
                <li><a href="adminQApage.php">QA Officer</a></li>
                <li><a href="adminprofile.php">Profile</a></li>
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