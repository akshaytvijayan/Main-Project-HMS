<!DOCTYPE html>
<?php
$con = mysqli_connect("localhost", "root", "", "myhmsdb");

include('newfunc.php');



$querys = "SELECT email,contact FROM doctb";
$results = mysqli_query($con, $querys);

// Create an empty array to store email values
$emails = array();
$phones = array();

// Loop through the result and store email values in the array
while ($row = mysqli_fetch_assoc($results)) {
  $emails[] = $row['email'];
  $phones[] = $row['contact'];
}

// Convert the array to a JSON string
$email_json = json_encode($emails);
$phone_json = json_encode($phones);

// Set $email_json as a value of hidden input field
echo '<input type="hidden" name="email_array" id="email_array" value="' . htmlspecialchars($email_json) . '">';
echo '<input type="hidden" name="phone_array" id="phone_array" value="' . htmlspecialchars($phone_json) . '">';






if (isset($_POST['tbl_doctor_add'])) {
  $name = $_POST['doctor'];
  $age = $_POST['age'];
  $contact = $_POST['contact'];
  $qualification = $_POST['qualification'];
  $gender = $_POST['gender'];
  if (isset($_POST['availableDays']) && is_array($_POST['availableDays'])) {
    $availableDays = $_POST['availableDays'];
    $availabletime = implode(',', $availableDays);
  }
  $dpassword = $_POST['password'];
  $demail = $_POST['email'];
  $spec = $_POST['Specialization'];
  $place = $_POST['inputState'];
  $district = $_POST['inputDistrict'];
  $experience = $_POST['experience'];
  $docFees = $_POST['docFees'];
  $password = $_POST["password"];
  if (!empty($_FILES['imagefile'])) {
    $img_name = $_FILES['imagefile']['name'];
    $tmp_img_name = $_FILES['imagefile']['tmp_name'];
    $folder = 'msg_img/';
    $query = "INSERT INTO `doctb`(`username`, `password`, `email`, `spec`, `docFees`, `name`, `age`, `qualification`, `gender`, `avialabletime`, `experience`, `place`, `district`,`contact`,`image`, `status`) VALUES ('$name','$dpassword','$demail','$spec','$docFees','$name','$age','$qualification','$gender','$availabletime','$experience','$place','$district','$contact','$img_name','probation')";
    $result = mysqli_query($con, $query);
    if ($result) {
      move_uploaded_file($tmp_img_name, $folder . $img_name);
      echo "<script>alert('Doctor added successfully!');</script>";
    }
  } else {
    echo 'No file uploaded';
  }
}


if (isset($_POST['docsub1'])) {
  $demail = $_POST['demail'];
  $query = "delete from doctb where email='$demail';";
  $result = mysqli_query($con, $query);
  if ($result) {
    echo "<script>alert('Doctor removed successfully!');</script>";
  } else {
    echo "<script>alert('Unable to delete!');</script>";
  }
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
  <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> NEETHI Hospital </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <script>
      var check = function() {
        if (document.getElementById('dpassword').value ==
          document.getElementById('cdpassword').value) {
          document.getElementById('message').style.color = '#5dd05d';
          document.getElementById('message').innerHTML = 'Matched';
        } else {
          document.getElementById('message').style.color = '#f55252';
          document.getElementById('message').innerHTML = 'Not Matching';
        }
      }

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

      .container {
        max-width: 1000px;
        border: 1px solid;
        /* border style and width */
        border-color: #000;
        /* border color */
        margin: 0 auto;
        padding: 30px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);

      }

      .heading {
        color: green !important;
        font-weight: bold;
        text-align: center;
        margin-bottom: 30px;

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

      button:hover {
        cursor: pointer;
      }

      #inputbtn:hover {
        cursor: pointer;
      }

      input[type="number"]::-webkit-inner-spin-button,
      input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
      }

      .heading-add-doctor {
        font-weight: bold;
        color: Black;
      }

      .password-container {
        position: relative;
        display: inline-block;
      }

      .password-toggle {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        cursor: pointer;
      }

      .password-container {
        position: relative;
        display: inline-block;
      }

      .password-toggle {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        cursor: pointer;
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
    <h3 style="margin-left: 40%; padding-bottom: 20px;font-family: 'IBM Plex Sans', sans-serif;"> WELCOME ADMINISTRATOR
    </h3>
    <!-- sidebar -->
    <div class="row">
      <div class="col-md-4" style="max-width:25%;margin-top: 3%;">
        <div class="list-group" id="list-tab" role="tablist">
          <a class="list-group-item list-group-item-action active" id="list-dash-list" data-toggle="list" href="#list-dash" role="tab" aria-controls="home">Dashboard</a>

          <a class="list-group-item list-group-item-action" href="addstaf.php">Add Staff</a>
          <a class="list-group-item list-group-item-action" href="deletestaff.php">View all Staffs</a>
          <a class="list-group-item list-group-item-action" href="leave.php">leave approval</a>

          <a class="list-group-item list-group-item-action" href="#list-settings" id="list-adoc-list" role="tab" data-toggle="list" aria-controls="home">Add Doctor</a>
          <a class="list-group-item list-group-item-action" href="deletedoctor.php">View all Doctors </a>
          <a class="list-group-item list-group-item-action" href="#list-pres" id="list-pres-list" role="tab" data-toggle="list" aria-controls="home">Prescription List</a>

          <a class="list-group-item list-group-item-action" href="deletepatient.php">View all Patients</a>
          <a class="list-group-item list-group-item-action" href="#list-app" id="list-app-list" role="tab" data-toggle="list" aria-controls="home">Appointment Details</a>
          <a class="list-group-item list-group-item-action" href="#list-mes" id="list-mes-list" role="tab" data-toggle="list" aria-controls="home">Queries</a>
          <a class="list-group-item list-group-item-action" href="slot.php">Add Slot</a>
        </div><br>
      </div>
      <div class="col-md-8" style="margin-top: 3%;">
        <div class="tab-content" id="nav-tabContent" style="width: 950px;">



          <div class="tab-pane fade show active" id="list-dash" role="tabpanel" aria-labelledby="list-dash-list">
            <div class="container-fluid container-fullw bg-white">
              <div class="row">
                <div class="col-sm-4">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body">
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-users fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Doctor List</h4>
                      <script>
                        function clickDiv(id) {
                          document.querySelector(id).click();
                        }
                      </script>
                      <p class="links cl-effect-1">
                        <a href="deletedoctor.php" onclick="clickDiv('#list-doc-list')">
                          View all Doctors
                        </a>
                      </p>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4" style="left: -3%">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body">
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-users fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Patient List</h4>

                      <p class="cl-effect-1">
                        <a href="#app-hist" onclick="clickDiv('#list-pat-list')">
                          View Patients
                        </a>
                      </p>
                    </div>
                  </div>
                </div>


                <div class="col-sm-4">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body">
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-paperclip fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Appointment Details</h4>

                      <p class="cl-effect-1">
                        <a href="#app-hist" onclick="clickDiv('#list-app-list')">
                          View Appointments
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-4" style="left: 13%;margin-top: 5%;">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body">
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-list-ul fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Prescription List</h4>

                      <p class="cl-effect-1">
                        <a href="#list-pres" onclick="clickDiv('#list-pres-list')">
                          View Prescriptions
                        </a>
                      </p>
                    </div>
                  </div>
                </div>


                <div class="col-sm-4" style="left: 18%;margin-top: 5%">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body">
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-plus fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Manage Doctors</h4>

                      <p class="cl-effect-1">
                        <a href="#app-hist" onclick="clickDiv('#list-adoc-list')">Add Doctors</a>
                        &nbsp|
                        <a href="#app-hist" onclick="clickDiv('#list-ddoc-list')">
                          Delete Doctors
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- doctor list -->

          <!-- patient list -->


          <!-- Prescription List -->
          <div class="tab-pane fade" id="list-pres" role="tabpanel" aria-labelledby="list-pres-list">

            <div class="col-md-8">

              <div class="row">



                <table class="table table-hover">
                  <thead>
                    <tr>

                      <th scope="col">First Name</th>
                      <th scope="col">Last Name</th>
                      <th scope="col">Doctor</th>
                      <th scope="col">Appointment Date</th>
                      <th scope="col">Appointment Time</th>
                      <th scope="col">Disease</th>
                      <th scope="col">Allergy</th>
                      <th scope="col">Prescription</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $con = mysqli_connect("localhost", "root", "", "myhmsdb");
                    global $con;
                    $query = "select * from prestb";
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_array($result)) {

                      $fname = $row['fname'];
                      $lname = $row['lname'];
                      $doctor = $row['doctor'];
                      $appdate = $row['appdate'];
                      $apptime = $row['apptime'];
                      $disease = $row['disease'];
                      $allergy = $row['allergy'];
                      $pres = $row['prescription'];


                      echo "<tr>
                        <td>$fname</td>
                        <td>$lname</td>
                        <td>$doctor</td>
                        <td>$appdate</td>
                        <td>$apptime</td>
                        <td>$disease</td>
                        <td>$allergy</td>
                        <td>$pres</td>
                      </tr>";
                    }

                    ?>
                  </tbody>
                </table>
                <br>
              </div>
            </div>
          </div>



          <!-- Appointment List -->
          <div class="tab-pane fade" id="list-app" role="tabpanel" aria-labelledby="list-pat-list">

            <div class="col-md-8">
              <form class="form-group" action="appsearch.php" method="post">
                <div class="row">
                  <div class="col-md-10"><input type="text" name="app_contact" placeholder="Enter Contact" class="form-control"></div>
                  <div class="col-md-2"><input type="submit" name="app_search_submit" class="btn btn-primary" value="Search"></div>
                </div>
              </form>
            </div>

            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Gender</th>
                  <th scope="col">Email</th>
                  <th scope="col">Contact</th>
                  <th scope="col">Doctor Name</th>
                  <th scope="col">Consultancy Fees</th>
                  <th scope="col">Appointment Date</th>
                  <th scope="col">Appointment Time</th>
                  <th scope="col">Appointment Status</th>
                </tr>
              </thead>
              <tbody>
                <?php

                $con = mysqli_connect("localhost", "root", "", "myhmsdb");
                global $con;

                $query = "select * from appointmenttb;";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                  <tr>

                    <td>
                      <?php echo $row['fname']; ?>
                    </td>
                    <td>
                      <?php echo $row['lname']; ?>
                    </td>
                    <td>
                      <?php echo $row['gender']; ?>
                    </td>
                    <td>
                      <?php echo $row['email']; ?>
                    </td>
                    <td>
                      <?php echo $row['contact']; ?>
                    </td>
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
                      <?php echo $row['apptime']; ?>
                    </td>
                    <td>
                      <?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) {
                        echo "Active";
                      }
                      if (($row['userStatus'] == 0) && ($row['doctorStatus'] == 1)) {
                        echo "Cancelled by Patient";
                      }

                      if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 0)) {
                        echo "Cancelled by Doctor";
                      }
                      ?>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
            <br>
          </div>

          <!-- Add Doctor  -->
          <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
            <div class="container">
              <h2 class="heading ">DOCTOR REGISTRATION</h2>

              <form class="form-group" id="tbl_doctor_add" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="tbl_doctor_add" value="1">
                <div class="col-12 mb-4">
                  <span class="heading-add-doctor">Personal Information</span>
                </div>
                <hr>
                <div class="col-12 mb-4">
                  <div class="row">
                    <div class="col-4">
                      <label>Doctor Name</label>
                      <input type="text" class="form-control" onchange="capitalizeFirstLetter(this)" placeholder="Enter Name" name="doctor" id="doctor" onkeydown="return alphaOnly(event);" required>
                    </div>
                    <div class="col-4">
                      <label for="email">Image</label>
                      <input type="file" class="form-control1 ng-invalid ng-invalid-required ng-touched" name="imagefile" accept="image/*" id="imagefile">
                    </div>
                    <div class="col-4">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" placeholder="Enter Email id" name="email" id="email" onkeyup="return checkSimilar();" required>
                      <span id="email_error_message"></span>
                      <script>
                        function checkSimilar() {
                          var emailArray = JSON.parse(document.getElementById('email_array').value);
                          var inputEmail = document.getElementById('email').value;
                          var errorMessageSpan = document.getElementById('email_error_message');
                          var emailInput = document.getElementById('email');

                          // Check if the input email exists in the array
                          if (emailArray.includes(inputEmail)) {
                            // Email already exists
                            errorMessageSpan.innerHTML = 'Email already in use';
                            errorMessageSpan.style.color = 'red';
                            emailInput.style.border = '2px solid red';
                            return false; // Prevent form submission
                          } else {
                            // Email is unique
                            errorMessageSpan.innerHTML = ''; // Clear error message
                            errorMessageSpan.style.color = ''; // Reset color
                            emailInput.style.border = ''; // Reset border
                            return true; // Allow form submission
                          }
                        }
                      </script>


                    </div>
                  </div>
                </div>
                <div class="col-12 mb-4">
                  <div class="row">
                    <div class="col-3">
                      <label for="age">DOB</label>
                      <input type="date" class="form-control" id="age" name="age" required>
                      <script>
                        // Get today's date
                        var today = new Date();

                        // Calculate the minimum birth date allowed (18 years ago)
                        var minBirthDate = new Date(today.getFullYear() - 18, today.getMonth(), today.getDate());

                        // Convert the minimum birth date to a string in yyyy-mm-dd format
                        var minBirthDateString = minBirthDate.toISOString().split('T')[0];

                        // Set the 'min' attribute of the date input to the minimum birth date
                        document.getElementById('age').setAttribute('max', minBirthDateString);
                      </script>
                    </div>
                    <div class="col-3">
                      <label for="age">Gender</label>
                      <select name="gender" id="gender" class="form-control" required>
                        <option value="null" disabled selected>Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                      </select>

                    </div>
                    <div class="col-6">
                      <label>Phone Number :</label>
                      <input type="number" class="form-control" name="contact" id="contact" placeholder="Enter Phone Number" onkeyup="return checkPhoneDuplicate();" required>
                      <span id="phone_error_message"></span>
                      <script>
                        function checkPhoneDuplicate() {
                          var phoneArray = JSON.parse(document.getElementById('phone_array').value);
                          var inputPhone = document.getElementById('contact').value;
                          var errorMessageSpan = document.getElementById('phone_error_message');
                          var phoneInput = document.getElementById('contact');

                          // Check if the input phone number exists in the array
                          if (phoneArray.includes(inputPhone)) {
                            // Phone number already exists
                            errorMessageSpan.innerHTML = 'Phone number already in use';
                            errorMessageSpan.style.color = 'red';
                            phoneInput.style.border = '2px solid red';
                            return false; // Prevent form submission
                          } else {
                            // Phone number is unique
                            errorMessageSpan.innerHTML = ''; // Clear error message
                            errorMessageSpan.style.color = ''; // Reset color
                            phoneInput.style.border = ''; // Reset phone input border
                            return true; // Allow form submission
                          }
                        }
                      </script>
                      <br><br>
                    </div>
                  </div>
                </div>
                <div class="col-12 mb-4">
                  <span class="heading-add-doctor">Professional Information</span>
                </div>
                <hr>
                <div class="col-12 mb-4">
                  <div class="row">
                    <div class="col-6">
                      <label>Specialization</label>
                      <select class="form-control" id="Specialization" name="Specialization" required>
                        <option value="head" disabled>Select Specialization</option>
                        <option value="Anatomical Pathology">Anatomical Pathology</option>
                        <option value="Anesthesiology">Anesthesiology</option>
                        <option value="Cardiology">Cardiology</option>
                        <option value="Cardiovascular/Thoracic Surgery">Cardiovascular/Thoracic Surgery</option>
                        <option value="Clinical Immunology/Allergy">Clinical Immunology/Allergy</option>
                        <option value="Critical Care Medicine">Critical Care Medicine</option>
                        <option value="Dermatology">Dermatology</option>
                        <option value="Diagnostic Radiology">Diagnostic Radiology</option>
                        <option value="Emergency Medicine">Emergency Medicine</option>
                        <option value="Endocrinology and Metabolism">Endocrinology and Metabolism</option>
                        <option value="Family Medicine">Family Medicine</option>
                        <option value="Gastroenterology">Gastroenterology</option>
                        <option value="General Internal Medicine">General Internal Medicine</option>
                        <option value="General Surgery">General Surgery</option>
                        <option value="General/Clinical Pathology">General/Clinical Pathology</option>
                        <option value="Geriatric Medicine">Geriatric Medicine</option>
                        <option value="Hematology">Hematology</option>
                        <option value="Medical Biochemistry">Medical Biochemistry</option>
                        <option value="Medical Genetics">Medical Genetics</option>
                        <option value="Medical Microbiology and Infectious Diseases">Medical Microbiology and Infectious
                          Diseases</option>
                        <option value="Medical Oncology">Medical Oncology</option>
                        <option value="Nephrology">Nephrology</option>
                        <option value="Neurology">Neurology</option>
                        <option value="Neurosurgery">Neurosurgery</option>
                        <option value="Nuclear Medicine">Nuclear Medicine</option>
                        <option value="Obstetrics/Gynecology">Obstetrics/Gynecology</option>
                        <option value="Occupational Medicine">Occupational Medicine</option>
                        <option value="Ophthalmology">Ophthalmology</option>
                        <option value="Orthopedic Surgery">Orthopedic Surgery</option>
                        <option value="Otolaryngology">Otolaryngology</option>
                        <option value="Pediatrics">Pediatrics</option>
                        <option value="Physical Medicine and Rehabilitation (PM & R)">Physical Medicine and Rehabilitation
                          (PM & R)</option>
                        <option value="Plastic Surgery">Plastic Surgery</option>
                        <option value="Psychiatry">Psychiatry</option>
                        <option value="Public Health and Preventive Medicine (PhPm)">Public Health and Preventive Medicine
                          (PhPm)</option>
                        <option value="Radiation Oncology">Radiation Oncology</option>
                        <option value="Respirology">Respirology</option>
                        <option value="Rheumatology">Rheumatology</option>
                        <option value="Urology">Urology</option>
                      </select>
                    </div>
                    <div class="col-6">
                      <label for="age">Doctor Fees</label>
                      <input type="number" class="form-control" id="docFees" placeholder="Enter Fees" name="docFees" required>
                    </div>
                  </div>

                </div>
                <div class="col-12 mb-4">
                  <div class="row">
                    <div class="col-6">
                      <label for="age">Experience</label>
                      <textarea cols="72" rows="3" class="form-control" onchange="capitalizeFirstLetter(this)" placeholder="Enter experience " name="experience" id="experience" required></textarea>
                    </div>
                    <div class="col-6">
                      <label for="qualification">Qualification</label>
                      <textarea cols="72" rows="3" class="form-control" name="qualification" onchange="capitalizeFirstLetter(this)" id="qualification" placeholder="Enter Qualification" required></textarea>

                    </div>
                  </div>
                </div>
                <div class="col-12 mb-4">
                  <span class="heading-add-doctor">Practice Details</span>
                </div>
                <hr>
                <div class="col-md-8">
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
                </div><br><br>


                <div class="col-12 mb-4">
                  <span class="heading-add-doctor">Location Information</span>
                </div>
                <hr>
                <div class="col-12 mb-4">
                  <div class="row">
                    <div class="col-6">
                      <div class="row">
                        <div class="col-6">
                          <label for="inputState">State</label>
                          <select class="form-control" name="inputState" id="inputState">
                            <option value="SelectState">Select State</option>
                            <option value="Andra Pradesh">Andra Pradesh</option>
                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                            <option value="Assam">Assam</option>
                            <option value="Bihar">Bihar</option>
                            <option value="Chhattisgarh">Chhattisgarh</option>
                            <option value="Goa">Goa</option>
                            <option value="Gujarat">Gujarat</option>
                            <option value="Haryana">Haryana</option>
                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                            <option value="Jharkhand">Jharkhand</option>
                            <option value="Karnataka">Karnataka</option>
                            <option value="Kerala">Kerala</option>
                            <option value="Madya Pradesh">Madya Pradesh</option>
                            <option value="Maharashtra">Maharashtra</option>
                            <option value="Manipur">Manipur</option>
                            <option value="Meghalaya">Meghalaya</option>
                            <option value="Mizoram">Mizoram</option>
                            <option value="Nagaland">Nagaland</option>
                            <option value="Orissa">Orissa</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Rajasthan">Rajasthan</option>
                            <option value="Sikkim">Sikkim</option>
                            <option value="Tamil Nadu">Tamil Nadu</option>
                            <option value="Telangana">Telangana</option>
                            <option value="Tripura">Tripura</option>
                            <option value="Uttaranchal">Uttaranchal</option>
                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                            <option value="West Bengal">West Bengal</option>
                            <option disabled style="background-color:#aaa; color:#fff">UNION Territories</option>
                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                            <option value="Chandigarh">Chandigarh</option>
                            <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                            <option value="Daman and Diu">Daman and Diu</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Lakshadeep">Lakshadeep</option>
                            <option value="Pondicherry">Pondicherry</option>
                          </select>
                        </div>
                        <div class="col-6">
                          <label for="inputDistrict">District</label>
                          <select class="form-control" id="inputDistrict" name="inputDistrict">
                            <option value="">-- select one -- </option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-6">
                      <label for="address">Address</label>
                      <textarea name="location" style="resize:none;" onchange="capitalizeFirstLetter(this)" placeholder="Enter Address" class="form-control" id="location" cols="30" rows="3"></textarea>
                    </div>
                  </div>
                </div>
                <div class="col-12 mb-4">
                  <span class="heading-add-doctor">Security Information</span>
                </div>
                <hr>
                <div class="col-12 mb-4">
                  <div class="row">
                    <div class="col-6">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" placeholder="Enter Password" name="password" id="password" required>
                      <div style="margin-left:65%;">
                        <input type="checkbox" id="showPasswordCheckbox" onchange="togglePasswordVisibility()">
                        <label for="showPasswordCheckbox">Show Password</label>
                      </div>
                    </div>
                    <div class="col-6">
                      <label for="cpassword">Confirm Password</label>
                      <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Re-Enter Password" onkeyup="return matchPass();" required>
                      <span id="password_error"></span>


                      <script>
                        function togglePasswordVisibility() {
                          var passwordField = document.getElementById('password');
                          var confirmPasswordField = document.getElementById('cpassword');
                          var showPasswordCheckbox = document.getElementById('showPasswordCheckbox');

                          if (showPasswordCheckbox.checked) {
                            passwordField.type = 'text';
                            confirmPasswordField.type = 'text';
                          } else {
                            passwordField.type = 'password';
                            confirmPasswordField.type = 'password';
                          }
                        }

                        function matchPass() {
                          var password = document.getElementById('password').value;
                          var confirmPassword = document.getElementById('cpassword').value;
                          var passwordErrorSpan = document.getElementById('password_error');
                          var confirmPasswordInput = document.getElementById('cpassword');

                          if (password !== confirmPassword) {
                            // Passwords do not match
                            passwordErrorSpan.innerHTML = 'Passwords do not match';
                            passwordErrorSpan.style.color = 'red';
                            confirmPasswordInput.style.border = '2px solid red';
                            return false; // Prevent form submission
                          } else {
                            // Passwords match
                            passwordErrorSpan.innerHTML = 'Passwords match';
                            passwordErrorSpan.style.color = 'green';
                            confirmPasswordInput.style.border = ''; // Reset border
                            return true; // Allow form submission
                          }
                        }
                      </script>

                    </div>
                  </div>
                </div>

                <div class="col-12 mb-4">
                  <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Submit">&nbsp &nbsp&nbsp &nbsp &nbsp &nbsp&nbsp &nbsp
                    <input type="reset" class="btn btn-danger" value="Cancel" id="reset" name="reset">

                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- delete doctor -->

          <!-- message -->
          <div class="tab-pane fade" id="list-attend" role="tabpanel" aria-labelledby="list-attend-list">...</div>

          <div class="tab-pane fade" id="list-mes" role="tabpanel" aria-labelledby="list-mes-list">

            <div class="col-md-8">
              <form class="form-group" action="messearch.php" method="post">
                <div class="row">
                  <div class="col-md-10"><input type="text" name="mes_contact" placeholder="Enter Contact" class="form-control"></div>
                  <div class="col-md-2"><input type="submit" name="mes_search_submit" class="btn btn-primary" value="Search"></div>
                </div>
              </form>
            </div>

            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">User Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Contact</th>
                  <th scope="col">Message</th>
                </tr>
              </thead>
              <tbody>
                <?php

                $con = mysqli_connect("localhost", "root", "", "myhmsdb");
                global $con;

                $query = "select * from contact;";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($result)) {

                  #$fname = $row['fname'];
                  #$lname = $row['lname'];
                  #$email = $row['email'];
                  #$contact = $row['contact'];
                ?>
                  <tr>
                    <td>
                      <?php echo $row['name']; ?>
                    </td>
                    <td>
                      <?php echo $row['email']; ?>
                    </td>
                    <td>
                      <?php echo $row['contact']; ?>
                    </td>
                    <td>
                      <?php echo $row['message']; ?>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
            <br>
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
  <script>
    function capitalizeFirstLetter(inputElement) {
      // Get the value of the input field
      var value = inputElement.value;
      // Capitalize the first letter
      var capitalizedValue = value.charAt(0).toUpperCase() + value.slice(1);
      // Update the input field with the capitalized value
      inputElement.value = capitalizedValue;
    }
  </script>
  <script>
    function addDay() {
      const daySelections = document.getElementById('daySelections');
      const newDaySelection = document.createElement('div');
      newDaySelection.innerHTML = `
                                    
                                                <br><br><label for="day">Select Day:</label>
                                                <select class="day" name="day">
                                                    <option value="Monday">Monday</option>
                                                    <option value="Tuesday">Tuesday</option>
                                                    <option value="Wednesday">Wednesday</option>
                                                    <option value="Thursday">Thursday</option>
                                                    <option value="Friday">Friday</option>
                                                    <option value="Saturday">Saturday</option>
                                                    <option value="Sunday">Sunday</option>
                                                </select>
                                                <br><br>

                                                <label>Select Time Slots for the Selected Day:</label>
                                                <br>
                                                <input type="checkbox" class="time" name="time" value="08:00">
                                                <label for="time1">08:00 AM - 09:00 AM</label><br>

                                                <input type="checkbox" class="time" name="time" value="09:00">
                                                <label for="time2">09:00 AM - 10:00 AM</label><br>

                                                <input type="checkbox" class="time" name="time" value="10:00">
                                                <label for="time3">11:00 AM - 12:00 PM</label><br>

                                                <input type="checkbox" class="time" name="time" value="10:00">
                                                <label for="time4">01:00 PM - 02:00 PM</label><br>

                                                <input type="checkbox" class="time" name="time" value="10:00">
                                                <label for="time5">02:00 PM - 03:00 PM</label><br>

                                                <input type="checkbox" class="time" name="time" value="10:00">
                                                <label for="time6">03:00 PM - 04:00 PM</label><br>

                                                <input type="checkbox" class="time" name="time" value="10:00">
                                                <label for="time7">04:00 PM - 05:00 PM</label><br><br>             
                                                <div class="col-md-2"><button type="button" class="btn btn-danger" onclick="removeDay()">Remove</button> </div>

                                            `;
      daySelections.appendChild(newDaySelection);

    }

    function removeDay() {
      const daySelections = document.getElementById('daySelections');
      if (daySelections.children.length > 1) {
        daySelections.removeChild(daySelections.lastChild);
      }
    }

    function submitSelection() {
      var selectedData = [];
      var daySelections = document.querySelectorAll('.day');
      daySelections.forEach(function(daySelect, index) {
        var selectedDay = daySelect.value;
        var selectedTimes = [];
        var timeCheckboxes = daySelect.parentElement.querySelectorAll('.time');
        timeCheckboxes.forEach(function(checkbox) {
          if (checkbox.checked) {
            selectedTimes.push(checkbox.value);
          }
        });
        selectedData.push({
          day: selectedDay,
          times: selectedTimes
        });
      });
      console.log(selectedData);
      // You can perform further actions here, like sending the selected data to a server, etc.
    }


    var AndraPradesh = ["Anantapur", "Chittoor", "East Godavari", "Guntur", "Kadapa", "Krishna", "Kurnool", "Prakasam", "Nellore", "Srikakulam", "Visakhapatnam", "Vizianagaram", "West Godavari"];
    var ArunachalPradesh = ["Anjaw", "Changlang", "Dibang Valley", "East Kameng", "East Siang", "Kra Daadi", "Kurung Kumey", "Lohit", "Longding", "Lower Dibang Valley", "Lower Subansiri", "Namsai", "Papum Pare", "Siang", "Tawang", "Tirap", "Upper Siang", "Upper Subansiri", "West Kameng", "West Siang", "Itanagar"];
    var Assam = ["Baksa", "Barpeta", "Biswanath", "Bongaigaon", "Cachar", "Charaideo", "Chirang", "Darrang", "Dhemaji", "Dhubri", "Dibrugarh", "Goalpara", "Golaghat", "Hailakandi", "Hojai", "Jorhat", "Kamrup Metropolitan", "Kamrup (Rural)", "Karbi Anglong", "Karimganj", "Kokrajhar", "Lakhimpur", "Majuli", "Morigaon", "Nagaon", "Nalbari", "Dima Hasao", "Sivasagar", "Sonitpur", "South Salmara Mankachar", "Tinsukia", "Udalguri", "West Karbi Anglong"];
    var Bihar = ["Araria", "Arwal", "Aurangabad", "Banka", "Begusarai", "Bhagalpur", "Bhojpur", "Buxar", "Darbhanga", "East Champaran", "Gaya", "Gopalganj", "Jamui", "Jehanabad", "Kaimur", "Katihar", "Khagaria", "Kishanganj", "Lakhisarai", "Madhepura", "Madhubani", "Munger", "Muzaffarpur", "Nalanda", "Nawada", "Patna", "Purnia", "Rohtas", "Saharsa", "Samastipur", "Saran", "Sheikhpura", "Sheohar", "Sitamarhi", "Siwan", "Supaul", "Vaishali", "West Champaran"];
    var Chhattisgarh = ["Balod", "Baloda Bazar", "Balrampur", "Bastar", "Bemetara", "Bijapur", "Bilaspur", "Dantewada", "Dhamtari", "Durg", "Gariaband", "Janjgir Champa", "Jashpur", "Kabirdham", "Kanker", "Kondagaon", "Korba", "Koriya", "Mahasamund", "Mungeli", "Narayanpur", "Raigarh", "Raipur", "Rajnandgaon", "Sukma", "Surajpur", "Surguja"];
    var Goa = ["North Goa", "South Goa"];
    var Gujarat = ["Ahmedabad", "Amreli", "Anand", "Aravalli", "Banaskantha", "Bharuch", "Bhavnagar", "Botad", "Chhota Udaipur", "Dahod", "Dang", "Devbhoomi Dwarka", "Gandhinagar", "Gir Somnath", "Jamnagar", "Junagadh", "Kheda", "Kutch", "Mahisagar", "Mehsana", "Morbi", "Narmada", "Navsari", "Panchmahal", "Patan", "Porbandar", "Rajkot", "Sabarkantha", "Surat", "Surendranagar", "Tapi", "Vadodara", "Valsad"];
    var Haryana = ["Ambala", "Bhiwani", "Charkhi Dadri", "Faridabad", "Fatehabad", "Gurugram", "Hisar", "Jhajjar", "Jind", "Kaithal", "Karnal", "Kurukshetra", "Mahendragarh", "Mewat", "Palwal", "Panchkula", "Panipat", "Rewari", "Rohtak", "Sirsa", "Sonipat", "Yamunanagar"];
    var HimachalPradesh = ["Bilaspur", "Chamba", "Hamirpur", "Kangra", "Kinnaur", "Kullu", "Lahaul Spiti", "Mandi", "Shimla", "Sirmaur", "Solan", "Una"];
    var JammuKashmir = ["Anantnag", "Bandipora", "Baramulla", "Budgam", "Doda", "Ganderbal", "Jammu", "Kargil", "Kathua", "Kishtwar", "Kulgam", "Kupwara", "Leh", "Poonch", "Pulwama", "Rajouri", "Ramban", "Reasi", "Samba", "Shopian", "Srinagar", "Udhampur"];
    var Jharkhand = ["Bokaro", "Chatra", "Deoghar", "Dhanbad", "Dumka", "East Singhbhum", "Garhwa", "Giridih", "Godda", "Gumla", "Hazaribagh", "Jamtara", "Khunti", "Koderma", "Latehar", "Lohardaga", "Pakur", "Palamu", "Ramgarh", "Ranchi", "Sahebganj", "Seraikela Kharsawan", "Simdega", "West Singhbhum"];
    var Karnataka = ["Bagalkot", "Bangalore Rural", "Bangalore Urban", "Belgaum", "Bellary", "Bidar", "Vijayapura", "Chamarajanagar", "Chikkaballapur", "Chikkamagaluru", "Chitradurga", "Dakshina Kannada", "Davanagere", "Dharwad", "Gadag", "Gulbarga", "Hassan", "Haveri", "Kodagu", "Kolar", "Koppal", "Mandya", "Mysore", "Raichur", "Ramanagara", "Shimoga", "Tumkur", "Udupi", "Uttara Kannada", "Yadgir"];
    var Kerala = ["Alappuzha", "Ernakulam", "Idukki", "Kannur", "Kasaragod", "Kollam", "Kottayam", "Kozhikode", "Malappuram", "Palakkad", "Pathanamthitta", "Thiruvananthapuram", "Thrissur", "Wayanad"];
    var MadhyaPradesh = ["Agar Malwa", "Alirajpur", "Anuppur", "Ashoknagar", "Balaghat", "Barwani", "Betul", "Bhind", "Bhopal", "Burhanpur", "Chhatarpur", "Chhindwara", "Damoh", "Datia", "Dewas", "Dhar", "Dindori", "Guna", "Gwalior", "Harda", "Hoshangabad", "Indore", "Jabalpur", "Jhabua", "Katni", "Khandwa", "Khargone", "Mandla", "Mandsaur", "Morena", "Narsinghpur", "Neemuch", "Panna", "Raisen", "Rajgarh", "Ratlam", "Rewa", "Sagar", "Satna",
      "Sehore", "Seoni", "Shahdol", "Shajapur", "Sheopur", "Shivpuri", "Sidhi", "Singrauli", "Tikamgarh", "Ujjain", "Umaria", "Vidisha"
    ];
    var Maharashtra = ["Ahmednagar", "Akola", "Amravati", "Aurangabad", "Beed", "Bhandara", "Buldhana", "Chandrapur", "Dhule", "Gadchiroli", "Gondia", "Hingoli", "Jalgaon", "Jalna", "Kolhapur", "Latur", "Mumbai City", "Mumbai Suburban", "Nagpur", "Nanded", "Nandurbar", "Nashik", "Osmanabad", "Palghar", "Parbhani", "Pune", "Raigad", "Ratnagiri", "Sangli", "Satara", "Sindhudurg", "Solapur", "Thane", "Wardha", "Washim", "Yavatmal"];
    var Manipur = ["Bishnupur", "Chandel", "Churachandpur", "Imphal East", "Imphal West", "Jiribam", "Kakching", "Kamjong", "Kangpokpi", "Noney", "Pherzawl", "Senapati", "Tamenglong", "Tengnoupal", "Thoubal", "Ukhrul"];
    var Meghalaya = ["East Garo Hills", "East Jaintia Hills", "East Khasi Hills", "North Garo Hills", "Ri Bhoi", "South Garo Hills", "South West Garo Hills", "South West Khasi Hills", "West Garo Hills", "West Jaintia Hills", "West Khasi Hills"];
    var Mizoram = ["Aizawl", "Champhai", "Kolasib", "Lawngtlai", "Lunglei", "Mamit", "Saiha", "Serchhip", "Aizawl", "Champhai", "Kolasib", "Lawngtlai", "Lunglei", "Mamit", "Saiha", "Serchhip"];
    var Nagaland = ["Dimapur", "Kiphire", "Kohima", "Longleng", "Mokokchung", "Mon", "Peren", "Phek", "Tuensang", "Wokha", "Zunheboto"];
    var Odisha = ["Angul", "Balangir", "Balasore", "Bargarh", "Bhadrak", "Boudh", "Cuttack", "Debagarh", "Dhenkanal", "Gajapati", "Ganjam", "Jagatsinghpur", "Jajpur", "Jharsuguda", "Kalahandi", "Kandhamal", "Kendrapara", "Kendujhar", "Khordha", "Koraput", "Malkangiri", "Mayurbhanj", "Nabarangpur", "Nayagarh", "Nuapada", "Puri", "Rayagada", "Sambalpur", "Subarnapur", "Sundergarh"];
    var Punjab = ["Amritsar", "Barnala", "Bathinda", "Faridkot", "Fatehgarh Sahib", "Fazilka", "Firozpur", "Gurdaspur", "Hoshiarpur", "Jalandhar", "Kapurthala", "Ludhiana", "Mansa", "Moga", "Mohali", "Muktsar", "Pathankot", "Patiala", "Rupnagar", "Sangrur", "Shaheed Bhagat Singh Nagar", "Tarn Taran"];
    var Rajasthan = ["Ajmer", "Alwar", "Banswara", "Baran", "Barmer", "Bharatpur", "Bhilwara", "Bikaner", "Bundi", "Chittorgarh", "Churu", "Dausa", "Dholpur", "Dungarpur", "Ganganagar", "Hanumangarh", "Jaipur", "Jaisalmer", "Jalore", "Jhalawar", "Jhunjhunu", "Jodhpur", "Karauli", "Kota", "Nagaur", "Pali", "Pratapgarh", "Rajsamand", "Sawai Madhopur", "Sikar", "Sirohi", "Tonk", "Udaipur"];
    var Sikkim = ["East Sikkim", "North Sikkim", "South Sikkim", "West Sikkim"];
    var TamilNadu = ["Ariyalur", "Chennai", "Coimbatore", "Cuddalore", "Dharmapuri", "Dindigul", "Erode", "Kanchipuram", "Kanyakumari", "Karur", "Krishnagiri", "Madurai", "Nagapattinam", "Namakkal", "Nilgiris", "Perambalur", "Pudukkottai", "Ramanathapuram", "Salem", "Sivaganga", "Thanjavur", "Theni", "Thoothukudi", "Tiruchirappalli", "Tirunelveli", "Tiruppur", "Tiruvallur", "Tiruvannamalai", "Tiruvarur", "Vellore", "Viluppuram", "Virudhunagar"];
    var Telangana = ["Adilabad", "Bhadradri Kothagudem", "Hyderabad", "Jagtial", "Jangaon", "Jayashankar", "Jogulamba", "Kamareddy", "Karimnagar", "Khammam", "Komaram Bheem", "Mahabubabad", "Mahbubnagar", "Mancherial", "Medak", "Medchal", "Nagarkurnool", "Nalgonda", "Nirmal", "Nizamabad", "Peddapalli", "Rajanna Sircilla", "Ranga Reddy", "Sangareddy", "Siddipet", "Suryapet", "Vikarabad", "Wanaparthy", "Warangal Rural", "Warangal Urban", "Yadadri Bhuvanagiri"];
    var Tripura = ["Dhalai", "Gomati", "Khowai", "North Tripura", "Sepahijala", "South Tripura", "Unakoti", "West Tripura"];
    var UttarPradesh = ["Agra", "Aligarh", "Allahabad", "Ambedkar Nagar", "Amethi", "Amroha", "Auraiya", "Azamgarh", "Baghpat", "Bahraich", "Ballia", "Balrampur", "Banda", "Barabanki", "Bareilly", "Basti", "Bhadohi", "Bijnor", "Budaun", "Bulandshahr", "Chandauli", "Chitrakoot", "Deoria", "Etah", "Etawah", "Faizabad", "Farrukhabad", "Fatehpur", "Firozabad", "Gautam Buddha Nagar", "Ghaziabad", "Ghazipur", "Gonda", "Gorakhpur", "Hamirpur", "Hapur", "Hardoi", "Hathras", "Jalaun", "Jaunpur", "Jhansi", "Kannauj", "Kanpur Dehat", "Kanpur Nagar", "Kasganj", "Kaushambi", "Kheri", "Kushinagar", "Lalitpur", "Lucknow", "Maharajganj", "Mahoba", "Mainpuri", "Mathura", "Mau", "Meerut", "Mirzapur", "Moradabad", "Muzaffarnagar", "Pilibhit", "Pratapgarh", "Raebareli", "Rampur", "Saharanpur", "Sambhal", "Sant Kabir Nagar", "Shahjahanpur", "Shamli", "Shravasti", "Siddharthnagar", "Sitapur", "Sonbhadra", "Sultanpur", "Unnao", "Varanasi"];
    var Uttarakhand = ["Almora", "Bageshwar", "Chamoli", "Champawat", "Dehradun", "Haridwar", "Nainital", "Pauri", "Pithoragarh", "Rudraprayag", "Tehri", "Udham Singh Nagar", "Uttarkashi"];
    var WestBengal = ["Alipurduar", "Bankura", "Birbhum", "Cooch Behar", "Dakshin Dinajpur", "Darjeeling", "Hooghly", "Howrah", "Jalpaiguri", "Jhargram", "Kalimpong", "Kolkata", "Malda", "Murshidabad", "Nadia", "North 24 Parganas", "Paschim Bardhaman", "Paschim Medinipur", "Purba Bardhaman", "Purba Medinipur", "Purulia", "South 24 Parganas", "Uttar Dinajpur"];
    var AndamanNicobar = ["Nicobar", "North Middle Andaman", "South Andaman"];
    var Chandigarh = ["Chandigarh"];
    var DadraHaveli = ["Dadra Nagar Haveli"];
    var DamanDiu = ["Daman", "Diu"];
    var Delhi = ["Central Delhi", "East Delhi", "New Delhi", "North Delhi", "North East Delhi", "North West Delhi", "Shahdara", "South Delhi", "South East Delhi", "South West Delhi", "West Delhi"];
    var Lakshadweep = ["Lakshadweep"];
    var Puducherry = ["Karaikal", "Mahe", "Puducherry", "Yanam"];


    $("#inputState").change(function() {
      var StateSelected = $(this).val();
      var optionsList;
      var htmlString = "";

      switch (StateSelected) {
        case "Andra Pradesh":
          optionsList = AndraPradesh;
          break;
        case "Arunachal Pradesh":
          optionsList = ArunachalPradesh;
          break;
        case "Assam":
          optionsList = Assam;
          break;
        case "Bihar":
          optionsList = Bihar;
          break;
        case "Chhattisgarh":
          optionsList = Chhattisgarh;
          break;
        case "Goa":
          optionsList = Goa;
          break;
        case "Gujarat":
          optionsList = Gujarat;
          break;
        case "Haryana":
          optionsList = Haryana;
          break;
        case "Himachal Pradesh":
          optionsList = HimachalPradesh;
          break;
        case "Jammu and Kashmir":
          optionsList = JammuKashmir;
          break;
        case "Jharkhand":
          optionsList = Jharkhand;
          break;
        case "Karnataka":
          optionsList = Karnataka;
          break;
        case "Kerala":
          optionsList = Kerala;
          break;
        case "Madya Pradesh":
          optionsList = MadhyaPradesh;
          break;
        case "Maharashtra":
          optionsList = Maharashtra;
          break;
        case "Manipur":
          optionsList = Manipur;
          break;
        case "Meghalaya":
          optionsList = Meghalaya;
          break;
        case "Mizoram":
          optionsList = Mizoram;
          break;
        case "Nagaland":
          optionsList = Nagaland;
          break;
        case "Orissa":
          optionsList = Orissa;
          break;
        case "Punjab":
          optionsList = Punjab;
          break;
        case "Rajasthan":
          optionsList = Rajasthan;
          break;
        case "Sikkim":
          optionsList = Sikkim;
          break;
        case "Tamil Nadu":
          optionsList = TamilNadu;
          break;
        case "Telangana":
          optionsList = Telangana;
          break;
        case "Tripura":
          optionsList = Tripura;
          break;
        case "Uttaranchal":
          optionsList = Uttaranchal;
          break;
        case "Uttar Pradesh":
          optionsList = UttarPradesh;
          break;
        case "West Bengal":
          optionsList = WestBengal;
          break;
        case "Andaman and Nicobar Islands":
          optionsList = AndamanNicobar;
          break;
        case "Chandigarh":
          optionsList = Chandigarh;
          break;
        case "Dadar and Nagar Haveli":
          optionsList = DadraHaveli;
          break;
        case "Daman and Diu":
          optionsList = DamanDiu;
          break;
        case "Delhi":
          optionsList = Delhi;
          break;
        case "Lakshadeep":
          optionsList = Lakshadeep;
          break;
        case "Pondicherry":
          optionsList = Pondicherry;
          break;
      }


      for (var i = 0; i < optionsList.length; i++) {
        htmlString = htmlString + "<option value='" + optionsList[i] + "'>" + optionsList[i] + "</option>";
      }
      $("#inputDistrict").html(htmlString);

    });
  </script>

</body>

</html>