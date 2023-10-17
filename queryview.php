<?php include_once('programcoheader.php'); ?>
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
        <h2>View Query</h2>
        <form>
            <div class="form-row">
                <div class="form-group">
                    <label for="senderName">Sender Name:</label>
                    <input type="text" id="senderName" name="senderName" value="John Diana" readonly>
                </div>
                <div class="form-group">
                    <label for="senderRegistrationNo">Sender Registration No:</label>
                    <input type="number" id="senderRegistrationNo" name="senderRegistrationNo" value="12345" readonly>
                </div>
            </div>
        
            <div class="form-group">
                <label for="senderQuery">Sender Query:</label>
                <textarea id="senderQuery" name="senderQuery" readonly>I trust you are doing well. I am writing to express my keen interest in the [Program Name] offered by your institution and to request further details about the program. I am particularly interested in understanding the program's curriculum, course structure, and any specialized tracks it offers. Additionally, I would appreciate information on the program's duration, start dates, and if there are any specific prerequisites or admission requirements. Your insights into these aspects will greatly assist me in making an informed decision about pursuing this program.Furthermore, I am curious to know if there are any unique features or opportunities associated with this program, such as research projects, internships, or study abroad options. Hearing about these aspects would provide valuable insights into the overall learning experience. I would like to thank you in advance for your time and assistance in providing this information.</textarea>
            </div>
            
            <div class="form-group">
                <label for="reply">Reply:</label>
                <textarea id="reply" name="reply" readonly>Dear [Student's Name],

                    Thank you for your inquiry about our [Program Name]. We appreciate your interest in our program. I'd be happy to provide you with more information. The program offers a comprehensive curriculum with a focus on [mention any unique features or highlights]. It typically spans [duration] and typically begins in [start month/year]. As for admission, we do have specific prerequisites, including [mention prerequisites], and [mention admission requirements]. Additionally, our program offers exciting opportunities for [mention any unique features, such as internships or study abroad options]. Your enthusiasm for our program is encouraging, and I'm here to assist you further. Please feel free to reach out if you have any more questions.
                    
                    Best regards, [Program Coordinator's Name] [Institution Name]</textarea>
            </div>
        </form>
        
    </div>


</body>

</html>
<?php include_once('programcofooter.php'); ?>