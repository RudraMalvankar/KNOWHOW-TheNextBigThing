<?php
session_start(); // Start the session

// Include the database configuration file
include 'db_config.php';

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page or handle the user not being logged in
    header("Location: login.php");
    exit(); // Stop further execution
}

// Get the username of the logged-in user from the session
$username = $_SESSION['username'];

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch data for the logged-in user
$sql = "SELECT Preference, Note, Braintype FROM entries WHERE Username = '$username'";

// Execute the query
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Preferences</title>


    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        footer {
            margin-top: 20px;
            text-align: center;
        }

        footer a {
            color: red;
            margin: 0 5px;
        }

        footer a:hover {
            text-decoration: underline;
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .button-container button {
            padding: 10px 20px;
            background-color: #d2b48c;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .button-container button:hover {
            background-color: #8b4513;
        }

        .left {
            position: absolute;
            /* Set position to absolute */
            top: 0;
            /* Align to the top */
            left: 0;
            /* Align to the right */
            padding-top: 0.5rem;
            padding-right: 1rem;
            padding-left: 1rem;
        }

        .right {
            position: absolute;
            /* Set position to absolute */
            top: 0;
            /* Align to the top */
            right: 0;
            /* Align to the right */
            padding-top: 0.5rem;
            padding-right: 1rem;
        }


        .b1 {
            background-color: #B46060;
            color: #FFF;
            padding: 10px 15px;
            font-size: 16px;
            border: none;
            font-size: 21px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
    </style>
</head>

<body>

    <header>
        <div class="">
            <!-- <a href="search1.php" class="left-b1";>
            <button>Go to Home</button>
        </a> -->
            <a href="logout.php" class="right">
                <button>Logout</button>
            </a>
        </div>
    </header>

    <h2>User Preferences for <?php echo $username; ?></h2>

    <table>
        <tr>
            <th>Preference</th>
            <th>Note</th>
            <th>Brain Type</th>
        </tr>
        <?php
        // Check if there are any rows returned by the query
        if ($result->num_rows > 0) {
            // Loop through each row of data
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['Preference'] . "</td>"; // Display Preference
                echo "<td>" . $row['Note'] . "</td>"; // Display Note
                echo "<td>" . $row['Braintype'] . "</td>"; // Display Braintype
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No preferences found for this user</td></tr>";
        }
        ?>
    </table>

    <footer>
        <p>© 2024 All Rights Reserved By Rudra Malvankar<span>
                <a href="terms-condition.html">Terms & Conditions</a> |
                <a href="privacy-policy.html">Privacy Policy</a>
            </span></p>
    </footer>

</body>

</html>