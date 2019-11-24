<?php
require_once("inc/database_controller.php");
$KeresoParameter = $_GET["id"];
if (isset($_POST["Elkuld"])) {
//	$P_id = $_POST["id"];
//	$P_nev = $_POST["P_nev"];
//	$P_leiras = $_POST["P_leiras"];
//	$P_megrendelo = $_POST["P_megrendelo"];
//	$P_hatarido = $_POST["P_hatarido"];
//	global $conn;
	$conn = OpenSQLConn();
	$sql ="DELETE FROM projektek WHERE id= $KeresoParameter";
//	$Execute=$conn->query($sql);
//	if ($Execute) {
	if (mysqli_query($conn, $sql)) {
		echo '<script>window.alert("A projekt törlése sikerült!", "_self")</script>';
		echo '<script>window.open("index.php?modul=projects&funkcio=lista", "_self")</script>';

	}
//}else if(isset($_POST["Megsem"])){
//	echo '<script>window.open("ProjektOlvas.php?id=Frissitett", "_self")</script>';
//
}

include_once("ProjektMenu.php");

//global $conn;
$conn = OpenSQLConn();
$sql = "SELECT * FROM projektek WHERE id = '$KeresoParameter'";
$stmt = $conn->query($sql);
$Adatsorok = $stmt->fetch_array();
$ID = $Adatsorok["id"];
$P_nev = $Adatsorok["p_nev"];
$P_leiras = $Adatsorok["p_leiras"];
$P_megrendelo = $Adatsorok["p_megrendelo"];
$P_hatarido = $Adatsorok["p_hatarido"];
?>

<!--<form class="" action="index.php?modul=projects&funkcio=delete?id= 9; ?> " method="post">-->
<form class="" action="index.php?modul=projects&funkcio=delete&id= <?php echo $ID?>" method="post">
	<table width="1000" border="4" align="center">
		<caption>A kiválasztott projekt</caption>
		<tr style="background-color: lightgray">
            <td style="font-weight: bold">ID</td>
			<td style="font-weight: bold">A projekt címe</td>
			<td style="font-weight: bold">A projekt rövid leírása</td>
			<td style="font-weight: bold">Megrendelő</td>
			<td style="font-weight: bold">Határidő</td>
		</tr>
		<tr>
            <td><?php echo $ID?></td>
			<td><?php echo $P_nev?></td>
			<td><?php echo $P_leiras?></td>
			<td><?php echo $P_megrendelo?></td>
			<td><?php echo $P_hatarido?></td>
		</tr>
	</table>
	<div>
		<input type="submit" name="Elkuld", value="A projekt törlése">
<!--		<input type="submit" name="Megsem", value="Mégsem">-->
</div>

</form>