<?php    
    include("../system/config/config.inc.php");
    include("$appFrontPath/include/include.inc.php");    
    
    
   
    $email_check = get_param('email_check',0);
    $acepto = get_param('acepto',0);
    $nombre = get_param('nombre');
    $empresa = get_param('empresa');
    $email = get_param('email');    
    $comentarios = get_param('mensaje');
    
    $comentarios = str_replace('\n','<br/>',$comentarios);
    
    
    $message = $app_lang['datos_enviados'];  //mensaje a mostrar
    $status = 1;  //validacion OK
    $classname = '';  //nombre de la clase de los campos que quedaran marcados
    
    
    
    //validacion campos obligatorios
    if ($status == 1)
    {
        if (trim($nombre) == '')
        {
            $status = 0;
        }
        if (trim($email) == '')
        {
            $status = 0;
        }
        if (trim($empresa) == '')
        {
            $status = 0;
        }
        if (trim($comentarios) == '')
        {
            $status = 0;
        }
        
        if ($status == 0)
        {
            $message = $app_lang['introducir_obligatorios'];
            $classname = 'form-required'; 
        }
    }
    
    //validacion email
    if ($email_check == 0 && $status == 1)
    {
        $message = $app_lang['email_incorrecto'];
        $status = 0;
        $classname = 'form-email'; 
    }
    
    //validacion aceptacion condiciones
    if ($acepto != 1 && $status == 1)
    {
        $message = $app_lang['aceptar_condiciones'];
        $status = 0;
    }
    
    
    
    
   
    
    $arr_result = array('status' => $status,'message' => $message,'classname' => $classname);            
            

    echo json_encode($arr_result);
    
?>