=======
<html lang="hu">
<?php
	include_once("inc/database_controller.php");
	$conn = OpenSqlConn();
	$sql = "DELETE FROM developers WHERE username = '".$_SESSION['username']."'";
	
	if ($conn->query($sql) === TRUE) {
		echo "<p>Account deleted successfully!</p>";
		session_destroy();
	} else {
		echo "<p>Account could not be deleted!</p>";
	}
?>
<meta http-equiv="refresh" content="3;url=index.php" />
<p>Redirecting after three seconds...</p>
