<?php
#Open a connection to the MySQL database with the username, password and database name specified
function openSQLConn(){
	$conn = mysqli_connect("localhost", "penzkorh_proj", "Proj3ct3r", "penzkorh_projekter");

	//If the connection could not be established report accordingly
	if (!$conn) {
		echo "Error: Unable to connect to MySQL." . PHP_EOL;
		echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		return false;
	}
	
	return $conn;
}

#Close connection to MySQL database
function closeSQLConn($conn){
	mysqli_close($conn);
}
