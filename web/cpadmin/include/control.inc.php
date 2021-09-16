<?php
	//*****  user access control  ****
        $_control = New Auth();
        
        $active_user = $_control->is_active($appUserSession);   
        
        if ($active_user)
        {
            $user_id = $active_user['n_id'];
            $user_name = $active_user['t_nombre'];
            $user_login = $active_user['t_usuario'];
            $user_profile = ceil($active_user['n_id_perfil']);            
        }
        else
        {
            header("Location: $appAdmUrl/index.php");
            exit();
        }
        
?>