<html lang="hu">
<?php
	include_once("inc/database_controller.php");
	$conn = OpenSqlConn();
	$sql = "UPDATE developers SET ZAROLT='I' WHERE username = '".$_GET['username']."'";
	
	if ($conn->query($sql) === TRUE) {
		echo "<p>Account locked successfully!</p>";
	} else {
		echo "<p>Account could not be locked!</p>";
	}
?>
<meta http-equiv="refresh" content="3;url=index.php" />
<p>Redirecting after three seconds...</p>
</html>