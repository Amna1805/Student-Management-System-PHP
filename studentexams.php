<?php 
include_once('studentheader.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/studentexams.css">
    <link rel="stylesheet" type="text/css" href="css/imagewithtext.css">
    <link rel="stylesheet" type="text/css" href="css/chatbtn.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>

      

<div class="image-with-text">
        <div class="overlay"></div>
        <img src="./images/bg1.jpeg" alt="University Image">
        <div class="image-text-container">
            <h1 class="image-text">EXAMS</h1>
        </div>
    </div>


    <!---EXAMS-->
   
    <div class="exam-information">
        <h6>EXAMS INFORMATION</h6>
        <div class="responsivetable">
            <table class="exam-table">
                <thead>
                    <tr>
                        <th>Exam Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Due Date</th>
                        <th>Time Passed</th>
                        <th>Marks</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Exam 1 -->
                    <tr>
                        <td>Artificial Intelligence</td>
                        <td>This exam covers advanced AI concepts and applications.</td>
                        <td><a href="takeexam.php" class="status-button due">Take Exam</a></td>
                        <td>2023-11-05</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                    </tr>
                    <tr>
                        <td>Cloud Computing</td>
                        <td>This exam assesses your knowledge of cloud platforms and services.</td>
                        <td><button class="status-button completed">Completed</button></td>
                        <td>2023-10-10</td>
                        <td>2 days ago</td>
                        <td>7 out of 10</td>
                        <td>Great work!</td>
                    </tr>
                    <tr>
                        <td>Machine Learning</td>
                        <td>This exam assesses your knowledge of Machine platforms and services.</td>
                        <td><button class="status-button completed">Completed</button></td>
                        <td>2023-10-10</td>
                        <td>2 days ago</td>
                        <td>7 out of 10</td>
                        <td>Great work!</td>
                    </tr>
                     <tr>
                        <td>Data Science</td>
                        <td>This exam assesses your knowledge of Data Science Concepts.</td>
                        <td><button class="status-button expire">Expired</button></td>
                        <td>2023-11-05</td>
                        <td>0 out of 10</td>
                        <td>5 days ago</td>
                        <td>N/A</td>
                    </tr>
    
                    <!-- Add more exam rows as needed -->
                </tbody>
            </table>
        </div>
       
    </div>
    <a class="myBtn" href="studentchat.php">
        <span class="icon"></span>
        Chat
      </a>
</body>
</html>

<?php include_once('studentfooter.php'); ?>