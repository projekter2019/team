<html>
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
error_reporting(E_ALL);
$menu = ( filter_has_var(INPUT_POST, 'menu') ) ? filter_input( INPUT_POST , 'menu' ) : '';
echo "Funkció: " . $menu . "\n<br />";
if (isset($_SESSION['username']) && $menu == 'kilep') {
	session_destroy();
	unset($_SESSION['username']);
} else {
	echo ( isset($_SESSION['username']) ) ? "User: " . $_SESSION['username'] . "\n<br />" : '';
}

?>
<br>
<?php
//Gather all the usefull functions
include_once("security/encrypt.php");
include_once("security/decrypt.php");
include_once("inc/database_controller.php");
include_once("security/authenticate.php");

function navigate(){
	if(isset($_GET['useredit'])){
		include_once("Fejlesztok/developers_edit_frontend.html");
	}elseif(isset($_GET['passchange'])){
		include_once("Fejlesztok/developers_passwordchange_frontend.html");
	}elseif(isset($_GET['userdelete'])){
		include_once("Fejlesztok/developers_delete.php");
	}elseif(isset($_GET['myprofile'])){
		include_once("Fejlesztok/developers_controller.php");
	}elseif(isset($_GET['projects'])){
		include_once("Projektek/ProjektOlvas.php");
	}elseif(isset($_GET['developers'])){
		include_once("Fejlesztok/developers_display.php");
	}else{
		print file_get_contents("src/navigateform.html");
	}
}

//Check if the user has an open session
if(!isset($_SESSION['username'])){	
	if(isset($_POST['register'])){		
		//Check if the registration can be completed
		include_once("security/pre_register_check.php");
		if(RegistrationPossible()){		
			//Insert the new user into the DB
			include_once("security/register.php");
			if(registerFromPOST()){
				print file_get_contents("src/loginform.html");
			}else{
				print file_get_contents("src/registerform.html");
			}
		}else{
			//Registration is incorrect because of incorrect input
			print "<br> Incorrect information given!<br>";
			print file_get_contents("src/registerform.html");
		}
	}elseif(isset($_POST['username'])){//Check if the user has not logged in yet
		//Create encrypted information from the user input
		$encrypted_credentials = encrypt($_POST['username'].$_POST['password']);

		//Authenticate with the MySQL database
		$user_data = authenticate($_POST['username'],$encrypted_credentials);

		//Check if authentication was correct
		if($user_data !== FALSE){
			if(stripos($user_data['ZAROLT'],"I") === FALSE){
				$_SESSION['username'] = $user_data['username'];
				navigate();
			}else{
				print "This account has been locked";
			}
		}else{
			print "username or password is incorrect";
		}		
	}elseif(isset($_GET['register'])){
		//display the registration form
		print file_get_contents("src/registerform.html");
	}else{
		//display the login form
		print file_get_contents("src/loginform.html");
	}
}else{
//	echo "START:" . __FILE__ . "<br />\n";
//	echo "DIR:" . __DIR__ . "<br />\n";	
	navigate();
}
?>
</body>
<html>
