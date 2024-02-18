<?php
require_once("../TCPDF/tcpdf.php");

class PDF extends TCPDF
{
    // Page header
    function Header()
    {
        // Set font
        $this->SetFont('dejavusans', 'B', 15);
        
        // Title
        $this->Cell(0, 10, 'Appointment Details', 0, 1, 'C');
        
        // Line break
        $this->Ln(10);
    }

    // Page content
    function Body($appointment_id, $con)
    {
        // Retrieve appointment details along with doctor details
        $query = "SELECT oa.*, d.* FROM offline_appointments oa
                  INNER JOIN doctb d ON oa.username = d.username
                  WHERE oa.offid = '$appointment_id'";
        $result = mysqli_query($con, $query);

        // Check if appointment exists
        if (mysqli_num_rows($result) > 0) {
            $appointment = mysqli_fetch_assoc($result);

            // Output appointment details
            $this->Cell(0, 10, 'Appointment Id: ' . $appointment['AppoID'], 0, 1);
            $this->Cell(0, 10, 'Doctor Name: ' . $appointment['username'], 0, 1);
            $this->Cell(0, 10, 'Doctor Specialization: ' . $appointment['spec'], 0, 1);
            $this->Cell(0, 10, ' Age: ' . $appointment['age'], 0, 1);
            $this->Cell(0, 10, 'experience: ' . $appointment['experience'], 0, 1);
            $this->Cell(0, 10, 'docFees: ' . $appointment['docFees'], 0, 1);
            $this->Cell(0, 10, 'Patient Name: ' . $appointment['patname'], 0, 1);
            $this->Cell(0, 10, 'Patient Age: ' . $appointment['patage'], 0, 1);
            $this->Cell(0, 10, 'Patient Work: ' . $appointment['patwork'], 0, 1);
            $this->Cell(0, 10, 'Contact Number: ' . $appointment['contact'], 0, 1);
            $this->Cell(0, 10, 'Date: ' . $appointment['date'], 0, 1);
            $this->Cell(0, 10, 'Time: ' . $appointment['time'], 0, 1);
        } else {
            $this->Cell(0, 10, 'No appointment found.', 0, 1);
        }
    }
}

// Establish database connection
$con = mysqli_connect("localhost", "root", "", "myhmsdb");

// Get the appointment ID from the URL query parameter
$appointment_id = isset($_GET['appointment_id']) ? $_GET['appointment_id'] : '';

// Generate PDF
$pdf = new PDF();
$pdf->AddPage();
$pdf->Body($appointment_id, $con);
$pdf->Output();
?>
