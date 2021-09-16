<?php
	//***********************************************
	//v2.1:  forzamos codificacion UTF8
	//***********************************************
	
	class DBO {		
		
		function connect_db() 
		{
			$host = CONN_DB::HOST;
			$user = CONN_DB::USER;
			$psw = CONN_DB::PSW;
			$name = CONN_DB::NAME;
			
			$db = mysqli_connect($host,$user,$psw);
			if (!mysqli_select_db($db,$name)) 
			{
				$db = NULL;
			}             
                        else
                        {
                            mysqli_query($db,"SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
                        }
			
			return ($db);
		}
	}

?>