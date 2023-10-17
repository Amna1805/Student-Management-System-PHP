<?php 
include_once('studentheader.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/portalheader.css">
    <link rel="stylesheet" type="text/css" href="css/imagewithtext.css">
    <link rel="stylesheet" type="text/css" href="css/studentcourses.css">
    <link rel="stylesheet" type="text/css" href="css/coursescard.css">
    <link rel="stylesheet" type="text/css" href="css/chatbtn.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
    <title>Student Courses</title>
</head>

<body>
   
    <div class="image-with-text">
        <div class="overlay"></div>
        <img src="./images/bg1.jpeg" alt="University Image">
        <div class="image-text-container">
            <h1 class="image-text">COURSES</h1>
        </div>
    </div>


    <div class="courses">
        <h6>SEMESTER:FALL 2023(Current)</h6>
        <div class="cards">
            <!--Course 1-->
            <a href="studentcoursepage.php"  class="card">
                    <img src="images/Ai_ML.jpg" alt="Ai and ML">
                    <h3>Artificial Intelligence and Machine Learning</h3>
                    <p>Unlock the power of AI and ML. Dive into the world of intelligent algorithms, data-driven insights,
                        and autonomous systems. Navigate through advanced concepts, from deep learning to reinforcement
                        learning, and pave the way for a smarter future, where machines learn and adapt alongside you.</p>
            </a>
           
            <!-- Course 2-->
            <a href="studentcoursepage.php"  class="card">
                <img src="images/cyber_security.jpg" alt="Cyber Security">
                <h3>Advanced Security</h3>
                <p>Cybersecurity at its peak. Unleash advanced defense techniques, conquer cyber threats, and shield
                    critical assets. Master cutting-edge strategies to safeguard against modern attacks. Explore the
                    intricacies of ethical hacking and stay one step ahead in the digital battlefield, ensuring a secure
                    digital future.</p>
                </a>
            <!-- Course 3-->
            <a href="studentcoursepage.php" class="card">
                <img src="images/database.png" alt="Database">
                <h3>Database Implementation</h3>
                <p>Database Implementation Mastery. Delve into the core of data management, database design, and
                    implementation. Explore advanced topics in database systems, SQL optimization, and scalability.
                    Elevate your expertise in crafting efficient, high-performance databases that drive modern
                    applications and empower businesses.</p>
                </a>
        </div>
    </div>

    <div class="courses">
        <h6>SEMESTER:SPRING 2023(2nd)</h6>
        <div class="cards">
            <!--Course 1-->
            <a href="studentcoursepage.php" class="card">
                <img src="images/deep_in_health.jpg" alt="DL in Health Care">
                <h3>Deep Learning in Health Care</h3>
                <p>Revolutionize Healthcare with Deep Learning. Embark on a transformative journey into the intersection of Deep Learning and Healthcare. Discover how cutting-edge AI techniques are revolutionizing medical diagnosis, personalized treatment, and disease prediction. Harness the potential of neural networks and big data to reshape the future of healthcare, improving patient outcomes and medical research.</p>
            </a>
            <!-- Course 5 -->
            <a href="studentcoursepage.php" class="card">
                <img src="images/mobile_dev.jpg" alt="Mobile Dev">
                <h3>Mobile Development</h3>
                <p>Elevate Your Mobile Development Skills. Immerse yourself in the dynamic world of mobile app creation. Learn to craft responsive, user-friendly applications for iOS and Android platforms. Explore advanced techniques in mobile UI/UX design, performance optimization, and cross-platform development. Equip yourself with the tools and knowledge to shape the future of mobile technology.</p>
            </a>
            <!-- Course 6-->
            <a href="studentcoursepage.php" class="card">
                <img src="images/web_app.jpg" alt="Web Dev">
                <h3>Web Application Development</h3>
                <p>Master Web Application Development. Dive into the realm of modern web technologies and create dynamic, interactive web applications. Explore the latest frameworks, front-end and back-end development tools, and best practices. Transform your coding skills into functional and responsive web solutions, ready to meet the demands of today's digital world.</p>
            </a>
        </div>
    </div>
    <div class="courses">
        <h6>SEMESTER:FALL 2022(1st)</h6>
        <div class="cards">
            <!--Course 1-->
            <a href="studentcoursepage.php" class="card">
                <img src="images/datascience.webp" alt="Data Science">
                <h3>Data Science and Analytics</h3>
                <p>Unleash the Power of Data. Learn the art and science of extracting valuable insights from data. Dive into statistics, machine learning, and visualization techniques. Master data manipulation, analysis, and interpretation. Equip yourself with the skills to drive data-driven decisions and make an impact in various domains.</p>
            </a>
            
            <!-- Course 3 -->
            <a href="studentcoursepage.php" class="card">
                <img src="images/cloud.avif" alt="Cloud Computing">
                <h3>Cloud Computing and Infrastructure</h3>
                <p>Architect the Future with Cloud Computing. Explore the scalable world of cloud infrastructure and services. Learn about AWS, Azure, Google Cloud, and more. Discover how to design, deploy, and manage applications in the cloud. Gain expertise in optimizing performance, security, and cost-efficiency in cloud-based solutions.</p>
            </a>
            
            <!-- Course 4 -->
            <a href="studentstudentcoursepage.php" class="card">
                <img src="images/iot.avif" alt="Internet of Things">
                <h3>Internet of Things (IoT)</h3>
                <p>Connect the World with IoT. Delve into the ecosystem of interconnected devices and sensors. Learn to design and build IoT solutions that revolutionize industries. Explore IoT protocols, data analytics, and real-time applications. Shape the future by creating smart and efficient IoT systems.</p>
            </a>
        </div>
        
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