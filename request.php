<?php
$con = mysqli_connect("localhost", "root", "", "myhmsdb");
session_start();
if(isset($_POST['idb'])) {
    $username = $_SESSION['pid'];
    $dname = $_POST['idb'];
    $select = "SELECT * from request WHERE dname='$dname' and pid='$username'  and req_status='request' or req_status= 'approved'";
    $result = mysqli_query($con, $select);
    if(mysqli_num_rows($result) > 0) {
        echo '<script type="text/javascript">';
        echo 'window.location.href= "offlineappoinment.php";';
        echo ' alert("alredy request sent")';
        echo '</script>';
        return false;
    } else {

        $sql = "insert into request(pid,dname,req_status) VALUES ('$username','$dname','request')";
        //  move_uploaded_file($tmp_img_name,$folder.$img_name);
        $result = mysqli_query($con, $sql);
        if($result) {
            echo '<script type="text/javascript">';
            echo 'window.location.href= "offlineappoinment.php";';
            echo ' alert("Request sent ")';
            echo '</script>';
        } else {
            echo ' alert("failed")';
        }
    }
}
?>