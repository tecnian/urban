<?php
	$app_lang = array();
        
        
        switch ($app_code_lang)
        {        
            
            case 'en':
                
                $app_lang['nombre'] = "Name";
                $app_lang['telefono'] = "Teléfono";
                $app_lang['email'] = "Email";
                $app_lang['comentarios'] = "Comentarios";
                $app_lang['enviar'] = "Enviar";
                
                $app_lang['email_incorrecto'] = "El email es incorrecto";
                $app_lang['aceptar_condiciones'] = "Debe aceptar los términos y condiciones";
                $app_lang['introducir_obligatorios'] = "Por favor introduzca los campos obligatorios";
                $app_lang['datos_enviados'] = "Los datos se han enviado correctamente";
                $app_lang['psw_no_coincide'] = "Las contraseñas no coinciden";
                $app_lang['psw_longitud_minima'] = "La contraseña debe tener una longitud mínima de 8 caracteres";
                $app_lang['registro_ok'] = "El registro se ha realizado correctamente";
                $app_lang['confirm_registro_ok'] = "Tu cuenta ha sido activada correctamente";
                $app_lang['confirm_registro_ko'] = "Lo sentimos, tu cuenta no ha podido ser activada.";
                $app_lang['datos_login_ko'] = "Los datos de identificación son incorrectos";
                $app_lang['email_no_existe'] = "El email no existe";
                $app_lang['email_ya_existe'] = "El email ya existe, por favor haga login";
                $app_lang['psw_enviada'] = "Hemos enviado la contraseña a tu correo electrónico";
                

                break;
            
                        
            case 'es':
            default:
                
                $app_lang['nombre'] = "Nombre";
                $app_lang['telefono'] = "Teléfono";
                $app_lang['email'] = "Email";
                $app_lang['comentarios'] = "Comentarios";
                $app_lang['enviar'] = "Enviar";
                
                $app_lang['email_incorrecto'] = "El email es incorrecto";
                $app_lang['aceptar_condiciones'] = "Debe aceptar los términos y condiciones";
                $app_lang['introducir_obligatorios'] = "Por favor introduzca los campos obligatorios";
                $app_lang['datos_enviados'] = "Los datos se han enviado correctamente";
                $app_lang['psw_no_coincide'] = "Las contraseñas no coinciden";
                $app_lang['psw_longitud_minima'] = "La contraseña debe tener una longitud mínima de 8 caracteres";
                $app_lang['registro_ok'] = "El registro se ha realizado correctamente";
                $app_lang['confirm_registro_ok'] = "Tu cuenta ha sido activada correctamente";
                $app_lang['confirm_registro_ko'] = "Lo sentimos, tu cuenta no ha podido ser activada.";
                $app_lang['datos_login_ko'] = "Los datos de identificación son incorrectos";
                $app_lang['email_no_existe'] = "El email no existe";
                $app_lang['email_ya_existe'] = "El email ya existe, por favor haga login";
                $app_lang['psw_enviada'] = "Hemos enviado la contraseña a tu correo electrónico";

                break;
            
        }
        
        
        $_SESSION['APP_LANG'] = $app_lang;
        
        
        
?>