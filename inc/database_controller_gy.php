<?php


$conn = new mysqli("localhost", "penzkorh_proj", "Proj3ct3r", "penzkorh_projekter");

if (!$conn) {
	echo "Error: Unable to connect to MySQL." . PHP_EOL;
	echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
}

#Close connection to MySQL database
function closeSQLConn($conn){
	mysqli_close($conn);
}

?>