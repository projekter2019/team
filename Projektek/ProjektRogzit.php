<?php
require_once("../inc/database_controller_gy.php");
if (isset($_POST["Elkuld"])) {
	if (!empty($_POST["P_nev"]) && !empty($_POST["P_leiras"]) && !empty($_POST["P_megrendelo"])) {
		$P_nev = $_POST["P_nev"];
		$P_leiras = $_POST["P_leiras"];
		$P_megrendelo = $_POST["P_megrendelo"];
		$P_hatarido = $_POST["P_hatarido"];
		global $conn;
		$sql = "INSERT INTO projektek(p_nev, p_leiras, p_megrendelo, p_hatarido)
                VALUES (?, ?, ?,?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param('ssss', $P_nev, $P_leiras, $P_megrendelo, $P_hatarido);

		$Execute = $stmt->execute();
		if ($Execute) {
			echo '<script>window.alert("Az új projekt elmentése sikerült!")</script>';
			echo '<script>window.open("ProjektOlvas.php?id=Frissitett", "_self")</script>';
			//Megnyitaja a masik oldalt, ami listazza a meglevo projekteket
		}
	}
	else {
		echo '<span class="figyelmeztet">A projekt nevét, rövid leírását és a határidőt mindenképpen meg kell adni!</span>';

//		echo '<script>window.alert("A projekt nevét, rövid leírását és a határidőt mindenképpen meg kell adni!")</script>';
	}
}elseif (isset($_POST["Megsem"])) {
	echo '<script>window.open("ProjektOlvas.php?id=ValtozatlanLista", "_self")</script>';
}
?>

<!--Ez most csak annyit tud, hogy be lehet gepelni a nevet, rovid leirasat, a megrendelot es a hataridot-->

<!DOCTYPE>
<html lang="hu">
<head>
	<title>Projekt hozzáadása</title>
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
            <input type="submit" name="Megsem", value="Mégsem">
        </fieldset>
	</form>
</div>

</body>

</html>




