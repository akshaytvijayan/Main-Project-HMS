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

  $appdate = $_POST['userdate'];
  // // $apptime = $_POST['apptime'];
  // $cur_date = date("Y-m-d");
  // date_default_timezone_set('Asia/Kolkata');
  // $cur_time = date("H:i:s");
  // // $apptime1 = strtotime($apptime);
  // $appdate1 = strtotime($appdate);

  // if (date("Y-m-d", $appdate1) >= $cur_date) {
  //   if ((date("Y-m-d", $appdate1) == $cur_date and date("H:i:s") > $cur_date) or date("Y-m-d", $appdate1) > $cur_date) {
      $check_query = mysqli_query($con, "select * from appointmenttb where doctor='$doctor' and appdate='$appdate'");

      if (mysqli_num_rows($check_query) == 0) {

        $result = "insert into appointmenttb(pid,fname,lname,gender,email,contact,doctor,docFees,appdate,userStatus,doctorStatus) values('$pid','$fname','$lname','$gender','$email','$contact','$doctor','$docFees','$appdate','1','1')";
        $query = mysqli_query($con, $result);
        if ($query) {
          echo "<script>alert('Your appointment successfully booked');</script>";
        } else {
          echo "<script>alert('Unable to process your request. Please try again!');</script>";
        }
      } else {
        echo "<script>alert('We are sorry to inform that the doctor is not available in this time or date. Please choose different time or date!');</script>";
      }
    }
  //    else {
  //     echo "<script>alert('Select a time or date in the future!');</script>";
  //   }
  // } else {
  //   echo "<script>alert('Select a time or date in the future!');</script>";
  // }
// }

if (isset($_GET['cancel'])) {
  $query = mysqli_query($con, "update appointmenttb set userStatus='0' where ID = '" . $_GET['ID'] . "'");
  if ($query) {
    echo "<script>alert('Your appointment successfully cancelled');</script>";
  }
}





function generate_bill()
{
  $con = mysqli_connect("localhost", "root", "", "myhmsdb");
  $pid = $_SESSION['pid'];
  $output = '';
  $query = mysqli_query($con, "select p.pid,p.ID,p.fname,p.lname,p.doctor,p.appdate,p.apptime,p.disease,p.allergy,p.prescription,a.docFees from prestb p inner join appointmenttb a on p.ID=a.ID and p.pid = '$pid' and p.ID = '" . $_GET['ID'] . "'");
  while ($row = mysqli_fetch_array($query)) {
    $output .= '
    <label> Patient ID : </label>' . $row["pid"] . '<br/><br/>
    <label> Appointment ID : </label>' . $row["ID"] . '<br/><br/>
    <label> Patient Name : </label>' . $row["fname"] . ' ' . $row["lname"] . '<br/><br/>
    <label> Doctor Name : </label>' . $row["doctor"] . '<br/><br/>
    <label> Appointment Date : </label>' . $row["appdate"] . '<br/><br/>
    <label> Appointment Time : </label>' . $row["apptime"] . '<br/><br/>
    <label> Disease : </label>' . $row["disease"] . '<br/><br/>
    <label> Allergies : </label>' . $row["allergy"] . '<br/><br/>
    <label> Prescription : </label>' . $row["prescription"] . '<br/><br/>
    <label> Fees Paid : </label>' . $row["docFees"] . '<br/>
    
    ';
  }

  return $output;
}


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

          <a class="list-group-item list-group-item-action" href="#app-hist" id="list-pat-list" role="tab" data-toggle="list" aria-controls="home">Appointment History</a>
          <a class="list-group-item list-group-item-action" href="#list-pres" id="list-pres-list" role="tab" data-toggle="list" aria-controls="home">Prescriptions</a>


        </div><br>
      </div>
      <div class="col-md-8" style="margin-top: 3%;">
        <div class="tab-content" id="nav-tabContent" style="width: 100%;">


          <div class="tab-pane fade  show active" id="list-dash" role="tabpanel" aria-labelledby="list-dash-list">
            <div class="container-fluid container-fullw bg-white">
              <div class="row">
                <div class="col-sm-4" style="left: 5%">
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

                <div class="col-sm-4" style="left: 10%">
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
              </div>

              <div class="col-sm-4" style="left: 20%;margin-top:5%">
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

          <!-- profile -->
          <div class="tab-pane fade" id="list-update" role="tabpanel" aria-labelledby="list-update-list">

            <div class="container-fluid">
              <div class="card">
                <div class="card-body"></div>
                <center>
                  <h4>View Profile</h4><a href="editprofile.php"><i class="fa fa-pen"></i></a>
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

                      <div class="container">
                        <div class="row">


                          <div class="col-sm">
                            <label for="fname">First Name:</label>
                            <input type="text" id="fname" name="fname" class="form-control" value="<?php echo $row['fname']; ?>" readonly>
                          </div>
                          <div class="col-sm">
                            <label for="lname">Last Name:</label>
                            <input type="text" id="lname" name="lname" class="form-control" value="<?php echo $row['lname']; ?>" readonly>
                          </div>
                          <div class="col-sm">
                            <label for="email">Email:</label>
                            <input type="text" id="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" readonly>
                          </div>
                        </div>
                        <div class="row">

                          <div class="col-sm">
                            <label for="gender">Gender</label>
                            <input type="text" id="gender" name="gender" class="form-control" value="<?php echo $row['gender']; ?>" readonly>
                          </div>
                          <div class="col-sm">
                            <label for="contact">Contact:</label>
                            <input type="text" id="contact" name="contact" class="form-control" value="<?php echo $row['contact']; ?>" readonly>
                          </div>
                          <div class="col-sm">
                            <label for="state">State:</label>
                            <input type="text" id="state" name="state" class="form-control" value="<?php echo $row['state']; ?>" readonly>
                          </div>
                        </div>
                        <div class="row">

                          <div class="col-sm">
                            <label for="district">District</label>
                            <input type="text" id="district" name="district" class="form-control" value="<?php echo $row['district']; ?>" readonly>
                          </div>
                          <div class="col-sm">
                            <label for="age">Age:</label>
                            <input type="text" id="age" name="age" class="form-control" value="<?php echo $row['age']; ?>" readonly>
                          </div>
                          <div class="col-sm">
                            <label for="place">Place:</label>
                            <input type="text" id="place" name="place" class="form-control" value="<?php echo $row['place']; ?>" readonly>

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
                      <div class="col-md-8">
                        <select name="doctor" class="form-control" id="doctor" required="required">
                          <option value="" disabled selected>Select Doctor</option>
                          <!-- values -->
                        </select>
                      </div>
                      <br/><br/>
                      <link href='fullcalendar/main.css' rel='stylesheet' />
                      <script src='fullcalendar/main.js'></script>
                      <script>
                        document.getElementById('doctor').onchange = function updateFees(e) {
                            var fees = document.querySelector(`[value="${this.value}"]`).getAttribute('data-value');
                            var date = document.querySelector(`[value="${this.value}"]`).getAttribute('data-time');
                            document.getElementById('docFees').value = fees;
                            document.getElementById('availableDays').value = date;
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
                                userdateSelect.selectedIndex = 0; // Selecting the "Choose date" option
                            }
                            // function displayCalendar(availableDays) {
                            //   const calendar = document.querySelector('.calendar');
                            //   calendar.innerHTML = ''; // Clear previous calendar

                            //   const daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

                            //   daysOfWeek.forEach(day => {
                            //       const dayElement = document.createElement('div');
                            //       dayElement.classList.add('day');
                            //       dayElement.textContent = day;
                            //       if (availableDays.includes(day)) {
                            //           calendar.appendChild(dayElement);
                            //       } else {
                            //           dayElement.classList.add('disabled');
                            //           calendar.appendChild(dayElement);
                            //       }
                            //   });
                            // }

                            // // Example usage:
                            // const availableDaysValue = document.getElementById('availableDays').value;
                            // const availableDays = availableDaysValue.split(',').map(day => day.trim());
                            // displayCalendar(availableDays);

                        }
                      </script>
                      <div class="col-md-4"><label for="consultancyfees">
                          Consultancy Fees
                        </label></div>
                      <div class="col-md-8">
                        <!-- <div id="docFees">Select a doctor</div> -->
                        <input class="form-control" type="text" name="docFees" id="docFees" readonly="readonly" />
                      </div><br><br>

                      <div class="col-md-4"><label for="consultancyfees">
                          Available Days
                        </label></div>
                      <div class="col-md-8">
                        <input class="form-control" type="text" name="availableDays" id="availableDays" readonly="readonly" />
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
                        <div class="calendar" style="display: block;">
                          <?php include('cal.php') ?>
                        </div>
                      </div>
                      <!-- <script src="calendar.js"></script> -->
                      <script>
                        // // Function to display the calendar based on the selected date
                        // function displayCalendar(selectedDate) {
                        //     const calendarDiv = document.getElementById('calendar');
                        //     calendarDiv.innerHTML = ''; // Clear previous calendar

                        //     // Create a new Date object based on the selected date
                        //     const date = new Date(selectedDate);

                        //     // Example: Display the month and year
                        //     const monthYear = document.createElement('h3');
                        //     monthYear.textContent = date.toLocaleString('default', { month: 'long' }) + ' ' + date.getFullYear();
                        //     calendarDiv.appendChild(monthYear);

                        //     // Add your logic to generate the calendar based on the selected date
                        //     // For simplicity, I'm just displaying the selected date in this example
                        //     const selectedDateElement = document.createElement('p');
                        //     selectedDateElement.textContent = 'Selected Date: ' + selectedDate;
                        //     calendarDiv.appendChild(selectedDateElement);
                        // }

                        // // Add onchange event listener to the userdate select element
                        // document.getElementById('userdate').onchange = function() {
                        //     const selectedDate = this.value; // Get the selected date
                        //     displayCalendar(selectedDate); // Call the displayCalendar function
                        // };

                        // // Function to display the calendar based on the selected day
                        // function displayCalendar(selectedDay) {
                        //     const calendarDiv = document.getElementById('calendar');
                        //     calendarDiv.innerHTML = ''; // Clear previous calendar

                        //     // Create a new Date object for the current month
                        //     const today = new Date();
                        //     const currentMonth = today.getMonth();
                        //     const currentYear = today.getFullYear();

                        //     // Find the first occurrence of the selected day in the current month
                        //     const firstDayOfMonth = new Date(currentYear, currentMonth, 1);
                        //     const firstDayOfWeek = firstDayOfMonth.getDay(); // 0 for Sunday, 1 for Monday, etc.
                        //     const selectedDayIndex = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'].indexOf(selectedDay);
                        //     let firstOccurrenceDate = 1 + (selectedDayIndex - firstDayOfWeek + 7) % 7;

                        //     // Create a table to display the calendar
                        //     const table = document.createElement('table');
                        //     const tbody = document.createElement('tbody');

                        //     // Create a header row with day names
                        //     const headerRow = document.createElement('tr');
                        //     ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'].forEach(day => {
                        //         const th = document.createElement('th');
                        //         th.textContent = day;
                        //         headerRow.appendChild(th);
                        //     });
                        //     tbody.appendChild(headerRow);

                        //     // Create rows and cells for each week in the month
                        //     while (true) {
                        //         const weekRow = document.createElement('tr');
                        //         for (let i = 0; i < 7; i++) {
                        //             const cell = document.createElement('td');
                        //             if (firstOccurrenceDate <= 0 || firstOccurrenceDate > new Date(currentYear, currentMonth + 1, 0).getDate()) {
                        //                 cell.textContent = '';
                        //             } else {
                        //                 cell.textContent = firstOccurrenceDate;
                        //                 // Add click event listener to select the date
                        //                 cell.addEventListener('click', function() {
                        //                     const selectedDate = currentYear + '-' + (currentMonth + 1) + '-' + (firstOccurrenceDate < 10 ? '0' + firstOccurrenceDate : firstOccurrenceDate);
                        //                     console.log('Selected Date:', selectedDate);
                        //                     // You can perform any action here with the selected date
                        //                 });
                        //             }
                        //             weekRow.appendChild(cell);
                        //             firstOccurrenceDate++;
                        //         }
                        //         tbody.appendChild(weekRow);
                        //         if (firstOccurrenceDate > new Date(currentYear, currentMonth + 1, 0).getDate()) break;
                        //     }

                        //     table.appendChild(tbody);
                        //     calendarDiv.appendChild(table);
                        // }

                        // // Example usage:
                        // const selectedDay = 'Sunday'; // Get the selected day from the userdate select element
                        // displayCalendar(selectedDay);
                        


                      </script>
                      <!-- <script>
$(document).ready(function() {
  $('#userdate').change(function() {
    var selectedDay = $(this).val();
    var currentDate = moment().isoWeekday();
    var selectedDate = moment().isoWeekday(selectedDay);

    // If selected day is before current day, add 7 days to get next occurrence
    if (selectedDate < currentDate) {
      selectedDate.add(7, 'days');
    }

    // Destroy previous calendar instance
    $('#calendar').fullCalendar('destroy');

    // Initialize new FullCalendar instance with the default view set to 'month'
    $('#calendar').fullCalendar({
      defaultView: 'month',
      defaultDate: selectedDate,
      selectable: true,
      // Add any necessary event handlers for the calendar here
    });
  });
});
</script> -->



                      <div class="col-md-4">
                        <input type="submit" name="app-submit" value="Create new entry" class="btn btn-primary" id="inputbtn">
                      </div>
                      <div class="col-md-8"></div>
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
                  <th scope="col">Appointment Date</th>
                  <th scope="col">Appointment Time</th>
                  <th scope="col">Current Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php

                $con = mysqli_connect("localhost", "root", "", "myhmsdb");
                global $con;

                $query = "select ID,doctor,docFees,appdate,apptime,userStatus,doctorStatus from appointmenttb where fname ='$fname' and lname='$lname';";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($result)) {

                  #$fname = $row['fname'];
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
                      <?php echo $row['apptime']; ?>
                    </td>

                    <td>
                      <?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) {
                        echo "Active";
                      }
                      if (($row['userStatus'] == 0) && ($row['doctorStatus'] == 1)) {
                        echo "Cancelled by You";
                      }

                      if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 0)) {
                        echo "Cancelled by Doctor";
                      }
                      ?>
                    </td>

                    <td>
                      <?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) { ?>


                        <a href="admin-panel.php?ID=<?php echo $row['ID'] ?>&cancel=update" onClick="return confirm('Are you sure you want to cancel this appointment ?')" title="Cancel Appointment" tooltip-placement="top" tooltip="Remove"><button class="btn btn-danger">Cancel</button></a>
                      <?php } else {

                        echo "Cancelled";
                      } ?>

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

                  <th scope="col">Doctor Name</th>
                  <th scope="col">Appointment ID</th>
                  <th scope="col">Appointment Date</th>
                  <th scope="col">Appointment Time</th>
                  <th scope="col">Diseases</th>
                  <th scope="col">Allergies</th>
                  <th scope="col">Prescriptions</th>
                  <th scope="col">Bill Payment</th>
                </tr>
              </thead>
              <tbody>
                <?php

                $con = mysqli_connect("localhost", "root", "", "myhmsdb");
                global $con;

                $query = "select doctor,ID,appdate,apptime,disease,allergy,prescription from prestb where pid='$pid';";

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
                                <td><?php echo $row['doctor']; ?></td>
                                <td><?php echo $row['ID']; ?></td>
                                <td><?php echo $row['appdate']; ?></td>
                                <td><?php echo $row['apptime']; ?></td>
                                <td><?php echo $row['disease']; ?></td>
                                <td><?php echo $row['allergy']; ?></td>
                                <td><?php echo $row['prescription']; ?></td>
                                <td>
                                    <form method="get">
                                        <a href="admin-panel.php?ID=<?php echo $row['ID'] ?>">
                                            <input type="hidden" name="ID" value="<?php echo $row['ID'] ?>" />
                                            <input type="submit" onclick="alert('Bill Paid Successfully');" name="generate_bill" class="btn btn-success" value="Pay Bill" />
                                        </a>
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
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js">
  </script>



</body>

</html>