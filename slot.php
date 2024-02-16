<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = "myhmsdb";
$conn = mysqli_connect($servername, $username, $password, "$dbname");
if (!$conn) {
  die('Could not Connect MySql Server:' . mysql_error());
}

if (isset($_POST['submit'])) {

  $time = $_POST['time'];
  $sql = "INSERT INTO `slot` (`time`) VALUES ('$time')";
  $result = $conn->query($sql);
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
</style>

<body style="padding-top:50px;">
  <div class="container-fluid" style="margin-top:50px;">
    <h3 style="margin-left: 40%; padding-bottom: 20px;font-family: 'IBM Plex Sans', sans-serif;"> WELCOME ADMINISTRATOR </h3>
    <div class="row">
      <div class="col-md-4" style="max-width:25%;margin-top: 3%;">
        <div class="list-group" id="list-tab" role="tablist">
          <a class="list-group-item list-group-item-action" href="admin-panel1.php" href="#list-doc">Dashboard</a>

          <a class="list-group-item list-group-item-action " href="addstaf.php" href="#list-settings">Add Staff</a>
          <a class="list-group-item list-group-item-action" href="deletestaff.php" href="#list-settings">View all Staffs</a>
          <a class="list-group-item list-group-item-action " href="leave.php">leave approval</a>

          <a class="list-group-item list-group-item-action" href="admin-panel1.php" href="#list-settings">Add Doctor</a>
          <a class="list-group-item list-group-item-action " href="deletedoctor.php" href="#list-doc">View all Doctors</a>
          <a class="list-group-item list-group-item-action" href="admin-panel1.php" href="#list-pres">Prescription List</a>

          <a class="list-group-item list-group-item-action" href="deletepatient.php" href="#list-pat">View all Patient </a>
          <a class="list-group-item list-group-item-action" href="admin-panel1.php" href="#list-app">Appointment Details</a>

          <a class="list-group-item list-group-item-action" href="admin-panel1.php" href="#list-mes">Queries</a>
          <a class="list-group-item list-group-item-action active" href="slot.php">Add Slot</a>

        </div><br>
      </div>
      <div class="col-md-8" style="margin-top: 3%;">
        <div class="tab-content" id="nav-tabContent" style="width: 950px;">


          <center>
            <br>
            <br>
            <h2> ADD TIME SLOT </h2>

            <form method="post">
              <table class="styled-table">
                <thead>
                  <tr>
                    <th scope="col">Enter time slot</th>
                    <th scope="col"> &nbsp; &nbsp; &nbsp; &nbsp;<input type="time" class="form-control" name="time" required></th>
                  </tr>
                  <tr>
                    <th>
                      <input class="btn btn-primary" type="submit" value="Submit" name="submit">
                    </th>
                    <th></th>
                  </tr>
                </thead>

              </table>

            </form>
            <br>
            <br>


            <h2> AVALIABLE TIME SLOTS </h2>
            <table class="styled-table">
              <thead>
                <tr>
                  <th>TIME</th>
                  <th>ACTION</th>


                </tr>
              </thead>
              <tbody>
                <?php

                $sql = "select*from slot";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {



                  while ($row = $result->fetch_assoc()) {

                    $url2 = "deleteslot.php?id=" . $row['id'];


                    echo " <tr><td>" . $row['time'] . "</td>";
                    echo "<td><a href='$url2'>Delete</td></a></tr>";
                  }
                } else {
                  echo "0 results";
                }

                ?>
          </center>

          </tbody>
          </table>
          <br>


          <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
</body>

</html>