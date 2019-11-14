<?php
require_once("../inc/database_controller_gy.php");
if (isset($_POST["Vissza"])) {
	echo '<script>window.open("../index.php", "_self")</script>';
} elseif (isset($_POST["Rogzit"])) {
	echo '<script>window.open("./MegrendeloRogzit.php?id=UMegrendeloHozzaadasa", "_self")</script>';
}

?>
<!--Egy tablazatban kiirja a Megrendelok adatbazisban szereplo projekteket, illetve egy-egy gombot a szerkeszteshez-->
<!--es a torleshez-->

<!DOCTYPE>
<html lang="hu">
<head>
	<title>Megrendelok megtekintése</title>
	<link rel="stylesheet" type="text/css" href="../Dizajn/projekterCSS.css">
</head>

<body>
<table width="1000" border="4" align="center">
	<caption>Az adatbázisban szereplő megrendeklol</caption>
	<tr>
		<th>ID</th>
		<th>A megrendelő neve</th>
		<th>A megrendelő címe</th>
		<th>Elérhetőségek</th>
		<th width="100px">Szerkesztés</th>
		<th>Törlés</th>
	</tr>

	<?php
	global $conn;
	$sql = "SELECT * FROM megrendelok";
	$stmt = $conn->query($sql);
	while ($Adatsorok = $stmt -> fetch_array()){
		$Id = $Adatsorok["m_id"];
		$M_nev = $Adatsorok["m_nev"];
		$M_cim = $Adatsorok["m_cim"];
		$M_elerhetoseg = $Adatsorok["m_elerhetoseg"];
		?>
		<tr>
			<td><?php echo $Id ?></td>
			<td><?php echo $M_nev?></td>
			<td><?php echo $M_cim?></td>
			<td><?php echo $M_elerhetoseg?></td>
			<td> <a href="ProjektSzerkeszt.php?id=<?php echo $Id; ?>">Szerkesztés</a> </td>
			<td> <a href="ProjektTorol.php?id=<?php echo $Id; ?>">Törlés</a> </td>
		</tr>
	<?php } ?>
</table>
<div>
	<form class="" action="MegrendeloOlvas.php" method="post">
		<input type="submit" name="Vissza" value="Vissza a főoldalra">
		<input type="submit" name="Rogzit" value="Új megrendelo hozzáadása"> <!-- Uj -->
	</form>

</body>


</html>



