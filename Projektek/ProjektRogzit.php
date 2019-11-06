<?php
require_once("DB.php"); //Egy kulon fajlba raktam a kapcsolodast, de persze ez csak nalam mukodik abban a formaban
if (isset($_POST["Elkuld"])) {
	if (!empty($_POST["P_nev"]) && !empty($_POST["P_leiras"]) && !empty($_POST["P_megrendelo"])) {
		$P_nev = $_POST["P_nev"];
		$P_leiras = $_POST["P_leiras"];
		$P_megrendelo = $_POST["P_megrendelo"];
		$P_hatarido = $_POST["P_hatarido"];
		global $DBkapcsolat;
		$sql = "INSERT INTO projektek(p_nev, p_leiras, p_megrendelo, p_hatarido) //en projektek nevet adtam a tablanak
                VALUES (:p_neV, :p_leiraS, :p_megrendelO, :p_hataridO)";
		$stmt = $DBkapcsolat->prepare($sql);
		$stmt->bindValue(':p_neV', $P_nev);
		$stmt->bindValue(':p_leiraS', $P_leiras);
		$stmt->bindValue(':p_megrendelO', $P_megrendelo);
		$stmt->bindValue(':p_hataridO', $P_hatarido);
		$Execute = $stmt->execute();
		if ($Execute) {
			echo '<script>window.alert("Az új projekt elmentése sikerült!")</script>';
			echo '<script>window.open("ProjektOlvas.php?id=Frissitett", "_self")</script>';
			//Megnyitaja a masik oldalt, ami listazza majd a meglevo projekteket
		}
	}
	else {
		echo '<script>window.alert("A projekt nevét, rövid leírását és a határidőt mindenképpen meg kell adni!")</script>';
	}

}
?>

//Ez most csak annyit tud, hogy be lehet gepelni a nevet, rovid leirasat, a megrendelot es a hataridot

<!DOCTYPE>
<html>
<head>
	<title>Projekt hozzáadása</title>
<!--	<link rel="stylesheet" type="text/css" href="http://localhost/Projekter/Dizajn/projekterCSS.css">-->
	<link rel="stylesheet" type="text/css" href="../Dizajn/projekterCSS.css">
</head>

<body>


<div class="">
	<form class="" action="ProjektRogzit.php" method="post">
		<fieldset>
			<span class="MezoInfo">Az új projekt neve:</span>
			<br>
			<input type="text" name="P_nev" value="">
			<span class="MezoInfo">A projekt rövid leírása:</span>
			<br>
			<input type="text" name="P_leiras" value="">
			<span class="MezoInfo">Megrendelő:</span>
			<br>
			<input type="text" name="P_megrendelo" value="">
			<span class="MezoInfo">Az új projekt határideje:</span>
			<br>
			<input type="date" name="P_hatarido" value="">
			<br>
			<input type="submit" name="Elkuld", value="Adatok elküldése">
		</fieldset>
	</form>
</div>

</body>


</html>



