<?php
$con = mysqli_connect("localhost", "root", "", "myhmsdb");

if (isset($_GET['sid'], $_GET['reason'])) {
    $staff_id = $_GET['sid'];
    $reason = mysqli_real_escape_string($con, $_GET['reason']); // Sanitize the input to prevent SQL injection

    $query = "SELECT `status` FROM `staffdb` WHERE staff_id = $staff_id";

    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $current_status = $row['status'];

        // Toggle the status
        $new_status = ($current_status == 'active') ? 'inactive' : 'active';

        // Update the status and inactiveReason
        $update_query = "UPDATE `staffdb` SET `status` = '$new_status', inactiveReasonS='$reason' WHERE staff_id = $staff_id";
        $update_result = mysqli_query($con, $update_query);

        if ($update_result) {
            // Redirect to deletestaff.php
            header("Location: deletestaff.php");
            exit(); // Stop script execution after redirection
        } else {
            echo "Error updating status.";
        }
    } else {
        echo "Staff not found.";
    }
} else {
    echo "Staff ID and/or Reason not provided!";
}
