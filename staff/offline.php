<?php
include('../func1.php');
$con = mysqli_connect("localhost", "root", "", "myhmsdb");
$doctor = $_SESSION['username'];
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
  <style>
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

    button:hover {
      cursor: pointer;
    }

    #inputbtn:hover {
      cursor: pointer;
    }
  </style>

</head>


<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> NEETHI Hospital </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="../logout1.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
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

  <div class="container-fluid" style="margin-top:100px;">
    <div class="text-center">
      <h3 style="font-family:'IBM Plex Sans', sans-serif;"> Welcome &nbsp
        <?php echo $doctor ?>
      </h3>
    </div>
    <div class="row">
      <div class="col-md-4" style="max-width:18%;margin-top: 3%;">
        <div class="list-group" id="list-tab" role="tablist">
          <a class="list-group-item list-group-item-action " id="list-dash-list" data-toggle="list" href="#list-dash" role="tab" aria-controls="home">Dashboard</a>
          <a class="list-group-item list-group-item-action" href="viewprofile.php" href="#list-doc">Profile</a>
          <a class="list-group-item list-group-item-action " href="changepassstaff.php">Change Password</a>
          <a class="list-group-item list-group-item-action " href="ofine.php" href="#list-doc">Offline Appointment</a>
          <a class="list-group-item list-group-item-action active " href="offline.php" href="#list-doc">View Offline Appointment</a>
          <a class="list-group-item list-group-item-action " href="leave.php" href="#list-doc">Leave Application</a>
          <a class="list-group-item list-group-item-action " href="viewleave.php">View Leave Application</a>

        </div>
      </div>
      <div class="col-md-8 mt-5">
        <div class="tab-content mt-5" id="nav-tabContent" style="width: 950px;">
          <div class="tab-pane fade show active" id="list-dash" role="tabpanel" aria-labelledby="list-dash-list">

            <div class="container-fluid container-fullw bg-white">
              <div class="row">

                <table class="table table-hover">
                  <thead>
                    <tr>

                      <th scope="col">Apppointment ID</th>

                      <th scope="col">Patient Name</th>
                      <th scope="col">Age</th>
                      <th scope="col">Address</th>
                      <th scope="col">Phone Number</th>
                      <th scope="col">Appointment Date</th>
                      <th scope="col">Registered Date & Time</th>
                      <th scope="col">Patient Added_by</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    $con = mysqli_connect("localhost", "root", "", "myhmsdb");
                    global $con;

                    $query = "SELECT * FROM offline_appointments WHERE added_by='$doctor' ORDER BY date";

                    $result = mysqli_query($con, $query);
                    if (!$result) {
                      echo mysqli_error($con);
                    }


                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                      <tr class="text-center">
                        <td>
                          <?php echo $row['AppoID']; ?>
                        </td>
                        <td>
                          <?php echo $row['patname']; ?>
                        </td>
                        <td>
                          <?php echo $row['patage']; ?>
                        </td>
                        <td>
                          <?php echo $row['patwork']; ?>
                        </td>
                        <td>
                          <?php echo $row['contact']; ?>
                        </td>
                        <td>
                          <?php echo $row['date']; ?>
                        </td>

                        <td>
                          <?php echo $row['created_at']; ?>
                        </td>
                        <td>
                          <?php echo $row['added_by']; ?>
                        </td>
                      </tr>
                    <?php }
                    ?>
                  </tbody>
                </table>
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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
</body>

</html>