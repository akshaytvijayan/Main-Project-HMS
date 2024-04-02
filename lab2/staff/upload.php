<?php
$con = mysqli_connect("localhost", "root", "", "myhmsdb");

// Handle file upload
if (isset($_FILES['fileToUpload']) && isset($_POST['appointmentId'])) {
    $uploadDir = '../admin/uploads/';
    $uploadFile = $uploadDir . basename($_FILES['fileToUpload']['name']);

    // Move uploaded file to uploads folder
    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadFile)) {
        // Update appointment record in the database
        $appointmentId = $_POST['appointmentId'];
        $filePath = $uploadFile;



        // Check connection
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }

        // Prepare SQL statement to update appointment record
        $sql = "UPDATE appointments SET file_path='$filePath', status='success' WHERE id=$appointmentId";

        // Execute SQL statement
        if ($con->query($sql) === TRUE) {
            $response = array('status' => 'success', 'filePath' => $filePath);
            echo json_encode($response);
        } else {
            $response = array('status' => 'error', 'message' => 'Error updating appointment record: ' . $con->error);
            echo json_encode($response);
        }

        // Close the database connection
        $con->close();
    } else {
        $response = array('status' => 'error', 'message' => 'Error uploading file');
        echo json_encode($response);
    }
} else {
    $response = array('status' => 'error', 'message' => 'No file uploaded or appointment ID provided');
    echo json_encode($response);
}
