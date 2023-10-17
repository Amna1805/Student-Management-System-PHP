<?php 
include_once('adminheader.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/adminheader.css">
    <link rel="stylesheet" type="text/css" href="css/imagewithtext.css">
    <link rel="stylesheet" type="text/css" href="css/chatbtn.css">
    <link rel="stylesheet" type="text/css" href="css/chat.css">
    <link rel="stylesheet" href="css/footer.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
    <title>Program Coordinator Chat</title>
</head>

<body>
  
    <div class="image-with-text">
        <div class="overlay"></div>
        <img src="./images/bg1.jpeg" alt="University Image">
        <div class="image-text-container">
            <h2 class="image-text">CHATS</h2>
        </div>
    </div>
    <a href="adminstartchat.php" class="create-chat-button">Start New Chat</a>

    <!--CHATS-->
    <div class="chat">
        <h6>Recent Chats</h6>
        <div class="responsivetable">
            <table class="chat-table">
                <thead>
                    <tr>
                        <th>Chat with</th>
                        <th>Role</th>
                        <th>Last time chat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>DR John </td>
                        <td>Instructor</td>
                        <td>September 21, 2023</td>
                        <td>
                            <a href="adminchatonclick.php" class="action-button view">Continue Chat</a>
                        </td>
                    </tr>
                    <tr>
                        <td>DR John </td>
                        <td>Student</td>
                        <td>September 21, 2023</td>
                        <td>
                            <a href="adminchatonclick.php" class="action-button view">Continue Chat</a>
                        </td>
                    </tr>
                    <tr>
                        <td>DR John </td>
                        <td>Student</td>
                        <td>September 21, 2023</td>
                        <td>
                            <a href="adminchatonclick.php" class="action-button view">Continue Chat</a>
                        </td>
                    </tr>
                    <tr>
                        <td>DR John </td>
                        <td>Admin</td>
                        <td>September 21, 2023</td>
                        <td>
                            <a href="adminchatonclick.php" class="action-button view">Continue Chat</a>
                        </td>
                    </tr>
                    <tr>
                        <td>DR John </td>
                        <td>Instructor</td>
                        <td>September 21, 2023</td>
                        <td>
                            <a href="adminchatonclick.php" class="action-button view">Continue Chat</a>
                        </td>
                    </tr>

                </tbody>
            </table>

        </div>
    </div>
 
</body>

</html>
<?php 
include_once('adminfooter.php'); ?>