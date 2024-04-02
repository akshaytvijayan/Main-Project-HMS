<?php
$con = mysqli_connect("localhost", "root", "", "myhmsdb");
// Your PHP code to establish database connection

// Retrieve selected test name from POST request
$selectedTest = $_POST['test_name'];

// Your SQL query to fetch description and cost based on the selected test name
$sql = "SELECT description, cost FROM test_list WHERE name='$selectedTest'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

// Prepare response data as JSON
$response = array(
  'description' => $row['description'],
  'cost' => $row['cost']
);

// Send response as JSON
echo json_encode($response);
?>
