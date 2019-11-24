<?php

include_once("./inc/database_controller.php");
include_once("./security/encrypt.php");

function RegistrationPossible(){
	if(userAlreadyExists()){
		return false;
	}
	
	//ADD here all the other checks that need to be performed before registering is possible
	
	return true;
}

function userAlreadyExists(){
	$username = $_POST['username'];

	$conn = OpenSQLConn();
	$sql = "SELECT * FROM developers WHERE username = '$username'";
	$result = $conn->query($sql);
	
	mysqli_close($conn);
	if ($result->num_rows > 0) {
		return true;
	}
	return false;
	
}
