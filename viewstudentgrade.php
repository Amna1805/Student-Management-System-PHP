<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/portalheader.css">
    <link rel="stylesheet" type="text/css" href="css/imagewithtext.css">
    <link rel="stylesheet" type="text/css" href="css/teacherresult.css">
    <link rel="stylesheet" type="text/css" href="css/takeexam.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
    <title>View Student Grade</title>
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
                        <li><a href="teacherprofile.php">Profile</a></li>
                        <li><a href="home.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="navmenu">
                <li><a  href="teacherportal.php">Home</a></li>
                <li><a href="teachercourses.php">Courses</a></li>
                <li><a class="active" href="teacherexams.php">Exams</a></li>
                <li><a href="teacherresults.php">Results</a></li>
                <li class="hidethem"><a href="teacherprofile.php">Profile</a></li>
                <li class="hidethem"><a href="home.php">Logout</a></li>
            </ul>
        </nav>
        <section></section>
    </header>
    <section class="exam-info-section">
        <div class="exam-info">
            <div class="exam-info-heading">
                <h2>Machine Learning Exam</h2>
            </div>
            <div class="student-info-heading">
                <h2>Angela Diana</h2>
            </div>
            <div class="time-remaining">
                <span>Marks:</span>
                <span class="green-text">7/10</span>
            </div>
        </div>
       
        <div class="remarks-section red-text">
            <label for="remarks">Remarks:</label>
            <textarea id="remarks" name="remarks" rows="4" cols="50" readonly>Excellent work.Keep doing hardwork</textarea>
        </div>
        <div class="exam-mcqs">
              <!-- MCQ 1 -->
              <div class="mcq">
                <p>1. What is supervised learning?</p>
                <input type="radio" name="mcq1" id="mcq1_opt1">
                <label for="mcq1_opt1">A learning where the model learns from labeled data.</label><br>
                <input type="radio" name="mcq1" id="mcq1_opt2">
                <label for="mcq1_opt2">A learning where the model learns without any supervision.</label><br>
            </div>
    
            <!-- MCQ 2 -->
            <div class="mcq">
                <p>2. Which algorithm is a type of unsupervised learning?</p>
                <input type="radio" name="mcq2" id="mcq2_opt1">
                <label for="mcq2_opt1">K-means clustering</label><br>
                <input type="radio" name="mcq2" id="mcq2_opt2">
                <label for="mcq2_opt2">Linear regression</label><br>
            </div>
    
            <!-- MCQ 3 -->
            <div class="mcq">
                <p>3. In reinforcement learning, what does the agent learn from?</p>
                <input type="radio" name="mcq3" id="mcq3_opt1">
                <label for="mcq3_opt1">Rewards or penalties based on its actions</label><br>
                <input type="radio" name="mcq3" id="mcq3_opt2">
                <label for="mcq3_opt2">Labeled data</label><br>
            </div>
    
            <!-- MCQ 4 -->
            <div class="mcq">
                <p>4. Which activation function is often used in the output layer for binary classification?</p>
                <input type="radio" name="mcq4" id="mcq4_opt1">
                <label for="mcq4_opt1">Sigmoid</label><br>
                <input type="radio" name="mcq4" id="mcq4_opt2">
                <label for="mcq4_opt2">ReLU</label><br>
            </div>
    
            <!-- MCQ 5 -->
            <div class="mcq">
                <p>5. What does SVM stand for?</p>
                <input type="radio" name="mcq5" id="mcq5_opt1">
                <label for="mcq5_opt1">Support Vector Machine</label><br>
                <input type="radio" name="mcq5" id="mcq5_opt2">
                <label for="mcq5_opt2">Simple Vector Machine</label><br>
            </div>
    
            <!-- MCQ 6 -->
            <div class="mcq">
                <p>6. What is the goal of clustering algorithms?</p>
                <input type="radio" name="mcq6" id="mcq6_opt1">
                <label for="mcq6_opt1">To group similar data points together</label><br>
                <input type="radio" name="mcq6" id="mcq6_opt2">
                <label for="mcq6_opt2">To classify data points into predefined classes</label><br>
            </div>
    
            <!-- MCQ 7 -->
            <div class="mcq">
                <p>7. Which metric is often used to evaluate a classification model?</p>
                <input type="radio" name="mcq7" id="mcq7_opt1">
                <label for="mcq7_opt1">Accuracy</label><br>
                <input type="radio" name="mcq7" id="mcq7_opt2">
                <label for="mcq7_opt2">Mean Squared Error</label><br>
            </div>
    
            <!-- MCQ 8 -->
            <div class="mcq">
                <p>8. What is the purpose of dropout in neural networks?</p>
                <input type="radio" name="mcq8" id="mcq8_opt1">
                <label for="mcq8_opt1">To reduce overfitting</label><br>
                <input type="radio" name="mcq8" id="mcq8_opt2">
                <label for="mcq8_opt2">To increase the model's capacity</label><br>
            </div>
             <!-- MCQ 9 -->
             <div class="mcq">
                <p>9. Which technique is used to handle imbalanced datasets in classification problems?</p>
                <input type="radio" name="mcq9" id="mcq9_opt1">
                <label for="mcq9_opt1">Over-sampling and under-sampling</label><br>
                <input type="radio" name="mcq9" id="mcq9_opt2">
                <label for="mcq9_opt2">Weighted classes</label><br>
            </div>
    
            <!-- MCQ 10 -->
            <div class="mcq">
                <p>10.What is the purpose of a validation set in model training?</p>
                <input type="radio" name="mcq10" id="mcq10_opt1">
                <label for="mcq10_opt1">To tune hyperparameters and avoid overfitting</label><br>
                <input type="radio" name="mcq10" id="mcq10_opt2">
                <label for="mcq10_opt2">To train the model from scratch</label><br>
            </div>
            
        </div>
    
    </section>
    

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
                <li><a  href="teacherportal.php">Home</a></li>
                <li><a  href="teachercourses.php">Courses</a></li>
                <li><a href="teacherexams.php">Exams</a></li>
                <li><a href="teacherresults.php">Results</a></li>
                <li><a class="active" href="teacherprofile.php">Profile</a></li>
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