<?php
session_start();
require_once('db_config.php');

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

// Check if the user has already completed the first set of questions
$sql = "SELECT * FROM entries WHERE Username = ? AND Aural > 0 AND Visual > 0";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {   
    header("Location: questions2.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if all questions are answered
    for ($i = 1; $i <= 16; $i++) {
        if (empty($_POST['question' . $i])) {
            echo '<script>alert("Please select at least one option for each question."); window.location.href = "questions.php";</script>';
            exit();
        }
    }

    $K = $A = $R = $V = 0;

    // Process each question
    foreach ($_POST as $key => $values) {
        if (strpos($key, 'question') !== false) {
            foreach ($values as $option) {
                switch ($option) {
                    case 'option1': $K++; break;
                    case 'option2': $A++; break;
                    case 'option3': $R++; break;
                    case 'option4': $V++; break;
                }
            }
        }
    }

    // Determine learning preference
    $scores = ['Kinesthetic' => $K, 'Read/Write' => $R, 'Aural' => $A, 'Visual' => $V];
    arsort($scores);
    $preference = key($scores);

    // Define notes based on preference
    $notes = [
        'Read/Write' => 'Reading and writing learners prefer text-based learning.',
        'Aural' => 'Aural learners learn best through listening and speaking.',
        'Visual' => 'Visual learners benefit from charts and images.',
        'Kinesthetic' => 'Kinesthetic learners learn by doing and hands-on experience.'
    ];
    $note = $notes[$preference];

    // Update the database with the results
    $query = "UPDATE entries SET Visual = ?, Aural = ?, `Read/Write` = ?, Kinesthetic = ?, Preference = ?, Note = ? WHERE Username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iiiisss", $V, $A, $R, $K, $preference, $note, $username);

    if ($stmt->execute()) {
        echo "Data updated successfully!";
        header("Location: questions2.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
