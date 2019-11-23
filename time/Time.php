<?php

?>
<br />
<div  id="">
	<h2>IDŐ RÖGZÍTÉSE</h2>
	<form name="time_form" method="post" action="index.php?modul=time&funkcio=save">
		<input name="action" type="hidden" id="action" value="save_time">
		<table border="0" cellpadding="5">
			<tbody>
				<tr>
					<td><label for="projekt">Projekt</label></td>
					<td><select name="projekt">
						<option name="projekt" value="" >Válassz projektet...</option>
					<?php
						$mysqli = new mysqli("localhost", "penzkorh_proj", "Proj3ct3r", "penzkorh_projekter", 3306);
						if ($mysqli->connect_errno) {
							echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
						} else {
							if ($result = $mysqli->query("SELECT p_nev FROM projektek")) {
								while($obj = $result->fetch_object()){ 
									$line = $obj->p_nev; 
									$data = htmlspecialchars($line);
							?>
							<option name="projekt" value="<?php echo $data ?>" ><?php echo $data ?></option>
				<?php			}
							}
							$mysqli->close();
						}
				?>
						</select>						
					</td>
				</tr>	
				<tr>
					<td><label for="developer">Fejlesztő</label></td>
					<td><select name="developer">
						<option name="developer" value="" >Válassz fejlesztőt...</option>
					<?php
						$mysqli = new mysqli("localhost", "penzkorh_proj", "Proj3ct3r", "penzkorh_projekter", 3306);
						if ($mysqli->connect_errno) {
							echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
						} else {
							if ($result = $mysqli->query("SELECT username FROM developers")) {
								while($obj = $result->fetch_object()){ 
									$line = $obj->username; 
									$data = htmlspecialchars($line);
							?>
							<option name="developer" value="<?php echo $data ?>" ><?php echo $data ?></option>
				<?php			}
							}
							$mysqli->close();
						}
				?>
						</select>						
					</td>
				</tr>
				<tr>
					<td><label for="datum">Dátum</label></td>
					<td><input type="date" name="datum" value="" /></td>
				</tr>	
				<tr>
					<td><label for="time">Idő</label></td>
					<td><input type="time" name="time" value="" /></td>
				</tr>	
				<tr>
					<td></td>
					<td><input class="admin_button" type="submit" value="MENTÉS" /></td>
				</tr>	
			</tbody>
		</table>
	</form>	
</div>
<br />
<?php 