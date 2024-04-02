<?php
$con = mysqli_connect("localhost", "root", "", "myhmsdb");
// Assuming you have already established a database connection

if (isset($_POST['id']) && isset($_POST['reason'])) {
    $appointmentId = $_POST['id'];
    $reason = $_POST['reason'];

    // Update the appointment record in the database
    // Adjust this query according to your database schema
    $sql = "UPDATE appointments SET reply='$reason', status='rejected' WHERE id=$appointmentId";

    if (mysqli_query($con, $sql)) {
        echo "success";
    } else {
        echo "error: " . mysqli_error($con);
    }
} else {
    echo "error: Invalid request";
}
