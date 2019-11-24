<?php
	
	function encrypt($data)
    {
		$public_key = file_get_contents("./security/mykey.pub");
        if (openssl_public_encrypt($data, $encrypted, $public_key)){
            $data = base64_encode($encrypted);
        }else{
            throw new Exception('Unable to encrypt data. Perhaps it is bigger than the key size?');
		}
        return $data;
    }
