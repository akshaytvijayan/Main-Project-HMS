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



if (isset($_POST['edit-profile-submit'])) {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $age = $_POST['age'];
  $contact = $_POST['contact'];
  $state = $_POST['state'];
  $district = $_POST['district'];
  $place = $_POST['place'];

  $sql = "UPDATE patreg SET fname='$fname',lname='$lname',email='$email',age='$age',contact='$contact',state='$state',district='$district',place='$place' WHERE pid='$pid'";

  if ($con->query($sql) === TRUE) {
    echo "<script>alert('Record updated successfully')
  window.location='admin-panel.php'</script>";
  } else {
    echo "Error updating record: " . $con->error;
  }
}
if (isset($_POST['app-submit'])) {
  $pid = $_SESSION['pid'];
  $username = $_SESSION['username'];
  $email = $_SESSION['email'];
  $fname = $_SESSION['fname'];
  $lname = $_SESSION['lname'];
  $gender = $_SESSION['gender'];
  $contact = $_SESSION['contact'];
  $doctor = $_POST['doctor'];
  $email = $_SESSION['email'];
  $docFees = $_POST['docFees'];
  $docemail = $_POST['docmail'];
  $spec = $_POST['spec'];
  $appdate = $_POST['userdate'];
  $user_date = $_POST['upcomingDates'];

  $check_query = mysqli_query($con, "select * from appointmenttb where email='$email' AND  doctor='$doctor' AND appdate='$appdate' AND user_date='$user_date'");

  if (mysqli_num_rows($check_query) == 0) {

    $check_count_query = "SELECT count AS appointment_count FROM tbl_doctor_appointment WHERE username='$doctor' AND email='$docemail' AND spec='$spec' AND day_of_appointment='$appdate' AND date_of_appointment='$user_date'";

    $check_count_result = mysqli_query($con, $check_count_query);

    if ($check_count_result !== false) {
      if (mysqli_num_rows($check_count_result) > 0) {

        $row = mysqli_fetch_assoc($check_count_result);
        $appointment_count = $row['appointment_count'];

        if ($appointment_count == 0) {
          $insert_query = "INSERT INTO tbl_doctor_appointment (username, email, spec,day_of_appointment, date_of_appointment,count) VALUES ('$doctor', '$docemail', '$spec', '$appdate','$user_date',1)";
          $insert_result = mysqli_query($con, $insert_query);
          $result = "insert into appointmenttb(pid,fname,lname,gender,email,contact,doctor,docFees,appdate,user_date,userStatus,doctorStatus,status) values('$pid','$fname','$lname','$gender','$email','$contact','$doctor','$docFees','$appdate','$user_date','1','1','request')";
          $query = mysqli_query($con, $result);

          if ($insert_result && $query) {
            echo "<script>alert('Your appointment successfully booked');</script>";
          } else {
            // Error occurred while inserting appointment record
            echo "Error: " . mysqli_error($con);
            echo "<script>alert('Error occurred while booking appointment');</script>";
          }
        } else if ($appointment_count < 20) {

          $update_count_query = "UPDATE tbl_doctor_appointment SET count = count + 1 WHERE username='$doctor' AND email='$docemail' AND spec='$spec' AND day_of_appointment='$appdate' AND date_of_appointment='$user_date'";
          $update_count_result = mysqli_query($con, $update_count_query);

          $result = "insert into appointmenttb(pid,fname,lname,gender,email,contact,doctor,docFees,appdate,user_date,userStatus,doctorStatus,status) values('$pid','$fname','$lname','$gender','$email','$contact','$doctor','$docFees','$appdate','$user_date','1','1','request')";
          $query = mysqli_query($con, $result);

          if ($update_count_result && $query) {
            echo "<script>alert('Your appointment successfully booked');</script>";
          } else {
            echo "<script>alert('Error occurred while booking appointment........');</script>";
          }
        } else {
          echo "<script>alert('Sorry, appointment slots for the day " . htmlspecialchars($user_date) . " are full. Kindly choose another date');</script>";
        }
      } else {
        $insert_query = "INSERT INTO tbl_doctor_appointment (username, email, spec,day_of_appointment, date_of_appointment,count) VALUES ('$doctor', '$docemail', '$spec', '$appdate','$user_date',1)";
        $insert_result = mysqli_query($con, $insert_query);
        $result = "insert into appointmenttb(pid,fname,lname,gender,email,contact,doctor,docFees,appdate,user_date,userStatus,doctorStatus,status) values('$pid','$fname','$lname','$gender','$email','$contact','$doctor','$docFees','$appdate','$user_date','1','1','request')";
        $query = mysqli_query($con, $result);

        if ($insert_result && $query) {
          echo "<script>alert('Your appointment successfully booked');</script>";
        } else {
          // Error occurred while inserting appointment record
          echo "Error: " . mysqli_error($con);
          echo "<script>alert('Error occurred while booking appointment');</script>";
        }

        // No rows returned from the query
        // echo "<script>alert('No appointment count found');</script>";
      }

      // $row = mysqli_fetch_assoc($check_count_result);
      // $appointment_count = $row['appointment_count'];


    } else {
      // Error occurred while checking appointment count
      echo "<script>alert('Error occurred while checking appointment count');</script>";
    }
  } else {
    echo "<script>alert('We are sorry to inform that the doctor is not available in this time or date. Please choose different time or date!');</script>";
  }
}
if (isset($_GET['cancel'])) {
  $query = mysqli_query($con, "update appointmenttb set userStatus='0' where ID = '" . $_GET['ID'] . "'");
  if ($query) {
    echo "<script>alert('Your appointment successfully cancelled');</script>";
  }
}




// function generate_bill()
// {
//   $con = mysqli_connect("localhost", "root", "", "myhmsdb");
//   $pid = $_SESSION['pid'];
//   $appointment_id = $_GET['ID'];
//   $output = '';

//   $query = "SELECT DISTINCT appointmenttb.*, prestb.*, medicines.*, patient_medical_tests.* FROM appointmenttb LEFT JOIN prestb ON appointmenttb.ID = prestb.ID LEFT JOIN medicines ON prestb.t_id = medicines.prestb_id LEFT JOIN patient_medical_tests ON prestb.t_id = patient_medical_tests.pid WHERE appointmenttb.ID=$appointment_id; ";
//   $result = $con->query($query);

//   $medicinesQuery = "SELECT * FROM medicines WHERE prestb_id IN (SELECT t_id FROM prestb WHERE ID = $appointment_id)";
//   $medicinesResult = $con->query($medicinesQuery);
//   $medicines = ($medicinesResult) ? $medicinesResult->fetch_all(MYSQLI_ASSOC) : [];

//   $medicalTestsQuery = "SELECT * FROM patient_medical_tests WHERE pid IN (SELECT t_id FROM prestb WHERE ID = $appointment_id)";
//   $medicalTestsResult = $con->query($medicalTestsQuery);
//   $medical_tests = ($medicalTestsResult) ? $medicalTestsResult->fetch_all(MYSQLI_ASSOC) : [];

//   $patientDetailsPrinted = false;
//   $doctorDetailsPrinted = false;
//   $medicinesPrinted = false;
//   $medicalTestsPrinted = false;

//   // Loop through each row
//   foreach ($result as $row) {
//     if (!$patientDetailsPrinted) {
//       $output .= "<h3 class='custom-font'>Patient Details</h3>";
//       // Print patient details
//       $output .= "<table style='border-collapse: collapse; border: 1px solid #000;'>";
//       $output .= "<tr><td style='border: 1px solid #000; padding: 8px;'>Patient ID</td><td style='border: 1px solid #000; padding: 8px;'>{$row['pid']}</td></tr>";
//       $output .= "<tr><td style='border: 1px solid #000; padding: 8px;'>Patient Name</td><td style='border: 1px solid #000; padding: 8px;'>{$row['fname']} {$row['lname']}</td></tr>";
//       $output .= "<tr><td style='border: 1px solid #000; padding: 8px;'>Patient Contact</td><td style='border: 1px solid #000; padding: 8px;'>{$row['contact']}</td></tr>";
//       $output .= "</table>";
//       $patientDetailsPrinted = true;
//     }

//     // Print doctor details only if not already printed
//     if (!$doctorDetailsPrinted) {
//       $output .= "<h3 class='custom-font'>Doctor Details</h3>";
//       // Print doctor details
//       $output .= "<table style='border-collapse: collapse; border: 1px solid #000;'>";
//       $output .= "<tr><td style='border: 1px solid #000; padding: 8px;'>Doctor</td><td style='border: 1px solid #000; padding: 8px;'>{$row['doctor']}</td></tr>";
//       // Print other doctor details similarly
//       $output .= "</table>";
//       $doctorDetailsPrinted = true;
//     }

//     // Print medicines only if not already printed
//     if (!$medicinesPrinted) {
//       $output .= "<div class='medicines'>";
//       $output .= "<h3 class='custom-font'>Medicines</h3>";
//       $output .= "<table style='border-collapse: collapse; border: 1px solid #000;'>";
//       $output .= "<tr><th style='border: 1px solid #000; padding: 8px;'>MEDICINE NAME</th><th style='border: 1px solid #000; padding: 8px;'>QUANTITY</th><th style='border: 1px solid #000; padding: 8px;'>TYPE</th><th style='border: 1px solid #000; padding: 8px;'>TIME INTAKE</th><th style='border: 1px solid #000; padding: 8px;'>SUGGESTION</th></tr>";
//       // Loop through each medicine record and print details
//       foreach ($medicines as $medicine) {
//         $output .= "<tr>";
//         $output .= "<td style='border: 1px solid #000; padding: 8px;'>{$medicine['med_name']}</td>";
//         $output .= "<td style='border: 1px solid #000; padding: 8px;'>{$medicine['M_qty']}</td>";
//         $output .= "<td style='border: 1px solid #000; padding: 8px;'>{$medicine['M_type']}</td>";
//         $output .= "<td style='border: 1px solid #000; padding: 8px;'>{$medicine['time_intake']}</td>";
//         $output .= "<td style='border: 1px solid #000; padding: 8px;'>{$medicine['suggestion']}</td>";
//         $output .= "</tr>";
//       }
//       $output .= "</table>";
//       $output .= "</div>";
//       $medicinesPrinted = true;
//     }

//     // Print medical tests only if not already printed
//     if (!$medicalTestsPrinted) {
//       $output .= "<div class='medical-tests'>";
//       $output .= "<h3 class='custom-font'>Medical Tests</h3>";
//       $output .= "<table style='border-collapse: collapse; border: 1px solid #000;'>";
//       // Loop through each medical test record and print details
//       foreach ($medical_tests as $test) {
//         $output .= "<tr>";
//         $output .= "<td style='border: 1px solid #000; padding: 8px;'>{$test['medical_test']}</td>";
//         $output .= "</tr>";
//       }
//       $output .= "</table>";
//       $output .= "</div>";
//       $medicalTestsPrinted = true;
//     }
//   }

//   return $output;
// }




if (isset($_GET["generate_bill"])) {
  require_once("TCPDF/tcpdf.php");
  $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
  $obj_pdf->SetCreator(PDF_CREATOR);
  $obj_pdf->SetTitle("Generate Bill");
  $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
  $obj_pdf->SetHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
  $obj_pdf->SetFooterFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
  $obj_pdf->SetDefaultMonospacedFont('helvetica');
  $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
  $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
  $obj_pdf->SetPrintHeader(false);
  $obj_pdf->SetPrintFooter(false);
  $obj_pdf->SetAutoPageBreak(TRUE, 10);
  $obj_pdf->SetFont('helvetica', '', 12);
  $obj_pdf->AddPage();

  $content = '';

  $content .= '
      <br/>
      <h2 align ="center"> NEETHI Hospitals</h2></br>
      <h3 align ="center"> Bill</h3>
      

  ';

  $content .= generate_bill();
  $obj_pdf->writeHTML($content);
  ob_end_clean();
  $obj_pdf->Output("bill.pdf", 'I');
}

function get_specs()
{
  $con = mysqli_connect("localhost", "root", "", "myhmsdb");
  echo $result = 'select username,spec from doctb where status="active"';
  $query = mysqli_query($con, $result);
  $docarray = array();
  while ($row = mysqli_fetch_assoc($query)) {
    $docarray[] = $row;
    print_r($docarray);
  }
  return json_encode($docarray);
}

?>
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

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- Other meta tags, stylesheets, etc. -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- calendar -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Include any necessary calendar library here -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.9.0/main.min.css" integrity="sha512-rHxpgfUzI48eDj+sQojtprKf9OrtXGk9fSeRkpjyFwOKLaIVPKl5ETL42U6ZBYXrVajzH1wd7TMaU6l6R+zRlA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-f2LT9ICjOZMn6KtI/Un2LgAB7kzOyWj7lVNh85RuLdC1CSpQEAUGg6vcEbLpr0IwEZn0eTnU3ToL7/FVr1y5nA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.9.0/main.min.js" integrity="sha512-PX+5b8vTFmVh0hECrrPe+XTK52YJBSLDdM9xL/yjqf+cyX2IUbVgb8xvY42bDfP7Skb2fGnQr1QdmoXIR2ylCg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-ayO99oNt7Wf3fJhpfRvKwYQGRJG0Xw2uB+/z+O8Lw6l4im3BCZqTK+BCVqetdfZ/Xh3V83I5y03RDy6uWJu6Fg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> NEETHI Hospital </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <style>
      .bg-primary {
        background: -webkit-linear-gradient(left, #3931af, #00c6ff);
      }

      /* Remove blue shadow on select field with .form-control class */
      input.form-control:focus,
      select.form-control:focus {
        box-shadow: none;
        border: 1px solid #ccc;
        /* cursor: pointer;     */
      }

      /* Change cursor to pointer on hover for input field with .form-control class */
      /* input.form-control:hover {
        cursor: not-allowed;
      } */
      /*  */
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

      .calendar {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
      }

      .calendar .day {
        border: 1px solid #ccc;
        padding: 5px;
        text-align: center;
      }

      .disabled {
        opacity: 0.5;
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


<body style="padding-top:50px;">

  <div class="container-fluid" style="margin-top:50px;">
    <h3 style="margin-left: 40%;  padding-bottom: 20px; font-family: 'IBM Plex Sans', sans-serif;"> Welcome &nbsp
      <?php echo $username ?>
    </h3>
    <div class="row">
      <div class="col-md-4" style="max-width:25%; margin-top: 3%">
        <div class="list-group" id="list-tab" role="tablist">
          <a class="list-group-item list-group-item-action active" id="list-dash-list" data-toggle="list" href="#list-dash" role="tab" aria-controls="home">Dashboard</a>
          <a class="list-group-item list-group-item-action" id="list-update-list" data-toggle="list" href="#list-update" role="tab" aria-controls="home">Update Profile</a>
          <a class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Book Appointment</a>
          <a class="list-group-item list-group-item-action" href="patientregi.php">Add Patients</a>
          <a class="list-group-item list-group-item-action" href="offlineappoinment.php">Available Doctors</a>
          <a class="list-group-item list-group-item-action" href="changepass.php">Change Password</a>
          <a class="list-group-item list-group-item-action" href="#app-hist" id="list-pat-list" role="tab" data-toggle="list" aria-controls="home">Appointment History</a>
          <a class="list-group-item list-group-item-action" href="#list-pres" id="list-pres-list" role="tab" data-toggle="list" aria-controls="home">Prescriptions</a>


        </div><br>
      </div>
      <!-- grids -->
      <div class="col-md-8" style="margin-top: 3%;">
        <div class="tab-content" id="nav-tabContent" style="width: 100%; height:100%;">

          <!-- dahsboard grids -->
          <div class="tab-pane fade  show active" id="list-dash" role="tabpanel" aria-labelledby="list-dash-list">
            <div class="container-fluid" style="margin-top:10%;">
              <div class="row">
                <div class="container">
                  <div class="row">
                    <div class="col">
                      <div class="panel panel-white no-radius text-center">
                        <div class="panel-body">
                          <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-terminal fa-stack-1x fa-inverse"></i> </span>
                          <h4 class="StepTitle" style="margin-top: 5%;"> Book My Appointment</h4>
                          <script>
                            function clickDiv(id) {
                              document.querySelector(id).click();
                            }
                          </script>
                          <p class="links cl-effect-1">
                            <a href="#list-home" onclick="clickDiv('#list-home-list')">
                              Book Appointment
                            </a>
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="panel panel-white no-radius text-center">
                        <div class="panel-body">
                          <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-paperclip fa-stack-1x fa-inverse"></i> </span>
                          <h4 class="StepTitle" style="margin-top: 5%;">My Appointments</h2>

                            <p class="cl-effect-1">
                              <a href="#app-hist" onclick="clickDiv('#list-pat-list')">
                                View Appointment History
                              </a>
                            </p>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="panel panel-white no-radius text-center">
                        <div class="panel-body">
                          <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-list-ul fa-stack-1x fa-inverse"></i> </span>
                          <h4 class="StepTitle" style="margin-top: 5%;">Prescriptions</h2>

                            <p class="cl-effect-1">
                              <a href="#list-pres" onclick="clickDiv('#list-pres-list')">
                                View Prescription List
                              </a>
                            </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- profile -->
          <div class="tab-pane fade" id="list-update" role="tabpanel" aria-labelledby="list-update-list">
            <div class="container-fluid">
              <div class="card">
                <div class="card-body"></div>
                <center>
                  <!-- <h4>View Profile</h4><a href="editprofile.php"><i class="fa fa-pen"></i></a> -->
                </center><br>
                <?php
                $query = "SELECT * FROM patreg WHERE email = '$email'";
                $result = mysqli_query($con, $query);

                if (!$result) {
                  echo "Error: " . mysqli_error($con);
                } else {
                  if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                ?>

                      <div class="container mb-5">
                        <div class="row">
                          <div class="col-sm">
                            <label for="fname">First Name:</label>
                            <input type="text" id="fname" name="fname" class="form-control" value="<?php echo $row['fname']; ?>" style="cursor: not-allowed;" readonly>
                          </div>
                          <div class="col-sm">
                            <label for="lname">Last Name:</label>
                            <input type="text" id="lname" name="lname" class="form-control" value="<?php echo $row['lname']; ?>" style="cursor: not-allowed;" readonly>
                          </div>
                          <div class="col-sm">
                            <label for="email">Email:</label>
                            <input type="text" id="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" style="cursor: not-allowed;" readonly>
                          </div>
                        </div>
                        <div class="row">

                          <div class="col-sm">
                            <label for="gender">Gender</label>
                            <input type="text" id="gender" name="gender" class="form-control" value="<?php echo $row['gender']; ?>" style="cursor: not-allowed;" readonly>
                          </div>
                          <div class="col-sm">
                            <label for="contact">Contact:</label>
                            <input type="text" id="contact" name="contact" class="form-control" value="<?php echo $row['contact']; ?>" style="cursor: not-allowed;" readonly>
                          </div>
                          <div class="col-sm">
                            <label for="state">State:</label>
                            <input type="text" id="state" name="state" class="form-control" value="<?php echo $row['state']; ?>" style="cursor: not-allowed;" readonly>
                          </div>
                        </div>
                        <div class="row">

                          <div class="col-sm">
                            <label for="district">District</label>
                            <input type="text" id="district" name="district" class="form-control" value="<?php echo $row['district']; ?>" style="cursor: not-allowed;" readonly>
                          </div>
                          <div class="col-sm">
                            <label for="age">Age:</label>
                            <input type="text" id="age" name="age" class="form-control" value="<?php echo $row['age']; ?>" style="cursor: not-allowed;" readonly>
                          </div>
                          <div class="col-sm">
                            <label for="place">Place:</label>
                            <input type="text" id="place" name="place" class="form-control" value="<?php echo $row['place']; ?>" style="cursor: not-allowed;" readonly>

                          </div>
                        </div>
                        <div class="row mt-3">
                          <div class=" col-12 text-center">
                            <a class="btn btn-success" data-toggle="modal" data-target="#editProfileModal"><i class="fa fa-pen" style="color: white;"></i>&nbsp;&nbsp;<span style="color:white;">Edit
                                Profile</span></a>
                          </div>
                        </div>
                      </div>
                <?php
                    }
                  }
                }
                ?>
              </div>
            </div>
          </div>
          <!-- profile modal -->
          <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <?php
                $sql = "select * from patreg where pid='$pid'";
                $rs = mysqli_query($con, $sql);
                ?>
                <div class="container my-5">
                  <form name="myForm" method="POST" onsubmit="return validation();">
                    <table class="" style="width: 100%;">
                      <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($rs)) {
                        ?>
                          <tr>
                            <td>First name</td>
                            <td>:</td>
                            <td>
                              <input type="text" class="form-control" name="fname" id="name" value="<?php echo $row['fname']; ?>" autocomplete="off" onkeyup="return Validstr1()" required pattern="[a-zA-Z]{3,30}" oninvalid="setCustomValidity('input is incorrect !!')" oninput="setCustomValidity('')" maxlength="30" onkeyup="return validation()" style="cursor: not-allowed;" readonly>
                            </td>
                          </tr>
                          <tr>
                            <td><span id="msg" style="color:red;"> </span></td>
                          </tr>
                          <tr>
                            <td>Last name</td>
                            <td>:</td>
                            <td>
                              <input type="text" class="form-control" name="lname" id="lname" value="<?php echo $row['lname']; ?> " autocomplete="off">
                            </td>
                          </tr>
                          <tr>
                            <td><span id="lmsg" style="color:red;"> </span></td>
                          </tr>
                          <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>
                              <input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?> " id="email" required pattern="/^[\w\+\'\.-]+@[\w\'\.-]+\.[a-zA-Z]{2,}$/" onkeyup="return Validateemail()" style="cursor: not-allowed;" readonly>
                            </td>
                          </tr>
                          <tr>
                            <td><span id="email1" style="color:red;"> </span></td>
                          </tr>
                          <tr>
                            <td>Age</td>
                            <td>:</td>
                            <td>
                              <input type="text" class="form-control" value="<?php echo $row['age']; ?> " rows="5" id="age" name="age" required required maxlength="3" style="cursor: not-allowed;" readonly>
                            </td>
                          </tr>
                          <tr>
                            <td>Gender</td>
                            <td>:</td>
                            <td>
                              <input type="text" class="form-control" value="<?php echo $row['gender']; ?> " rows="5" id="gender" name="gender" required required maxlength="30" style="cursor: not-allowed;" readonly>
                            </td>
                          </tr>
                          <tr>
                            <td>Phone number</td>
                            <td>:</td>
                            <td>
                              <input type="text" class="form-control" value="<?php echo $row['contact']; ?> " id="contact" name="contact" required maxlength="10">
                            </td>
                          </tr>
                          <tr>
                            <td><span id="msg2" style="color:red;"> </span></td>
                          </tr>
                          <td>State</td>
                          <td>:</td>
                          <td>
                            <input type="text" class="form-control" value="<?php echo $row['state']; ?> " min="10" maxlength="10" id="state" name="state" style="cursor: not-allowed;" readonly>
                          </td>
                          </tr>
                          <td>District</td>
                          <td>:</td>
                          <td>
                            <input type="text" class="form-control" value="<?php echo $row['district']; ?> " id="district" name="district" required>
                          </td>
                          </tr>
                          <td>Address:</td>
                          <td>:</td>
                          <td>
                            <input type="text" class="form-control" value="<?php echo $row['place']; ?> " id="place" name="place" required>
                          </td>
                          </tr>
                        <?php
                        } ?>
                      </tbody>
                    </table>
                    <br><br>
                    <!-- <div style="text-align: center;">
                        <input type="submit" class="btn-success" value="Submit" id="btn" name="edit-profile-submit">
                        <a href="admin-panel.php" id="btn" class="btn btn-danger">Back</a>
                    </div> -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <input type="submit" class="btn btn-success" value="Submit" id="btn" name="edit-profile-submit">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>



          <!-- appointment -->
          <div class="tab-pane fade" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
            <div class="container-fluid">
              <div class="card">
                <div class="card-body">
                  <center>
                    <h4>Create an appointment</h4>
                  </center><br>
                  <form class="form-group" method="post" action="admin-panel.php">
                    <div class="row">
                      <div class="col-md-4">
                        <label for="spec">Specialization:</label>
                      </div>
                      <div class="col-md-8">
                        <select name="spec" class="form-control" id="spec" onchange="getDoctors(this.value)">
                          <option value="" disabled selected>Select Specialization</option>
                          <?php display_specs(); ?>
                        </select>
                      </div>
                      <script>
                        function getDoctors(spec) {
                          var xhr = new XMLHttpRequest();
                          xhr.open('GET', 'get_doctors.php?spec=' + spec, true);
                          xhr.onreadystatechange = function() {
                            if (xhr.readyState == 4 && xhr.status == 200) {
                              document.getElementById('doctor').innerHTML = xhr.responseText;
                            }
                          };
                          xhr.send();
                        }
                      </script>
                      <br><br>
                      <div class="col-md-4"><label for="doctor">Doctors:</label></div>
                      <div class="col-md-8" style="display: flex;  align-items: flex-top; ">
                        <p style="display: flex;  align-items: flex-end; ">Dr.&nbsp;&nbsp;</p>
                        <select name="doctor" class="form-control" id="doctor" required="required">
                          <option value="" disabled selected>Select Doctor</option>
                          <!-- values -->
                        </select>

                        <input type="hidden" name="docmail" id="docmail">
                      </div>
                      <br /><br />
                      <link href='fullcalendar/main.css' rel='stylesheet' />
                      <script src='fullcalendar/main.js'></script>
                      <script>
                        document.getElementById('doctor').onchange = function updateFees(e) {
                          var fees = document.querySelector(`[value="${this.value}"]`).getAttribute('data-value');
                          var date = document.querySelector(`[value="${this.value}"]`).getAttribute('data-time');
                          var docemail = document.querySelector(`[value="${this.value}"]`).getAttribute('data-email');
                          document.getElementById('docFees').value = fees;
                          document.getElementById('availableDays').value = date;
                          document.getElementById('docmail').value = docemail;
                          // Split the date string by commas
                          var datesArray = date.split(',');

                          var userdateSelect = document.getElementById('userdate');
                          userdateSelect.innerHTML = '';

                          // Add the initial option for choosing a date
                          var initialOption = document.createElement('option');
                          initialOption.value = "";
                          initialOption.textContent = "Choose date";
                          initialOption.disabled = true;
                          initialOption.selected = true;
                          userdateSelect.appendChild(initialOption);

                          // Add each date as an option to the select element
                          datesArray.forEach(function(dateItem) {
                            var option = document.createElement('option');
                            option.value = dateItem.trim(); // Trim whitespace
                            option.textContent = dateItem.trim(); // Trim whitespace
                            userdateSelect.appendChild(option);
                          });

                          // Set the first date as the selected option if datesArray is not empty
                          if (datesArray.length > 0) {
                            userdateSelect.selectedIndex = 0;
                          }
                        }
                      </script>
                      <div class="col-md-4"><label for="consultancyfees">
                          Consultancy Fees
                        </label></div>
                      <div class="col-md-8">
                        <input class="form-control" type="text" name="docFees" id="docFees" style="cursor: not-allowed;" readonly="readonly" />
                      </div><br><br>

                      <div class="col-md-4"><label for="consultancyfees">
                          Available Days
                        </label></div>
                      <div class="col-md-8">
                        <input class="form-control" type="text" name="availableDays" id="availableDays" style="cursor: not-allowed;" readonly="readonly" />
                      </div><br><br>

                      <div class="col-md-4"><label>Appointment Date</label></div>
                      <div class="col-md-8">
                        <select class="form-control" name="userdate" id="userdate">
                        </select>
                      </div><br><br>
                      <div class="col-md-4">
                        <label>Choose Day</label>
                      </div>

                      <div class="col-md-8">
                        <select class="form-control" name="upcomingDates" id="upcomingDates">
                        </select>
                      </div>
                      <script>
                        document.getElementById('userdate').addEventListener('change', function() {
                          populateUpcomingDates(this.value);
                        });

                        function populateUpcomingDates(selectedDay) {
                          const currentDate = new Date();
                          const currentMonth = currentDate.getMonth();
                          const currentYear = currentDate.getFullYear();
                          const currentDay = currentDate.getDate();

                          // Find the index of the selected day
                          const selectedDayIndex = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'].indexOf(selectedDay);

                          const upcomingDatesSelect = document.getElementById('upcomingDates');
                          upcomingDatesSelect.innerHTML = ''; // Clear previous options

                          let upcomingDates = [];

                          // Calculate upcoming dates for the selected day in the current month
                          for (let date = currentDay + 1; date <= 31; date++) {
                            const day = new Date(currentYear, currentMonth, date);
                            if (day.getDay() === selectedDayIndex && day.getMonth() === currentMonth) {
                              upcomingDates.push(day);
                            }
                          }

                          // If no upcoming dates found in the current month, find dates in the next month
                          if (upcomingDates.length === 0) {
                            for (let date = 1; date <= 31; date++) {
                              const day = new Date(currentYear, currentMonth + 1, date);
                              if (day.getDay() === selectedDayIndex && day.getMonth() === currentMonth + 1) {
                                upcomingDates.push(day);
                              }
                            }
                          }

                          // Populate select tag with upcoming dates
                          if (upcomingDates.length > 0) {
                            upcomingDates.forEach(date => {
                              const option = document.createElement('option');
                              option.value = date.toDateString();
                              option.textContent = date.toDateString();
                              upcomingDatesSelect.appendChild(option);
                            });
                          } else {
                            const option = document.createElement('option');
                            option.textContent = 'No upcoming dates found';
                            upcomingDatesSelect.appendChild(option);
                          }
                        }

                        // Populate initial upcoming dates
                        populateUpcomingDates(document.getElementById('userdate').value);
                      </script>
                      <div class="col-md-12 text-center mt-5">
                        <input type="submit" name="app-submit" value="Create Appointment" class="btn btn-primary" id="inputbtn">
                      </div>
                      <!-- <div class="col-md-8"></div> -->
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>


          <div class="tab-pane fade" id="app-hist" role="tabpanel" aria-labelledby="list-pat-list">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Doctor Name</th>
                  <th scope="col">Consultancy Fees</th>
                  <th scope="col">Scheduled Day</th>
                  <th scope="col">Appointment Date</th>
                  <th scope="col">Assigned Date</th>
                  <th scope="col">Appointment Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php

                $con = mysqli_connect("localhost", "root", "", "myhmsdb");
                global $con;

                $query = "select ID,doctor,docFees,appdate,apptime,userStatus,user_date,doctorStatus from appointmenttb where fname ='$fname' and lname='$lname' ORDER BY id desc;";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($result)) {

                  #$lname = $row['lname'];
                  #$email = $row['email'];
                  #$contact = $row['contact'];
                ?>
                  <tr>
                    <td>
                      <?php echo $row['doctor']; ?>
                    </td>
                    <td>
                      <?php echo $row['docFees']; ?>
                    </td>
                    <td>
                      <?php echo $row['appdate']; ?>
                    </td>
                    <td>
                      <?php echo $row['user_date']; ?>
                    </td>
                    <td>
                      <?php echo $row['apptime']; ?>
                    </td>

                    <td>
                      <?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) {
                        echo "<span style='color: #40826D; font-weight: bold;'>Active</span>";
                      }
                      if (($row['userStatus'] == 0) && ($row['doctorStatus'] == 1)) {
                        echo "<span style='color: red; font-weight: bold;'>Cancelled by You</span>";
                      }

                      if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 0)) {
                        echo "<span style='color: red; font-weight: bold;'>Cancelled by Doctor</span>";
                      }
                      ?>
                    </td>


                    <td>
                      <?php
                      if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) {
                        // Check if the appointment date is yesterday or earlier
                        $appointmentDate = strtotime($row['apptime']);
                        $yesterday = strtotime('-1 day');
                        if ($appointmentDate <= $yesterday) {
                          // Disable cancel button for past appointments
                          echo "<span style='color: #2E8B57; font-weight: bold;'>ATTENDED</span>";
                        } else {
                      ?>
                          <a href="admin-panel.php?ID=<?php echo $row['ID'] ?>&cancel=update" onClick="return confirm('Are you sure you want to cancel this appointment ?')" title="Cancel Appointment" tooltip-placement="top" tooltip="Remove">
                            <button class="btn btn-outline-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                              </svg> Cancel</button>
                          </a>
                      <?php
                        }
                      } else {
                        echo "<span style='color: red; font-weight: bold;'>Cancelled</span>";
                      }
                      ?>
                    </td>

                  </tr>
                <?php } ?>
              </tbody>
            </table>
            <br>
          </div>



          <div class="tab-pane fade" id="list-pres" role="tabpanel" aria-labelledby="list-pres-list">

            <table class="table table-hover">
              <thead>
                <tr>

                  <th scope="col">ID</th>
                  <th scope="col">Doctor </th>
                  <th scope="col">Appointment Date</th>
                  <th scope="col">Appointment Time</th>
                  <th scope="col">Doctor Fees</th>
                  <th scope="col">Prescription</th>
                </tr>
              </thead>
              <tbody>
                <?php

                $con = mysqli_connect("localhost", "root", "", "myhmsdb");
                global $con;

                $query = "select *   from appointmenttb where pid='$pid' and status='approve';";

                $result = mysqli_query($con, $query);
                if (!$result) {
                  echo mysqli_error($con);
                } else {
                  if (mysqli_num_rows($result) == 0) {
                    echo "<tr><td colspan='8'>No Prescription available</td></tr>";
                  } else {
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                      <tr>
                        <td>
                          <?php echo $row['ID']; ?>
                        </td>
                        <td>
                          <?php echo $row['doctor']; ?>
                        </td>
                        <td>
                          <?php echo $row['appdate']; ?>
                        </td>
                        <td>
                          <?php echo $row['apptime']; ?>
                        </td>
                        <td>
                          <?php echo $row['docFees']; ?>
                        </td>

                        <td>
                          <form method="get" action="bill.php">
                            <input type="hidden" name="ID" value="<?php echo $row['ID'] ?>" />
                            <input type="submit" name="generate_bill" class="btn btn-success" value="View Bill" />
                          </form>

                        </td>
                      </tr>
                <?php
                    }
                  }
                }
                ?>
              </tbody>
            </table>
            <br>
          </div>



        </div>
      </div>
    </div>
  </div>
  <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...
  </div>
  <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
    <form class="form-group" method="post" action="func.php">
      <label>Doctors name: </label>
      <input type="text" name="name" placeholder="Enter doctors name" class="form-control">
      <br>
      <input type="submit" name="doc_sub" value="Add Doctor" class="btn btn-primary">
    </form>
  </div>
  <div class="tab-pane fade" id="list-attend" role="tabpanel" aria-labelledby="list-attend-list">...</div>
  </div>
  </div>
  </div>
  </div>
</body>

</html>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js">
</script>



</body>

</html>