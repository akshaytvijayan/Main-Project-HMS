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
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="./PRM/build/home.php" style="color: white;font-family: 'IBM Plex Sans', sans-serif;">
                                <h6>HOME</h6>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="index.php" style="color: white;font-family: 'IBM Plex Sans', sans-serif;">
                                <h6>PATIENT LOGIN</h6>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="lab2/index.html" style="color: white;font-family: 'IBM Plex Sans', sans-serif;">
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
                                        <label for="fname"><strong>First Name :</strong></label>
                                        <input type="text" class="form-control" onchange="capitalizeFirstLetter(this)" id="fname" placeholder="First Name " name="fname" onkeydown="return alphaOnly(event);" required />
                                    </div>

                                    <div class="form-group"> <label for="fname"><strong>Email :</strong></label>
                                        <input type="email" class="form-control" placeholder="Your Email " name="email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="Invalid email address" required />
                                    </div>

                                    <div class="form-group"><label for="fname"><strong>Age :</strong></label>
                                        <input type="text" class="form-control" placeholder="Your Age " name="age" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="state"><strong>State :</strong></label>

                                        <div class="col-md-16">
                                            <select id="state" class="form-control" name="state" onchange="updateDistricts()" required>
                                                <option value="">Select State</option>
                                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                <option value="Assam">Assam</option>
                                                <option value="Bihar">Bihar</option>
                                                <option value="Chhattisgarh">Chhattisgarh</option>
                                                <option value="Goa">Goa</option>
                                                <option value="Gujarat">Gujarat</option>
                                                <option value="Haryana">Haryana</option>
                                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                <option value="Jharkhand">Jharkhand</option>
                                                <option value="Karnataka">Karnataka</option>
                                                <option value="Kerala">Kerala</option>
                                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                <option value="Maharashtra">Maharashtra</option>
                                                <option value="Manipur">Manipur</option>
                                                <option value="Meghalaya">Meghalaya</option>
                                                <option value="Mizoram">Mizoram</option>
                                                <option value="Nagaland">Nagaland</option>
                                                <option value="Odisha">Odisha</option>
                                                <option value="Punjab">Punjab</option>
                                                <option value="Rajasthan">Rajasthan</option>
                                                <option value="Sikkim">Sikkim</option>
                                                <option value="Tamil Nadu">Tamil Nadu</option>
                                                <option value="Telangana">Telangana</option>
                                                <option value="Tripura">Tripura</option>
                                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                <option value="Uttarakhand">Uttarakhand</option>
                                                <option value="West Bengal">West Bengal</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
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
                                        <a href="index1.php">Already have an account?</a>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group"><label for="fname"><strong>Last Name :</strong></label>
                                        <input type="text" class="form-control" placeholder="Last Name " onchange="capitalizeFirstLetter(this)" name="lname" onkeydown="return alphaOnly(event);" />
                                    </div>

                                    <div class="form-group"><label for="fname"><strong>Contact :</strong></label>
                                        <input type="tel" minlength="10" maxlength="10" name="contact" class="form-control" placeholder="Your Phone " required />
                                    </div>
                                    <div class="form-group"><label for="fname"><strong>Address :</strong></label>
                                        <input type="text" class="form-control" placeholder="Your Place " onchange="capitalizeFirstLetter(this)" name="place" required />
                                    </div>
                                    <div class="form-group"><label for="district"><strong>District :</strong></label>

                                        <div class="col-md-16">
                                            <select id="district" class="form-control" name="district" required>
                                                <option class="form-control" value="">Select District</option>
                                            </select>
                                        </div>
                                    </div>
                                    <script>
                                        function updateDistricts() {
                                            var stateSelect = document.getElementById("state");
                                            var districtSelect = document.getElementById("district");
                                            var selectedState = stateSelect.options[stateSelect.selectedIndex].value;

                                            districtSelect.innerHTML = "";

                                            var placeholderOption = document.createElement("option");
                                            placeholderOption.text = "Select District";
                                            placeholderOption.value = "";
                                            districtSelect.appendChild(placeholderOption);

                                            // Add districts for each state

                                            if (selectedState === "Andhra Pradesh") {
                                                var districts = ["Anantapur", "Chittoor", "East Godavari", "Guntur", "Krishna", "Kurnool", "Nellore", "Prakasam", "Srikakulam", "Visakhapatnam", "Vizianagaram", "West Godavari", "Y.S.R. Kadapa"];
                                            } else if (selectedState === "Arunachal Pradesh") {
                                                var districts = ["Tawang", "West Kameng", "East Kameng", "Papum Pare", "Kurung Kumey", "Kra Daadi", "Lower Subansiri", "Upper Subansiri", "West Siang", "East Siang", "Siang", "Upper Siang"];
                                            } else if (selectedState === "Assam") {
                                                var districts = ["Baksa", "Barpeta", "Biswanath", "Bongaigaon", "Cachar", "Charaideo", "Chirang", "Darrang", "Dhemaji", "Dhubri", "Dibrugarh", "Dima Hasao", "Goalpara", "Golaghat", "Hailakandi", "Hojai", "Jorhat", "Kamrup", "Kamrup Metropolitan", "Karbi Anglong"];
                                            } else if (selectedState === "West Bengal") {
                                                var districts = ["Alipurduar", "Bankura", "Birbhum", "Cooch Behar", "Dakshin Dinajpur", "Darjeeling", "Hooghly", "Howrah", "Jalpaiguri", "Jhargram", "Kalimpong", "Kolkata", "Malda", "Murshidabad", "Nadia", "North 24 Parganas", "Paschim Medinipur", "Purba Medinipur", "Purulia", "South 24 Parganas", "Uttar Dinajpur"];
                                            } else if (selectedState === "Uttar Pradesh") {
                                                var districts = ["Agra", "Aligarh", "Ambedkar Nagar", "Amethi", "Amroha", "Auraiya", "Ayodhya", "Azamgarh", "Baghpat", "Bahraich", "Ballia", "Balrampur", "Banda", "Barabanki", "Bareilly", "Basti", "Bhadohi", "Bijnor", "Budaun", "Bulandshahr"];
                                            } else if (selectedState === "Bihar") {
                                                var districts = ["Araria", "Arwal", "Aurangabad", "Banka", "Begusarai", "Bhagalpur", "Bhojpur", "Buxar", "Darbhanga", "East Champaran", "Gaya", "Gopalganj", "Jamui", "Jehanabad", "Kaimur", "Katihar", "Khagaria", "Kishanganj", "Lakhisarai", "Madhepura"];
                                            } else if (selectedState === "Uttarakhand") {
                                                var districts = ["Almora", "Bageshwar", "Chamoli", "Champawat", "Dehradun", "Haridwar", "Nainital", "Pauri Garhwal", "Pithoragarh", "Rudraprayag", "Tehri Garhwal", "Udham Singh Nagar", "Uttarkashi"];
                                            } else if (selectedState === "Kerala") {
                                                var districts = ["Alappuzha", "Ernakulam", "Idukki", "Kannur", "Kasaragod", "Kollam", "Kottayam", "Kozhikode", "Malappuram", "Palakkad", "Pathanamthitta", "Thiruvananthapuram", "Thrissur", "Wayanad"];
                                            } else if (selectedState === "Chhattisgarh") {
                                                var districts = ["Balod", "Baloda Bazar", "Balrampur", "Bastar", "Bemetara", "Bijapur", "Bilaspur", "Dantewada", "Dhamtari", "Durg", "Gariaband", "Gaurela-Pendra-Marwahi", "Janjgir-Champa", "Jashpur", "Kabirdham", "Kanker", "Kondagaon", "Korba", "Koriya", "Mahasamund", "Mungeli", "Narayanpur", "Raigarh", "Raipur", "Rajnandgaon", "Sukma", "Surajpur", "Surguja"];
                                            } else if (selectedState === "Karnataka") {
                                                var districts = ["Bagalkot", "Ballari", "Belagavi", "Bengaluru Rural", "Bengaluru Urban", "Bidar", "Chamarajanagar", "Chikkaballapur", "Chikkamagaluru", "Chitradurga", "Dakshina Kannada", "Davanagere", "Dharwad", "Gadag", "Hassan", "Haveri", "Kalaburagi", "Kodagu", "Kolar", "Koppal", "Mandya", "Mysuru", "Raichur", "Ramanagara", "Shivamogga", "Tumakuru", "Udupi", "Uttara Kannada", "Vijayapura", "Yadgir"];
                                            } else if (selectedState === "Goa") {
                                                var districts = ["North Goa", "South Goa"];
                                            } else if (selectedState === "Himachal Pradesh") {
                                                var districts = ["Bilaspur", "Chamba", "Hamirpur", "Kangra", "Kinnaur", "Kullu", "Lahaul And Spiti", "Mandi", "Shimla", "Sirmaur", "Solan", "Una"];
                                            } else if (selectedState === "Jharkhand") {
                                                var districts = ["Bokaro", "Chatra", "Deoghar", "Dhanbad", "Dumka", "East Singhbhum", "Garhwa", "Giridih", "Godda", "Gumla", "Hazaribagh", "Jamtara", "Khunti", "Koderma", "Latehar", "Lohardaga", "Pakur", "Palamu", "Ramgarh", "Ranchi", "Sahebganj", "Seraikela Kharsawan", "Simdega", "West Singhbhum"];
                                            } else if (selectedState === "Haryana") {
                                                var districts = ["Ambala", "Bhiwani", "Charkhi Dadri", "Faridabad", "Fatehabad", "Gurugram", "Hisar", "Jhajjar", "Jind", "Kaithal", "Karnal", "Kurukshetra", "Mahendragarh", "Nuh", "Palwal", "Panchkula", "Panipat", "Rewari", "Rohtak", "Sirsa", "Sonipat", "Yamunanagar"];
                                            } else if (selectedState === "Gujarat") {
                                                var districts = ["Ahmedabad", "Amreli", "Anand", "Aravalli", "Banaskantha", "Bharuch", "Bhavnagar", "Botad", "Chhota Udaipur", "Dahod", "Dang", "Devbhoomi Dwarka", "Gandhinagar", "Gir Somnath", "Jamnagar", "Junagadh", "Kheda", "Kutch", "Mahisagar", "Mehsana", "Morbi", "Narmada", "Navsari", "Panchmahal", "Patan", "Porbandar", "Rajkot", "Sabarkantha", "Surat", "Surendranagar", "Tapi", "Vadodara", "Valsad"];
                                            } else if (selectedState === "Madhya Pradesh") {
                                                var districts = ["Agar Malwa", "Alirajpur", "Anuppur", "Ashoknagar", "Balaghat", "Barwani", "Betul", "Bhind", "Bhopal", "Burhanpur", "Chhatarpur", "Chhindwara", "Damoh", "Datia", "Dewas", "Dhar", "Dindori", "Guna", "Gwalior", "Harda", "Hoshangabad", "Indore", "Jabalpur", "Jhabua", "Katni", "Khandwa", "Khargone", "Mandla", "Mandsaur", "Morena", "Narsinghpur", "Neemuch", "Niwari", "Panna", "Raisen", "Rajgarh", "Ratlam", "Rewa", "Sagar", "Satna", "Sehore", "Seoni", "Shahdol", "Shajapur", "Sheopur", "Shivpuri", "Sidhi", "Singrauli", "Tikamgarh", "Ujjain", "Umaria", "Vidisha"];
                                            } else if (selectedState === "Maharashtra") {
                                                var districts = ["Ahmednagar", "Akola", "Amravati", "Aurangabad", "Beed", "Bhandara", "Buldhana", "Chandrapur", "Dhule", "Gadchiroli", "Gondia", "Hingoli", "Jalgaon", "Jalna", "Kolhapur", "Latur", "Mumbai City", "Mumbai Suburban", "Nagpur", "Nanded", "Nandurbar", "Nashik", "Osmanabad", "Palghar", "Parbhani", "Pune", "Raigad", "Ratnagiri", "Sangli", "Satara", "Sindhudurg", "Solapur", "Thane", "Wardha", "Washim", "Yavatmal"];
                                            } else if (selectedState === "Manipur") {
                                                var districts = ["Bishnupur", "Chandel", "Churachandpur", "Imphal East", "Imphal West", "Jiribam", "Kakching", "Kamjong", "Kangpokpi", "Noney", "Pherzawl", "Senapati", "Tamenglong", "Tengnoupal", "Thoubal", "Ukhrul"];
                                            } else if (selectedState === "Punjab") {
                                                var districts = ["Amritsar", "Barnala", "Bathinda", "Faridkot", "Fatehgarh Sahib", "Fazilka", "Ferozepur", "Gurdaspur", "Hoshiarpur", "Jalandhar", "Kapurthala", "Ludhiana", "Mansa", "Moga", "Muktsar", "Pathankot", "Patiala", "Rupnagar", "Sahibzada Ajit Singh Nagar", "Sangrur", "Shaheed Bhagat Singh Nagar", "Sri Muktsar Sahib", "Tarn Taran"];
                                            } else if (selectedState === "Rajasthan") {
                                                var districts = ["Ajmer", "Alwar", "Banswara", "Baran", "Barmer", "Bharatpur", "Bhilwara", "Bikaner", "Bundi", "Chittorgarh", "Churu", "Dausa", "Dholpur", "Dungarpur", "Hanumangarh", "Jaipur", "Jaisalmer", "Jalore", "Jhalawar", "Jhunjhunu", "Jodhpur", "Karauli", "Kota", "Nagaur", "Pali", "Pratapgarh", "Rajsamand", "Sawai Madhopur", "Sikar", "Sirohi", "Sri Ganganagar", "Tonk", "Udaipur"];
                                            } else if (selectedState === "Telangana") {
                                                var districts = ["Adilabad", "Bhadradri Kothagudem", "Hyderabad", "Jagtial", "Jangaon", "Jayashankar Bhupalpally"];
                                            } else if (selectedState === "Meghalaya") {
                                                var districts = ["East Garo Hills", "East Jaintia Hills", "East Khasi Hills", "North Garo Hills", "Ri Bhoi", "South Garo Hills", "South West Garo Hills", "South West Khasi Hills", "West Garo Hills", "West Jaintia Hills", "West Khasi Hills"];
                                            } else if (selectedState === "Mizoram") {
                                                var districts = ["Aizawl", "Champhai", "Hnahthial", "Khawzawl", "Kolasib", "Lawngtlai", "Lunglei", "Mamit", "Saiha", "Saitual", "Serchhip"];
                                            } else if (selectedState === "Nagaland") {
                                                var districts = ["Dimapur", "Kiphire", "Kohima", "Longleng", "Mokokchung", "Mon", "Peren", "Phek", "Tuensang", "Wokha", "Zunheboto"];
                                            } else if (selectedState === "Odisha") {
                                                var districts = ["Angul", "Balangir", "Balasore", "Bargarh", "Bhadrak", "Boudh", "Cuttack", "Deogarh", "Dhenkanal", "Gajapati", "Ganjam", "Jagatsinghpur", "Jajpur", "Jharsuguda", "Kalahandi", "Kandhamal", "Kendrapara", "Kendujhar", "Khordha", "Koraput", "Malkangiri", "Mayurbhanj", "Nabarangpur", "Nayagarh", "Nuapada", "Puri", "Rayagada", "Sambalpur", "Subarnapur", "Sundargarh"];
                                            } else if (selectedState === "Sikkim") {
                                                var districts = ["East Sikkim", "North Sikkim", "South Sikkim", "West Sikkim"];
                                            } else if (selectedState === "Tamil Nadu") {
                                                var districts = ["Ariyalur", "Chengalpattu", "Chennai", "Coimbatore", "Cuddalore", "Dharmapuri", "Dindigul", "Erode", "Kallakurichi", "Kancheepuram", "Kanyakumari", "Karur", "Krishnagiri", "Madurai", "Nagapattinam", "Namakkal", "Nilgiris", "Perambalur", "Pudukkottai", "Ramanathapuram", "Ranipet", "Salem", "Sivaganga", "Tenkasi", "Thanjavur", "Theni", "Thoothukudi", "Tiruchirappalli", "Tirunelveli", "Tirupathur", "Tiruppur", "Tiruvallur", "Tiruvannamalai", "Tiruvarur", "Vellore", "Viluppuram", "Virudhunagar"];
                                            } else if (selectedState === "Tripura") {
                                                var districts = ["Dhalai", "Gomati", "Khowai", "North Tripura", "Sepahijala", "South Tripura", "Unakoti", "West Tripura"];
                                            } else if (selectedState === "Other") {
                                                var districts = ["Other"];
                                            }



                                            if (districts) {
                                                for (var i = 0; i < districts.length; i++) {
                                                    var option = document.createElement("option");
                                                    option.text = districts[i];
                                                    option.value = districts[i];
                                                    districtSelect.appendChild(option);
                                                }
                                            }
                                        }
                                    </script>
                                    <div class="form-group"><label for="fname"><strong>Confirm Password :</strong></label>
                                        <input type="password" class="form-control" id="cpassword" placeholder="Confirm Password " name="cpassword" onkeyup='check();' required /><span id='message'></span>
                                    </div>
                                    <div class="text-center" style="margin-right:50%;">
                                        <input type="checkbox" id="showPasswordCheckbox" onchange="togglePasswordVisibility()">
                                        <label for="showPasswordCheckbox">Show Password</label>

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
                                    <div class="form-group"> <label for="fname"><strong>Email :</strong></label>
                                        <input type="email" class="form-control" placeholder="User Name " name="username3" id="username3" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group position-relative"><label for="fname"><strong>Password :</strong></label>
                                        <input type="password" class="form-control" id="password3" name="password3" placeholder="Password" required />
                                        <span class="eye-icon" id="togglePassword3">
                                            <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                        </span>
                                    </div>

                                    <script>
                                        function togglePasswordVisibility() {
                                            var passwordField = document.getElementById('password');
                                            var confirmPasswordField = document.getElementById('cpassword');
                                            var showPasswordCheckbox = document.getElementById('showPasswordCheckbox');

                                            if (showPasswordCheckbox.checked) {
                                                passwordField.type = 'text';
                                                confirmPasswordField.type = 'text';
                                            } else {
                                                passwordField.type = 'password';
                                                confirmPasswordField.type = 'password';
                                            }
                                        }

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
                                    <div class="form-group"> <label for="fname"><strong>Email :</strong></label>
                                        <input type="email" class="form-control" placeholder="Email " name="username1" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group position-relative"><label for="fname"><strong>Password :</strong></label>
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
                                            top: 70%;
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