<?php

require_once("inc/database_controller.php");


$KeresoParameter = $_GET["id"];
if (isset($_POST["Elkuld"])) {
	if (!empty($_POST["P_nev"]) && !empty($_POST["P_leiras"]) && !empty($_POST["P_megrendelo"])) {
		$P_nev = $_POST["P_nev"];
		$P_leiras = $_POST["P_leiras"];
		$P_megrendelo = $_POST["P_megrendelo"];
		$P_hatarido = $_POST["P_hatarido"];
//		global $conn;
		$conn = OpenSQLConn();
		$sql = "UPDATE projektek SET p_nev = '$P_nev', p_leiras = '$P_leiras', p_megrendelo = '$P_megrendelo',
 				p_hatarido = '$P_hatarido' WHERE id = '$KeresoParameter'";
		$Execute = $conn ->query($sql);
		if ($Execute) {
			echo '<script>window.alert("A projekt módosítása sikerült!")</script>';
			echo '<script>window.open("index.php?modul=projects&funkcio=lista", "_self")</script>';
		}
	}
	else {
	    ?>
<div>
<!--    echo '<span class="figyelmeztet">A projekt nevét, rövid leírását és a határidőt mindenképpen meg kell adni!</span>';-->
    <span class="figyelmeztet">A projekt nevét, rövid leírását és a határidőt mindenképpen meg kell adni!</span>'
</div>
<?php
	}

//} elseif (isset($_POST["Megsem"])) {
//	echo '<script>window.open("ProjektOlvas.php?id=Frissitett", "_self")</script>';
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
	<form class="" action="index.php?modul=projects&funkcio=edit&id= <?php echo $ID?>" method="post">
		<fieldset>
			<span class="MezoInfo">A projekt neve:</span>
			<br>
			<input type="text" name="P_nev" value="<?php echo $P_nev;?>">
			<br>
			<span class="MezoInfo">A projekt rövid leírása:</span>
			<br>
			<input type="text" name="P_leiras" value="<?php echo $P_leiras;?>">
			<br>
			<span class="MezoInfo">Megrendelő:</span>
			<br>
			<input type="text" name="P_megrendelo" value="<?php echo $P_megrendelo;?>">
			<br>
			<span class="MezoInfo">A projekt határideje:</span>
			<br>
			<input type="date" name="P_hatarido" value="<?php echo $P_hatarido;?>">
			<br>
			<input type="submit" name="Elkuld", value="A változások mentése">
<!--			<input type="submit" name="Megsem", value="Mégsem">-->
		</fieldset>
	</form>
