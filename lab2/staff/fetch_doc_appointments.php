<?php
$con = mysqli_connect("localhost", "root", "", "myhmsdb");

if (isset($_GET['username'])) {

    $username = urldecode($_GET['username']);

    $query = "SELECT pmt.*, pt.fname, pt.lname, pt.userdate, pt.doctor, pr.email, dt.username AS doctor_name
              FROM patient_medical_tests AS pmt 
              LEFT JOIN prestb AS pt ON pmt.pid = pt.t_id 
              LEFT JOIN patreg AS pr ON pt.fname = pr.fname
              LEFT JOIN doctb AS dt ON pt.doctor = dt.email
              WHERE pmt.status = '0'
              ORDER BY pmt.test_id";

    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $sl_no = 1;

        while ($row = mysqli_fetch_assoc($result)) {

            $patient_query = "SELECT * FROM prestb WHERE t_id = '" . $row['pid'] . "'";
            $patient_result = mysqli_query($con, $patient_query);
            $patient_row = mysqli_fetch_assoc($patient_result);
            $patient_name = $patient_row['fname'] . " " . $patient_row['lname'];
            if ($row['medical_test'] != 'No Test') { ?>

                <tr>
                    <form id='uploadForm_<?php echo $row['id']; ?>' method='post' action='book.php' enctype='multipart/form-data'>
                        <td><?php echo $sl_no; ?></td>
                        <td><?php echo $patient_name; ?></td>
                        <!-- <td><?php echo $row['test_id']; ?></td> -->

                        <input type='hidden' name='patient_name' value='<?php echo htmlspecialchars($patient_name); ?>'>
                        <input type='hidden' name='email' value='<?php echo htmlspecialchars($row['email']); ?>'>
                        <input type='hidden' name='medical_test' value='<?php echo htmlspecialchars($row['medical_test']); ?>'>
                        <input type='hidden' name='doctor' value='<?php echo htmlspecialchars($row['doctor']); ?>'>
                        <input type='hidden' name='userdate' value='<?php echo htmlspecialchars($patient_row['userdate']); ?>'>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['medical_test']; ?></td>
                        <!-- <td><?php echo $row['test_id']; ?></td> -->
                        <td><b><?php echo $row['price']; ?></b> /rs</td>
                        <td><?php echo $row['doctor']; ?></td>
                        <td><?php echo $patient_row['userdate']; ?></td>
                        <?php
                        if ($row['paid'] != '0') {
                        ?>
                            <td>
                                <button class="btn btn-primary view-appointment" onclick="opens(
                                            '<?php echo htmlspecialchars($patient_name); ?>',
                                            '<?php echo htmlspecialchars($row['email']); ?>',
                                            '<?php echo htmlspecialchars($row['test_id']); ?>',
                                            '<?php echo htmlspecialchars($row['medical_test']); ?>',
                                            '<?php echo htmlspecialchars($row['price']); ?>',
                                            '<?php echo htmlspecialchars($row['doctor']); ?>',
                                            '<?php echo htmlspecialchars($patient_row['userdate']); ?>'
                                        )">Book now</button>
                            </td>

                        <?php
                        } else { ?>
                            <td class='text-center'>NOT PAID</td>
                        <?php } ?>
                    </form>
                </tr>
        <?php
                $sl_no++;
            }
        } ?>
<?php
    } else {
        echo "<tr><td colspan='5'>No appointments found</td></tr>";
    }
} else {
    echo "<tr><td colspan='5'>Username parameter is missing</td></tr>";
}
?>