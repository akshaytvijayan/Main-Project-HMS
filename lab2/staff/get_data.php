<?php
// Establish database connection
$con = mysqli_connect("localhost", "root", "", "myhmsdb");

// Check if connection was successful
if (!$con) {
    // If connection failed, display an error message
    echo "<tr><td colspan='5'>Failed to connect to the database.</td></tr>";
} else {
    // Query to fetch data from the test_list table
    $sql = "SELECT * FROM `test_list` WHERE status=1 ORDER BY id DESC";

    // Execute the query
    $result = mysqli_query($con, $sql);

    // Check if any rows are returned
    if (mysqli_num_rows($result) > 0) {
        // Loop through each row and display data in table rows
        $sl = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $sl . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td style='text-align: justify;'>" . $row['description'] . "</td>";
            echo "<td>" . $row['cost'] . "</td>";
            echo "<td class='text-center'><button class='btn btn-primary' onclick='openEditModal(" . $row['id'] . ")'>Edit</button></td>";
            echo "<td class='text-center'><button class='btn btn-danger' onclick='deleteTest(" . $row['id'] . ")'>Delete</button></td>";
            echo "</tr>";
            $sl++;
        }
    } else {
        // If no data is found
        echo "<tr><td colspan='5'>No records found</td></tr>";
    }

    // Free result set
    mysqli_free_result($result);

    // Close database connection
    mysqli_close($con);
}
