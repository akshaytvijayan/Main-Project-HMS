<?php
$con = mysqli_connect("localhost", "root", "", "myhmsdb");

// // Check if the 'username' parameter is set in the URL
// if (isset($_GET['username'])) {
//     // Get the username from the URL parameter
//     $username = urldecode($_GET['username']);

//     // Fetch appointments data from the database
//     $query = "SELECT pmt.*, pt.fname, pt.lname, pt.userdate, pt.doctor, pr.email, dt.username AS doctor_name
//           FROM patient_medical_tests AS pmt 
//           LEFT JOIN prestb AS pt ON pmt.pid = pt.t_id 
//           LEFT JOIN patreg AS pr ON pt.fname = pr.fname
//           LEFT JOIN doctb AS dt ON pt.doctor = dt.email
//           ORDER BY pmt.test_id DESC";



//     $result = mysqli_query($con, $query);

//     if (mysqli_num_rows($result) > 0) {
//         // Initialize counter for sl no
//         $sl_no = 1;

//         // Loop through each row of appointments data
//         while ($row = mysqli_fetch_assoc($result)) {
//             // Fetch additional patient information from 'prestb' table based on 'pid'
//             $patient_query = "SELECT * FROM prestb WHERE t_id = '" . $row['pid'] . "'";
//             $patient_result = mysqli_query($con, $patient_query);
//             $patient_row = mysqli_fetch_assoc($patient_result);
//             $patient_name = $patient_row['fname'] . " " . $patient_row['lname'];

//             // Output HTML table row for each appointment
//             echo "<tr>";
//             echo "<form id='uploadForm_" . $row['id'] . "' method='post' action='book.php' enctype='multipart/form-data'>";
//             echo "<td>" . $sl_no . "</td>";
//             echo "<td>" . $patient_name . "</td>";

//             // Hidden input fields to pass data to book.php
//             echo "<input type='hidden' name='patient_name' value='" . htmlspecialchars($patient_name) . "'>";
//             echo "<input type='hidden' name='email' value='" . htmlspecialchars($row['email']) . "'>";
//             echo "<input type='hidden' name='medical_test' value='" . htmlspecialchars($row['medical_test']) . "'>";
//             echo "<input type='hidden' name='doctor' value='" . htmlspecialchars($row['doctor']) . "'>";
//             echo "<input type='hidden' name='userdate' value='" . htmlspecialchars($patient_row['userdate']) . "'>";

//             echo "<td>" . $row['email'] . "</td>";
//             echo "<td>" . $row['medical_test'] . "</td>";
//             echo "<td>" . $row['doctor'] . "</td>";
//             echo "<td>" . $patient_row['userdate'] . "</td>";
//             if ($row['medical_test'] != 'No Test') {
//                 echo "<td class='text-center'><button class='btn btn-primary edit-appointment' type='submit' onclick='alert(\"hi\")'>Book Now</button></td>";
//             } else {
//                 echo "<td class='text-center'></td>";
//             }
//             echo "</form>";
//             echo "</tr>";


//             // Increment sl no for next row
//             $sl_no++;
//         }
//     } else {
//         // If no appointments found
//         echo "<tr><td colspan='5'>No appointments found</td></tr>";
//     }
// } else {
//     // If 'username' parameter is not set in the URL
//     echo "<tr><td colspan='5'>Username parameter is missing</td></tr>";
// }

// Check if the 'username' parameter is set in the URL
if (isset($_GET['username'])) {

    $username = urldecode($_GET['username']);

    $query = "SELECT pmt.*, pt.fname, pt.lname, pt.userdate, pt.doctor, pr.email, dt.username AS doctor_name
              FROM patient_medical_tests AS pmt 
              LEFT JOIN prestb AS pt ON pmt.pid = pt.t_id 
              LEFT JOIN patreg AS pr ON pt.fname = pr.fname
              LEFT JOIN doctb AS dt ON pt.doctor = dt.email
              ORDER BY pmt.test_id DESC";

    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $sl_no = 1;

        while ($row = mysqli_fetch_assoc($result)) {

            $patient_query = "SELECT * FROM prestb WHERE t_id = '" . $row['pid'] . "'";
            $patient_result = mysqli_query($con, $patient_query);
            $patient_row = mysqli_fetch_assoc($patient_result);
            $patient_name = $patient_row['fname'] . " " . $patient_row['lname'];
            ?>
            <tr>
                <form id='uploadForm_<?php echo $row['id']; ?>' method='post' action='book.php' enctype='multipart/form-data'>
                    <td><?php echo $sl_no; ?></td>
                    <td><?php echo $patient_name; ?></td>

                        <input type='hidden' name='patient_name' value='<?php echo htmlspecialchars($patient_name); ?>'>
                        <input type='hidden' name='email' value='<?php echo htmlspecialchars($row['email']); ?>'>
                        <input type='hidden' name='medical_test' value='<?php echo htmlspecialchars($row['medical_test']); ?>'>
                        <input type='hidden' name='doctor' value='<?php echo htmlspecialchars($row['doctor']); ?>'>
                        <input type='hidden' name='userdate' value='<?php echo htmlspecialchars($patient_row['userdate']); ?>'>
                    <!-- <td><input type='text' name='idd' id='idd' value='myModal_<?php echo $sl_no . "_" . $row['pid']; ?>'></td> -->
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['medical_test']; ?></td>
                    <td><?php echo $row['doctor']; ?></td>
                    <td><?php echo $patient_row['userdate']; ?></td>
                    <?php if ($row['medical_test'] != 'No Test') { ?>
                        <!-- <td><button type="submit" class="btn btn-primary edit-appointment" onclick="openModal(<?php echo $row['pid']; ?>)">Book Now</button></td> -->
                        <!-- <td><button type="submit" class="btn btn-primary edit-appointment" onclick="opens(<?php echo $sl_no . ', ' . $row['pid']; ?>);">Book Now</button></td> -->
                        <td>
                            <button class="btn btn-primary view-appointment" 
                                    onclick="opens(
                                        '<?php echo htmlspecialchars($patient_name); ?>',
                                        '<?php echo htmlspecialchars($row['email']); ?>',
                                        '<?php echo htmlspecialchars($row['medical_test']); ?>',
                                        '<?php echo htmlspecialchars($row['doctor']); ?>',
                                        '<?php echo htmlspecialchars($patient_row['userdate']); ?>'
                                    )">Book now</button>
                        </td>

                    <?php } else { ?>
                        <td class='text-center'></td>
                    <?php } ?>
                </form>
            </tr>
            <div class="modal fade" id="myModal_<?php echo $sl_no . "_" . $row['pid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModal_<?php echo $sl_no . "_" . $row['pid']; ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Test</h5>
                        </div>
                        <div class="modal-body">
                            <form id="editForm">
                                <div class="form-group">
                                    <label for="editName">Name:</label>
                                    <input type="text" class="form-control" id="editName" name="editName">
                                </div>
                                <div class="form-group">
                                    <label for="editDescription">Description:</label>
                                    <textarea class="form-control" id="editDescription" cols="20" rows="8" style="resize:none;" name="editDescription"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="editCost">Price:</label>
                                    <input type="text" class="form-control" id="editCost" name="editCost">
                                </div>
                                <input type="hidden" id="editTestId" name="editTestId">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" onclick="saveChanges()">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $sl_no++;
        }?>
            <!-- <button class="btn btn-primary" onclick="opens()">View All Appointments</button> -->
        <?php
    } else {
        echo "<tr><td colspan='5'>No appointments found</td></tr>";
    }
} else {
    echo "<tr><td colspan='5'>Username parameter is missing</td></tr>";
}
?>


