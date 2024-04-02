<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>NEETHI</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
        .card {
            background-color: rgba(255, 255, 255, 0.5);
            position: absolute;
            width: 75%;
            /* Adjusted width to 75% */
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            margin-top: -53px;
            padding: 20px;
            /* Added padding to create space around the content */
            border-radius: 10px;
            /* Added rounded corners to the card */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Added shadow for depth */
        }

        #log-heading {
            color: #1977cc;
            font-size: 36px;
            /* Reduced font size for better readability */
            font-weight: 800;
            margin-bottom: 20px;
            /* Added space below the heading */
        }

        #log-fields {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .btnRegister {
            padding: 10px 20px;
            /* Added padding to the button */
            background-color: #1977cc;
            /* Set background color */
            color: white;
            /* Set text color */
            border: none;
            /* Remove border */
            border-radius: 5px;
            /* Add rounded corners */
            cursor: pointer;
            /* Change cursor to pointer on hover */
            transition: background-color 0.3s ease;
            /* Add transition effect to background color */
            margin-left: -100px;

        }

        .btnRegister:hover {
            background-color: #135e8a;
            /* Change background color on hover */
        }
    </style>
</head>

<body>

    <!-- ======= Top Bar ======= -->


    <!-- ======= Header ======= -->
    <header id="header" class="">
        <div class="container d-flex align-items-center">
            <h1 class="logo me-auto"><a href="index.html">Neethi</a></h1>
            <nav id="" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="http://localhost/Doctor%20Booking%20integrated/Doctor%20Booking/PRM/build/home.php">Home</a></li>

                    <li><a href="adminsignup.php" class="nav-link scrollto">Admin</a></li>
                    <li><a href="signin.php" class="nav-link scrollto">User Login</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>
    <!-- ======= Header ======= -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="card">
                <div class="text-center"><label id="log-heading" for="heading">Register as Patient</label></div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <form method="post" action="func2.php">
                            <div class="row register-form">

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="fname"><strong>First Name :</strong></label>
                                        <input type="text" class="form-control" onchange="capitalizeFirstLetter(this)" id="fname" placeholder="First Name " name="fname" onkeydown="return alphaOnly(event);" required />
                                    </div>

                                    <div class="form-group"> <label for="fname"><strong>Email :</strong></label>
                                        <input type="email" class="form-control" placeholder="Your Email " name="email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="Invalid email address" required />
                                    </div>

                                    <div class="form-group"><label for="fname"><strong>Age :</strong></label>
                                        <input type="text" class="form-control" placeholder="Your Age " name="age" required />
                                    </div>

                                    <div class="form-group"><label for="fname"><strong>Your District :</strong></label>
                                        <input type="text" class="form-control" placeholder="Your District " onchange="capitalizeFirstLetter(this)" name="district" required />
                                    </div>
                                    <div class="form-group"><label for="fname"><strong>Password :</strong></label>
                                        <input type="password" class="form-control" placeholder="Password " id="password" name="password" onkeyup='check();' required />
                                    </div>
                                    <div class="form-group">
                                        <div class="maxl">
                                            <label class="radio inline">
                                                <input type="radio" name="gender" value="Male" checked>
                                                <span> Male </span>
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="gender" value="Female">
                                                <span>Female </span>
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="gender" value="Other">
                                                <span>Others </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group"><label for="fname"><strong>Last Name :</strong></label>
                                        <input type="text" class="form-control" placeholder="Last Name " onchange="capitalizeFirstLetter(this)" name="lname" onkeydown="return alphaOnly(event);" />
                                    </div>

                                    <div class="form-group"><label for="fname"><strong>Contact :</strong></label>
                                        <input type="tel" minlength="10" maxlength="10" name="contact" class="form-control" placeholder="Your Phone " required />
                                        <div class="form-group"><label for="fname"><strong>Your Place :</strong></label>
                                            <input type="text" class="form-control" placeholder="Your Place " onchange="capitalizeFirstLetter(this)" name="place" required />
                                        </div>
                                        <div class="form-group"><label for="fname"><strong>Your State :</strong></label>
                                            <input type="text" class="form-control" placeholder="Your State " onchange="capitalizeFirstLetter(this)" name="state" required />
                                        </div>
                                        <div class="form-group"><label for="fname"><strong>Confirm Password :</strong></label>
                                            <input type="password" class="form-control" id="cpassword" placeholder="Confirm Password " name="cpassword" onkeyup='check();' required /><span id='message'></span>
                                        </div>
                                        <div class="text-center" style="margin-right:50%;">
                                            <input type="checkbox" id="showPasswordCheckbox" onchange="togglePasswordVisibility()">
                                            <label for="showPasswordCheckbox">Show Password</label>
                                        </div>
                                        <br><input type="submit" class="btnRegister" name="patsub1" onclick="return checklen();" value="Register" />
                                        <br><br><a style="margin-left: -180px;" href="signin.php">Already have an account?</a>
                                    </div>

                                </div>
                        </form>
                    </div>
                </div>
            </div>
    </section><!-- End Hero -->
    <br><br><br><br><br>

    <!-- ======= Footer ======= -->
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
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById("password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }

        function check() {
            if (document.getElementById('password').value == document.getElementById('cpassword').value) {
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'Password matched';
            } else {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'Password not matched';
            }
        }
    </script>

</body>

</html>