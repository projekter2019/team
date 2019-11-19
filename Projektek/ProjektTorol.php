<?php
require_once("../inc/database_controller_gy.php");
$KeresoParameter = $_GET["id"];
if (isset($_POST["Elkuld"])) {
	$P_nev = $_POST["P_nev"];
	$P_leiras = $_POST["P_leiras"];
	$P_megrendelo = $_POST["P_megrendelo"];
	$P_hatarido = $_POST["P_hatarido"];

	global $conn;
	$sql ="DELETE FROM projektek WHERE id='$KeresoParameter'";
	$Execute=$conn->query($sql);
	if ($Execute) {
//		echo '<script>window.alert("A projekt törlése sikerült!", "_self")</script>';
		echo '<script>window.open("ProjektOlvas.php?id=AprojektSikeresenTorolve","_self")</script>';

	}
}else if(isset($_POST["Megsem"])){
	echo '<script>window.open("ProjektOlvas.php?id=Frissitett", "_self")</script>';

}

?>
<!DOCTYPE>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>A kiválasztott projekt törlése</title>
	<link rel="stylesheet" type="text/css" href="../Dizajn/projekterCSS.css">
    <link rel="stylesheet" type="text/css" href="Dizajn/menu.css">
</head>
<style media="screen">
</style>

<body>
<?php
global $conn;
$sql = "SELECT * FROM projektek WHERE id = '$KeresoParameter'";
$stmt = $conn->query($sql);
$Adatsorok = $stmt->fetch_array();
$P_nev = $Adatsorok["p_nev"];
$P_leiras = $Adatsorok["p_leiras"];
$P_megrendelo = $Adatsorok["p_megrendelo"];
$P_hatarido = $Adatsorok["p_hatarido"];
?>

<form class="" action="ProjektTorol.php?id=<?php echo $KeresoParameter; ?>" method="post">
	<table width="1000" border="4" align="center">
		<caption>A kiválasztott projekt</caption>
		<tr style="background-color: lightgray">
			<td style="font-weight: bold">A projekt címe</td>
			<td style="font-weight: bold">A projekt rövid leírása</td>
			<td style="font-weight: bold">Megrendelő</td>
			<td style="font-weight: bold">Határidő</td>
		</tr>
		<tr>
			<td><?php echo $P_nev?></td>
			<td><?php echo $P_leiras?></td>
			<td><?php echo $P_megrendelo?></td>
			<td><?php echo $P_hatarido?></td>
		</tr>
	</table>
	<div>
		<input type="submit" name="Elkuld", value="A projekt törlése">
		<input type="submit" name="Megsem", value="Mégsem">
</form>
</div>

</body>
</html>

