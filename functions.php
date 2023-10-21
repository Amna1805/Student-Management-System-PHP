<?php
include_once('config.php');
session_start();
function displayImage($imageData) {
    if (isset($imageData) && !empty($imageData)) {
        // If image data is available, display the image
        return 'data:image/jpeg;base64,' . base64_encode($imageData);
    } else {
        // If no image data, return an empty string
        return '';
    }
}

function createCourse()
{

    $db = $GLOBALS['db'];
    $courseName = mysqli_real_escape_string($db, $_POST['courseName']);
    $courseCredits = mysqli_real_escape_string($db, $_POST['courseCredits']);
    $courseDescription = mysqli_real_escape_string($db, $_POST['courseDescription']);
    $classesPerWeek = mysqli_real_escape_string($db, $_POST['classesPerWeek']);
    $classDuration = mysqli_real_escape_string($db, $_POST['classDuration']);
    $instructor_id = mysqli_real_escape_string($db, $_POST['teacher_id']);
    $fileName = basename($_FILES["course_image"]["name"]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    if (in_array($fileType, $allowTypes) && !empty($courseName) && !empty($courseCredits) && !empty($classesPerWeek) && !empty($courseDescription) && !empty($classDuration)) {
        // Insert the course record
        $image = $_FILES['course_image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
        $insertCourse = mysqli_query($db, "INSERT INTO `courses` (`course_title`, `course_desc`, `credit_hours`, `class_duration`, `class_per_week`, `teacher_id`,`course_image`) 
        VALUES ('{$courseName}', '{$courseDescription}', '{$courseCredits}', '{$classDuration}', '{$classesPerWeek}', '{$instructor_id}','{$imgContent}')");
        
        if ($insertCourse) {
            // Retrieve the course_id of the inserted course
            $courseId = mysqli_insert_id($db);

            if (isset($_POST['contentTitle']) && isset($_POST['contentDescription'])) {
                $contentTitles = $_POST['contentTitle'];
                $contentDescriptions = $_POST['contentDescription'];

                // Loop through the arrays to access the values and insert them
                for ($i = 0; $i < count($contentTitles); $i++) {
                    $contentTitle = mysqli_real_escape_string($db, $contentTitles[$i]);
                    $contentDescription = mysqli_real_escape_string($db, $contentDescriptions[$i]);

                    // Insert course content records related to the course using the obtained course_id
                    $insertContent = mysqli_query($db, "INSERT INTO `course_content` (`content_title`, `content_description`, `course_id`) 
                    VALUES ('{$contentTitle}', '{$contentDescription}', '{$courseId}')");
                }
                return true;
            }
        }
    }
    return false;
}


function deleteCourse()
{
    $db = $GLOBALS['db'];

    // Check if course_id is provided
    if (isset($_POST['course_id'])) {
        $course_id = mysqli_real_escape_string($db, $_POST['course_id']);

        // First, remove the course from student_courses
        $delete_student_courses_query = "DELETE FROM student_courses WHERE course_id = $course_id";
        if (mysqli_query($db, $delete_student_courses_query)) {

            // Delete course content
            $delete_content_query = "DELETE FROM course_content WHERE course_id = $course_id";
            if (mysqli_query($db, $delete_content_query)) {

                // Delete exam questionnaires
                $delete_questionnaire_query = "DELETE FROM exam_questionnaire WHERE exam_id IN (SELECT exam_id FROM exams WHERE course_id = $course_id)";
                if (mysqli_query($db, $delete_questionnaire_query)) {

                    // Delete exams
                    $delete_exams_query = "DELETE FROM exams WHERE course_id = $course_id";
                    if (mysqli_query($db, $delete_exams_query)) {

                        // Delete the course itself
                        $delete_course_query = "DELETE FROM courses WHERE course_id = $course_id";
                        if (mysqli_query($db, $delete_course_query)) {
                            return true; // Deletion successful
                        } else {
                            return false; // Course deletion failed
                        }
                    } else {
                        return false; // Exam deletion failed
                    }
                } else {
                    return false; // Exam questionnaire deletion failed
                }
            } else {
                return false; // Content deletion failed
            }
        } else {
            return false; // Removing from student_courses failed
        }
    } else {
        return false; // Invalid input (course_id not provided)
    }
}



function updateCourse()
{
    $db = $GLOBALS['db'];
    $course_id = intval($_POST['course_id']);
    $courseName = mysqli_real_escape_string($db, $_POST['courseName']);
    $courseCredits = mysqli_real_escape_string($db, $_POST['courseCredits']);
    $courseDescription = mysqli_real_escape_string($db, $_POST['courseDescription']);
    $classesPerWeek = mysqli_real_escape_string($db, $_POST['classesPerWeek']);
    $classDuration = mysqli_real_escape_string($db, $_POST['classDuration']);
    $fileName = basename($_FILES["course_image"]["name"]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    if (in_array($fileType, $allowTypes) &&!empty($courseName) && !empty($courseCredits) && !empty($classesPerWeek) && !empty($courseDescription) && !empty($classDuration)) {
        $image = $_FILES['course_image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
        $updateCourse = mysqli_query($db, "UPDATE `courses` SET
            `course_title` = '$courseName',
            `course_desc` = '$courseDescription',
            `credit_hours` = '$courseCredits',
            `class_duration` = '$classDuration',
            `class_per_week` = '$classesPerWeek',
            `course_image` = '$imgContent'
            WHERE `course_id` = $course_id");

        if ($updateCourse) {
            if (isset($_POST['contentTitle']) && isset($_POST['contentDescription'])) {
                $contentTitles = $_POST['contentTitle'];
                $contentDescriptions = $_POST['contentDescription'];

                // Loop through the arrays to access the values and insert them
                for ($i = 0; $i < count($contentTitles); $i++) {
                    $contentTitle = mysqli_real_escape_string($db, $contentTitles[$i]);
                    $contentDescription = mysqli_real_escape_string($db, $contentDescriptions[$i]);

                    $updateContent = mysqli_query($db, "UPDATE `course_content` SET
                        `content_title` = '$contentTitle',
                        `content_description` = '$contentDescription'
                        WHERE `course_id` = $course_id");
                }

                // Check if all content updates were successful
                if ($updateContent) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return true; // No content to update, but course update succeeded
            }
        } else {
            return false; // Course update failed
        }
    } else {
        return false; // Validation failed
    }
}

function takeExam() {
    // Assuming you have a database connection
    $db = $GLOBALS['db'];
 // Get the current date and time
 $currentDate = date('Y-m-d H:i:s');
    $selectedOptions = $_POST['selected_option'];
    $question_ids = $_POST['questionnaire']; // An array of question IDs
    $std_id = mysqli_real_escape_string($db, $_POST['std_id']);
    $exam_id = mysqli_real_escape_string($db, $_POST['exam_id']);

    // Check if the arrays have the same number of elements (questions and question IDs)
    if (count($selectedOptions) !== count($question_ids)) {
        return false; // Error: Arrays don't match
    }

    // Loop through the selected options and question IDs
    for ($i = 0; $i < count($selectedOptions); $i++) {
        $question_id = mysqli_real_escape_string($db, $question_ids[$i]);
        $selectedOption = mysqli_real_escape_string($db, $selectedOptions[$i+1]);

        // Insert the selected option into the database table for each question
        $insertQuery = "INSERT INTO student_exam_submitted (std_id, quest_id, submitted_answer) 
        VALUES ('$std_id', '$question_id', '$selectedOption')";

if (mysqli_query($db, $insertQuery)) {
   // Insert a record into the student_exam table to indicate that the student has taken the exam
$studentExamQuery = "INSERT INTO student_exam (exam_id, std_id,submitted_date) 
VALUES ('$exam_id', '$std_id' ,'$currentDate')";
if (mysqli_query($db, $studentExamQuery)) {
    return true;
}
else {
    return false;
}
}

}

return false;
}


function deleteExam()
{
    $db = $GLOBALS['db'];

    // Check if exam_id is provided
    if (isset($_POST['exam_id'])) {
        $exam_id = mysqli_real_escape_string($db, $_POST['exam_id']);

        // Update the exam's is_deleted flag
        $update_exam = "UPDATE exams SET is_deleted = 1 WHERE exam_id = $exam_id";
        if (mysqli_query($db, $update_exam)) {
            return true; // Exam is marked as deleted
        } else {
            return false; // Exam deletion failed
        }
    }

    return false; // Exam ID not provided
}



function createExam()
{
    $db = $GLOBALS['db'];

    // Extract and sanitize data from the form
    $exam_title = mysqli_real_escape_string($db, $_POST['exam_title']);
    $exam_desc= mysqli_real_escape_string($db, $_POST['exam_desc']);
    $due_date = mysqli_real_escape_string($db, $_POST['due_date']);
    $time_allot = mysqli_real_escape_string($db, $_POST['time_alloted']);
    $course = mysqli_real_escape_string($db, $_POST['course_id']); // Replace with your method of obtaining the exam_id
    $teacher = mysqli_real_escape_string($db, $_POST['teacher_id']);
    // Update the exam details in the 'exams' table
    $query = "INSERT INTO exams(exam_title, exam_desc, exam_due_date, time_alloted,exam_total_marks,teacher_id,course_id) 
    VALUES ('$exam_title', '$exam_desc', '$due_date', '$time_allot','10','$teacher','$course')";
    $result = mysqli_query($db, $query);

    if ($result) {
        $exam_id = mysqli_insert_id($db);
        // Assuming you have a way to fetch and update questions and options
        if (isset($_POST['question']) && isset($_POST['option1']) && isset($_POST['option2'])) {
            $questions = $_POST['question'];
            $options1 = $_POST['option1'];
            $options2 = $_POST['option2'];
           
            for ($i = 0; $i < count($questions); $i++) {
                $correctoption = $_POST['correctoption['.++$i.']'];
                $question = mysqli_real_escape_string($db, $questions[$i]);
                $option1 = mysqli_real_escape_string($db, $options1[$i]);
                $option2 = mysqli_real_escape_string($db, $options2[$i]);
                $correctoption = mysqli_real_escape_string($db, $correctoption[$i]);
                 echo $correctoption;
                 exit();
                // Update or insert the question and options based on your application logic
                // You should handle potential errors here and return appropriate messages
                $query = "INSERT INTO exam_questionnaire (exam_id, question, option_1, option_2) 
                VALUES ('$exam_id', '$question', '$option1', '$option2')";
                $result = mysqli_query($db, $query);

                if (!$result) {
                    echo "Error inserting question and options: " . mysqli_error($db);
                    return false;
                }
            }

            return true;
        }
    }

    // echo "Error updating the exam details: " . mysqli_error($db);
    return false;
}
function updateExam()
{
    $db = $GLOBALS['db'];

    // Extract and sanitize data from the form
    $exam_title = mysqli_real_escape_string($db, $_POST['exam_title']);
    $time_allot = mysqli_real_escape_string($db, $_POST['time_allot']);
    $exam_id = mysqli_real_escape_string($db, $_POST['exam_id']); // Replace with your method of obtaining the exam_id

    // Validate input data
    if (empty($exam_title)) {
        echo "Please enter an exam title.";
        return false;
    }

    if (empty($time_allot)) {
        echo "Please enter the time allotted for the exam.";
        return false;
    }

    // Update the exam details in the 'exams' table
    $query = "UPDATE exams SET exam_title = '$exam_title', time_alloted = '$time_allot' WHERE exam_id = '$exam_id'";
    $result = mysqli_query($db, $query);

    if ($result) {
        // Assuming you have a way to fetch and update questions and options
        if (isset($_POST['question']) && isset($_POST['option1']) && isset($_POST['option2'])) {
            $questions = $_POST['question'];
            $options1 = $_POST['option1'];
            $options2 = $_POST['option2'];

            for ($i = 0; $i < count($questions); $i++) {
                $question = mysqli_real_escape_string($db, $questions[$i]);
                $option1 = mysqli_real_escape_string($db, $options1[$i]);
                $option2 = mysqli_real_escape_string($db, $options2[$i]);


                // Update or insert the question and options based on your application logic
                // You should handle potential errors here and return appropriate messages
                $query = "UPDATE exam_questionnaire SET question='$question', option_1='$option1', option_2='$option2' WHERE exam_id = '$exam_id'";
                $result = mysqli_query($db, $query);

                if (!$result) {
                    echo "Error inserting question and options: " . mysqli_error($db);
                    return false;
                }
            }

            return true;
        }
    }

    // echo "Error updating the exam details: " . mysqli_error($db);
    return false;
}




function student_login() {
    global $db;

    $regno = mysqli_real_escape_string($db, $_POST['login_id']);
    $pass = mysqli_real_escape_string($db, $_POST['password']);

    $user_query = "SELECT * FROM `student` WHERE `std_reg_no`='$regno' AND `std_password`='$pass'";
    $users_results = mysqli_query($db, $user_query);

    if ($users_results) {
        if (mysqli_num_rows($users_results) === 1) {
            $user = mysqli_fetch_assoc($users_results);
            // Set session variables for the logged-in user using the registration number
            $_SESSION['student'] =$user;
            echo '<script>alert("Login Successful"); window.location = "studentportal.php";</script>';
            exit();
        } else {
            // If login fails, show an error alert
            echo '<script>alert("Wrong credentials. Please try again."); window.location = "studentlogin.php";</script>';
            exit();
        }
    } else {
        // Database query error
        echo '<script>alert("Database error. Please try again later."); window.location = "studentlogin.php";</script>';
        exit();
    }
}

function get_student_courses($std_id, $semester) {
    $db = $GLOBALS['db'];
    $courses = [];

    // Assuming you have a table named 'student_courses' with columns 'std_id', 'course_id', and 'semester'
    $query = "SELECT course_id FROM student_courses WHERE std_id = '$std_id' AND semester_no = '$semester'";
    $result = mysqli_query($db, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $courses[] = $row['course_id'];
        }
    }

    return $courses;
}
function get_course_exam($course_id) {
    $db = $GLOBALS['db'];

    // Assuming you have a table named 'exams' with relevant columns
    $query = "SELECT * FROM exams WHERE course_id = '$course_id' LIMIT 1";
    $result = mysqli_query($db, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result); // Return the first (and only) row
    } else {
        return null; // No matching row found
    }
}
function get_all_exams_for_course($course_id) {
    $db = $GLOBALS['db'];

    $exams = array(); // Initialize an array to store all exam rows

    // Assuming you have a table named 'exams' with relevant columns
    $query = "SELECT * FROM exams WHERE course_id = '$course_id'";
    $result = mysqli_query($db, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $exams[] = $row; // Add each row to the $exams array
        }
    }

    return $exams; // Return the array of exam rows
}


function get_teacher_courses($ins_id) {
    $db = $GLOBALS['db'];
    $courses = [];

    // Assuming you have a table named 'student_courses' with columns 'std_id', 'course_id', and 'semester'
    $query = "SELECT course_id FROM courses WHERE teacher_id = '$ins_id'";
    $result = mysqli_query($db, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $courses[] = $row['course_id'];
        }
    }

    return $courses;
}
function get_teacher_exams($ins_id) {
    $db = $GLOBALS['db'];
    $exams = [];

    // Assuming you have a table named 'exams' with columns 'exam_id', 'teacher_id', and 'is_deleted'
    $query = "SELECT exam_id FROM exams WHERE teacher_id = '$ins_id' AND is_deleted = 0";
    $result = mysqli_query($db, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $exams[] = $row['exam_id'];
        }
    }

    return $exams;
}

function get_course_details($course_id) {
    $db = $GLOBALS['db'];
    
    // Assuming you have a table named 'courses' with relevant columns
    $query = "SELECT * FROM courses WHERE course_id = '$course_id'";
    $result = mysqli_query($db, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $course_details = mysqli_fetch_assoc($result);
        return $course_details;
    }
    
    return null;  // Return null if course details not found
}
function get_exam_details($exam_id) {
    $db = $GLOBALS['db'];
    
    // Assuming you have a table named 'courses' with relevant columns
    $query = "SELECT * FROM exams WHERE exam_id = '$exam_id'";
    $result = mysqli_query($db, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $exam_details = mysqli_fetch_assoc($result);
        return $exam_details;
    }
    
    return null;  // Return null if course details not found
}
function get_question_details($exam_id) {
    $db = $GLOBALS['db'];
    
    // Assuming you have a table named 'exam_questionnaire' with relevant columns
    $query = "SELECT * FROM exam_questionnaire WHERE exam_id = '$exam_id'";
    $result = mysqli_query($db, $query);
    
    $question_details = array(); // Create an array to store question details
    
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            // Append each row to the array
            $question_details[] = $row;
        }
    }
    
    return $question_details;
}
function get_student_exams($exam_id) {
    $db = $GLOBALS['db'];
    
    // Assuming you have a table named 'exam_questionnaire' with relevant columns
    $query = "SELECT * FROM student_exam WHERE exam_id = '$exam_id'";
    $result = mysqli_query($db, $query);
    
    $student_details = array(); // Create an array to store question details
    
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            // Append each row to the array
            $student_details[] = $row;
        }
    }
    
    return $student_details;
}
function get_studentexam_details($exam_id, $std_id) {
    $db = $GLOBALS['db'];
    
    // Assuming you have a table named 'student_exam' with relevant columns
    $query = "SELECT * FROM student_exam WHERE exam_id = '$exam_id' AND std_id = '$std_id'";
    $result = mysqli_query($db, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch and return the first (and only) row as an associative array
        return mysqli_fetch_assoc($result);
    } else {
        // No matching row found, return an empty array or null as per your preference
        return null;
    }
}
function get_student_exam_details($std_id) {
    $db = $GLOBALS['db'];

    // Assuming you have a table named 'student_exam' with relevant columns
    $query = "SELECT * FROM student_exam WHERE std_id = '$std_id'";
    $result = mysqli_query($db, $query);

    $student_exam_details = array();

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch and store all rows in an array
        while ($row = mysqli_fetch_assoc($result)) {
            $student_exam_details[] = $row;
        }

        return $student_exam_details;
    } else {
        // No matching rows found, return an empty array or null as per your preference
        return $student_exam_details;
    }
}

function provideRemark() {
    $db = $GLOBALS['db'];
    $exam_id = mysqli_real_escape_string($db, $_POST['exam_id']);
    $std_id = mysqli_real_escape_string($db, $_POST['std_id']);
    $remarks = mysqli_real_escape_string($db, $_POST['remarks']);

    // Update student_exam table
    $updateQuery = "UPDATE student_exam SET remarks = '$remarks', is_graded = 1 WHERE exam_id = '$exam_id' AND std_id = '$std_id'";

    if (mysqli_query($db, $updateQuery)) {
        // Check if all students for this exam have been graded
        $checkQuery = "SELECT COUNT(*) AS total_students, SUM(is_graded) AS graded_students FROM student_exam WHERE exam_id = '$exam_id'";
        $result = mysqli_query($db, $checkQuery);
        $row = mysqli_fetch_assoc($result);

        if ($row['total_students'] == $row['graded_students']) {
            // If all students are graded, mark the exam as graded
            $updateExamQuery = "UPDATE exams SET is_graded = 1 WHERE exam_id = '$exam_id'";
            mysqli_query($db, $updateExamQuery);
        }

        return true; // Update successful
    } else {
        return false; // Update failed
    }
}


function get_content_details($course_id) {
    $db = $GLOBALS['db'];

    // Assuming you have a table named 'courses' with relevant columns
    $query = "SELECT * FROM course_content WHERE course_id = '$course_id'";
    $result = mysqli_query($db, $query);

    $course_details = array();

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $course_details[] = $row;
        }
    }

    return $course_details;
}
function get_student_details($std_id) {
    $db = $GLOBALS['db'];

    // Assuming you have a table named 'student' with relevant columns
    $query = "SELECT * FROM student WHERE std_id = '$std_id'";
    $result = mysqli_query($db, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Assuming that 'std_id' is unique, so you fetch one row (the first one)
        $student_details = mysqli_fetch_assoc($result);
        return $student_details;
    }

    // Return null or an empty array to indicate that no student was found
    return null;
}

function instructor_login() {
    global $db;

    $empId = mysqli_real_escape_string($db, $_POST['empl_id']);
    $pass = mysqli_real_escape_string($db, $_POST['password']);

    $user_query = "SELECT * FROM `instructor` WHERE `employee_id`='$empId' AND `instructor_password`='$pass'";
    $users_results = mysqli_query($db, $user_query);

    if ($users_results) {
        if (mysqli_num_rows($users_results) === 1) {
            $user = mysqli_fetch_assoc($users_results);

            // Set session variables for the logged-in user using the registration number
            $_SESSION['instructor'] = $user;
    // Add more session variables as needed

    // Redirect to the student portal
    echo '<script>alert("Login Successful"); window.location = "teacherportal.php";</script>';
exit();
} else {
// If login fails, show an error alert
echo '
<script>alert("Wrong credentials. Please try again."); window.location = "instructorlogin.php";</script>';
exit();
}
} else {
// Database query error
echo '
<script>alert("Something went wrong. Please try again later."); window.location = "instructorlogin.php";</script>';
exit();
}
}

function admin_login() {
    global $db;

    $empId = mysqli_real_escape_string($db, $_POST['empl_id']);
    $pass = mysqli_real_escape_string($db, $_POST['password']);

    $user_query = "SELECT * FROM `admin` WHERE `employee_id`='$empId' AND `admin_password`='$pass'";
    $users_results = mysqli_query($db, $user_query);

    if ($users_results) {
        if (mysqli_num_rows($users_results) === 1) {
            $user = mysqli_fetch_assoc($users_results);

            // Set session variables for the logged-in user using the registration number
            $_SESSION['admin'] = $user;
    // Add more session variables as needed

    // Redirect to the student portal
    echo '<script>alert("Login Successful"); window.location = "adminportal.php";</script>';
exit();
} else {
// If login fails, show an error alert
echo '
<script>alert("Wrong credentials. Please try again."); window.location = "adminlogin.php";</script>';
exit();
}
} else {
// Database query error
echo '
<script>alert("Something went wrong. Please try again later."); window.location = "adminlogin.php";</script>';
exit();
}
}

function qa_login() {
    global $db;

    $empId = mysqli_real_escape_string($db, $_POST['empl_id']);
    $pass = mysqli_real_escape_string($db, $_POST['password']);

    $user_query = "SELECT * FROM `qa_officer` WHERE `employee_id`='$empId' AND `qa_password`='$pass'";
    $users_results = mysqli_query($db, $user_query);

    if ($users_results) {
        if (mysqli_num_rows($users_results) === 1) {
            $user = mysqli_fetch_assoc($users_results);

            // Set session variables for the logged-in user using the registration number
            $_SESSION['qa_officer'] = $user;
    // Add more session variables as needed

    // Redirect to the student portal
    echo '<script>alert("Login Successful"); window.location = "qaofficerportal.php";</script>';
exit();
} else {
// If login fails, show an error alert
echo '
<script>alert("Wrong credentials. Please try again."); window.location = "qalogin.php";</script>';
exit();
}
} else {
// Database query error
echo '
<script>alert("Something went wrong. Please try again later."); window.location = "qalogin.php";</script>';
exit();
}
}


function progco_login() {
    global $db;

    $empId = mysqli_real_escape_string($db, $_POST['empl_id']);
    $pass = mysqli_real_escape_string($db, $_POST['password']);

    $user_query = "SELECT * FROM `program_coordinator` WHERE `employee_id`='$empId' AND `program_co_password`='$pass'";
    $users_results = mysqli_query($db, $user_query);

    if ($users_results) {
        if (mysqli_num_rows($users_results) === 1) {
            $user = mysqli_fetch_assoc($users_results);

            // Set session variables for the logged-in user using the registration number
            $_SESSION['program_coordinator'] = $user;
    // Add more session variables as needed

    // Redirect to the student portal
    echo '<script>alert("Login Successful"); window.location = "programcoordinatorportal.php";</script>';
exit();
} else {
// If login fails, show an error alert
echo '
<script>alert("Wrong credentials. Please try again."); window.location = "programcologin.php";</script>';
exit();
}
} else {
// Database query error
echo '
<script>alert("Something went wrong. Please try again later."); window.location = "programcologin.php";</script>';
exit();
}
}
function submitStundet()
{
    $db = $GLOBALS['db'];
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $fatherName = mysqli_real_escape_string($db, $_POST['fatherName']);
    $department = mysqli_real_escape_string($db, $_POST['department']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $regNumber = mysqli_real_escape_string($db, $_POST['regNumber']);
    $program = mysqli_real_escape_string($db, $_POST['program']);
    $phoneNumber = mysqli_real_escape_string($db, $_POST['phoneNumber']);
    $idNumber = mysqli_real_escape_string($db, $_POST['idNumber']);
    $semester = mysqli_real_escape_string($db, $_POST['semester']);
    $year = mysqli_real_escape_string($db, $_POST['year']);
    $fileName = basename($_FILES["image"]["name"]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    if (in_array($fileType, $allowTypes) && !empty($name) && !empty($fatherName) && !empty($department) && !empty($email) && !empty($regNumber) && !empty($program) && !empty($phoneNumber) && !empty($idNumber) && !empty($semester) && !empty($year)) {
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
        $inserStudent = mysqli_query($db, "INSERT INTO `student` (`std_name`, `std_father_name`, `std_reg_no`, `std_identity_no`, `std_dept`, `std_program`, `std_semester`, `std_admission_year`, `std_email`, `std_phone_no`, `std_password`,`std_image`) 
        VALUES ('{$name}', '{$fatherName}', '{$regNumber}', '{$idNumber}', '{$department}', '{$program}', '{$semester}', '{$year}', '{$email}', '{$phoneNumber}', '{$password}', '{$imgContent}')");
        if ($inserStudent) {
            return true;
        } else {
            echo "Error: " . mysqli_error($db);
        }
    } else {
        var_dump($_FILES);
        exit();
    }
}

function updateStudent($check)
{
    if ($check) {
        $db = $GLOBALS['db'];
        $std_id = mysqli_real_escape_string($db, $_POST['std_id']);
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $fatherName = mysqli_real_escape_string($db, $_POST['fatherName']);
        $department = mysqli_real_escape_string($db, $_POST['department']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $regNumber = mysqli_real_escape_string($db, $_POST['regNumber']);
        $program = mysqli_real_escape_string($db, $_POST['program']);
        $phoneNumber = mysqli_real_escape_string($db, $_POST['phoneNumber']);
        $idNumber = mysqli_real_escape_string($db, $_POST['idNumber']);
        $semester = mysqli_real_escape_string($db, $_POST['semester']);
        $year = mysqli_real_escape_string($db, $_POST['year']);
        $fileName = basename($_FILES["image"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes) && !empty($std_id) && !empty($name) && !empty($fatherName) && !empty($department) && !empty($email) && !empty($regNumber) && !empty($program) && !empty($phoneNumber) && !empty($idNumber) && !empty($semester) && !empty($year)) {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));
            $updateStudentQuery = "UPDATE student SET 
                std_name = '{$name}',
                std_father_name = '{$fatherName}',
                std_reg_no = '{$regNumber}',
                std_identity_no = '{$idNumber}',
                std_dept = '{$department}',
                std_program = '{$program}',
                std_semester = '{$semester}',
                std_admission_year = '{$year}',
                std_email = '{$email}',
                std_phone_no = '{$phoneNumber}',
                std_password = '{$password}',
                std_image = '{$imgContent}'
                WHERE std_id = '{$std_id}'";

            if (mysqli_query($db, $updateStudentQuery)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        $db = $GLOBALS['db'];
        $std_id = mysqli_real_escape_string($db, $_POST['std_id']);
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $fatherName = mysqli_real_escape_string($db, $_POST['fatherName']);
        $department = mysqli_real_escape_string($db, $_POST['department']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $regNumber = mysqli_real_escape_string($db, $_POST['regNumber']);
        $program = mysqli_real_escape_string($db, $_POST['program']);
        $phoneNumber = mysqli_real_escape_string($db, $_POST['phoneNumber']);
        $idNumber = mysqli_real_escape_string($db, $_POST['idNumber']);
        $semester = mysqli_real_escape_string($db, $_POST['semester']);
        $year = mysqli_real_escape_string($db, $_POST['year']);
        if (!empty($std_id) && !empty($name) && !empty($fatherName) && !empty($department) && !empty($email) && !empty($regNumber) && !empty($program) && !empty($phoneNumber) && !empty($idNumber) && !empty($semester) && !empty($year)) {
            $updateStudentQuery = "UPDATE student SET 
            std_name = '{$name}',
            std_father_name = '{$fatherName}',
            std_reg_no = '{$regNumber}',
            std_identity_no = '{$idNumber}',
            std_dept = '{$department}',
            std_program = '{$program}',
            std_semester = '{$semester}',
            std_admission_year = '{$year}',
            std_email = '{$email}',
            std_phone_no = '{$phoneNumber}',
            std_password = '{$password}'
            WHERE std_id = '{$std_id}'";

            if (mysqli_query($db, $updateStudentQuery)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}

function getStudent($id)
{
    $db = $GLOBALS['db'];
    $id = mysqli_real_escape_string($db, $id);
    $retrieveStudent = mysqli_query($db, "SELECT * FROM `student` WHERE std_id = '{$id}'");
    if ($retrieveStudent && mysqli_num_rows($retrieveStudent) > 0) {
        return $retrieveStudent;
    } else {
        return false;
    }
}


function getStudents()
{
    $db = $GLOBALS['db'];
    $retrieveStudents = mysqli_query($db, "SELECT * FROM `student`");
    if (mysqli_num_rows($retrieveStudents) > 0) {
        return $retrieveStudents;

    } else {
        return false;
    }
}


function deleteStudent()
{
    $db = $GLOBALS['db'];
    if (isset($_POST['std_id'])) {
        $std_id = mysqli_real_escape_string($db, $_POST['std_id']);
        $delete_query = "DELETE FROM student WHERE std_id = $std_id";
        if (mysqli_query($db, $delete_query)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}


function submitProgramCo()
{
    $db = $GLOBALS['db'];
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $fatherName = mysqli_real_escape_string($db, $_POST['fatherName']);
    $department = mysqli_real_escape_string($db, $_POST['department']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $empId = mysqli_real_escape_string($db, $_POST['empId']);
    $phoneNumber = mysqli_real_escape_string($db, $_POST['phoneNumber']);
    $idNumber = mysqli_real_escape_string($db, $_POST['idNumber']);
    $fileName = basename($_FILES["image"]["name"]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    if (in_array($fileType, $allowTypes) && !empty($name) && !empty($fatherName) && !empty($department) && !empty($email) && !empty($password) && !empty($empId) && !empty($phoneNumber) && !empty($idNumber)) {
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
        $insertProgramCo = mysqli_query($db, "INSERT INTO `program_coordinator` (`program_co_name`, `program_co_father_name`, `program_co_dept`, `program_co_email`, `program_co_password`, `employee_id`, `program_co_phone_no`, `program_co_identity_no`,`program_co_image`)
        VALUES ('$name', '$fatherName', '$department', '$email', '$password', '$empId', '$phoneNumber', '$idNumber', '$imgContent')");
        if ($insertProgramCo) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}


function getProgramCo($id)
{
    $db = $GLOBALS['db'];
    $id = mysqli_real_escape_string($db, $id);
    $retrieveProgramCo = mysqli_query($db, "SELECT * FROM `program_coordinator` WHERE program_co_id = '{$id}'");
    if ($retrieveProgramCo && mysqli_num_rows($retrieveProgramCo) > 0) {
        return $retrieveProgramCo;
    } else {
        return false;
    }
}

function getProgramCos()
{
    $db = $GLOBALS['db'];
    $retrieveProgramCos = mysqli_query($db, "SELECT * FROM `program_coordinator`");
    if (mysqli_num_rows($retrieveProgramCos) > 0) {
        return $retrieveProgramCos;

    } else {
        return false;
    }
}

function updatePrgramCo($check)
{
    if ($check) {
        $db = $GLOBALS['db'];
        $program_co_id = mysqli_real_escape_string($db, $_POST['program_co_id']);
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $fatherName = mysqli_real_escape_string($db, $_POST['fatherName']);
        $department = mysqli_real_escape_string($db, $_POST['department']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $empId = mysqli_real_escape_string($db, $_POST['empId']);
        $phoneNumber = mysqli_real_escape_string($db, $_POST['phoneNumber']);
        $idNumber = mysqli_real_escape_string($db, $_POST['idNumber']);
        $fileName = basename($_FILES["image"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes) && !empty($name) && !empty($fatherName) && !empty($department) && !empty($email) && !empty($password) && !empty($empId) && !empty($phoneNumber) && !empty($idNumber)) {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));
            $updateProgramCo = mysqli_query($db, "UPDATE `program_coordinator` SET
        `program_co_name` = '$name',
        `program_co_father_name` = '$fatherName',
        `program_co_dept` = '$department',
        `program_co_email` = '$email',
        `program_co_password` = '$password',
        `employee_id` = '$empId',
        `program_co_phone_no` = '$phoneNumber',
        `program_co_identity_no` = '$idNumber',
        `program_co_image` = '$imgContent'
        WHERE `program_co_id` = $program_co_id");
            if ($updateProgramCo) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        $db = $GLOBALS['db'];
        $program_co_id = mysqli_real_escape_string($db, $_POST['program_co_id']);
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $fatherName = mysqli_real_escape_string($db, $_POST['fatherName']);
        $department = mysqli_real_escape_string($db, $_POST['department']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $empId = mysqli_real_escape_string($db, $_POST['empId']);
        $phoneNumber = mysqli_real_escape_string($db, $_POST['phoneNumber']);
        $idNumber = mysqli_real_escape_string($db, $_POST['idNumber']);
        if (!empty($name) && !empty($fatherName) && !empty($department) && !empty($email) && !empty($password) && !empty($empId) && !empty($phoneNumber) && !empty($idNumber)) {
            $updateProgramCo = mysqli_query($db, "UPDATE `program_coordinator` SET
        `program_co_name` = '$name',
        `program_co_father_name` = '$fatherName',
        `program_co_dept` = '$department',
        `program_co_email` = '$email',
        `program_co_password` = '$password',
        `employee_id` = '$empId',
        `program_co_phone_no` = '$phoneNumber',
        `program_co_identity_no` = '$idNumber'
        WHERE `program_co_id` = $program_co_id");
            if ($updateProgramCo) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}

function deleteProgramCo()
{
    $db = $GLOBALS['db'];
    if (isset($_POST['program_co_id'])) {
        $program_co_id = mysqli_real_escape_string($db, $_POST['program_co_id']);
        $delete_query = "DELETE FROM program_coordinator WHERE program_co_id = $program_co_id";
        if (mysqli_query($db, $delete_query)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function getProgramCoPermission($id)
{
    $db = $GLOBALS['db'];
    $id = mysqli_real_escape_string($db, $id);
    $programCoPermissions = mysqli_query($db, "SELECT * FROM `programco_permissions` WHERE program_co_id = '{$id}'");
    if ($programCoPermissions && mysqli_num_rows($programCoPermissions) > 0) {
        return $programCoPermissions;
    } else {
        return false;
    }
}
function updateProgramCoPermissions()
{

    $db = $GLOBALS['db'];
    $program_co_id = mysqli_real_escape_string($db, $_POST['program_co_id']);
    $checkboxes = array(
        'View_Program_Objectives' => 7,
        'Add/Update/Delete_Program_Objectives' => 8,
        'View_Courses' => 9,
        'Add/Update/Delete_Courses' => 10,
        'View_Course_Content' => 11,
        'Add/Update/Delete_Course_Content' => 12,
        'View_Student_Performance' => 13,
        'Add/Update/Delete_Student_Performance' => 14
    );
    foreach ($checkboxes as $checkbox_name => $checkbox_value) {
        if (isset($_POST[$checkbox_name])) {
            $check_query = "SELECT * FROM programco_permissions WHERE program_co_id = '$program_co_id' AND permission_id = '$checkbox_value'";
            $result = mysqli_query($db, $check_query);
            if (mysqli_num_rows($result) == 0) {
                $query = "INSERT INTO programco_permissions (program_co_id, permission_id) VALUES ('$program_co_id', '$checkbox_value')";
                mysqli_query($db, $query);
            }
        } else {
            $query = "DELETE FROM programco_permissions WHERE program_co_id = '$program_co_id' AND permission_id = '$checkbox_value'";
            mysqli_query($db, $query);
        }
    }
}



function submitInstructor()
{
    $db = $GLOBALS['db'];
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $fatherName = mysqli_real_escape_string($db, $_POST['fatherName']);
    $empId = mysqli_real_escape_string($db, $_POST['empId']);
    $department = mysqli_real_escape_string($db, $_POST['department']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $phoneNumber = mysqli_real_escape_string($db, $_POST['phoneNumber']);
    $idNumber = mysqli_real_escape_string($db, $_POST['idNumber']);
    $program = mysqli_real_escape_string($db, $_POST['program']);
    $designation = mysqli_real_escape_string($db, $_POST['designation']);
    $fileName = basename($_FILES["image"]["name"]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    if (in_array($fileType, $allowTypes) && !empty($name) && !empty($fatherName) && !empty($empId) && !empty($department) && !empty($email) && !empty($password) && !empty($phoneNumber) && !empty($idNumber) && !empty($program) && !empty($designation)) {
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
        $insertInstructor = mysqli_query($db, "INSERT INTO `instructor` (`instructor_name`, `instructor_father_name`, `employee_id`, `instructor_dept`, `instructor_email`, `instructor_password`, `instructor_phone_no`, `instructor_identity_no`, `instructor_program`, `instructor_designation`,`ins_image`)
        VALUES ('$name', '$fatherName', '$empId', '$department', '$email', '$password', '$phoneNumber', '$idNumber', '$program', '$designation','$imgContent')");
        if ($insertInstructor) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function getInstructor($id)
{
    $db = $GLOBALS['db'];
    $id = mysqli_real_escape_string($db, $id);
    $retrieveInstructor = mysqli_query($db, "SELECT * FROM `instructor` WHERE instructor_id = '{$id}'");
    if ($retrieveInstructor && mysqli_num_rows($retrieveInstructor) > 0) {
        return $retrieveInstructor;
    } else {
        return false;
    }
}

function getInstructors()
{
    $db = $GLOBALS['db'];
    $retrieveInstructors = mysqli_query($db, "SELECT * FROM `instructor`");
    if (mysqli_num_rows($retrieveInstructors) > 0) {
        return $retrieveInstructors;

    } else {
        return false;
    }
}

function updateInstructor($check)
{
    if ($check) {
        $db = $GLOBALS['db'];
        $instructor_id = mysqli_real_escape_string($db, $_POST['instructor_id']);
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $fatherName = mysqli_real_escape_string($db, $_POST['fatherName']);
        $empId = mysqli_real_escape_string($db, $_POST['empId']);
        $department = mysqli_real_escape_string($db, $_POST['department']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $phoneNumber = mysqli_real_escape_string($db, $_POST['phoneNumber']);
        $idNumber = mysqli_real_escape_string($db, $_POST['idNumber']);
        $program = mysqli_real_escape_string($db, $_POST['program']);
        $designation = mysqli_real_escape_string($db, $_POST['designation']);
        $fileName = basename($_FILES["image"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes) && !empty($name) && !empty($fatherName) && !empty($empId) && !empty($department) && !empty($email) && !empty($password) && !empty($phoneNumber) && !empty($idNumber) && !empty($program) && !empty($designation)) {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));
            $updateInstructor = mysqli_query($db, "UPDATE `instructor` SET
            `instructor_name` = '$name',
            `instructor_father_name` = '$fatherName',
            `employee_id` = '$empId',
            `instructor_dept` = '$department',
            `instructor_email` = '$email',
            `instructor_password` = '$password',
            `instructor_phone_no` = '$phoneNumber',
            `instructor_identity_no` = '$idNumber',
            `instructor_program` = '$program',
            `instructor_designation` = '$designation',
            `ins_image` = '$imgContent'
            WHERE `instructor_id` = $instructor_id");

            if ($updateInstructor) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        $db = $GLOBALS['db'];
        $instructor_id = mysqli_real_escape_string($db, $_POST['instructor_id']);
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $fatherName = mysqli_real_escape_string($db, $_POST['fatherName']);
        $empId = mysqli_real_escape_string($db, $_POST['empId']);
        $department = mysqli_real_escape_string($db, $_POST['department']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $phoneNumber = mysqli_real_escape_string($db, $_POST['phoneNumber']);
        $idNumber = mysqli_real_escape_string($db, $_POST['idNumber']);
        $program = mysqli_real_escape_string($db, $_POST['program']);
        $designation = mysqli_real_escape_string($db, $_POST['designation']);
        if (!empty($name) && !empty($fatherName) && !empty($empId) && !empty($department) && !empty($email) && !empty($password) && !empty($phoneNumber) && !empty($idNumber) && !empty($program) && !empty($designation)) {
            $updateInstructor = mysqli_query($db, "UPDATE `instructor` SET
        `instructor_name` = '$name',
        `instructor_father_name` = '$fatherName',
        `employee_id` = '$empId',
        `instructor_dept` = '$department',
        `instructor_email` = '$email',
        `instructor_password` = '$password',
        `instructor_phone_no` = '$phoneNumber',
        `instructor_identity_no` = '$idNumber',
        `instructor_program` = '$program',
        `instructor_designation` = '$designation'
        WHERE `instructor_id` = $instructor_id");

            if ($updateInstructor) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}

function deleteInstructor()
{
    $db = $GLOBALS['db'];
    if (isset($_POST['instructor_id'])) {
        $instructor_id = mysqli_real_escape_string($db, $_POST['instructor_id']);
        $delete_query = "DELETE FROM instructor WHERE instructor_id = $instructor_id";
        if (mysqli_query($db, $delete_query)) {
            return true;
        } else {
            echo "Error: " . mysqli_error($db);
            exit();
        }
    } else {
        echo "Error: " . mysqli_error($db);
        exit();
    }
}



function getInstructorPermission($id)
{
    $db = $GLOBALS['db'];
    $id = mysqli_real_escape_string($db, $id);
    $instructorPermissions = mysqli_query($db, "SELECT * FROM `instructor_permissions` WHERE instructor_id = '{$id}'");
    if ($instructorPermissions && mysqli_num_rows($instructorPermissions) > 0) {
        return $instructorPermissions;
    } else {
        return false;
    }
}
function updateInstructorPermissions()
{
    $db = $GLOBALS['db'];
    $instructor_id = mysqli_real_escape_string($db, $_POST['instructor_id']);
    $checkboxes = array(
        'View_Courses' => 1,
        'Add/Update/Delete_Courses' => 2,
        'View_Course_Content' => 3,
        'Add/Update/Delete_Course_Content' => 4,
        'View_Results' => 5,
        'Update_Results' => 6
    );
    foreach ($checkboxes as $checkbox_name => $checkbox_value) {
        if (isset($_POST[$checkbox_name])) {
            $check_query = "SELECT * FROM instructor_permissions WHERE instructor_id = '$instructor_id' AND permission_id = '$checkbox_value'";
            $result = mysqli_query($db, $check_query);
            if (mysqli_num_rows($result) == 0) {
                $query = "INSERT INTO instructor_permissions (instructor_id, permission_id) VALUES ('$instructor_id', '$checkbox_value')";
                mysqli_query($db, $query);
            }
        } else {
            $query = "DELETE FROM instructor_permissions WHERE instructor_id = '$instructor_id' AND permission_id = '$checkbox_value'";
            mysqli_query($db, $query);
        }
    }
}


function submitQA()
{
    $db = $GLOBALS['db'];
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $fatherName = mysqli_real_escape_string($db, $_POST['fatherName']);
    $department = mysqli_real_escape_string($db, $_POST['department']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $empId = mysqli_real_escape_string($db, $_POST['empId']);
    $phoneNumber = mysqli_real_escape_string($db, $_POST['phoneNumber']);
    $idNumber = mysqli_real_escape_string($db, $_POST['idNumber']);
    $fileName = basename($_FILES["image"]["name"]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    if (in_array($fileType, $allowTypes) && !empty($name) && !empty($fatherName) && !empty($department) && !empty($email) && !empty($password) && !empty($empId) && !empty($phoneNumber) && !empty($idNumber)) {
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
        $insertProgramCo = mysqli_query($db, "INSERT INTO `qa_officer` (`qa_name`, `qa_father_name`, `qa_dept`, `qa_email`, `qa_password`, `employee_id`, `qa_phone_no`, `qa_identity_no`,`qa_image`)
        VALUES ('$name', '$fatherName', '$department', '$email', '$password', '$empId', '$phoneNumber', '$idNumber', '$imgContent')");
        if ($insertProgramCo) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}


function getQA($id)
{
    $db = $GLOBALS['db'];
    $id = mysqli_real_escape_string($db, $id);
    $retrieveQA = mysqli_query($db, "SELECT * FROM `qa_officer` WHERE qa_id = '{$id}'");
    if ($retrieveQA && mysqli_num_rows($retrieveQA) > 0) {
        return $retrieveQA;
    } else {
        return false;
    }
}

function getQAs()
{
    $db = $GLOBALS['db'];
    $retrieveQA = mysqli_query($db, "SELECT * FROM `qa_officer`");
    if (mysqli_num_rows($retrieveQA) > 0) {
        return $retrieveQA;

    } else {
        return false;
    }
}

function updateQA($check)
{
    if ($check) {
        $db = $GLOBALS['db'];
        $qa_id = mysqli_real_escape_string($db, $_POST['qa_id']);
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $fatherName = mysqli_real_escape_string($db, $_POST['fatherName']);
        $department = mysqli_real_escape_string($db, $_POST['department']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $empId = mysqli_real_escape_string($db, $_POST['empId']);
        $phoneNumber = mysqli_real_escape_string($db, $_POST['phoneNumber']);
        $idNumber = mysqli_real_escape_string($db, $_POST['idNumber']);
        $fileName = basename($_FILES["image"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes) && !empty($name) && !empty($fatherName) && !empty($department) && !empty($email) && !empty($password) && !empty($empId) && !empty($phoneNumber) && !empty($idNumber)) {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));
            $updateQA = mysqli_query($db, "UPDATE `qa_officer` SET
        `qa_name` = '$name',
        `qa_father_name` = '$fatherName',
        `qa_dept` = '$department',
        `qa_email` = '$email',
        `qa_password` = '$password',
        `employee_id` = '$empId',
        `qa_phone_no` = '$phoneNumber',
        `qa_identity_no` = '$idNumber',
        `qa_image` = '$imgContent'
        WHERE `qa_id` = $qa_id");
            if ($updateQA) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        $db = $GLOBALS['db'];
        $qa_id = mysqli_real_escape_string($db, $_POST['qa_id']);
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $fatherName = mysqli_real_escape_string($db, $_POST['fatherName']);
        $department = mysqli_real_escape_string($db, $_POST['department']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $empId = mysqli_real_escape_string($db, $_POST['empId']);
        $phoneNumber = mysqli_real_escape_string($db, $_POST['phoneNumber']);
        $idNumber = mysqli_real_escape_string($db, $_POST['idNumber']);
        if (!empty($name) && !empty($fatherName) && !empty($department) && !empty($email) && !empty($password) && !empty($empId) && !empty($phoneNumber) && !empty($idNumber)) {
            $updateQA = mysqli_query($db, "UPDATE `qa_officer` SET
        `qa_name` = '$name',
        `qa_father_name` = '$fatherName',
        `qa_dept` = '$department',
        `qa_email` = '$email',
        `qa_password` = '$password',
        `employee_id` = '$empId',
        `qa_phone_no` = '$phoneNumber',
        `qa_identity_no` = '$idNumber'
        WHERE `qa_id` = $qa_id");
            if ($updateQA) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}

function deleteQA()
{
    $db = $GLOBALS['db'];
    if (isset($_POST['program_co_id'])) {
        $program_co_id = mysqli_real_escape_string($db, $_POST['program_co_id']);
        $delete_query = "DELETE FROM program_coordinator WHERE program_co_id = $program_co_id";
        if (mysqli_query($db, $delete_query)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function getQAPermissions($id)
{
    $db = $GLOBALS['db'];
    $id = mysqli_real_escape_string($db, $id);
    $qaPermissions = mysqli_query($db, "SELECT * FROM `qa_permissions` WHERE qa_id = '{$id}'");
    if ($qaPermissions && mysqli_num_rows($qaPermissions) > 0) {
        return $qaPermissions;
    } else {
        return false;
    }
}
function updateQAPermissions()
{

    $db = $GLOBALS['db'];
    $qa_id = mysqli_real_escape_string($db, $_POST['qa_id']);
    $checkboxes = array(
        'View_Program_Policies' => 15,
        'Add/Update/Delete_Program_Policies' => 16,
        'View_Program_Objectives' => 17,
        'Add/Update/Delete_Program_Objectives' => 18,
        'View_Courses' => 19,
        'Add/Update/Delete_Courses' => 20,
        'View_Course_Content' => 21,
        'Add/Update/Delete_Course_Content' => 22,
    );
    foreach ($checkboxes as $checkbox_name => $checkbox_value) {
        if (isset($_POST[$checkbox_name])) {
            $check_query = "SELECT * FROM qa_permissions WHERE qa_id = '$qa_id' AND permission_id = '$checkbox_value'";
            $result = mysqli_query($db, $check_query);
            if (mysqli_num_rows($result) == 0) {
                $query = "INSERT INTO qa_permissions (qa_id, permission_id) VALUES ('$qa_id', '$checkbox_value')";
                mysqli_query($db, $query);
            }
        } else {
            $query = "DELETE FROM qa_permissions WHERE qa_id = '$qa_id' AND permission_id = '$checkbox_value'";
            mysqli_query($db, $query);
        }
    }
}


function getSpecificPermission($typeId)
{
    $db = $GLOBALS['db'];
    $id = mysqli_real_escape_string($db, $typeId);
    $permissions = mysqli_query($db, "SELECT * FROM `permissions` WHERE permission_allow = '{$typeId}'");
    if ($permissions && mysqli_num_rows($permissions) > 0) {
        return $permissions;
    } else {
        return false;
    }
}




// if ($insert_student) {
//     echo "Student inserted successfully.";
// } else {
//     echo "Error: " . mysqli_error($db);
// }
// function user_login() {
// 	$db = $GLOBALS['db'];
// 	$email = mysqli_real_escape_string($db, $_POST['login_id']);
// 	$pass = mysqli_real_escape_string($db, $_POST['login_password'])

// 	$user_query = "SELECT * FROM `users` WHERE `user_email`='{$email}'  AND (user_activation_key IS NULL OR user_activation_key = '') LIMIT 1";
// 	$users_results = mysqli_query($db, $user_query);

// 	$user = mysqli_fetch_assoc($users_results);

// 	if(!empty($user) && password_verify($pass , $user['user_pass'])){
// 		$_SESSION = array_merge($_SESSION, $user);

//     }
//     $_SESSION['error_message'] = "Wrong credentials";

//     return '';
// }

// function user_register(){
// 	$db = $GLOBALS['db'];
// //    $pass_crypt = password_hash('12345678' , PASSWORD_BCRYPT);
// //    $insert_admin = mysqli_query($db, "INSERT INTO `admin` (`admin_name` , `admin_email` , `admin_password` ) VALUES ('admin' ,'admin@gmail.com' , '{$pass_crypt}' )");
// //    $user_id = mysqli_insert_id($db);
// //    exit;

//     $name = mysqli_real_escape_string($db, $_POST['register_name']);
// 	$email = mysqli_real_escape_string($db, $_POST['register_email']);
// 	$address = mysqli_real_escape_string($db, $_POST['register_address']);
//     $dob = mysqli_real_escape_string($db, $_POST['register_dob']);

//     $role = mysqli_real_escape_string($db, $_POST['register_user_role']);

// 	$pass = mysqli_real_escape_string($db, $_POST['register_password']);
// 	$pass_crypt = password_hash($pass , PASSWORD_BCRYPT);
//     $activation_key = uniqid();


// 	if( !empty($name) && !empty($email) && !empty($role) && !empty($pass_crypt)  && !empty($address)  && !empty($dob))
//     {

//         $query = "SELECT * FROM `users` WHERE `user_email` = '{$email}'";
//         $users_results = mysqli_query($db, $query);

// //        echo $role;
// //        exit;
//         if(($users_results->num_rows)>0)
//         {
//             $_SESSION['error_message'] = "Email already exists";
//             return $user_id ?? null;

//         }

// //        print_r($users_results->num_rows);
// //        exit;
//         $phone_number = mysqli_real_escape_string($db, $_POST['register_phoneno']);

//         $insert_user = mysqli_query($db, "INSERT INTO `users` (`user_fullname` , `user_email` , `user_pass` , `user_address` , `user_dob` , `user_role`, `user_phone_number`,`user_image`, `user_activation_key`) VALUES ('{$name}' ,'{$email}' , '{$pass_crypt}', '{$address}' , '{$dob}','{$role}','{$phone_number}','default.png', '{$activation_key}')");
// 		$user_id = mysqli_insert_id($db);


//         if($role==2)
//         {
//             $first_name = mysqli_real_escape_string($db, $_POST['register_first_name']);
//             $last_name = mysqli_real_escape_string($db, $_POST['register_last_name']);
//             $nationality = mysqli_real_escape_string($db, $_POST['register_nationality']);
//             $ethnicity = mysqli_real_escape_string($db, $_POST['register_ethnicity']);

//             $education = mysqli_real_escape_string($db, $_POST['register_education']);
//             $research_experience = mysqli_real_escape_string($db, $_POST['register_research_experience']);


//             $insert_urm_candidate = mysqli_query($db, "INSERT INTO `urm_candidates` (`user_id` , `first_name`, `last_name`, `email`, `nationality`, `ethnicity`, `education`, `research_experience` , `phone_number` ) VALUES ('{$user_id}','{$first_name}' ,'{$last_name}'  ,'{$email}' ,'{$nationality}' ,'{$ethnicity}' ,'{$education}' ,'{$research_experience}', '{$phone_number}')");
//             $_SESSION['success_message'] = "Your has successfully created ";

//         }
//         else  if($role==3) //academia
//         {
//             $phone_number = mysqli_real_escape_string($db, $_POST['register_phoneno']);
//             $iname = mysqli_real_escape_string($db, $_POST['register_institution_name']);
//             $iaddress = mysqli_real_escape_string($db, $_POST['register_institution_address']);

//             $insert_academia = mysqli_query($db, "INSERT INTO `academia` (`user_id` ,`institution_name` ,`institution_address`	, `phone_number` ) VALUES ('{$user_id}'  ,'{$iname}','{$iaddress}', '{$phone_number}')");
//             $_SESSION['success_message'] = "Your has successfully created ";

//         }
//         else  if($role==4) //recruiters
//         {
//             $phone_number = mysqli_real_escape_string($db, $_POST['register_phoneno']);
//             $iname = mysqli_real_escape_string($db, $_POST['register_company_name']);
//             $iaddress = mysqli_real_escape_string($db, $_POST['register_company_address']);

//             $insert_academia = mysqli_query($db, "INSERT INTO `recruiters` (`user_id` ,`company_name` ,`company_address`	, `phone_number` ) VALUES ('{$user_id}'  ,'{$iname}','{$iaddress}', '{$phone_number}')");
//             $_SESSION['success_message'] = "Your has successfully created ";

//         }
//         else  if($role==5) //DEI officers
//         {
//             $phone_number = mysqli_real_escape_string($db, $_POST['register_phoneno']);
//             $iname = mysqli_real_escape_string($db, $_POST['register_organization_name']);
//             $iaddress = mysqli_real_escape_string($db, $_POST['register_organization_address']);

//             $insert_academia = mysqli_query($db, "INSERT INTO `dei_officers` (`user_id` ,`organization_name` ,`organization_address`	, `phone_number` ) VALUES ('{$user_id}'  ,'{$iname}','{$iaddress}', '{$phone_number}')");
//             $_SESSION['success_message'] = "Your has successfully created ";

//         }
//         send_welcome($user_id);
// 		return $user_id ?? null;
// 	}
// }

// function get_user_data(){
//     $db = $GLOBALS['db'];
//     $role = $_SESSION ['user_role'];

//     $user_id = $_SESSION ['user_id'];

//     $users = [];


//     $user_count=0;
//     if($role==2) // urm candidates
//     {

//           $query = "SELECT * FROM `urm_candidates` WHERE `user_id` = '{$user_id}' LIMIT 1";
//           $users_results = mysqli_query($db, $query);
//             $user = mysqli_fetch_assoc($users_results);

//             $users[$user_count]['key']= "Nationality";
//             $users[$user_count]['value'] =   $user['nationality'];
//             $user_count++;


//             $users[$user_count]['key']= "Ethnicity";
//             $users[$user_count]['value'] =   $user['ethnicity'];
//             $user_count++;


//             $users[$user_count]['key']= "Education";
//             $users[$user_count]['value'] =   $user['education'];
//             $user_count++;





//             $users[$user_count]['key']= "Research Experience";
//             $users[$user_count]['value'] =   $user['research_experience'];
//             $user_count++;

//             $users[$user_count]['key']= "Phone number";
//             $users[$user_count]['value'] =   $user['phone_number'];

//     }
//     else  if($role==3) //academia
//     {
//         $query = "SELECT * FROM `academia` WHERE `user_id` = '{$user_id}' LIMIT 1";
//         $users_results = mysqli_query($db, $query);
//         $user = mysqli_fetch_assoc($users_results);

//         $users[$user_count]['key']= "Institution Name";
//         $users[$user_count]['value'] =   $user['institution_name'];
//         $user_count++;

//         $users[$user_count]['key']= "Institution Address";
//         $users[$user_count]['value'] =   $user['institution_address'];
//         $user_count++;

//         $users[$user_count]['key']= "Phone number";
//         $users[$user_count]['value'] =   $user['phone_number'];



//     }
//     else  if($role==4) //recruiters
//     {
//         $query = "SELECT * FROM `recruiters` WHERE `user_id` = '{$user_id}' LIMIT 1";
//         $users_results = mysqli_query($db, $query);
//         $user = mysqli_fetch_assoc($users_results);
//         $users[$user_count]['key']= "Company Name";
//         $users[$user_count]['value'] =   $user['company_name'];
//         $user_count++;

//         $users[$user_count]['key']= "Institution Address";
//         $users[$user_count]['value'] =   $user['company_address'];
//         $user_count++;

//         $users[$user_count]['key']= "Phone number";
//         $users[$user_count]['value'] =   $user['phone_number'];
//     }
//     else  if($role==5) //DEI officers
//     {
//         $query = "SELECT * FROM `dei_officers` WHERE `user_id` = '{$user_id}' LIMIT 1";
//         $users_results = mysqli_query($db, $query);
//         $user = mysqli_fetch_assoc($users_results);
//         $users[$user_count]['key']= "Organization Name";
//         $users[$user_count]['value'] =   $user['organization_name'];
//         $user_count++;

//         $users[$user_count]['key']= "Organization Address";
//         $users[$user_count]['value'] =   $user['organization_address'];
//         $user_count++;

//         $users[$user_count]['key']= "Phone number";
//         $users[$user_count]['value'] =   $user['phone_number'];


//     }
// //    print_r(($users));
// //    exit;


//     return $users;
// }
// function submit_contact(){
// 	$db = $GLOBALS['db'];
// 	$name = mysqli_real_escape_string($db, $_POST['name']);
// 	$email = mysqli_real_escape_string($db, $_POST['email']);
// 	$question = mysqli_real_escape_string($db, $_POST['question']);
// 	if (!empty($name) && !empty($email) && !empty($question)) {
//         $insert_user = mysqli_query($db, "INSERT INTO `inquiry` (`inq_sender_name`, `inq_sender_query`, `sender_email`) VALUES ('$name', '$question', '$email')");
//         if ($insert_user) {
//             echo '<script>alert("Record inserted successfully.");</script>';
//         } else {
//             echo "Error: " . mysqli_error($db);
//         }
//     }
    
// }
// function upload_image() {
//     $db = $GLOBALS['db'];
//     $uploadDir=  UPLOAD_DIR . 'UsersProfile/';
//     // Configuration
//     $allowedExtensions = array("jpg", "jpeg", "png", "gif"); // Allowed file extensions

//     // Get the uploaded file information
//     $fileName = $_FILES["imageFile"]["name"];
//     $fileTmpName = $_FILES["imageFile"]["tmp_name"];
//     $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

// //    echo "hello";
// //    exit;
//     // Check if the file extension is allowed
//     if (in_array($fileExtension, $allowedExtensions)) {
//         // Generate a unique filename to avoid overwriting existing files
//         $uniqueFileName = uniqid() . "." . $fileExtension;
//         $destination = $uploadDir . $uniqueFileName;

//         // Attempt to move the uploaded file to the destination directory
//         if (move_uploaded_file($fileTmpName, $destination)) {
//             $final_directory = 'src/UsersProfile/'. $uniqueFileName;

//             $update_user_image = mysqli_query($db, "UPDATE `users` SET `user_image`='{$uniqueFileName}' WHERE `user_id` = {$_SESSION['user_id']}");
//             if(!empty($update_user_image)){
//                 $_SESSION['user_image'] = $uniqueFileName;

//                 $_SESSION['success_message'] = "Image uploaded successfully ";
//             }
//         } else {
//             $_SESSION['error_message'] = "Failed to upload file.";

//         }
//     } else {
//         $_SESSION['error_message'] = "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";

//     }


//     return '';

// }
// function get_posts(){
//     $db = $GLOBALS['db'];
//     $query = "SELECT posts.*, users.user_fullname, users.user_role FROM `posts` INNER JOIN `users` ON `post_user_id` = `user_id` ";
//     $posts_results = mysqli_query($db, $query);
//     $posts = [];
//     while ($post = mysqli_fetch_assoc($posts_results)){
//         $posts[] = $post;
//     }
//     return $posts;
// }

// function get_feedback(){
//     $db = $GLOBALS['db'];
//     $query = "SELECT feedback_reviews.*, users.user_fullname, users.user_role,users.user_image FROM `feedback_reviews` INNER JOIN `users` ON `feedback_reviews`.`user_id` = `users`.`user_id` ";
//     $posts_results = mysqli_query($db, $query);
//     $posts = [];
//     while ($post = mysqli_fetch_assoc($posts_results)){
//         $posts[] = $post;
//     }
//     return $posts;
// }


// function get_user_email($user_id){
//     $db = $GLOBALS['db'];
//     $query = "SELECT * FROM `users` where `user_id` = '{$user_id}' LIMIT 1 ";
//     $user_results = mysqli_fetch_assoc(mysqli_query($db, $query));


//     return $user_results['user_email'];
// }
// function get_post_name($post_id){
//     $db = $GLOBALS['db'];
//     $query = "SELECT * FROM `posts` where `post_id` = '{$post_id}' LIMIT 1 ";
//     $post_results = mysqli_fetch_assoc(mysqli_query($db, $query));


//     return $post_results['post_name'];
// }

// function get_candidate_info($user_id){
//     $db = $GLOBALS['db'];
//     $query = "SELECT * FROM `urm_candidates` where `user_id` = '{$user_id}' LIMIT 1 ";
//     $candidate_results = mysqli_fetch_assoc(mysqli_query($db, $query));


//     return $candidate_results;
// }

// function apply_job_submit(){
//     $db = $GLOBALS['db'];


//     $upload_cv = upload_file('cv', UPLOAD_DIR.'candidate_docs/CV/');
//     $cv = (!empty($upload_cv))? $upload_cv: 'empty.jpg';

//     $upload_cover_letter = upload_file('cover_letter', UPLOAD_DIR.'candidate_docs/CoverLetter/');
//     $cover_letter = (!empty($upload_cover_letter))? $upload_cover_letter: 'empty.jpg';

//     $user_id =  $_SESSION['user_id'];
//     $candidate_id = (get_candidate_info($_SESSION['user_id']))['urm_candidate_id'];
//     $post_id =  $_GET['post_id'];
//     $applied_to_user_id = (get_post_by_id( $post_id))['post_user_id'];


//     $insert_job_applied_users = mysqli_query($db, "INSERT INTO `job_applied_users` (`user_id`, `candidate_id`, `post_id`, `user_cv`, `user_cover_letter`, `status`, `applied_to_user_id`) VALUES ('{$user_id}','{$candidate_id}','{$post_id}','{$cv}','{$cover_letter}','Pending','{$applied_to_user_id}')");
//     $_SESSION['success_message'] = "You have successfully applied for a job ";

//     return mysqli_insert_id($db) ?? null;

// }
// function upload_file($file_field , $target_dir = UPLOAD_DIR) {
//     if(!empty($_FILES[$file_field])) {
//         $target_file = $target_dir . basename($_FILES[$file_field]["name"]);
//         $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

//         $filename = uniqid(). '.' . $imageFileType;
//         $upload_file = $target_dir . $filename;

//         if (move_uploaded_file($_FILES[$file_field]["tmp_name"], $upload_file)) {
//             return $filename;
//         } else {
//             return false;
//         }
//     } else {
//         return false;
//     }
// }
// function get_post_by_id($id){
//     $db = $GLOBALS['db'];
//     $query = "SELECT * FROM `posts` WHERE `post_id` = {$id} LIMIT 1";
//     $posts_results = mysqli_query($db, $query);
//     return mysqli_fetch_assoc($posts_results) ?? null;
// }


// function feedback_submit(){
//     $db = $GLOBALS['db'];


//     $message = mysqli_real_escape_string($db, $_POST['input_messsage']);
//     $rating = mysqli_real_escape_string($db, $_POST['input_rating']);

//     if(empty($rating))
//     {
//         $_SESSION['error_message'] = "Please give rating ";
//         return ;

//     }
//     $user_id =  $_SESSION['user_id'];
//     $date = date('Y-m-d');


//     $insert_feedback = mysqli_query($db, "INSERT INTO `feedback_reviews` (`user_id`, `feedback_message`, `rating`, `feedback_date`) VALUES ('{$user_id}','{$message}','{$rating}','{$date}')");
//     $_SESSION['success_message'] = "Feedback submitted successfully ";

//     return mysqli_insert_id($db) ?? null;

// }
// function get_user_by_id($id){
//     $db = $GLOBALS['db'];
//     $query = "SELECT * FROM `users` WHERE `user_id` = {$id}";
//     $users_results = mysqli_query($db, $query);
//     return mysqli_fetch_assoc($users_results) ?? null;
// }
// function activate_user(){
//     $db = $GLOBALS['db'];
//     $email = mysqli_real_escape_string($db, $_GET['user_email']);
//     $activation_key = mysqli_real_escape_string($db, $_GET['activation_key']);

//     $user_query = "SELECT * FROM `users` WHERE `user_email`='{$email}' AND `user_activation_key` = '{$activation_key}' LIMIT 1";
//     $users_results = mysqli_query($db, $user_query);
//     $user = mysqli_fetch_assoc($users_results);
//     if(!empty($user)){
//         $query = "UPDATE `users` SET `user_activation_key`='' WHERE `user_email`='{$email}'";
//         $activated = mysqli_query($db, $query);
//         if($activated){
//             header('location:index.php');
//         }
//     }
// }
// function forget_password(){
//     $db = $GLOBALS['db'];
//     $email = mysqli_real_escape_string($db, $_POST['user_email']);

//     $user_query = "SELECT * FROM `users` WHERE `user_email`='{$email}'  LIMIT 1";
//     $users_results = mysqli_query($db, $user_query);
//     $user = mysqli_fetch_assoc($users_results);


//     if(!empty($user)){

//             $new_password =generateRandomPassword(10);;
//              $pass_crypt = password_hash($new_password , PASSWORD_BCRYPT);

//              $query = "UPDATE `users` SET `user_pass`='{$pass_crypt}' WHERE `user_email`='{$email}'";
//             $activated = mysqli_query($db, $query);
//             if($activated){
// //                echo $new_password;
// //                exit;
//                 send_forget_password_mail($user['user_id'],$new_password);
//             }
//     }
//     else
//     {
//         $_SESSION['error_message']="Email not exists";
//     }
// }
// function generateRandomPassword($length = 10) {
//     $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
//     $password = '';

//     $characterCount = strlen($characters);

//     for ($i = 0; $i < $length; $i++) {
//         $randomIndex = rand(0, $characterCount - 1);
//         $password .= $characters[$randomIndex];
//     }

//     return $password;
// }
