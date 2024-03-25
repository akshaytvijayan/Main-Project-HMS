<!DOCTYPE html>
<?php
$con = mysqli_connect("localhost", "root", "", "myhmsdb");
session_start();
$username = $_SESSION['username'];

$sql = "select * from staffdb where email='$username'";
$rs = mysqli_query($con, $sql);
if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $phone = $_POST['contact'];
    $state = $_POST['state'];
    $district = $_POST['district'];
    $location = $_POST['location'];
    $qualification = $_POST['qualification'];
    $experience = $_POST['experience'];

    $sql = "UPDATE staffdb SET fname='$fname',lname='$lname',email='$email',age='$age',phone='$phone',state='$state',district='$district',location='$location' WHERE email='$username'";

    if ($con->query($sql) === TRUE) {
        echo "<script>alert('Record updated successfully')
    window.location='viewprofile.php'</script>";
    } else {
        echo "Error updating record: " . $con->error;
    }
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
                text-align: center;
                color: #fff;
                padding: 10px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
                width: 25%;
            }

            .btn-danger {
                text-align: center;
                color: #fff;
                padding: 10px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
                width: 15%;
            }


            .container {
                max-width: 1000px;
                margin: 0 auto;
                padding: 30px;
                background-color: #fff;
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);

            }

            .heading {
                color: green !important;
                font-weight: bold;


            }

            h2 {
                text-align: center;
                margin-bottom: 30px;
            }


            body {
                font-family: Arial, sans-serif;
                background-color: #f2f2f2;
            }

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

            .btn-success {
                text-align: center;
                padding: 10px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
                width: 15%;
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

<body style="padding-top:50px;">
    <div class="container-fluid" style="margin-top:50px;">
        <h3 style="margin-left: 40%;  padding-bottom: 20px; font-family: 'IBM Plex Sans', sans-serif;"> Welcome &nbsp
            <?php echo $username ?>
        </h3>
        <div class="row">
            <div class="col-md-4" style="max-width:25%;margin-top: 3%;">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action " id="list-dash-list" data-toggle="list" href="#list-dash" role="tab" aria-controls="home">Dashboard</a>
                    <a class="list-group-item list-group-item-action active" href="viewprofile.php" href="#list-doc">Profile</a>
                    <a class="list-group-item list-group-item-action " href="changepassstaff.php">Change Password</a>
                    <a class="list-group-item list-group-item-action " href="ofine.php" href="#list-doc">Offline Appointment</a>
                    <a class="list-group-item list-group-item-action " href="offline.php" href="#list-doc">View Offline Appointment</a>
                    <a class="list-group-item list-group-item-action " href="leave.php" href="#list-doc">Leave Application</a>
                    <a class="list-group-item list-group-item-action " href="viewleave.php">View Leave Application</a>
                </div><br>
            </div>
            <div class="container">
                <h2 class="heading ">PROFILE UPDATION PANEL</h2>
                <div class="col-md-8" style="margin-top: 3%;">
                    <div class="tab-content" id="nav-tabContent" style="width: 950px;">


                        <form name="myForm" method="POST" onsubmit="return validation();">
                            <table class="mx-auto">
                                <tbody>

                                    <?php
                                    while ($row = mysqli_fetch_array($rs)) {
                                    ?>
                                        <tr>
                                            <td>First Name</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control" name="fname" id="name" value="<?php echo $row['fname']; ?>" autocomplete="off" readonly>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td><span id="msg" style="color:red;"> </span></td>
                                        </tr>

                                        <tr>
                                            <td>Last Name</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control" name="lname" id="lname" value="<?php echo $row['lname']; ?> " autocomplete="off" maxlength="30">
                                            </td>

                                        </tr>
                                        <tr>
                                            <td><span id="lmsg" style="color:red;"> </span></td>
                                        </tr>

                                        <tr>
                                            <td>Email</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?> " id="email" required pattern="/^[\w\+\'\.-]+@[\w\'\.-]+\.[a-zA-Z]{2,}$/" onkeyup="return Validateemail()" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span id="email1" style="color:red;"> </span></td>
                                        </tr>
                                        <tr>
                                            <td>DOB</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control" value="<?php echo $row['age']; ?> " rows="5" id="age" name="age" required maxlength="11" readonly>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Phone Number</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control" value="<?php echo $row['phone']; ?> " id="contact" name="contact" required maxlength="10">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span id="msg2" style="color:red;"> </span></td>
                                        </tr>
                                        <td>State</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" class="form-control" value="<?php echo $row['state']; ?> " min="10" maxlength="10" id="state" name="state" required maxlength="30" readonly>
                                        </td>
                                        </tr>
                                        <td>District</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" class="form-control" value="<?php echo $row['district']; ?> " id="district" name="district" required>
                                        </td>
                                        </tr>
                                        <td>Location</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" class="form-control" value="<?php echo $row['location']; ?> " id="location" name="location" required>
                                        </td>
                                        </tr>
                                        <td>Qualification </td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" class="form-control" value="<?php echo $row['qualification']; ?> " id="qualification" name="qualification" required>
                                        </td>
                                        </tr>
                                        <td>Experience</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" class="form-control" value="<?php echo $row['experience']; ?> " id="experience" name="experience" required>
                                        </td>
                                        </tr>
                                    <?php
                                    } ?>
                                </tbody>
                            </table>
                            <br><br>
                            <div style="text-align: center;">
                                <input type="submit" class="btn btn-success" onclick="return confirm('Are you sure you want to update the details?')" value="Submit" id="submit" name="submit">
                                <a href="javascript:history.go(-1);" class="btn btn-outline-secondary btn-lg ml-2">Back</a>
                            </div>
                        </form>
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