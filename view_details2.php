<?php
include('func1.php');
$con = mysqli_connect("localhost", "root", "", "myhmsdb");
$doctor = $_SESSION['demail'];
$doc_query = mysqli_query($con, "SELECT username FROM `doctb` WHERE email='$doctor'");
$doc_row = mysqli_fetch_array($doc_query);
$doc_row_name = $doc_row['username'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Bill</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f8f9fa;
            padding-top: 70px;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .bill-heading {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .bill-heading h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }

        .bill-heading p {
            font-size: 16px;
            margin-bottom: 5px;
            color: #555;
        }

        .balance {
            margin-top: 20px;
            text-align: right;
            font-size: 18px;
        }

        .balance p {
            margin-bottom: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .no-appointments {
            text-align: center;
            font-style: italic;
            color: #888;
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

        <div class="container">
            <div class="bill-heading text-center">
                <h2 style="font-size: 32px; font-weight: bold;">NEEHTI HOSPITAL</h2>
                <p style="font-size: 18px;">

                    <strong>CHELANNUR NEETHI LABS AND SCANS <br>(PO) Chelannur HO Kakkodi-Mukku<br> Calicut -673616 Kerala </strong><br>
                    <strong>Consulting Time: 9am-5pm, Sunday: Closed</strong>
                </p>
            </div>

            <h2>Medical Prescription</h2>
            <div class="row">
                <div class="col-md-6">
                    <h4>Doctor Details:</h4>
                    <p>
                        <?php
                        // Assuming $con is your database connection
                        if (isset($_GET['id'])) {
                            $con = mysqli_connect("localhost", "root", "", "myhmsdb");
                            $id = $_GET['id'];
                            $sql = "SELECT doctor_name FROM `offline_appointments` WHERE offid='$id'";
                            $result = mysqli_query($con, $sql);
                            if ($result && mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_assoc($result);
                                echo "Doctor: " . $row['doctor_name'] . "<br>";
                                echo "Email ID: " . $_SESSION['demail'];
                            } else {
                                echo "Doctor details not found.";
                            }
                        } else {
                            echo "Doctor details not found.";
                        }
                        ?>
                    </p>
                </div>
                <div class="col-md-6">
                    <h4>Patient Details:</h4>
                    <p>
                        <?php
                        // Assuming $con is your database connection
                        if (isset($_GET['id'])) {
                            $con = mysqli_connect("localhost", "root", "", "myhmsdb");
                            $id = $_GET['id'];
                            $sql = "SELECT * FROM `offline_appointments` WHERE offid='$id'";
                            $result = mysqli_query($con, $sql);
                            if ($result && mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_assoc($result);
                                echo "Patient Name: " . $row['patname'] . "<br>";
                                echo "Age: " . $row['patage'] . "<br>";
                                echo "Place: " . $row['patwork'] . "<br>";
                                echo "Contact: " . $row['contact'] . "<br>";
                                echo "Date: " . $row['date'] . "<br>";
                            } else {
                                echo "Patient details not found.";
                            }
                        } else {
                            echo "Patient ID not provided.";
                        }
                        ?>
                    </p>
                </div>
            </div>
            <hr>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Medicine Name</th>
                        <th>Quantity</th>
                        <th>Type</th>
                        <th>Medicine Type</th>
                        <th>Time Intake</th>
                        <th>Suggestion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_GET['id'])) {
                        $con = mysqli_connect("localhost", "root", "", "myhmsdb");
                        $id = $_GET['id'];
                        $sql = "SELECT * FROM `medicines2` WHERE prestb_id='$id'";
                        $result = mysqli_query($con, $sql);
                        if (!$result) {
                            echo mysqli_error($con);
                        }
                        $row_count = mysqli_num_rows($result);

                        if ($row_count > 0) {
                            $ml = 1;
                            while ($row = mysqli_fetch_array($result)) {
                    ?>
                                <tr>
                                    <td><?php echo $ml; ?></td>
                                    <td><?php echo $row['med_name']; ?></td>
                                    <td><?php echo $row['M_qty']; ?></td>
                                    <td><?php echo $row['M_type']; ?></td>
                                    <td><?php echo $row['med_type']; ?></td>
                                    <td><?php echo $row['time_intake']; ?></td>
                                    <td><?php echo $row['suggestion']; ?></td>
                                </tr>
                            <?php $ml++;
                            }
                        } else { ?>
                            <tr>
                                <td colspan="7" class="no-appointments">No Appointments 😑</td>
                            </tr>
                    <?php
                        }
                    } ?>
                </tbody>
            </table>
            <div class="text-center">
                <button class="btn btn-outline-info curve-btn" onclick="goBack()">Back</button>
                <script>
                    function goBack() {
                        window.history.back();
                    }
                </script>
            </div>
        </div>
        <!-- Bootstrap JS -->

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>