<?php
$con = mysqli_connect("localhost", "root", "", "myhmsdb");

// Assuming $con is your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id = $_POST['id'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    // Update the appointment in the database
    $sql = "UPDATE appointments SET date = '$date', time = '$time' WHERE id = $id";

    if (mysqli_query($con, $sql)) {
        // Appointment successfully updated
        $response = array(
            'status' => 'success'
        );
        echo json_encode($response);
    } else {
        // Error occurred while updating appointment
        $response = array(
            'status' => 'error',
            'message' => 'Error updating appointment: ' . mysqli_error($con)
        );
        echo json_encode($response);
    }
} else {
    // If the request method is not POST, return an error response
    $response = array(
        'status' => 'error',
        'message' => 'Invalid request method'
    );
    echo json_encode($response);
}

