<?php
$con = mysqli_connect("localhost", "root", "", "myhmsdb");

// Establish database connection

// Retrieve form data
$patientName = $_POST['patientName'];
$email = $_POST['email'];
$medicalTest = $_POST['medicalTest'];
$description = $_POST['description'];
$doctor = $_POST['doctor'];
$userdate = $_POST['userdate'];
$cost = $_POST['cost'];
$time = $_POST['time'];

// Check if the appointment already exists
$query = "SELECT * FROM appointments WHERE 
          name = '$patientName' AND 
          email = '$email' AND 
          test_name = '$medicalTest' AND 
          date = '$userdate' AND 
          description = '$description' AND 
          cost = '$cost'";

$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    // Appointment already exists
    echo "Appointment already booked. Please check the booking page.";
} else {
    // Insert the appointment into the database
    $insertQuery = "INSERT INTO appointments (name, email, test_name, date, time, description, cost) 
                    VALUES ('$patientName', '$email', '$medicalTest', '$userdate', '$time', '$description', '$cost')";

    if (mysqli_query($con, $insertQuery)) {
        echo "Appointment booked successfully!";
        exit();
    } else {
        echo "Error: " . $insertQuery . "<br>" . mysqli_error($con);
    }
}
// $con->close();

