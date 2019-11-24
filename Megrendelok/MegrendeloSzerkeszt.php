<?php
require_once("../inc/database_controller_gy.php");
//require_once("inc/database_controller_gy.php");

$KeresoParameter = $_GET["id"];
if (isset($_POST["Elkuld"])) {
	if (!empty($_POST["M_nev"])) {
		$M_nev = $_POST["M_nev"];
		$M_cim = $_POST["M_cim"];
		$M_elerhetoseg = $_POST["M_elerhetoseg"];
		global $conn;
		$sql = "UPDATE megrendelok SET m_nev = '$M_nev', m_cim = '$M_cim', m_elerhetoseg = '$M_elerhetoseg'
 				WHERE m_id = '$KeresoParameter'";
		$Execute = $conn->query($sql);
		if ($Execute) {
			echo '<script>window.alert("A megrendelő adatainak módosítása sikerült!")</script>';
			echo '<script>window.open("MegrendeloOlvas.php?id=Frissitett", "_self")</script>';
		} else {
			echo "Nem sikerult";
		}
	}
	else {
		?>
		<div>
			<!--    echo '<span class="figyelmeztet">A megrendelő nevét mindenképpen meg kell adni!</span>';-->
			<span class="figyelmeztet">A megrendelő nevét mindenképpen meg kell adni!</span>'
		</div>
		<?php
	}

} elseif (isset($_POST["Megsem"])) {
	echo '<script>window.open("MegrendeloOlvas.php?id=Frissitett", "_self")</script>';
}
?>
<?php
global $conn;
$sql = "SELECT * FROM megrendelok WHERE m_id = '$KeresoParameter'";
$stmt = $conn->query($sql);
$Adatsorok = $stmt->fetch_array();
$M_nev = $Adatsorok["m_nev"];
$M_cim = $Adatsorok["m_cim"];
$M_elerhetoseg = $Adatsorok["m_elerhetoseg"];

?>
<div class="">
	<form class="" action="MegrendeloSzerkeszt.php?id=<?php echo $KeresoParameter;?>" method="post">
		<fieldset>
			<span class="MezoInfo">A megrendelő neve:</span>
			<br>
			<input type="text" name="M_nev" value="<?php echo $M_nev;?>">
			<span class="MezoInfo">A megrendelő címe:</span>
			<br>
			<input type="text" name="M_cim" value="<?php echo $M_cim;?>">
			<span class="MezoInfo">A megrendelő elérhetősége:</span>
			<br>
			<input type="text" name="M_elerhetoseg" value="<?php echo $M_elerhetoseg;?>">
			<input type="submit" name="Elkuld", value="A változások mentése">
			<input type="submit" name="Megsem", value="Mégsem">
		</fieldset>
	</form>
</div>