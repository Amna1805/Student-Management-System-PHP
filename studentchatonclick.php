<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/portalheader.css">
    <link rel="stylesheet" type="text/css" href="css/imagewithtext.css">
    <link rel="stylesheet" type="text/css" href="css/continuechat.css">
    <link rel="stylesheet" type="text/css" href="css/chat.css">
    <link rel="stylesheet" href="css/footer.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
    <title>Student Chat</title>
</head>

<body>
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
                        <li><a href="studentprofile.php">Profile</a></li>
                        <li><a href="home.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="navmenu">
                <li ><a href="studentportal.php">Home</a></li>
                <li ><a href="studentcourses.php">Courses</a></li>
                <li ><a   href="studentexams.php">Exams</a></li>
                <li ><a href="studentresults.php">Results</a></li>
                <li class="hidethem"><a href="studentprofile.php">Profile</a></li>
                <li  class="hidethem"><a href="home.php">Logout</a></li>
            </ul>
        </nav>
        <section></section>
    </header>
    <div class="image-with-text">
        <div class="overlay"></div>
        <img src="./images/bg1.jpeg" alt="University Image">
        <div class="image-text-container">
            <h2 class="image-text">CHATS</h2>
        </div>
    </div>
    <a href="programcoordinatorstartchat.php" class="create-chat-button">Start New Chat</a>

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
                            <a href="viewpolicy.php" class="action-button view">Continue Chat</a>
                        </td>
                    </tr>
                    <tr>
                        <td>DR John </td>
                        <td>Student</td>
                        <td>September 21, 2023</td>
                        <td>
                            <a href="viewpolicy.php" class="action-button view">Continue Chat</a>
                        </td>
                    </tr>
                    <tr>
                        <td>DR John </td>
                        <td>Student</td>
                        <td>September 21, 2023</td>
                        <td>
                            <a href="viewpolicy.php" class="action-button view">Continue Chat</a>
                        </td>
                    </tr>
                    <tr>
                        <td>DR John </td>
                        <td>Admin</td>
                        <td>September 21, 2023</td>
                        <td>
                            <a href="viewpolicy.php" class="action-button view">Continue Chat</a>
                        </td>
                    </tr>
                    <tr>
                        <td>DR John </td>
                        <td>Instructor</td>
                        <td>September 21, 2023</td>
                        <td>
                            <a href="viewpolicy.php" class="action-button view">Continue Chat</a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
    <div class="chat-container">
        <a href="studentchat.php"> <i class="fas fa-times close-icon"></i></a>

        <div class="messages">
            <div class="message incoming">
                <p>This is an incoming message.</p>
            </div>
            <div class="message outgoing">
                <p>This is an outgoing message.</p>
            </div>
            <div class="message incoming">
                <p>This is an incoming message.</p>
            </div>
            <div class="message outgoing">
                <p>This is an outgoing message.</p>
            </div>
            <div class="message incoming">
                <p>This is an incoming message.</p>
            </div>
            <div class="message outgoing">
                <p>This is an outgoing message.</p>
            </div>
            <div class="message incoming">
                <p>This is an incoming message.</p>
            </div>
            <div class="message outgoing">
                <p>This is an outgoing message.</p>
            </div>
            <div class="message incoming">
                <p>This is an incoming message.</p>
            </div>
            <div class="message outgoing">
                <p>This is an outgoing message.</p>
            </div>
            <div class="message incoming">
                <p>This is an incoming message.</p>
            </div>
            <div class="message outgoing">
                <p>This is an outgoing message.</p>
            </div>
            <div class="message incoming">
                <p>This is an incoming message.</p>
            </div>
            <div class="message outgoing">
                <p>This is an outgoing message.</p>
            </div>
            <div class="message incoming">
                <p>This is an incoming message.</p>
            </div>
            <div class="message outgoing">
                <p>This is an outgoing message.</p>
            </div>
        </div>
        <div class="message-input">
            <input type="text" id="message" autofocus placeholder="Type your message">
            <button class="create-button update" type="button">Send</button>
        </div>
    </div>
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
                <li><a class="active" href="student.php">Home</a></li>
                <li><a href="studentcourses.php">Courses</a></li>
                <li><a href="studentexams.php">Exams</a></li>
                <li><a href="studentresults.php">Results</a></li>
                <li><a href="studentprofile.php">Profile</a></li>
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