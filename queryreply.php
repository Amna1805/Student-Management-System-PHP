<?php 
include_once('programcoheader.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/portalheader.css">
    <link rel="stylesheet" href="css/queryreply.css">
    <link rel="stylesheet" href="css/footer.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
    <title>Query Reply</title>
</head>

<body>
 
    <div class="create-query-form">
        <h2>Query Response</h2>
        <form>
            <div class="form-row">
                <div class="form-group">
                    <label for="courseName">Sender Name:</label>
                    <input type="text" id="courseName" name="courseName" value="Jhon Diana" readonly>
                </div>
                <div class="form-group">
                    <label for="courseCredits">Sender Registration No:</label>
                    <input type="number" id="courseCredits" name="courseCredits" value="12345"
                        readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="senderQuery">Sender Query:</label>
                <textarea id="senderQuery" name="senderQuery" readonly>I trust you are doing well. I am writing to express my keen interest in the [Program Name] offered by your institution and to request further details about the program. I am particularly interested in understanding the program's curriculum, course structure, and any specialized tracks it offers. Additionally, I would appreciate information on the program's duration, start dates, and if there are any specific prerequisites or admission requirements. Your insights into these aspects will greatly assist me in making an informed decision about pursuing this program.Furthermore, I am curious to know if there are any unique features or opportunities associated with this program, such as research projects, internships, or study abroad options. Hearing about these aspects would provide valuable insights into the overall learning experience. I would like to thank you in advance for your time and assistance in providing this information.</textarea>
            </div>
            <div class="form-group">
                <label for="courseHours">Reply:</label>
                <textarea id="courseDescription" name="courseDescription" placeholder="Enter Reply here"
                required autofocus></textarea>
            </div>


            <button class="create-button update" type="submit">Reply</button>
        </form>
    </div>

 
</body>

</html>
<?php include_once('programcofooter.php'); ?>