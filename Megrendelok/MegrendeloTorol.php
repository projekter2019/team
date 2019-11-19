<?php
require_once("../inc/database_controller_gy.php");
//require_once("inc/database_controller_gy.php");

$KeresoParameter = $_GET["id"];
if (isset($_POST["Elkuld"])) {
	$M_nev = $_POST["M_nev"];
	$M_cim = $_POST["M_cim"];
	$M_elerhetoseg = $_POST["M_elerhetoseg"];

	global $conn;
	$sql ="DELETE FROM megrendelok WHERE m_id='$KeresoParameter'";
	$Execute=$conn->query($sql);
	if ($Execute) {
//		echo '<script>window.alert("A megrendelő törlése sikerült!")</script>';
		echo '<script>window.open("MegrendeloOlvas.php?id=AMegrendeloSikeresenTorolve","_self")</script>';

	}
}else if(isset($_POST["Megsem"])){
	echo '<script>window.open("MegrendeloOlvas.php?id=Frissitett", "_self")</script>';
}
?>

<!DOCTYPE>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>A kiválasztott megrendelő törlése</title>
	<link rel="stylesheet" type="text/css" href="../Dizajn/projekterCSS.css">
</head>
<style media="screen">
</style>

<body>
<?php
global $conn;
$sql = "SELECT * FROM megrendelok WHERE m_id = '$KeresoParameter'";
$stmt = $conn->query($sql);
$Adatsorok = $stmt->fetch_array();
$M_nev = $Adatsorok["m_nev"];
$M_cim = $Adatsorok["m_cim"];
$M_elerhetoseg = $Adatsorok["m_elerhetoseg"];
?>

<form class="" action="MegrendeloTorol.php?id=<?php echo $KeresoParameter; ?>" method="post">
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
		<input type="submit" name="Elkuld", value="A megrendelő törlése">
		<input type="submit" name="Megsem", value="Mégsem">
    </div>
</form>

</body>
</html>


