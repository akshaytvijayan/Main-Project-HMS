<?php
require('../config.php');
$con = mysqli_connect("localhost", "root", "", "myhmsdb");
session_start();
// $pid=$_SESSION['pid'];
$username = $_SESSION['username'];
// $fname=$_SESSION['fname'];
// $lname=$_SESSION['lname'];
// $gender=$_SESSION['gender'];
// $contact=$_SESSION['contact'];
// $email=$_SESSION['email'];
// $state=$_SESSION['state'];
// $district=$_SESSION['district'];
// $age=$_SESSION['age'];
// $place=$_SESSION['place'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Medilab Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


  <style>
    /* .content{
        display: flex;
    } */
    body,
    html {
      margin: 0;
      padding: 0;
      width: 100%;
      height: 100%;
    }

    .contents {
      display: flex;
      width: 100%;
    }

    .sidebar {
      width: 20%;
      background-color: #ffffff;
      /* Other sidebar styles */
    }

    .content {
      width: 80%;
      background-color: #ffffff;
      /* Other content styles */
    }

    .container {
      margin: 1;
      padding: 1;
    }

    .container-content {
      width: 100%;
    }

    .card {
      border: 1px solid black;
      margin-bottom: 20px;
      /* Adjust as per your preference */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      /* Adjust as per your preference */
    }

    .card::before {
      content: "";
      display: block;
      width: 5px;
      /* Adjust the width of the left line */
      background-color: #007bff;
      /* Adjust the color of the left line */
      position: absolute;
      top: 0;
      bottom: 0;
      left: 0;
    }
  </style>
</head>

<body>

  <!-- ======= Top Bar ======= -->


  <?php
  include('header.php');
  ?>
  <main>
    <div class="contents">
      <div class="sidebar" style="height: 100vh;">
        <div class="list-group list-group-flush mt-4">
          <a href="index.php" class="list-group-item list-group-item-action py-2 ripple " aria-current="true">
            <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Dashboard</span>
          </a>
          <a href="doctor_prescribed.php" class="list-group-item list-group-item-action py-2 ripple ">
            <i class="fas fa-calendar fa-fw me-3"></i><span>Docor Prescribed</span>
          </a>

          <a href="test.php" class="list-group-item list-group-item-action py-2 ripple ">
            <i class="fas fa-chart-area fa-fw me-3"></i><span>Test</span>
          </a>
          <a href="book.php" class="list-group-item list-group-item-action py-2 ripple active">
            <i class="fas fa-users fa-fw me-3"></i><span>Book</span>
          </a>
          <a href="appointment.php" class="list-group-item list-group-item-action py-2 ripple ">
            <i class="fas fa-calendar fa-fw me-3"></i><span>Appointment</span>
          </a>

        </div>
      </div>
      <div class="content">
        <!-- Main content goes here -->
        <div class="container container-content">
          <div class="row">
            <div class="container" style="width: 80%;">
              <h1>Book Appointment</h1>
              <form id="appointment-form" method="post">
                <div class="col-12 mb-3">
                  <div class="row">
                    <div class="col-6">
                      <label for="name">Patient name:</label><span style="color:red;"> *</span>
                      <input class="form-control" type="text" id="name" name="name" value="<?php echo isset($_POST['patient_name']) ? htmlspecialchars($_POST['patient_name']) : ''; ?>" required>
                    </div>
                    <div class="col-6">
                      <label for="email">Patient email:</label><span style="color:red;"> *</span>
                      <input class="form-control" type="email" id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required>
                    </div>
                  </div>
                </div>
                <input type="hidden" name="username" id="username" value="<?php echo $username ?>">




                <div class="col-12">
                  <div class="row">
                    <div class="col-3">
                      <label for="test">Select Test </label><span style="color:red;"> *</span>
                      <select class="form-control" id="test_name" name="test_name">
                        <option disabled selected>Choose</option>
                        <?php
                        // Your database connection code goes here

                        // Your SQL query to fetch data
                        $sql = "SELECT * FROM test_list WHERE status='1'";
                        $result = mysqli_query($con, $sql);

                        // Loop through the query results and populate options
                        while ($row = mysqli_fetch_assoc($result)) {
                          echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                        }
                        ?>
                      </select><br>
                      <script>
                        $(document).ready(function() {
                          // Add change event listener to the select element
                          $('#test_name').change(function() {
                            // Get the selected test name
                            var selectedTest = $(this).val();

                            // Make AJAX request to fetch description and cost
                            $.ajax({
                              url: 'fetch_description_and_cost.php', // Path to your PHP file
                              type: 'POST',
                              data: {
                                test_name: selectedTest
                              },
                              success: function(response) {
                                // Parse the JSON response
                                var data = JSON.parse(response);

                                // Update description and cost fields
                                $('#description').val(data.description);
                                $('#cost').val(data.cost);
                              },
                              error: function(xhr, status, error) {
                                console.error(error);
                              }
                            });
                          });
                        });
                      </script>

                    </div>
                    <div class="col-3">
                      <label for="date">Date </label><span style="color:red;"> *</span>
                      <input class="form-control" type="date" id="date" name="date" onchange="validateDate()" min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" required><br>
                    </div>
                    <div class="col-3">
                      <label for="time">Time </label><span style="color:red;"> *</span>
                      <input class="form-control" type="time" id="time" name="time" onchange="validateTime()" required><br>
                    </div>
                    <div class="col-3">
                      <label for="cost">Cost</label>
                      <input style="background-color:lightgrey;" class="form-control" type="text" name="cost" id="cost" readonly>
                    </div>
                  </div>
                </div>
                <div class="col-12 mb-3">
                  <label for="description">Description</label>
                  <textarea class="form-control" id="reason" name="reason" rows="2" style="resize:none;background-color:lightgrey;" cols="50" readonly><?php echo isset($_POST['reason']) ? htmlspecialchars($_POST['reason']) : ''; ?></textarea><br>
                  <!-- <input style="background-color:lightgrey;" class="form-control" type="text" name="description" id="description" readonly> -->
                </div>

                <label for="reason">Reason for appointment:</label><br>
                <textarea class="form-control" id="reason" name="reason" rows="2" style="resize:none;" cols="50">regular check up</textarea><br>

                <button class="btn btn-success" id="book" onclick="bookAppointment()" type="button">Book Appointment</button>
              </form>
              <div id="message"></div> <!-- Placeholder for displaying messages to the user -->
            </div>
          </div>
        </div>

      </div>
    </div>

  </main>
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Medilab</h3>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Medilab</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template../ Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script>
    function validateDate() {
      var selectedDate = new Date(document.getElementById('date').value);
      // alert(selectedDate);
      var currentTime = new Date();
      var currentMonth = currentTime.getMonth();

      var selectedMonth = selectedDate.getMonth();
      var currentYear = currentTime.getFullYear();
      var selectedYear = selectedDate.getFullYear();

      if (!((selectedYear === currentYear && selectedMonth >= currentMonth && selectedMonth <= currentMonth + 1) || (selectedYear === currentYear + 1 && selectedMonth === 0 && currentMonth === 11))) {
        document.getElementById('message').innerHTML = "Appointment date must be in the current month or the next month.";
      } else {
        document.getElementById('message').innerHTML = "";
      }
    }

    function validateTime() {
      var selectedTime = document.getElementById('time').value;
      var openingTime = new Date();
      openingTime.setHours(9, 0, 0); // 9:00 AM
      var closingTime = new Date();
      closingTime.setHours(16, 0, 0); // 4:00 PM

      var selectedTimeHours = parseInt(selectedTime.split(':')[0]);
      var selectedTimeMinutes = parseInt(selectedTime.split(':')[1]);
      var selectedDateTime = new Date();
      selectedDateTime.setHours(selectedTimeHours, selectedTimeMinutes, 0);

      if (!(selectedDateTime >= openingTime && selectedDateTime <= closingTime)) {
        document.getElementById('message').innerHTML = "Appointment time must be between 9:00 AM and 4:00 PM.";
        document.getElementById('time').style.border = "2px solid red";
        document.getElementById("book").disabled = true;


      } else {
        document.getElementById('message').innerHTML = "";
        document.getElementById('time').style.border = "";
        document.getElementById("book").disabled = false;
      }
    }
  </script>
  <script>
    function bookAppointment() {
      // Get form data
      var nam=document.getElementById('name').value;
      var formData = $('#appointment-form').serialize();

      // Make AJAX request to store appointment details
      $.ajax({
        url: 'store_appointment.php', // Path to your PHP file to store appointment details
        type: 'POST',
        data: formData,
        success: function(response) {
          // Parse the JSON response
          var data = JSON.parse(response);

          // Check status of the response
          if (data.status === 'pending') {
            alert('You have a pending appointment for '+ nam +' on ' + data.date + '. Please update or delete the pending request.');
          } else if (data.status === 'success') {
            alert('Appointment successfully booked!');
            window.location.href = 'book.php';
          } else {
            // Error occurred, display error message
            alert('Error: ' + data.message);
          }
        },
        error: function(xhr, status, error) {
          console.error(error);
        }
      });
    }
  </script>

</body>

</html>