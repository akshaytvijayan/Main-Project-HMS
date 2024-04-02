<?php
$con = mysqli_connect("localhost", "root", "", "myhmsdb");
// Assuming you have already established a database connection

// Fetch appointments data from the database
$query = "SELECT * FROM appointments where status='pending'";
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
        echo "<td class='text-center'>
                <input type='file' name='fileToUpload' id='fileToUpload_" . $row['id'] . "' style='display: none;'>
                <label class='btn btn-primary edit-appointment' for='fileToUpload_" . $row['id'] . "'>Select File</label>
                <button class='btn btn-success upload-file' onclick='uploadFile(" . $row['id'] . ")'>Upload</button>
            </td>";
        echo "<input type='hidden' name='appointmentId' value='" . $row['id'] . "'>";
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

