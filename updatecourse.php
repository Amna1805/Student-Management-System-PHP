<?php
// Start or resume session
include_once('functions.php');
// Check if the user is logged in
if (!isset($_SESSION['instructor'])) {
    // If not logged in, redirect to login page
    header("Location: instructorlogin.php");
    exit();
}
if (isset($_POST['update_course'])) {
    if (updateCourse()) {
        echo '<script>alert("Course updated  Succesfully!")</script>';
    } else {
        echo '<script>alert("Failed!")</script>';
    }
} 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/portalheader.css">
    <link rel="stylesheet" type="text/css" href="css/createcourse.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
    <title>View Courses</title>
    <script type="text/javascript">
    function validateForm() {
        var courseName = document.getElementById("courseName").value;
        var courseDescription = document.getElementById("courseDescription").value;

        // Validate registration number (you can customize the regex pattern)
        var regex = /^[a-zA-Z\s.,"]+$/;

        // Validate courseName and classDuration
        if (!regex.test(courseName.trim())) {
            alert("Please enter a valid course name (Only alphabets and spaces).");
            return false;
        }

        if (courseDescription.trim() === "") {
            alert("Please enter a course description.");
            return false;
        }


        // Validate content title and content description
        var contentTitles = document.getElementsByName("contentTitle");
        var contentDescriptions = document.getElementsByName("contentDescription");

        for (var i = 0; i < contentTitles.length; i++) {
            var contentTitle = contentTitles[i].value;
            var contentDescription = contentDescriptions[i].value;

            if (!regex.test(contentTitle.trim())) {
                alert("Please enter a valid content title for item " + (i + 1) + ".");
                return false;
            }

            if (!regex.test(contentDescription.trim())) {
                alert("Please enter a valid content description for item " + (i + 1) + ".");
                return false;
            }
        }
        
        // All validations passed
        return true;
    }
</script>

</head>

<body>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['course_id'])) {
        $course_id = $_POST['course_id'];
        $course_det = get_course_details($course_id);
        $content_details=get_content_details($course_id);
        // Fetch and display course details based on $course_id
        // ...
        // Your code to fetch and display course details goes here
        // ...
    } else {
        $course_id =99;
    }
}


 ?>
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
                <li><a href="teacherportal.php">Home</a></li>
                <li><a  class="active" href="teachercourses.php">Courses</a></li>
                <li><a href="teacherexams.php">Exams</a></li>
                <li><a href="teacherresults.php">Results</a></li>
                <li class="hidethem"><a href="teacherprofile.php">Profile</a></li>
                <li class="hidethem"><a href="home.php">Logout</a></li>
            </ul>
        </nav>
        <section></section>
    </header>
   <!--CREATE COURSES-->
   <div class="create-course-form">
    <h2>Course Details</h2>

    <div class="form-row">
        <div class="form-group">
            <label for="courseImage">Course Image:</label>
            <img src="<?php echo displayImage($course_det['course_image']); ?>" alt="Not found" style="width: 400px; height: 200px; display: block; margin: 0 auto;">
        </div>
    </div>
   <form method="POST" method="POST" onsubmit="return validateForm();" enctype="multipart/form-data">
   <input type="file" id="file-image" name="course_image" />
    <div class="form-row">
        <div class="form-group">
            <label for="courseName">Course Name:</label>
            <input type="text" id="courseName" name="courseName" placeholder="Enter course name" required autofocus value="<?php echo $course_det['course_title']?>">
        </div>
        <div class="form-group">
            <label for="courseCredits">Credits:</label>
            <input type="number" id="courseCredits" name="courseCredits" placeholder="Enter course credits" required value="<?php echo $course_det['credit_hours']?>" min="1" max="4">
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group">
            <label for="courseDescription">Course Description:</label>
            <textarea id="courseDescription" name="courseDescription" placeholder="Enter course description" required ><?php echo $course_det['course_desc']?></textarea>
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group">
            <label for="classesPerWeek">Classes per Week:</label>
            <input type="number" id="classesPerWeek" name="classesPerWeek" placeholder="Enter classes per week" required value="<?php echo $course_det['class_per_week']?>" min="1" max="3">
        </div>
        <div class="form-group">
            <label for="classDuration">Class Duration:</label>
            <input type="text" id="classDuration" name="classDuration" placeholder "Enter class duration" required value="<?php echo $course_det['class_duration']?>">
        </div>
    </div>
</div>

<div class="create-course-form">
    <h2>Course Content</h2>

    <?php
    $counter = 1;
    foreach ($content_details as $content_detail) { 
    ?>
           <div class="form-row">
        <div class="form-group">
            <label for="contentTitle<?php echo $counter; ?>">Content Title:</label>
            <input type="text" id="contentTitle<?php echo $counter; ?>" name="contentTitle[]" placeholder="Enter content title" required value="<?php echo $content_detail['content_title']?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="contentDescription<?php echo $counter; ?>">Content Description:</label>
            <textarea id="contentDescription<?php echo $counter; ?>" name="contentDescription[]" placeholder="Enter content description" required><?php echo $content_detail['content_description']?></textarea>
        </div>
    </div>
    <?php
        $counter++;
    }
    ?>
</div>
</div>
<input type="text" hidden id="courseid" name="course_id"  value="<?php echo $course_det['course_id']?>">
<button class="create-button update" name="update_course" type="submit">Update</button>
</form>
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
                <li><a href="teacherportal.php">Home</a></li>
                <li><a class="active" href="teachercourses.php">Courses</a></li>
                <li><a href="teacherexams.php">Exams</a></li>
                <li><a href="teacherresults.php">Results</a></li>
                <li><a href="teacherprofile.php">Profile</a></li>
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