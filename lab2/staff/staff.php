<?php
session_start();
$username=$_SESSION['username'];
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

  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  
    <style>
        /* .content{
            display: flex;
        } */
        body, html {
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
        margin-bottom: 20px; /* Adjust as per your preference */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Adjust as per your preference */
        }

        .card::before {
        content: "";
        display: block;
        width: 5px; /* Adjust the width of the left line */
        background-color: #007bff; /* Adjust the color of the left line */
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
            background-color: white; /* Adjust as needed */
            z-index: 1;
        }
                
        .table::-webkit-scrollbar {
            display: none; /* Hide scrollbar for WebKit browsers (e.g., Chrome, Safari) */
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
                    <a href="test.php" class="list-group-item list-group-item-action py-2 ripple ">
                        <i class="fas fa-chart-area fa-fw me-3"></i><span>Test</span>
                    </a>
                    <a href="staff.php" class="list-group-item list-group-item-action py-2 ripple active">
                        <i class="fas fa-users fa-fw me-3"></i><span>Staff</span>
                    </a>
                    <a href="appointment.php" class="list-group-item list-group-item-action py-2 ripple ">
                        <i class="fas fa-calendar fa-fw me-3"></i><span>Appointment</span>
                    </a>
                    
                </div>
            </div>
            <div class="content" style="height: 100vh;">
              <!-- Main content goes here -->
                <div class="container-content mt-5">
                    <!-- <div class="mx-5 mb-3">
                        <button id="button-add-test" class="btn btn-primary" data-toggle="modal" data-target="#addTestModal">Add Test</button>
                    </div> -->
                    
                    <!-- Add Test Modal -->
                    <div class="modal fade" id="addTestModal" tabindex="-1" role="dialog" aria-labelledby="addTestModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addTestModalLabel">Add Test</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="addTestForm">
                                        <div class="form-group">
                                            <label for="testName">Name</label>
                                            <input type="text" class="form-control" id="testName" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="testCategory">Category</label>
                                            <input type="text" class="form-control" id="testCategory" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="testPrice">Price</label>
                                            <input type="number" class="form-control" id="testPrice" required>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="saveTest">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table" style="height: 80vh; overflow-y: scroll;">
                        <table id="stafftable" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%" style="height: 100%;">
                            <thead style="position: sticky;top: 0;background-color: white;z-index: 1;">
                                <tr>
                                    <th class="th-sm">Sl no</th>
                                    <th class="th-sm">Name</th>
                                    <th class="th-sm">DoB</th>
                                    <th class="th-sm">Email</th>
                                    <th class="th-sm">Phone</th>
                                    <th class="th-sm">Location</th>
                                    <th class="th-sm">State</th>
                                    <th class="th-sm">District</th>
                                    <th class="th-sm">Gender</th>
                                    <th class="th-sm">Qualification</th>
                                    <th class="th-sm">Experience</th>
                                    <th class="th-sm">Registration Date</th>
                                    <th class="th-sm">Status</th>
                                    <th class="th-sm">Inactive Reason</th>
                                    <th class="th-sm">Resignation Date</th>
                                    <!-- <th class="text-center" colspan="2" class="th-sm">Action</th> -->
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
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
    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Load jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Load DataTables plugin -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <!-- Template../ Main JS File -->
    <script src="../assets/js/main.js"></script>
    <script>

    $(document).ready(function(){
      loadData();
    });

    function loadData() {
        $.ajax({
            url: 'fetch_staff.php', // PHP script to fetch data from the database
            method: 'GET',
            success: function(response) {
                $('#stafftable tbody').html(response);
            },
            error: function(xhr, status, error) {
                console.error(error);
                alert('Error occurred while loading data!');
            }
        });
    }
    </script>

</body>

</html>