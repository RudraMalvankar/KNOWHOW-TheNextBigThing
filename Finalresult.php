<?php

$marks = 0;
$brain = null;
$score = 0;
$imagee = null;
$descript = null;
$preference = null;
$Note = null;
$usernamee = null;
$newnote = null;
$newusername = null;
$newpreference = null;
$newbrainscore = null;
$newbraintype = null;
$newname = null;
$newbrainnote = null;

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    if (empty($_POST['group_a']) || empty($_POST['group_b']) || empty($_POST['group_c']) || empty($_POST['group_d']) || empty($_POST['group_e']) || empty($_POST['group_f']) || empty($_POST['group_g']) || empty($_POST['group_h']) || empty($_POST['group_i']) || empty($_POST['group_j']) || empty($_POST['group_k']) || empty($_POST['group_l']) || empty($_POST['group_m']) || empty($_POST['group_n']) || empty($_POST['group_o']) || empty($_POST['group_p']) || empty($_POST['group_q']) || empty($_POST['group_r']) || empty($_POST['group_s']) || empty($_POST['group_t']) || empty($_POST['group_u'])) {
        echo '<script>alert("Please select at least one option for each group_."); window.location.href = "questions2.php";</script>';
        exit();
    }


    if (isset($_POST["group_a"])) {
        $selectedOption = $_POST["group_a"];
        if ($selectedOption === "option1") {
            $marks++;
        }
    }

    if (isset($_POST["group_b"])) {
        $selectedOption = $_POST["group_b"];
        if ($selectedOption === "option4") {
            $marks++;
        }
    }

    if (isset($_POST["group_c"])) {
        $selectedOption = $_POST["group_c"];
        if ($selectedOption === "option6") {
            $marks++;
        }
    }

    if (isset($_POST["group_d"])) {
        $selectedOption = $_POST["group_d"];
        if ($selectedOption === "option9") {
            $marks++;
        }
    }

    if (isset($_POST["group_e"])) {
        $selectedOption = $_POST["group_e"];
        if ($selectedOption === "option11") {
            $marks++;
        }
    }

    if (isset($_POST["group_f"])) {
        $selectedOption = $_POST["group_f"];
        if ($selectedOption === "option13") {
            $marks++;
        }
    }

    if (isset($_POST["group_g"])) {
        $selectedOption = $_POST["group_g"];
        if ($selectedOption === "option14") {
            $marks++;
        }
    }

    if (isset($_POST["group_h"])) {
        $selectedOption = $_POST["group_h"];
        if ($selectedOption === "option16") {
            $marks++;
        }
    }

    if (isset($_POST["group_i"])) {
        $selectedOption = $_POST["group_i"];
        if ($selectedOption === "option18") {
            $marks++;
        }
    }

    if (isset($_POST["group_j"])) {
        $selectedOption = $_POST["group_j"];
        if ($selectedOption === "option21") {
            $marks++;
        }
    }

    if (isset($_POST["group_k"])) {
        $selectedOption = $_POST["group_k"];
        if ($selectedOption === "option23") {
            $marks++;
        }
    }

    if (isset($_POST["group_l"])) {
        $selectedOption = $_POST["group_l"];
        if ($selectedOption === "option25") {
            $marks++;
        }
    }

    if (isset($_POST["group_m"])) {
        $selectedOption = $_POST["group_m"];
        if ($selectedOption === "option26") {
            $marks++;
        }
    }

    if (isset($_POST["group_n"])) {
        $selectedOption = $_POST["group_n"];
        if ($selectedOption === "option28") {
            $marks++;
        }
    }

    if (isset($_POST["group_o"])) {
        $selectedOption = $_POST["group_o"];
        if ($selectedOption === "option30") {
            $marks++;
        }
    }

    if (isset($_POST["group_p"])) {
        $selectedOption = $_POST["group_p"];
        if ($selectedOption === "option33") {
            $marks++;
        }
    }

    if (isset($_POST["group_q"])) {
        $selectedOption = $_POST["group_q"];
        if ($selectedOption === "option35") {
            $marks++;
        }
    }

    if (isset($_POST["group_r"])) {
        $selectedOption = $_POST["group_r"];
        if ($selectedOption === "option37") {
            $marks++;
        }
    }

    if (isset($_POST["group_s"])) {
        $selectedOption = $_POST["group_s"];
        if ($selectedOption === "option38") {
            $marks++;
        }
    }

    if (isset($_POST["group_t"])) {
        $selectedOption = $_POST["group_t"];
        if ($selectedOption === "option40") {
            $marks++;
        }
    }

    if (isset($_POST["group_u"])) {
        $selectedOption = $_POST["group_u"];
        if ($selectedOption === "option42") {
            $marks++;
        }
    }
    $score = $marks;

    if ($score === null) {
        $brain = 'Score Not Available'; // Handle cases where $score is null
    } elseif ($score > 0 && $score <= 5) {
        $imagee = '../assets/img/left brain.jpg';
        $brain = 'Strong Left Brain';
        $descript = 'Your Left brain is strong. You may like to do Maths, Logic, Planning etc. To activate your right brain we will suggest you to persue some creative activity/hobby/sports.';
    } elseif ($score > 5 && $score <= 8) {
        $brain = 'Moderate Left Brain';
        $imagee = '../assets/img/left brain.jpg';
        $descript = "Your left brain is moderately  activated. Usually you may like to practice science, writing, planning , maths, etc. To activate right brain equally we will suggest you to pursue hobbies like Reading/Music/Dance etc.";
    } elseif ($score > 8 && $score <= 13) {
        $brain = 'Balanced Left and Right Brain';
        $imagee = '../assets/img/white brain.png';
        $descript = "Your both left and right brain are equally dominant. Engineering study will be fun for you. The advice for enhancing brain capacity is to involve yourself in sequential as well as out of box thinking. Observing some real time cases and trying to get solution may help.";
    } elseif ($score > 13 && $score <= 16) {
        $brain = 'Moderate Right Brain';
        $imagee = '../assets/img/right brain.jpg';
        $descript = "Right brain dominant people are rare. You are one of them, Congratulations! As you have chosen to be an engineer, you need to work on Maths ,Science ,writing work. Suggest you to work on logical thinking and Science fundamentals.";
    } elseif ($score > 16) {
        $brain = 'Strong Right Brain';
        $imagee = '../assets/img/right brain.jpg';
        $descript = "Right brain dominant people are rare. You are one of them, Congratulations! You share the ability with people like Einstein, Walt Disney,etc. As you have chosen to be an engineer, you need to work on Science fundamentals ( Maths ,Science ,logical,etc)and try to improve sequential thinking capacity by solving more logic problems.";
    } else {
        $brain = 'Invalid Score'; // Handle any other cases
    }




    if (isset($_SESSION['username'])) {
        $usernamee = $_SESSION['username'];
        require_once('db_config.php');

        $query = "UPDATE entries 
    SET Brainscore = '$score' , Braintype = '$brain' , Brainnote = '$descript'
    WHERE Username = '$usernamee' ";
        mysqli_query($conn, $query);


        $querry = "SELECT Preference FROM entries WHERE Username = '$usernamee'";
        $resultss = $conn->query($querry);

        if ($resultss->num_rows > 0) {
            $row = $resultss->fetch_assoc();
            $preference = $row['Preference'];
        }

        $querrrry = "SELECT Note FROM entries WHERE Username = '$usernamee'";
        $resultsss = $conn->query($querrrry);

        if ($resultsss->num_rows > 0) {
            $row = $resultsss->fetch_assoc();
            $Note = $row['Note'];
        }

        mysqli_close($conn);

        
    
    }

    if (isset($_SESSION['username'])) {
        $usernamee = $_SESSION['username'];
        

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $newquery = "SELECT  `Email`, `Username`, `Preference`, `Note`, `Brainscore`, `Braintype` , 'Brainnote' FROM entries WHERE Username = '$usernamee'";
        $newresultss = $conn->query($newquery);
        if ($newresultss->num_rows > 0) {
            $row = $newresultss->fetch_assoc();
            $newnote = $row['Note'];
        
            $newusername = $row['Username'];
            $newpreference = $row['Preference'];
            $newbraintype = $row['Braintype'];
            $newbrainscore = $row['Brainscore'];
            $newbrainnote = $row['Brainnote'];
        }

    }

    

}





?>



<html>

<head>
    <title>Results</title>
    <meta name="viewport" content="width=device-width, initial-scale=0.9">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('color brain.jpeg');
            background-size: cover;
            padding: 20px;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        /* 
        @media (max-width: 767px) {
            .container {
                padding: 10px;
            }
        } */
        .responsive-img {
            max-width: 100%; /* Ensures image doesn't exceed its container's width */
            height: auto; /* Allows the image to maintain its aspect ratio */
        }
        
        /* Media query for mobile devices */
        @media (max-width: 768px) {
            .responsive-img {
                max-width: 100%; /* You can adjust this value if needed */
            }
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }



        .logout-button {
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .custom-container {
            background-color: #D4EFDF;
            padding: 20px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
        }

        h3,
        h5 {
            display: inline;
            /* or display: inline-block; */
        }

        h5 {
            color: #006400
        }


        .col-md-12.text-center p {
            color: white;
        }

        .text-white {
    font-size: 24px; 
    font-weight: bold; 
}

.mr-3 {
    margin-right: 10px; 
}



    </style>
</head>

<body>
    <!-- <button class="btn btn-danger logout-button">Logout</button> -->
    <div class="d-flex align-items-center">
    <h2 class="text-white mr-3">Hi, <?php echo $usernamee ?></h2>
    <a href="?logout=true" class="btn btn-danger logout-button">Logout</a>
</div>

    <div class="container">
        <div class="result card">
            <div class="card-body">
                <h3>Type of Learner :</h3>

                <h5>
                    <?php echo $newpreference ?>
                </h5>
                <br>
                <br>
                <center>
                    <p class="card-text"><q>
                            <?php echo $newnote ?>
                        </q></p>
                </center>
                <br>
                <br>
                <h3>Brain Function:</h3>
                <h5>
                    <?php echo $newbraintype ?>
                </h5>
                <br>
                <br>


                <center>
                    <p class="card-text"><q>
                            <?php echo $descript ?>
                        </q></p>
                </center>

                <center>
                    <?php echo '<img class="responsive-img" src="color brain.jpg"' . $imagee . '" alt="' . $newbraintype . '">'; ?>
                </center>

                <a href="pdfpage.php">Download PDF</a> this is for pdf download of the result

                <!-- <a href="test.php">Test</a> -->
            </div>
        </div>

    </div>
    <div class="col-md-12 text-center">
        <p>© 2024 All Rights Reserved By Rudra Malvankar<span>
                <a href="terms-condition.html">Terms & Conditions</a> | <a href="privacy-policy.html">Privacy Policy</a>
            </span></p>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>