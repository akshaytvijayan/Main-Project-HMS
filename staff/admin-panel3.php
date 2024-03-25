<!DOCTYPE html>
<?php
$con = mysqli_connect("localhost", "root", "", "myhmsdb");
session_start();
$username = $_SESSION['username'];
?>



<!DOCTYPE html>
<link rel="stylesheet" href="styletable.css">

<html lang="en">

<head>


    <!-- Required meta tags -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">








    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Other meta tags, stylesheets, etc. -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> NEETHI Hospital </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <style>
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

            .btn-primary {
                background-color: #3c50c1;
                border-color: #3c50c1;
            }
        </style>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
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
                    <a class="list-group-item list-group-item-action active" id="list-dash-list" data-toggle="list" href="#list-dash" role="tab" aria-controls="home" href="admin-panel3.php">Dashboard</a>
                    <a class="list-group-item list-group-item-action" href="viewprofile.php" href="#list-doc">Profile</a>
                    <a class="list-group-item list-group-item-action " href="changepassstaff.php">Change Password</a>
                    <a class="list-group-item list-group-item-action " href="ofine.php" href="#list-doc">Offline Appointment</a>
                    <a class="list-group-item list-group-item-action " href="offline.php" href="#list-doc">View Offline Appointment</a>
                    <a class="list-group-item list-group-item-action " href="leave.php" href="#list-doc">Leave Application</a>
                    <a class="list-group-item list-group-item-action " href="viewleave.php">View Leave Application</a>
                </div><br>
            </div>
            <div class="col-md-8" style="margin-top: 3%;">
                <div class="tab-content" id="nav-tabContent" style="width: 950px;">


                    <div class="col-md-8" style="margin-top: 3%;">
                        <div class="tab-content" id="nav-tabContent" style="width: 950px;">


                            <div class="tab-pane fade  show active" id="list-dash" role="tabpanel" aria-labelledby="list-dash-list">
                                <div class="container-fluid container-fullw bg-white">
                                    <div class="row">
                                        <div class="col-sm-4" style="left: 5%">
                                            <div class="panel panel-white no-radius text-center">
                                                <div class="panel-body">
                                                    <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-terminal fa-stack-1x fa-inverse"></i> </span>
                                                    <h4 class="StepTitle" style="margin-top: 5%;"> Profile</h4>
                                                    <script>
                                                        function clickDiv(id) {
                                                            document.querySelector(id).click();
                                                        }
                                                    </script>
                                                    <p class="links cl-effect-1">
                                                        <a href="viewprofile.php" onclick="clickDiv('#list-home-list')">
                                                            View Profile
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-4" style="left: 10%">
                                            <div class="panel panel-white no-radius text-center">
                                                <div class="panel-body">
                                                    <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-paperclip fa-stack-1x fa-inverse"></i> </span>
                                                    <h4 class="StepTitle" style="margin-top: 5%;">leave apply</h2>

                                                        <p class="cl-effect-1">
                                                            <a href="leave.php" onclick="clickDiv('#list-pat-list')">
                                                                Leave Apply
                                                            </a>
                                                        </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-sm-4" style="left: 20%;margin-top:5%">
                                        <div class="panel panel-white no-radius text-center">
                                            <div class="panel-body">
                                                <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-list-ul fa-stack-1x fa-inverse"></i> </span>
                                                <h4 class="StepTitle" style="margin-top: 5%;">Prescriptions</h2>

                                                    <p class="cl-effect-1">
                                                        <a href="#list-pres" onclick="clickDiv('#list-pres-list')">
                                                            View Prescription List
                                                        </a>
                                                    </p>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>




                            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
                            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
</body>

</html>