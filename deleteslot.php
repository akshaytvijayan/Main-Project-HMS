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