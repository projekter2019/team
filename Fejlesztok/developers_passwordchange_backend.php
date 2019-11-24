<?php
	include_once("inc/database_controller.php");
	include_once("security/encrypt.php");
	
	$new_password = encrypt($_POST['username'].$_POST['password']);
	
	$conn = OpenSqlConn();
	$sql = "UPDATE developers set password='".$new_password."' WHERE username = '".$_POST['username']."'";
	
	if ($conn->query($sql) === TRUE) {
		echo "<p>Password changed successfully!</p>";
	} else {
		echo "<p>Password could not be changed!</p>";
	}
?>
<meta http-equiv="refresh" content="3;url=index.php" />
<p>Redirecting after three seconds...</p>