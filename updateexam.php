<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/portalheader.css">
    <link rel="stylesheet" type="text/css" href="css/takeexam.css">
    <link rel="stylesheet" type="text/css" href="css/createexam.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
    <title>Update Exams</title>
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
                <input type="text" placeholder="Exam Title" name="exam_title" value="Cloud Computing">
            </div>
            <div class="time-remaining">
                <span>Time Remaining: </span>
                <input  type="text" placeholder="Time Remaining" name="time_remaining" value="00:49">
            </div>
        </div>
        <div class="exam-mcqs">
            <!-- MCQ 1 -->
            <div class="mcq">
                <div class="questionsdiv">
                    <p>1.</p>
                    <input class="question" type="text" placeholder="Question 1" name="question1" value="What is cloud computing?">
                </div>

                <div class="optionsdiv">
                    <label>
                        <input type="radio" name="question1_option" value="option1">
                        <input type="text" class="option" placeholder="Option 1" name="question1_option1" value="Cloud computing refers to the delivery of computing services, including servers, storage, databases, networking, over the Internet.">
                    </label>
                </div>

                <div class="optionsdiv">
                    <label>
                        <input type="radio" name="question1_option" value="option2">
                        <input type="text" class="option" placeholder="Option 2" name="question1_option2" value="Cloud computing refers to the delivery of physical hardware components over the Internet.">
                    </label>
                </div>
            </div>

            <!-- MCQ 2 -->
            <div class="mcq">
                <div class="questionsdiv">
                    <p>2.</p>
                    <input class="question" type="text" placeholder="Question 2" name="question2" value="What are the key characteristics of cloud computing?">
                </div>
                <div class="optionsdiv">
                    <label>
                        <input type="radio" name="question2_option" value="option1">
                        <input type="text" class="option" placeholder="Option 1" name="question2_option1" value="On-demand self-service, Broad network access, Resource pooling, Rapid elasticity, Measured service.">
                    </label>
                </div>

                <div class="optionsdiv">
                    <label>
                        <input type="radio" name="question2_option" value="option2">
                        <input type="text" class="option" placeholder="Option 2" name="question2_option2" value="Only available through specific providers, Limited scalability, Fixed resource allocation.">
                    </label>
                </div>
            </div>

            <!-- MCQ 3 -->
            <div class="mcq">
                <div class="questionsdiv">
                    <p>3.</p>
                    <input class="question" type="text" placeholder="Question 3" name="question3" value="What are the three main service models in cloud computing?">
                </div>
                <div class="optionsdiv">
                    <label>
                        <input type="radio" name="question3_option" value="option1">
                        <input type="text" class="option" placeholder="Option 1" name="question3_option1" value="Infrastructure as a Service (IaaS), Platform as a Service (PaaS), Software as a Service (SaaS).">
                    </label>
                </div>

                <div class="optionsdiv">
                    <label>
                        <input type="radio" name="question3_option" value="option2">
                        <input type="text" class="option" placeholder="Option 2" name="question3_option2" value="Database as a Service (DBaaS), Network as a Service (NaaS), Function as a Service (FaaS).">
                    </label>
                </div>
            </div>

            <!-- MCQ 4 -->
            <div class="mcq">
                <div class="questionsdiv">
                    <p>4.</p>
                    <input class="question" type="text" placeholder="Question 4" name="question4" value="What are the deployment models in cloud computing?">
                </div>
                <div class="optionsdiv">
                    <label>
                        <input type="radio" name="question4_option" value="option1">
                        <input type="text" class="option" placeholder="Option 1" name="question4_option1" value="Public cloud, Private cloud, Hybrid cloud, Community cloud.">
                    </label>
                </div>

                <div class="optionsdiv">
                    <label>
                        <input type="radio" name="question4_option" value="option2">
                        <input type="text" class="option" placeholder="Option 2" name="question4_option2" value="Local cloud, Global cloud, Regional cloud.">
                    </label>
                </div>
            </div>

            <!-- MCQ 5 -->
            <div class="mcq">
                <div class="questionsdiv">
                    <p>5.</p>
                    <input class="question" type="text" placeholder="Question 5" name="question5" value="What is the primary advantage of using a public cloud?">
                </div>

                <div class="optionsdiv">
                    <label>
                        <input type="radio" name="question5_option" value="option1">
                        <input type="text" class="option" placeholder="Option 1" name="question5_option1" value="Cost-effectiveness and scalability.">
                    </label>
                </div>

                <div class="optionsdiv">
                    <label>
                        <input type="radio" name="question5_option" value="option2">
                        <input type="text" class="option" placeholder="Option 2" name="question5_option2" value="Greater control and customization.">
                    </label>
                </div>
            </div>

            <!-- MCQ 6 -->
            <div class="mcq">
                <div class="questionsdiv">
                    <p>6.</p>
                    <input class="question" type="text" placeholder="Question 6" name="question6" value="What is a virtual machine in the context of cloud computing?">
                </div>

                <div class="optionsdiv">
                    <label>
                        <input type="radio" name="question6_option" value="option1">
                        <input type="text" class="option" placeholder="Option 1" name="question6_option1" value="A software emulation of a physical computer.">
                    </label>
                </div>

                <div class="optionsdiv">
                    <label>
                        <input type="radio" name="question6_option" value="option2">
                        <input type="text" class="option" placeholder="Option 2" name="question6_option2" value="A hardware component of a server.">
                    </label>
                </div>
            </div>

            <!-- MCQ 7 -->
            <div class="mcq">
                <div class="questionsdiv">
                    <p>7.</p>
                    <input class="question" type="text" placeholder="Question 7" name="question7" value="What is meant by the term 'elasticity' in cloud computing?">
                </div>

                <div class="optionsdiv">
                    <label>
                        <input type="radio" name="question7_option" value="option1">
                        <input type="text" class="option" placeholder="Option 1" name="question7_option1" value="The ability to quickly and easily scale resources up or down as needed.">
                    </label>
                </div>

                <div class="optionsdiv">
                    <label>
                        <input type="radio" name="question7_option" value="option2">
                        <input type="text" class="option" placeholder="Option 2" name="question7_option2" value="The ability to restrict access to sensitive data.">
                    </label>
                </div>
            </div>

            <!-- MCQ 8 -->
            <div class="mcq">
                <div class="questionsdiv">
                    <p>8.</p>
                    <input class="question" type="text" placeholder="Question 8" name="question8" value="What is a hypervisor in cloud computing?">
                </div>

                <div class="optionsdiv">
                    <label>
                        <input type="radio" name="question8_option" value="option1">
                        <input type="text" class="option" placeholder="Option 1" name="question8_option1" value="Software that creates and manages virtual machines.">
                    </label>
                </div>

                <div class="optionsdiv">
                    <label>
                        <input type="radio" name="question8_option" value="option2">
                        <input type="text" class="option" placeholder="Option 2" name="question8_option2" value="A physical server in a data center.">
                    </label>
                </div>
            </div>

            <!-- MCQ 9 -->
            <div class="mcq">
                <div class="questionsdiv">
                    <p>9.</p>
                    <input class="question" type="text" placeholder="Question 9" name="question9" value="What is the purpose of load balancing in cloud computing?">
                </div>

                <div class="optionsdiv">
                    <label>
                        <input type="radio" name="question9_option" value="option1">
                        <input type="text" class="option" placeholder="Option 1" name="question9_option1" value="To distribute incoming traffic across multiple servers to ensure no single server is overwhelmed.">
                    </label>
                </div>

                <div class="optionsdiv">
                    <label>
                        <input type="radio" name="question9_option" value="option2">
                        <input type="text" class="option" placeholder="Option 2" name="question9_option2" value="To securely encrypt data transmitted between the client and the server.">
                    </label>
                </div>
            </div>

            <!-- MCQ 10 -->
            <div class="mcq">
                <div class="questionsdiv">
                    <p>10.</p>
                    <input class="question" type="text" placeholder="Question 10" name="question10" value="What are the security challenges in cloud computing?">
                </div>

                <div class="optionsdiv">
                    <label>
                        <input type="radio" name="question10_option" value="option1">
                        <input type="text" class="option" placeholder="Option 1" name="question10_option1" value="Data breaches, Identity theft, Unauthorized access.">
                    </label>
                </div>

                <div class="optionsdiv">
                    <label>
                        <input type="radio" name="question10_option" value="option2">
                        <input type="text" class="option" placeholder="Option 2" name="question10_option2" value="Software bugs, Hardware failures, Network outages.">
                    </label>
                </div>
            </div>

            <div class="create-button">
                <button type="submit">Update</button>
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