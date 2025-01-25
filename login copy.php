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
        
            header("Location: questions.php");
            
            exit();
        } else {
            echo '<script type="text/javascript">alert("Invalid username or password.")</script>';
        }


        $conn->close();
    }
    ?>
<html>

<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=0.9">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #bef6b4;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .form-container {
            width: 400px;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
   

    <div class="form-container">
        <h2 class="text-center">Login</h2>
        <form method="POST">
            <div class="form-group">
                <label for="username">username:</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter a username">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password"
                    placeholder="Enter a password">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
        <p class="text-center mt-3">Don't have an account? <a href="register.php">Sign up</a></p>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>