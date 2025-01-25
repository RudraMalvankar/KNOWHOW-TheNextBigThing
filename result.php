<?php
$K = 0;
$V = 0;
$R = 0;
$A = 0;
$highest = null;
$preference = null;
$note = null;

session_start();
require_once('db_config.php');

    $_SESSION['form_submitted'] = true;

    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    }
    if (isset($_GET['logout'])) {
        session_destroy();
        header("Location: login.php");
        exit;
    }

    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    
        
     $sqll = "SELECT * FROM entries WHERE Username = '$username' AND aural > 0 AND visual > 0";
    //$sqll = "SELECT * FROM entries WHERE Username = '$usernamee' AND aural > 0 AND visual > 0";

    $resultt = $conn->query($sqll);

    if ($resultt->num_rows > 0) {   
        header("Location: questions2.php");
    }

    // if ($resultt->num_rows > 0 && $highest != null) {
    //     header("Location: questions2.php");
    //     exit();
    // }

    
    mysqli_close($conn);
    }


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['question1']) || empty($_POST['question2']) || empty($_POST['question3']) || empty($_POST['question4']) || empty($_POST['question5']) || empty($_POST['question6']) || empty($_POST['question7']) || empty($_POST['question8']) || empty($_POST['question9']) || empty($_POST['question10']) || empty($_POST['question11']) || empty($_POST['question12']) || empty($_POST['question13']) || empty($_POST['question14']) || empty($_POST['question15']) || empty($_POST['question16'])) {
        echo '<script>alert("Please select at least one option for each question."); window.location.href = "questions.php";</script>';
        exit();
    } else {
        header("Location: questions2.php");
    }


    if (isset($_POST['question1'])) {
        foreach ($_POST['question1'] as $option) {
            switch ($option) {
                case 'option1':
                    $K++;
                    break;
                case 'option2':
                    $A++;
                    break;
                case 'option3':
                    $R++;
                    break;
                case 'option4':
                    $V++;
                    break;
            }
        }
    }

    if (isset($_POST['question2'])) {
        foreach ($_POST['question2'] as $option) {
            switch ($option) {
                case 'option1':
                    $V++;
                    break;
                case 'option2':
                    $A++;
                    break;
                case 'option3':
                    $R++;
                    break;
                case 'option4':
                    $K++;
                    break;
            }
        }
    }

    if (isset($_POST['question3'])) {
        foreach ($_POST['question3'] as $option) {
            switch ($option) {
                case 'option1':
                    $K++;
                    break;
                case 'option2':
                    $V++;
                    break;
                case 'option3':
                    $R++;
                    break;
                case 'option4':
                    $A++;
                    break;
            }
        }
    }

    if (isset($_POST['question4'])) {
        foreach ($_POST['question4'] as $option) {
            switch ($option) {
                case 'option1':
                    $K++;
                    break;
                case 'option2':
                    $A++;
                    break;
                case 'option3':
                    $V++;
                    break;
                case 'option4':
                    $R++;
                    break;
            }
        }
    }

    if (isset($_POST['question5'])) {
        foreach ($_POST['question5'] as $option) {
            switch ($option) {
                case 'option1':
                    $A++;
                    break;
                case 'option2':
                    $V++;
                    break;
                case 'option3':
                    $K++;
                    break;
                case 'option4':
                    $R++;
                    break;
            }
        }
    }

    if (isset($_POST['question6'])) {
        foreach ($_POST['question6'] as $option) {
            switch ($option) {
                case 'option1':
                    $K++;
                    break;
                case 'option2':
                    $R++;
                    break;
                case 'option3':
                    $V++;
                    break;
                case 'option4':
                    $A++;
                    break;
            }
        }
    }

    if (isset($_POST['question7'])) {
        foreach ($_POST['question7'] as $option) {
            switch ($option) {
                case 'option1':
                    $K++;
                    break;
                case 'option2':
                    $A++;
                    break;
                case 'option3':
                    $V++;
                    break;
                case 'option4':
                    $R++;
                    break;
            }
        }
    }

    if (isset($_POST['question8'])) {
        foreach ($_POST['question8'] as $option) {
            switch ($option) {
                case 'option1':
                    $R++;
                    break;
                case 'option2':
                    $K++;
                    break;
                case 'option3':
                    $A++;
                    break;
                case 'option4':
                    $V++;
                    break;
            }
        }
    }

    if (isset($_POST['question9'])) {
        foreach ($_POST['question9'] as $option) {
            switch ($option) {
                case 'option1':
                    $R++;
                    break;
                case 'option2':
                    $A++;
                    break;
                case 'option3':
                    $K++;
                    break;
                case 'option4':
                    $V++;
                    break;
            }
        }
    }

    if (isset($_POST['question10'])) {
        foreach ($_POST['question10'] as $option) {
            switch ($option) {
                case 'option1':
                    $K++;
                    break;
                case 'option2':
                    $V++;
                    break;
                case 'option3':
                    $R++;
                    break;
                case 'option4':
                    $A++;
                    break;
            }
        }
    }

    if (isset($_POST['question11'])) {
        foreach ($_POST['question11'] as $option) {
            switch ($option) {
                case 'option1':
                    $V++;
                    break;
                case 'option2':
                    $R++;
                    break;
                case 'option3':
                    $A++;
                    break;
                case 'option4':
                    $K++;
                    break;
            }
        }
    }

    if (isset($_POST['question12'])) {
        foreach ($_POST['question12'] as $option) {
            switch ($option) {
                case 'option1':
                    $A++;
                    break;
                case 'option2':
                    $R++;
                    break;
                case 'option3':
                    $V++;
                    break;
                case 'option4':
                    $K++;
                    break;
            }
        }
    }

    if (isset($_POST['question13'])) {
        foreach ($_POST['question13'] as $option) {
            switch ($option) {
                case 'option1':
                    $K++;
                    break;
                case 'option2':
                    $A++;
                    break;
                case 'option3':
                    $R++;
                    break;
                case 'option4':
                    $V++;
                    break;
            }
        }
    }

    if (isset($_POST['question14'])) {
        foreach ($_POST['question14'] as $option) {
            switch ($option) {
                case 'option1':
                    $K++;
                    break;
                case 'option2':
                    $R++;
                    break;
                case 'option3':
                    $A++;
                    break;
                case 'option4':
                    $V++;
                    break;
            }
        }
    }

    if (isset($_POST['question15'])) {
        foreach ($_POST['question15'] as $option) {
            switch ($option) {
                case 'option1':
                    $K++;
                    break;
                case 'option2':
                    $A++;
                    break;
                case 'option3':
                    $R++;
                    break;
                case 'option4':
                    $V++;
                    break;
            }
        }
    }

    if (isset($_POST['question16'])) {
        foreach ($_POST['question16'] as $option) {
            switch ($option) {
                case 'option1':
                    $V++;
                    break;
                case 'option2':
                    $A++;
                    break;
                case 'option3':
                    $R++;
                    break;
                case 'option4':
                    $K++;
                    break;
            }
        }
    }
    $highest = max($K, $A, $R, $V);
    if ($highest == $K) {
        $preference = "Kinesthetic";
    } elseif ($highest == $R) {
        $preference = "Read/Write";
    } elseif ($highest == $A) {
        $preference = "Aural";
    } else {
        $preference = "Visual";

    }

    if ($preference == 'Read/Write') {
        $note = 'Reading and writing learners prefer to take in information that is displayed as words
    and text. You have a strong preference for the reading and writing style of learning.
    You might find it helpful to write down information in order to help you learn and
    remember it.';

    } elseif ($preference == 'Aural') {
        $note = 'Aural (or auditory) learners learn best by hearing information. They tend to get a
    great deal out of lectures and are good at remembering things they are told. You
    might find things like audiobooks and podcasts helpful for learning new things.';
    } elseif ($preference == 'Visual') {
        $note = 'Visual learners learn best by seeing. Graphic displays such as charts, diagrams,
    illustrations, handouts, and videos are all helpful learning tools for visual learners.
    You may find it helpful to incorporate things like pictures and graphs when you are
    learning new information.';
    } elseif ($preference == 'Kinesthetic') {
        $note = 'Kinesthetic (or tactile) learners learn best by touching and doing. Hands-on
    experience is important for kinesthetic learners. Taking classes that give you
    practical, hands-on experience may be helpful when you want to acquire a new skill.';
    } else {
        $note = '';
    }
    
    if (isset($_SESSION['username'])) {
        $usernamee = $_SESSION['username'];
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "vp";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $query = "UPDATE entries 
        SET Visual = $V, Aural = $A, `Read/Write` = $R, Kinesthetic = $K, Preference = '$preference' , Note = '$note'
        WHERE Username = '$usernamee' ";

        
        mysqli_query($conn, $query);

        mysqli_close($conn);
    }
    if (isset($_SESSION['form_submitted'])) {
         unset($_SESSION['form_submitted']);
    }  
} 
?>