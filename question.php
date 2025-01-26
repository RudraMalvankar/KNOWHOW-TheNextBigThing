<!DOCTYPE html>
<html>
<head>
    <title>The VARK Questionnaire (Version 8.01)  </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

<?php
session_start();

include_once('db_config.php');

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

$sqll = "SELECT * FROM entries WHERE Username = '$username' AND aural > 0 AND visual > 0";
$result = $conn->query($sqll);

if ($result && $result->num_rows > 0) {
    // If user's learning style preference is found in the database
    $row = $result->fetch_assoc();
    $learning_style = $row['Preference'];

    // Redirect to appropriate page based on learning style
    switch ($learning_style) {
        case 'Aural':
            header("Location: audio.html");
            break;
        case 'Visual':
            header("Location: video.html");
            break;
        case 'Kinesthetic':
            header("Location: exp.html");
            break;
        case 'Read/Write':
            header("Location: test.html");
            break;
        default:
            // Redirect to a default page if learning style is not recognized
            header("Location: search1.php");
            break;
    }
    exit(); // Make sure to exit after the redirect
}
?>



<style>
          .custom-button {
    display: inline-block;
    padding: 17px 40px;
    border-radius: 50px;
    cursor: pointer;
    border: 0;
    background-color: white;
    box-shadow: rgba(0, 0, 0, 0.05) 0 0 8px;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    font-size: 15px;
    font-weight: bold;
    color: black;
    text-decoration: none;
    text-align: center;
    transition: all 0.5s ease;
  }

  .custom-button:hover {
    letter-spacing: 3px;
    background-color: hsl(261, 80%, 48%);
    color: hsl(0, 0%, 100%);
    box-shadow: rgb(93, 24, 220) 0px 7px 29px 0px;
  }

  .custom-button:active {
    transform: translateY(10px);
    box-shadow: rgb(93, 24, 220) 0px 0px 0px 0px;
    transition: 100ms;
  }

  .custom-button:not(:active) {
    transform: translateY(0px);
    box-shadow: rgb(93, 24, 220) 0px 7px 29px 0px;
  }
        body {
            background-color: #5F4DEE; 
            margin: 0;
            font-family: Arial, sans-serif;
        }
        
        .container {
            background-color: #ffffff; 
            padding: 50px;
            border-radius: 10px;
            margin: 50px auto;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2); 
            max-width: 95%; /* Adjusted width */
            width: 1200px; /* Increased width for larger layout */
        }
        
        h2 {
            text-align: center;
            margin-bottom: 40px;
            font-size: 28px; /* Increased font size for the title */
        }
        
        .questions-container {
            display: flex;
            flex-direction: column;
            gap: 40px; /* Spacing between questions */
        }

        .form-group {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 15px;
            font-size: 18px; /* Larger font for questions */
        }
        
        .options-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px; /* Increased gap for better spacing */
            align-items: center;
        }
        
        .form-check {
            padding: 25px;
            border: 1px solid #ddd;
            border-radius: 8px;
            transition: background-color 0.3s, border-color 0.3s;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            height: 100px; /* Increased height for more space */
            box-sizing: border-box;
            font-size: 14px !important;
        }

        .form-check input {
            margin-right: 15px;
        }

        .form-check.highlighted {
            background-color: #e6f9e6;
            border-color: #57c757;
        }

        .form-check:hover {
            background-color: #f0f0f0;
            border-color: #bbb;
        }

        .form-check-label {
            font-size: 14px; /* Reduced font size for the options, smaller than questions */
        }

        .logout-button {
            position: absolute;
            top: 20px;
            right: 20px;
        }


	/* Media query for mobile devices */
@media (max-width: 768px) {
    /* Make the options stack vertically on smaller screens */
    .options-container {
        display: block; /* Stack the checkboxes vertically */
        gap: 20px; /* Reduced gap for better spacing */
    }

    /* Override specific CSS for smaller screens */
    .form-check {
        height: auto; /* Adjust height */
        padding: 15px; /* Reduced padding */
    }

    /* Hide elements with 'override' class if you have any */
    .override {
        display: none;
    }
}
    </style>
   
   <a href="?logout=true" class="btn btn-danger logout-button">Logout</a>
    <br>
   

    <div class="container">
    <h2>
               <img src="images/logo-questionaire.png"  style="max-width: 100%; height: auto; padding: 10px; margin: 0 auto; display: block; padding-bottom: 20px;">

    <form method="post" action="result.php" onclick="questionaire2.php">
    <div class="questions-container">
                <!-- Question 1 -->
                <div class="form-group">
                    <label for="question1">1. I need to find the way to a shop that a friend has recommended. I would:</label>
                    <div class="options-container">
                        <div class="form-check">
                            <input type="checkbox" name="question1[]" id="q1-option1" class="form-check-input" value="option1" onclick="toggleHighlight(this)">
                            <label class="form-check-label" for="q1-option1">A. Find out where the shop is in relation to somewhere I know.</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="question1[]" id="q1-option2" class="form-check-input" value="option2" onclick="toggleHighlight(this)">
                            <label class="form-check-label" for="q1-option2">B. Ask my friend to tell me the directions.</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="question1[]" id="q1-option3" class="form-check-input" value="option3" onclick="toggleHighlight(this)">
                            <label class="form-check-label" for="q1-option3">C. Write down the street directions I need to remember.</label>
                        </div> 
                        <div class="form-check">
                            <input type="checkbox" name="question1[]" id="q1-option4" class="form-check-input" value="option4" onclick="toggleHighlight(this)">
                            <label class="form-check-label" for="q1-option4">D. Use a map.</label>
                        </div>
                    </div>
                </div>

                <!-- Question 2 -->
                <div class="form-group">
                    <label for="question2">2. A website has a video showing how to make a special graph or chart. There is a person speaking, some lists and words describing what to do and some diagrams. I would learn most from:</label>
                    <div class="options-container">
                        <div class="form-check">
                            <input type="checkbox" name="question2[]" id="q2-option1" class="form-check-input" value="option1" onclick="toggleHighlight(this)">
                            <label class="form-check-label" for="q2-option1">A. Seeing the diagrams.</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="question2[]" id="q2-option2" class="form-check-input" value="option2" onclick="toggleHighlight(this)">
                            <label class="form-check-label" for="q2-option2">B. Listening.</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="question2[]" id="q2-option3" class="form-check-input" value="option3" onclick="toggleHighlight(this)">
                            <label class="form-check-label" for="q2-option3">C. Reading the words.</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="question2[]" id="q2-option4" class="form-check-input" value="option4" onclick="toggleHighlight(this)">
                            <label class="form-check-label" for="q2-option4">D. Watching the actions.</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="question3">3. I want to find out more about a tour that I am going on. I would:</label>
                    <div class="options-container">
                    <div class="form-check">
                        <input type="checkbox" name="question3[]" id="q3-option1" class="form-check-input" value="option1" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q3-option1">A. Look at details about the highlights and activities on the tour.</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="question3[]" id="q3-option2" class="form-check-input" value="option2" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q3-option2">B. Use a map and see where the places are.</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="question3[]" id="q3-option3" class="form-check-input" value="option3" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q3-option3">C. Read about the tour on the itinerary.</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="question3[]" id="q3-option4" class="form-check-input" value="option4" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q3-option4">D. Talk with the person who planned the tour or others who are going on the tour.</label>
                    </div>
                </div>
                </div>
            
                <div class="form-group">
                    <label for="question4">4. When choosing a career or area of study, these are important for me:</label>
                    <div class="options-container">
                    <div class="form-check">
                        <input type="checkbox" name="question4[]" id="q4-option1" class="form-check-input" value="option1" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q4-option1">A. Applying my knowledge in real situations. </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="question4[]" id="q4-option2" class="form-check-input" value="option2" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q4-option2">B. Communicating with others through discussion. </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="question4[]" id="q4-option3" class="form-check-input" value="option3" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q4-option3">C. Working with designs, maps or charts.</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="question4[]" id="q4-option4" class="form-check-input" value="option4" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q4-option4">D. Using words well in written communications.</label>
                    </div>
                </div>
                </div>
            
                <div class="form-group">
                    <label for="question5">5. When I am learning I:</label>
                    <div class="options-container">
                    <div class="form-check">
                        <input type="checkbox" name="question5[]" id="q5-option1" class="form-check-input" value="option1" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q5-option1">A. Like to talk things through.</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="question5[]" id="q5-option2" class="form-check-input" value="option2" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q5-option2">B. See patterns in things. </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="question5[]" id="q5-option3" class="form-check-input" value="option3" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q5-option3">C. Use examples and applications. </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="question5[]" id="q5-option4" class="form-check-input" value="option4" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q5-option4">D. Read books, articles and handouts. </label>
                    </div>
                </div>
            </div>
                <div class="form-group">
                    <label for="question6">6. I want to save more money and to decide between a range of options. I would:</label>
                    <div class="options-container">
                    <div class="form-check">
                        <input type="checkbox" name="question6[]" id="q6-option1" class="form-check-input" value="option1" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q6-option1">A. Consider examples of each option using my financial information. </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="question6[]" id="q6-option2" class="form-check-input" value="option2" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q6-option2">B. Read a print brochure that describes the options in detail. </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="question6[]" id="q6-option3" class="form-check-input" value="option3" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q6-option3">C. Use graphs showing different options for different time periods. </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="question6[]" id="q6-option4" class="form-check-input" value="option4" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q6-option4">D. Talk with an expert about the options. </label>
                    </div>
                </div>
            </div>
                <div class="form-group">
                    <label for="question7">7. I want to learn how to play a new board game or card game. I would:</label>
                    <div class="options-container">
                    <div class="form-check">
                        <input type="checkbox" name="question7[]" id="q7-option1" class="form-check-input" value="option1" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q7-option1">A. Watch others play the game before joining in. </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="question7[]" id="q7-option2" class="form-check-input" value="option2" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q7-option2">B. Listen to somebody explaining it and ask questions.</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="question7[]" id="q7-option3" class="form-check-input" value="option3" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q7-option3">C. Use the diagrams that explain the various stages, moves and strategies in the game.  </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="question7[]" id="q7-option4" class="form-check-input" value="option4" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q7-option4">D. Read the instructions. </label>
                    </div>
                </div>
            </div>
                
                <div class="form-group">
                    <label for="question8">8. I have a problem with my heart. I would prefer that the doctor:</label>
                    <div class="options-container">
                    <div class="form-check">
                        <input type="checkbox" name="question8[]" id="q8-option1" class="form-check-input" value="option1" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q8-option1">A. Gave me something to read to explain what was wrong.  </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="question8[]" id="q8-option2" class="form-check-input" value="option2" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q8-option2">B. Used a plastic model to show me what was wrong.</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="question8[]" id="q8-option3" class="form-check-input" value="option3" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q8-option3">C. Described what was wrong. </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="question8[]" id="q8-option4" class="form-check-input" value="option4" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q8-option4">D. Showed me a diagram of what was wrong.  </label>
                    </div>
                </div>
            </div>
                <div class="form-group">
                    <label for="question9">9. I want to learn to do something new on a computer. I would:</label>
                    <div class="options-container">
                    <div class="form-check">
                        <input type="checkbox" name="question9[]" id="q9-option1" class="form-check-input" value="option1" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q9-option1">A. Read the written instructions that came with the program. </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="question9[]" id="q9-option2" class="form-check-input" value="option2" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q9-option2">B. Talk with people who know about the program.</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="question9[]" id="q9-option3" class="form-check-input" value="option3" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q9-option3">C. Start using it and learn by trial and error.  </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="question9[]" id="q9-option4" class="form-check-input" value="option4" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q9-option4">D. Follow the diagrams in a book.  </label>
                    </div>
                </div>
            </div>
                <div class="form-group">
                    <label for="question10">10. When learning from the Internet I like:</label>
                    <div class="options-container">
                    <div class="form-check">
                        <input type="checkbox" name="question10[]" id="q10-option1" class="form-check-input" value="option1" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q10-option1">A. Videos showing how to do or make things. </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="question10[]" id="q10-option2" class="form-check-input" value="option2" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q10-option2">B. Interesting design and visual features. </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="question10[]" id="q10-option3" class="form-check-input" value="option3" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q10-option3">C. Interesting written descriptions, lists and explanations.   </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="question10[]" id="q10-option4" class="form-check-input" value="option4" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q10-option4">D. Audio channels where I can listen to podcasts or interviews.   </label>
                    </div>
                </div>
            </div>
                <div class="form-group">
                    <label for="question11">11. I want to learn about a new project. I would ask for:</label>
                    <div class="options-container">
                    <div class="form-check">
                        <input type="checkbox" name="question11[]" id="q11-option1" class="form-check-input" value="option1" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q11-option1">A. Diagrams to show the project stages with charts of benefits and costs. </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="question11[]" id="q11-option2" class="form-check-input" value="option2" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q11-option2">B. A written report describing the main features of the project.   </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="question11[]" id="q11-option3" class="form-check-input" value="option3" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q11-option3">C. An opportunity to discuss the project.  </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="question11[]" id="q11-option4" class="form-check-input" value="option4" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q11-option4">D. Examples where the project has been used successfully.  </label>
                    </div>
                </div>
            </div>
                
                <div class="form-group">
                    <label for="question12">12. I want to learn how to take better photos. I would:</label>
                    <div class="options-container">
                    <div class="form-check">
                        <input type="checkbox" name="question12[]" id="q12-option1" class="form-check-input" value="option1" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q12-option1">A. Ask questions and talk about the camera and its features. </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="question12[]" id="q12-option2" class="form-check-input" value="option2" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q12-option2">B. Use the written instructions about what to do.   </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="question12[]" id="q12-option3" class="form-check-input" value="option3" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q12-option3">C. Use diagrams showing the camera and what each part does.  </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="question12[]" id="q12-option4" class="form-check-input" value="option4" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q12-option4">D. Use examples of good and poor photos showing how to improve them.  </label>
                    </div>
                </div>
            </div>
                <div class="form-group">
                    <label for="question13">13. I prefer a presenter or a teacher who uses:</label>
                    <div class="options-container">
                    <div class="form-check">
                        <input type="checkbox" name="question13[]" id="q13-option1" class="form-check-input" value="option1" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q13-option1">A. Demonstrations, models or practical sessions.  </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="question13[]" id="q13-option2" class="form-check-input" value="option2" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q13-option2">B. Question and answer, talk, group discussion, or guest speakers.    </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="question13[]" id="q13-option3" class="form-check-input" value="option3" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q13-option3">C. Handouts, books, or readings.  </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="question13[]" id="q13-option4" class="form-check-input" value="option4" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q13-option4">D. Diagrams, charts, maps or graphs.  </label>
                    </div>
                </div>
            </div>
                <div class="form-group">
                    <label for="question14">14. I have finished a competition or test and I would like some feedback. I would like to have feedback:</label>
                    <div class="options-container">
                    <div class="form-check">
                        <input type="checkbox" name="question14[]" id="q14-option1" class="form-check-input" value="option1" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q14-option1">A. Using examples from what I have done.  </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="question14[]" id="q14-option2" class="form-check-input" value="option2" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q14-option2">B. Using a written description of my results.  </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="question14[]" id="q14-option3" class="form-check-input" value="option3" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q14-option3">C. From somebody who talks it through with me. </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="question14[]" id="q14-option4" class="form-check-input" value="option4" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q14-option4">D. Using graphs showing what I achieved.  </label>
                    </div>
                </div>
            </div>
                <div class="form-group">
                    <label for="question15">15. I want to find out about a house or an apartment. Before visiting it I would want:</label>
                    <div class="options-container">
                    <div class="form-check">
                        <input type="checkbox" name="question15[]" id="q15-option1" class="form-check-input" value="option1" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q15-option1">A. To view a video of the property.  </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="question15[]" id="q15-option2" class="form-check-input" value="option2" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q15-option2">B. A discussion with the owner. </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="question15[]" id="q15-option3" class="form-check-input" value="option3" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q15-option3">C. A printed description of the rooms and features.</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="question15[]" id="q15-option4" class="form-check-input" value="option4" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q15-option4">D. A plan showing the rooms and a map of the area.  </label>
                    </div>
                </div>
            </div>    
                <div class="form-group">
                    <label for="question16">16. I want to assemble a wooden table that came in parts (kitset). I would learn best from:</label>
                    <div class="options-container">
                    <div class="form-check">
                        <input type="checkbox" name="question16[]" id="q16-option1" class="form-check-input" value="option1" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q16-option1">A. Diagrams showing each stage of the assembly.  </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="question16[]" id="q16-option2" class="form-check-input" value="option2" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q16-option2">B. Advice from someone who has done it before.  </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="question16[]" id="q16-option3" class="form-check-input" value="option3" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q16-option3">C. Written instructions that came with the parts for the table. </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="question16[]" id="q16-option4" class="form-check-input" value="option4" onclick="toggleHighlight(this)">
                        <label class="form-check-label" for="q16-option4">D. Watching a video of a person assembling a similar table. 
            </label>
                    </div>
                </div>
        </div>

        
        <center><button type="submit" class="btn btn-primary">Submit</button></center>
    </form>
    <br>
</div> 
<br>
<div class="col-md-12 text-center">
                <p>© 2024 All Rights Reserved By Rudra Malvankar<span>
                    <a href="terms-condition.html">Terms & Conditions</a> | <a href="privacy-policy.html">Privacy Policy</a> </span></p>
</div>
<br>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
<script>
    function toggleHighlight(checkbox) {
        const parent = checkbox.parentElement;
        if (checkbox.checked) {
            parent.classList.add("highlighted");
        } else {
            parent.classList.remove("highlighted");
        }
    }
</script><script>
    function toggleHighlight(checkbox) {
        const parent = checkbox.parentElement;
        if (checkbox.checked) {
            parent.classList.add("highlighted");
        } else {
            parent.classList.remove("highlighted");
        }
    }
</script>
</body>
</html>