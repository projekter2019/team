
<?php
include_once("./inc/database_controller.php");
function CreateTableInDB($TableName,$CreateSQL,$InsertSQL){
	$conn = OpenSQLConn();
	
	$sql = "DROP TABLE $TableName";
	$conn->query($sql);
	$conn->query($CreateSQL);
	$conn->query($InsertSQL);
	
	mysqli_close($conn);
}
?>

