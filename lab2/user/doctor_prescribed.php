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
    /* Remove spinner arrows for number input */
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
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
      <!-- test booking -->
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
                            <input style="background-color:lightgrey;" type="hidden" class="form-control" id="test_id" name="test_id" readonly>
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
                            <label for="editUserdate">User Date:</label>
                            <input  type="date" class="form-control" id="editUserdate" name="editUserdate">
                        </div>
                        <div class="form-group">
                            <label for="editUserdate">Cost</label>
                            <input   type="text" class="form-control" id="editCost" name="editCost" readonly>
                        </div>
                        <div class="form-group">
                          <label for="time">Time </label><span style="color:red;"> *</span>
                          <input class="form-control" type="time" id="time" name="time" onchange="validateTime()" required>
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-success" id="book" type="submit">Book Appointment</button>
                        </div>
                    </form>
                    <div id="message"></div>
                </div>
            </div>
        </div>
      </div>
      <!-- payment -->
      <div class="modal fade" id="payModal" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Payment Details</h5>
                </div>
                <div class="modal-body">
                    <form id="payForm">
                        <div class="form-group">
                            <label for="editName">Amount to be paid</label>
                            <hr>
                            <input style="background-color:none;border:none;font-weight:bolder;" type="text" class="form-control" id="price" name="price" readonly>
                            <hr>
                            <input style="background-color:lightgrey;" type="hidden" class="form-control" id="testid" name="testid" readonly>

                        </div>
                        <div class="col-md-12">
                            <label for="editEmail">Card Number</label>
                            <input type="text" class="form-control" id="cardNumber" name="cardNumber" required maxlength="19" onkeyup="validateCardNumber(this.value)">
                            <script>
                              function validateCardNumber(inputValue) {
                                  // Remove any non-numeric characters
                                  var cleanedValue = inputValue.replace(/[^\d]/g, '');

                                  // Check if the length is divisible by 4 and add hyphens accordingly
                                  if (cleanedValue.length > 0 && cleanedValue.length <= 16) {
                                      var formattedValue = cleanedValue.match(new RegExp('.{1,4}', 'g')).join('-');

                                      // Update the input value
                                      document.getElementById('cardNumber').value = formattedValue;

                                      // Reset border color if it was previously set to red
                                      if(cleanedValue.length != 16 ){
                                        document.getElementById('cardNumber').style.borderColor = 'red';
                                      }else{
                                        document.getElementById('cardNumber').style.borderColor = '';
                                      }
                                      // document.getElementById('cardNumber').style.borderColor = '';
                                  } else {
                                      // Set border color to red if the length is less than 16 or greater than 16
                                      document.getElementById('cardNumber').style.borderColor = 'red';
                                  }
                              }
                            </script>

                        </div>
                        <div class="col-md-12">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="month">Month</label>
                              <select class="form-control" name="month" id="month">
                              </select>
                            </div><br>
                            <div class="col-md-6">
                              <label for="year">Year</label>
                              <select class="form-control" name="year" id="year"></select>
                            </div>
                          </div>
                        </div>
                        <div class="col-6 mt-3 mb-5">
                          <label for="cvv">CVV</label>
                          <input class="form-control" type="password" name="cvv" id="cvv" required maxlength="3" pattern="[0-9]{3}">
                        </div>
                        <script>
                          // Get the select elements
                          var monthSelect = document.getElementById('month');
                          var yearSelect = document.getElementById('year');

                          // Add disabled option for month
                          var monthDisabledOption = document.createElement('option');
                          monthDisabledOption.text = "Select Month";
                          monthDisabledOption.disabled = true;
                          monthDisabledOption.selected = true; // Select this option by default
                          monthSelect.appendChild(monthDisabledOption);

                          // Array of months
                          var months = [
                              "January", "February", "March", "April", "May", "June",
                              "July", "August", "September", "October", "November", "December"
                          ];

                          // Populate the select element with options for months
                          for (var i = 0; i < months.length; i++) {
                              var option = document.createElement('option');
                              option.text = months[i];
                              option.value = i + 1; // You can set the value as the month number if needed
                              monthSelect.appendChild(option);
                          }

                          // Add disabled option for year
                          var yearDisabledOption = document.createElement('option');
                          yearDisabledOption.text = "Select Year";
                          yearDisabledOption.disabled = true;
                          yearDisabledOption.selected = true; // Select this option by default
                          yearSelect.appendChild(yearDisabledOption);

                          // Get the current year
                          var currentYear = new Date().getFullYear();

                          // Populate the select element with options for years
                          for (var i = currentYear; i < currentYear + 10; i++) {
                              var option = document.createElement('option');
                              option.text = i;
                              option.value = i;
                              yearSelect.appendChild(option);
                          }
                        </script>
                        <script>
                          function disableFields() {
                              // Disable card input fields
                              document.getElementById('cardNumber').disabled = true;
                              document.getElementById('month').disabled = true;
                              document.getElementById('year').disabled = true;
                              document.getElementById('cvv').disabled = true;

                              // Show OTP input field and "Verify OTP" button
                              document.getElementById('otpField').style.display = 'block';
                              document.getElementById('verifyOTPButton').style.display = 'block';
                              document.getElementById('getOTPButton').disabled = true;
                              return true;
                          }

                          function verifyOTP() {
                              var enteredOTP = document.getElementById('otp').value;

                              // Check if entered OTP is correct
                              if (enteredOTP === '1234') {
                                  // Enable card input fields
                                  // document.getElementById('cardNumber').disabled = true;
                                  // document.getElementById('month').disabled = true;
                                  // document.getElementById('year').disabled = true;
                                  // document.getElementById('cvv').disabled = true;

                                  // Hide OTP input field and "Verify OTP" button
                                  document.getElementById('otpField').style.display = 'none';
                                  document.getElementById('verifyOTPButton').style.display = 'none';
                                  document.getElementById('payButton').disabled = false;
                                  alert('OTP verified successfully');
                                  return false;
                              } else {
                                  // Display an alert for wrong OTP
                                  alert('Wrong OTP');
                                  return false;
                              }
                          }
                        </script>
                        <!-- OTP field and "Verify OTP" button -->
                        <div class="col-md-12 mb-3" id="otpField" style="display: none;">
                            <label for="otp">Enter OTP</label>
                            <input class="form-control" type="text" name="otp" id="otp" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <button class="btn btn-primary" id="verifyOTPButton" style="display: none;" onclick="return verifyOTP()">Verify OTP</button>
                        </div>

                        <div class="modal-footer">
                          <button class="btn btn-success" id="getOTPButton" onclick="return disableFields()">Get OTP</button>
                          <button class="btn btn-primary" id="payButton" type="submit" disabled>pay now</button>
                        </div>
                    </form>
                    <div id="message"></div>
                </div>
            </div>
        </div>
      </div>
      <div class="content" style="height: 100vh;">
        <!-- Main content goes here -->
        <div class="container container-content mt-5">
          <div class="table-container" style="height: 80vh; overflow-y: scroll;">
            <table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%" style="height: 100%;">
              <thead>
                <tr class="text-center">
                  <th class="th-sm">Sl no</th>
                  <th class="th-sm">Patient Name</th>
                  <th class="th-sm">Email</th>
                  <th class="th-sm">Test</th>
                  <th class="th-sm">Price</th>
                  <th class="th-sm">Prescribed by </th>
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
  <script src="../assets/js/main.js"></script>

  <!-- Include Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    fetchAppointments();

    function fetchAppointments() {
      var username = '<?php echo urlencode($username); ?>';

      $.ajax({
        url: 'fetch_doc_appointments.php',
        type: 'GET',
        data: {
          username: username
        },
        success: function(response) {
          $('#appointmentTableBody').html(response);
        },
        error: function(xhr, status, error) {
          console.error(error);
        }
      });
    }
    function opens(patientName, email,test_id, medicalTest,price, doctor, userdate) {
        $("#editName").val(patientName);
        $("#editEmail").val(email);
        $("#test_id").val(test_id);
        $("#editMedicalTest").val(medicalTest);
        $("#editCost").val(price);
        $("#editDoctor").val(doctor);
        $("#editUserdate").val(userdate);

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
        var formData = {
            patientName: $("#editName").val(),
            email: $("#editEmail").val(),
            test_id: $("#test_id").val(),
            medicalTest: $("#editMedicalTest").val(),
            description: $("#editDescription").val(),
            doctor: $("#editDoctor").val(),
            userdate: $("#editUserdate").val(),
            cost: $("#editCost").val(),
            time: $("#time").val()
        };

        $.ajax({
            type: "POST",
            url: "booking_appointment.php", 
            data: formData,
            success: function(response) {
                alert(response);
                $('#myModal').modal('hide');
                fetchAppointments();
            }
        });

        return false;
    }
    function payed(test_id,price) {
      $("#testid").val(test_id);
      $("#price").val(price);

      $('#payModal').modal('show');
    }


    document.getElementById('payButton').addEventListener('click', function() {
      // Extract the value from the hidden input field
      var testId = document.getElementById('testid').value;
      // alert(testId);
      // Make an AJAX request to update the database
      $.ajax({
          url: 'update_test.php',
          type: 'POST',
          dataType: 'json', // Specify that the expected response is JSON
          data: {
              test_id: testId
          },
          success: function(response) {
              // if (response.status === 'success') {
              //     // Enable the payButton if the update was successful
              //     // document.getElementById('payButton').disabled = false;
              //     alert(response.message);
              //     alert('Payment Succesfull!!!');
              //     fetchAppointments();
              // } else {
              //     // Handle the case where the update failed
              //     alert(response.message);
              // }
          },
          error: function(xhr, status, error) {
              // // Handle errors
              alert('Payment Succesfull!!!');
              // console.error(error);
          }
      });
    });
  </script>





</body>

</html>