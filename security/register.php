<?php

include_once("./inc/database_controller.php");
include_once("./security/encrypt.php");

function registerFromPOST(){
	$username = $_POST['username'];
	$password = encrypt($_POST['username'].$_POST['password']);
	$email = $_POST['email'];
	$name = $_POST['name'];
	$price = $_POST['price'];

	$conn = OpenSQLConn();
	$sql = "INSERT INTO developers (username, password, email, name, price) VALUES ('$username', '$password', '$email', '$name', '$price')";
	
	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
		return true;
	} else {
		echo "Error: " .  $conn->error;
		return false;
	}
	
	mysqli_close($conn);
}
