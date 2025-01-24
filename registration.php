<?php
require_once('db_config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    

    // Add validation for matching passwords
    if ($password != $confirmPassword) {
        echo "Passwords do not match!";
    } else {
        // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO entries (name, email, Username, password) VALUES ('$username', '$email', '$username', '$password')";

        if ($conn->query($sql) === TRUE) {
            // Redirect to front.php upon successful registration
            header("Location: login.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content=""**Revolutionizing the Future: Our Submission for the KnowCode Hackathon**"">
    <meta name="author" content="TheNextBigThing">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
	<meta property="og:site_name" content="" /> <!-- website name -->
	<meta property="og:site" content="" /> <!-- website link -->
	<meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="" /> <!-- where do you want your post to link to -->
	<meta property="og:type" content="article" />

  
    <!-- Website Title -->
    <title>Registration</title>
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/swiper.css" rel="stylesheet">
	<link href="css/magnific-popup.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!-- Favicon  -->
    <link rel="icon" href="Component 1.png">
</head>
<body data-spy="scroll" data-target=".fixed-top">
    
<header id="header" class="ex-2-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Sign Up</h1>
                <p>Fill out the form below to sign up for Brainify. Already signed up? Then just <a class="white" href="log-in.html">Log In</a></p>
                <div class="form-container">
                    <form id="signUpForm" data-focus="false">
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
                            <button type="button" class="form-control-submit-button" id="signupBtn">SIGN UP</button>
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

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $('#signupBtn').click(function () {
            var name = $('#sname').val().trim();
            var email = $('#semail').val().trim();
            var password = $('#spassword').val().trim();
            var confirmPassword = $('#sconfirmpassword').val().trim();
            var termsAccepted = $('#sterms').is(':checked');

            if (name === '' || email === '' || password === '' || confirmPassword === '') {
                $('#smsgSubmit').text('Please fill all fields').css('color', 'red').removeClass('hidden');
                return;
            }

            if (password !== confirmPassword) {
                $('#smsgSubmit').text('Passwords do not match').css('color', 'red').removeClass('hidden');
                return;
            }

            if (!termsAccepted) {
                $('#smsgSubmit').text('You must agree to the terms').css('color', 'red').removeClass('hidden');
                return;
            }

            $.ajax({
                url: 'signup.php',
                type: 'POST',
                data: { name: name, email: email, password: password },
                success: function (response) {
                    if (response.trim() === "success") {
                        window.location.href = "welcome.php";
                    } else {
                        $('#smsgSubmit').text(response).css('color', 'red').removeClass('hidden');
                    }
                },
                error: function () {
                    $('#smsgSubmit').text('Error occurred. Please try again.').css('color', 'red').removeClass('hidden');
                }
            });
        });
    });
</script>



    <!-- Scripts -->
    <script src="js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="js/scripts.js"></script> <!-- Custom scripts -->
</body>
</html>