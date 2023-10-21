<?php
include_once('functions.php');
if (isset($_GET['program_co_id'])) {
    $programCo = getProgramCo($_GET['program_co_id']);
} else {
    header('location:adminProgramcopage.php');
}


if (isset($_POST['update_program_co'])) {
    if (updatePrgramCo()) {
        echo '<script>alert("Program Co Added Succesfully!")</script>';
        header('Location: updateprogramco.php?program_co_id=' . $_POST['program_co_id']);
    } else {
        echo '<script>alert("Failed!")</script>';
        header('Location: updateprogramco.php?program_co_id=' . $_POST['program_co_id']);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/adminheader.css">
    <link rel="stylesheet" type="text/css" href="css/profile.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
    <title>Update Program Coordinator</title>
    <script>
        function validateForm() {
            const name = document.getElementById('name').value;
            const department = document.getElementById('department').value;
            const email = document.getElementById('email').value;
            const phoneNumber = document.getElementById('phone_no').value;
            const fatherName = document.getElementById('father_name').value;
            const password = document.getElementById('password').value;
            const idNumber = document.getElementById('identity_no').value;
            const empId = document.getElementById('empId').value;
            console.log('Here')
            if (!name || !department || !email || !phoneNumber || !fatherName || !password || !idNumber || !empId) {
                alert('Please fill in all the required fields.');
                return false;
            }
            if (!isValidName(name)) {
                alert('Name should not contain special characters.');
                return false;
            }
            if (!isValidName(fatherName)) {
                alert('Father Name should not contain special characters.');
                return false;
            }
            if (!isValidName(department)) {
                alert('Department should not contain special characters.');
                return false;
            }
            if (!isValidEmail(email)) {
                alert('Please enter a valid email address.');
                return false;
            }
            if (!isValidPhoneNumber(phoneNumber)) {
                alert('Please enter a valid phone number.');
                return false;
            }
            if (!isValidPassword(password)) {
                alert('Password should be at least 6 characters long.');
                return false;
            }
            return true;
        }

        function isValidName(name) {
            const nameRegex = /^[A-Za-z\s]+$/;
            return nameRegex.test(name);
        }
        function isValidEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        function isValidPhoneNumber(phoneNumber) {
            const phoneRegex = /^\d+$/;
            return phoneRegex.test(phoneNumber);
        }

        function isValidPassword(password) {
            return password.length >= 6;
        }
    </script>
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
                <li><a class="active" href="adminProgramcopage.php">Program Coordinator</a></li>
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
    <!--PROFILE-->
    <div class="profile-card">
        <?php
        if ($programCo == false) {
            ?>
            <div class="profile-info">
                <h2>Program Coordinator Not Found!</h2>
            </div>
            <?php
        } else {
            $programcoData = mysqli_fetch_assoc($programCo);
            ?>
            <div class="profile-image">
                <img src="./images/secrratory.avif" alt="Profile Image">
            </div>
            <div class="profile-info">
                <form method="POST" onsubmit="return validateForm()">
                    <input type="text" name="program_co_id" hidden value="<?php echo $programcoData['program_co_id']; ?>" />
                    <h2>
                        <?php echo $programcoData['program_co_name'] ?>
                    </h2>
                    <div class="profile-details">
                        <!-- Row 1: Registration No, Identity No, Father's Name -->
                        <div class="detail-row">
                            <div class="detail-item">
                                <label for="name"><i class="fas fa-user-friends"></i> Name:</label>
                                <input type="text" id="name" placeholder="Program Coordinator's Name" name="name" autofocus
                                    value="<?php echo $programcoData['program_co_name'] ?>">
                            </div>
                            <div class="detail-item">
                                <label for="department"><i class="fas fa-building"></i> Department:</label>
                                <input type="text" id="department" placeholder="Your Department" name="department"
                                    value="<?php echo $programcoData['program_co_dept'] ?>">
                            </div>
                            <div class="detail-item">
                                <label for="phone_no"><i class="fas fa-phone"></i> Phone No:</label>
                                <input type="text" id="phone_no" placeholder="Your Phone No" name="phoneNumber"
                                    value="<?php echo $programcoData['program_co_phone_no'] ?>">
                            </div>

                        </div>

                        <!-- Row 2: Program, Semester -->
                        <div class="detail-row">
                            <div class="detail-item">
                                <label for="father_name"><i class="fas fa-user-friends"></i> Father's Name:</label>
                                <input type="text" id="father_name" placeholder="Father's Name" name="fatherName"
                                    value="<?php echo $programcoData['program_co_father_name'] ?>">
                            </div>
                            <div class="detail-item">
                                <label for="email"><i class="fas fa-envelope"></i> Email:</label>
                                <input type="email" id="email" placeholder="yourname@example.com" name="email"
                                    value="<?php echo $programcoData['program_co_email'] ?>">
                            </div>
                            <div class="detail-item">
                                <label for="identity_no"><i class="fas fa-id-card"></i> Identity No:</label>
                                <input type="text" id="identity_no" placeholder="Your Identity No" name="idNumber"
                                    value="<?php echo $programcoData['program_co_identity_no'] ?>">
                            </div>
                        </div>

                        <!-- Row 3: Email, Phone No -->
                        <div class="detail-row">
                            <div class="detail-item">
                                <label for="registration_no"><i class="fas fa-id-card"></i> Employee ID:</label>
                                <input type="text" id="empId" placeholder="Your Employee ID" name="empId"
                                    value="<?php echo $programcoData['employee_id'] ?>">
                            </div>
                            <div class="detail-item">
                                <label for="password"><i class="fas fa-lock"></i> Password:</label>
                                <input type="password" id="password" placeholder="Password" name="password"
                                    value="<?php echo $programcoData['program_co_password'] ?>">
                            </div>
                        </div>

                    </div>
                    <button class="edit-button" name="update_program_co" type="submit">Update</button>
                </form>
            </div>
            <?php
        }
        ?>


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
                <li><a class="active" href="adminportal.php">Home</a></li>
                <li><a href="adminstudentpage.php">Student</a></li>
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