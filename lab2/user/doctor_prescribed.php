<?php
session_start();
$username = $_SESSION['username'];
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

  <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->


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

    /* Hide scrollbar for the container */
    .table-container::-webkit-scrollbar {
      display: none;
    }

    /* Make sure the table headers remain visible */
    .table-container thead {
      position: sticky;
      top: 0;
      background-color: white;
      /* Adjust as needed */
      z-index: 1;
    }
  </style>
</head>

<body>

  <!-- ======= Top Bar ======= -->


  <!-- ======= Header ======= -->
  <?php
  include('header.php');
  ?>
  <!-- ======= Header ======= -->
  <main>
    <div class="contents">
      <div class="sidebar" style="height: 100vh;">
        <div class="list-group list-group-flush mt-4">
          <a href="index.php" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
            <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Dashboard</span>
          </a>
          <a href="doctor_prescribed.php" class="list-group-item list-group-item-action py-2 ripple active">
            <i class="fas fa-calendar fa-fw me-3"></i><span>Doctor Prescribed</span>
          </a>
          <a href="book.php" class="list-group-item list-group-item-action py-2 ripple ">
            <i class="fas fa-chart-area fa-fw me-3"></i><span>book appointment</span>
          </a>
          <a href="view.php" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-users fa-fw me-3"></i><span>view appointment</span>
          </a>

        </div>
      </div>
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editModalLabel">Appointment Details</h5>
            </div>
            <div class="modal-body">
              <form id="editForm" onsubmit="return bookAppointment()">
                <div class="form-group">
                  <label for="editName">Patient Name:</label>
                  <input style="background-color:lightgrey;" type="text" class="form-control" id="editName" name="editName" readonly>
                </div>
                <div class="form-group">
                  <label for="editEmail">Email:</label>
                  <input style="background-color:lightgrey;" type="email" class="form-control" id="editEmail" name="editEmail" readonly>
                </div>
                <div class="form-group">
                  <label for="editMedicalTest">Medical Test:</label>
                  <input style="background-color:lightgrey;" type="text" class="form-control" id="editMedicalTest" name="editMedicalTest" readonly>
                </div>
                <div class="form-group">
                  <label for="editUserdate">Description</label>
                  <input style="background-color:lightgrey;" type="text" class="form-control" id="editDescription" value="NA" name="editDescription" readonly>
                </div>
                <div class="form-group">
                  <label for="editDoctor">Doctor:</label>
                  <input style="background-color:lightgrey;" type="text" class="form-control" id="editDoctor" name="editDoctor" readonly>
                </div>
                <div class="form-group">
                  <label for="editUserdate">Cost</label>
                  <input style="background-color:lightgrey;" type="text" class="form-control" id="editCost" name="editCost" required>
                </div>
                <div class="form-group">
                  <label for="editUserdate">User Date:</label>
                  <input type="Date" class="form-control" id="editUserdate" name="editUserdate">
                </div>

                <div class="form-group">
                  <label for="time">Time </label><span style="color:red;"> *</span>
                  <input class="form-control" type="time" id="time" name="time" onchange="validateTime()" required>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-success" id="book" onclick="bookAppointment()" type="submit">Book Appointment</button>
                </div>
              </form>
              <div id="message"></div>
            </div>
          </div>
        </div>
      </div>

      <script>
        function opens(patientName, email, medicalTest, doctor, userdate) {
          $("#editName").val(patientName);
          $("#editEmail").val(email);
          $("#editMedicalTest").val(medicalTest);
          $("#editDoctor").val(doctor);
          $("#editUserdate").val(userdate);
          // alert(patientName);
          // alert(email);
          // alert(medicalTest);
          // alert(doctor);
          // alert(userdate);

          $('#myModal').modal('show');
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

        function bookAppointment() {
          // Gather form data
          var formData = {
            patientName: $("#editName").val(),
            email: $("#editEmail").val(),
            medicalTest: $("#editMedicalTest").val(),
            description: $("#editDescription").val(),
            doctor: $("#editDoctor").val(),
            userdate: $("#editUserdate").val(),
            cost: $("#editCost").val(),
            time: $("#time").val()
          };

          // Send AJAX request
          $.ajax({
            type: "POST",
            url: "booking_appointment.php", // PHP script to handle the request
            data: formData,
            success: function(response) {
              // Handle the response
              alert(response);
            }
          });

          // Prevent default form submission
          return false;
        }
      </script>


      <div class="content" style="height: 100vh;">
        <!-- Main content goes here -->
        <div class="container container-content mt-5">
          <div class="table-container" style="height: 80vh; overflow-y: scroll;">
            <table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%" style="height: 100%;">
              <thead>
                <tr class="text-center">
                  <th class="th-sm">Sl no</th>
                  <th class="th-sm">Patient Name</th>
                  <th class="th-sm">Patient Email</th>
                  <th class="th-sm">Test</th>
                  <th class="th-sm">Prescribed Doc_id</th>

                  <th class="th-sm">Prescribed Date</th>
                  <th class="th-sm">Action</th>
                </tr>
              </thead>
              <tbody class="text-center" id="appointmentTableBody"></tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
    <div>
    </div>

  </main>


  <footer id="footer">

    <div class="footer-top">



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
  <!-- Include Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Template../ Main JS File -->
  <script src="../assets/js/main.js"></script>

  <!-- jQuery library -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- DataTables CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <script>
    // AJAX request to fetch appointments
    fetchAppointments();

    function fetchAppointments() {
      // Get the username from PHP and encode it for URL
      var username = '<?php echo urlencode($username); ?>';

      $.ajax({
        url: 'fetch_doc_appointments.php', // Path to your PHP script to fetch appointments
        type: 'GET',
        data: {
          username: username
        }, // Pass the username as a parameter
        success: function(response) {
          $('#appointmentTableBody').html(response);
        },
        error: function(xhr, status, error) {
          console.error(error);
          // Handle error if needed
        }
      });
    }
  </script>

  <script>
    function openModal(id) {
      //     // Get the modal
      //     // var modal = document.getElementById("myModal_" + id);
      //     // // var modal = "myModal_" + id;
      //     // // alert(modal);
      //     // // Get the button that opens the modal
      //     // var btn = document.getElementById("myBtn");
      //     // // Get the <span> element that closes the modal
      //     // var span = document.getElementsByClassName("close")[0];
      //     // // When the user clicks the button, open the modal
      //     // modal.style.display = "block";
      //     // // When the user clicks on <span> (x), close the modal
      //     // span.onclick = function() {
      //     //     modal.style.display = "none";
      //     // }
      //     // // When the user clicks anywhere outside of the modal, close it
      //     // window.onclick = function(event) {
      //     //     if (event.target == modal) {
      //     //         modal.style.display = "none";
      //     //     }
      //     // }
      $('#myModal_' + id).modal('show');
    }
  </script>
  <!-- <script>
    // Wait for the document to be fully loaded
    $(document).ready(function() {
        // Function to open modal
        function openModal(id) {
            $('#myModal_' + id).modal('show');
        }
    });
</script> -->





</body>

</html>