<?php
    //**********************************************
    // Constants
    //**********************************************
    class OPT {       
                
        const PROFILE_SUPERADMIN = 0;
        const PROFILE_ADMIN = 1;
        const PROFILE_USER = 2;
        
        const CONT_TITULO = 1;
        const CONT_SUBTITULO = 2;
        const CONT_TEXTO_CORTO = 3;
        const CONT_TEXTO_HTML = 4;
        const CONT_TEXTO_IMAGEN = 5;
        const CONT_LINK = 6;
        const CONT_IMAGEN = 7;
        const CONT_SLIDER = 8;
        const CONT_CARRUSEL = 9;
        const CONT_VIDEO = 10;
        const CONT_FICHERO = 11;
        
        const FORMAT_1 = 1;
        const FORMAT_2 = 2;
        
        const TARGET_INT = 1;
        const TARGET_EXT = 2;
        
        const TIPO_DOC_NIF = 1;
        const TIPO_DOC_NIE = 2;
        const TIPO_DOC_CIF = 3;
        
        const USER_PARTICULAR = 1;
        const USER_EMPRESA = 2;
        
        
        
        /**** MOD::SHOP *****/
        
        const PED_NONE = 0;
        const PED_PENDIENTE_PAGO = 1;
        const PED_PREPARACION = 2;
        const PED_ENVIADO = 3;        
        
        const PRESUP_PENDIENTE = 1;
        const PRESUP_ACEPTADO = 2;                 
                
        const PAGO_TARJETA = 1;
        const PAGO_TRANSFERENCIA = 2;   
        const PAGO_PAYPAL = 3;
        
        const SHOP_IMPORTE_COMPRA_MIN = 'importe_compra_min';
        const SHOP_IMPORTE_ENVIO_GRATIS = 'importe_envio_gratis';
        const SHOP_GASTO_ENVIO = 'gasto_envio';
        const SHOP_PTJE_IVA = 'ptje_iva';
        const SHOP_PTJE_IVA_ENVIO = 'ptje_iva_envio';
        
        
        /**** MOD::FORMS *****/
        
        const FORMS_TYPE_SURVEY = 1;
        
        const FIELD_TYPE_TEXT = 1;
        const FIELD_TYPE_NUMBER = 2;
        const FIELD_TYPE_SELECT = 3;
        const FIELD_TYPE_CHECKBOX = 4;
        const FIELD_TYPE_TEXTAREA = 5;  
        const FIELD_TYPE_RADIO = 6;    
        const FIELD_TYPE_YESNO = 7;  
        const FIELD_TYPE_FILE = 8;  
                                                       
    }
    

    //***********************************************
    // Session Variables
    //***********************************************

    
   
    //***********************************************
    // Variables
    //***********************************************        

    
    $options_profile = array(OPT::PROFILE_ADMIN => $opt_lang['administrador'],
                             OPT::PROFILE_USER => $opt_lang['usuario']);
    
    $options_si_no = array(1 => $opt_lang['si'],
                           0 => $opt_lang['no']);
    
    $options_tipo_contenido = array(OPT::CONT_TITULO => $opt_lang['titulo'],
                                    OPT::CONT_SUBTITULO => $opt_lang['subtitulo'],
                                    OPT::CONT_TEXTO_CORTO => $opt_lang['texto_corto'],
                                    OPT::CONT_TEXTO_HTML => $opt_lang['texto_html'],
                                    OPT::CONT_TEXTO_IMAGEN => $opt_lang['texto_imagen'],
                                    OPT::CONT_LINK => $opt_lang['link'],
                                    OPT::CONT_IMAGEN => $opt_lang['imagen'],
                                    OPT::CONT_SLIDER => $opt_lang['slider'],
                                    OPT::CONT_CARRUSEL => $opt_lang['carrusel_imagenes'],
                                    OPT::CONT_VIDEO => $opt_lang['video'],
                                    OPT::CONT_FICHERO => $opt_lang['fichero']);
    
    $options_target = array(OPT::TARGET_INT => $opt_lang['enlace_interno'],
                            OPT::TARGET_EXT => $opt_lang['enlace_externo']);
            
    $options_tipo_documento = array(OPT::TIPO_DOC_NIF => 'NIF',
                                    OPT::TIPO_DOC_NIE => 'NIE',
                                    OPT::TIPO_DOC_CIF => 'CIF');
    
    $options_tipo_usuario = array(OPT::USER_PARTICULAR => $opt_lang['particular'],
                                  OPT::USER_EMPRESA => $opt_lang['empresa']);
    
    $options_activo = array(-1 => '- '.$opt_lang['todos'].' -',
                            1 => $opt_lang['activos'],
                            0 => $opt_lang['inactivos']);
    
            
    $options_mes = array(1 => $opt_lang['enero'],
                         2 => $opt_lang['febrero'], 
                         3 => $opt_lang['marzo'], 
                         4 => $opt_lang['abril'], 
                         5 => $opt_lang['mayo'], 
                         6 => $opt_lang['junio'], 
                         7 => $opt_lang['julio'], 
                         8 => $opt_lang['agosto'], 
                         9 => $opt_lang['septiembre'],
                         10 => $opt_lang['octubre'],    
                         11 => $opt_lang['noviembre'], 
                         12 => $opt_lang['diciembre']);
    
    $options_page_format = array(OPT::FORMAT_1 => 'Formato 1',
                                 OPT::FORMAT_2 => 'Formato 2');
    
    $options_file_format = array(OPT::FORMAT_1 => 'home.php',
                                 OPT::FORMAT_2 => 'noticias.php');
    
    
    $options_categoria = array(CAT::FAMILIA => $opt_lang['categorias_producto'],
                               CAT::CAT1 => 'Categoría 1',
                               CAT::CAT2 => 'Categoría 2');
    
    
    
    
    /**** MOD::SHOP *****/
    
    $options_config_tienda = array(//OPT::SHOP_GASTO_ENVIO,  //activar solo cuando hay un solo precio para los gastos envio
                                   OPT::SHOP_IMPORTE_COMPRA_MIN,
                                   OPT::SHOP_IMPORTE_ENVIO_GRATIS,
                                   OPT::SHOP_PTJE_IVA,
                                   OPT::SHOP_PTJE_IVA_ENVIO);
    
    $options_estado_pedido['es'] = array(OPT::PED_NONE => $opt_lang['sin_finalizar'],
                                         OPT::PED_PENDIENTE_PAGO => $opt_lang['pendiente_pago'],
                                         OPT::PED_PREPARACION => $opt_lang['en_preparacion'],
                                         OPT::PED_ENVIADO => $opt_lang['enviado']);
    
    $options_estado_presupuesto['es'] = array(OPT::PRESUP_PENDIENTE => $opt_lang['pendiente'],
                                              OPT::PRESUP_ACEPTADO => $opt_lang['aceptado']);
    
    $app_company_data = array('nombre' => 'Nombre Empresa',
                              'direccion' => 'Dirección Empresa',
                              'cod_postal' => 'CP Empresa',
                              'poblacion' => 'Población Empresa',
                              'provincia' => 'Provincia Empresa',
                              'telefono' => '+34 99 999 99 99',
                              'nif' => 'B00000000',
                              'iban' => 'ESXX XXXX XXXX XXXX XXXX XXXX',
                              'bic' => 'XXXX XXXXXXX');
    
    
    
    /**** MOD::FORMS *****/
    
    $options_forms_type = array(OPT::FORMS_TYPE_SURVEY => $opt_lang['encuestas'],
                                );
    
    $options_forms_field_type = array(OPT::FIELD_TYPE_TEXT => $opt_lang['texto_linea'],
                                      OPT::FIELD_TYPE_NUMBER => $opt_lang['numero'],
                                      OPT::FIELD_TYPE_SELECT => $opt_lang['selector_opciones'],
                                      OPT::FIELD_TYPE_CHECKBOX => $opt_lang['checkbox'],
                                      OPT::FIELD_TYPE_TEXTAREA => $opt_lang['texto_multilinea'],
                                      OPT::FIELD_TYPE_RADIO => $opt_lang['botones_opcion'],
                                      OPT::FIELD_TYPE_YESNO => $opt_lang['si_no'],
                                      OPT::FIELD_TYPE_FILE => $opt_lang['fichero']);
    
    $options_forms_field_width = array(12 => '100%',
                                       9 => '75%',
                                       6 => '50%',
                                       4 => '33%',
                                       3 => '25%',
                                       2 => '20%');
    
   
   

   
   //************************************************
   // Functions
   //************************************************   
      
   function get_random_password()
    {
       $randkey = '';
       $keychars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
       $pwd_len = 8;
       $max = strlen($keychars) - 1;

       for ($i = 0; $i < $pwd_len; $i++)
       {
           $randkey .= substr($keychars, rand(0, $max), 1);
       }

       return($randkey);
    }
           
   
   function get_html_mailing($url)
   {
              
       $html = '<html>
                    <body bgcolor="#f1f1f1">
                        <table cellspacing="15" cellpadding="0" border="0" align="center" width="600">
                            <tr>
                                <td><img src="'.$url.'/assets/img/logo_mail.png" alt="" style="width:200px" /></td>
                            </tr>            
                        </table>
                        <table cellspacing="20" cellpadding="0" border="0" align="center" width="600" bgcolor="#ffffff">
                            <tr>
                                <td>
                                    <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%">
                                        [#content#]
                                    <table>    
                                </td>
                            </tr>            
                        </table>
                    </body>
                </html>';
               
       
       return $html;
   }         
   
   function encrypt_id($id, $steps = 6)
   {
       $enc_id = $id;
       
       for ($n = 0; $n < $steps; $n++)
       {
           $enc_id = base64_encode($enc_id);
       }
              
       $enc_id = str_replace('=','',$enc_id);
       
       return($enc_id);
   }
   
   function decrypt_id($id, $steps = 6)
   {
       $dec_id = $id;
       
       for ($n = 0; $n < $steps; $n++)
       {
           $dec_id = base64_decode($dec_id);
       }
              
       return($dec_id);
   }
   
   
   function get_current_uri()
   {
       $current_uri = '';
       $num_params = 1;
                     
       global $appFrontUrl;
       global $appServerUrl;
       global $appUrlLangMode;
              
       if ($appUrlLangMode == CONF::URL_LANG_SHOW)
       {
           $num_params++;
       }    
           
       
       $uri = $_SERVER['REQUEST_URI'];
       
       $arr_uri = explode("/",$uri);
                     
       
       for ($n = 0; $n <= $num_params; $n++)
       {
           if (isset($arr_uri[$n]))
           {
               if ($n > 0)
               {
                   $current_uri .= "/";
               }               
               
               $current_uri .= $arr_uri[$n];
           }
       }
       
       
       
       $app_front_url = $appFrontUrl;
       
       if ($appServerUrl != '')
       {
           $app_front_url = str_replace($appServerUrl,'',$app_front_url);
       }
       
       $current_uri = $app_front_url.$current_uri;
       
       return($current_uri);
   }    
   
   
   function send_email($_mail, $arr_mail = array())
   {
       
        if (trim(MAIL::ADDRESS) != '')
        {            

            if (MAIL::HOST != '')
            {
                $_mail->Host = MAIL::HOST;
            }
            if (MAIL::PORT > 0)
            {
                $_mail->Port = MAIL::PORT;
            }


            $_mail->CharSet = "iso-8859-1";
            $_mail->From = MAIL::ADDRESS;
            $_mail->FromName = MAIL::TITLE;

            $_mail->Subject = utf8_decode($arr_mail['subject']);
            $_mail->Body = utf8_decode($arr_mail['body']);   
            
            $_mail->IsHTML (true);
            $_mail->SMTPAutoTLS = false; 

            if (MAIL::SMTP)
            {
                $_mail->IsSMTP();
            }

            if (MAIL::AUTH)
            {
                $_mail->SMTPAuth = true;
                $_mail->Username = MAIL::USERNAME;
                $_mail->Password = MAIL::PASSWORD;
            }

            
            for ($n = 0; $n < count($arr_mail['emails']); $n++)
            {
                $_mail->AddAddress($arr_mail['emails'][$n]);    
            }
            
            if (isset($arr_mail['bcc_emails']))
            {
                for ($n = 0; $n < count($arr_mail['bcc_emails']); $n++)
                {
                    $_mail->AddBCC($arr_mail['bcc_emails'][$n]);    
                }
            }

            $_mail->Send();



            /*if ($_mail->Send())
            {
                $msg = "El servidor funciona correctamente";
            }
            else
            {
                $msg = $_mail->ErrorInfo;
            }

            echo $msg; */            

        }    
   }
   
   
?>