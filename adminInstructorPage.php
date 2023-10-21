<?php
include_once('adminheader.php');
include_once('functions.php');
$instructors = getInstructors();
if (isset($_POST['delete_instructor'])) {
    if (deleteInstructor()) {
        echo '<script>alert("Instructor Deleted Succesfully!")</script>';
        header('location:adminProgramcopage.php');
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
    <link rel="stylesheet" type="text/css" href="css/adminheader.css">
    <link rel="stylesheet" type="text/css" href="css/imagewithtext.css">
    <link rel="stylesheet" type="text/css" href="css/adminpage.css">
    <link rel="stylesheet" type="text/css" href="css/chatbtn.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
    <title>Monitor Instructor</title>
    <script>
        function completeDeletion() {
            const response = confirm('Are you sure you want to delete this instructor?')
            if (response) {
                return true
            } else {
                return false
            }
        }
    </script>
</head>

<body>

    <div class="image-with-text">
        <div class="overlay"></div>
        <img src="./images/bg1.jpeg" alt="University Image">
        <div class="image-text-container">
            <h1 class="image-text">Instructor</h1>
        </div>
    </div>
    <a href="createinstructor.php" class="create-course-button">Add New Instructor</a>

    <!---EXAMS-->

    <div class="role-information">
        <h6>INSTRUCTORS</h6>
        <?php
        if ($instructors == false) {
            ?>
            <h6>No instructors data found.</h6>
            <?php
        } else {
            ?>
            <div class="responsivetable">
                <table class="role-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Employee ID</th>
                            <th colspan="5">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($instructors)) {
                            $instructor_id = $row['instructor_id'];
                            $instructor_name = $row['instructor_name'];
                            $employee_id = $row['employee_id'];
                            ?>
                            <tr>
                                <td>
                                    <?php echo $instructor_name ?>
                                </td>
                                <td>
                                    <?php echo $employee_id ?>
                                </td>
                                <td>
                                    <a href="viewinstructor.php?instructor_id=<?php echo $instructor_id; ?>"
                                        class="action-button view">View</a>
                                </td>
                                <td>
                                    <a href="updateinstructor.php?instructor_id=<?php echo $instructor_id; ?>"
                                        class="action-button update">Update</a>
                                </td>
                                <td>
                                    <form method="POST" onsubmit="return completeDeletion()">
                                        <input type="text" name="instructor_id" hidden value="<?php echo $instructor_id; ?>" />
                                        <button type="submit" class="action-button delete"
                                            name="delete_instructor">Delete</button>
                                    </form>
                                </td>
                                <td>
                                    <a href="instructorpermissions.php?instructor_id=<?php echo $instructor_id; ?>" class="action-button permission">Permissions</a>
                                </td>
                                <td>
                                    <a href="studentactivities.php" class="action-button monitor">Monitor</a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <?php
        }
        ?>
    </div>
    <a class="myBtn" href="adminchat.php">
        <span class="icon"></span>
        Chat
    </a>
    <!-- Footer -->



</body>

</html>
<?php
include_once('adminfooter.php'); ?>