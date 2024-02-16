<?php
$con = mysqli_connect("localhost", "root", "", "myhmsdb");
?>

<form action="" method="POST">

<div class="container" style="margin-left:250px;">
<?php
if(isset($_GET['id']))
{
 $id=$_GET['id'];
  $result=mysqli_query($con,"UPDATE tbl_leave SET lstatus='Rejected' where lid=$id");
  
}
if($result)
{
echo "<script>alert('leave details has been removed successfully. Thank you');window.location='leave.php';</script>";
}
?>