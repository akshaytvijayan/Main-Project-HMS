<html lang="en">
<?php
include('func.php');
include('newfunc.php');
$con = mysqli_connect("localhost", "root", "", "myhmsdb");
$username = $_SESSION['email'];
$result = "SELECT * FROM patreg where email='$username'";
$sql = mysqli_query($con, $result);
$display = mysqli_fetch_array($sql);
$curentpwd = $display['password'];
?>
<?php
if (isset($_POST["btnsubmit"])) {
    $cc = $_POST['pd'];
    $curentpwd;
    if ($curentpwd == $cc) {
        $ccpassword = $_POST['npd'];
        $result = "UPDATE patreg SET password='$ccpassword' WHERE email='$username'";
        $sql = mysqli_query($con, $result);
        if ($sql) {
            echo "<script>alert('Password Updated Succesfully!!Plase login again!!');window.location='index.php'</script>";
        }
    } else
        echo "<script>alert('Please enter current password correctlty!!');window.location='changepass.php'</script>";
}
?>


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
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

        button:hover {
            cursor: pointer;
        }

        #inputbtn:hover {
            cursor: pointer;
        }

        .doctor-card {
            /* border:2px solid gray; */
            border-radius: 10px;
            /* width:400px; */
            /* height:300px; */
            /* column-gap: 40px; */

        }

        .doctor-rows-list {
            /* column-count: 4; */
            column-gap: 40px;
            row-gap: 40px;
        }
    </style>
</head>


<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
            <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> NEETHI Hospital </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <br><br><br><br>
    <div class="header text-center">
        <h3>Welcome
            <?php echo $username ?>
        </h3>
    </div>
    <div class="">
        <div class="row">
            <div class="col-md-4">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action " href="admin-panel.php" role="tab" aria-controls="home">Dashboard</a>
                    <a class="list-group-item list-group-item-action" href="admin-panel.php" role="tab" aria-controls="home">Update Profile</a>
                    <a class="list-group-item list-group-item-action active" href="changepass.php">Change Password</a>

                    <a class="list-group-item list-group-item-action" href="admin-panel.php" role="tab" aria-controls="home">Book Appointment</a>
                    <a class="list-group-item list-group-item-action " href="offlineappoinment.php">Available
                        Doctors</a>
                    <a class="list-group-item list-group-item-action" href="admin-panel.php" aria-controls="home">Appointment History</a>
                    <a class="list-group-item list-group-item-action" href="admin-panel.php" role="tab" data-toggle="list" aria-controls="home">Prescriptions</a>
                </div><br>
            </div>

            <div class="col-md-8">
                <!-- Sorting search bar -->
                <div class="input-group mb-3">
                </div>
                <!-- Doctor cards -->
                <br><br>
                <div class="card text-center" style="width:70%; margin-left:15%;">
                    <div class="card-header">
                        heading
                    </div>
                    <div class="card-body">
                        <form action="" class="form" method="POST">
                            <h6>Old Password</h6>
                            <div class="input-group">
                                <input type="password" class="form-control" name="pd" id="name">
                            </div>
                            <h6>New Password</h6>
                            <div class="input-group">

                                <input type="password" class="form-control" name="npd" id="name">

                            </div>
                            <button type="submit" name="btnsubmit" class="btn btn-info">Submit</button>
                        </form>
                        <div class="card-footer text-muted">
                        </div>
                    </div>
                    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
</body>

</html>