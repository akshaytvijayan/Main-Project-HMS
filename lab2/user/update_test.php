<?php
$con = mysqli_connect("localhost", "root", "", "myhmsdb");

// Check if the test_id parameter is set and not empty
if (isset($_POST['test_id']) && !empty($_POST['test_id'])) {
    // Sanitize the input to prevent SQL injection
    $testId = mysqli_real_escape_string($con, $_POST['test_id']);

    // Perform the database update query
    $query = "UPDATE `patient_medical_tests` SET `paid`='1' WHERE test_id='$testId'";
    $result = mysqli_query($con, $query);

    if ($result) {
        // Update successful
        $response = array('status' => 'success', 'message' => 'Database updated successfully');
        // Encode response as JSON and output
        echo json_encode($response);
    } else {
        // Update failed
        $response = array('status' => 'error', 'message' => 'Failed to update database');
    }
} else {
    // If test_id parameter is not provided or empty
    $response = array('status' => 'error', 'message' => 'Invalid test ID');
}

// Encode response as JSON and output
echo json_encode($response);
?>

