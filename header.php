<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/header.css">
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
            <ul>
                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li>
                            <a className="notactive">Login With</a>
                                <ul className="dropdown">
                                    <li><a href="studentlogin.php" className="dropdownlist">Student</a></li>
                                    <li><a href="instructorlogin.php" >Instructor</a></li>
                                    <li><a href="adminlogin.php" >Admin</a></li>
                                    <li><a href="programcologin.php" >Program Co</a></li>
                                    <li><a href="qalogin.php" >QA Officer</a></li>
                                </ul>
                           
                        </li>
            </ul>
        </nav>
        <section></section>
    </header>
</body>
</html>