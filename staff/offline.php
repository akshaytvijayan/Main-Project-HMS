<!DOCTYPE html>
<?php
include('func.php');
include('newfunc.php');
$con = mysqli_connect("localhost", "root", "", "myhmsdb");
$pid = $_SESSION['pid'];
$username = $_SESSION['username'];
$email = $_SESSION['email'];
$fname = $_SESSION['fname'];
$gender = $_SESSION['gender'];
$lname = $_SESSION['lname'];
$contact = $_SESSION['contact'];


if(isset($_POST['app-submit'])) {
  $pid = $_SESSION[''];
  $username = $_SESSION['username'];
  $email = $_SESSION['email'];
  $fname = $_SESSION['fname'];
  $lname = $_SESSION['lname'];
  $gender = $_SESSION['gender'];
  $contact = $_SESSION['contact'];
  $doctor = $_POST['doctor'];
  $email = $_SESSION['email'];
  $docFees = $_POST['docFees'];

  $appdate = $_POST['appdate'];
  $apptime = $_POST['apptime'];
  $cur_date = date("Y-m-d");
  date_default_timezone_set('Asia/Kolkata');
  $cur_time = date("H:i:s");
  $apptime1 = strtotime($apptime);
  $appdate1 = strtotime($appdate);

  if(date("Y-m-d", $appdate1) >= $cur_date) {
    if((date("Y-m-d", $appdate1) == $cur_date and date("H:i:s", $apptime1) > $cur_time) or date("Y-m-d", $appdate1) > $cur_date) {
      $check_query = mysqli_query($con, "select apptime from appointmenttb where doctor='$doctor' and appdate='$appdate' and apptime='$apptime'");

      if(mysqli_num_rows($check_query) == 0) {

       $result = "insert into offappointmenttb(pid,fname,lname,gender,email,contact,doctor,docFees,appdate,apptime,userStatus,doctorStatus) values('$pid','$fname','$lname','$gender','$email','$contact','$doctor','$docFees','$appdate','$apptime','1','1')";
           $query = mysqli_query($con,$result);
        if($query) {
          echo "<script>alert('Your appointment successfully booked');</script>";
        } else {
          echo "<script>alert('Unable to process your request. Please try again!');</script>";
        }
      } else {
        echo "<script>alert('We are sorry to inform that the doctor is not available in this time or date. Please choose different time or date!');</script>";
      }
    } else {
      echo "<script>alert('Select a time or date in the future!');</script>";
    }
  } else {
    echo "<script>alert('Select a time or date in the future!');</script>";
  }
}

if(isset($_GET['cancel'])) {
  $query = mysqli_query($con, "update appointmenttb set userStatus='0' where ID = '".$_GET['ID']."'");
  if($query) {
    echo "<script>alert('Your appointment successfully cancelled');</script>";
  }
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
        integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Other meta tags, stylesheets, etc. -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
        integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>NEETHI HOSPITAL</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                    <a class="nav-link" href="../logout1.php"><i class="fa fa-sign-out"
                            aria-hidden="true"></i>Logout</a>
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
<style>
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

    textarea,
    select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=date],
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
        width: 100%;
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

    /* div
 {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
} */
</style>

<body style="padding-top:50px;">
    <div class="container-fluid" style="margin-top:50px;">
        <h3 style="margin-left: 40%;  padding-bottom: 20px; font-family: 'IBM Plex Sans', sans-serif;"> Welcome &nbsp
            <?php echo $username ?>
        </h3>
        <div class="row">
            <div class="col-md-4" style="max-width:25%;margin-top: 3%;">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action " href="admin-panel3.php" href="#list-dash"
                        role="tab" aria-controls="home">Dashboard</a>
                    <a class="list-group-item list-group-item-action " href="viewprofile.php"
                        href="#list-doc">profile</a>
                    <a class="list-group-item list-group-item-action active" href="leave.php" href="#list-doc">leave
                        apply</a>
                    <a class="list-group-item list-group-item-action " href="ofine.php" href="#list-doc">Offline
                        booking</a>


                </div><br>
            </div>
            <div class="col-md-8" style="margin-top: 3%;">
                <div class="tab-content" id="nav-tabContent" style="width: 950px;">
                    <div class="container-fluid">
                        <div class="xs">
                            <div class="container-fluid">
                                <div class="card">
                                    <div class="card-body">
                                        <center>
                                            <h4>Create an appointment</h4>
                                        </center><br>
                                        <form class="form-group" method="post" action="admin-panel.php">
                                            <div class="row">

                                                <!-- <?php

                                                $con = mysqli_connect("localhost", "root", "", "myhmsdb");
                                                $query = mysqli_query($con, "select username,spec from doctb");
                                                $docarray = array();
                                                while ($row = mysqli_fetch_assoc($query)) {
                                                    $docarray[] = $row;
                                                }
                                                echo json_encode($docarray);

                                                ?> -->


                                                <div class="col-md-4">
                                                    <label for="spec">Specialization:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <select name="spec" class="form-control" id="spec">
                                                        <option value="" disabled selected>Select Specialization
                                                        </option>
                                                        <?php
                                                        display_specs();
                                                        ?>
                                                    </select>
                                                </div>

                                                <br><br>

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

                                                <div class="col-md-4"><label for="doctor">Doctors:</label></div>
                                                <div class="col-md-8">
                                                    <select name="doctor" class="form-control" id="doctor"
                                                        required="required">
                                                        <option value="" disabled selected>Select Doctor</option>

                                                        <?php display_docs(); ?>
                                                    </select>
                                                </div><br /><br />


                                                <script>
                                                    document.getElementById('doctor').onchange = function updateFees(e) {
                                                        var selection = document.querySelector(`[value=${this.value}]`).getAttribute('data-value');
                                                        document.getElementById('docFees').value = selection;
                                                    };
                                                </script>





                                                <!-- <div class="col-md-4"><label for="doctor">Doctors:</label></div>
                                <div class="col-md-8">
                                    <select name="doctor" class="form-control" id="doctor1" required="required">
                                      <option value="" disabled selected>Select Doctor</option>
                                      
                                    </select>
                                </div>
                                <br><br> -->

                                                <!-- <script>
                                  document.getElementById("spec").onchange = function updateSpecs(event) {
                                      var selected = document.querySelector(`[data-value=${this.value}]`).getAttribute("value");
                                      console.log(selected);

                                      var options = document.getElementById("doctor1").querySelectorAll("option");

                                      for (i = 0; i < options.length; i++) {
                                        var currentOption = options[i];
                                        var category = options[i].getAttribute("data-spec");

                                        if (category == selected) {
                                          currentOption.style.display = "block";
                                        } else {
                                          currentOption.style.display = "none";
                                        }
                                      }
                                    }
                                </script> -->


                                                <!-- <script>
                    let data = 
                
              document.getElementById('spec').onchange = function updateSpecs(e) {
                let values = data.filter(obj => obj.spec == this.value).map(o => o.username);   
                document.getElementById('doctor1').value = document.querySelector(`[value=${values}]`).getAttribute('data-value');
              };
            </script> -->



                                                <div class="col-md-4"><label for="consultancyfees">
                                                        Consultancy Fees
                                                    </label></div>
                                                <div class="col-md-8">
                                                    <!-- <div id="docFees">Select a doctor</div> -->
                                                    <input class="form-control" type="text" name="docFees" id="docFees"
                                                        readonly="readonly" />
                                                </div><br><br>

                                                <div class="col-md-4"><label>Appointment Date</label></div>
                                                <div class="col-md-8"><input type="date" class="form-control datepicker"
                                                        name="appdate">
                                                </div><br><br>

                                                <div class="col-md-4"><label>Appointment Time</label></div>
                                                <div class="col-md-8">
                                                    <!-- <input type="time" class="form-control" name="apptime"> -->
                                                    <select name="apptime" class="form-control" id="apptime"
                                                        required="required">
                                                        <option value="" disabled selected>Select Time</option>
                                                        <?php

                                                        $sql = "select*from slot";
                                                        $result = $con->query($sql);

                                                        while ($row = $result->fetch_assoc()) {
                                                            ?>
                                                            <option value="<?php echo $row['time'] ?>">
                                                                <?php echo $row['time'] ?>
                                                            </option>

                                                            <?php

                                                        }
                                                        ?>
                                                    </select>

                                                </div><br><br>
                                                </script>
                                                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                                                    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
                                                    crossorigin="anonymous"></script>
                                                <script
                                                    src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
                                                    integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
                                                    crossorigin="anonymous"></script>
                                                <script
                                                    src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
                                                    integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
                                                    crossorigin="anonymous"></script>
                                                <script
                                                    src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
</body>

</html>