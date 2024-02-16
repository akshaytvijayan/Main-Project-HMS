<?php //Post Params 
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = "myhmsdb";
$conn = mysqli_connect($servername, $username, $password, "$dbname");
if (!$conn) {
    die('Could not Connect MySql Server:' . mysql_error());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM slot WHERE id = '$id'";

    echo $query;
    $result = $conn->query($query);

    if ($result) {
        //echo 'Success';
?>
        <script>
            alert("Deleted the record");
            window.location = "slot.php";
        </script>
<?php
    } else {
        echo 'Query Failed';
    }
}

?>



<?php

if (isset($_POST['submit'])) {
    session_start();

    require "conn.php";

    $id =  $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];
    $email = $_POST['email'];
    $conditions = $_POST['conditions'];
    $ocondition =  $_POST['ocondition'];
    $allergic =  $_POST['allergic'];
    $gender = $_POST['gender'];

    $sql = "UPDATE  patients SET
	
	name = '$name',
	age = '$age',
	phone = '$phone',
	location = '$location',
	email = '$email',
	conditions = '$conditions',
	allergic = '$allergic',
	ocondition = '$ocondition',
    gender = '$gender'
	WHERE id = $id
	
	";

    $res = mysqli_query($conn, $sql);

    if ($res = true) {
        $_SESSION['updated_item'] = "<div class='alert alert-success'>Item Updated successifuly </div>";
        header("Location:../patients.php");
    } else {
        $_SESSION['failed_item'] = "<div class='alert alert-danger'> Failed to Update Item </div>";
        header("Location:../patients.php");
    }
}
