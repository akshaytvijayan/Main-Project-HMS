<?php
// Establish database connection
$con = mysqli_connect("localhost", "root", "", "myhmsdb");

// Check if connection was successful
if (!$con) {
    // If connection failed, display an error message
    echo "Failed to connect to the database.";
} else {
    // Retrieve form values
    $testName = $_POST['testName'];
    $testDescription = $_POST['testDescription'];
    $testPrice = $_POST['testPrice'];

    // Sanitize input to prevent SQL injection
    $testName = mysqli_real_escape_string($con, $testName);
    $testDescription = mysqli_real_escape_string($con, $testDescription);
    $testPrice = mysqli_real_escape_string($con, $testPrice);

    // Insert data into database
    $sql = "INSERT INTO test_list (name, description, cost) VALUES ('$testName', '$testDescription', '$testPrice')";
    if (mysqli_query($con, $sql)) {
        // If insertion is successful, return success message
        echo "Data inserted successfully.";
    } else {
        // If insertion failed, display an error message
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    // Close database connection
    mysqli_close($con);
}

