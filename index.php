<html>
<title>PROJEKTER</title>
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./Dizajn/projekterCSS.css">
</head>
<body>
<h1 align=center>PROJEKTER</h1>
<br>
<?php
//Gather all the usefull functions
include_once("./security/encrypt.php");
include_once("./security/decrypt.php");
include_once("./inc/database_controller.php");
include_once("./security/authenticate.php");

//Check if the user has an open session
if(!isset($_SESSION['username'])){
	
	if(isset($_POST['register'])){
		
		//Check if the registration can be completed
		include_once("./security/pre_register_check.php");
		if(RegistrationPossible()){
			
			//Insert the new user into the DB
			include_once("./security/register.php");
			if(registerFromPOST()){
				print file_get_contents("./src/loginform.html");
			}else{
				print file_get_contents("./src/registerform.html");
			}
		}else{
			
			//Registration is incorrect because of incorrect input
			print "<br> Incorrect information given!<br>";
			print file_get_contents("./src/registerform.html");
		}
		
	}elseif(isset($_POST['username'])){//Check if the user has not logged in yet
	

		//Create encrypted information from the user input
		$encrypted_credentials = encrypt($_POST['username'].$_POST['password']);

		//Authenticate with the MySQL database
		$user_data = authenticate($_POST['username'],$encrypted_credentials);

		//Check if authentication was correct
		if($user_data !== FALSE){
			include_once("./Projektek/ProjektOlvas.php");
		}else{
			print "username or password is incorrect";
		}
		
	}elseif(isset($_GET['register'])){
		
		//display the registration form
		print file_get_contents("./src/registerform.html");
	}else{
		
		//display the login form
		print file_get_contents("./src/loginform.html");
	}
}else{
	include_once("./Projektek/ProjektOlvas.php");
}
?>
</body>
<html>