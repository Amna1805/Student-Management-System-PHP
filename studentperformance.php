<?php 
include_once('programcoheader.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Performance</title>
    <link rel="stylesheet" type="text/css" href="css/portalheader.css">
    <link rel="stylesheet" type="text/css" href="css/studentperformance.css">
    <link rel="stylesheet" type="text/css" href="css/chatbtn.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
</head>

<body>
  
    <div class="grid-container">
        <div class="item1">
            <label for="programSelect">Program:</label>
            <select id="programSelect">
                <option value="MSC">MSC</option>
            </select>
        </div>
        <div class="item2">
            <label for="courseSelect">Course:</label>
            <select id="courseSelect">
                <option value="MATHS">Machine Learning</option>
            </select>
        </div>
        <div class="item3">
            <label for="studentSelect">Student:</label>
            <select id="studentSelect">
                <option value="STUDENT 1">STUDENT 1</option>
            </select> 
        </div> 
        <div class="item4">
            <label for="semesterSelect">Semester:</label>
            <select id="semesterSelect">
                <option value="1">1</option>
            </select>
        </div>
    </div>
    <div class="image-container">
        <div class="item5">
            <img src="./images/piechart.png" alt="Image 1">
        </div>
        <div class="item6">
            <img src="./images/barchart.png" alt="Image 2">
        </div>
    </div>
    <a class="myBtn" href="programcoordinatorchat.php">
        <span class="icon"></span>
        Chat
      </a>
   

</body>

</html>
<?php 
include_once('programcofooter.php'); ?>