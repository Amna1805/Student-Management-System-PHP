<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/portalheader.css">
    <link rel="stylesheet" type="text/css" href="css/imagewithtext.css">
    <link rel="stylesheet" type="text/css" href="css/programcoinquirires.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
    <title>Program Coordinator Queries</title>
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
                        <li><a href="programcoordinatorprofile.php">Profile</a></li>
                        <li><a href="home.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="navmenu">
                <li><a href="programcoordinatorportal.php">Home</a></li>
                <li><a href="studentperformance.php">Student Performance</a></li>
                <li><a  class="active"  href="inquiries.php">Inquiries</a></li>
                <li class="hidethem"><a href="programcoordinatorprofile.php">Profile</a></li>
                <li class="hidethem"><a href="home.php">Logout</a></li>
              
            </ul>
        </nav>
        <section></section>
    </header>
    <div class="image-with-text">
        <div class="overlay"></div>
        <img src="./images/bg1.jpeg" alt="University Image">
        <div class="image-text-container">
            <h1 class="image-text">QUERIES</h1>
        </div>
    </div>


    <!--Queries-->
    <div class="policy">
        <h6>Latest Queries</h6>
        <div class="responsivetable">
            <table class="policy-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Registration NO.</th>
                        <th>Query</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Course 1 -->
                    <tr>
                        <td>Student 1</td>
                        <td>1298443</td>
                        <td> 
                            <p>Inquiry Regarding Program Details</p>
                        </td>
                        <td>Haven't Replied</td>
                        <td>
                            <a href="queryreply.php" class="action-button provide">Reply</a>
                        </td>

                    </tr>
                    <!-- Additional rows -->
                    <!-- Policy 2 -->
                    <tr>
                        <td>Student 2</td>
                        <td>1298454</td>
                        <td> 
                            <p>Admission Requirements Inquiry</p>
                        </td>
                        <td>Haven't Replied</td>
                        <td>
                            <a href="queryreply.php" class="action-button provide">Reply</a>
                        </td>
                    </tr>

                    <!-- Policy 3 -->
                    <tr>
                        <td>Student 3</td>
                        <td>1298442</td>
                        <td> 
                            <p>Tuition and Financial Aid Information Needed</p>
                        </td>
                        <td>Haven't Replied</td>
                        <td>
                            <a href="queryreply.php" class="action-button provide">Reply</a>
                        </td>
                    </tr>

                    <!-- Policy 4 -->
                    <tr>
                        <td>Student 1</td>
                        <td>1298443</td>
                        <td> 
                            <p>Clarification on Class Schedule</p>
                        </td>
                        <td>Replied</td>
                        <td>
                            <a href="queryview.php" class="action-button view">View</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Student 1</td>
                        <td>1298443</td>
                        <td> 
                            <p>Faculty and Instructor Qualifications Query</p>
                        </td>
                        <td>Replied</td>
                        <td>
                            <a href="queryview.php" class="action-button view">View</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Student 1</td>
                        <td>1298443</td>
                        <td> 
                            <p>Faculty and Instructor Qualifications Query</p>
                        </td>
                        <td>Replied</td>
                        <td>
                            <a href="queryview.php" class="action-button view">View</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Student 1</td>
                        <td>1298443</td>
                        <td> 
                            <p>Faculty and Instructor Qualifications Query</p>
                        </td>
                        <td>Replied</td>
                        <td>
                            <a href="queryview.php" class="action-button view">View</a>
                        </td>
                    </tr>
                    


                </tbody>
            </table>

        </div>
    </div>


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
                <li><a class="active" href="programcoordinatorportal.php">Home</a></li>
                <li><a href="studentperformance.php">Student Performance</a></li>
                <li><a href="inquiries.php">Inquiries</a></li>
                <li><a href="programcoordinatorprofile.php">Profile</a></li>
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