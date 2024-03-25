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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-vhF+Jfb6sibzliENWJKOC5VDSvT5gPvdlPR65RkdPc/y/BF0vGSvNkS+2MKwruqkJ1UqB8rMVyo1POJPr2Iy4g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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

    #builder th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #007bff;
        color: white;
    }

    /* Styles for the status switch */
    .status-switch {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .status-btn {
        padding: 5px 10px;
        cursor: pointer;
        border: none;
        border-radius: 5px;
    }

    .active {
        background-color: #82ff73;
        color: black;
    }

    .inactive {
        background-color: #ff341f;
        color: black;
    }
</style>


<body style="padding-top:50px;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> NEETHI HOSPITAL</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="logout1.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                </li>
            </ul>
        </div>
    </nav>
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
                    <a class="list-group-item list-group-item-action active" href="deletedoctor.php" href="#list-doc">View all Doctors</a>
                    <a class="list-group-item list-group-item-action" href="admin-panel1.php" href="#list-pres">Prescription List</a>

                    <a class="list-group-item list-group-item-action" href="deletepatient.php" href="#list-pat">View all Patient </a>
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
                                    VIEW ALL DOCTORS
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3"><br>
                                            <input type="text" id="searchInput" class="form-control" placeholder="Search...">
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <table id="builder" class="content-table">

                                                    <tr>
                                                        <th>Id</th>
                                                        <th> Name</th>&nbsp;&nbsp;
                                                        <th> Image</th>&nbsp;&nbsp;
                                                        <th> Specialization</th>&nbsp;&nbsp;
                                                        <!-- <th>Username</th>&nbsp;&nbsp; -->
                                                        <th>Email</th>
                                                        <th>Gender</th>
                                                        <!-- <th>Phone no</th>
                                                         <th>Address</th> 
                                                        <th>State</th>
                                                        <th>District</th>
                                                        <th>Fees</th> -->
                                                        <th>Status</th>
                                                        <th>Date of join</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    <?php
                                                    $s = 1;
                                                    $query = "SELECT * FROM doctb ORDER BY did DESC";
                                                    $result = mysqli_query($con, $query);
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        $did = $row['did'];
                                                        $dname = $row['name'];
                                                    ?>
                                                        <tr data-spec="<?php echo $row['spec']; ?>">
                                                            <td>
                                                                <?php echo $s; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row['name']; ?>
                                                            </td>
                                                            <td><img src="<?php echo "msg_img/" . $row['image']; ?>" width="50px" height="50px" alt=" Images" /></td>
                                                            <td>
                                                                <?php echo $row['spec']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row['email']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row['gender']; ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $status = $row['status'];
                                                                $button_class = ($status == 'active') ? 'btn-success' : 'btn-danger';
                                                                ?>
                                                                <div class="status-switch">
                                                                    <form action="inactive.php" method="GET" onsubmit="return confirmStatusChange(<?php echo $did; ?>, '<?php echo $status; ?>')">
                                                                        <input type="hidden" id="did_<?php echo $did; ?>" name="did" value="<?php echo $did ?>">
                                                                        <input type="hidden" name="dname" value="<?php echo $dname; ?>">
                                                                        <button type="submit" class="btn <?php echo $button_class; ?>">
                                                                            <i class="fa fa-pen"></i>
                                                                            <input type="hidden" id="status_<?php echo $did; ?>" name="status" value="<?php echo $status ?>">
                                                                            <?php echo $status; ?>
                                                                        </button>
                                                                        <input type="hidden" id="reason_<?php echo $did; ?>" name="reason">
                                                                    </form>
                                                                </div>
                                                            </td>
                                                            <script>
                                                                function confirmStatusChange(did, status) {
                                                                    alert("ID: " + did + ", Status: " + status); 
                                                                    var reasonInput = document.getElementById('reason_' + did);
                                                                    var statusInput = document.getElementById('status_' + did);

                                                                    if (status === 'active') {
                                                                        var reason = prompt('Please provide a reason for changing status to inactive:');
                                                                        if (reason !== null) {
                                                                            reasonInput.value = reason;
                                                                            return true; // Continue with the form submission
                                                                        } else {
                                                                            return false; // Cancel the form submission
                                                                        }
                                                                    } else {
                                                                        reasonInput.value = '';
                                                                        return true; // Continue with the form submission
                                                                    }
                                                                }
                                                            </script>

                                                            <!-- <script>
                                                                function confirmStatusChange(did, status) {
                                                                    // alert("hi?")
                                                                    alert("ID: " + did + ", Status: " + status);                                                                    // var id=document.getElementById('did').value;
                                                                    // // alert(id);
                                                                    // var status=document.getElementById('status').value;
                                                                    // alert(status);
                                                                    if (status == 'active') {
                                                                        var reason = prompt('Please provide a reason for changing status to inactive:');
                                                                        // if (reason != null) {
                                                                        alert(reason);
                                                                        document.getElementById('reason').value = reason;
                                                                        document.getElementById('did').value = did;
                                                                        return true; // Continue with the link click
                                                                    }
                                                                    // return true; // Continue with the link click for other cases
                                                                }
                                                            </script> -->



                                                            <td>
                                                                <?php echo $row['joiningDate']; ?>
                                                            </td>


                                                            <td>
                                                                <form action="" method="POST">
                                                                    <input type="hidden" name="id" value="<?php echo $row['did']; ?>" />
                                                                    <!-- <button type="submit" name="delete" class="btn btn-danger" onclick="return confirm('Do you really want to delete?')">Delete</button> -->
                                                                    <!-- <a href="docviewmore.php"> class="btn btn-success"> -->
                                                                    <a href="docviewmore.php?did=<?php echo $did; ?>&dname=<?php echo $dname; ?>">
                                                                        <button type="button" class="btn btn-primary">
                                                                            <i class="fa fa-pen"></i> View More
                                                                        </button>
                                                                    </a>
                                                                </form>
                                                            </td>
                                                        </tr>

                                                    <?php
                                                    $s++;
                                                    }
                                                    ?>
                                                </table>
                                    </div>
                                    <?php

                                    if (isset($_POST['delete'])) {
                                        $id = $_POST['id'];
                                        $select = "DELETE FROM  doctb  WHERE did='$id'";
                                        $result = mysqli_query($con, $select);
                                        echo '<script type="text/javascript">';
                                        echo 'window.location.href= "deletedoctor.php";';
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
            </div>
        </div>




        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>

        <!-- Search functionality -->
        <script>
            $(document).ready(function() {
                $("#searchInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#builder tbody tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>

        <script>
            document.getElementById('spec').onchange = function foo() {
                let spec = this.value;
                console.log(spec)
                let docs = [...document.getElementById('doctor').options];

                docs.forEach((el, ind, arr) => {
                    arr[ind].setAttribute("style", "");
                    if (el.getAttribute("data-spec") != spec) {
                        arr[ind].setAttribute("style", "display: none");
                    }
                });
            };
        </script>



        <!-- active and inactive -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $(".status-btn").click(function() {
                    // Toggle the 'active' class
                    $(this).toggleClass("active inactive");

                    // Toggle the text between 'Active' and 'Inactive'
                    var newText = $(this).text() === "Active" ? "Inactive" : "Active";
                    $(this).text(newText);

                    // Add your logic to handle the state change here
                });
            });
        </script>





</body>

</html>