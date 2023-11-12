<?php
require "db.php";
$Db = new Db();
if (isset($_POST['username']) && isset($_POST['fullname']) && isset($_POST['password']) && isset($_POST['sex']) && isset($_POST['dob'])) {
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $password = $_POST['password'];
    $sex = $_POST['sex'];
    $dob = $_POST['dob'];
    if ($Db->dbConnect()) {
        // Save data to CSV file
        $csvData = [$username, $fullname, $password, $sex, $dob];
        $csvFile = fopen('userdata.csv', 'a');  // Open CSV file in append mode
        fputcsv($csvFile, $csvData);  // Write data to CSV file
        fclose($csvFile);  // Close CSV file
        if ($Db->signUp("signup", $username, $fullname, $password, $sex, $dob)) {
            echo "Sign Up Success";
        } else{ echo "Sign up Failed";
        } $Db->closeConnection();
    }else{ echo "Error: Database connection";}
} else{ echo "All fields are required";}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="signup.css">
    <title>Signup</title>
</head>
<body>

    <div class="signup-container">
        <h2>Signup</h2>
        <form id="signupForm" onsubmit="return validateForm()" action="signup.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="sex">Sex:</label>
            <select id="sex" name="sex" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>

            <label for="dob">Date of Birth (YYYY-MM-DD):</label>
            <input type="text" id="dob" name="dob" pattern="\d{4}-\d{2}-\d{2}" placeholder="YYYY-MM-DD" required>

            <button type="submit">Signup</button>
        </form>
    </div>

    <script>
        function validateForm() {
            var username = document.getElementById('username').value;
            var fullName = document.getElementById('fullname').value;
            var password = document.getElementById('password').value;
            var sex = document.getElementById('sex').value;
            var dob = document.getElementById('dob').value;

            if (username === '' || fullName === '' || password === '' || sex === '' || dob === '') {
                alert('All fields must be filled out');
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
