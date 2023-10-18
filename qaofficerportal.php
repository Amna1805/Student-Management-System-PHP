<?php
// Start or resume session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['qa_officer'])) {
    // If not logged in, redirect to login page
    header("Location: qalogin.php");
    exit();
}
include_once('qaheader.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/portalheader.css">
    <link rel="stylesheet" type="text/css" href="css/imagewithtext.css">
    <link rel="stylesheet" type="text/css" href="css/qa.css">
    <link rel="stylesheet" type="text/css" href="css/chatbtn.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
    <title>QA Officer Portal</title>
</head>

<body>
<?php
 if (isset($_SESSION['qa_officer'])) {
     // Access the student's information
     $qa = $_SESSION['qa_officer'];
 
 } 
 ?>
   

    <div class="image-with-text">
        <div class="overlay"></div>
        <img src="./images/bg1.jpeg" alt="University Image">
        <div class="image-text-container">
        <h2 class="image-text">HELLO <span style="text-transform: capitalize;"><?php echo $qa['qa_name']; ?></span></h2>
            <h2 class="image-text">WELCOME TO QA OFFICER PORTAL!</h2>
        </div>
    </div>

    <div class="feature-container">

        <a href="qapolicies.php" class="feature-box">
            <div class="feature-text">Policies</div>
            <img src="./images/policies.webp" alt="Student Courses">
        </a>


        <a href="qarecomendations.php" class="feature-box">
            <div class="feature-text">Recomendation</div>
            <img src="./images/recomendations.jpg" alt="Program Coordinator Courses">
        </a>


    </div>
    <div class="statistics">
        <div class="icon-box">

            <div class="text">
                <i class="fas fa-user"></i>
                <h2>Students</h2>
            </div>
            <p>500</p>
        </div>

        <div class="icon-box">

            <div class="text">
                <i class="fas fa-chalkboard-teacher"></i>
                <h2>Instructors</h2>

            </div>
            <p>20</p>
        </div>

        <div class="icon-box">

            <div class="text">
                <i class="fas fa-book"></i>
                <h2>Courses</h2>

            </div>
            <p>25</p>
        </div>
        <div class="icon-box">

            <div class="text">
                <i class="fas fa-clipboard"></i>
                <h2>Exam Rate</h2>

            </div>
            <p>70%</p>
        </div>
    </div>
    <div class="program-objectives">
        <p class="title">Program Objectives</p>
        <div class="objectives-container">
            <div class="objective">
                <i class="fas fa-home file-icon"></i>
                <h4>Excellence in Education</h4>
                <p>Striving for excellence in providing high-quality education to students through innovative teaching
                    methods and a dynamic curriculum.</p>
            </div>
            <div class="objective">
                <i class="fas fa-search file-icon"></i>
                <h4>Cutting Edge Research</h4>
                <p>Engaging in cutting-edge research and fostering a culture of innovation to address complex challenges
                    and drive technological advancements.</p>
            </div>
            <div class="objective">
                <i class="fas fa-industry file-icon"></i>
                <h4>Industry Relevance</h4>
                <p>Ensuring industry relevance by aligning academic programs with the evolving needs of the industry and
                    facilitating practical exposure for students.</p>
            </div>

            <div class="objective">
                <i class="fas fa-graduation-cap file-icon"></i>
                <h4>Lifelong Learning Culture</h4>
                <p>Fostering a culture of lifelong learning, encouraging students and faculty to continuously acquire
                    new knowledge and skills.</p>
            </div>

            <div class="objective">
                <i class="fas fa-balance-scale file-icon"></i>
                <h4>Balance of Theory and Practice</h4>
                <p>Striking a balance between theoretical knowledge and practical application to ensure well-rounded
                    education and problem-solving abilities.</p>
            </div>

            <div class="objective">
                <i class="fas fa-users-cog file-icon"></i>
                <h4>Community and Social Impact</h4>
                <p>Promoting engagement with the community and fostering social responsibility to make a positive impact
                    on society through education.</p>
            </div>

        </div>
    </div>
    <div class="report-container">
        <h1 class="title">Program Performance</h1>
        <img src="./images/performance.png" class="chart">
    </div>
    <!-- Courses -->
    <div class="courses">
        <h5 class="title">Courses</h5>
        <div class="course">
            <div class="cards">
                <!--Course 1-->
                <a href="qacoursepage.php" class="card">
                    <img src="images/Ai_ML.jpg" alt="Ai and ML">
                    <h3>Artificial Intelligence and Machine Learning</h3>
                    <p>Unlock the power of AI and ML. Dive into the world of intelligent algorithms, data-driven
                        insights,
                        and autonomous systems. Navigate through advanced concepts, from deep learning to reinforcement
                        learning, and pave the way for a smarter future, where machines learn and adapt alongside you.
                    </p>
                </a>
                <!-- Course 2-->
                <a href="qacoursepage.php" class="card">
                    <img src="images/cyber_security.jpg" alt="Cyber Security">
                    <h3>Advanced Security</h3>
                    <p>Cybersecurity at its peak. Unleash advanced defense techniques, conquer cyber threats, and shield
                        critical assets. Master cutting-edge strategies to safeguard against modern attacks. Explore the
                        intricacies of ethical hacking and stay one step ahead in the digital battlefield, ensuring a
                        secure
                        digital future.</p>
                </a>
                <!-- Course 3-->
                <a href="qacoursepage.php" class="card">
                    <img src="images/database.png" alt="Database">
                    <h3>Database Implementation</h3>
                    <p>Database Implementation Mastery. Delve into the core of data management, database design, and
                        implementation. Explore advanced topics in database systems, SQL optimization, and scalability.
                        Elevate your expertise in crafting efficient, high-performance databases that drive modern
                        applications and empower businesses.</p>
                </a>
            </div>
        </div>

    </div>
    <div class="report">
        <h1 class="title">Course Performance Report</h1>
        <div class="table-container">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>Course</th>
                        <th>Total Students</th>
                        <th>Passed Students</th>
                        <th>Success Rate (%)</th>
                        <th>Average Score</th>
                        <th>Completion Rate (%)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Machine Learning</td>
                        <td>85</td>
                        <td>90</td>
                        <td>85</td>
                        <td>90</td>
                        <td>70</td>
                    </tr>
                    <tr>
                        <td>Cloud Computing</td>
                        <td>85</td>
                        <td>90</td>
                        <td>85</td>
                        <td>90</td>
                        <td>70</td>
                    </tr>
                    <tr>
                        <td>Data Science</td>
                        <td>85</td>
                        <td>90</td>
                        <td>85</td>
                        <td>90</td>
                        <td>70</td>
                    </tr>
                    <tr>
                        <td>Web Development</td>
                        <td>85</td>
                        <td>90</td>
                        <td>85</td>
                        <td>90</td>
                        <td>70</td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
            <div class="view-more">
                <span>View More</span>
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>
    </div>
    <a class="myBtn" href="qachat.php">
        <span class="icon"></span>
        Chat
    </a>

</body>

</html>

<?php 
include_once('qafooter.php'); ?>