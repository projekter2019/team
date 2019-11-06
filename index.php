<html>
<title>PROJEKTER</title>
<head>
	<link rel="stylesheet" type="text/css" href="../Dizajn/projekterCSS.css">
</head>
<body>
<h1 align=center>PROJEKTER</h1>
<br>
<?php
	//Gather all the useful functions
	include("./security/encrypt.php");
	include("./security/decrypt.php");
	include("./inc/database_controller.php");
	include("./security/authenticate.php");

	//Check if the user has not logged in yet
	if(!isset($_POST['username'])){
		
		//display the login form
		print file_get_contents("./src/loginform.html");
		
	}else{
		
		//Create encrypted information from the user input
		$encrypted_credentials = encrypt($_POST['username'].$_POST['password']);
		
		//Authenticate with the MySQL database
		$user_data = authenticate($_POST['username'],$encrypted_credentials);
		
		//Check if authentication was correct
		if($user_data !== FALSE){
			
			//Display Projects
			include_once("./Projektek/ProjektOlvas.php");
		}else{
			print "username or password is incorrect";
		}
	}
?>
</body>
<html>
