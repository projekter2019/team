<?php
	
  function decrypt($data){
    $private_key = file_get_contents("./security/mykey.pem");
    if (openssl_private_decrypt(base64_decode($data), $decrypted, $private_key))
      $data = $decrypted;
    else
      $data = '';
      
    return $data;
    }
    