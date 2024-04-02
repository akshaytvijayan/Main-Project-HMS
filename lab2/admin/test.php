<?php
session_start();
require('../config.php');
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

  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


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

    .search-container {
      margin-top: 20px;
    }

    #searchInput {
      padding: 10px;
      width: 200px;
    }

    #searchResults {
      margin-top: 20px;
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


    .search-container {
      margin-top: 20px;
      display: flex;
      align-items: center;
    }

    #searchInput {
      padding: 10px;
      width: 300px;
      border: 2px solid #007bff;
      border-radius: 5px;
      font-size: 16px;
      outline: none;
    }

    #searchInput:focus {
      border-color: #0056b3;
      /* Change border color when input is focused */
    }

    #searchButton {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      margin-left: 10px;
      font-size: 16px;
      transition: background-color 0.3s ease;
    }

    #searchButton:hover {
      background-color: #0056b3;
      /* Change background color on hover */
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
          <a href="test.php" class="list-group-item list-group-item-action py-2 ripple active">
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
      <div class="content" style="height: 100vh;">
        <!-- Main content goes here -->
        <div class="container container-content mt-5">
          <style>
            .action-bar {
              display: flex;
              align-items: center;
              margin-bottom: 20px;
            }

            .action-bar input[type="text"] {
              padding: 10px;
              width: 300px;
              border: 2px solid #007bff;
              border-radius: 5px;
              font-size: 16px;
              outline: none;
            }

            .action-bar button {
              padding: 10px 20px;
              border: none;
              border-radius: 5px;
              font-size: 16px;
              cursor: pointer;
              transition: background-color 0.3s ease;
            }

            .action-bar button.btn-primary {
              background-color: #007bff;
              color: white;
              margin-left: 10px;
            }

            .action-bar button.btn-primary:hover {
              background-color: #0056b3;
            }

            .action-bar button.btn-secondary {
              background-color: #f8f9fa;
              color: #212529;
              border: 2px solid #007bff;
              margin-left: 10px;
            }

            .action-bar button.btn-secondary:hover {
              background-color: #e2e6ea;
            }
          </style>

          <div class="mx-5 mb-3 action-bar">
            <button id="button-add-test" class="btn btn-success" data-toggle="modal" data-target="#addTest"> <i class="fas fa-plus"></i> Add Test</button> &nbsp; &nbsp; &nbsp;
            <input type="text" id="searchInput" placeholder="Search...">
            <button onclick="search()" class="btn btn-secondary">Search</button>
          </div>


          <!-- Add Test Modal -->
          <div class="modal fade" id="addTest" tabindex="-1" role="dialog" aria-labelledby="addTestModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="addTestModalLabel">Add Test</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="" id="addTestForm">
                    <div class="form-group">
                      <label for="testName">Name:</label>
                      <input type="text" class="form-control" id="testName" required>
                    </div>
                    <div class="form-group">
                      <label for="testDescription">Description:</label>
                      <textarea class="form-control" id="testDescription" cols="20" rows="8" style="resize:none;" name="testDescription"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="testPrice">Price :</label>
                      <input type="number" class="form-control" id="testPrice" required>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                  <button type="button" class="btn btn-primary" id="saveTest">Save</button>
                </div>
              </div>
            </div>
          </div>
          <!--edit Modal -->
          <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editModalLabel">Edit Test</h5>
                </div>
                <div class="modal-body">
                  <form id="editForm">
                    <div class="form-group">
                      <label for="editName">Name:</label>
                      <input type="text" class="form-control" id="editName" name="editName">
                    </div>
                    <div class="form-group">
                      <label for="editDescription">Description:</label>
                      <textarea class="form-control" id="editDescription" cols="20" rows="8" style="resize:none;" name="editDescription"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="editCost">Price:</label>
                      <input type="text" class="form-control" id="editCost" name="editCost">
                    </div>
                    <input type="hidden" id="editTestId" name="editTestId">
                  </form>
                </div>
                <div class="modal-footer">
                  <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                  <button type="button" class="btn btn-primary" onclick="saveChanges()">Save changes</button>
                </div>
              </div>
            </div>
          </div>

          <!-- table -->

          <div id="searchResults">
            <div class="table-container" style="height: 80vh; overflow-y: scroll;">
              <table class="table table-striped table-bordered table-sm" id="dataTable" cellspacing="0" width="100%" style="height: 100%;">
                <thead>
                  <tr>
                    <th class="th-sm">Sl No:</th>
                    <!-- <th class="th-sm">image</th> -->
                    <th class="th-sm">Name</th>
                    <th class="th-sm">Category</th>
                    <th class="th-sm">Price</th>
                    <th class="text-center" colspan="2" class="th-sm">Action</th>
                    <!-- <th class="th-sm">Start date</th> -->
                  </tr>
                </thead>
                <tbody>
                  <!-- values -->
                </tbody>
              </table>
            </div>
          </div>


          <!-- <div class="container mt-4">
                        
                        <div class="table" style="height: 800vh;">
                            
                        </div>
                    </div> -->
        </div>

      </div>
    </div>

  </main>
  <footer id="footer">

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
    $(document).ready(function() {
      $('#dtBasicExample').DataTable();
      $('.dataTables_length').addClass('bs-select');
    });
  </script>
  <script>
    // Function to load initial data
    $(document).ready(function() {
      loadData();
    });
    // Call saveTest function when "Save" button is clicked
    $('#saveTest').click(function() {
      saveTest();
    });

    // Function to load initial data using AJAX
    function loadData() {
      $.ajax({
        url: 'get_data.php', // PHP script to fetch data from the database
        method: 'GET',
        success: function(response) {
          // Populate table with fetched data
          $('#dataTable tbody').html(response);
        },
        error: function(xhr, status, error) {
          console.error(error);
          alert('Error occurred while loading data!');
        }
      });
    }

    function saveTest() {
      // Get form values
      var testName = $('#testName').val();
      var testDescription = $('#testDescription').val();
      var testPrice = $('#testPrice').val();

      // AJAX request to insert data into database
      $.ajax({
        url: 'insert_test.php', // PHP script to handle database insertion
        method: 'POST',
        data: {
          testName: testName,
          testDescription: testDescription,
          testPrice: testPrice
        },
        success: function(response) {
          // Handle success
          alert('Changes saved successfully!');
          $('#addTestModal').modal('hide'); // Close the modal
          loadData(); // Assuming there's a function named loadData to update the table
        },
        error: function(xhr, status, error) {
          // Handle error
          console.error(error);
          alert('Error occurred while saving data!');
        }
      });
    }

    function openEditModal(id) {
      // AJAX request to fetch data from the database based on the id
      $.ajax({
        url: 'fetch_test_data.php', // Modify the URL to point to your PHP script
        type: 'GET',
        data: {
          id: id
        },
        success: function(response) {
          // Parse the JSON response
          var data = JSON.parse(response);
          // Set values to the form fields
          document.getElementById('editTestId').value = data.id;
          document.getElementById('editName').value = data.name;
          document.getElementById('editDescription').value = data.description;
          document.getElementById('editCost').value = data.cost;
          // Show the modal
          $('#editModal').modal('show');
        },
        error: function(xhr, status, error) {
          // Handle error
          console.error(error);
        }
      });
    }

    function saveChanges() {
      // Get the form data
      var id = $('#editTestId').val();
      var name = $('#editName').val();
      var description = $('#editDescription').val();
      var cost = $('#editCost').val();

      // AJAX request to update the data in the database
      $.ajax({
        url: 'update_test_data.php', // Modify the URL to point to your PHP script
        type: 'POST',
        data: {
          id: id,
          name: name,
          description: description,
          cost: cost
        },
        success: function(response) {
          // Handle success
          alert('Changes saved successfully!');
          $('#editModal').modal('hide');
          // You may choose to reload the page or update the table with the new data
          loadData();
        },
        error: function(xhr, status, error) {
          // Handle error
          console.error(error);
          alert('Error occurred while saving changes!');
        }
      });
    }

    function search() {
      var input = document.getElementById('searchInput').value.toLowerCase();
      var tableRows = document.querySelectorAll('#dataTable tbody tr');

      tableRows.forEach(function(row) {
        var rowData = row.textContent.toLowerCase();
        if (rowData.includes(input)) {
          row.style.display = ''; // Show the row if it matches the search input
        } else {
          row.style.display = 'none'; // Hide the row if it doesn't match the search input
        }
      });
    }

    function deleteTest(id) {
      // Confirm deletion with user
      if (confirm("Are you sure you want to delete this test?")) {
        // AJAX request to delete test
        $.ajax({
          url: 'delete_test.php',
          method: 'POST',
          data: {
            id: id
          },
          success: function(response) {
            // Handle success
            console.log('Test deleted successfully');
            // Optionally, reload or update the table to reflect the changes
            loadData();
          },
          error: function(xhr, status, error) {
            // Handle error
            console.error(error);
            alert('Error occurred while deleting test!');
          }
        });
      }
    }
  </script>
  <script src="script.js"></script>

</body>

</html>