<?php
$con = mysqli_connect("localhost", "root", "", "myhmsdb");
// Check if the appointment ID is provided via POST request
if(isset($_POST['id'])) {


    // Create connection

    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // Prepare a SQL statement to delete the appointment
    $id = $_POST['id'];
    $sql = "DELETE FROM appointments WHERE id = $id";

    // Execute the SQL statement
    if ($con->query($sql) === TRUE) {
        // If deletion is successful, send a success response
        $response = array('status' => 'success');
        echo json_encode($response);
    } else {
        // If deletion fails, send an error response
        $response = array('status' => 'error', 'message' => 'Error deleting appointment: ' . $con->error);
        echo json_encode($response);
    }

    // Close the database connection
    $conn->close();
} else {
    // If appointment ID is not provided, send an error response
    $response = array('status' => 'error', 'message' => 'Appointment ID is not provided');
    echo json_encode($response);
}
