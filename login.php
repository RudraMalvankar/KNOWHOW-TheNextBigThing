<?php
    session_start();
    // if (isset($_SESSION['username'])) {
    //     header("Location: questions.php");
    //     exit();
    // }

    require_once('db_config.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $sql = "SELECT * FROM entries WHERE username='$username' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            session_start();
            $_SESSION['username'] = $username;
            $row = $result->fetch_assoc();

            $username = $row['username'];
            $password = $row['password'];
        
            header("Location:  questions.php");
            
            exit();
        } else {
            echo '<script type="text/javascript">alert("Invalid username or password.")</script>';
        }


        $conn->close();
    }
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Brainify Learning Login">
    <meta name="author" content="TheNextBigThing">
    <title>Brainify Learning - Log In</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link rel="icon" href="Component 1.png">
</head>
<body>
    <header id="header" class="ex-2-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Log In</h1>
                    <p>You don't have an account? Then please <a class="white" href="registration.php">Sign Up</a></p>
                    <div class="form-container">
                        <form id="logInForm" method="POST" action="login.php">
                            <div class="form-group">
                                <input type="text" class="form-control-input" id="username" name="username" required>
                                <label class="label-control" for="username">Username</label>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control-input" id="password" name="password" required>
                                <label class="label-control" for="password">Password</label>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control-submit-button">LOG IN</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
</body>
</html>
