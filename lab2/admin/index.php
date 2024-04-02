<?php
session_start();
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>NEETHI</title>
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
      width: 90%;

    }

    .card-title-container {
      display: flex;
      align-items: center;
    }

    .icon-container {
      margin-right: 10px;
      /* Adjust margin as needed */
    }

    .title-container {
      margin: 0;
    }


    .card {
      border: none;
      margin-bottom: 20px;

      border-radius: 8px;
      background-color: whitesmoke;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
    }

    .card:hover {
      transform: translateY(-3px);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .card-body {
      padding: 10px;
    }

    .card-title {
      font-size: 1.2rem;
      font-weight: bold;
      margin-bottom: 6px;
      color: gainsboro;
    }

    .card-text {
      font-size: 1rem;
      color: white;
    }

    /* Number cards */
    .number-card {
      background-color: grey;
      color: #fff;
      text-align: center;
      padding: 15px;
      border-radius: 8px;
    }

    .number-card p {
      margin: 0;
      font-size: 1.2rem;
      font-weight: bold;
    }

    .number-card h5 {
      margin-bottom: 6px;
    }

    /* Footer styles */
    #footer {
      background-color: #343a40;
      color: #fff;
      padding: 20px 0;
    }

    #footer a {
      color: #fff;
    }

    #footer a:hover {
      color: #007bff;
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
          <a href="index.php" class="list-group-item list-group-item-action py-2 ripple active" aria-current="true">
            <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Dashboard</span>
          </a>

          <a href="test.php" class="list-group-item list-group-item-action py-2 ripple ">
            <i class="fas fa-chart-area fa-fw me-3"></i><span>Test</span>
          </a>
          <a href="staff.php" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-users fa-fw me-3"></i><span>Staff</span>
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

            <div class="col">
              <div class="card number-card">
                <div class="card-body">

                  <div class="card-title-container">
                    <div class="icon-container">

                      <h6><i class="fa-regular fa-square-check" aria-hidden="true" style="font-size: 300%;"></i></h6>
                    </div>
                    <div class="title-container">
                      <h5 class="card-title">Successful Appointments</h5>
                    </div>
                  </div>
                  <p class="card-text">
                    <?php
                    // Establish database connection
                    $con = mysqli_connect("localhost", "root", "", "myhmsdb");

                    // Check if the connection is successful
                    if (mysqli_connect_errno()) {
                      echo "Failed to connect to MySQL: " . mysqli_connect_error();
                      exit();
                    }

                    // Query to retrieve the count of successful appointments
                    $query = "SELECT COUNT(*) AS successful_appointments FROM appointments WHERE status = 'success'";

                    // Execute the query
                    $result = mysqli_query($con, $query);

                    // Check if the query was executed successfully
                    if ($result) {
                      // Fetch the count of successful appointments
                      $row = mysqli_fetch_assoc($result);
                      $successfulAppointments = $row['successful_appointments'];
                      echo $successfulAppointments;
                    } else {
                      // If an error occurred while executing the query
                      echo "Error fetching successful appointments: " . mysqli_error($con);
                    }

                    // Close the database connection
                    mysqli_close($con);
                    ?>
                  </p>
                </div>
              </div>
            </div>

            <div class="col">
              <div class="card number-card">
                <div class="card-body">
                  <div class="card-title-container">
                    <div class="icon-container">
                      <h6><i class="fas fa-clock" aria-hidden="true" style="font-size: 300%;"></i></h6>
                    </div>
                    <div class="title-container">
                      <h5 class="card-title">Pending Appointments</h5>
                    </div>
                  </div>
                  <p class="card-text">
                    <?php
                    // Establish database connection
                    $con = mysqli_connect("localhost", "root", "", "myhmsdb");

                    // Check if the connection is successful
                    if (mysqli_connect_errno()) {
                      echo "Failed to connect to MySQL: " . mysqli_connect_error();
                      exit();
                    }

                    // Query to retrieve the count of pending appointments
                    $query = "SELECT COUNT(*) AS pending_appointments FROM appointments WHERE status = 'pending'";

                    // Execute the query
                    $result = mysqli_query($con, $query);

                    // Check if the query was executed successfully
                    if ($result) {
                      // Fetch the count of pending appointments
                      $row = mysqli_fetch_assoc($result);
                      $pendingAppointments = $row['pending_appointments'];
                      echo $pendingAppointments;
                    } else {
                      // If an error occurred while executing the query
                      echo "Error fetching pending appointments";
                    }

                    // Close the database connection
                    mysqli_close($con);
                    ?>
                  </p>
                </div>
              </div>
            </div>



            <div class="col">
              <div class="card number-card">
                <div class="card-body">
                  <div class="card-title-container">
                    <div class="icon-container">
                      <h6><i class="fa-solid fa-square-xmark" aria-hidden="true" style="font-size: 300%;"></i>
                      </h6>
                    </div>
                    <div class="title-container">
                      <h5 class="card-title">Rejected Appointments</h5>
                    </div>
                  </div>
                  <p class="card-text">
                    <?php
                    // Establish database connection
                    $con = mysqli_connect("localhost", "root", "", "myhmsdb");

                    // Check if the connection is successful
                    if (mysqli_connect_errno()) {
                      echo "Failed to connect to MySQL: " . mysqli_connect_error();
                      exit();
                    }

                    // Query to retrieve the count of rejected appointments
                    $query = "SELECT COUNT(*) AS rejected_appointments FROM appointments WHERE status = 'rejected'";

                    // Execute the query
                    $result = mysqli_query($con, $query);

                    // Check if the query was executed successfully
                    if ($result) {
                      // Fetch the count of rejected appointments
                      $row = mysqli_fetch_assoc($result);
                      $rejectedAppointments = $row['rejected_appointments'];
                      echo $rejectedAppointments;
                    } else {
                      // If an error occurred while executing the query
                      echo "Error fetching rejected appointments: " . mysqli_error($con);
                    }

                    // Close the database connection
                    mysqli_close($con);
                    ?>
                  </p>
                </div>
              </div>
            </div>





            <div class="col">
              <div class="card number-card">
                <div class="card-body">
                  <div class="card-title-container">
                    <div class="icon-container">
                      <h6><i class="fa-solid fa-envelope" aria-hidden="true" style="font-size: 300%;"></i></h6>
                    </div>
                    <div class="title-container">
                      <h5 class="card-title">Total Appointments</h5>
                    </div>
                  </div>
                  <p class="card-text">
                    <?php
                    // Establish database connection
                    $con = mysqli_connect("localhost", "root", "", "myhmsdb");

                    // Check if the connection is successful
                    if (mysqli_connect_errno()) {
                      echo "Failed to connect to MySQL: " . mysqli_connect_error();
                      exit();
                    }

                    // Query to retrieve the total count of appointments
                    $query = "SELECT COUNT(*) AS total_appointments FROM appointments";

                    // Execute the query
                    $result = mysqli_query($con, $query);

                    // Check if the query was executed successfully
                    if ($result) {
                      // Fetch the total count of appointments
                      $row = mysqli_fetch_assoc($result);
                      $totalAppointments = $row['total_appointments'];
                      echo $totalAppointments;
                    } else {
                      // If an error occurred while executing the query
                      echo "Error fetching total appointments";
                    }

                    // Close the database connection
                    mysqli_close($con);
                    ?>
                  </p>
                </div>
              </div>
            </div>



            <div class="row">
              <div class="col">
                <div class="card number-card">
                  <div class="card-body">
                    <div class="card-title-container">
                      <div class="icon-container">
                        <h6><i class="fa-solid fa-plus" aria-hidden="true" style="font-size: 200%;"></i></h6>
                      </div>
                      <div class="title-container">
                        <h5 class="card-title">Active Tests</h5>
                      </div>
                    </div>
                    <p class="card-text">
                      <?php
                      // Establish database connection
                      $con = mysqli_connect("localhost", "root", "", "myhmsdb");

                      // Check if the connection is successful
                      if (mysqli_connect_errno()) {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        exit();
                      }

                      // Query to retrieve the count of active tests
                      $activeQuery = "SELECT COUNT(*) AS active_tests FROM test_list WHERE status = 1";

                      // Execute the query
                      $activeResult = mysqli_query($con, $activeQuery);

                      // Check if the query was executed successfully
                      if ($activeResult) {
                        // Fetch the count of active tests
                        $activeRow = mysqli_fetch_assoc($activeResult);
                        $activeTests = $activeRow['active_tests'];
                        echo $activeTests;
                      } else {
                        // If an error occurred while executing the query
                        echo "Error fetching active tests: " . mysqli_error($con);
                      }

                      ?>
                    </p>
                  </div>
                </div>
              </div>

              <div class="col">
                <div class="card number-card">
                  <div class="card-body">
                    <div class="card-title-container">
                      <div class="icon-container">
                        <h6><i class="fa-solid fa-minus" aria-hidden="true" style="font-size: 200%;"></i></h6>
                      </div>
                      <div class="title-container">
                        <h5 class="card-title">Inactive Tests</h5>
                      </div>
                    </div>
                    <p class="card-text">
                      <?php
                      // Query to retrieve the count of inactive tests
                      $inactiveQuery = "SELECT COUNT(*) AS inactive_tests FROM test_list WHERE status = 0";

                      // Execute the query
                      $inactiveResult = mysqli_query($con, $inactiveQuery);

                      // Check if the query was executed successfully
                      if ($inactiveResult) {
                        // Fetch the count of inactive tests
                        $inactiveRow = mysqli_fetch_assoc($inactiveResult);
                        $inactiveTests = $inactiveRow['inactive_tests'];
                        echo $inactiveTests;
                      } else {
                        // If an error occurred while executing the query
                        echo "Error fetching inactive tests: " . mysqli_error($con);
                      }

                      // Close the database connection
                      mysqli_close($con);
                      ?>
                    </p>
                  </div>
                </div>
              </div>


              <div class="col">
                <div class="card number-card">
                  <div class="card-body">
                    <div class="card-title-container">
                      <div class="icon-container">
                        <h6><i class="fa-solid fa-gears" aria-hidden="true" style="font-size: 200%;"></i></h6>
                      </div>
                      <div class="title-container">
                        <h5 class="card-title">Total Tests</h5>
                      </div>
                    </div>
                    <p class="card-text">
                      <?php
                      // Establish database connection
                      $con = mysqli_connect("localhost", "root", "", "myhmsdb");

                      // Check if the connection is successful
                      if (mysqli_connect_errno()) {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        exit();
                      }

                      // Query to retrieve the count of tests
                      $query = "SELECT COUNT(*) AS total_tests FROM test_list";

                      // Execute the query
                      $result = mysqli_query($con, $query);

                      // Check if the query was executed successfully
                      if ($result) {
                        // Fetch the count of tests
                        $row = mysqli_fetch_assoc($result);
                        $totalTests = $row['total_tests'];
                        echo $totalTests;
                      } else {
                        // If an error occurred while executing the query
                        echo "Error fetching total tests: " . mysqli_error($con);
                      }

                      // Close the database connection
                      mysqli_close($con);
                      ?>
                    </p>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <div class="card number-card">
                    <div class="card-body">
                      <div class="card-title-container">
                        <div class="icon-container">
                          <h6><i class="fas fa-user" aria-hidden="true" style="font-size: 300%;"></i></h6>
                        </div>
                        <div class="title-container">
                          <h5 class="card-title">Total Customers</h5>
                        </div>
                      </div>
                      <p class="card-text">
                        <?php
                        // Establish database connection
                        $con = mysqli_connect("localhost", "root", "", "myhmsdb");

                        // Check if the connection is successful
                        if (mysqli_connect_errno()) {
                          echo "Failed to connect to MySQL: " . mysqli_connect_error();
                          exit();
                        }

                        // Query to retrieve the total count of registered patients
                        $query = "SELECT COUNT(*) AS total_patients FROM patreg";

                        // Execute the query
                        $result = mysqli_query($con, $query);

                        // Check if the query was executed successfully
                        if ($result) {
                          // Fetch the total count of registered patients
                          $row = mysqli_fetch_assoc($result);
                          $totalPatients = $row['total_patients'];
                          echo $totalPatients;
                        } else {
                          // If an error occurred while executing the query
                          echo "Error fetching total registered patients";
                        }

                        // Close the database connection
                        mysqli_close($con);
                        ?>
                      </p>
                    </div>
                  </div>
                </div>

                <div class="col">
                  <div class="card number-card">
                    <div class="card-body">
                      <div class="card-title-container">
                        <div class="icon-container">
                          <h6><i class="fas fa-users" aria-hidden="true" style="font-size: 300%;"></i></h6>
                        </div>
                        <div class="title-container">
                          <h5 class="card-title">Registered Staff</h5>
                        </div>
                      </div>
                      <p class="card-text">
                        <?php
                        // Establish database connection
                        $con = mysqli_connect("localhost", "root", "", "myhmsdb");

                        // Check if the connection is successful
                        if (mysqli_connect_errno()) {
                          echo "Failed to connect to MySQL: " . mysqli_connect_error();
                          exit();
                        }

                        // Query to retrieve the total count of registered staff members
                        $query = "SELECT COUNT(*) AS total_staff FROM staffdb";

                        // Execute the query
                        $result = mysqli_query($con, $query);

                        // Check if the query was executed successfully
                        if ($result) {
                          // Fetch the total count of registered staff members
                          $row = mysqli_fetch_assoc($result);
                          $totalStaff = $row['total_staff'];
                          echo $totalStaff;
                        } else {
                          // If an error occurred while executing the query
                          echo "Error fetching total registered staff";
                        }

                        // Close the database connection
                        mysqli_close($con);
                        ?>
                      </p>
                    </div>
                  </div>
                </div>

                <div class="col">
                  <div class="card number-card">
                    <div class="card-body">
                      <div class="card-title-container">
                        <div class="icon-container">
                          <h6><i class="fas fa-user-md" aria-hidden="true" style="font-size: 300%;"></i></h6>
                        </div>
                        <div class="title-container">
                          <h5 class="card-title">Total Registered Doctors</h5>
                        </div>
                      </div>
                      <p class="card-text">
                        <?php
                        // Establish database connection
                        $con = mysqli_connect("localhost", "root", "", "myhmsdb");

                        // Check if the connection is successful
                        if (mysqli_connect_errno()) {
                          echo "Failed to connect to MySQL: " . mysqli_connect_error();
                          exit();
                        }

                        // Query to retrieve the total count of registered doctors
                        $query = "SELECT COUNT(*) AS total_doctors FROM doctb";

                        // Execute the query
                        $result = mysqli_query($con, $query);

                        // Check if the query was executed successfully
                        if ($result) {
                          // Fetch the total count of registered doctors
                          $row = mysqli_fetch_assoc($result);
                          $totalDoctors = $row['total_doctors'];
                          echo $totalDoctors;
                        } else {
                          // If an error occurred while executing the query
                          echo "Error fetching total registered doctors";
                        }

                        // Close the database connection
                        mysqli_close($con);
                        ?>
                      </p>
                    </div>
                  </div>
                </div>





              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

  </main>
  <footer id="footer">


    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Neethi</span></strong>. All Rights Reserved
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

</body>

</html>