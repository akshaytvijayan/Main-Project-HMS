<!DOCTYPE html>
<?php
include('func.php');
include('newfunc.php');
$con = mysqli_connect("localhost", "root", "", "myhmsdb");
$demail = $_SESSION['demail'];
$sql = "select * from doctb where email='$demail'";
$rs = mysqli_query($con, $sql);
if (isset($_POST['submit'])) {
    $fname = $_POST['username'];
    $spec = $_POST['spec'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $contact = $_POST['contact'];
    $location = $_POST['location'];
    $docFee = $_POST['docfee'];
    $district = $_POST['district'];
    $place = $_POST['place'];
    $qualification = $_POST['qualification'];

    if (isset($_POST['availableDays']) && is_array($_POST['availableDays'])) {
        $availableDays = implode(',', $_POST['availableDays']); // Convert array to comma-separated string
    } else {
        // Retrieve existing available days from the database
        $sql = "SELECT avialabletime FROM doctb WHERE username='$doctor'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        $availableDays = $row['avialabletime']; // Use existing value if no days are selected
    }
    $experience = $_POST['experience'];

    $sql = "UPDATE doctb SET username='$fname',spec='$spec',email='$email',age='$age',contact='$contact',docFees='$docFee',district='$district',place='$place',qualification='$qualification',avialabletime='$availableDays',experience='$experience',location='$location' WHERE email='$demail'";

    if ($con->query($sql) === TRUE) {
        echo "<script>alert('Record updated successfully')
    window.location='editprofile1.php'</script>";
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
            .btn-outline-light:hover {
                color: #25bef7;
                background-color: #f8f9fa;
                border-color: #f8f9fa;
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
            table{
                width:100%;
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
        <h3 style="margin-left: 40%; padding-bottom: 20px;font-family:'IBM Plex Sans', sans-serif;"> Welcome &nbsp DR.
            <?php echo $_SESSION['demail'] ?>
        </h3>
        <div class="row">
            <div class="col-md-4" style="max-width:18%;margin-top: 3%;">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action " href="doctor-panel.php" data-toggle="list">Dashboard</a>
                    <a class="list-group-item list-group-item-action active" href="doctor-panel.php" aria-controls="home">Update Profile</a>
                    <a class="list-group-item list-group-item-action" href="doctor-panel.php" data-toggle="list" aria-controls="home">Appointments</a>
                    <a class="list-group-item list-group-item-action" href="doctor-panel.php" aria-controls="home">
                        Prescription List
                    </a>
                </div><br>
            </div>
            <div class="container">
                <h2 class="heading">DOCTOR PROFILE</h2>
                <div class="form-content" style="margin-top: 3%;">
                    <div class="tab-content" id="nav-tabContent">
                        <form name="myForm" method="POST" onsubmit="return validation();">

                            <table>
                                <tbody>
                                    <!-- <tr>
                                        <td>Name</td>
                                        <td>:</td>
                                        <td>
                                            <?php
                                            echo $_SESSION['dname'];
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
                                                <input type="text" class="form-control" name="spec" id="spec" value="<?php echo $row['spec']; ?> " autocomplete="off">
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
                                        </tr><br>
                                        <tr>
                                            <td>DOB</td>
                                            <td>:</td>
                                            <td>


                                                <input type="text" class="form-control" value="<?php echo $row['age']; ?> " id="age" name="age" required minlength="3" maxlength="4">


                                            </td>
                                        </tr>
                                        <br>
                                        <tr>
                                            <td>Phone Number</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control" value="<?php echo $row['contact']; ?> " min="10" maxlength="10" id="contact" name="contact" required maxlength="10">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span id="msg2" style="color:red;"> </span></td>
                                        </tr>
                                        <td>Doctor Fee</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" class="form-control" value="<?php echo $row['docFees']; ?> " id="docfee" name="docfee" required minlength="3" maxlength="4">
                                        </td>
                                        </tr>
                                        <td>Address</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" class="form-control" value="<?php echo $row['location']; ?> " id="location" name="location" required>
                                        </td>
                                        </tr>
                                        <td>District</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" class="form-control" value="<?php echo $row['district']; ?> " min="10" maxlength="10" id="district" name="district" required>
                                        </td>
                                        </tr>
                                        <td>State</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" class="form-control" value="<?php echo $row['place']; ?> " id="place" name="place" required>
                                        </td>
                                        </tr>
                                        <td>Qualification</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" class="form-control" value="<?php echo $row['qualification']; ?> " id=" qualification" name="qualification" required>
                                        </td>
                                        </tr>
                                        <td>Available Days</td>
                                        <td>:</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="<?php echo $row['avialabletime']; ?>" id="avialabletime" name="avialabletime" readonly>
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-outline-primary transparent-button" onclick="toggleEdit()">
                                                        <i class="bi bi-pencil-square"></i> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                        </svg>
                                                    </button>
                                                </span>
                                            </div>
                                            <!-- Checkbox group -->
                                            <div id="checkboxGroup" style="display: none;">
                                                <?php
                                                $daysOfWeek = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
                                                foreach ($daysOfWeek as $index => $day) {
                                                ?>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="<?= $day ?>" id="day<?= $index + 1 ?>" name="availableDays[]">
                                                        <label class="form-check-label" for="day<?= $index + 1 ?>">
                                                            <?= $day ?>
                                                        </label>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </td>
                                        </tr>
                                        <td>Experience</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" class="form-control" value="<?php echo $row['experience']; ?> " id="experience" name="experience" required>
                                        </td>
                                        </tr>
                                        <td>Resignation Date/Leave</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" class="form-control" value="<?php echo $row['resignDate']; ?> " id="resignDate" name="resignDate" readonly>
                                        </td>
                                        </tr>
                                    <?php
                                    } ?>
                                </tbody>
                            </table>
                            <br><br>
                            <div style="text-align: center;">
                                <input type="submit" class="btn-success" value="Submit" id="btn" name="submit">
                                <a href="doctor-panel.php" id="btn" class="btn btn-danger">Back</a>
                            </div>
                        </form>
                    </div>
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

    <script>
        function toggleEdit() {
            var checkboxGroup = document.getElementById('checkboxGroup');
            if (checkboxGroup.style.display === 'none') {
                checkboxGroup.style.display = 'block';
            } else {
                checkboxGroup.style.display = 'none';
            }
        }
    </script>

</body>

</html>