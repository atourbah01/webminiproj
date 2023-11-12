<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}

// Get the username from the session
$username = $_SESSION['username'];
?>
<DOCTYPE html>
    <head>
       <title>My CV</title>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
       <link rel="stylesheet" type="text/css" href="stylehw1.css"/>
    </head>
    <body>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="hw1.php">CV</a></li>
                <li><a href="hw2.php">Gallery</a></li>
                <li><a href="hw3.php">Contact</a></li>
                <li style="float:right;">
                    <?php
                    // Display welcome message and logout button
                    echo "Welcome, " . $_SESSION['username'] . "!";
                    echo ' <a href="logout.php">Logout</a>';
                    ?>
                </li>
            </ul>
        </nav>
        <div class="con">
        <div class="left">
            <div class="profile">
                <div class="image">
                    <img src="IMG_4042.jpg">
                </div>
                <h2> Abdallah Tourbah<br><span> CS student</span></h2>
            </div>
            <div class="contact"><h3 class="title">Contact Info</h3>
                <ul>
                    <li>
                        <span class="icon"><i class="fas fa-phone"></i></span>
                        <span class="txt">03900895</span>
                    </li>
                    <li>
                        <span class="icon"><i class="fas fa-envelope"></i></span>
                        <span class="txt">abdallah.tourbah@lau.edu</span>
                    </li>
                    <li>
                        <span class="icon"><i class="fa-brands fa-facebook"></i></span>
                        <span class="txt">Abdallah Tourbah</span>
                    </li>
                    <li>
                        <span class="icon"><i class="fab fa-linkedin-in"></i></span>
                        <span class="txt">Abdallah Tourbah</span>
                    </li>
                    <li>
                        <span class="icon"><i class="fas fa-location-arrow"></i></span>
                        <span class="txt">Beirut, Lebanon</span>
                    </li>
                </ul>
            </div>
            <div class="education"><h3 class="title">Education</h3>
                <ul>
                    <li>
                        <h5>2019-2024</h5>
                        <h4> Bachelor in Computer Science</h4>
                        <h4>Lebanese American University</h4>
                    </li>
                    <li>
                        <h5>2004-2019</h5>
                        <h4>French Baccalaureate</h4>
                        <h4>Lycee Abdel Kader</h4>
                    </li>
                </ul>
            </div>
            <div class="language"><h3 class="title"> Computer Languages</h3>
                <ul>
                    <li>
                        <span class="txt">Python</span>
                        <span class="percent"><div style="width: 70%;"></div></span>
                    </li>
                    <li>
                        <span class="txt">JAVA</span>
                        <span class="percent"><div style="width: 90%;"></div></span>
                    </li>
                    <li>
                        <span class="txt">C</span>
                        <span class="percent"><div style="width: 80%;"></div></span>
                    </li>
                    <li>
                        <span class="txt">Swift</span>
                        <span class="percent"><div style="width: 40%;"></div></span>
                    </li>
                    <li>
                        <span class="txt"> Html & CSS</span>
                        <span class="percent"><div style="width: 60%;"></div></span>
                    </li>
                    <li>
                        <span class="txt">Solidity</span>
                        <span class="percent"><div style="width: 50%;"></div></span>
                    </li>
                    <li>
                        <span class="txt">JavaScript</span>
                        <span class="percent"><div style="width: 20%;"></div></span>
                    </li>
                </ul>
            </div>
            <div class="language"><h3 class="title"> Languages</h3>
                <ul>
                    <li>
                        <span class="txt">French</span>
                        <span class="percent"><div style="width: 70%;"></div></span>
                    </li>
                    <li>
                        <span class="txt">Arabic</span>
                        <span class="percent"><div style="width: 90%;"></div></span>
                    </li>
                    <li>
                        <span class="txt">English</span>
                        <span class="percent"><div style="width: 80%;"></div></span>
                    </li>
                </ul>
            </div>
            <div class="cert"><h3 class="title">Certifications</h3>
                <ol>
                    <li>
                        <span class="txt">Lebanese Brevet(2016)<i class="fa-solid fa-check"></i></span>
                    </li>
                    <li>
                        <span class="txt">French Baccalaureat(2019)<i class="fa-solid fa-check"></i></span>
                    </li>
                    <li>
                        <span class="txt">BS in Computer Science<i class="fa-solid fa-hourglass-half"></i></span>
                    </li>
                </ol>
            </div>
        </div>
        <div class="right">
            <div class="about"><h2 class="title2">Profile</h2></div>
            <p>I am a dedicated and innovated computer science student who is actively looking for an internship.
               I am an effective learner who have a strong background in coding and ambitious in being a developer.
               I seek to learn in an environment that is conductive to my intellectual, professional, and personal growth, 
               where I can contribute significantly to the growth of the company leading to success.  
            </p>
            <div class="about"><h2 class="exp">Experience</h2>
                <div class="box">
                    <div class="yearcomp">
                        <h5>April 2017- May 2017</h5>
                        <h5>Nokia</h5>
                    </div>
                    <div class="txt">
                        <h4>internship</h4>
                        <p> I learned about dishes and antennnas as well as networking and communication</p>
                    </div>
                </div>
                <div class="box">
                    <div class="yearcomp">
                        <h5>September 2019- December 2019</h5>
                        <h5>Lebanese American University</h5>
                    </div>
                    <div class="txt">
                       <h4>Library part time employer</h4>
                       <p>I learned to calm noisy students, provide support and help them such as scanning and printing </p>
                    </div>
                </div>
                <div class="box">
                    <div class="yearcomp">
                        <h5>February 2020- May 2020</h5>
                        <h5>Lebanese American University</h5>
                    </div>
                    <div class="txt">
                       <h4>IT Helpdesk part time employer</h4>
                       <p> I learned to help teachers having technical issues with the class laptop and provide assistance for video conference meetings</p>
                    </div>
                </div>
            </div>
            <div class="about skills">
               <h2 class="title2"> Professional Skills</h2>
               <div class="box">
                    <h4>communication and teamwork</h4>
                    <div class="percent"><div style="width:60%"></div></div>
                </div>
                <div class="box">
                    <h4>creativity and innovation</h4>
                    <div class="percent"><div style="width:70%"></div></div>
                </div>
                <div class="box">
                    <h4>finish tasks in time</h4>
                    <div class="percent"><div style="width:100%"></div></div>
                </div>
                <div class="box">
                    <h4>work independantly</h4>
                    <div class="percent"><div style="width:80%"></div></div>
                </div>
                <div class="box">
                    <h4>passionate</h4>
                    <div class="percent"><div style="width:90%"></div></div>
                </div>
            </div>
            <div class="about interest">
                <h2 class="title">Interest</h2>
                <ul>
                   <li><i class="fas fa-gamepad"></i>Gaming</li>
                   <li><i class="fas fa-swimmer"></i>Swimming</li>
                   <li><i class="fas fa-camera"></i>Photography</li>
                   <li><i class="fa-solid fa-cloud"></i>Developing</li>
                   <li><i class="fa-solid fa-car"></i>Driving</li>
                   <li><i class="fa-solid fa-headphones"></i>Music</li>
                </ul>
            </div>
        </div>
    </body>
</DOCTYPE html>

