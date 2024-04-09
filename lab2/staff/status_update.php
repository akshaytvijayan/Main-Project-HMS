<?php
$con = mysqli_connect("localhost", "root", "", "myhmsdb");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $appointmentId = $_POST['appointmentId'];
    $status = $_POST['status'];

    $sql = "UPDATE appointments SET status='$status'WHERE id=$appointmentId";

    if ($con->query($sql) === TRUE) {
        $response = array('status' => 'success');
        echo json_encode($response);
    } else {
        $response = array('status' => 'error', 'message' => 'Error updating appointment status: ' . $con->error);
        echo json_encode($response);
    }
}

// $con->close();
