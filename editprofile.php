<!DOCTYPE html>
<?php
include('func.php');
include('newfunc.php');
$con = mysqli_connect("localhost", "root", "", "myhmsdb");
$pid = $_SESSION['pid'];
$username = $_SESSION['username'];
$pid = $_SESSION['pid'];
$sql = "select * from patreg where pid='$pid'";
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
<style type="text/css">
    button:hover {
        cursor: pointer;
    }

    #inputbtn:hover {
        cursor: pointer;
    }

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

    input[type=submit] {
        width: 50%;
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

    /* Main */
    .main {
        margin-top: 2%;
        margin-left: 20%;
        margin-right: 20%;
        font-size: 28px;
        padding: 0 10px;
        width: 58%;
    }

    .main h2 {
        color: #333;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 24px;
        margin-bottom: 10px;
    }

    .main .card {
        background-color: #fff;
        border-radius: 18px;
        box-shadow: 1px 1px 8px 0 grey;
        height: auto;
        /* margin-bottom: 20px; */
        padding: 20px 0 20px 50px;
    }
</style>


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
        <div class="col-md-8" style="margin-top: 3%;">
            <div class="tab-content" id="nav-tabContent" style="width: 950px;">

                <div class="card-body">
                    <form name="myForm" method="POST" onsubmit="return validation();">
                        <table>
                            <tbody>
                                <!-- <tr>
                                    <td>Name</td>
                                    <td>:</td>
                                    <td>
                                        <?php
                                        echo $_SESSION['email'];
                                        ?>
                                    </td>
                                </tr> -->
                                <?php
                                while ($row = mysqli_fetch_array($rs)) {
                                ?>
                                    <tr>
                                        <td>First name</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" class="form-control" name="fname" id="name" value="<?php echo $row['fname']; ?>" autocomplete="off" onkeyup="return Validstr1()" required pattern="[a-zA-Z]{3,30}" oninvalid="setCustomValidity('input is incorrect !!')" oninput="setCustomValidity('')" maxlength="30" onkeyup="return validation()">
                                        </td>

                                    </tr>
                                    <tr>
                                        <td><span id="msg" style="color:red;"> </span></td>
                                    </tr>

                                    <tr>
                                        <td>Last name</td>
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
                                        <td>Age</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" class="form-control" value="<?php echo $row['age']; ?> " rows="5" id="age" name="age" required required maxlength="30">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Gender</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" class="form-control" value="<?php echo $row['gender']; ?> " rows="5" id="gender" name="gender" required required maxlength="30">
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>Phone number</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" class="form-control" value="<?php echo $row['contact']; ?> " min="10" maxlength="10" id="contact" name="contact" required maxlength="10">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span id="msg2" style="color:red;"> </span></td>
                                    </tr>
                                    <td>State</td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" class="form-control" value="<?php echo $row['state']; ?> " min="10" maxlength="10" id="state" name="state" required maxlength="30">
                                    </td>
                                    </tr>
                                    <td>District</td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" class="form-control" value="<?php echo $row['district']; ?> " min="10" maxlength="10" id="district" name="district" required>
                                    </td>
                                    </tr>
                                    <td>Address:</td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" class="form-control" value="<?php echo $row['place']; ?> " min="10" maxlength="10" id="place" name="place" required>
                                    </td>
                                    </tr>
                                <?php
                                } ?>
                            </tbody>
                        </table>
                        <div>
                            <input type="submit" value="Update your account" id="btn" name="submit">
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