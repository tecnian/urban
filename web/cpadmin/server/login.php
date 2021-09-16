<?php    
    include("$appSystemPath/lib/crypto.inc.3.1.php");
    include("$appSystemPath/var/class.admin.php");    
    
    $username = get_param('username');
    $password = get_var('password');    
    $logout = get_param('logout');
    $recordarme = get_check('recordarme');

    $_crypto = New Crypto('');
    $_auth = New Auth();
    $_user = New Admin();
    $_sess = New Sess();
    
    $active_user = false;
    $status_ok = false;
    $redirect = false;
    $message = '';
    
    if (!isset($password))
    {
        $password = '';
    }
    
    
    if (!empty($logout))
    {
        setcookie("ADM_USER_LOGIN", '', time() - 100);        
    }
    
    
    if (isset($_COOKIE['ADM_USER_LOGIN']) && empty($logout))
    {
        //entramos directamente
        $default_login = $_COOKIE['ADM_USER_LOGIN'];
        $condition = "usuario = '$default_login'";

        $user = $_user->get_record($condition);
        $_auth->login($appUserSession, $user);

        $redirect = true;
        
        if ($user['n_activo'] == 0)
        {
            $redirect = false;
        }
    }
    
    
    if (!empty($username) && !empty($password))
    {
        $redirect = false;
        
        $_auth->pswField = 't_password';
        $condition = "usuario = '$username' AND activo = 1";
        
        $user = $_auth->authenticate_user($_user, $condition, $_crypto, $password);
        if (isset($user))
        {            
            $_auth->login($appUserSession, $user);
            $status_ok = true;                  
        }           
        
        if (!$status_ok)
        {
            $message = $login_message[SYS::LOGIN_ERROR];
        }
        else
        {
            if ($recordarme)
            {
                setcookie("ADM_USER_LOGIN", $username, time() + 60*60*24*30);
            }
            
            header("Location: $appAdmHomePage");  
            exit();
        }
    }
    
    
    if ($redirect)
    {
        header("Location: $appAdmHomePage");  
        exit();
    }
?>