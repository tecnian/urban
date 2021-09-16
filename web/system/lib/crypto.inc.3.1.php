<?
        /*********************************
	Version 3.1
	AES-256-CBC
	*********************************/

	define('HMAC_MD5',  1);
	define('HMAC_SHA1', 2);

	class Crypto
	{
	
		var $keyName;
                var $secretKey = 'A5UzVfQxfkLJUOKnKGoc6oNp';
                var $method = 'AES-256-CBC';
		
		function __construct($keyName)
		{
			if (!isset($_SESSION[$keyName]))
			{
				$_SESSION[$keyName] = uniqid(mt_rand(), true);
			}
			elseif (is_null($_SESSION[$keyName]))
			{
				$_SESSION[$keyName] = uniqid(mt_rand(), true);
			}
			$this->keyName = $keyName;
		}
	
		function get_key()
		{
			return ($_SESSION[$this->keyName]);
		}

		function check_client_key($key)
		{
			if ($key == $_SESSION[$this->keyName])
			{ 
				return (true);
			}
			return (false);
		}
	
		function delete_key()
		{
			$_SESSION[$this->keyName] = NULL;
		}
	
		function hmac_md5($string) 
		{
			return $this->hmac($string, $_SESSION[$this->keyName], HMAC_MD5);	
		}
		
		function hmac($string, $key, $algorithm = HMAC_MD5) 
		{
			$algorithm = $algorithm == HMAC_MD5 ? 'md5' : 'sha1';
			
			if (function_exists('hash_hmac')) // PHP5
			{
				return hash_hmac($algorithm, $string, $key);
			}
			else
			{
				if (isset($key[64]))
				{
					$key = pack('H*', $algorithm($key)); 
				}
				$key = str_pad($key, 64, "\0");
				$iPad = str_repeat("\x36", 64);
				$oPad = str_repeat("\x5c", 64);
				return $algorithm(($key ^ $oPad).pack('H*', $algorithm(($key ^ $iPad) . $string)));
			}
		}

                function enc_md5($str)
                {
                        return (hash('md5', $str));
                }

                function unique_id_128()
                {
                        return (md5(uniqid()));
                }

                function encrypt($string)
                {                    
                    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($this->method));
    
                    $encrypted = openssl_encrypt($string, $this->method, $this->secretKey, 0, $iv);
                    
                    $enc_result =  base64_encode($encrypted."::".$iv);
                    
                    return($enc_result);
    
                }

                function decrypt($string)
                {
                    $result = '';
                    
                    $arr_enc = explode('::', base64_decode($string));
    
                    if (isset($arr_enc[0]) && isset($arr_enc[1]))
                    {
                        $encrypted_data = $arr_enc[0];
                        $iv = $arr_enc[1];

                        $result = openssl_decrypt($encrypted_data, $this->method, $this->secretKey, 0, $iv);
                    }
                    
                    return($result);

                }
	}

?>