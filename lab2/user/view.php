<?php
require('../config.php');
session_start();
$pid = $_SESSION['pid'];
$username = $_SESSION['username'];
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$gender = $_SESSION['gender'];
$contact = $_SESSION['contact'];
$email = $_SESSION['email'];
$state = $_SESSION['state'];
$district = $_SESSION['district'];
$age = $_SESSION['age'];
$place = $_SESSION['place'];
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

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th,
    td {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    th {
      background-color: #f2f2f2;
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
        <div class="list-group shadow-lg list-group-flush mt-4">
          <a href="index.php" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
            <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Dashboard</span>
          </a>
          <a href="doctor_prescribed.php" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-calendar fa-fw me-3"></i><span>Doctor Prescribed</span>
          </a>
          <a href="book.php" class="list-group-item list-group-item-action py-2 ripple ">
            <i class="fas fa-chart-area fa-fw me-3"></i><span>book appointment</span>
          </a>
          <a href="view.php" class="list-group-item list-group-item-action py-2 ripple active">
            <i class="fas fa-users fa-fw me-3"></i><span>view appointment</span>
          </a>
        </div>
      </div>


      <!-- Main content goes here -->

      <div class="content">
        <div class="container container-content">
          <div class="row">
            <div class="container" style="height: 80vh; overflow-y: scroll;">
              <h1>Appointments</h1>
              <table>
                <thead>
                  <tr>
                    <th>Sl no</th>
                    <!-- <th>Name</th> -->
                    <th>Test</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="appointmentTableBody">
                  <!-- Appointments will be dynamically inserted here -->
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
    </div>

  </main>

  <!-- Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Appointment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="editForm" method="post">
            <input type="hidden" id="editId" name="id">
            <div class="form-group">
              <label for="editDate">Date:</label>
              <input type="date" class="form-control" id="date" name="date" onchange="validateDate()" min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" required>
            </div>
            <div class="form-group">
              <label for="editTime">Time:</label>
              <input type="time" class="form-control" id="time" name="time" onchange="validateTime()" required>
            </div>
            <button type="submit" id="update" class="btn btn-primary mt-5">Update</button>
          </form>
          <div id="message"></div> <!-- Placeholder for displaying messages to the user -->
        </div>
      </div>
    </div>
  </div>


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
  <!-- Include jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- Include Bootstrap JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
  <script>
    // $(document).ready(function() {
    // Function to fetch appointments using AJAX
    function fetchAppointments() {
      // alert("hi");
      $.ajax({
        url: 'fetch_appointments.php', // Path to your PHP script to fetch appointments
        type: 'GET',
        success: function(response) {
          // Clear existing table body
          $('#appointmentTableBody').empty();

          // Append fetched appointments to table body
          $('#appointmentTableBody').append(response);
        },
        error: function(xhr, status, error) {
          console.error(error);
          // Handle error if needed
        }
      });
    }

    // Call fetchAppointments function on document ready to initially populate the table
    fetchAppointments();

    // Form submission handler for edit form
    $('#editForm').submit(function(e) {
      e.preventDefault();
      submitEditForm();
    });
    // });

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
        document.getElementById('time').style.border = "1px solid red";
        document.getElementById("update").disabled = true;

      } else {
        document.getElementById('message').innerHTML = "";
        document.getElementById('time').style.border = "";
        document.getElementById("update").disabled = false;

      }
    }

    function editAppointment(id) {
      // alert("ID: " + id);
      // Add your edit functionality here
      $('#editModal').modal('show');
      $('#editId').val(id);
    }

    function submitEditForm() {
      var date = document.getElementById('date').value;
      var time = document.getElementById('time').value;

      // Get form data
      var formData = $('#editForm').serialize();

      // Make AJAX request to update appointment details
      $.ajax({
        url: 'update_appointment.php', // Path to your PHP file to update appointment details
        type: 'POST',
        data: formData,
        success: function(response) {
          // Handle success response
          alert('Appointment successfully updated!');
          $('#editModal').modal('hide');
          fetchAppointments();
        },
        error: function(xhr, status, error) {
          // Handle error response
          console.error(error);
          // You can display an error message or perform other actions here
        }
      });
      // fetchAppointments();
    }

    function deleteAppointment(id) {
      if (confirm("Are you sure you want to delete this appointment?")) {
        // Make AJAX request to delete the appointment
        $.ajax({
          url: 'delete_appointment.php', // Path to your PHP file to delete the appointment
          type: 'POST',
          data: {
            id: id
          },
          success: function(response) {
            // Handle success response
            alert('Appointment successfully deleted!');
            // You may want to reload or update the appointments list after deletion
            fetchAppointments();
          },
          error: function(xhr, status, error) {
            // Handle error response
            console.error(error);
            // You can display an error message or perform other actions here
          }
        });
      }
    }
    // }
  </script>



</body>

</html>