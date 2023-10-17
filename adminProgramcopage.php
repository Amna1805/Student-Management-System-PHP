<?php 
include_once('adminheader.php'); ?>
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
    <title>Monitor Program Coordinator</title>
</head>

<body>
  
    <div class="image-with-text">
        <div class="overlay"></div>
        <img src="./images/bg1.jpeg" alt="University Image">
        <div class="image-text-container">
            <h1 class="image-text">Program Coordinators</h1>
        </div>
    </div>
    <a href="createprogramco.php" class="create-course-button">Add New Coordinator</a>

    <!---EXAMS-->

    <div class="role-information">
        <h6>PROGRAM COORDINATORS</h6>

        <div class="responsivetable">
            <table class="role-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Employee Id</th>
                        <th colspan="5">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Coordinator 1 -->
                    <tr>
                        <td>Coordinator 1</td>
                        <td>287608765</td>
                        <td>
                            <a href="viewprogramco.php" class="action-button view">View</a>
                        </td>
                        <td>
                            <a href="updateprogramco.php" class="action-button update">Update</a>
                        </td>
                        <td>
                            <a href="deleteexam.php" class="action-button delete">Delete</a>
                        </td>
                        <td>
                            <a href="programcopermissions.php" class="action-button permission">Permissions</a>
                        </td>
                        <td>
                            <a href="programcoactivities.php" class="action-button monitor">Monitor</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Coordinator 1</td>
                        <td>287608765</td>
                        <td>
                            <a href="viewprogramco.php" class="action-button view">View</a>
                        </td>
                        <td>
                            <a href="updateprogramco.php" class="action-button update">Update</a>
                        </td>
                        <td>
                            <a href="deleteexam.php" class="action-button delete">Delete</a>
                        </td>
                        <td>
                            <a href="programcopermissions.php" class="action-button permission">Permissions</a>
                        </td>
                        <td>
                            <a href="programcoactivities.php" class="action-button monitor">Monitor</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Coordinator 1</td>
                        <td>287608765</td>
                        <td>
                            <a href="viewprogramco.php" class="action-button view">View</a>
                        </td>
                        <td>
                            <a href="updateprogramco.php" class="action-button update">Update</a>
                        </td>
                        <td>
                            <a href="deleteexam.php" class="action-button delete">Delete</a>
                        </td>
                        <td>
                            <a href="programcopermissions.php" class="action-button permission">Permissions</a>
                        </td>
                        <td>
                            <a href="programcoactivities.php" class="action-button monitor">Monitor</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Coordinator 1</td>
                        <td>287608765</td>
                        <td>
                            <a href="viewprogramco.php" class="action-button view">View</a>
                        </td>
                        <td>
                            <a href="updateprogramco.php" class="action-button update">Update</a>
                        </td>
                        <td>
                            <a href="deleteexam.php" class="action-button delete">Delete</a>
                        </td>
                        <td>
                            <a href="programcopermissions.php" class="action-button permission">Permissions</a>
                        </td>
                        <td>
                            <a href="programcoactivities.php" class="action-button monitor">Monitor</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Coordinator 1</td>
                        <td>287608765</td>
                        <td>
                            <a href="viewprogramco.php" class="action-button view">View</a>
                        </td>
                        <td>
                            <a href="updateprogramco.php" class="action-button update">Update</a>
                        </td>
                        <td>
                            <a href="deleteexam.php" class="action-button delete">Delete</a>
                        </td>
                        <td>
                            <a href="programcopermissions.php" class="action-button permission">Permissions</a>
                        </td>
                        <td>
                            <a href="programcoactivities.php" class="action-button monitor">Monitor</a>
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

</body>

</html>
<?php 
include_once('adminfooter.php'); ?>