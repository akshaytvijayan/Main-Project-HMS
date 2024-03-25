<!DOCTYPE html>
<?php
session_start();
$username = $_SESSION['username'];

$con = mysqli_connect("localhost", "root", "", "myhmsdb");
$queryTests = "SELECT * FROM slot";
$resultTests = mysqli_query($con, $queryTests);

if (isset($_POST['schedule'])) {
    $Specialization = $_POST['Specialization'];
    $doc_name = $_POST['username'];
    $AppoID = $_POST['AppoID'];
    $patname = $_POST['patname'];
    $patage = $_POST['patage'];
    $patwork = $_POST['patwork'];
    $contact = $_POST['contact'];
    $date = $_POST['date'];
    // $time = $_POST['timeslot'];
    $query = "INSERT INTO offline_appointments (Specialization, doctor_name, AppoID, patname, patage, patwork, contact, date,added_by)
     VALUES ('$Specialization', '$doc_name', '$AppoID', '$patname', '$patage', '$patwork', '$contact', '$date','$username')";
    $sql = mysqli_query($con, $query);
    echo '<script type="text/javascript">';
    echo 'window.location.href= "ofine.php";';
    echo ' alert("scessfully registerd")';
    echo '</script>';
}
?>



<!DOCTYPE html>
<link rel="stylesheet" href="styletable.css">

<html lang="en">

<head>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Other meta tags, stylesheets, etc. -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>NEETHI HOSPITAL</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <script>
            function alphaOnly(event) {
                var key = event.keyCode;
                return ((key >= 65 && key <= 90) || key == 8 || key == 32);
            };
        </script>

        <style>
            .bg-primary {
                background: -webkit-linear-gradient(left, #3931af, #00c6ff);
            }

            .col-md-4 {
                max-width: 20% !important;
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

            #cpass {
                display: -webkit-box;
            }

            #list-app {
                font-size: 15px;
            }

            .btn-primary {
                background-color: #3c50c1;
                border-color: #3c50c1;
            }
        </style>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../logout1.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
            </ul>
        </div>
    </nav>
</head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Appointment Scheduling</title>
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        background-color: #f8f9fa;
    }

    .container {
        margin-top: 50px;
    }

    .card {
        border-radius: 15px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #007bff;
        color: #fff;
    }

    .form-group label {
        font-weight: bold;
    }

    .input-group {
        margin-bottom: 20px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    button:hover {
        cursor: pointer;
    }

    #inputbtn:hover {
        cursor: pointer;
    }

    label {
        font-weight: 10px;
    }
</style>


<body style="padding-top:50px;">
    <div class="container-fluid" style="margin-top:50px;">
        <h3 style="margin-left: 40%;  padding-bottom: 20px; font-family: 'IBM Plex Sans', sans-serif;"> Welcome &nbsp
            <?php echo $username ?>
        </h3>
        <div class="row">
            <div class="col-md-4" style="max-width:25%;margin-top: 3%;">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action " id="list-dash-list" data-toggle="list" href="#list-dash" role="tab" aria-controls="home">Dashboard</a>
                    <a class="list-group-item list-group-item-action" href="viewprofile.php" href="#list-doc">Profile</a>
                    <a class="list-group-item list-group-item-action " href="changepassstaff.php">Change Password</a>
                    <a class="list-group-item list-group-item-action active" href="ofine.php" href="#list-doc">Offline Appointment</a>
                    <a class="list-group-item list-group-item-action " href="offline.php" href="#list-doc">View Offline Appointment</a>
                    <a class="list-group-item list-group-item-action " href="leave.php" href="#list-doc">Leave Application</a>
                    <a class="list-group-item list-group-item-action " href="viewleave.php">View Leave Application</a>

                </div><br>
            </div>
            <div class="col-md-8" style="margin-top: 3%;">
                <div class="tab-content" id="nav-tabContent" style="width:100%;">
                    <div class="container">
                        <div class="card">
                            <div class="card-header text-center">
                                <h4 class="mb-0">Create an Appointment</h4>
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="">
                                        <div class="col-md-12">
                                            <label for="Specialization" class="col-sm-4 col-form-label">Specialization</label>
                                            <select class="form-control" id="Specialization" name="Specialization" required>
                                                <option value="" disabled selected>Select Specialization</option>
                                                <option value="Anatomical Pathology">Anatomical Pathology</option>
                                                <option value="Anesthesiology">Anesthesiology</option>
                                                <option value="Cardiology">Cardiology</option>
                                                <option value="Cardiovascular/Thoracic Surgery">Cardiovascular/Thoracic Surgery</option>
                                                <option value="Clinical Immunology/Allergy">Clinical Immunology/Allergy</option>
                                                <option value="Critical Care Medicine">Critical CareMedicine</option>
                                                <option value="Dermatology">Dermatology</option>
                                                <option value="Diagnostic Radiology">Diagnostic Radiology</option>
                                                <option value="Emergency Medicine">Emergency Medicine</option>
                                                <option value="Endocrinology and Metabolism">Endocrinology and Metabolism</option>
                                                <option value="Family Medicine">Family Medicine</option>
                                                <option value="Gastroenterology">Gastroenterology</option>
                                                <option value="General Internal Medicine">General Internal Medicine</option>
                                                <option value="General Surgery">General Surgery</option>
                                                <option value="General/Clinical Pathology">General/Clinical Pathology</option>
                                                <option value="Geriatric Medicine">Geriatric Medicine</option>
                                                <option value="Hematology">Hematology</option>
                                                <option value="Medical Biochemistry">Medical Biochemistry</option>
                                                <option value="Medical Genetics">Medical Genetics</option>
                                                <option value="Medical Microbiology and Infectious Diseases">Medical Microbiology and Infectious Diseases</option>
                                                <option value="Medical Oncology">Medical Oncology</option>
                                                <option value="Nephrology">Nephrology</option>
                                                <option value="Neurology">Neurology</option>
                                                <option value="Neurosurgery">Neurosurgery</option>
                                                <option value="Nuclear Medicine">Nuclear Medicine</option>
                                                <option value="Obstetrics/Gynecology">Obstetrics/Gynecology</option>
                                                <option value="Occupational Medicine">Occupational Medicine</option>
                                                <option value="Ophthalmology">Ophthalmology</option>
                                                <option value="Orthopedic Surgery">Orthopedic Surgery</option>
                                                <option value="Otolaryngology">Otolaryngology</option>
                                                <option value="Pediatrics">Pediatrics</option>
                                                <option value="Physical Medicine and Rehabilitation (PM & R)">Physical Medicine and Rehabilitation (PM & R)</option>
                                                <option value="Plastic Surgery">Plastic Surgery</option>
                                                <option value="Psychiatry">Psychiatry</option>
                                                <option value="Public Health and Preventive Medicine (PhPm)">Public Health and Preventive Medicine (PhPm)</option>
                                                <option value="Radiation Oncology">Radiation Oncology</option>
                                                <option value="Respirology">Respirology</option>
                                                <option value="Rheumatology">Rheumatology</option>
                                                <option value="Urology">Urology</option>
                                            </select>

                                        </div>
                                        <div class="col-sm-8">

                                        </div>

                                        <div class="col-md-12 mt-5">
                                            <div class="text-center">
                                                <button type="submit" name="Search" class="btn" style="background-color: blue; color: white;">Search</button>
                                            </div>
                                        </div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                var specializationSelect = document.getElementById('Specialization');
                                                var savedSpecialization = localStorage.getItem('selectedSpecialization');
                                                if (savedSpecialization) {
                                                    specializationSelect.value = savedSpecialization;
                                                }

                                                specializationSelect.addEventListener('change', function() {
                                                    localStorage.setItem('selectedSpecialization', this.value);
                                                });
                                            });
                                        </script>
                                        <?php

                                        if (isset($_POST['Search'])) {

                                            $categorey = mysqli_real_escape_string($con, $_POST['Specialization']);

                                            $query2 = "SELECT * FROM doctb WHERE spec=('$categorey')";
                                            $result2 = mysqli_query($con, $query2);
                                        ?>
                                            <div class="col-md-12 my-5">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label for="username" class="col-sm-4 col-form-label">Doctor Name</label>
                                                        <select class="form-control" id="username" name="username">
                                                            <?php
                                                            if (mysqli_num_rows($result2) > 0) {
                                                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                                                    echo '<option>' . $row2['username'] . '</option>';
                                                                }
                                                            } else {
                                                                echo '<option>No doctors available</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="AppoID" class="col-sm-4 col-form-label">Appointment ID</label>
                                                        <input type="text" class="form-control" name="AppoID" id="AppoID" value="<?php echo mt_rand(1000, 9999); ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label for="patname" class="col-sm-4 col-form-label">Patient Name</label>
                                                        <input type="text" class="form-control" name="patname" id="patname">
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="patage" class="col-sm-4 col-form-label">Patient Age</label>
                                                        <input type="number" class="form-control" name="patage" id="patage">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label for="patwork" class="col-sm-4 col-form-label">Patient Work</label>
                                                        <input type="text" class="form-control" name="patwork" id="patwork">
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="contact" class="col-sm-4 col-form-label">Contact Number</label>
                                                        <input type="tel" class="form-control" name="contact" id="contact">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label for="date">Date</label>
                                                        <input class="form-control" type="date" id="date" name="date" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime('+15 days')); ?>">
                                                    </div>
                                                    <!-- <div class="col-6">
                                                        <label for="timeslot">Select Time Slot:</label>
                                                        <select class="form-control" name="timeslot" id="timeslot">
                                                            <?php
                                                            // Assuming $resultTests contains the time slots
                                                            while ($row = mysqli_fetch_assoc($resultTests)) {
                                                                echo "<option value='{$row['time']}'>{$row['time']}</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div> -->
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-50 text-center">
                                                    <button type="submit" name="schedule" class="btn btn-primary">Schedule
                                                        Appointment</button>
                                                </div>
                                            </div>

                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Bootstrap JS -->
                    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
<?php
                                        }


?>


</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
</body>

</html>