<?php
require_once("DB.php");

?>
//Egy tablazatban kiirja a Projektek adatbazisban szereplo projekteket, illetve egy-egy gombot a szerkeszteshez
//es a torleshez

<!DOCTYPE>
<html>
<head>
	<title>Projektek megtekintése</title>
<!--	<link rel="stylesheet" type="text/css" href="http://localhost/Projekter/Dizajn/projekterCSS.css">-->
	<link rel="stylesheet" type="text/css" href="../Dizajn/projekterCSS.css">

</head>

<body>
<table width="1000" border="4" align="center">
	<caption>Az adatbázisban szereplő projektek</caption>
	<tr>
		<th>ID</th>
		<th>Projekt név</th>
		<th>A projekt rövid leírása</th>
		<th>Megbízó</th>
		<th>Határidő</th>
		<th>Törlés</th>
		<th>Szerkesztés</th>
	</tr>

	<?php
	global $DBkapcsolat;
	$sql = "SELECT * FROM projektek";
	$stmt = $DBkapcsolat -> query($sql);
	while ($Adatsorok = $stmt -> fetch()){
		$Id = $Adatsorok["id"];
		$P_nev = $Adatsorok["p_nev"];
		$P_leiras = $Adatsorok["p_leiras"];
		$P_megrendelo = $Adatsorok["p_megrendelo"];
		$P_hatarido = $Adatsorok["p_hatarido"];
		?>
		<tr>
			<td><?php echo $Id ?></td>
			<td><?php echo $P_nev?></td>
			<td><?php echo $P_leiras?></td>
			<td><?php echo $P_megrendelo?></td>
			<td><?php echo $P_hatarido?></td>
			<td> <a href="Szerkeszt.php?id=<?php echo $Id; ?>">Szerkesztés</a> </td> //meg nincs megirva
			<td> <a href="Torol.php?id=<?php echo $Id; ?>">Törlés</a> </td> //meg nincs megirva
		</tr>
	<?php } ?>
</table>

</body>


</html>


