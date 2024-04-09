<?php
require('FPDF/fpdf.php'); // Include the FPDF library

// Function to generate bill content
function generate_bill_content($con, $appointment_id)
{
    $output = '';

    // Retrieve data from the database
    $query = "SELECT appointmenttb.*, prestb.*, medicines.*, patient_medical_tests.*, doctb.username,doctb.spec
              FROM appointmenttb 
              LEFT JOIN prestb ON appointmenttb.ID = prestb.ID 
              LEFT JOIN medicines ON prestb.t_id = medicines.prestb_id 
              LEFT JOIN patient_medical_tests ON prestb.t_id = patient_medical_tests.pid 
              LEFT JOIN doctb ON appointmenttb.doctor = doctb.username
              WHERE appointmenttb.ID=$appointment_id";
    $result = $con->query($query);

    // Check if there are any records
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Fetch the first row

        // Add patient details heading
        $output .= "------Patient Details------------------------------------------------------------------------------------------------------------\n";
        $output .= "Patient ID : {$row['pid']}\n";
        $output .= "Patient Name: {$row['fname']} {$row['lname']}\n";
        $output .= "Patient Contact: {$row['contact']}\n";
        $output .= "Patient gender: {$row['gender']}\n\n";

        // Add doctor details heading
        $output .= "------Doctor Details-----------------------------------------------------------------------------------------------\n";
        $output .= "Doctor Name : Dr.{$row['username']}\n";
        $output .= "Specialization: {$row['spec']}\n\n";

        // Add medicines heading
        $output .= "------Medicines----------------------------------------------------------------------------------------------------\n";
        $output .= "MEDICINE NAME | QUANTITY |MEDICINE TYPE | TIME INTAKE\n";
        $medicinesQuery = "SELECT * FROM medicines WHERE prestb_id IN (SELECT t_id FROM prestb WHERE ID = $appointment_id)";
        $medicinesResult = $con->query($medicinesQuery);
        while ($medicine = $medicinesResult->fetch_assoc()) {
            $output .= "{$medicine['med_name']} | {$medicine['M_qty']} | {$medicine['med_type']} | {$medicine['time_intake']} \n";
        }
        $output .= "\n";

        // Add medical tests heading
        $output .= "------Test Name----------------------------------------------------------------------------------------------------\n";
        $medicalTestsQuery = "SELECT * FROM patient_medical_tests WHERE pid IN (SELECT t_id FROM prestb WHERE ID = $appointment_id)";
        $medicalTestsResult = $con->query($medicalTestsQuery);
        while ($test = $medicalTestsResult->fetch_assoc()) {
            $output .= "{$test['medical_test']}\n";
        }
        $output .= " ";

        // // Add payment amount to the output
        // $output .= "------Total Amount-------------------------------------------------------------------------------------------------\n";
        // $output .= "Total amount paid: {$row['docFees']}\n\n";
    } else {
        // $output = "No records found";
    }

    return $output;
}

// Database connection
$con = mysqli_connect("localhost", "root", "", "myhmsdb");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Get appointment ID from URL parameter
$appointment_id = $_GET['ID'];

// Generate bill content
$billContent = generate_bill_content($con, $appointment_id);

// Close database connection
mysqli_close($con);

// Create PDF instance
class PDF extends FPDF
{
    // Page header
    // Page header
    function Header()
    {
        // Set font
        $this->SetFont('Arial', '', 10);

        // Gradient background
        $this->SetFillColor(52, 152, 219);
        $this->Rect(1, 0, 0, 0, 'F');

        // Logo
        $this->Image('img/logo.png', 0, 0, 30);

        // Title
        $this->SetFont('Arial', 'B', 15); // Set font to Arial, bold, size 15
        $this->SetTextColor(255, 255, 255); // Set text color to white
        $this->Cell(0, 8, 'CHELANNUR NEETHI HOSPITAL', 0, 1, 'C', true); // True parameter for background fill

        // Address
        $this->SetFont('Arial', '', 10); // Set font to Arial, normal (not bold), size 10
        $this->Cell(0, 10, 'Chelannur HO Kakkodi Mukku Calicut - 673616 Kerala', 0, 1, 'C', true); // True parameter for background fill

        // Doctor Consulting Hours
        $this->SetFont('Arial', '', 10); // Set font to Arial, normal (not bold), size 10
        $this->Cell(0, 10, 'Consulting: Mon-sat: 9am-5pm', 0, 1, 'C', true); // True parameter for background fill

        // Line break
        $this->Ln(10);




        // // Retrieve payment amount from bill content
        // $lines = explode("\n", $GLOBALS['billContent']);
        // foreach ($lines as $line) {
        //     if (strpos($line, 'Total amount paid:') !== false) {
        //         // Extract payment amount
        //         $paymentAmount = str_replace('Total amount paid: ', '', $line);
        //         // Add payment amount to header
        //         $this->Cell(0, 10, 'Total Amount Paid: ' . $paymentAmount, 0, 1, 'R');
        //         break;
        //     }
        // }

        // // Green tick logo (aligned to the right)
        // $this->Image('img/greentick.png', 165, 10, 30);
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

// Explode bill content to display in a table format
$lines = explode("\n", $billContent);
foreach ($lines as $line) {
    if (strpos($line, '|') !== false) {
        // Splitting the line into columns based on the delimiter '|'
        $columns = explode('|', $line);
        foreach ($columns as $col) {
            // Adding each column as a cell with adjusted width
            $pdf->Cell(47, 10, $col, 0, 0, 'C'); // Adjust width here (e.g., 47)
        }
        $pdf->Ln();
    } else {
        // Regular text lines
        $pdf->Cell(0, 10, $line, 0, 1);
    }
}


// Output PDF
$pdf->Output();
