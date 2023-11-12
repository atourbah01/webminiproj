<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if not logged in
    header('Location: login.php');
    exit;
}

// Get the username from the session
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Welcome</title>
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
    <div class="content">
        <h1> Welcome</h1>
        <p> Welcome to my page</p>
    </div>
</body>
</html>