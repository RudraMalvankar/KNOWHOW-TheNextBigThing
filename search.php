<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve search parameters from the form
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Construct your SQL query based on the search parameters
    $sql = "SELECT * FROM preferences WHERE Name = '$name' AND Email = '$email'";
    // Adjust the query based on your table structure and preferences

    $result = $conn->query($sql);

    // Process the search results as needed
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Access data from each row as $row['ColumnName']
            // For example: $row['Name'], $row['Email']
        }
    } else {
        // No results found
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Search Page</title>
    <!-- Include the Google CSE script -->
    <script async src="https://cse.google.com/cse.js?cx=a1759aa9aaf72446b"></script>
    <script>
        function searchPreferences() {
            // Submit the form on button click
            document.getElementById('searchForm').submit();
        }
    </script>
</head>
<body>

<!-- Your search form -->
<form id="searchForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name">

    <label for="email">Email:</label>
    <input type="text" id="email" name="email">

    <!-- Add other input fields for preferences -->

    <button type="button" onclick="searchPreferences()">Search</button>
</form>

<!-- Place the search box where you want it to appear on your page -->
<div class="gcse-search" data-queryParameterName="query" data-autoCompleteMatchType="any" data-resultsUrl="https://www.yourwebsite.com/search-results.html" data-gname="gsearch" data-autoCompleteMatchType="any"></div>

</body>
</html>
