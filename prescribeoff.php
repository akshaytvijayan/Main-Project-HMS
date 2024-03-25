<!DOCTYPE html>
<?php
include('func1.php');
$pid = $_GET['offid'];
$ID = $_GET['ID'];
$appdate = $_GET['date'];
$user_date = $_GET['created_at'];
$fname = $_GET['patname'];
$doctor = $_GET['docname'];

if (isset($_GET['offid']) && isset($_GET['ID']) && ($_GET['date']) && isset($_GET['created_at']) && isset($_GET['patname']) && isset($_GET['docname'])) {
  $pid = $_GET['offid'];
  $ID = $_GET['ID'];
  $appdate = $_GET['date'];
  $user_date = $_GET['created_at'];
  $patname = $_GET['patname'];
}



if (isset($_POST['prescribe'])) {
  // Fetching values from $_POST
  $appdate = $_POST['appdate'];
  $apptime = $_POST['user_date'];
  $disease = $_POST['disease'];
  $allergy = $_POST['allergies'];
  $patname = $_POST['fname'];
  $ID = $_POST['ID'];
  $M_count = $_POST['M_count']; // Get the count of medicines

  // // Alerting the values
  echo "<script>";
  echo "alert('Appointment Date: " . $appdate . "\\nAppointment Time: " . $apptime . "\\nDisease: " . $disease . "\\nAllergies: " . $allergy . "\\nFirst Name: " . $fname . "\\nPatient ID: " . $pid . "\\nID: " . $ID . "');";
  echo "</script>";
  $result = "INSERT INTO `prestb2`(`doctor`, `offid`, `ID`, `patname`,`date`, `created_at`, `disease`, `allergy`) VALUES  ('$doctor','$pid','$ID','$patname','$appdate','$user_date','$disease','$allergy')";
  $query = mysqli_query($con, $result);
  if ($query) {
    $prestb_id = mysqli_insert_id($con);
    // echo "<script>alert('Prescribed successfully!');</script>";
    // Loop through the submitted values based on the count
    $flag = 0;
    for ($i = 1; $i <= $M_count; $i++) {

      $M_qty = $_POST['M_qty' . $i];
      // $M_type = $_POST['M_type' . $i];
      $med_name = $_POST['med_name' . $i];
      $med_type = $_POST['med_type' . $i];

      $time_intake = '';

      $morning = isset($_POST['morning' . $i]) ? 'Morning' : ''; // Set to 'Morning' if checkbox is checked
      $afternoon = isset($_POST['afternoon' . $i]) ? 'Afternoon' : ''; // Set to 'Afternoon' if checkbox is checked
      $evening = isset($_POST['evening' . $i]) ? 'Evening' : ''; // Set to 'Evening' if checkbox is checked

      $time_intake .= ($morning ? 'Morning' : '') . ($morning && ($afternoon || $evening) ? ', ' : '') . ($afternoon ? 'Afternoon' : '') . ($afternoon && $evening ? ', ' : '') . ($evening ? 'Evening' : '');

      $suggestion = isset($_POST['suggestion' . $i]) ? $_POST['suggestion' . $i] : 'No Suggestion';

      $med_query = "INSERT INTO medicines2 (`prestb_id`, `M_qty`, `med_name`, `med_type`, `time_intake`, `suggestion`) VALUES ('$prestb_id','$M_qty', '$med_name', '$med_type', '$time_intake', '$suggestion')";
      $med_result = mysqli_query($con, $med_query);
      if ($med_result) {
        $flag = $flag + 1;
      } else {
        $flag = $flag - 1;
        echo "<script>alert('Unable to process your request. Try again!');</script>";
      }
      if ($flag == $M_count) {
        $_SESSION['pid'] = $prestb_id;
        $_SESSION['id'] = $ID;
        $_SESSION['disease'] = $disease;
        echo "<script>alert('Prescribed successfully!');</script>";
        header("Location: medical_test.php");
        // exit();
      }
    }
  } else {
    echo "<script>alert('Unable to process your request. Try again!');</script>";
  }
}

?>

<html lang="en">

<head>


  <!-- Required meta tags -->
  <meta charset="utf-8">
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
  <meta name="viewport" content="width=device-width, -scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
  <!-- Bootstrap CSS -->

  <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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

      button:hover {
        cursor: pointer;
      }

      #inputbtn:hover {
        cursor: pointer;
      }

      .f-c-r-o {
        cursor: not-allowed;
        box-shadow: none;
        border: 1px solid #ccc;
      }

      .f-c-r-o:focus {
        cursor: not-allowed;
        box-shadow: none;
        border: 1px solid #ccc;
      }
    </style>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="logout1.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>

        </li>
        <li class="nav-item">
          <a class="nav-link" href="doctor-panel.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Back</a>
        </li>
      </ul>
    </div>
  </nav>

</head>

<body style="padding-top:50px;">
  <div class="container-fluid" style="margin-top:100px;">
    <div class="text-center">
      <h3 style="font-family:'IBM Plex Sans', sans-serif;"> Welcome &nbsp DR.
        <?php echo $_SESSION['demail'] ?>
      </h3>
    </div>
    <div class="row">
      <div class="col-md-4" style="max-width:18%;margin-top: 3%;">
        <div class="list-group" id="list-tab" role="tablist">
          <a class="list-group-item list-group-item-action active" href="doctor-panel.php" role="tab" aria-controls="home" data-toggle="list">Dashboard</a>
          <a class="list-group-item list-group-item-action" id="doctor-panel.php" data-toggle="list" href="#list-update" role="tab" aria-controls="home">Update Profile</a>
          <a class="list-group-item list-group-item-action" href="doctor-panel.php" id="list-app-list" role="tab" data-toggle="list" aria-controls="home">Online Appointments</a>
          <a class="list-group-item list-group-item-action" href="offline.php">Offline Appointments</a>
          <a class="list-group-item list-group-item-action" href="doctor-panel.php" id="list-pres-list" role="tab" data-toggle="list" aria-controls="home"> Prescription List</a>
        </div>
      </div>


      <div class="col-md-8 mt-5">
        <div class="tab-content mt-5" id="nav-tabContent" style="width: 100%;">
          <div class="tab-pane fade show active" id="list-dash" role="tabpanel" aria-labelledby="list-dash-list">
            <div class="container">

              <hr style="border-top: 3px solid #8c8b8b;">
              <div class="text-center">
                <h1>PRESCRIPTION</h1>
              </div>
              <hr style="border-top: 3px solid #8c8b8b;">
              <div class="col-md-12">
                <div class="row mb-3">

                  <div class="col-4">
                    <label for="">Patient Name:</label>
                    <input type="text" class="form-control f-c-r-o" name="p_name" id="p_name" value="<?php echo $fname; ?>" readonly>
                  </div>
                  <div class="col-4">
                    <label for="">Selected Day:</label>
                    <input type="text" class="form-control f-c-r-o" name="p_day" id="p_day" style="font-weight:bolder;color:red;" value="<?php echo $appdate; ?>,<?php echo $user_date; ?>" readonly>
                  </div>
                  <div class="col-4">
                    <label for="t_day">Today's day:</label>
                    <input type="text" class="form-control f-c-r-o" name="t_day" id="t_day" style="font-weight:bolder;" value="<?php echo date('l'); ?>" readonly>
                  </div>
                </div>
                <form action="" method="post">
                  <div class="row my-5">
                    <div class="col-6">
                      <label>Findings \ Disease:</label>
                      <textarea class="form-control" style="resize:none" rows="2" name="disease" id="disease" required></textarea>
                    </div>
                    <div class="col-6">
                      <label>Allergies:</label>
                      <textarea class="form-control" style="resize:none" rows="2" name="allergies" id="allergies" required></textarea>
                    </div>
                  </div>

                  <!-- medicines -->
                  <div class="rowmy-3">
                    <label>Select Medicine:</label>
                    <select class="form-control" id="medicine" name="medicine[]" multiple>
                      <?php
                      $queryTests = "SELECT * FROM drugs";
                      $resultTests = mysqli_query($con, $queryTests);
                      while ($row = mysqli_fetch_assoc($resultTests)) {
                        echo "<option value='{$row['name']}' data-type='{$row['type']}'>{$row['name']}</option>";
                      }
                      ?>
                    </select>
                    <label for=""> please select one medicine and to add more press CTRL and choose the another
                      medicines <span style="color:red;">*</span> </label>
                  </div>
                  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                  <script>
                    $(document).ready(function() {
                      $("#medicine").change(function() {
                        var selectedMedicines = $(this).val();
                        $.ajax({
                          url: "process.php",
                          method: "POST",
                          data: {
                            selectedMedicines: selectedMedicines
                          },
                          success: function(data) {
                            $("#loop").html(data);
                          }
                        });
                      });
                    });
                  </script>

                  <input type="hidden" name="doc_name" value="<?php echo $doctor ?>" />
                  <input type="hidden" name="fname" value="<?php echo $fname ?>" />
                  <input type="hidden" name="user_date" value="<?php echo $user_date ?>" />
                  <input type="hidden" name="lname" value="<?php echo $lname ?>" />
                  <input type="hidden" name="appdate" value="<?php echo $appdate ?>" />
                  <input type="hidden" name="apptime" value="<?php echo $apptime ?>" />
                  <input type="hidden" name="pid" value="<?php echo $pid ?>" />
                  <input type="hidden" name="ID" value="<?php echo $ID ?>" />










                  <div class="container" id="loop"></div>
                  <div class="container">
                    <input type="submit" name="prescribe" value="Prescribe" class="btn btn-primary" style="margin-left: 24pc;width: 20%;">
                  </div>

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><br><br>
  <!-- <div class="container-fluid" style="margin-top:50px;">

    <div class="tab-pane" id="list-pres" role="tabpanel" aria-labelledby="list-pres-list">
      <form class="form-group" name="prescribeform" method="post" action="prescribe.php">
        
      </form>
      <br>

    </div>
  </div> -->

  </div>
  </div>