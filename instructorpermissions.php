<?php
include_once('functions.php');
if (isset($_GET['instructor_id'])) {
    $instructor = getInstructor($_GET['instructor_id']);
    $instructorData = mysqli_fetch_assoc($instructor);
    $instructorPermissions = getInstructorPermission($_GET['instructor_id']);
    $allPermissions = getSpecificPermission(1);
    $checkedArray[] = "0";
    if ($instructorPermissions) {
        while ($row = mysqli_fetch_assoc($instructorPermissions)) {
            $checkedArray[] = $row['permission_id'];
        }
    }
} else {
    header('location:adminInstructorPage.php');
}

if (isset($_POST['update_instrcutor'])) {
    if (updateInstructorPermissions()) {
        echo '<script>alert("Instructor Added Succesfully!")</script>';
        header('Location: instructorpermissions.php?instructor_id=' . $_POST['instructor_id']);
    } else {
        echo '<script>alert("Failed!")</script>';
        header('Location: instructorpermissions.php?instructor_id=' . $_POST['instructor_id']);
    }
}
?>


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
    <title>Instructor Permissions</title>
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
                <li><a class="active" href="adminInstructorPage.php">Instructor</a></li>
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

    <div class="officer-section">
        <h2>Instructor</h2>
        <p>Employee ID:
            <?php echo $instructorData['employee_id'] ?>
        </p>
        <p>Name:
            <?php echo $instructorData['instructor_name'] ?>
        </p>
        <p>Designation:
            <?php echo $instructorData['instructor_designation'] ?>
        </p>
    </div>
    <!---PERMISSIONS-->
    <h1 class="heading">PERMISSIONS</h1>
    <div class="student-information">
        <form method="POST">
            <input type="text" name="instructor_id" hidden value="<?php echo $instructorData['instructor_id']; ?>" />
            <div class="responsivetable">
                <table class="student-table">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>Permissions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($allPermissions)) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $row['permission_action']; ?>
                                </td>
                                <td>
                                    <input type="checkbox" name="<?php echo $row['permission_action'] ?>"
                                        value="<?php echo $row['permission_id'] ?>" <?php if (in_array($row['permission_id'], $checkedArray))
                                               echo "checked"; ?>>
                                </td>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
            <div class="button-container">
                <button class="edit-button" name="update_instrcutor">Update</button>
            </div>
        </form>
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
                <li><a href="adminstudentpage.php">Student</a></li>
                <li><a class="active" href="adminInstructorPage.php">Instructor</a></li>
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