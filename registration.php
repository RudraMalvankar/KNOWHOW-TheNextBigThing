<?php
require_once('db_config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirm_password']);

    // Check if passwords match
    if ($password != $confirmPassword) {
        echo "Passwords do not match!";
    } else {
        // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);  // Hash the password

        $sql = "INSERT INTO entries (Username, Email, Password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $username, $email, $password);

        if ($stmt->execute()) {
            header("Location:login.php ");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}


$conn->close();
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
            <div class="col-lg-12" style="margin-top: -120px;">
                <h1>Sign Up</h1>
                <p>Fill out the form below to sign up for Brainify. Already signed up? Then just <a class="white" href="login.php">Log In</a></p>
                <div class="form-container">
                <form id="registrationForm" method="POST" action="registration.php">
    <div class="form-group">
        <input type="text" class="form-control-input" id="username" name="username" required>
        <label class="label-control" for="username">Username</label>
    </div>
    <div class="form-group">
        <input type="email" class="form-control-input" id="email" name="email" required>
        <label class="label-control" for="email">Email</label>
    </div>
    <div class="form-group">
        <input type="password" class="form-control-input" id="password" name="password" required>
        <label class="label-control" for="password">Password</label>
    </div>
    <div class="form-group">
        <input type="password" class="form-control-input" id="confirm_password" name="confirm_password" required>
        <label class="label-control" for="confirm_password">Confirm Password</label>
    </div>
    <div class="form-group">
        <button type="submit" class="form-control-submit-button">SIGN UP</button>
    </div>
</form>

                </div>
            </div>
        </div>
    </div>
</header>
</body>
</html>
