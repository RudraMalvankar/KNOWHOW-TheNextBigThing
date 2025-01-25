<?php
require_once('db_config.php'); // Include the database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Validate passwords match
    if ($password != $confirmPassword) {
        // Display an error message for password mismatch
        echo "<script>alert('Passwords do not match!');</script>";
    } else {
        // Hash the password before storing it (security best practice)
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare the SQL query to insert the user data into the database
        $sql = "INSERT INTO entries (name, email, password) VALUES ('$name', '$email', '$hashedPassword')";

        if ($conn->query($sql) === TRUE) {
            // If successful, redirect to login page
            echo "<script>alert('Registration successful! Please log in.'); window.location.href='login.php';</script>";
        } else {
            // Error inserting the data, show the error message
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }
    }
    
    // Close the DB connection
    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Registration</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>
<header id="header" class="ex-2-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Sign Up</h1>
                <p>Fill out the form below to sign up for Brainify. Already signed up? Then just <a class="white" href="log-in.html">Log In</a></p>
                <div class="form-container">
                    <form id="signUpForm" method="POST" action="registration.php">
                        <div class="form-group">
                            <input type="text" class="form-control-input" id="sname" name="name" required>
                            <label class="label-control" for="sname">Name</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control-input" id="semail" name="email" required>
                            <label class="label-control" for="semail">Email</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control-input" id="spassword" name="password" required>
                            <label class="label-control" for="spassword">Password</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control-input" id="sconfirmpassword" name="confirm_password" required>
                            <label class="label-control" for="sconfirmpassword">Confirm Password</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group checkbox">
                            <input type="checkbox" id="sterms" name="terms" value="Agreed-to-Terms" required>
                            I agree with Brainify <a href="privacy-policy.html">Privacy Policy</a> and <a href="terms-conditions.html">Terms & Conditions</a>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control-submit-button">SIGN UP</button>
                        </div>
                        <div class="form-message">
                            <div id="smsgSubmit" class="h3 text-center hidden"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
</body>
</html>
