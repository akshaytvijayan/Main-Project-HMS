<?php
// Establish database connection
$con = mysqli_connect("localhost", "root", "", "myhmsdb");

// Check if connection was successful
if (!$con) {
    // If connection failed, display an error message
    echo "<tr><td colspan='17'>Failed to connect to the database.</td></tr>";
} else {
    // Query to fetch data from the staffdb table
    $sql = "SELECT * FROM staffdb ORDER BY staff_id DESC";

    // Execute the query
    $result = mysqli_query($con, $sql);

    // Check if any rows are returned
    if (mysqli_num_rows($result) > 0) {
        // Loop through each row and display data in table rows
        $sl = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $sl . "</td>";
            echo "<td>" . $row['fname'] . " " . $row['lname'] . "</td>";
            echo "<td>" . $row['age'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['location'] . "</td>";
            // echo "<td>" . $row['state'] . "</td>";
            echo "<td>" . $row['district'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "<td>" . $row['qualification'] . "</td>";
            echo "<td>" . $row['experience'] . "</td>";
            echo "<td>" . $row['sregdate'] . "</td>";
            // echo "<td>" . $row['status'] . "</td>";
            // echo "<td>" . $row['inactiveReasonS'] . "</td>";
            // echo "<td>" . $row['SresignDate'] . "</td>";
            echo "<td class='text-center'><button class='btn btn-primary' onclick='editStaff(" . $row['staff_id'] . ")'>Edit</button></td>";
            echo "<td class='text-center'><button class='btn btn-danger' onclick='deleteStaff(" . $row['staff_id'] . ")'>Delete</button></td>";
            echo "</tr>";
            $sl++;
        }
    } else {
        // If no data is found
        echo "<tr><td colspan='17'>No staff records found</td></tr>";
    }

    // Free result set
    mysqli_free_result($result);

    // Close database connection
    mysqli_close($con);
}
