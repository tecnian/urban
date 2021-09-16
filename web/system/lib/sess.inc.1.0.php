<? 
	class Sess
	{
            
		function create($name, $value)
		{
			if (!isset($_SESSION[$name]))
			{
				$_SESSION[$name] = $value;     
                                
                                return (true);
			}
			else
			{			
                                return (false);
			}
		}
		
		function get_value($name)
		{			
                        if (isset($_SESSION[$name]))
			{
				return $_SESSION[$name];
			}
			else
			{
				return (NULL);
			}
		}

                function set_value($name, $value)
		{
			if (isset($_SESSION[$name]))
			{
                            $_SESSION[$name] = $value;                            
                            return (true);
			}
			else
			{                            
                            return (false);
			}                        
		}

		function delete($name)
		{
			unset($_SESSION[$name]);						
		}

                function delete_all($array_sess, $current_sess)
                {
                    for ($i = 0; $i < count($array_sess); $i++)
                    {                        
                        if ($array_sess[$i] != $current_sess)
                        {
                            $this->delete($array_sess[$i]);
                        }
                    }
                }

                function set_serialize($name)
                {
                    $_SESSION[$name] = serialize($_SESSION[$name]);

                }

                function set_unserialize($name)
                {
                    $_SESSION[$name] = unserialize($_SESSION[$name]);

                }
	}
?>