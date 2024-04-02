<?php
require('../config.php');
$con = mysqli_connect("localhost", "root", "", "myhmsdb");

// Check if date and time parameters are provided
if (isset($_POST['date']) && isset($_POST['time'])) {
    // Get date and time from POST data
    $date = $_POST['date'];
    $time = $_POST['time'];

    // Construct datetime string
    $datetime = $date . ' ' . $time;

    // Count the number of appointments for the specified hour
    $query = "SELECT COUNT(*) AS num_appointments FROM appointments WHERE date_time = '$datetime'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $num_appointments = $row['num_appointments'];

    // Return the count of booked appointments for that hour
    echo $num_appointments;
} else {
    // Date or time parameter is missing
    echo "Error: Date or time parameter is missing";
}
