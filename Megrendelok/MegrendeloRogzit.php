<?php
require_once("inc/database_controller_gy.php");
//require_once("inc/database_controller_gy.php");

if (isset($_POST["Elkuld"])) {
	if (!empty($_POST["M_nev"])) {
		$M_nev = $_POST["M_nev"];
		$M_cim = $_POST["M_cim"];
		$M_elerhetoseg = $_POST["M_elerhetoseg"];
		global $conn;
		$sql = "INSERT INTO megrendelok(m_nev, m_cim, m_elerhetoseg)
                VALUES (?, ?, ?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param('sss', $M_nev, $M_cim, $M_elerhetoseg);

		$Execute = $stmt->execute();
		if ($Execute) {
			echo '<script>window.alert("Az új megrendelő elmentése sikerült!")</script>';
			echo '<script>window.open("MegrendeloOlvas.php?id=Frissitett", "_self")</script>';
			//Megnyitaja a masik oldalt, ami listazza a meglevo megrendeloket
		}
	}
	else {
		echo '<span class="figyelmeztet">A megrendelő nevét mindenképpen meg kell adni!</span>';

	}
}elseif (isset($_POST["Megsem"])) {
	echo '<script>window.open("MegrendeloOlvas.php?id=ValtozatlanLista", "_self")</script>';
}
?>
<div class="">
	<form class="" action="MegrendeloRogzit.php" method="post">
		<fieldset>
			<span class="MezoInfo">Az új megrendelő neve:</span>
			<br>
			<input type="text" name="M_nev" value="">
			<span class="MezoInfo">A megrendelő címe:</span>
			<br>
			<input type="text" name="M_cim" value="">
			<span class="MezoInfo">A megrendelő elérhetősége:</span>
			<br>
			<input type="text" name="M_elerhetoseg" value="">
			<input type="submit" name="Elkuld", value="Adatok elküldése">
			<input type="submit" name="Megsem", value="Mégsem">
		</fieldset>
	</form>
</div>
