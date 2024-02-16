<?php
$con = mysqli_connect("localhost", "root", "", "myhmsdb");
session_start();
if(isset($_POST["btnsubmit"])) {
    $username = $_SESSION['username'];
    $todate = $_POST['todate'];
    $fromdate = $_POST['fromdate'];
    $reason = $_POST['reason'];


    $sql = mysqli_query($con, "INSERT INTO tbl_leave(username,todate,fromdate,reason,lstatus) VALUES('$username','$todate','$fromdate','$reason','Pending')");



    if($sql) {
        $_SESSION['status'] = "Registered Successfully";

        header('Location: leave.php');
    } else {
        $_SESSION['status'] = "Data not inserted/Already Exit";

        header('Location: leave.php');

    }
}



?>