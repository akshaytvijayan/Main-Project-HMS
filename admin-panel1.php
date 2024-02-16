<!DOCTYPE html>
<?php
$con = mysqli_connect("localhost", "root", "", "myhmsdb");

include('newfunc.php');

if (isset($_POST['docsub'])) {
  $name = $_POST['doctor'];
  $dob = $_POST['dob'];
  $contact = $_POST['contact'];
  $qualification = $_POST['qualification'];
  $gender = $_POST['gender'];
  if (isset($_POST['availableDays']) && is_array($_POST['availableDays'])) {
    $availableDays = $_POST['availableDays'];
    $availabletime = implode(',', $availableDays);
  }
  $dpassword = $_POST['dpassword'];
  $demail = $_POST['demail'];
  $spec = $_POST['spec'];
  $place = $_POST['place'];
  $district = $_POST['district'];
  $experience = $_POST['experience'];
  $docFees = $_POST['docFees'];
  echo $query = "INSERT INTO `doctb`(`username`, `password`, `email`, `spec`, `docFees`, `name`, `dob`, `qualification`, `gender`, `avialabletime`, `experience`, `place`, `district`,`contact`) VALUES ('$name','$dpassword','$demail','$spec','$docFees','$name','$dob','$qualification','$gender','$availabletime','$experience','$place','$district','$contact')";
  $result = mysqli_query($con, $query);
  if ($result) {
    echo "<script>alert('Doctor added successfully!');</script>";
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
          <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
          <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
            <form class="form-group" method="post" action="admin-panel1.php">
              <div class="row">
                <div class="col-md-4"><label>Doctor Name:</label></div>
                <div class="col-md-8"><input type="text" class="form-control" name="doctor" id="doctor" onkeydown="return alphaOnly(event);" required></div><br><br>
                <div class="col-md-4"><label>Specialization:</label></div>
                <div class="col-md-8">
                  <select class="form-control" id="spec" name="spec" required>
                    <option value="head" disabled selected>Select Specialization</option>
                    <option value="" disabled selected>Select Specialization</option>
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
                    <option value="Medical Microbiology and Infectious Diseases">Medical Microbiology and Infectious Diseases</option>
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
                    <option value="Physical Medicine and Rehabilitation (PM & R)">Physical Medicine and Rehabilitation (PM & R)</option>
                    <option value="Plastic Surgery">Plastic Surgery</option>
                    <option value="Psychiatry">Psychiatry</option>
                    <option value="Public Health and Preventive Medicine (PhPm)">Public Health and Preventive Medicine (PhPm)</option>
                    <option value="Radiation Oncology">Radiation Oncology</option>
                    <option value="Respirology">Respirology</option>
                    <option value="Rheumatology">Rheumatology</option>
                    <option value="Urology">Urology</option>
                  </select>
                </div><br><br>
                <div class="col-md-4"><label>Dob:</label></div>
                <div class="col-md-8"><input type="date" class="form-control" name="dob" id="dob" required></div><br><br>
                <div class="col-md-4"><label>Qualifications:</label></div>
                <div class="col-md-8"><textarea cols="80" rows="3" name="qualification" id="qualification" required></textarea></div>
                <br><br>
                <div class="col-md-4"><label>Gender:</label></div>
                <div class="col-md-8"><select name="gender" class="form-control" required>
                    <option value="" disabled selected>Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Others</option>
                  </select></div><br><br>
                <!-- <div class="col-md-4"><label>Available Time:</label></div>
                <div class="col-md-8"><input type="text" class="form-control" name="davailtime" required></div><br><br> -->

                <div class="col-md-4"><label>Consultancy Fees:</label></div>
                <div class="col-md-8"><input type="text" class="form-control" name="docFees" required></div><br><br>
                <div class="col-md-4"><label>Phone Number:</label></div>
                <div class="col-md-8"><input type="phone" class="form-control" name="contact" id="contact" maxlength="10" required></div><br><br>
                <div class="col-md-4"><label>Email ID:</label></div>
                <div class="col-md-8"><input type="email" class="form-control" name="demail" required></div><br><br>

                <div class="col-md-4"> <label>Experience:</label></div>
                <div class="col-md-8"><textarea cols="80" rows="3" name="experience" id="experience" required></textarea></div>
                <br><br>
                <div class="col-md-4"><label>Address:</label></div>
                <div class="col-md-8"><textarea cols="80" rows="3" name="place" required></textarea></div><br><br>

                <script>
                  function updateDistricts() {
                    var stateSelect = document.getElementById("state");
                    var districtSelect = document.getElementById("district");
                    var selectedState = stateSelect.options[stateSelect.selectedIndex].value;

                    districtSelect.innerHTML = "";

                    var placeholderOption = document.createElement("option");
                    placeholderOption.text = "Select District";
                    placeholderOption.value = "";
                    districtSelect.appendChild(placeholderOption);

                    // Add districts for each state

                    if (selectedState === "Andhra Pradesh") {
                      var districts = ["Anantapur", "Chittoor", "East Godavari", "Guntur", "Krishna", "Kurnool", "Nellore", "Prakasam", "Srikakulam", "Visakhapatnam", "Vizianagaram", "West Godavari", "Y.S.R. Kadapa"];
                    } else if (selectedState === "Arunachal Pradesh") {
                      var districts = ["Tawang", "West Kameng", "East Kameng", "Papum Pare", "Kurung Kumey", "Kra Daadi", "Lower Subansiri", "Upper Subansiri", "West Siang", "East Siang", "Siang", "Upper Siang"];
                    } else if (selectedState === "Assam") {
                      var districts = ["Baksa", "Barpeta", "Biswanath", "Bongaigaon", "Cachar", "Charaideo", "Chirang", "Darrang", "Dhemaji", "Dhubri", "Dibrugarh", "Dima Hasao", "Goalpara", "Golaghat", "Hailakandi", "Hojai", "Jorhat", "Kamrup", "Kamrup Metropolitan", "Karbi Anglong"];
                    } else if (selectedState === "West Bengal") {
                      var districts = ["Alipurduar", "Bankura", "Birbhum", "Cooch Behar", "Dakshin Dinajpur", "Darjeeling", "Hooghly", "Howrah", "Jalpaiguri", "Jhargram", "Kalimpong", "Kolkata", "Malda", "Murshidabad", "Nadia", "North 24 Parganas", "Paschim Medinipur", "Purba Medinipur", "Purulia", "South 24 Parganas", "Uttar Dinajpur"];
                    } else if (selectedState === "Uttar Pradesh") {
                      var districts = ["Agra", "Aligarh", "Ambedkar Nagar", "Amethi", "Amroha", "Auraiya", "Ayodhya", "Azamgarh", "Baghpat", "Bahraich", "Ballia", "Balrampur", "Banda", "Barabanki", "Bareilly", "Basti", "Bhadohi", "Bijnor", "Budaun", "Bulandshahr"];
                    } else if (selectedState === "Bihar") {
                      var districts = ["Araria", "Arwal", "Aurangabad", "Banka", "Begusarai", "Bhagalpur", "Bhojpur", "Buxar", "Darbhanga", "East Champaran", "Gaya", "Gopalganj", "Jamui", "Jehanabad", "Kaimur", "Katihar", "Khagaria", "Kishanganj", "Lakhisarai", "Madhepura"];
                    } else if (selectedState === "Uttarakhand") {
                      var districts = ["Almora", "Bageshwar", "Chamoli", "Champawat", "Dehradun", "Haridwar", "Nainital", "Pauri Garhwal", "Pithoragarh", "Rudraprayag", "Tehri Garhwal", "Udham Singh Nagar", "Uttarkashi"];
                    } else if (selectedState === "Kerala") {
                      var districts = ["Alappuzha", "Ernakulam", "Idukki", "Kannur", "Kasaragod", "Kollam", "Kottayam", "Kozhikode", "Malappuram", "Palakkad", "Pathanamthitta", "Thiruvananthapuram", "Thrissur", "Wayanad"];
                    } else if (selectedState === "Chhattisgarh") {
                      var districts = ["Balod", "Baloda Bazar", "Balrampur", "Bastar", "Bemetara", "Bijapur", "Bilaspur", "Dantewada", "Dhamtari", "Durg", "Gariaband", "Gaurela-Pendra-Marwahi", "Janjgir-Champa", "Jashpur", "Kabirdham", "Kanker", "Kondagaon", "Korba", "Koriya", "Mahasamund", "Mungeli", "Narayanpur", "Raigarh", "Raipur", "Rajnandgaon", "Sukma", "Surajpur", "Surguja"];
                    } else if (selectedState === "Karnataka") {
                      var districts = ["Bagalkot", "Ballari", "Belagavi", "Bengaluru Rural", "Bengaluru Urban", "Bidar", "Chamarajanagar", "Chikkaballapur", "Chikkamagaluru", "Chitradurga", "Dakshina Kannada", "Davanagere", "Dharwad", "Gadag", "Hassan", "Haveri", "Kalaburagi", "Kodagu", "Kolar", "Koppal", "Mandya", "Mysuru", "Raichur", "Ramanagara", "Shivamogga", "Tumakuru", "Udupi", "Uttara Kannada", "Vijayapura", "Yadgir"];
                    } else if (selectedState === "Goa") {
                      var districts = ["North Goa", "South Goa"];
                    } else if (selectedState === "Himachal Pradesh") {
                      var districts = ["Bilaspur", "Chamba", "Hamirpur", "Kangra", "Kinnaur", "Kullu", "Lahaul And Spiti", "Mandi", "Shimla", "Sirmaur", "Solan", "Una"];
                    } else if (selectedState === "Jharkhand") {
                      var districts = ["Bokaro", "Chatra", "Deoghar", "Dhanbad", "Dumka", "East Singhbhum", "Garhwa", "Giridih", "Godda", "Gumla", "Hazaribagh", "Jamtara", "Khunti", "Koderma", "Latehar", "Lohardaga", "Pakur", "Palamu", "Ramgarh", "Ranchi", "Sahebganj", "Seraikela Kharsawan", "Simdega", "West Singhbhum"];
                    } else if (selectedState === "Haryana") {
                      var districts = ["Ambala", "Bhiwani", "Charkhi Dadri", "Faridabad", "Fatehabad", "Gurugram", "Hisar", "Jhajjar", "Jind", "Kaithal", "Karnal", "Kurukshetra", "Mahendragarh", "Nuh", "Palwal", "Panchkula", "Panipat", "Rewari", "Rohtak", "Sirsa", "Sonipat", "Yamunanagar"];
                    } else if (selectedState === "Gujarat") {
                      var districts = ["Ahmedabad", "Amreli", "Anand", "Aravalli", "Banaskantha", "Bharuch", "Bhavnagar", "Botad", "Chhota Udaipur", "Dahod", "Dang", "Devbhoomi Dwarka", "Gandhinagar", "Gir Somnath", "Jamnagar", "Junagadh", "Kheda", "Kutch", "Mahisagar", "Mehsana", "Morbi", "Narmada", "Navsari", "Panchmahal", "Patan", "Porbandar", "Rajkot", "Sabarkantha", "Surat", "Surendranagar", "Tapi", "Vadodara", "Valsad"];
                    } else if (selectedState === "Madhya Pradesh") {
                      var districts = ["Agar Malwa", "Alirajpur", "Anuppur", "Ashoknagar", "Balaghat", "Barwani", "Betul", "Bhind", "Bhopal", "Burhanpur", "Chhatarpur", "Chhindwara", "Damoh", "Datia", "Dewas", "Dhar", "Dindori", "Guna", "Gwalior", "Harda", "Hoshangabad", "Indore", "Jabalpur", "Jhabua", "Katni", "Khandwa", "Khargone", "Mandla", "Mandsaur", "Morena", "Narsinghpur", "Neemuch", "Niwari", "Panna", "Raisen", "Rajgarh", "Ratlam", "Rewa", "Sagar", "Satna", "Sehore", "Seoni", "Shahdol", "Shajapur", "Sheopur", "Shivpuri", "Sidhi", "Singrauli", "Tikamgarh", "Ujjain", "Umaria", "Vidisha"];
                    } else if (selectedState === "Maharashtra") {
                      var districts = ["Ahmednagar", "Akola", "Amravati", "Aurangabad", "Beed", "Bhandara", "Buldhana", "Chandrapur", "Dhule", "Gadchiroli", "Gondia", "Hingoli", "Jalgaon", "Jalna", "Kolhapur", "Latur", "Mumbai City", "Mumbai Suburban", "Nagpur", "Nanded", "Nandurbar", "Nashik", "Osmanabad", "Palghar", "Parbhani", "Pune", "Raigad", "Ratnagiri", "Sangli", "Satara", "Sindhudurg", "Solapur", "Thane", "Wardha", "Washim", "Yavatmal"];
                    } else if (selectedState === "Manipur") {
                      var districts = ["Bishnupur", "Chandel", "Churachandpur", "Imphal East", "Imphal West", "Jiribam", "Kakching", "Kamjong", "Kangpokpi", "Noney", "Pherzawl", "Senapati", "Tamenglong", "Tengnoupal", "Thoubal", "Ukhrul"];
                    } else if (selectedState === "Punjab") {
                      var districts = ["Amritsar", "Barnala", "Bathinda", "Faridkot", "Fatehgarh Sahib", "Fazilka", "Ferozepur", "Gurdaspur", "Hoshiarpur", "Jalandhar", "Kapurthala", "Ludhiana", "Mansa", "Moga", "Muktsar", "Pathankot", "Patiala", "Rupnagar", "Sahibzada Ajit Singh Nagar", "Sangrur", "Shaheed Bhagat Singh Nagar", "Sri Muktsar Sahib", "Tarn Taran"];
                    } else if (selectedState === "Rajasthan") {
                      var districts = ["Ajmer", "Alwar", "Banswara", "Baran", "Barmer", "Bharatpur", "Bhilwara", "Bikaner", "Bundi", "Chittorgarh", "Churu", "Dausa", "Dholpur", "Dungarpur", "Hanumangarh", "Jaipur", "Jaisalmer", "Jalore", "Jhalawar", "Jhunjhunu", "Jodhpur", "Karauli", "Kota", "Nagaur", "Pali", "Pratapgarh", "Rajsamand", "Sawai Madhopur", "Sikar", "Sirohi", "Sri Ganganagar", "Tonk", "Udaipur"];
                    } else if (selectedState === "Telangana") {
                      var districts = ["Adilabad", "Bhadradri Kothagudem", "Hyderabad", "Jagtial", "Jangaon", "Jayashankar Bhupalpally"];
                    } else if (selectedState === "Meghalaya") {
                      var districts = ["East Garo Hills", "East Jaintia Hills", "East Khasi Hills", "North Garo Hills", "Ri Bhoi", "South Garo Hills", "South West Garo Hills", "South West Khasi Hills", "West Garo Hills", "West Jaintia Hills", "West Khasi Hills"];
                    } else if (selectedState === "Mizoram") {
                      var districts = ["Aizawl", "Champhai", "Hnahthial", "Khawzawl", "Kolasib", "Lawngtlai", "Lunglei", "Mamit", "Saiha", "Saitual", "Serchhip"];
                    } else if (selectedState === "Nagaland") {
                      var districts = ["Dimapur", "Kiphire", "Kohima", "Longleng", "Mokokchung", "Mon", "Peren", "Phek", "Tuensang", "Wokha", "Zunheboto"];
                    } else if (selectedState === "Odisha") {
                      var districts = ["Angul", "Balangir", "Balasore", "Bargarh", "Bhadrak", "Boudh", "Cuttack", "Deogarh", "Dhenkanal", "Gajapati", "Ganjam", "Jagatsinghpur", "Jajpur", "Jharsuguda", "Kalahandi", "Kandhamal", "Kendrapara", "Kendujhar", "Khordha", "Koraput", "Malkangiri", "Mayurbhanj", "Nabarangpur", "Nayagarh", "Nuapada", "Puri", "Rayagada", "Sambalpur", "Subarnapur", "Sundargarh"];
                    } else if (selectedState === "Sikkim") {
                      var districts = ["East Sikkim", "North Sikkim", "South Sikkim", "West Sikkim"];
                    } else if (selectedState === "Tamil Nadu") {
                      var districts = ["Ariyalur", "Chengalpattu", "Chennai", "Coimbatore", "Cuddalore", "Dharmapuri", "Dindigul", "Erode", "Kallakurichi", "Kancheepuram", "Kanyakumari", "Karur", "Krishnagiri", "Madurai", "Nagapattinam", "Namakkal", "Nilgiris", "Perambalur", "Pudukkottai", "Ramanathapuram", "Ranipet", "Salem", "Sivaganga", "Tenkasi", "Thanjavur", "Theni", "Thoothukudi", "Tiruchirappalli", "Tirunelveli", "Tirupathur", "Tiruppur", "Tiruvallur", "Tiruvannamalai", "Tiruvarur", "Vellore", "Viluppuram", "Virudhunagar"];
                    } else if (selectedState === "Tripura") {
                      var districts = ["Dhalai", "Gomati", "Khowai", "North Tripura", "Sepahijala", "South Tripura", "Unakoti", "West Tripura"];
                    } else if (selectedState === "Other") {
                      var districts = ["Other"];
                    }



                    if (districts) {
                      for (var i = 0; i < districts.length; i++) {
                        var option = document.createElement("option");
                        option.text = districts[i];
                        option.value = districts[i];
                        districtSelect.appendChild(option);
                      }
                    }
                  }
                </script>

                <div class="col-md-4">
                  <label for="state">State:</label>
                </div>
                <div class="col-md-8">
                  <select id="state" class="form-control" name="state" onchange="updateDistricts()" required>
                    <option value="">Select State</option>
                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                    <option value="Assam">Assam</option>
                    <option value="Bihar">Bihar</option>
                    <option value="Chhattisgarh">Chhattisgarh</option>
                    <option value="Goa">Goa</option>
                    <option value="Gujarat">Gujarat</option>
                    <option value="Haryana">Haryana</option>
                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                    <option value="Jharkhand">Jharkhand</option>
                    <option value="Karnataka">Karnataka</option>
                    <option value="Kerala">Kerala</option>
                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                    <option value="Maharashtra">Maharashtra</option>
                    <option value="Manipur">Manipur</option>
                    <option value="Meghalaya">Meghalaya</option>
                    <option value="Mizoram">Mizoram</option>
                    <option value="Nagaland">Nagaland</option>
                    <option value="Odisha">Odisha</option>
                    <option value="Punjab">Punjab</option>
                    <option value="Rajasthan">Rajasthan</option>
                    <option value="Sikkim">Sikkim</option>
                    <option value="Tamil Nadu">Tamil Nadu</option>
                    <option value="Telangana">Telangana</option>
                    <option value="Tripura">Tripura</option>
                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                    <option value="Uttarakhand">Uttarakhand</option>
                    <option value="West Bengal">West Bengal</option>
                    <option value="Other">Other</option>
                  </select>
                </div>
                <br><br>

                <div class="col-md-4">
                  <label for="district">District:</label>
                </div>
                <div class="col-md-8">
                  <select id="district" class="form-control" name="district" required>
                    <option value="">Select District</option>
                  </select>
                </div>
                <br><br>
                <div class="col-md-4"><label>Password:</label></div>
                <div class="col-md-8"><input type="password" class="form-control" onkeyup='check();' name="dpassword" id="dpassword" required></div><br><br>
                <div class="col-md-4"><label>Confirm Password:</label></div>
                <div class="col-md-8" id='cpass'><input type="password" class="form-control" onkeyup='check();' name="cdpassword" id="cdpassword" required>&nbsp &nbsp<span id='message'></span> </div><br><br>
                <div class="col-md-4">
                  <label>Available Days:</label>
                </div>
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

              </div>
              <input type="submit" name="docsub" value="Add Doctor" class="btn btn-primary">
            </form>
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
</body>

</html>