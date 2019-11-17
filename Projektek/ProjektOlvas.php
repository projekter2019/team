<?php
//require_once("../inc/database_controller_gy.php");
//echo "START:" . __FILE__ . "<br />\n";
//echo "DIR:" . __DIR__ . "<br />\n";
require_once("inc/database_controller_gy.php");
if (isset($_POST["Vissza"])) {
	echo '<script>window.open("index.php", "_self")</script>';
//	echo '<script>window.open("projekter.debinfo.hu/index.php", "_self")</script>';
} elseif (isset($_POST["Rogzit"])) {
	echo '<script>window.open("ProjektRogzit.php?id=UjProjektHozzaadasa", "_self")</script>';
}

?>
<!--Egy tablazatban kiirja a Projektek adatbazisban szereplo projekteket, illetve egy-egy gombot a szerkeszteshez-->
<!--es a torleshez-->

<!DOCTYPE>
<html lang="hu">
<head>
	<title>Projektek megtekintése</title>
	<link rel="stylesheet" type="text/css" href="../Dizajn/projekterCSS.css">
</head>

<body>
<table width="1000" border="4" align="center">
	<caption>Az adatbázisban szereplő projektek</caption>
	<tr>
		<th>ID</th>
		<th>Projekt név</th>
		<th>A projekt rövid leírása</th>
		<th>Megbízó</th>
        <th width="120px">Határidő</th>
        <th width="100px">Szerkesztés</th>
        <th>Törlés</th>
	</tr>

	<?php
//	global $DBkapcsolat;
	global $conn;
	$sql = "SELECT * FROM projektek";
	$stmt = $conn->query($sql);
	while ($Adatsorok = $stmt -> fetch_array()){
		$Id = $Adatsorok["id"];
		$P_nev = $Adatsorok["p_nev"];
		$P_leiras = $Adatsorok["p_leiras"];
		$P_megrendelo = $Adatsorok["p_megrendelo"];
		$P_hatarido = $Adatsorok["p_hatarido"];
		?>
		<tr>
			<td><?php echo $Id ?></td>
			<td><?php echo $P_nev?></td>
			<td><?php echo $P_leiras?></td>
			<td><?php echo $P_megrendelo?></td>
			<td><?php echo $P_hatarido?></td>
			<td> <a href="ProjektSzerkeszt.php?id=<?php echo $Id; ?>">Szerkesztés</a> </td>
			<td> <a href="ProjektTorol.php?id=<?php echo $Id; ?>">Törlés</a> </td>
		</tr>
	<?php } ?>
</table>
<div>
    <form class="" action="index.php" method="post">
        <input type="submit" name="Vissza" value="Vissza a főoldalra">
        <input type="submit" name="Rogzit" value="Új projekt hozzáadása"> <!-- Uj -->
    </form>
</div>
</body>


</html>
