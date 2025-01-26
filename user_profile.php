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
    <title>User-Profile</title>
    <style>
        /* styles.css */
body {
  margin: 0;
  font-family: Arial, sans-serif;
  background-color: #f5f5f5;
  color: #333;
}
nav {
  display: flex;
  justify-content: space-between;
  background-color: #5f4dee;
  padding: 0.5rem 4rem;
  color: white;
  position: sticky;
  top: 0;
  z-index: 100;
}

.nav-left, .nav-right {
  display: flex;
  align-items: center;
}

nav a {
  color: white;
  text-decoration: none;
  font-size: 1rem;
  font-weight: bold;
}

nav a:hover {
  text-decoration: underline;
}

.logout-button {
            background-color: rgba(255, 0, 0, 0.875);
            padding: 15px 20px;
            top: 20px;
            right: 20px;
        }


header {
  background-color: #5f4dee;
  color: white;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 1rem 2rem;
}

h2 {
            text-align: center;
            margin-bottom: 30px;
        }


header .user-name {
  background-color: #af52f2;
  color: white;
  padding: 0.5rem 1rem;
  border-radius: 12px;
  font-size: 0.9rem;
}

main {
  padding: 2rem;
  text-align: center;
}

.user-preferences {
  background-color: white;
  padding: 1.5rem;
  margin: 1rem auto;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  border-radius: 8px;
  width: 80%;
}

.user-preferences h2 {
  font-size: 1.5rem;
  margin-bottom: 1rem;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin: 0 auto;
}

table th, table td {
  border: 1px solid #ddd;
  padding: 1rem;
  text-align: left;
}

table th {
  background-color: #f0f0f0;
  font-weight: bold;
}

footer {
  margin-top: 2rem;
}

footer p {
  font-size: 1.1rem;
  font-weight: bold;
  color: #666;
}

.footer-note {
  text-align: center;
  margin-top: 1rem;
  font-size: 0.9rem;
  color: #777;
}

.footer-note a {
  color: #af52f2;
  text-decoration: none;
  margin: 0 0.5rem;
}

.footer-note a:hover {
  text-decoration: underline;
}
.retake-assessment {
    padding: 17px 40px;
    border-radius: 50px;
    cursor: pointer;
    border: 0;
    background-color: white;
    box-shadow: rgba(0, 0, 0, 0.05) 0 0 8px;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    font-size: 15px;
    transition: all 0.5s ease;
    text-decoration: none; /* Remove underline */
    color: inherit; /* Inherit text color */
}

.retake-assessment:hover {
    letter-spacing: 3px;
    background-color: hsl(261deg 80% 48%);
    color: hsl(0, 0%, 100%);
    box-shadow: rgb(93, 24, 220) 0px 7px 29px 0px;
}

.retake-assessment:active {
    transform: translateY(10px);
    box-shadow: rgb(93, 24, 220) 0px 0px 0px 0px;
    transition: 100ms;
}

.retake-assessment:focus {
    outline: none; /* Removes the focus outline */
}


</style>
    </head>
    <body>
    <nav>
        <div class="nav-left">
            <a href="javascript:history.back()" class="search-link">Search</a>
        </div>
        <div class="nav-right">
            <a href="logout.php" class="btn btn-danger logout-button">Logout</a>
        </div>
    </nav>
    
    <header>
        <div class="header-content">
            <h2>
                <img src="images/logo-user profile.png" style="max-width: 40%; height: auto;">
            </h2>
        </div>
    </header>
    
    <main>
        <div class="user-preferences">
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
                        echo "<td>" . $row['Preference'] . "</td>";
                        echo "<td>" . $row['Note'] . "</td>";
                        echo "<td>" . $row['Braintype'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No preferences found for this user</td></tr>";
                }
                ?>
            </table>
        </div>
        <footer>
            <center>
                <a href="retake_assessment.php" class="retake-assessment">Retake Assessment</a>
            </center>
        </footer>
    </main>

    <div class="footer-note">
        <p>© 2025 All Rights Reserved By TheNextBigThing | <a href="#">Terms & Conditions</a> | <a href="#">Privacy Policy</a></p>
    </div>
</body>
            </html>
           
</html>