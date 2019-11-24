<?php header ('Content-Type: text/html; charset=UTF-8');
	session_start();
	error_reporting(E_ALL);
	$modul = ( filter_has_var(INPUT_GET, 'modul') ) ? filter_input( INPUT_GET , 'modul' ) : '';
	$funkcio = ( filter_has_var(INPUT_GET, 'funkcio') ) ? filter_input( INPUT_GET , 'funkcio' ) : '';
	$id = ( filter_has_var(INPUT_GET, 'id') ) ? filter_input( INPUT_GET , 'id' ) : '';
	
	$username = ( filter_has_var(INPUT_POST, 'username') ) ? filter_input( INPUT_POST , 'username' ) : '';
	$password = ( filter_has_var(INPUT_POST, 'password') ) ? filter_input( INPUT_POST , 'password' ) : '';
	$login_message = "";
	if (isset($_SESSION['username']) && $funkcio == 'logout') {
		session_destroy();
		unset($_SESSION['username']);
		$modul = "";	
		$funkcio = "";
	} elseif ( $username != ''	){
		//Gather all the usefull functions
		include_once("security/encrypt.php");
		include_once("security/decrypt.php");
		include_once("inc/database_controller.php");
		include_once("security/authenticate.php");
		
		$encrypted_credentials = encrypt($username.$password);
		$user_data = authenticate($username, $encrypted_credentials);
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
if( isset($_SESSION['username']) ) {
	if ($modul == "projects") {
		if ($funkcio == 'lista'){
			include_once("Projektek/ProjektOlvas.php");
		} elseif ($funkcio == 'edit'){
			include_once("Projektek/ProjektSzerkeszt.php");
		} elseif ($funkcio == 'delete'){
			include_once("Projektek/ProjektTorol.php");
		} elseif ($funkcio == 'create'){
			include_once("Projektek/ProjektRogzit.php");
		} elseif ($funkcio == 'search'){
			include_once("Projektek/ProjektKereso.php");
		} else {
			include_once("Projektek/ProjektOlvas.php");			
		}
	} elseif ($modul == "megrendelok") {
		if ($funkcio == 'lista'){
			include_once("Megrendelok/MegrendeloOlvas.php");
		} else {
			include_once("Megrendelok/MegrendeloOlvas.php");
		}
	} elseif ($modul == "developers") {
		include_once("Fejlesztok/developers_menu.php");
		if ($funkcio == "useredit") {
			include_once("Fejlesztok/developers_edit_frontend.html");
		} elseif ($funkcio == 'editdata') {
			include_once("Fejlesztok/developers_edit_backend.php");
		} elseif ($funkcio == 'passchange') {
			include_once("Fejlesztok/developers_passwordchange_frontend.html");
		} elseif ($funkcio == 'passchangedata') {
			include_once("Fejlesztok/developers_passwordchange_backend.php");
		} elseif ($funkcio == 'userdelete') {
			include_once("Fejlesztok/developers_delete.php");
		} elseif ($funkcio == 'userlock') {
			include_once("Fejlesztok/developers_lock.php");
		} else {
			include_once("Fejlesztok/developers_display.php");
		}
	} elseif ($modul == "time") {
		if ($funkcio == "lista") {
			include_once("time/Time.php");	
		} elseif ($funkcio == 'save') {
			include_once("time/Time.php");	
		} else {
			include_once("time/Time.php");	
		}
	} else {
		include_once("Projektek/ProjektOlvas.php");	
	} 
} else {
	if ($funkcio == "register") {
		include_once("src/registerform.html");
	} elseif($funkcio == "registerdata"){
		include_once("security/register.php");
		registerFromPOST();
		echo ". Redirecting...";
		header( "refresh:3;url=index.php" );
	} else{
		include_once("src/loginform.html");
		print "<p>" . $login_message . "</p><br />";
	}
}
?>
</body>
</html>
<?php 
