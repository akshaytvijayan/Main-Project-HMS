<?php
include('func1.php');
$con = mysqli_connect("localhost", "root", "", "myhmsdb");
$doctor = $_SESSION['demail'];
$doc_query = mysqli_query($con, "SELECT username FROM `doctb` WHERE email='$doctor'");
$doc_row = mysqli_fetch_array($doc_query);
$doc_row_name = $doc_row['username'];

?>

<html lang="en">

<head>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <style>
        .btn-outline-light:hover {
            color: #25bef7;
            background-color: #f8f9fa;
            border-color: #f8f9fa;
        }

        .bg-primary {
            background: -webkit-linear-gradient(left, #3931af, #00c6ff);
        }

        .list-group-item.active {
            z-index: 2;
            color: #fff;
            background-color: #342ac1;
            border-color: #007bff;
        }

        .text-primary {
            color: #342ac1 !important;
        }

        button:hover {
            cursor: pointer;
        }

        #inputbtn:hover {
            cursor: pointer;
        }

        .curve-btn {
            border-radius: 30px;
            /* Adjust the border-radius to control the curve */
            padding: 10px 20px;
            /* Adjust padding as needed */
            font-size: 16px;
            /* Adjust font size as needed */
        }
    </style>

</head>


<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> NEETHI Hospital </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="logout1.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" method="post" action="search.php">
                <input class="form-control mr-sm-2" type="text" placeholder="Enter contact number" aria-label="Search" name="contact">
                <input type="submit" class="btn btn-outline-light" id="inputbtn" name="search_submit" value="Search">
            </form>
        </div>
    </nav>

    <div class="container-fluid" style="margin-top:100px;">
        <div class="text-center">
            <h3 style="font-family:'IBM Plex Sans', sans-serif;"> Welcome &nbsp DR.
                <?php echo $_SESSION['demail'] ?>
            </h3>
        </div>
        <div class="row">
            <div class="col-md-4" style="max-width:18%;margin-top: 3%;">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action " href="doctor-panel.php">Dashboard</a>
                    <a class="list-group-item list-group-item-action" id="list-update-list" data-toggle="list" href="doctor-panel.php">Update Profile</a>
                    <a class="list-group-item list-group-item-action" href="changepassdoc.php">Change Password</a>
                    <a class="list-group-item list-group-item-action" href="doctor-panel.php" id="list-app-list" role="tab" data-toggle="list" aria-controls="home">Online Appointments</a>
                    <a class="list-group-item list-group-item-action " href="offline.php">Offline Appointments</a>
                    <a class="list-group-item list-group-item-action active " href="viewpre.php"> Prescription List</a>

                </div>
            </div>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Appointment Details</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        line-height: 1.6;
                    }

                    .container {
                        max-width: 800px;
                        margin: 0 auto;
                        padding: 20px;
                    }

                    h2 {
                        margin-top: 0;
                    }

                    table {
                        width: 100%;
                        border-collapse: collapse;
                        margin-bottom: 20px;
                    }

                    th,
                    td {
                        padding: 8px;
                        text-align: left;
                        border-bottom: 1px solid #ddd;
                    }

                    th {
                        background-color: #f2f2f2;
                    }

                    .medicines,
                    .medical-tests {
                        margin-bottom: 20px;
                    }

                    .custom-font {
                        font-family: "Times New Roman", serif;
                        /* Change font to Times New Roman */
                    }
                </style>
            </head>

            <body>
                <div class="container">
                    <h2 class="custom-font">
                        <center>Appointment Details</center>
                    </h2>
                    <?php
                    // Assuming $con is your database connection

                    if (isset($_GET['id'])) {
                        // Retrieve the ID value from the URL parameter
                        $appointment_id = $_GET['id'];
                        $query = "SELECT DISTINCT appointmenttb.*, prestb.*, medicines.*, patient_medical_tests.* FROM appointmenttb LEFT JOIN prestb ON appointmenttb.ID = prestb.ID LEFT JOIN medicines ON prestb.t_id = medicines.prestb_id LEFT JOIN patient_medical_tests ON prestb.t_id = patient_medical_tests.pid WHERE appointmenttb.ID=$appointment_id; ";
                        $result = $con->query($query);
                        $medicinesQuery = "SELECT * FROM medicines WHERE prestb_id IN (SELECT t_id FROM prestb WHERE ID = $appointment_id)";
                        $medicinesResult = $con->query($medicinesQuery);
                        $medicines = ($medicinesResult) ? $medicinesResult->fetch_all(MYSQLI_ASSOC) : [];
                        $medicalTestsQuery = "SELECT * FROM patient_medical_tests WHERE pid IN (SELECT t_id FROM prestb WHERE ID = $appointment_id)";
                        $medicalTestsResult = $con->query($medicalTestsQuery);
                        $medical_tests = ($medicalTestsResult) ? $medicalTestsResult->fetch_all(MYSQLI_ASSOC) : [];

                        // Initialize flag variables
                        $patientDetailsPrinted = false;
                        $doctorDetailsPrinted = false;
                        $medicinesPrinted = false;
                        $medicalTestsPrinted = false;

                        // Loop through each row
                        foreach ($result as $row) {
                            // Print patient details only if not already printed
                            if (!$patientDetailsPrinted) {
                                echo "<h3 class= custom-font>Patient Details</h3>";
                                // Print patient details
                                echo "<table>";
                                // echo "<tr><th>Field</th><th>Value</th></tr>";
                                echo "<tr><td>Patient ID</td><td>{$row['pid']}</td></tr>";
                                echo "<tr><td>Patient Name</td><td>{$row['fname']} {$row['lname']}</td></tr>";
                                echo "<tr><td>Patient Contact</td><td>{$row['contact']}</td></tr>";


                                // Print other patient details similarly
                                echo "</table>";
                                $patientDetailsPrinted = true;
                            }

                            // Print doctor details only if not already printed
                            if (!$doctorDetailsPrinted) {
                                echo "<h3 class= custom-font>Doctor Details</h3>";
                                // Print doctor details
                                echo "<table>";
                                // echo "<tr><th>Field</th><th>Value</th></tr>";
                                echo "<tr><th>Doctor</th><th>{$row['doctor']}</th></tr>";
                                // Print other doctor details similarly
                                echo "</table>";
                                $doctorDetailsPrinted = true;
                            }

                            // Print medicines only if not already printed
                            if (!$medicinesPrinted) {
                                echo "<div class='medicines'>";
                                echo "<h3 class= custom-font>Medicines</h3>";
                                echo "<table>";
                                echo "<tr><th>Medicine Name</th><th>Quantity</th><th>Type</th><th>Time Intake</th><th>Suggestion</th></tr>";
                                // Loop through each medicine record and print details
                                foreach ($medicines as $medicine) {
                                    echo "<tr>";
                                    echo "<td>{$medicine['med_name']}</td>";
                                    echo "<td>{$medicine['M_qty']}</td>";
                                    echo "<td>{$medicine['med_type']}</td>";
                                    echo "<td>{$medicine['time_intake']}</td>";
                                    echo "<td style='text-align: justify;'>{$medicine['suggestion']}</td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                                echo "</div>";
                                $medicinesPrinted = true;
                            }

                            // Print medical tests only if not already printed
                            if (!$medicalTestsPrinted) {
                                echo "<div class='medical-tests'>";
                                echo "<h3 class= custom-font>Medical Tests</h3>";
                                echo "<table>";
                                echo "<tr><th>Test Name</th></tr>";
                                // Loop through each medical test record and print details
                                foreach ($medical_tests as $test) {
                                    echo "<tr>";
                                    echo "<td>{$test['medical_test']}</td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                                echo "</div>";
                                $medicalTestsPrinted = true;
                            }
                        }
                    }
                    ?>
                    <div class="text-center">
                        <button class="btn btn-outline-info curve-btn" onclick="goBack()">Back</button>
                        <script>
                            function goBack() {
                                window.history.back();
                            }
                        </script>
                    </div>
                </div>

            </body>

            </html>

        </div>
    </div>
    </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
</body>

</html>