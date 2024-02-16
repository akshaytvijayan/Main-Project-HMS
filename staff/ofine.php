<!DOCTYPE html>
<?php
session_start();
$username = $_SESSION['username'];

$con = mysqli_connect("localhost", "root", "", "myhmsdb");
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
        integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Other meta tags, stylesheets, etc. -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
        integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>NEETHI HOSPITAL</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                    <a class="nav-link" href="../logout1.php"><i class="fa fa-sign-out"
                            aria-hidden="true"></i>Logout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
            </ul>
        </div>
    </nav>
</head>
<style type="text/css">
    button:hover {
        cursor: pointer;
    }

    #inputbtn:hover {
        cursor: pointer;
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
                    <a class="list-group-item list-group-item-action " href="admin-panel3.php" href="#list-dash"
                        role="tab" aria-controls="home">Dashboard</a>
                    <a class="list-group-item list-group-item-action " href="viewprofile.php"
                        href="#list-doc">profile</a>
                    <a class="list-group-item list-group-item-action " href="leave.php" href="#list-doc">leave apply</a>
                    <a class="list-group-item list-group-item-action active" href="ofine.php" href="#list-doc">Offline
                        booking</a>

                </div><br>
            </div>
            <div class="col-md-8" style="margin-top: 3%;">
                <div class="tab-content" id="nav-tabContent" style="width: 950px;">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-body">
                                <meta charset="UTF-8">
                                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                <center>
                                    <h4>Create an appointment</h4>
                                </center><br>
                                <form action="process_form.php" method="post">
                                <div class="col-md-8">
                                        <label for="specialization">Select Specialization:</label></div>
                                        <div class="col-md-8">
                                        <select id="specialization" name="specialization">
                                            <option value="">-----------Select Specialization ------------</option>
                                            <?php
                                            // Assuming you have a database connection established
                                            $con = mysqli_connect("localhost", "root", "", "myhmsdb");

                                            // Perform database query to fetch distinct specializations from the doctb table
                                            $query = "SELECT DISTINCT spec FROM doctb";
                                            $result = mysqli_query($con, $query);

                                            // Check if query was successful
                                            if ($result) {
                                                // Iterate over the results and populate the dropdown menu
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo '<option value="' . $row['spec'] . '">' . $row['spec'] . '</option>';
                                                }
                                            } else {
                                                // Handle query error
                                                echo '<option value="">Error fetching specializations</option>';
                                            }

                                            // Close the database connection
                                            mysqli_close($con);
                                            ?>
                                        </select>
                                        </div><br>
                                        <div class="col-md-4"><label for="patname">Patient Name</label></div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="patname" id="patname"
                                                required>
                                        </div><br>

                                        <div class="col-md-4"><label for="patage">Patient Age</label></div>
                                        <div class="col-md-8">
                                            <input type="number" class="form-control" name="patage" id="patage"
                                                required>
                                        </div><br>

                                        <div class="col-md-4"><label for="patwork">Patient Work</label></div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="patwork" id="patwork"
                                                required>
                                        </div><br>

                                        <div class="col-md-4"><label for="contact">Contact Number</label></div>
                                        <div class="col-md-8">
                                            <input type="tel" class="form-control" name="contact" id="contact" required>
                                        </div><br>

                                        <div class="col-md-7"><label for="amount">Consultation Amount</label></div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="amount" id="amount" required>
                                        </div><br>

                                        <div class="col-md-12">
                                            <input type="submit" class="btn btn-primary" value="Schedule Appointment">
                                        </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
</body>

</html>