<?php
include('func1.php');
$con = mysqli_connect("localhost", "root", "", "myhmsdb");
$username = $_SESSION['demail'];
$result = "SELECT * FROM doctb where email='$username'";
$sql = mysqli_query($con, $result);
$display = mysqli_fetch_array($sql);
$curentpwd = $display['password'];
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
                    <a class="list-group-item list-group-item-action" href="doctor-panel.php">Update Profile</a>
                    <a class="list-group-item list-group-item-action " href="changepassdoc.php">Change
                        Password</a>
                    <a class="list-group-item list-group-item-action active" href="doctor-panel.php">Online
                        Appointments</a>
                    <a class="list-group-item list-group-item-action " href="offline.php">Offline Appointments</a>
                    <a class="list-group-item list-group-item-action" href="doctor-panel.php"> Prescription List</a>

                </div>
            </div>
            <div class="col-md-8 mt-5">
                <div class="tab-content mt-5" id="nav-tabContent" style="width: 950px;">
                    <div class="tab-pane fade show active" id="list-dash" role="tabpanel" aria-labelledby="list-dash-list">

                        <div class="card" style="margin-left:15%;">
                            <div class="card-header">
                                <?php
                                $available_tests = array(
                                    "Blood Pressure",
                                    "Blood Sugar",
                                    "Cholesterol",
                                    "Thyroid Function",
                                    "Complete Blood Count",
                                    "Lipid Profile",
                                    "Liver Function",
                                    "Renal Function",
                                    "Urinalysis",
                                    "Electrocardiogram",
                                    "Spirometry",
                                    "Magnetic Resonance Imaging",
                                    "Colonoscopy",
                                    "Endoscopy",
                                    "Biopsy",
                                    "Bone Density Scan",
                                    "Computed Tomography Scan",
                                    "Echocardiogram",
                                    "Electroencephalogram",
                                    "Mammogram",
                                    "Pap Smear",
                                    "Prostate Specific Antigen Test",
                                    "Sigmoidoscopy",
                                    "Stress Test",
                                    "Treadmill Test",
                                    "Visual Acuity Test",
                                    "Skin Prick Test",
                                    "X-Ray"
                                );
                                $pid = $_SESSION['pid'];
                                $disease = $_SESSION['disease'];

                                // Check if prescription data exists in session
                                if (!isset($_SESSION['pid']) || !isset($_SESSION['disease'])) {
                                    // Redirect back to the prescription page if data is missing
                                    // header("Location: prescribe.php");
                                    exit();
                                }

                                // Retrieve prescription data from session
                                $pid = $_SESSION['pid'];
                                $disease = $_SESSION['disease'];
                                $id = $_SESSION['id'];


                                // Handle form submission to process selected medical tests
                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                    // Retrieve selected medical tests
                                    $selected_tests = $_POST['medical_tests'];

                                    // Store selected medical tests in the database or session
                                    // For simplicity, we'll just print them here

                                    foreach ($selected_tests as $test) {
                                        $sql = "INSERT INTO patient_medical_tests (pid, medical_test) VALUES (?, ?)";
                                        $stmt = $con->prepare($sql);
                                        $stmt->bind_param("is", $pid, $test);
                                        $stmt->execute();
                                    }
                                    $query2 = "UPDATE `appointmenttb` SET `status` = 'approve' WHERE `ID` = ?";
                                    $stmt2 = $con->prepare($query2);
                                    $stmt2->bind_param("i", $id);
                                    $stmt2->execute();
                                    echo "<script>alert('Prescribed successfully!');</script>";

                                    exit();
                                }
                                ?>

                                <!DOCTYPE html>
                                <html lang="en">
                                <meta charset="UTF-8">
                                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                <title>Available Medical Tests</title>
                                <style>
                                    body {
                                        font-family: Arial, sans-serif;
                                        margin: 0;
                                        padding: 20px;
                                    }

                                    h2 {
                                        text-align: center;
                                    }

                                    form {
                                        max-width: 600px;
                                        margin: 0 auto;
                                        padding: 20px;
                                        border: 1px solid #ccc;
                                        border-radius: 5px;
                                        background-color: #f9f9f9;
                                    }

                                    .checkbox-container {
                                        display: flex;
                                        flex-wrap: wrap;
                                    }

                                    .checkbox-item {
                                        flex: 1 0 50%;
                                        /* Two columns */
                                        margin-bottom: 10px;
                                    }

                                    label {
                                        display: inline-block;
                                        margin-left: 5px;
                                    }

                                    #noTest {
                                        margin-left: 5px;
                                    }

                                    button {
                                        display: block;
                                        width: 100%;
                                        padding: 10px;
                                        margin-top: 20px;
                                        border: none;
                                        border-radius: 5px;
                                        background-color: #007bff;
                                        color: #fff;
                                        font-size: 16px;
                                        cursor: pointer;
                                    }

                                    button:hover {
                                        background-color: #0056b3;
                                    }
                                </style>
                                <meta charset="UTF-8">
                                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                <title>Available Medical Tests</title>
                                <script>
                                    function handleCheckboxChange(checkbox) {
                                        var checkboxes = document.querySelectorAll('input[type="checkbox"]');

                                        if (checkbox.value === "No Test") {
                                            checkboxes.forEach(function(item) {
                                                if (item !== checkbox) {
                                                    item.disabled = checkbox.checked;
                                                }
                                            });
                                        } else {
                                            document.getElementById("noTest").disabled = false;
                                        }
                                    }
                                </script>
                                </head>

                                <body>
                                    <h2>Available Medical Tests</h2>
                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                        <input type="hidden" name="pid" value="<?php echo $pid; ?>">
                                        <input type="hidden" name="disease" value="<?php echo $disease; ?>">

                                        <div class="checkbox-container">
                                            <?php foreach ($available_tests as $test) { ?>
                                                <div class="checkbox-item">
                                                    <input type="checkbox" id="<?php echo $test; ?>" name="medical_tests[]" value="<?php echo $test; ?>" onchange="handleCheckboxChange(this)">
                                                    <label for="<?php echo $test; ?>">
                                                        <?php echo $test; ?>
                                                    </label>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <hr>
                                        <div class="checkbox-item">
                                            <input type="checkbox" id="noTest" name="medical_tests[]" value="No Test" onchange="handleCheckboxChange(this)">
                                            <label for="noTest">No Test</label>
                                        </div>

                                        <button type="submit">Add Tests</button>
                                    </form>
                                </body>

                                </html>


</html>
</div>
</div>
</div>
</div>
</div>
</div>\
</div>
</body>


</html>

</div>
</div>
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