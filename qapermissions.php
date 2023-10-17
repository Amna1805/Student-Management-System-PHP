<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/adminheader.css">
    <link rel="stylesheet" type="text/css" href="css/permissions.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
    <title>QA Permissions</title>
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
                <li><a href="adminstudentpage.php">Student</a></li>
                <li><a href="adminInstructorPage.php">Instructor</a></li>
                <li><a href="adminProgramcopage.php">Program Coordinator</a></li>
                <li><a class="active" href="adminQApage.php">QA Officer</a></li>
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
    <div class="officer-section">
        <h2>QA Officer</h2>
        <p>Employee ID: 123456</p>
        <p>Name: John Doe</p>
        <p>Designation: Quality Assurance Officer Team Lead</p>
    </div>
    <!---PERMISSIONS-->
    <h1 class="heading">PERMISSIONS</h1>
    <div class="student-information">
        <div class="responsivetable">
            <table class="student-table">
                <thead>
                    <tr>
                        <th>Action</th>
                        <th>Permissions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>View Program Policies</td>
                        <td><input type="checkbox" checked></td>
                    </tr>
                    <tr>
                        <td>Add/Update/Delete Program Policies</td>
                        <td><input type="checkbox" checked></td>
                    </tr>
                    <tr>
                        <td>View Program Objectives</td>
                        <td><input type="checkbox" checked></td>
                    </tr>
                    <tr>
                        <td>Add/Update/Delete Program Objectives</td>
                        <td><input type="checkbox"></td>
                    </tr>
                    <tr>
                        <td>View Courses</td>
                        <td><input type="checkbox" checked></td>
                    </tr>
                    <tr>
                        <td>Add/Update/Delete Courses</td>
                        <td><input type="checkbox"></td>
                    </tr>
                    <tr>
                        <td>View Course Content</td>
                        <td><input type="checkbox" checked></td>
                    </tr>
                    <tr>
                        <td>Add/Update/Delete Course Content</td>
                        <td><input type="checkbox"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Inside the student-information div -->
        <div class="button-container">
            <button class="edit-button">Update</button>
        </div>

    </div>

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