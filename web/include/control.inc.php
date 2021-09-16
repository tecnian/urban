<?php
    
        /******************* User Data ******************/
        
        $app_user_id = 0;
        $app_user_profile = 0;
        $app_user_name = 0;        
        
        if (isset($_SESSION['APP_USER_ID'])) 
        {
            $app_user_id = $_SESSION['APP_USER_ID'];
            $app_user_profile = $_SESSION['APP_USER_DATA']['n_id_profile'];
            $app_user_name = $_SESSION['APP_USER_DATA']['t_nombre'].' '.$_SESSION['APP_USER_DATA']['t_apellidos'];            
        }
        
        if (isset($app_private_page))
        {
            if ($app_private_page)
            {
                if (!isset($_SESSION['APP_USER_ID'])) 
                {
                    //redireccion a pagina login

                    //Header("Location: ".$app_url['login']);                
                    //exit();
                }
            }
        }
?>