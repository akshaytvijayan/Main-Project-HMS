<?php
require('config.php');
session_start();
$con = mysqli_connect("localhost", "root", "", "myhmsdb");

if (isset($_POST['loginstaff'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $query = "select * from staffdb where email='$username' and password='$password';";
  $result = mysqli_query($con, $query);
  if (mysqli_num_rows($result) == 1) {
    $_SESSION['username'] = $username;
    header("Location: staff/index.php");
    exit; // Make sure to exit after redirection
  } else {
    echo ("<script>alert('Invalid Username or Password. Try Again!');
          window.location.href = 'staffsignin.php';</script>");
    exit; // Make sure to exit after echoing JavaScript code
  }
}
?>
