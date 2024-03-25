<html>

<head>
    <title>HMS</title>
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
    <link rel="stylesheet" type="text/css" href="style1.css">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"> -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <style>
        .form-control {
            border-radius: 0.75rem;
        }
    </style>

    <script>
        var check = function() {
            if (document.getElementById('password').value ==
                document.getElementById('cpassword').value) {
                document.getElementById('message').style.color = '#5dd05d';
                document.getElementById('message').innerHTML = 'Matched';
            } else {
                document.getElementById('message').style.color = '#f55252';
                document.getElementById('message').innerHTML = 'Not Matching';
            }
        }

        function alphaOnly(event) {
            var key = event.keyCode;
            return ((key >= 65 && key <= 90) || key == 8 || key == 32);
        };

        function checklen() {
            var pass1 = document.getElementById("password");
            if (pass1.value.length < 6) {
                alert("Password must be at least 6 characters long. Try again!");
                return false;
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>

<!------ Include the above in your HEAD tag ---------->

<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">

            <a class="navbar-brand js-scroll-trigger" href="#" style="margin-top: 10px;margin-left:-65px;font-family: 'IBM Plex Sans', sans-serif;">
                <h4><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp NEETHI HOSPITALS</h4>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item" style="margin-right: 40px;">
                        <a class="nav-link js-scroll-trigger" href="index.php" style="color: white;font-family: 'IBM Plex Sans', sans-serif;">
                            <h6>HOME</h6>
                        </a>
                    </li>

                    <li class="nav-item" style="margin-right: 40px;">
                        <a class="nav-link js-scroll-trigger" href="services.html" style="color: white;font-family: 'IBM Plex Sans', sans-serif;">
                            <h6>ABOUT US</h6>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="odlms/index.php" style="color: white;font-family: 'IBM Plex Sans', sans-serif;">
                            <h6>LABORATORY</h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="PRM/build/" style="color: white;font-family: 'IBM Plex Sans', sans-serif;">
                            <h6>PHARMACEUTICALS</h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="contact.html" style="color: white;font-family: 'IBM Plex Sans', sans-serif;">
                            <h6>CONTACT</h6>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    <div class="container register" style="font-family: 'IBM Plex Sans', sans-serif;">
        <div class="row">
            <div class="col-md-3 register-left" style="margin-top: 10%;right: 5%">
                <img src="images/favicon.png" alt="" />
                <h3>Welcome</h3>

            </div>
            <div class="col-md-9 register-right" style="margin-top: 40px;left: 80px;">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist" style="width: 50%;">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Patient</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Doctor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#staff" role="tab" aria-controls="staff" aria-selected="false">Receptionist</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#admin" role="tab" aria-controls="admin" aria-selected="false">Admin</a>
                    </li>
                </ul>

                <!-- patient registartion -->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading"><b>Register as Patient</b></h3>
                        <form method="post" action="func2.php">
                            <div class="row register-form">

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="fname">First Name :</label>
                                        <input type="text" class="form-control" onchange="capitalizeFirstLetter(this)" id="fname" placeholder="First Name " name="fname" onkeydown="return alphaOnly(event);" required />
                                    </div>

                                    <div class="form-group"> <label for="fname">Email :</label>
                                        <input type="email" class="form-control" placeholder="Your Email " name="email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="Invalid email address" required />
                                    </div>

                                    <div class="form-group"><label for="fname">Age :</label>
                                        <input type="text" class="form-control" placeholder="Your Age " name="age" required />
                                    </div>

                                    <div class="form-group"><label for="fname">Your District :</label>
                                        <input type="text" class="form-control" placeholder="Your District " onchange="capitalizeFirstLetter(this)" name="district" required />
                                    </div>
                                    <div class="form-group"><label for="fname">Password :</label>
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
                                        <a href="index1.php">Already have an account?</a>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group"><label for="fname">Last Name :</label>
                                        <input type="text" class="form-control" placeholder="Last Name " onchange="capitalizeFirstLetter(this)" name="lname" onkeydown="return alphaOnly(event);" />
                                    </div>

                                    <div class="form-group"><label for="fname">Contact :</label>
                                        <input type="tel" minlength="10" maxlength="10" name="contact" class="form-control" placeholder="Your Phone " required />
                                    </div>
                                    <div class="form-group"><label for="fname">Your Place :</label>
                                        <input type="text" class="form-control" placeholder="Your Place " onchange="capitalizeFirstLetter(this)" name="place" required />
                                    </div>
                                    <div class="form-group"><label for="fname">Your State :</label>
                                        <input type="text" class="form-control" placeholder="Your State " onchange="capitalizeFirstLetter(this)" name="state" required />
                                    </div>
                                    <div class="form-group"><label for="fname">Confirm Password :</label>
                                        <input type="password" class="form-control" id="cpassword" placeholder="Confirm Password " name="cpassword" onkeyup='check();' required /><span id='message'></span>
                                    </div>
                                    <input type="submit" class="btnRegister" name="patsub1" onclick="return checklen();" value="Register" />
                                </div>

                            </div>
                        </form>
                    </div>

                    <!-- doctor login -->
                    <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h3 class="register-heading"><b>Login as Doctor</b></h3>
                        <form method="post" action="func1.php">
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="User Name " name="username3" id="username3" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <input type="password" class="form-control" id="password3" name="password3" placeholder="Password" required />
                                        <span class="eye-icon" id="togglePassword3">
                                            <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                        </span>
                                    </div>

                                    <script>
                                        const passwordField3 = document.getElementById('password3');
                                        const togglePasswordButton3 = document.getElementById('togglePassword3');

                                        togglePasswordButton3.addEventListener('click', function() {
                                            const type = passwordField3.getAttribute('type') === 'password' ? 'text' : 'password';
                                            passwordField3.setAttribute('type', type);
                                            // Change eye icon based on password visibility
                                            togglePasswordButton3.querySelector('i').classList.toggle('fa-eye-slash');
                                            togglePasswordButton3.querySelector('i').classList.toggle('fa-eye');
                                        });
                                    </script>


                                    <input type="submit" class="btnRegister" name="docsub1" value="Login" />
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade show" id="staff" role="tabpanel" aria-labelledby="profile-tab">
                        <h3 class="register-heading"><b>Login as Receptionist</b></h3>
                        <form method="post" action="func3.php">
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email " name="username1" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <input type="password" class="form-control" id="password2" name="password2" placeholder="Password" required />
                                        <span class="eye-icon" id="togglePassword2">
                                            <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                        </span>
                                    </div>

                                    <input type="submit" class="btnRegister" name="loginstaff" value="Login" />
                                </div>
                            </div>
                        </form>
                    </div>


                    <div class="tab-pane fade show" id="admin" role="tabpanel" aria-labelledby="profile-tab">
                        <h3 class="register-heading"><b>Login as Admin</b></h3>
                        <form method="post" action="func3.php">
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="User Name " name="username1" onkeydown="return alphaOnly(event);" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <input type="password" class="form-control" id="password2" name="password2" placeholder="Password" required />
                                        <span class="eye-icon" id="togglePassword2">
                                            <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                        </span>
                                    </div>


                                    <style>
                                        .eye-icon {
                                            position: absolute;
                                            top: 50%;
                                            right: 10px;
                                            transform: translateY(-50%);
                                            cursor: pointer;
                                        }
                                    </style>

                                    <script>
                                        const passwordField2 = document.getElementById('password2');
                                        const togglePasswordButton2 = document.getElementById('togglePassword2');

                                        togglePasswordButton2.addEventListener('click', function() {
                                            const type = passwordField2.getAttribute('type') === 'password' ? 'text' : 'password';
                                            passwordField2.setAttribute('type', type);
                                            // Change eye icon based on password visibility
                                            togglePasswordButton2.querySelector('i').classList.toggle('fa-eye-slash');
                                            togglePasswordButton2.querySelector('i').classList.toggle('fa-eye');
                                        });
                                    </script>


                                    <input type="submit" class="btnRegister" name="adsub" value="Login" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
</body>
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

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

</html>