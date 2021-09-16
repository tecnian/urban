<?php
    //ini_set('session.bug_compat_42',0);
    //ini_set('session.bug_compat_warn',0);

    include("$appAdmPath/include/control.inc.php");
    include("$appSystemPath/lib/crypto.inc.3.1.php");
    include("$appSystemPath/var/class.admin.php");
    
    $action_page = "form_password.php";
    $status_ok = false;

    $current_psw = get_var('current_psw');
    $new_psw = get_var('new_psw');    

    $_crypto = New Crypto('');
    $_auth = New Auth();
    $_admin = New Admin();

    if (isset($current_psw))
    {
        $_auth->pswField = 't_password';
        $condition = "usuario = '$user_login'";

        $user = $_auth->authenticate_user($_admin, $condition, $_crypto, $current_psw);
        if (isset($user))
        {
                $new_psw_enc = $_crypto->encrypt($new_psw);

                //Guardamos la nueva contrasena en la BD
                $_admin->update_field('t_password', $new_psw_enc, $condition);

                $status_ok = true;
        }
        
        if (!$status_ok)
        {
            $message = $psw_message[SYS::PASSWORD_ERROR];
        }
        else
        {
            $message = $psw_message[SYS::PASSWORD_OK];
        }
    }
?>