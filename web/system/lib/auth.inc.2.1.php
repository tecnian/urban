<?
	/*********************************
	Versio 2.1
	Adaptació AES-256-CBC
	*********************************/

        class Auth extends Sess
	{            

            var $pswField;

            function authenticate_user($_admin, $condition, $_crypto, $password)
            {                
                $user = array();
                $auth_ok = false;

                $user = $_admin->get_record($condition);
                
                if (isset($user[$this->pswField]))
                {                    		    
                    $pwd = $user[$this->pswField];

                    if ($_crypto->decrypt($pwd) == $password)
                    {                    	
                        $auth_ok = true;
                    }
                }

                if ($auth_ok)
                {
                    return($user);
                }
                else
                {
                    return(NULL);
                }
            }

            function login($sess_name, $value)
            {
                if ($this->create($sess_name, $value))
                {
                    return(true);
                }
                else
                {
                    return(false);
                }
            }

            function logout($sess_name)
            {                
                $this->delete($sess_name);
            }

            function is_active($sess_name)
            {
                $status = false;
                $value = $this->get_value($sess_name);
                                
                if (!is_null($value))
                {
                    $status = $value;
                }                
                                
                return($status);
            }



        }
?>