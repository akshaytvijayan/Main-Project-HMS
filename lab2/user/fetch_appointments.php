<?php
session_start();
require('../config.php');
$con = mysqli_connect("localhost", "root", "", "myhmsdb");

// Check if the user is logged in
if (isset($_SESSION['username'])) {
    // Get the logged-in username from the session
    $username = $_SESSION['username'];

    // Fetch appointments for the logged-in user
    $sql = "SELECT * FROM appointments WHERE name = '$username' ORDER BY id DESC";
    $result = mysqli_query($con, $sql);

    // Initialize variable to store HTML
    $html = '';

    // Check if there are any appointments for the user
    if (mysqli_num_rows($result) > 0) {
        // Assuming you're generating table rows dynamically using PHP
        $sl = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $sl . "</td>";
            // echo "<td>" . $row['name'] . "</td>"; // Assuming you're already filtering by user, so no need to display name again
            echo "<td>" . $row['test_name'] . "</td>";
            echo "<td>" . $row['date'] . "</td>";
            echo "<td>" . $row['time'] . "</td>";
            // Check the status and display appropriate buttons
            if ($row['status'] === 'pending') {
                echo "<td>Pending</td>";
                echo "<td class='text-center'><button class='btn btn-primary edit-appointment' onclick='editAppointment(" . $row['id'] . ")'>Edit</button>&nbsp;&nbsp;<button class='btn btn-danger' onclick='deleteAppointment(" . $row['id'] . ")'>Delete</button></td>";
            } elseif ($row['status'] === 'success') {
                echo "<td>Confirmed</td>";
                echo "<td class='text-center'><a href='../admin/" . $row['file_path'] . "' class='btn btn-warning' download>Download</a></td>";
            } elseif ($row['status'] === 'rejected') {
                echo "<td>Rejected</td>";
                echo "<td>" . $row['reply'] . "</td>";
            } else {
                echo "<td>" . $row['status'] . "</td>";
                echo "<td>NA</td>";
            }
            echo "</tr>";
            $sl++;
        }
    } else {
        // No appointments found for the user
        $html .= "<tr><td colspan='7'>No appointments found for this user</td></tr>";
    }

    // Return HTML response
    echo $html;
} else {
    // User is not logged in, handle the case accordingly
    echo "User is not logged in";
}
