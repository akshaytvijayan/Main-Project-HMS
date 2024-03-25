<?php
// Include database connection code here if necessary
$con = mysqli_connect("localhost", "root", "", "myhmsdb");

if (isset($_GET['spec'])) {
    $selected_spec = $_GET['spec'];
    display_docs($selected_spec);
}

function display_docs($spec)
{
    global $con;
    $query = "SELECT * FROM doctb WHERE spec='$spec' AND status='active'";
    $result = mysqli_query($con, $query);

    $options = '<option value="" disabled selected>Select Doctor</option>'; // Default option

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $username = $row['username'];
            $price = $row['docFees'];
            $availableTime = $row['avialabletime'];
            $docemail = $row['email'];
            $options .= '<option value="' . $username . '" data-value="' . $price . '" data-time="' . $availableTime . '" data-spec="' . $spec . '" data-email="' . $docemail . '">' . $username . '</option>';
        }
    } else {
        $options = '<option value="" disabled selected>No Doctor available</option>';
    }

    echo $options;
}
