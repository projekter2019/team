<?php
//echo "START:" . __FILE__ . "<br />\n";
//echo "DIR:" . __DIR__ . "<br />\n";
//$conn = new mysqli("localhost", "penzkorh_proj", "Proj3ct3r", "penzkorh_projekter");
$conn = new mysqli("localhost", "penzkorh_proj", "Proj3ct3r", "penzkorh_projekter");

if (!$conn) {
	echo "Error: Unable to connect to MySQL." . PHP_EOL;
	echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
} else {
	if (!$conn->set_charset("utf8")) {
		//printf("Error loading character set utf8: %s\n", $mysqli->error);
	} 	
}

#Close connection to MySQL database
function closeSQLConnGy($conn){
	mysqli_close($conn);
}
