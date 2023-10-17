<?php 
include_once('qaheader.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/portalheader.css">
    <link rel="stylesheet" type="text/css" href="css/imagewithtext.css">
    <link rel="stylesheet" type="text/css" href="css/recomendations.css">
    <link rel="stylesheet" type="text/css" href="css/chatbtn.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
    <title>QA Recomendations</title>
</head>

<body>
  
    <div class="image-with-text">
        <div class="overlay"></div>
        <img src="./images/bg1.jpeg" alt="University Image">
        <div class="image-text-container">
            <h1 class="image-text">RECOMENDATIONS</h1>
        </div>
    </div>
    <a href="createrecomendation.php" class="create-recomendation-button">Create New Recomendation</a>

    <!--POLICIES-->
    <div class="recomendation">
        <h6>Recomendations for Instructors</h6>
        <div class="responsivetable">
            <table class="recomendation-table">
                <thead>
                    <tr>
                        <th>Recomendation Title</th>
                        <th>Related to</th>
                        <th>Last Updated</th>
                        <th colspan="3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Improving Assessment Techniques</td>
                        <td>Assessments</td>
                        <td>2023-09-21</td>
                        <td><a class="action-button view" href="viewrecomendation.php">View</a></td>
                        <td><a class="action-button update" href="updaterecomendation.php">Update</a></td>
                        <td><a class="action-button delete">Delete</a></td>
                    </tr>
                    <tr>
                        <td>Enhancing Classroom Engagement</td>
                        <td>Teaching Methods</td>
                        <td>2023-09-18</td>
                        <td><a class="action-button view" href="viewrecomendation.php">View</a></td>
                        <td><a class="action-button update" href="updaterecomendation.php">Update</a></td>
                        <td><button class="action-button delete">Delete</button></td>
                    </tr>
                    <!-- Add more rows as needed -->
                    <tr>
                        <td>Streamlining Program Curriculum</td>
                        <td>Program Effectiveness</td>
                        <td>2023-09-15</td>
                        <td><a class="action-button view" href="viewrecomendation.php">View</a></td>
                        <td><a class="action-button update" href="updaterecomendation.php">Update</a></td>
                        <td><button class="action-button delete">Delete</button></td>
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