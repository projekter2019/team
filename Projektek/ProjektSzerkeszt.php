<?php
require_once("DB.php");
$KeresoParameter = $_GET["id"];
if (isset($_POST["Elkuld"])) {
	if (!empty($_POST["P_nev"]) && !empty($_POST["P_leiras"]) && !empty($_POST["P_megrendelo"])) {
		$P_nev = $_POST["P_nev"];
		$P_leiras = $_POST["P_leiras"];
		$P_megrendelo = $_POST["P_megrendelo"];
		$P_hatarido = $_POST["P_hatarido"];
		global $DBkapcsolat;
		$sql = "UPDATE projektek SET p_nev = '$P_nev', p_leiras = '$P_leiras', p_megrendelo = '$P_megrendelo',
 				p_hatarido = '$P_hatarido' WHERE id = '$KeresoParameter'";
		$Execute = $DBkapcsolat ->query($sql);
		if ($Execute) {
			echo '<script>window.alert("A projekt módosítása sikerült!")</script>';
			echo '<script>window.open("ProjektOlvas.php?id=Frissitett", "_self")</script>';
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

} elseif (isset($_POST["Megsem"])) {
	echo '<script>window.open("ProjektOlvas.php?id=Frissitett", "_self")</script>';
}
?>



<!DOCTYPE>
<html lang="hu">
<head>
	<title>Projekt szerkesztése</title>
	<link rel="stylesheet" type="text/css" href="../Dizajn/projekterCSS.css">
<!--	<link rel="stylesheet" type="text/css" href="http://localhost/Projekter/Dizajn/projekterCSS.css">-->
</head>

<body>
<?php
global $DBkapcsolat;
$sql = "SELECT * FROM projektek WHERE id = '$KeresoParameter'";
$stmt = $DBkapcsolat->query($sql);
$Adatsorok = $stmt->fetch_array();
$P_nev = $Adatsorok["p_nev"];
$P_leiras = $Adatsorok["p_leiras"];
$P_megrendelo = $Adatsorok["p_megrendelo"];
$P_hatarido = $Adatsorok["p_hatarido"];

?>
<div class="">
	<form class="" action="ProjektSzerkeszt.php?id=<?php echo $KeresoParameter;?>" method="post">
		<fieldset>
			<span class="MezoInfo">A projekt neve:</span>
			<br>
			<input type="text" name="P_nev" value="<?php echo $P_nev;?>">
			<span class="MezoInfo">A projekt rövid leírása:</span>
			<br>
			<input type="text" name="P_leiras" value="<?php echo $P_leiras;?>">
			<span class="MezoInfo">Megrendelő:</span>
			<br>
			<input type="text" name="P_megrendelo" value="<?php echo $P_megrendelo;?>">
			<span class="MezoInfo">A projekt határideje:</span>
			<br>
			<input type="date" name="P_hatarido" value="<?php echo $P_hatarido;?>">
			<br>
			<input type="submit" name="Elkuld", value="A változások mentése">
			<input type="submit" name="Megsem", value="Mégsem">

		</fieldset>
	</form>
</div>
</body>


</html>





