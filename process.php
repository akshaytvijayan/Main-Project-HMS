<?php
// Assuming you have a database connection established already
global $con;
$con = mysqli_connect("localhost", "root", "", "myhmsdb");
// Assuming you have a database connection established already

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['selectedMedicines'])) {
    $selectedMedicines = $_POST['selectedMedicines'];

    // Generate loop content based on the count of selected medicines
    $loopContent = '';
    $sl = 0;
    foreach ($selectedMedicines as $medicine) {
        $sl++;
        // Assuming you have a function to fetch medicine details from the database
        $medicineDetails = getMedicineDetails($medicine);

        if ($medicineDetails) {
            $loopContent .= '<b style="color:blue;">Medicine Number: ' . $sl . '</b>';
            $loopContent .= '<div class="row my-5">';
            $loopContent .= '<div class="col-3">';
            $loopContent .= '<label for="qty' . $sl . '"><b>Quantity</b></label>';
            $loopContent .= '<input class="form-control" type="text" name="M_qty' . $sl . '" id="M_qty' . $sl . '">';
            $loopContent .= '</div>';
            // $loopContent .= '<div class="col-3">';
            // $loopContent .= '<label for="qty'. $sl .'"><b>Type</b></label>';
            // $loopContent .= '<select class="form-control" name="M_type'. $sl .'" id="M_type'. $sl .'">';
            // $loopContent .= '<option value="tablets">Tablets</option>';
            // $loopContent .= '<option value="ml">ML</option>';
            // $loopContent .= '<option value="gram">Gram</option>';
            // $loopContent .= '</select>';
            // $loopContent .= '</div>';
            $loopContent .= '<div class="col-3">';
            $loopContent .= '<label for="medname' . $sl . '">Medicine Name</label>';
            $loopContent .= '<input type="text" id="med_name' . $sl . '" name="med_name' . $sl . '" class="form-control" readonly value="' . $medicineDetails['name'] . '">';
            $loopContent .= '</div>';
            $loopContent .= '<div class="col-3">';
            $loopContent .= '<label for="typemed' . $sl . '">Type</label>';
            $loopContent .= '<input type="text" class="form-control" id="med_type' . $sl . '" name="med_type' . $sl . '" readonly value="' . $medicineDetails['type'] . '">';
            $loopContent .= '</div>';
            $loopContent .= '</div>';

            $loopContent .= '<div class="row">';
            $loopContent .= '<div class="col-12">';
            $loopContent .= '<div class="row">';
            $loopContent .= '<div class="col-3"><label for="intake' . $sl . '">Time for Intake:</label></div>';
            $loopContent .= '<div class="col-3">';
            $loopContent .= '<input class="form-check" type="checkbox" id="morning' . $sl . '" name="morning' . $sl . '" value="Morning">';
            $loopContent .= '<label for="morning' . $sl . '">Morning</label>';
            $loopContent .= '</div>';
            $loopContent .= '<div class="col-3">';
            $loopContent .= '<input class="form-check" type="checkbox" id="afternoon' . $sl . '" name="afternoon' . $sl . '" value="Afternoon">';
            $loopContent .= '<label for="afternoon' . $sl . '">Afternoon</label>';
            $loopContent .= '</div>';
            $loopContent .= '<div class="col-3">';
            $loopContent .= '<input class="form-check" type="checkbox" id="evening' . $sl . '" name="evening' . $sl . '" value="Evening">';
            $loopContent .= '<label for="evening' . $sl . '">Evening</label>';
            $loopContent .= '</div>';
            $loopContent .= '</div>';
            $loopContent .= '</div>';
            $loopContent .= '</div>';

            // Add textarea for suggestions
            $loopContent .= '<div class="row my-3">';
            $loopContent .= '<div class="col-12">';
            $loopContent .= '<label for="suggestion' . $sl . '">Suggestions</label>';
            $loopContent .= '<textarea class="form-control" style="resize:none;" id="suggestion' . $sl . '" name="suggestion' . $sl . '" rows="3"></textarea>';
            $loopContent .= '</div>';
            $loopContent .= '</div>';

            $loopContent .= '<hr>';
        }
    }
    $loopContent .= '<input type="hidden" id="M_count" name="M_count" value="' . $sl . '" />';


    echo $loopContent;
}

// Function to fetch medicine details from the database
function getMedicineDetails($medicineName)
{
    // Assuming you have a database connection $con
    $con = mysqli_connect("localhost", "root", "", "myhmsdb");

    $query = "SELECT * FROM drugs WHERE name = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $medicineName);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    return $row;
}
