<?php
require_once("inc/database_controller_gy.php");
//require_once("inc/database_controller_gy.php");

session_start();

$sqlAction = array("SELECT * FROM megrendelok WHERE m_id=", "A megrendelő hozzáadása", "MegrendeloKivalaszt.php");
$_SESSION['sqlAction'] = $sqlAction;

if (isset($_POST["Vissza"])) {
	echo '<script>window.open("../index.php", "_self")</script>';
} elseif (isset($_POST["Rogzit"])) {
	echo '<script>window.open("./MegrendeloRogzit.php?id=UjMegrendeloHozzaadasa", "_self")</script>';
}

?>
<table width="1000" border="4" align="center">
	<caption>Az adatbázisban szereplő megrendelők</caption>
	<br>
	<tr>
		<th>ID</th>
		<th>A megrendelő neve</th>
		<th>A megrendelő címe</th>
		<th>Elérhetőségek</th>
        <th width="100px">Kiválasztás</th>
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
			<td> <a href="MegrendeloValasztott.php?id=<?php echo $Id; ?>">Kiválaszt</a> </td>
		</tr>
	<?php } ?>
</table>
<div>
	<form class="" action="MegrendeloKivalaszt.php" method="post">
		<input type="submit" name="Vissza" value="Vissza a főoldalra">
		<input type="submit" name="Rogzit" value="Új megrendelo hozzáadása">
	</form>
</div>