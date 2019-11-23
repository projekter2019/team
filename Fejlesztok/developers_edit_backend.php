<<<<<<< HEAD

<?php
	include_once("inc/database_controller.php");
	$conn = OpenSqlConn();
	$sql = "UPDATE developers set email='".$_POST['email']."',name='".$_POST['name']."',price='".$_POST['price']."' WHERE username = '".$_POST['username']."'";
	
	if ($conn->query($sql) === TRUE) {
		echo "<p>Account edited successfully!</p>";
	} else {
		echo "<p>Account could not be edited!</p>";
	}
?>
<meta http-equiv="refresh" content="3;url=index.php" />
<p>Redirecting after three seconds...</p>
=======

<?php
	include_once("inc/database_controller.php");
	$conn = OpenSqlConn();
	$sql = "UPDATE developers set email='".$_POST['email']."',name='".$_POST['name']."',price='".$_POST['price']."' WHERE username = '".$_POST['username']."'";
	
	if ($conn->query($sql) === TRUE) {
		echo "<p>Account edited successfully!</p>";
	} else {
		echo "<p>Account could not be edited!</p>";
	}
?>
<meta http-equiv="refresh" content="3;url=index.php" />
<p>Redirecting after three seconds...</p>
>>>>>>> 2bba867ed602a75c4927fe2e36831a70167e2844
