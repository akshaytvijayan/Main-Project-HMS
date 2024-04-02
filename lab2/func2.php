<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "myhmsdb");

if (isset($_POST['patsub1'])) {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $state = $_POST['state'];
  $district = $_POST['district'];
  $age = $_POST['age'];
  $place = $_POST['place'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];

  if ($password == $cpassword) {
    // Check if username already exists
    $email = $_POST['email'];
    $check_query = "SELECT * FROM patreg WHERE email='$email'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
      // Username already exists, display error message
      header("Location: error3.php");
      exit();
    }

    // Username doesn't exist, proceed with registration
    $query = "INSERT INTO patreg (fname, lname, gender, email, contact, password, cpassword, state, district, age, place) VALUES ('$fname', '$lname', '$gender', '$email', '$contact', '$password', '$cpassword', '$state', '$district', '$age', '$place')";
    $result = mysqli_query($con, $query);

    if ($result) {
      $pid = mysqli_insert_id($con);
      $_SESSION['pid'] = $pid;
      $_SESSION['username'] = $fname . " " . $lname;
      $_SESSION['fname'] = $fname;
      $_SESSION['lname'] = $lname;
      $_SESSION['gender'] = $gender;
      $_SESSION['contact'] = $contact;
      $_SESSION['email'] = $email;
      $_SESSION['state'] = $state;
      $_SESSION['district'] = $district;
      $_SESSION['age'] = $age;
      $_SESSION['place'] = $place;
      header("Location:staffsignin.php");
      exit();
    } else {
      // Error handling for database insertion failure
      header("Location: error.php");
      exit();
    }
  } else {
    // Passwords don't match, handle error
    header("Location: error.php");
    exit();
  }
}



