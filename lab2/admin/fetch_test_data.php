<?php
// Assuming you have already established a database connection
require('../config.php');

if (isset($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $id = mysqli_real_escape_string($con, $_GET['id']);

    // Query to fetch data based on the provided ID
    $query = "SELECT * FROM test_list WHERE id = $id";

    // Execute the query
    $result = mysqli_query($con, $query);

    // Check if a row is found
    if (mysqli_num_rows($result) == 1) {
        // Fetch the data from the result set
        $row = mysqli_fetch_assoc($result);
        // Return the data as JSON
        echo json_encode($row);
    } else {
        // If no data is found, return an empty JSON object
        echo json_encode([]);
    }

    // Free result set
    mysqli_free_result($result);
} else {
    // If no ID is provided, return an empty JSON object
    echo json_encode([]);
}

// Close the database connection
mysqli_close($con);
?>
