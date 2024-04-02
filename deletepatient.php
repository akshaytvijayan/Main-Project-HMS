<!DOCTYPE html>
<?php
$con = mysqli_connect("localhost", "root", "", "myhmsdb");

include('newfunc.php');

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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
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
            /* Custom styles for the main section of the table */
            body {
                font-family: Arial, sans-serif;
                background-color: #f0f0f0;
                margin: 0;
                padding: 0;
            }

            #main-section {
                margin: 10px;
                padding: 10px;
                background-color: white;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            h1 {
                text-align: center;
                margin-bottom: 20px;
                color: #333333;
                margin-bottom: 30px;
                color: green !important;
                font-weight: bold;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                border-radius: 5px;
                overflow: hidden;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            .panel-heading {
                background-color: #007bff;
                /* Blue background color */
                color: #ffffff;
                /* White text color */
                padding: 10px;
                /* Add padding around the text */
                font-size: 20px;
                /* Increase font size */
                font-weight: bold;
                /* Make text bold */
                border-radius: 5px 5px 0 0;
                /* Add rounded corners to the top */
            }

            th,
            td {
                padding: 12px;
                text-align: left;
                border-bottom: 1px solid #dddddd;
            }

            th {
                background-color: #f2f2f2;
                color: #333333;
            }

            tbody tr:nth-child(even) {
                background-color: #ffffff;
            }

            tbody tr:hover {
                background-color: #f9f9f9;
            }

            input[type="text"] {
                padding: 8px;
                border-radius: 5px;
                border: 1px solid #dddddd;
                margin-bottom: 10px;
            }
        </style>


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
</head>



<body style="padding-top:50px;">
    <div class="container-fluid" style="margin-top:10px;">
        <h3 style="margin-left: 40%; padding-bottom: 10px;font-family: 'IBM Plex Sans', sans-serif;"> WELCOME
            ADMINISTRATOR </h3>
        <div class="row">
            <div class="col-md-4" style="max-width:20%;margin-top: 3%;">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action" href="admin-panel1.php" href="#list-doc">Dashboard</a>

                    <a class="list-group-item list-group-item-action " href="addstaf.php" href="#list-settings">Add Staff</a>
                    <a class="list-group-item list-group-item-action " href="deletestaff.php" href="#list-settings">View all Staffs</a>
                    <a class="list-group-item list-group-item-action" href="leave.php">leave approval</a>

                    <a class="list-group-item list-group-item-action" href="admin-panel1.php" href="#list-settings">Add Doctor</a>
                    <a class="list-group-item list-group-item-action " href="deletedoctor.php" href="#list-doc">View all Doctors</a>
                    <a class="list-group-item list-group-item-action" href="admin-panel1.php" href="#list-pres">Prescription List</a>

                    <a class="list-group-item list-group-item-action active" href="deletepatient.php" href="#list-pat">View all Patient </a>
                    <a class="list-group-item list-group-item-action" href="admin-panel1.php" href="#list-app">Appointment Details</a>

                    <a class="list-group-item list-group-item-action" href="admin-panel1.php" href="#list-mes">Queries</a>
                    <a class="list-group-item list-group-item-action" href="slot.php">Add Slot</a>

                </div><br>
            </div>
            <div class="col-md-8" id="main-section" style="max-width: 1300px;" style="margin-top: 3%;">
                <div class="tab-content" id="nav-tabContent" style="max-width: 1300px;">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                <!-- <div class="panel-heading">
                                    VIEW ALL PATIENTS
                                </div> -->
                                <div class="panel-body">

                                    <script>
                                        document.getElementById('searchBtn').addEventListener('click', function() {
                                            var fromDate = document.getElementById('fromDate').value;
                                            var toDate = document.getElementById('toDate').value;
                                            // Redirect to the same page with the date parameters in the URL
                                            window.location.href = 'deletepatient.php?fromDate=' + fromDate + '&toDate=' + toDate;
                                        });
                                    </script>

                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <div id="main-section">
                                                <h1 class="panel heading"> VIEW ALL PATIENTS</h1>
                                                <table id="dataTable">
                                                    <thead>
                                                        <tr>
                                                            <th>Id</th>
                                                            <th>Name</th>&nbsp;&nbsp;
                                                            <th>Age</th>
                                                            <th>Email</th>
                                                            <th>Gender</th>
                                                            <th>Phone no</th>
                                                            <th>Address</th>
                                                            <th>District</th>
                                                            <th>State</th>
                                                            <th>Enrollment Date </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $s = 1;
                                                        if (isset($_GET["fromDate"]) && isset($_GET["toDate"])) {
                                                            $fromDate = $_GET['fromDate'];
                                                            $toDate = $_GET['toDate'];
                                                            $query = "SELECT * FROM patreg WHERE regdate BETWEEN '$fromDate' AND '$toDate' ORDER BY pid DESC";
                                                        } else {
                                                            $query = "SELECT * FROM patreg ORDER BY pid DESC";
                                                        }
                                                        $result = mysqli_query($con, $query);
                                                        while ($row = mysqli_fetch_array($result)) {
                                                        ?>


                                                            <tr>
                                                                <td>
                                                                    <?php echo $s++; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['fname']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['age']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['email']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['gender']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['contact']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['place']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['district']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['state']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['regdate']; ?>
                                                                </td>

                                                            </tr>

                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <?php

                                            if (isset($_POST['delete'])) {
                                                $id = $_POST['id'];
                                                $select = "DELETE FROM  patreg  WHERE pid='$id'";
                                                $result = mysqli_query($con, $select);
                                                echo '<script type="text/javascript">';
                                                echo 'window.location.href= "deletepatient.php";';
                                                echo ' alert("deleted")';
                                                echo '</script>';
                                            }
                                            ?>

                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- End  Basic Table  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function() {
                var table = $('#dataTable').DataTable({
                    "paging": true,
                    "searching": true,
                    "info": true,
                    "order": [
                        [2, "asc"]
                    ]
                });

                $('#dataTable thead th').each(function() {
                    var title = $(this).text();
                    $(this).html('<input type="text" placeholder="Search ' + title + '" />');
                });

                table.columns().every(function() {
                    var that = this;

                    $('input', this.header()).on('keyup change', function() {
                        if (that.search() !== this.value) {
                            that
                                .search(this.value)
                                .draw();
                        }
                    });
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                console.log("Document ready");
                $("#searchInput").on("keyup", function() {
                    console.log("Keyup event triggered");
                    var value = $(this).val().toLowerCase();
                    console.log("Search value:", value);
                    $("#builder tbody tr").filter(function() {
                        console.log("Filtering table rows");
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>


</body>

</html>