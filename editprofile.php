<!DOCTYPE html>
<?php
include('func.php');
include('newfunc.php');
$con = mysqli_connect("localhost", "root", "", "myhmsdb");
echo $pid = $_SESSION['pid'];
$username = $_SESSION['username'];
echo $sql = "select * from patreg where pid='$pid'";
$rs = mysqli_query($con, $sql);
if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $contact = $_POST['contact'];
    $state = $_POST['state'];
    $district = $_POST['district'];
    $place = $_POST['place'];

    $sql = "UPDATE patreg SET fname='$fname',lname='$lname',email='$email',age='$age',contact='$contact',state='$state',district='$district',place='$place' WHERE pid='$pid'";

    if ($con->query($sql) === TRUE) {
        echo "<script>alert('Record updated successfully')
    window.location='admin-panel.php'</script>";
    } else {
        echo "Error updating record: " . $con->error;
    }
}

?>
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
                width: 15%;
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
                    <a class="nav-link" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
            </ul>
        </div>
    </nav>
</head>



<div class="container-fluid" style="margin-top:50px;">
    <h3 style="margin-left: 40%;  padding-bottom: 20px; font-family: 'IBM Plex Sans', sans-serif;"> Welcome &nbsp
        <?php echo $username ?>
    </h3>
    <div class="row">
        <div class="col-md-4" style="max-width:25%; margin-top: 3%">
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action " href="admin-panel.php" role="tab" aria-controls="home">Dashboard</a>
                <a class="list-group-item list-group-item-action active" href="#list-update" role="tab" aria-controls="home">Update Profile</a>
                <a class="list-group-item list-group-item-action" href="admin-panel.php" role="tab" aria-controls="home">Book Appointment</a>
                <a class="list-group-item list-group-item-action" href="offlineappoinment.php">Offline Appointment</a>
                <a class="list-group-item list-group-item-action" href="admin-panel.php" aria-controls="home">Appointment History</a>
                <a class="list-group-item list-group-item-action" href="admin-panel.php" aria-controls="home">Prescriptions</a>


            </div><br>
        </div>
        <div class="container profile-edit">
            <h2 class="heading">PATIENT PROFILE</h2>
            <div class="col-md-8 mx-auto" style="margin-top: 3%;">
                <div class="tab-content" id="nav-tabContent">
                    <form name="myForm" method="POST" onsubmit="return validation();">

                        <table class="mx-auto">
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($rs)) {
                                ?>
                                    <tr>
                                        <td>First name</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" class="form-control" name="fname" id="name" value="<?php echo $row['fname']; ?>" autocomplete="off" onkeyup="return Validstr1()" required pattern="[a-zA-Z]{3,30}" oninvalid="setCustomValidity('input is incorrect !!')" oninput="setCustomValidity('')" maxlength="30" onkeyup="return validation()" readonly>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td><span id="msg" style="color:red;"> </span></td>
                                    </tr>

                                    <tr>
                                        <td>Last name</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" class="form-control" name="lname" id="lname" value="<?php echo $row['lname']; ?> " autocomplete="off">
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
                                        <td>Age</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" class="form-control" value="<?php echo $row['age']; ?> " rows="5" id="age" name="age" required required maxlength="3" readonly>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Gender</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" class="form-control" value="<?php echo $row['gender']; ?> " rows="5" id="gender" name="gender" required required maxlength="30" readonly>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>Phone number</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" class="form-control" value="<?php echo $row['contact']; ?> " id="contact" name="contact" required maxlength="10">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span id="msg2" style="color:red;"> </span></td>
                                    </tr>
                                    <td>State</td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" class="form-control" value="<?php echo $row['state']; ?> " min="10" maxlength="10" id="state" name="state" readonly>
                                    </td>
                                    </tr>
                                    <td>District</td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" class="form-control" value="<?php echo $row['district']; ?> " id="district" name="district" required>
                                    </td>
                                    </tr>
                                    <td>Address:</td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" class="form-control" value="<?php echo $row['place']; ?> " id="place" name="place" required>
                                    </td>
                                    </tr>
                                <?php
                                } ?>
                            </tbody>
                        </table>
                        <br><br>
                        <div style="text-align: center;">
                            <input type="submit" class="btn-success" value="Submit" id="btn" name="submit">
                            <a href="admin-panel.php" id="btn" class="btn btn-danger">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js">
    </script>



    </body>

</html>