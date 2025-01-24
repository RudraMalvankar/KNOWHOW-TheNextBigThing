<?php
    session_start();
    require_once('db_config.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        
        $stmt = $conn->prepare("SELECT * FROM entries WHERE username=? AND password=?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['username'] = $username;
            echo "success";
        } else {
            echo "Invalid username or password.";
        }

        $stmt->close();
        $conn->close();
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Branify Learning">
    <meta name="author" content="TheNextBigThing">
    <title>Branify Learning</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link rel="icon" href="Component 1.png">
</head>
<body data-spy="scroll" data-target=".fixed-top">
    <header id="header" class="ex-2-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Log In</h1>
                    <p>You don't have a password? Then please <a class="white" href="sign-up.html">Sign Up</a></p>
                    <div class="form-container">
                        <form id="logInForm" data-focus="false">
                        <div class="form-group">
                                <input type="text" class="form-control-input" id="username" name="username" required>
                                <label class="label-control" for="username">Username</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control-input" id="lpassword" name="password" required>
                                <label class="label-control" for="lpassword">Password</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <button type="button" class="form-control-submit-button" id="loginBtn">LOG IN</button>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-message">
                                <div id="lmsgSubmit" class="h3 text-center hidden"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#loginBtn').click(function () {
                var username = $('#username').val().trim();
                var password = $('#lpassword').val().trim();

                if (username === '' || password === '') {
                    $('#lmsgSubmit').text('Please fill all fields').css('color', 'red').removeClass('hidden');
                    return;
                }

                $.ajax({
                    url: '',
                    type: 'POST',
                    data: { username: username, password: password },
                    success: function (response) {
                        if (response.trim() === "success") {
                            window.location.href = "questions.php";
                        } else {
                            $('#lmsgSubmit').text(response).css('color', 'red').removeClass('hidden');
                        }
                    },
                    error: function () {
                        $('#lmsgSubmit').text('Error occurred. Please try again.').css('color', 'red').removeClass('hidden');
                    }
                });
            });
        });
    </script>
</body>
</html>
