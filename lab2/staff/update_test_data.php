<?php
// Assuming you have already established a database connection
require('../config.php');

if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['description']) && isset($_POST['cost'])) {
    // Sanitize the input to prevent SQL injection
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $cost = mysqli_real_escape_string($con, $_POST['cost']);

    // Query to update the data in the database
    $query = "UPDATE test_list SET name = '$name', description = '$description', cost = '$cost' WHERE id = $id";

    // Execute the query
    if (mysqli_query($con, $query)) {
        // If the query is successful, return a success message
        echo "success";
    } else {
        // If an error occurs, return an error message
        echo "error";
    }
} else {
    // If any of the required fields are missing, return an error message
    echo "error";
}

// Close the database connection
mysqli_close($con);
?>
