
<?php
// Connect to your database

$con = mysqli_connect("localhost", "root", "", "myhmsdb");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Get the selected date from the AJAX request
$date = isset($_POST['date']) ? $_POST['date'] : date('Y-m-d');

// Fetch appointments for the selected date
$query = "SELECT * FROM offline_appointments WHERE date = '$date'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    // Display appointments
    echo "<h2>Appointments for $date</h2>";
    echo "<ul>";
    // Your PHP code to fetch appointments from the database

    // Assuming $result holds the query result
    ?>

    <ul>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <li>
                <?php echo "{$row['time']} - {$row['patname']}"; ?>
                <a href="download_pdf.php?appointment_id=<?php echo $row['offid']; ?>"
                    class="btn btn-primary">Download</a>
            </li>
        <?php endwhile; ?>

    </ul>

    <!-- Download button -->
    <a href="generate_pdf.php" class="btn btn-primary">Download PDF</a>
    <?php

} else {
    echo "No appointments scheduled for $date";
}

// Close database connection
mysqli_close($con);
?>