<?php
// Start or resume session
include_once('functions.php');

// Check if the user is logged in
if (!isset($_SESSION['student'])) {
    // If not logged in, redirect to login page
    header("Location: studentlogin.php");
    exit();
}
if (isset($_POST['take_exam'])) {
    if (takeExam()) {
        echo '<script>alert("Exam take Successfully!")</script>';
        header("Location: studentexams.php");
    } else {
        echo '<script>alert("Failed!")</script>';
    }
} 
include_once('studentheader.php');
?>
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
    <title>Take Exams</title>
</head>

<body>
<?php
 if (isset($_SESSION['student'])) {

     // Access the student's information
     $student = $_SESSION['student'];
     $admission_year=$student['std_admission_year'];
     $std_id=$student['std_id'];
 }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['exam_id'])) {
        $exam_id = $_POST['exam_id'];
        $exam_det = get_exam_details($exam_id);
        $exam_question=get_question_details($exam_id);
        // Fetch and display course details based on $course_id
        // ...
        // Your code to fetch and display course details goes here
        // ...
    } else {
        $exam_id =99;
    }
}

 ?>   
<form method="POST" >
<!---EXAM INFORMATION-->
<section class="exam-info-section">
    <div class="exam-info">
        <div class="exam-info-heading">
        <h2><?php echo $exam_det['exam_title']?></h2>
        </div>
        <div class="time-remaining">
            <span>Time Alloted: </span>
            <span class="red-text"><?php echo $exam_det['time_alloted']?>mins</span>
        </div>
    </div>
    

    <div class="exam-mcqs">
    <form method="POST">
        <?php
        $questionCounter = 1;
        foreach ($exam_question as $question) {
            ?>
            <div class="mcq">
                <div class="questionsdiv">
                    <p><?php echo $questionCounter; ?>.</p>
                    <input class="question" type="text" placeholder="Question <?php echo $questionCounter; ?>" name="question[]" id="question<?php echo $questionCounter; ?>" value="<?php echo htmlspecialchars($question['question']); ?>" readonly>
                </div>
        
                <div class="optionsdiv">
                    <label for="mcq<?php echo $questionCounter; ?>_option1">
                        <input type="radio" name="selected_option[<?php echo $questionCounter; ?>]" value="<?php echo $question['option_1']; ?>" id="mcq<?php echo $questionCounter; ?>_option1" required>
                        <input type="text" class="option" placeholder="Option 1" name="option1[]" value="<?php echo $question['option_1']; ?>" readonly>
                    </label>
                </div>
        
                <div class="optionsdiv">
                    <label for="mcq<?php echo $questionCounter; ?>_option2">
                        <input type="radio" name="selected_option[<?php echo $questionCounter; ?>]" value="<?php echo $question['option_2']; ?>"  id="mcq<?php echo $questionCounter; ?>_option2" required>
                        <input type="text" class="option" placeholder="Option 2" name="option2[]" value="<?php echo $question['option_2']; ?>" readonly>
                    </label>
                </div>
                <input type="hidden" name="questionnaire[]" value="<?php echo $question['quest_id']; ?>">
            </div>
            <?php
            $questionCounter++;
        }        
        ?>
</div>
<input type="hidden" name="std_id" value="<?php echo $std_id; ?>">
<input type="hidden" name="exam_id" value="<?php echo $exam_id; ?>">
        <div class="submit-button">
            <button type="submit" name="take_exam">Submit</button>
        </div>
        
    </div>

</section>


</form>
   
</body>

</html>
<?php 
include_once('studentfooter.php'); ?>