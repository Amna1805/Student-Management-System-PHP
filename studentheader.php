<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/portalheader.css">

    <title>Document</title>
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
                <li ><a class="active" href="studentportal.php">Home</a></li>
                <li ><a href="studentcourses.php">Courses</a></li>
                <li ><a href="studentexams.php">Exams</a></li>
                <li ><a href="studentresults.php">Results</a></li>
                <li class="hidethem"><a href="studentprofile.php">Profile</a></li>
                <li  class="hidethem"><a href="home.php">Logout</a></li>
            </ul>
        
        </nav>
        <section></section>
    </header>
</body>
</html>