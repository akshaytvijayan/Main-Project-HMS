<!DOCTYPE html>
<script type="text/javascript">
    window.history.forward(); // Disable back button
    window.onload = function() {
        // Display warning message
        if (window.history && window.history.pushState) {
            window.history.pushState('forward', null, '');
            $(window).on('popstate', function() {
                alert('Back button is disabled.');
                window.history.pushState('forward', null, '');
            });
        }
    };
</script>
<?php
include('func.php');
include('newfunc.php');
$con = mysqli_connect("localhost", "root", "", "myhmsdb");
// $doctor = $_SESSION['dname'];
$did = $_GET['did'];
$demail = $_GET['demail'];

if (isset($_POST['submit'])) {
    $fname = $_POST['username'];
    $spec = $_POST['spec'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $contact = $_POST['contact'];
    $docFee = $_POST['docfee'];
    $location = $_POST['location'];
    $district = $_POST['district'];
    $place = $_POST['place'];
    $qualification = $_POST['qualification'];
    $avialabletime = $_POST['avialabletime'];
    $experience = $_POST['experience'];
    $resignDate = $_POST['resignDate'];

    $sql = "UPDATE doctb SET username='$fname',spec='$spec',email='$email',age='$age',contact='$contact',docFees='$docFee',district='$district',place='$place',qualification='$qualification',location='$location',avialabletime='$avialabletime',experience='$experience',resignDate='$resignDate' WHERE email='$demail'";

    if ($con->query($sql) === TRUE) {
        echo "<script>alert('Record updated successfully')
    window.location='deletedoctor.php'</script>";
    } else {
        echo "Error updating record: " . $con->error;
    }
}

?>
<html lang="en">

<head>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> NEETHI Hospital </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <style>
            button:hover {
                cursor: pointer;
            }

            #inputbtn:hover {
                cursor: pointer;
            }

            .btn-outline-light:hover {
                color: #25bef7;
                background-color: #f8f9fa;
                border-color: #f8f9fa;
            }

            h2 {
                text-align: center;
                margin-bottom: 30px;
                color: green !important;
                font-weight: bold;
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

            .btn-success {
                text-align: center;
                padding: 10px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
                width: 25%;
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
            <form class="form-inline my-2 my-lg-0" method="post" action="search.php">
                <input class="form-control mr-sm-2" type="text" placeholder="Enter contact number" aria-label="Search" name="contact">
                <input type="submit" class="btn btn-outline-light" id="inputbtn" name="search_submit" value="Search">
            </form>
        </div>
    </nav>
</head>



<body style="padding-top:50px;">
    <div class="container-fluid" style="margin-top:50px;">
        <h3 style="margin-left: 40%; padding-bottom: 20px;font-family:'IBM Plex Sans', sans-serif;"> Welcome &nbsp DR.
            <?php echo $demail; ?>
        </h3>
        <div class="row justify-content-center">
            <div class="col-md-8" style="margin-top: 3%;">
                <div class="card">
                    <div class="card-body">
                        <form name="" method="POST">
                            <table class="table">
                                <tbody>
                                    <h2 class="heading">VIEW PROFILE</h2>
                                    <?php
                                    $sqll = "select * from doctb where did='$did'";
                                    $rs = mysqli_query($con, $sqll);
                                    while ($row = mysqli_fetch_array($rs)) {
                                        $status = $row['status'];
                                    ?>
                                        <tr>
                                            <div style="text-align: center;">
                                                <img src="<?php echo "msg_img/" . $row['image']; ?>" width="100px" height="100px" alt="Image">
                                            </div><br>
                                            <td>First name</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control" name="username" id="username" value="<?php echo $row['username']; ?>" autocomplete="off" onkeyup="return Validstr1()" required pattern="[a-zA-Z]{3,30}" oninvalid="setCustomValidity('input is incorrect !!')" oninput="setCustomValidity('')" onkeyup="return validation()" readonly>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td><span id="msg" style="color:red;"> </span></td>
                                        </tr>

                                        <tr>
                                            <td>Specification</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control" name="spec" id="spec" value="<?php echo $row['spec']; ?> " autocomplete="off" readonly>
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
                                                <input type="text" class="form-control" value="<?php echo $row['age']; ?> " rows="5" id="age" name="age" required maxlength="30" readonly>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Phone Number</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control" value="<?php echo $row['contact']; ?> " min="10" maxlength="10" id="contact" name="contact" required maxlength="10" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span id="msg2" style="color:red;"> </span></td>
                                        </tr>
                                        <td>Doctor Fee</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" class="form-control" value="<?php echo $row['docFees']; ?> " id="docfee" name="docfee" maxlength="30" readonly>
                                        </td>
                                        </tr>
                                        <td>Address</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" class="form-control" value="<?php echo $row['location']; ?> " id="location" name="location" readonly>
                                        </td>
                                        </tr>
                                        <td>District</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" class="form-control" value="<?php echo $row['district']; ?> " min="10" maxlength="10" id="district" name="district" readonly>
                                        </td>
                                        </tr>
                                        <td>State</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" class="form-control" value="<?php echo $row['place']; ?> " id="place" name="place" readonly>
                                        </td>
                                        </tr>
                                        <td>Qualification</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" class="form-control" value="<?php echo $row['qualification']; ?> " id=" qualification" name="qualification" readonly>
                                        </td>
                                        </tr>
                                        <td>Available Days</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" class="form-control" value="<?php echo $row['avialabletime']; ?> " id="avialabletime" name="avialabletime" readonly>
                                        </td>
                                        </tr>
                                        <td>Experience</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" class="form-control" value="<?php echo $row['experience']; ?> " id="experience" name="experience" readonly>
                                        </td>
                                        </tr>

                                        <td>Appointment Date and Time</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" class="form-control" value="<?php echo $row['joiningDate']; ?> " id="joiningDate" name="joiningDate" readonly>
                                        </td>
                                        </tr>
                                        <?php
                                        if ($status == "inactive") {
                                        ?>
                                            <td>Status Description </td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control" value="<?php echo $row['inactiveReason']; ?> " id="inactiveReason" name="inactiveReason" readonly>
                                            </td>
                                            </tr>

                                            <td>Resignation/Leave Date</td>
                                            <td>:</td>
                                            <td>
                                                <input type="date" class="form-control" value="<?php echo $row['resignDate']; ?> " id="resignDate" name="resignDate" required>
                                                <br><br>
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-primary btn-lg" name="submit">Update Profile</button>
                                                    <button type="reset" class="btn btn-secondary btn-lg" name="reset">Reset</button>

                                                </div>
                                            </td>
                                        <?php }
                                        ?>
                                        </tr>
                                    <?php
                                    } ?>
                            </table>

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