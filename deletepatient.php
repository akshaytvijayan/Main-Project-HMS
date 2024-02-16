<!DOCTYPE html>
<?php
$con = mysqli_connect("localhost", "root", "", "myhmsdb");

include('newfunc.php');

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
                    <a class="nav-link" href="logout1.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
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

    #builder {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #builder td,
    #builder th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    /* #builder tr:nth-child(even){background-color: #f2f2f2;} */

    #builder tr:hover {
        background-color: #ddd;
    }

    #builder th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: grey;
        color: white;
    }

    /* Style for the panel heading */
    .panel-heading {
        background-color: #007bff;
        /* Blue background color */
        color: #ffffff;
        /* White text color */
        padding: 10px;
        /* Add padding around the text */
        font-size: 20px;
        /* Increase font size */
        font-weight: bold;
        /* Make text bold */
        border-radius: 5px 5px 0 0;
        /* Add rounded corners to the top */
    }
</style>


<body style="padding-top:50px;">
    <div class="container-fluid" style="margin-top:50px;">
        <h3 style="margin-left: 40%; padding-bottom: 20px;font-family: 'IBM Plex Sans', sans-serif;"> WELCOME
            ADMINISTRATOR </h3>
        <div class="row">
            <div class="col-md-4" style="max-width:25%;margin-top: 3%;">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action" href="admin-panel1.php" href="#list-doc">Dashboard</a>

                    <a class="list-group-item list-group-item-action " href="addstaf.php" href="#list-settings">Add Staff</a>
                    <a class="list-group-item list-group-item-action " href="deletestaff.php" href="#list-settings">View all Staffs</a>
                    <a class="list-group-item list-group-item-action" href="leave.php">leave approval</a>

                    <a class="list-group-item list-group-item-action" href="admin-panel1.php" href="#list-settings">Add Doctor</a>
                    <a class="list-group-item list-group-item-action " href="deletedoctor.php" href="#list-doc">View all Doctors</a>
                    <a class="list-group-item list-group-item-action" href="admin-panel1.php" href="#list-pres">Prescription List</a>

                    <a class="list-group-item list-group-item-action active" href="deletepatient.php" href="#list-pat">View all Patient </a>
                    <a class="list-group-item list-group-item-action" href="admin-panel1.php" href="#list-app">Appointment Details</a>

                    <a class="list-group-item list-group-item-action" href="admin-panel1.php" href="#list-mes">Queries</a>
                    <a class="list-group-item list-group-item-action" href="slot.php">Add Slot</a>

                </div><br>
            </div>
            <div class="col-md-8" style="margin-top: 3%;">
                <div class="tab-content" id="nav-tabContent" style="width: 1100px;">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    VIEW ALL PATIENTS
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <table id="builder" class="content-table">

                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Name</th>&nbsp;&nbsp;
                                                        <th>Age</th>
                                                        <th>Email</th>
                                                        <th>Gender</th>
                                                        <th>Phone no</th>
                                                        <th>Address</th>
                                                        <th>District</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                    <?php
                                                    $s = 1;
                                                    $query = "SELECT * FROM patreg ORDER BY pid ASC";
                                                    $result = mysqli_query($con, $query);
                                                    while ($row = mysqli_fetch_array($result)) {
                                                    ?>


                                                        <tr>
                                                            <td>
                                                                <?php echo $s++; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row['fname']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row['age']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row['email']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row['gender']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row['contact']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row['place']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row['district']; ?>
                                                            </td>



                                                            <td>
                                                                <form action="" method="POST">
                                                                    <input type="hidden" name="id" value="<?php echo $row['pid']; ?>" />
                                                                    <button type="submit" name="delete" class="btn btn-danger" onclick="return confirm('Do you really want to delete?')">Delete</button>
                                                                </form>
                                                            </td>
                                                        </tr>

                                                    <?php
                                                    }
                                                    ?>
                                                </table>
                                    </div>
                                    <?php

                                    if (isset($_POST['delete'])) {
                                        $id = $_POST['id'];
                                        $select = "DELETE FROM  patreg  WHERE pid='$id'";
                                        $result = mysqli_query($con, $select);
                                        echo '<script type="text/javascript">';
                                        echo 'window.location.href= "deletepatient.php";';
                                        echo ' alert("deleted")';
                                        echo '</script>';
                                    }
                                    ?>

                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- End  Basic Table  -->
                    </div>
                </div>




                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
</body>

</html>