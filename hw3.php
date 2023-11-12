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
<html>
    <head>
        <meta charset="UTF-8">
        <title>Contact Us</title>
        <link rel="stylesheet" href="hw3.css">
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
        <div class="container">
            <h1>Contact Us</h1>
            <p>If you have any issue feel free to contact us</p>
            <div class="contact-info">
                <h2>Address:</h2>
                <p>Beirut</p>
                <p>Tallet el Khayat</p>
                <p>Mama Street</p>
                <p>Chatila building</p>
                <p>floor 7</p>
                <h2>Mail:</h2>
                <p><a href="mailto:abdallah.tourbah@lau.edu">abdallah.tourbah@lau.edu</a></p>
                <h2>Mobile:</h2>
                <p>(+961) 03900895</p>
            </div>
        </div>
    </body>
</html>