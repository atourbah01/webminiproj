<?php
require "db.php";

$Db = new Db();
if (isset($_POST['username']) && isset($_POST['password'])) {
    if ($Db->dbConnect()) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if ($Db->logIn("login", $username, $password)) {
            saveToCsvFile($username, $password);
            echo "Login Success";
            $_SESSION['username'] = $username;
            header('Location: index.php');
            exit;
        } else echo "Username or Password wrong";
    } else echo "Error: Database connection";
} else echo "All fields are required";
readCsvFile();
function saveToCsvFile($username, $password)
{
    // Specify the path to the CSV file
    $filePath = 'userdata.csv';

    // Open the file in append mode
    $file = fopen($filePath, 'a');

    // Write the data to the CSV file
    fputcsv($file, [$username, $password]);

    // Close the file
    fclose($file);
}
function readCsvFile()
{
    // Specify the path to the CSV file
    $filePath = 'userdata.csv';

    // Open the file in read mode
    $file = fopen($filePath, 'r');
 
    // Read the data from the CSV file
    while (($data = fgetcsv($file)) !== false) {
        echo "Username: " . $data[0] . "<br>";
        echo "Password: " . $data[1] . "<br>";
    }
 
    // Close the file
    fclose($file);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
    <script>
        function validateForm() {
            var username = document.forms["loginForm"]["username"].value;
            var password = document.forms["loginForm"]["password"].value;

            if (username === "" || password === "") {
                alert("Username and password must be filled out");
                return false;
            }
        }
    </script>
</head>
<body>
    <?php
    session_start();

    if (isset($_SESSION['username'])) {
        // If the user is already logged in, redirect to the index page
        header('Location: index.php');
        exit;
    }

    if (isset($_POST['submit'])) {
        // Check login credentials (replace with your authentication logic)
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($Db->dbConnect()) {
            if ($Db->logIn("login", $username, $password)) {
                echo "Login Success";
                $_SESSION['username'] = $username;
                header('Location: index.php');
                exit;
        } else {
            $error_message = 'Invalid username or password';
        }
    } else {
        $error_message = 'Error: Database connection';
    }
}
    ?>

    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="cv.php">CV</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>

    <div class="content">
        <h2>Login</h2>
        <?php
        if (isset($error_message)) {
            echo '<p style="color: red;">' . $error_message . '</p>';
        }
        ?>
        <form name="loginForm" onsubmit="return validateForm()" method="POST" action="login.php">
            <label for="username">Username:</label>
            <input type="text" name="username" required>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <button type="submit" name="submit" id="submit">Login</button>
        </form>
    </div>
</body>
</html>