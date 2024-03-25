<html lang="en">
<?php
include('func.php');
include('newfunc.php');
$con = mysqli_connect("localhost", "root", "", "myhmsdb");
$username = $_SESSION['username'];
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
                    <a class="list-group-item list-group-item-action" href="admin-panel.php" role="tab" aria-controls="home">Book Appointment</a>
                    <a class="list-group-item list-group-item-action active" href="offlineappoinment.php">Available Doctors</a>
                    <a class="list-group-item list-group-item-action" href="admin-panel.php" aria-controls="home">Appointment History</a>
                    <a class="list-group-item list-group-item-action" href="admin-panel.php" role="tab" data-toggle="list" aria-controls="home">Prescriptions</a>
                </div><br>
            </div>

            <div class="col-md-8">
                <!-- Sorting search bar -->
                <div class="input-group mb-3">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search by specialization" aria-label="Search by specialization" aria-describedby="searchButton">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button" id="searchButton">Search</button>
                    </div>
                </div>
                <!-- Doctor cards -->
                <div class="container">
                    <div class="row doctor-rows-list" id="doctorRowsList">
                        <?php
                        $query = "SELECT * FROM doctb WHERE status='active' ORDER BY did ASC";
                        $result = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <div class="col-md-5 doctor-card shadow-lg">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <div style="text-align: center" ;>
                                                <img src=" <?php echo "msg_img/" . $row['image']; ?>" width="100px" height="100px" alt="Image">
                                            </div><br>
                                            <th scope="col">Name</th>
                                            <td><input class="form-control" readonly type="text" value="<?php echo $row['username']; ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Specialization</th>
                                            <td><input class="form-control" readonly type="text" value="<?php echo $row['spec']; ?>"></td>

                                        </tr>
                                        <tr>
                                            <th scope="col">Consulting days</th>
                                            <td><input class="form-control" readonly type="text" value="<?php echo $row['avialabletime']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Availability Status</th>
                                            <td>
                                                <input class="form-control" readonly type="text" value="<?php echo strtoupper($row['status']); ?>" style="background-color: <?php echo ($row['status'] == 'active') ? 'green; color: white; font-weight: bold; text-align: center;' : (($row['status'] == 'your_desired_status') ? 'blue; color: white; font-weight: bold; text-align: center;' : 'red; color: white; font-weight: bold; text-align: center;'); ?> text-transform: uppercase;">
                                            </td>
                                        </tr>
                                        <tr class="text-center">
                                            <td colspan="2">
                                                <hr>
                                                <form action="next_page.php" method="POST">
                                                    <input type="hidden" name="did" value="<?php echo $row['did']; ?>">
                                                    <input class="btn btn-primary" type="submit" value="view profile">
                                                </form>
                                            </td>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br>
    <script>
        // JavaScript for sorting search bar
        $(document).ready(function() {
            $("#searchButton").click(function() {
                var value = $("#searchInput").val().toLowerCase();
                $("#doctorRowsList .doctor-card").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
</body>

</html>