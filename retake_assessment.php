<?php
session_start(); // Start the session

// Include the database configuration file
include 'db_config.php';

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit();
}

// Get the username of the logged-in user from the session
$username = $_SESSION['username'];

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to reset the preferences and brain type data
$sql = "UPDATE entries 
        SET Visual = 0, 
            Aural = 0, 
            `Read/Write` = 0, 
            Kinesthetic = 0, 
            Brainscore = 0, 
            Braintype = '', 
            Brainnote = '' 
        WHERE Username = '$username'";

// Execute the query to reset the fields
if ($conn->query($sql) === TRUE) {
    // Redirect to the first question page after resetting
    header("Location: question.php");
    exit();
} else {
    // Show an error message if there was an issue with resetting
    echo "Error resetting assessment: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
