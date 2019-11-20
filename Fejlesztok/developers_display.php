<html lang="hu">
<head>
	<title>Fejlesztők megtekintése</title>
	<link rel="stylesheet" type="text/css" href="../Dizajn/projekterCSS.css">
</head>
<table width="1000" border="4" align="center">
	<caption>Az adatbázisban szereplő fejlesztők</caption>
	<tr>
		<th>ID</th>
		<th>Felhasznáó név</th>
		<th>Email</th>
		<th>Név</th>
        <th>Órabér</th>
		<th>Lezár</th>
	</tr>

	<?php
//	global $DBkapcsolat;
	require_once("inc/database_controller.php");
	$conn = OpenSQLConn();
	$sql = "SELECT * FROM developers";
	$stmt = $conn->query($sql);
	while ($Adatsorok = $stmt -> fetch_array()){
		$Id = $Adatsorok["id"];
		$D_username = $Adatsorok["username"];
		$D_email = $Adatsorok["email"];
		$D_name = $Adatsorok["name"];
		$D_price = $Adatsorok["price"];
		?>
		<tr>
			<td><?php echo $Id ?></td>
			<td><?php echo $D_username?></td>
			<td><?php echo $D_email?></td>
			<td><?php echo $D_name?></td>
			<td><?php echo $D_price?></td>
			<td><a href="index.php?modul=developers&funkcio=userlock&username=<?php echo $D_username?>">Lezár</a></td>
		</tr>
	<?php } ?>
</table>
	<a href="./index.php">Vissza</a>
</html>
