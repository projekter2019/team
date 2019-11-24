<?php include_once("ProjektMenu.php");	?>
<form action="index.php?modul=projects&funkcio=search" method="post">
	<fieldset>
		<span class="MezoInfo">A projekt neve:</span>
		<input type="text" name="P_nev" value=""><br>
		<input type="submit" name="Elkuld", value="Keresés">
<!--		<input type="submit" name="Megsem", value="Mégsem">-->

	</fieldset>
</form>
<a href="index.php">Vissza</a>
<?php
require_once("inc/database_controller.php");
//require_once("../inc/database_controller_gy.php");

if (isset($_POST["Elkuld"])) {
	if (!empty($_POST["P_nev"])) {

		$P_nev = $_POST["P_nev"];
		$conn = OpenSQLConn();
		$P_nev= htmlspecialchars($P_nev);
		$P_nev = mysqli_real_escape_string($conn, $P_nev);
		$sql = "SELECT * FROM projektek WHERE LOCATE('{$P_nev}',p_nev) > 0";
		$stmt = $conn->query($sql);
		if (mysqli_num_rows($stmt) == 0) {
            echo '<span class="figyelmeztet"><br>Nincs a keresésnek megfelelő projekt!</span>';
            return;
		}else

		?>
	<table width="1000" border="4" align="center">
		<caption>A keresésnek megfelelő projektek</caption>
		<tr>
			<th>ID</th>
			<th>Projekt név</th>
			<th>A projekt rövid leírása</th>
			<th>Megbízó</th>
            <th width="120px">Határidő</th>
<!--            <th width="100px">Szerkesztés</th>-->
		</tr>

		<?php

		while ($Adatsorok = $stmt -> fetch_array()) {
			$P_ID = $Adatsorok["id"];
			$P_nev = $Adatsorok["p_nev"];
			$P_leiras = $Adatsorok["p_leiras"];
			$P_megrendelo = $Adatsorok["p_megrendelo"];
			$P_hatarido = $Adatsorok["p_hatarido"];
?>
		<tr>
			<td><?php echo $P_ID ?></td>
			<td><?php echo $P_nev?></td>
			<td><?php echo $P_leiras?></td>
			<td><?php echo $P_megrendelo?></td>
			<td><?php echo $P_hatarido?></td>
<!--			<td> <a href="index.php?modul=developers&funkcio=lista">Kiválaszt</a> </td>-->
		</tr>
		<?php }?>
	</table>
<?php

//	} else {
//		echo "Valamit be kell irni";
	}
}
if (isset($_POST["Megsem"])) {
//	include("/index.php?modul=projects&funkcio=lista");
	echo '<script>window.open("/index.php?modul=projects&funkcio=lista", "_self")</script>';
}
