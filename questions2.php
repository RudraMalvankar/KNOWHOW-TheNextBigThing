<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
session_start();
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
    $usernamee = $_SESSION['username'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "vp";  // vidhidb -> vp

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sqll = "SELECT * FROM entries WHERE Username = '$usernamee' AND Brainscore > 0";
    $resultt = $conn->query($sqll);

   

    mysqli_close($conn);
}
?>

    <html>

    <head>
        <title>Test Your Brain </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    </head>

    <body>

        

        <style>
            body {
                background-image: url('color brain.jpeg');
                background-size: cover;
            }

            /* .container {
                background-color: #ffffff;
                padding: 20px;
                border-radius: 10px;
                margin-top: 50px;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            } */

            .container {
    background-color: rgba(255, 255, 255, 0.7); 
    padding: 20px; 
    border-radius: 10px; 
    margin-top: 50px;
    margin: 0 auto; 
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

            h2 {
                text-align: center;
                margin-bottom: 30px;
            }

            .form-group {
                margin-bottom: 20px;
            }

            label {
                font-weight: bold;
            }

            .form-check-label {
                font-weight: normal;
            }

            .btn-primary {
                background-color: #007bff;
                border-color: #007bff;
            }

            .btn-primary:hover {
                background-color: #0069d9;
                border-color: #0069d9;
            }

            .logout-button {
                position: absolute;
                top: 20px;
                right: 20px;
            }

            .col-md-12.text-center p {
        color: white;
    }
        </style>

        <a href="?logout=true" class="btn btn-danger logout-button">Logout</a>
        <br><br><br>



        <div class="container">
            <h2>
                <?php
                echo "Test Your Brain To Improve "; ?>
            </h2>
            <form method="post" action="Finalresult.php">

            <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Group</th>
                            <th>Question</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>A</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="group_a" id="option1" value="option1" >
                                    <label class="form-check-label" for="option1">It's fun to take risks.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="group_a" id="option2" value="option2">
                                    <label class="form-check-label" for="option2">I have fun without taking risks.</label>
                                </div>
                                
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>B</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="group_b" id="option4" value="option4" >
                                    <label class="form-check-label" for="option4">I involve in many jobs that i never finish.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="group_b" id="option5" value="option5">
                                    <label class="form-check-label" for="option5">I finish a job before starting a new one.</label>
                                </div>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>C</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="group_c" id="option6" value="option6" >
                                    <label class="form-check-label" for="option6">I look for new ways to do old jobs.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="group_c" id="option7" value="option7">
                                    <label class="form-check-label" for="option7">When one way works well ,then i don't change it.</label>
                                </div>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>D</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="group_d" id="option8" value="option8" >
                                    <label class="form-check-label" for="option8">I am not very imaginative in my work.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="group_d" id="option9" value="option9">
                                    <label class="form-check-label" for="option9">I use my imagination in everything i do.</label>
                                </div>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>E</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="group_e" id="option10" value="option10" >
                                    <label class="form-check-label" for="option10">I can analyze what is going to happen next.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="group_e" id="option11" value="option11">
                                    <label class="form-check-label" for="option11">I can sense what is going to happen next.</label>
                                </div>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>F</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="group_f" id="option12" value="option12" >
                                    <label class="form-check-label" for="option12">I try to find the one best way to solve a problem.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="group_f" id="option13" value="option13">
                                    <label class="form-check-label" for="option13">I try to find different answers to a problem.</label>
                                </div>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>G</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="group_g" id="option14" value="option14" >
                                    <label class="form-check-label" for="option14">My thinking is like pictures going through my head.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="group_g" id="option15" value="option15">
                                    <label class="form-check-label" for="option15">My thinking is like words going through my head.</label>
                                </div>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>H</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="group_h" id="option16" value="option16" >
                                    <label class="form-check-label" for="option16">I agree with new ideas before other people do.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="group_h" id="option17" value="option17">
                                    <label class="form-check-label" for="option17">I question new ideas more than other people do.</label>
                                </div>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>I</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="group_i" id="option18" value="option18" >
                                    <label class="form-check-label" for="option18">Other people dont understand how i organize things.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="group_i" id="option19" value="option19">
                                    <label class="form-check-label" for="option19">Other people think i organize things well.</label>
                                </div>
                                
                            </td>
                        </tr>
                        <tr>
                        <td>J</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="group_j" id="option20" value="option20" >
                                    <label class="form-check-label" for="option20">I have good self discipline.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="group_j" id="option21" value="option21">
                                    <label class="form-check-label" for="option21">I usually act on my feelings.</label>
                                </div>
                                
                            </td>
                        </tr>
                        <tr>
                        <td>K</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="group_k" id="option22" value="option22" >
                                    <label class="form-check-label" for="option22">I plan time for doing my work.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="group_k" id="option23" value="option23">
                                    <label class="form-check-label" for="option23">I don't think about time when i work.</label>
                                </div>
                                
                            </td>
                        </tr>
                        <tr>
                        <td>L</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="group_l" id="option24" value="option24" >
                                    <label class="form-check-label" for="option24">With a hard decision,I choose what I know is right.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="group_l" id="option25" value="option25">
                                    <label class="form-check-label" for="option25">With a hard decision,I choose what I feel is right.</label>
                                </div>
                                
                            </td>
                        </tr>
                        <tr>
                        <td>M</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="group_m" id="option26" value="option26" >
                                    <label class="form-check-label" for="option26">I do the easy things first and important things later.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="group_m" id="option27" value="option27">
                                    <label class="form-check-label" for="option27">I do important things first and easy things later.</label>
                                </div>
                                
                            </td>
                        </tr>
                        <tr>
                        <td>N</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="group_n" id="option28" value="option28" >
                                    <label class="form-check-label" for="option28">Sometimes in a new situation ,I have too many ideas.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="group_n" id="option29" value="option29">
                                    <label class="form-check-label" for="option29">Sometimes in a new situation ,I don't have any ideas.</label>
                                </div>
                                
                            </td>
                        </tr>
                        <tr>
                        <td>O</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="group_o" id="option30" value="option30" >
                                    <label class="form-check-label" for="option30">I have to have a lot of change and variety in my life.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="group_o" id="option31" value="option31">
                                    <label class="form-check-label" for="option31">I have to have an orderly and well-planned life.</label>
                                </div>
                                
                            </td>
                        </tr>
                        <tr>
                        <td>P</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="group_p" id="option32" value="option32" >
                                    <label class="form-check-label" for="option32">I know i am right, because i have good reasons.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="group_p" id="option33" value="option33">
                                    <label class="form-check-label" for="option33">I know i am right even without good reasons.</label>
                                </div>
                                
                            </td>
                        </tr>
                        <tr>
                        <td>Q</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="group_q" id="option34" value="option34" >
                                    <label class="form-check-label" for="option34">I spraed my work evenly over the time i have.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="group_q" id="option35" value="option35">
                                    <label class="form-check-label" for="option35">I prefer to do my work at the last minute.</label>
                                </div>
                                
                            </td>
                        </tr>
                        <tr>
                        <td>R</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="group_r" id="option36" value="option36" >
                                    <label class="form-check-label" for="option36">I keep everything in particular place.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="group_r" id="option37" value="option37">
                                    <label class="form-check-label" for="option37">Where i keep things depends on what i am doing.</label>
                                </div>
                                
                            </td>
                        </tr>
                        <tr>
                        <td>S</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="group_s" id="option38" value="option38" >
                                    <label class="form-check-label" for="option38">I have to make my own plans.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="group_s" id="option39" value="option39">
                                    <label class="form-check-label" for="option39">I can follow anyone's plans.</label>
                                </div>
                                
                            </td>
                        </tr>
                        <tr>
                        <td>T</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="group_t" id="option40" value="option40" >
                                    <label class="form-check-label" for="option40">I am very flexible and unpredictable person.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="group_t" id="option41" value="option41">
                                    <label class="form-check-label" for="option41">I am a consistent and stable person.</label>
                                </div>
                                
                            </td>
                        </tr>
                        <tr>
                        <td>U</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="group_u" id="option42" value="option42" >
                                    <label class="form-check-label" for="option42">With a new task, I want to find my own way of doing it.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="group_u" id="option43" value="option43">
                                    <label class="form-check-label" for="option43">With a new task, I want to be told the best way to do it.</label>
                                </div>
                                
                            </td>
                        </tr>
                    </tbody>
                </table>
                


                <center><button type="submit" class="btn btn-primary">Submit</button></center>
            </form>
            <br>
        </div>
        <br>
        <div class="col-md-12 text-center">
            <p>© 2024 All Rights Reserved By Rudra Malvankar<span>
                    <a href="terms-condition.html">Terms & Conditions</a> | <a href="privacy-policy.html">Privacy Policy</a>
                </span></p>
        </div>
        <br>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    </body>

    </html>