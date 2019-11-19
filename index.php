<?php header ('Content-Type: text/html; charset=UTF-8');
	session_start();
	error_reporting(E_ALL);
	$modul = ( filter_has_var(INPUT_GET, 'modul') ) ? filter_input( INPUT_GET , 'modul' ) : '';
	$funkcio = ( filter_has_var(INPUT_GET, 'funkcio') ) ? filter_input( INPUT_GET , 'funkcio' ) : '';
	$login_message = "";
	if (isset($_SESSION['username']) && $funkcio == 'logout') {
		session_destroy();
		unset($_SESSION['username']);
		$modul = "";	
		$funkcio = "";
	} elseif ( isset($_POST['username'])){
		//Gather all the usefull functions
		include_once("security/encrypt.php");
		include_once("security/decrypt.php");
		include_once("inc/database_controller.php");
		include_once("security/authenticate.php");
		
		$encrypted_credentials = encrypt($_POST['username'].$_POST['password']);
		$user_data = authenticate($_POST['username'], $encrypted_credentials);
		if($user_data !== FALSE){
			if(stripos($user_data['ZAROLT'],"I") === FALSE){
				$_SESSION['username'] = $user_data['username'];
			}else{
				$login_message = "This account has been locked";
			}
		}else{
			$login_message = "username or password is incorrect";
		}		
	}	
?>
<!DOCTYPE html>
<html dir="ltr" lang="hu">
<title>PROJEKTER</title>
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="Dizajn/menu.css">
    <link rel="stylesheet" type="text/css" href="Dizajn/projekterCSS.css">
</head>
<body>
<?php include_once("inc/menu.php");	?>
<h1 align=center>PROJEKTER</h1>
<br>
<?php
//echo "Funkció: ". $modul . " / " . $funkcio . "\n<br />";

//Check if the user has an open session
if( isset($_SESSION['username']) ) {
	if ($modul == "projects") {
		if ($funkcio == 'lista'){
			include_once("Projektek/ProjektOlvas.php");
		} elseif ($funkcio == 'lista'){
			include_once("Projektek/ProjektOlvas.php");
		} else {
			include_once("Projektek/ProjektOlvas.php");			
		}
	} elseif ($modul == "developers") {
		if ($funkcio == "useredit") {
			include_once("Fejlesztok/developers_edit_frontend.html");
		} elseif ($funkcio == 'passchange') {
			include_once("Fejlesztok/developers_passwordchange_frontend.html");
		} elseif ($funkcio == 'userdelete') {
			include_once("Fejlesztok/developers_delete.php");
		} elseif ($funkcio == 'myprofile') {
			include_once("Fejlesztok/developers_controller.php");
		} else {
			include_once("Fejlesztok/developers_display.php");
		}
		include_once("src/navigateform.html");
	} elseif ($modul == "time") {
		include_once("Projektek/ProjektOlvas.php");	
		
	} else {
		//echo "SESSION:" . ( isset($_SESSION['username']) ) ? "User: " . $_SESSION['username'] . "\n<br />" : '';
		//echo "Projektek/ProjektOlvas.php:" . "\n<br />";
		include_once("Projektek/ProjektOlvas.php");	
	} 
} else {
	include_once("src/loginform.html");
	print "<p>" . $login_message . "</p><br />";
}
?>
</body>
</html>
