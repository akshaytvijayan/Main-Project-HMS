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
<style type="text/css">
    button:hover {
        cursor: pointer;
    }

    #inputbtn:hover {
        cursor: pointer;
    }
</style>
<style>
    input[type=text],
    select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    textarea,
    select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=date],
    select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    /* div
 {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
} */
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
                    <a class="list-group-item list-group-item-action " href="ofine.php" href="#list-doc">Offline Appointment</a>
                    <a class="list-group-item list-group-item-action " href="offline.php" href="#list-doc">View Offline Appointment</a>
                    <a class="list-group-item list-group-item-action active" href="leave.php" href="#list-doc">Leave Application</a>
                    <a class="list-group-item list-group-item-action " href="viewleave.php">View Leave Application</a>


                </div><br>
            </div>
            <div class="col-md-8" style="margin-top: 3%;">
                <div class="tab-content" id="nav-tabContent" style="width: 950px;">
                    <div class="container-fluid">
                        <div class="xs">
                            <h3>Leave Application</h3>
                            <?php
                            $username = $_SESSION['username'];

                            if (isset($_SESSION['status'])) {
                            ?>
                                <div class="alert alert-success" role="alert">


                                    <?php echo $_SESSION['status']; ?>

                                </div>
                            <?php

                                unset($_SESSION['status']);
                            }

                            ?>
                            <div class="well1 white">
                                <form class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" action="leaveaction.php" method="POST">
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="control-label">To Date</label>
                                            <input type="date" class="form-control1 ng-invalid ng-invalid-required ng-touched" id="demo" name="todate" required="">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">From Date</label>
                                            <input type="date" class="form-control1 ng-invalid ng-valid-email ng-invalid-required ng-touched" id="demo1" name="fromdate" required="">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Reason</label>
                                            <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched" name="reason" required="">
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" name="btnsubmit" class="btn btn-primary">Submit</button>
                                            <button type="reset" class="btn btn-default">Reset</button>
                                        </div>



                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var date = new Date();
            var tdate = date.getDate();
            var month = date.getMonth() + 1;
            if (tdate < 10) {
                tdate = '0' + tdate;
            }
            if (month < 10) {
                month = '0' + month;
            }
            var year = date.getUTCFullYear();
            var minDate = year + "-" + month + "-" + tdate;

            document.getElementById("demo").setAttribute('min', minDate);
            document.getElementById("demo1").setAttribute('min', minDate);
        </script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
</body>

</html>