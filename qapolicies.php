<?php 
include_once('qaheader.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/portalheader.css">
    <link rel="stylesheet" type="text/css" href="css/imagewithtext.css">
    <link rel="stylesheet" type="text/css" href="css/policies.css">
    <link rel="stylesheet" type="text/css" href="css/chatbtn.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
    <title>QA Policies</title>
</head>

<body>
 
    <div class="image-with-text">
        <div class="overlay"></div>
        <img src="./images/bg1.jpeg" alt="University Image">
        <div class="image-text-container">
            <h1 class="image-text">POLICIES</h1>
        </div>
    </div>
    <a href="createpolicy.php" class="create-policy-button">Create New Policy</a>

    <!--POLICIES-->
    <div class="policy">
        <h6>Quality Assurance Policy</h6>
        <div class="responsivetable">
            <table class="policy-table">
                <thead>
                    <tr>
                        <th>Policy Title</th>
                        <th>Policy for</th>
                        <th>Last Updated</th>
                        <th colspan="3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Course 1 -->
                    <tr>
                        <td> Data Privacy</td>
                        <td>Instructor</td>
                        <td> September 21, 2023</td>
                        <td>
                            <a href="viewpolicy.php" class="action-button view">View</a>
                        </td>
                        <td>
                            <a href="updatepolicy.php" class="action-button update">Update</a>
                        </td>
                        <td>
                            <a href="deletecourse.php" class="action-button delete">Delete</a>
                        </td>
                    </tr>
                    <!-- Additional rows -->
                    <!-- Policy 2 -->
                    <tr>
                        <td>Student Code of Conduct</td>
                        <td>Student</td>

                        <td>September 22, 2023</td>
                        <td>
                            <a href="viewpolicy.php" class="action-button view">View</a>
                        </td>
                        <td>
                            <a href="updatepolicy.php" class="action-button update">Update</a>
                        </td>
                        <td>
                            <a href="deletecourse.php" class="action-button delete">Delete</a>
                        </td>
                    </tr>

                    <!-- Policy 3 -->
                    <tr>
                        <td>Faculty Recruitment Policy</td>
                        <td>Administrator</td>

                        <td>September 23, 2023</td>
                        <td>
                            <a href="viewpolicy.php" class="action-button view">View</a>
                        </td>
                        <td>
                            <a href="updatepolicy.php" class="action-button update">Update</a>
                        </td>
                        <td>
                            <a href="deletecourse.php" class="action-button delete">Delete</a>
                        </td>
                    </tr>

                    <!-- Policy 4 -->
                    <tr>
                        <td>Equal Opportunity Employment</td>
                        <td>HR Department</td>

                        <td>September 24, 2023</td>
                        <td>
                            <a href="viewpolicy.php" class="action-button view">View</a>
                        </td>
                        <td>
                            <a href="updatepolicy.php" class="action-button update">Update</a>
                        </td>
                        <td>
                            <a href="deletecourse.php" class="action-button delete">Delete</a>
                        </td>
                    </tr>

                </tbody>
            </table>

        </div>
    </div>
    <a class="myBtn" href="qachat.php">
        <span class="icon"></span>
        Chat
    </a>
  
</body>

</html>
<?php include_once('qafooter.php'); ?>