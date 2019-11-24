<?php
	//session_start();
	#Authenticate by checking for the given encrypted_credentials in the MySQL database
	function authenticate($username, $encrypted_credentials){
		//Open connection to MySQL database
		$conn = openSQLConn();
		
		//Query the database if there is a User with the given credentials
		$sql = "SELECT * FROM developers WHERE username = '$username'";
		$result = $conn->query($sql);
		
		if($result->num_rows != 0){
			//Authentication successful
			
			$user_data = $result->fetch_assoc();
			if(decrypt($user_data['password']) === decrypt($encrypted_credentials)){
				return $user_data;
			}
			return false;	
		}else{
			//Authentication unsuccessful
			session_destroy();
			return false;
		}
	}
