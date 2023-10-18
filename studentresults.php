<?php 
include_once('studentheader.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/studentresults.css">
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
            <h1 class="image-text">RESULTS</h1>
        </div>
    </div>


    <!---RESULTS-->
    <div class="results">
        <h6>SEMESTER:FALL 2023(Current)</h6>
        <a href="studentdetailedresult.php" class="view-all">
            <span>View all</span>
            <i class="fas fa-arrow-right"></i>
        </a>
      <div class="responsivetable">    
        <table class="resultstable">
        <thead>
            <tr>
                <th>Course</th>
                <th>Assessment 1</th>
                <th>Assessment 2</th>
                <th>Assessment 3</th>
                <th>Sessional Marks</th>
                <th>Mid Marks</th>
                <th>Final Marks</th>
                <th>Grade</th>
                <th>GPA</th>
            </tr>
        </thead>
        <tbody>
            <!-- Course 1 -->
            <tr>
                <td>Artificial Intelligence and Machine Learning</td>
                <td>20</td>
                <td>85</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

            <!-- Course 2 -->
            <tr>
                <td>Advanced Security</td>
                <td>22</td>
                <td>78</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <!-- Course 3-->
            <tr>
                <td>Database Implementation</td>
                <td>20</td>
                <td>85</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="8">Overall CGPA</td>
                <td></td> <!-- Example CGPA value -->
            </tr>
            <!-- Add more courses and their details as needed -->

        </tbody>
    </table></div>
    
    </div>
    <div class="results">
        <h6>SEMESTER:SPRING 2023(2nd)</h6>
        <a href="studentdetailedresult.php" class="view-all">
            <span>View all</span>
            <i class="fas fa-arrow-right"></i>
        </a>
        <div class="responsivetable">
             <table class="resultstable">
            <thead>
                <tr>
                    <th>Course</th>
                    <th>Assessment 1</th>
                    <th>Assessment 2</th>
                    <th>Assessment 3</th>
                    <th>Sessional Marks</th>
                    <th>Mid Marks</th>
                    <th>Final Marks</th>
                    <th>Grade</th>
                    <th>GPA</th>
                </tr>
            </thead>
            <tbody>
                <!-- Course 1 -->
                <tr>
                    <td>Deep Learning in Health Care</td>
                    <td>20</td>
                    <td>85</td>
                    <td>18</td>
                    <td>78</td>
                    <td>20</td>
                    <td>103</td>
                    <td>A+</td>
                    <td>4.3</td>
                </tr>

                <!-- Course 2 -->
                <tr>
                    <td>Mobile Development</td>
                    <td>22</td>
                    <td>78</td>
                    <td>20</td>
                    <td>78</td>
                    <td>20</td>
                    <td>98</td>
                    <td>A</td>
                    <td>4.0</td>
                </tr>
                <!-- Course 3-->
                <tr>
                    <td>Web Application Development</td>
                    <td>20</td>
                    <td>85</td>
                    <td>18</td>
                    <td>78</td>
                    <td>20</td>
                    <td>103</td>
                    <td>A+</td>
                    <td>4.3</td>
                </tr>
                <tr>
                    <td colspan="8">Overall CGPA</td>
                    <td>4.15</td> <!-- Example CGPA value -->
                </tr>
                <!-- Add more courses and their details as needed -->

            </tbody>
        </table></div>
       
    </div>
    <div class="results">
        <h6>SEMESTER:FALL 2022(1st)</h6>
        <a href="studentdetailedresult.php" class="view-all">
            <span>View all</span>
            <i class="fas fa-arrow-right"></i>
        </a>
        <div class="responsivetable">  <table class="resultstable">
            <thead>
                <tr>
                    <th>Course</th>
                    <th>Assessment 1</th>
                    <th>Assessment 2</th>
                    <th>Assessment 3</th>
                    <th>Sessional Marks</th>
                    <th>Mid Marks</th>
                    <th>Final Marks</th>
                    <th>Grade</th>
                    <th>GPA</th>
                </tr>
            </thead>
            <tbody>
                <!-- Course 1 -->
                <tr>
                    <td>Data Science and Analytics</td>
                    <td>20</td>
                    <td>85</td>
                    <td>18</td>
                    <td>78</td>
                    <td>20</td>
                    <td>103</td>
                    <td>A+</td>
                    <td>4.3</td>
                </tr>

                <!-- Course 2 -->
                <tr>
                    <td>Cloud Computing and Infrastructure</td>
                    <td>22</td>
                    <td>78</td>
                    <td>20</td>
                    <td>78</td>
                    <td>20</td>
                    <td>98</td>
                    <td>A</td>
                    <td>4.0</td>
                </tr>
                <!-- Course 3-->
                <tr>
                    <td>Internet of Things (IoT)</td>
                    <td>20</td>
                    <td>85</td>
                    <td>18</td>
                    <td>78</td>
                    <td>20</td>
                    <td>103</td>
                    <td>A+</td>
                    <td>4.3</td>
                </tr>
                <tr>
                    <td colspan="8">Overall CGPA</td>
                    <td>4.15</td> <!-- Example CGPA value -->
                </tr>
                <!-- Add more courses and their details as needed -->

            </tbody>
        </table></div>
      
    </div>
    <div class="view-more">
        <span>View More</span>
        <i class="fas fa-chevron-down"></i>
    </div>
    <a class="myBtn" href="studentchat.php">
        <span class="icon"></span>
        Chat
      </a>
</body>
</html>

<?php include_once('studentfooter.php'); ?>