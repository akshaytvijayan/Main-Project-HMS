<?php
$con = mysqli_connect("localhost", "root", "", "myhmsdb");
// Assuming you have already established a database connection
$username = urldecode($_GET['username']);
// Fetch appointments data from the database
$query = "SELECT * FROM appointments WHERE status NOT IN ('success', 'rejected')";

$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    // Initialize counter for sl no
    $sl_no = 1;

    // Loop through each row of appointments data
    while ($row = mysqli_fetch_assoc($result)) {
        // Output HTML table row for each appointment
        echo "<tr>";
        echo "<form id='uploadForm_" . $row['id'] . "' method='post' enctype='multipart/form-data'>";
        echo "<td>" . $sl_no . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['test_name'] . "</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "<td>" . $row['time'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";
        echo "<td>
                <select class=' form-control status-select' data-id='" . $row['id'] . "' onchange='updateStatus(this)'>
                    <option disabled selected>choose</option>
                    <option value='sample_collected'>Sample Collected</option>
                    <option value='on_test'>On Test</option>
                    <option value='waiting_result'>Waiting Result</option>
                </select>
            </td>";
        echo "<td class='text-center'>
                <input type='file' name='fileToUpload' id='fileToUpload_" . $row['id'] . "' style='display: none;'>
                <label class='btn btn-primary edit-appointment' for='fileToUpload_" . $row['id'] . "'>Select File</label>
                <button class='btn btn-success upload-file' onclick='uploadFile(" . $row['id'] . ")'>Upload</button>
            </td>";
        echo "<input type='hidden' name='appointmentId' value='" . $row['id'] . "'>";
        echo "<input type='hidden' name='username' id='username' value='" . $username . "'>";
        echo "</form>";

        echo "<td class='text-center'><button class='btn btn-danger' onclick='confirmDelete(" . $row['id'] . ")'>Delete</button></td>";
        echo "</tr>";

        // Increment sl no for next row
        $sl_no++;
    }
} else {
    // If no appointments found
    echo "<tr><td colspan='6'>No appointments found</td></tr>";
}
