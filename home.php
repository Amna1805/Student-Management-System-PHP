<?php 
include_once('header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <title>Document</title>
</head>
<body>
     <!-- PROGRAM OVERVIEW IN IMAGE -->
     <div class="image-container">
        <img src="./images/msc1.jpeg" alt="Image">
        <div class="Wlc-Text">
            <h2>MSC Academic Program</h2>
            <p>
                Explore specialized studies and advanced research opportunities in our Master of Science (MSC) program,
                designed to deepen expertise and drive innovation in various fields.
            </p>
        </div>
    </div>
    <!----PROGRAM OBJECTIVES-->
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
    <!----PERFORMANCE MEASUREMENTS-->
    <div class="program-objectives">
        <p class="title">Performance Measurement and Assessment</p>
        <div class="objectives-container">
            <div class="objective">
                <i class="fas fa-file-alt file-icon"></i>
                <h4>Industrial Progress Tracking</h4>
                <p>Implementing systems to track industrial progress and analyzing industry trends to optimize
                    educational programs accordingly.</p>
            </div>
            <div class="objective">
                <i class="fas fa-database file-icon"></i>
                <h4>Data-Driven Insights</h4>
                <p>Utilizing data-driven insights and analytics to continuously evaluate and enhance educational
                    strategies for improved outcomes and growth.</p>
            </div>
            <div class="objective">
                <i class="fas fa-lightbulb file-icon"></i>
                <h4>Prepare for Success</h4>
                <p>Equipping students with the knowledge, skills, and mindset necessary to excel in their careers and
                    contribute positively to society.</p>
            </div>

        </div>
    </div>
    <!-- Courses -->
    <div class="courses">
        <h5>Courses</h5>
        <div class="course">
            <h6>SEMESTER:FALL 2023(Current)</h6>
            <div class="cards">
                <!--Course 1-->
                <a href="coursepage.php" class="card">
                    <img src="images/Ai_ML.jpg" alt="Ai and ML">
                    <h3>Artificial Intelligence and Machine Learning</h3>
                    <p>Unlock the power of AI and ML. Dive into the world of intelligent algorithms, data-driven
                        insights,
                        and autonomous systems. Navigate through advanced concepts, from deep learning to reinforcement
                        learning, and pave the way for a smarter future, where machines learn and adapt alongside you.
                    </p>
                </a>
                <!-- Course 2-->
                <a href="coursepage.php" class="card">
                    <img src="images/cyber_security.jpg" alt="Cyber Security">
                    <h3>Advanced Security</h3>
                    <p>Cybersecurity at its peak. Unleash advanced defense techniques, conquer cyber threats, and shield
                        critical assets. Master cutting-edge strategies to safeguard against modern attacks. Explore the
                        intricacies of ethical hacking and stay one step ahead in the digital battlefield, ensuring a
                        secure
                        digital future.</p>
                </a>
                <!-- Course 3-->
                <a href="coursepage.php" class="card">
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
</body>
</html>
<?php include_once('footer.php'); ?>
