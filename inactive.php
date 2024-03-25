<?php
$con = mysqli_connect("localhost", "root", "", "myhmsdb");

if (isset($_GET['did'], $_GET['reason'])) {
    $did = $_GET['did'];
    $reason = mysqli_real_escape_string($con, $_GET['reason']); // Sanitize the input to prevent SQL injection

    $query = "SELECT `status` FROM `doctb` WHERE did = $did";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $current_status = $row['status'];

        $new_status = ($current_status == 'active') ? 'inactive' : 'active';

        // Update the status and inactiveReason
        $update_query = "UPDATE `doctb` SET `status` = '$new_status', inactiveReason='$reason' WHERE did = $did";
        $update_result = mysqli_query($con, $update_query);

        if ($update_result) {
            echo '<script type="text/javascript">';
            echo 'window.location.href= "deletedoctor.php";';
            echo '</script>';
        } else {
            echo "Error updating status.";
        }
    } else {
        echo "Doctor not found.";
    }
} else {
    echo "Doctor ID and/or Reason not provided!";
}
