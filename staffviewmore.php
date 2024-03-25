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
$staff_id = $_GET['sid'];
$fname = $_GET['fname'];

if (isset($_POST['submit'])) {
    // $fname = $_POST['fname'];
    // $lname = $_POST['lname'];
    // $email = $_POST['email'];
    // $age = $_POST['age'];
    // $phone = $_POST['contact'];
    // $state = $_POST['state'];
    // $district = $_POST['district'];
    // $location = $_POST['location'];
    // $qualification = $_POST['qualification'];
    // $experience = $_POST['experience'];
    $SresignDate = $_POST['SresignDate'];


    $sql = "UPDATE staffdb SET SresignDate='$SresignDate' WHERE staff_id='$staff_id'";

    if ($con->query($sql) === TRUE) {
        echo "<script>alert('Record updated successfully');
        window.location='deletestaff.php'</script>";
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

            h2 {
                text-align: center;
                margin-bottom: 30px;
                color: green !important;
                font-weight: bold;
            }



            .btn-outline-light:hover {
                color: #25bef7;
                background-color: #f8f9fa;
                border-color: #f8f9fa;
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
        <h3 style="margin-left: 40%; padding-bottom: 20px;font-family:'IBM Plex Sans', sans-serif;"> Welcome &nbsp
            <?php echo ucfirst($fname); ?>
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
                                    $sql = "select * from staffdb where staff_id='$staff_id'";
                                    $rs = mysqli_query($con, $sql);
                                    while ($row = mysqli_fetch_array($rs)) {
                                        $status = $row['status'];
                                    ?>
                                        <tr>
                                            <div style="text-align: center;">
                                                <img src="<?php echo "msg_img/" . $row['proof']; ?>" width="100px" height="100px" alt="Image">
                                            </div><br>
                                            <td>First Name</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control" name="fname" id="fname" value="<?php echo $row['fname']; ?>" autocomplete="off" onkeyup="return Validstr1()" required pattern="[a-zA-Z]{3,30}" oninvalid="setCustomValidity('input is incorrect !!')" oninput="setCustomValidity('')" onkeyup="return validation()" readonly>
                                            </td>

                                        </tr>
                                        <tr>

                                            <td>Last Name</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control" name="lname" id="lname" value="<?php echo $row['lname']; ?>" autocomplete="off" onkeyup="return Validstr1()" required pattern="[a-zA-Z]{3,30}" oninvalid="setCustomValidity('input is incorrect !!')" oninput="setCustomValidity('')" onkeyup="return validation()" readonly>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td><span id="msg" style="color:red;"> </span></td>
                                        </tr>

                                        <tr>
                                            <td>Gender</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control" name="gender" id="gender" value="<?php echo $row['gender']; ?> " autocomplete="off" readonly>
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
                                                <input type="text" class="form-control" value="<?php echo $row['phone']; ?> " min="10" maxlength="10" id="contact" name="contact" required maxlength="10" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span id="msg2" style="color:red;"> </span></td>
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
                                            <input type="text" class="form-control" value="<?php echo $row['state']; ?> " id="state" name="state" readonly>
                                        </td>
                                        </tr>
                                        <td>Qualification</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" class="form-control" value="<?php echo $row['qualification']; ?> " id=" qualification" name="qualification" readonly>
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
                                            <input type="text" class="form-control" value="<?php echo $row['sregdate']; ?> " id="joiningDate" name="joiningDate" readonly>
                                        </td>
                                        </tr>
                                        <?php
                                        if ($status == "inactive") {
                                        ?>
                                            <td>Status Description </td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control" value="<?php echo $row['inactiveReasonS']; ?> " id="inactiveReasonS" name="inactiveReasonS" readonly>
                                            </td>
                                            </tr>

                                            <td>Resignation Date/Leave</td>
                                            <td>:</td>
                                            <td>
                                                <input type="date" class="form-control" value="<?php echo $row['SresignDate']; ?> " id="SresignDate" name="SresignDate" required>
                                                <br><br>
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-primary btn-lg" name="submit">Submit</button>
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