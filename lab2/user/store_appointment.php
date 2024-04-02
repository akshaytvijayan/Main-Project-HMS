<?php

$con = mysqli_connect("localhost", "root", "", "myhmsdb");

// Check connection
if (mysqli_connect_errno()) {
    $response = array(
        'status' => 'error',
        'message' => 'Failed to connect to MySQL: ' . mysqli_connect_error()
    );
    echo json_encode($response);
    exit;
}

$name = mysqli_real_escape_string($con, $_POST['name']);
$email = mysqli_real_escape_string($con, $_POST['email']);
// $username = mysqli_real_escape_string($con, $_POST['username']);
$test_name = mysqli_real_escape_string($con, $_POST['test_name']);
$date = mysqli_real_escape_string($con, $_POST['date']);
$time = mysqli_real_escape_string($con, $_POST['time']);
$description = mysqli_real_escape_string($con, $_POST['description']);
$cost = mysqli_real_escape_string($con, $_POST['cost']);
$reason = mysqli_real_escape_string($con, $_POST['reason']);

// Check if there's a pending appointment for the current user
$sql = "SELECT * FROM appointments WHERE name='$name' AND status='pending'";
$result = mysqli_query($con, $sql);

if (!$result) {
    // Error occurred while executing the query
    $response = array(
        'status' => 'error',
        'message' => mysqli_error($con)
    );
    echo json_encode($response);
    exit;
}

if (mysqli_num_rows($result) > 0) {
    // There's a pending appointment, retrieve the date
    $row = mysqli_fetch_assoc($result);
    $pendingDate = $row['date'];

    // Alert the user to update or delete the pending request
    $response = array(
        'status' => 'pending',
        'date' => $pendingDate
    );
    echo json_encode($response);
} else {
    // No pending appointment, insert the new values into the database
    $sql = "INSERT INTO appointments (name, email, test_name, date, time, description, cost, reason, status) VALUES ('$name', '$email', '$test_name', '$date', '$time', '$description', '$cost', '$reason', 'pending')";

    if (mysqli_query($con, $sql)) {
        // Appointment successfully inserted
        $response = array(
            'status' => 'success'
        );
        echo json_encode($response);
    } else {
        // Error occurred while inserting appointment
        $response = array(
            'status' => 'error',
            'message' => mysqli_error($con)
        );
        echo json_encode($response);
    }
}

mysqli_close($con);
