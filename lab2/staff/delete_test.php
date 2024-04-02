<?php
// Establish database connection
$con = mysqli_connect("localhost", "root", "", "myhmsdb");

// Check if connection was successful
if (!$con) {
    // If connection failed, return an error message
    echo "Failed to connect to the database.";
} else {
    // Retrieve test ID from POST parameters
    $id = $_POST['id'];

    // Update database record
    $sql = "UPDATE test_list SET status = 0, delete_flag = 1 WHERE id = $id";

    if (mysqli_query($con, $sql)) {
        // If update was successful, return success message
        echo "Test deleted successfully.";
    } else {
        // If update failed, return an error message
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    // Close database connection
    mysqli_close($con);
}
?>
