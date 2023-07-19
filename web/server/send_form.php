<?php    
    include("../system/config/config.inc.php");
    include("$appFrontPath/include/include.inc.php");        
    include("$appSystemPath/var/class.contacto_web.php");  
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    include("$appSystemPath/lib/phpmailer/src/Exception.php"); 
    include("$appSystemPath/lib/phpmailer/src/PHPMailer.php"); 
    include("$appSystemPath/lib/phpmailer/src/SMTP.php"); 
        
    $_contacto = new ContactoWeb();  
    
   
    $nombre = get_param('nombre');
    $empresa = get_param('empresa');
    $email = get_param('email');    
    $comentarios = get_param('mensaje');
    
    $comentarios = str_replace('\n','<br/>',$comentarios);
    
       
    
    //guardamos datos en BD
    
    /*$_contacto->record["t_fecha"] = date('Y-m-d H:i');
    $_contacto->record["t_nombre"] = $nombre;
    $_contacto->record["t_email"] = $email;
    $_contacto->record["t_telefono"] = $telefono;
    $_contacto->record["t_ip"] = $_SERVER['REMOTE_ADDR'];
    $_contacto->record["t_comentarios"] = $comentarios;
    $_contacto->record["n_gestionado"] = 0;
    
    $_contacto->insert_record();*/
        

    
    //Envio email
    
    $_mail = new PHPMailer();
    
    
    $subject = 'Contacto web';
    
    
    $html_mail = get_html_mailing(APP_ROOT_URL);
    
    $content = "<div style='font-family:Arial'>
                    Mensaje recibido desde el formulario de contacto:<br/><br/>
                    Nombre: ".$nombre."<br/>
                    Email: ".$email."<br/>     
                    Empresa: ".$empresa."<br/>     
                    Mensaje:<br/>".$comentarios."<br/>
                </div>";
    
    $content = str_replace('[#content#]',$content,$html_mail);
            
    
    
    $arr_mail['subject'] = $subject;
    $arr_mail['body'] = $content;
    $arr_mail['emails'][0] = MAIL::ADMIN;        
        
    send_email($_mail,$arr_mail);
    
?>