
<form action="" method="POST">

    <div class="container" style="margin-left:250px;">
        <?php
        $con = mysqli_connect("localhost", "root", "", "myhmsdb");
        if(isset($_GET['id'])) {
            $lId = $_GET['id'];
            $result = mysqli_query($con, "UPDATE tbl_leave SET lstatus='Approve' where lid=$lId ");

        }
        if($result) {
            echo "<script>alert('leave details has been accepted successfully. Thank you');window.location='leave.php';</script>";
        }
        ?>