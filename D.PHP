<!DOCTYPE html>
<?php
$con = mysqli_connect("localhost", "root", "", "myhmsdb");

include('newfunc.php');


$querys = "SELECT email FROM staffdb";
$results = mysqli_query($con, $querys);

// Create an empty array to store email values
$emails = array();

// Loop through the result and store email values in the array
while ($row = mysqli_fetch_assoc($results)) {
    $emails[] = $row['email'];
}

// Convert the array to a JSON string
$email_json = json_encode($emails);

// Set $email_json as a value of hidden input field
echo '<input type="text" name="email_array" id="email_array" value="' . htmlspecialchars($email_json) . '">';

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phoneno = $_POST['phoneno'];
    $qualification = $_POST['qualification'];
    $location = $_POST['location'];
    $experience = $_POST['experience'];
    $state = $_POST['state'];
    $district = $_POST['district'];
    $password = $_POST['password'];
    if (!empty($_FILES['imagefile'])) {
        $img_name = $_FILES['imagefile']['name'];
        $tmp_img_name = $_FILES['imagefile']['tmp_name'];
        $folder = 'msg_img/';
        $query = "insert into staffdb(fname,lname,age,gender,email,phone,qualification,experience,location,state,district,password,proof)values('$fname','$lname','$age','$gender','$email','$phoneno','$qualification','$experience','$location','$state','$district','$password','$img_name')";
        $result = mysqli_query($con, $query);
        if ($result) {
            move_uploaded_file($tmp_img_name, $folder . $img_name);
            echo "<script>alert('staff added successfully!');</script>";
        }
    } else {
        echo 'No file uploaded';
    }
}
?>



<!DOCTYPE html>
<link rel="stylesheet" href="styletable.css">

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
        <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>NEETHI HOSPITAL</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <script>
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
                text-align: center;
                color: #fff;
                padding: 10px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
                width: 25%;
            }

            .btn-danger {
                text-align: center;
                color: #fff;
                padding: 10px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
                width: 25%;
            }


            .container {
                max-width: 1000px;
                margin: 0 auto;
                padding: 30px;
                background-color: #fff;
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);

            }

            .heading {
                color: green !important;
                font-weight: bold;


            }

            h2 {
                text-align: center;
                margin-bottom: 30px;
            }


            body {
                font-family: Arial, sans-serif;
                background-color: #f2f2f2;
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

    .heading-add-doctor {
        font-weight: bold;
        color: Black;
    }
</style>

<body style="padding-top:50px;">
    <div class="container-fluid" style="margin-top:50px;">
        <h3 style="margin-left: 40%; padding-bottom: 20px;font-family: 'IBM Plex Sans', sans-serif;"> </h3>
        <div class="row">
            <div class="col-md-4" style="max-width:25%;margin-top: 3%;">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action" id="list-dash-list" data-toggle="list" href="#list-dash" role="tab" aria-controls="home">Dashboard</a>

                    <a class="list-group-item list-group-item-action active" href="addstaf.php">Add Staff</a>
                    <a class="list-group-item list-group-item-action" href="deletestaff.php">View all Staffs</a>
                    <a class="list-group-item list-group-item-action" href="leave.php">leave approval</a>

                    <a class="list-group-item list-group-item-action" href="admin-panel1.php">Add Doctor</a>
                    <a class="list-group-item list-group-item-action" href="deletedoctor.php">View all Doctors </a>
                    <a class="list-group-item list-group-item-action" href="admin-panel1.php">Prescription List</a>

                    <a class="list-group-item list-group-item-action" href="deletepatient.php">View all Patients</a>
                    <a class="list-group-item list-group-item-action" href="admin-panel1.php">Appointment Details</a>
                    <a class="list-group-item list-group-item-action" href="admin-panel1.php">Queries</a>
                    <a class="list-group-item list-group-item-action" href="slot.php">Add Slot</a>
                </div><br>
            </div>
            <div class="container">
                <h2 class="heading ">STAFF REGISTRATION</h2>
                <div class="col-md-8" style="margin-top: 3%;">
                    <div class="tab-content" id="nav-tabContent" style="width: 950px;">

                        <form class="form-group" method="post" enctype="multipart/form-data">
                            <div class="col-12 mb-4">
                                <span class="heading-add-doctor">Personal Information</span>
                            </div>
                            <div class="row">
                                <div class="col-md-4"><label>First name :</label></div>
                                <div class="col-md-8"><input type="text" class="form-control" onchange="capitalizeFirstLetter(this)" name="fname" placeholder="Enter First Name " onkeydown="return alphaOnly(event);" required></div>
                                <br><br>
                                <div class="col-md-4"><label>Last name :</label></div>
                                <div class="col-md-8"><input type="text" class="form-control" onchange="capitalizeFirstLetter(this)" name="lname" placeholder="Enter Last Name " onkeydown="return alphaOnly(event);"></div><br><br>

                                <div class="col-md-4"><label>DOB :</label></div>
                                <div class="col-md-8">
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
                                </div><br><br>
                                <div class="col-md-4"><label>Gender :</label></div>
                                <div class="col-md-8"><select name="gender" placeholder="Gender" class="form-control" required>
                                        <option value="" disabled selected>Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select></div><br><br>
                                <div class="col-md-4"><label>Email ID :</label></div>
                                <div class="col-md-8">
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
                                <br><br>
                                <div class="col-md-4"><label>Phone Number :</label></div>
                                <div class="col-md-8"><input type="phone" class="form-control" name="phoneno" placeholder="Enter Phone Number" maxlength="10" required></div>
                                <br><br>

                                <div class="col-md-4"><label>Qualification :</label></div>
                                <div class="col-md-8"> <textarea cols="72" rows="3" class="form-control" onchange="capitalizeFirstLetter(this)" name="qualification" id="qualification" placeholder="Enter Qualification" required></textarea>
                                </div><br><br><br><br>
                                <div class="col-md-4"><label>Experience :</label></div>
                                <div class="col-md-8"><textarea cols="72" rows="3" class="form-control" onchange="capitalizeFirstLetter(this)" placeholder="Enter experience " name="experience" id="experience" required></textarea>
                                </div><br><br><br><br><br>
                                <div class="col-md-4"> <label class="control-label">Upload Photo :</label></div>
                                <div class="col-md-8"> <input type="file" class="form-control1 ng-invalid ng-invalid-required ng-touched" name="imagefile" accept="image/*" id="imagefile">
                                </div><br><br>

                                <div class="col-12 mb-4">
                                    <span class="heading-add-doctor">Security Information</span>
                                </div>
                                <div class="col-md-4"><label>Password :</label></div>
                                <div class="col-md-8"><input type="password" placeholder="Enter Password" class="form-control" name="password" id="password" required>
                                </div><br><br>
                                <div class="col-md-4"><label>Confirm Password :</label></div>
                                <div class="col-md-8" id='cpass'>
                                    <input type="password" class="form-control" placeholder="Re-Enter Password" name="cpassword" id="cpassword" onkeyup="return matchPass();" required><br><br>
                                    <script>
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
                                <div class="col-12">
                                    <span style="margin-left:45%;" id="password_error"></span>

                                </div>
                                <br><br> <br><br>


                            </div>
                            <div class="col-12 mb-4">
                                <div class="row">
                                    <div class="col-6" text-center>
                                        &nbsp &nbsp&nbsp &nbsp <input type="submit" class="btn btn-primary" onclick="return confirm('Are you sure')" value="Submit" id="submit" name="submit">&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp
                                        <input type="reset" class="btn btn-danger" value="Cancel" id="reset" name="reset">
                                    </div>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>



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
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
</body>

</html>