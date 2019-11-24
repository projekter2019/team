<?php
require_once("../inc/database_controller_gy.php");
//require_once("inc/database_controller_gy.php");

$KeresoParameter = $_GET["id"];
if (isset($_POST["Hozzaad"])) {
	$M_nev = $_POST["M_nev"];
	$M_cim = $_POST["M_cim"];
	$M_elerhetoseg = $_POST["M_elerhetoseg"];

	global $conn;
	$sql ="SELECT * FROM megrendelok WHERE m_id='$KeresoParameter'";
	$Execute=$conn->query($sql);
	if ($Execute) {
		echo '<script>window.alert("A megrendelőt hozzáadtuk a projekthez!")</script>';
		echo '<script>window.open("../Projektek/ProjektRogzit.php","_self")</script>';

	}
}else if(isset($_POST["Megsem"])){
	echo '<script>window.open("MegrendeloKivalaszt.php?id=Frissitett", "_self")</script>';
}

global $conn;
$sql = "SELECT * FROM megrendelok WHERE m_id = '$KeresoParameter'";
$stmt = $conn->query($sql);
$Adatsorok = $stmt->fetch_array();
$M_nev = $Adatsorok["m_nev"];
$M_cim = $Adatsorok["m_cim"];
$M_elerhetoseg = $Adatsorok["m_elerhetoseg"];
?>

<form class="" action="MegrendeloValasztott.php?id=<?php echo $KeresoParameter; ?>" method="post">
	<table width="1000" border="4" align="center">
		<caption>A kiválasztott megrendelő</caption>
		<tr style="background-color: lightgray">
			<td style="font-weight: bold">A megrendelő neve</td>
			<td style="font-weight: bold">A megrendelő címe</td>
			<td style="font-weight: bold">A megrendelő elérhetősége</td>
		</tr>
		<tr>
			<td><?php echo $M_nev?></td>
			<td><?php echo $M_cim?></td>
			<td><?php echo $M_elerhetoseg?></td>
		</tr>
	</table>
	<div>
		<input type="submit" name="Hozzaad", value="Megrendelő hozzáadása">
		<input type="submit" name="Megsem", value="Mégsem">
	</div>
</form>