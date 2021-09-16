<?php

	class SYS {
		
            const ACTION_ADD = 'add';
            const ACTION_UPDATE = 'update';
            const ACTION_DELETE = 'delete';
            const ACTION_DELETE_FILE = 'delete_file';
            const ACTION_SEARCH = 'search';           

            const FILE_MODE_NONE = 0;
            const FILE_MODE_IMG = 1;
            const FILE_MODE_PDF = 2;
            const FILE_MODE_DOC = 3;
            const FILE_MODE_ZIP = 4;

            const FILE_TYPE_GIF = 'gif';
            const FILE_TYPE_JPEG = 'jpeg';
            const FILE_TYPE_PNG = 'png';
            const FILE_TYPE_PDF = 'pdf';
            const FILE_TYPE_DOC = 'doc';

            const IMG_TYPE_GIF = 1;
            const IMG_TYPE_JPEG = 2;
            const IMG_TYPE_PNG = 3;

            const FILE_RENAME_NONE = 0;
            const FILE_RENAME_SUFFIX = 1;
            const FILE_RENAME_FIXED = 2;
            const FILE_RENAME_CUSTOM = 3;
            const FILE_RENAME_AUTO = 4;

            //**** valores STATUS *******
            const FILE_NO_ERROR = 0;
            const FILE_ERROR_FORMAT = 1;
            const FILE_ERROR_SIZE = 2;
            const FILE_ERROR_UPLOAD = 3;
            const FILE_ERROR_DELETE = 4;
            
            const SHOW_NEXT_TAB = 10;
            const SHOW_SAME_PAGE = 11;
            const SHOW_CHANGE_PSW = 12;
            const SHOW_CHILDREN = 13;
            
            const ANY_VALUE = 99;
            //***************************

            const FILE_IMG_MODE_SHOW = 0;
            const FILE_IMG_MODE_SAVE = 1;

            const FILE_IMG_FIXED_HORIZONTAL = 0;
            const FILE_IMG_FIXED_VERTICAL = 1;

            const LOGIN_OK = 0;
            const LOGIN_ERROR = 1;

            const EMAIL_OK = 0;
            const EMAIL_ERROR = 1;
            const EMAIL_NO_EXIST = 2;

            const PASSWORD_OK = 0;
            const PASSWORD_ERROR = 1;
            const PASSWORD_SENT = 2;

            const INSERT_NO_AUTO = 0;
            const INSERT_AUTO = 1; 
            
            const PAGE_LIST = 1; 
            const PAGE_DETAIL = 2; 
            
	}

        class TBL {

            const ADMIN = 1; 
            const PAGINA = 2;
            const CONTENIDO = 3;
            const SLIDER = 4;
            const SLIDER_ITEM = 5;
            const CATALOGO = 6;
            const CONTACTO_WEB = 7;
            const PAIS_WEB = 8;
            const PERFIL_WEB = 9; 
            const IDIOMA = 10; 
            const CATEGORIA = 11; 
            const CATALOGO_FOTO = 12;
            const SECCION = 13; 
            const USUARIO = 14; 
            
                        
            /*** MOD::FORMS ***/
            
            const FORMS = 40;
            const FORMS_FIELDS = 41;
            const FORMS_FIELDS_OPTIONS = 42;
            const FORMS_SECTIONS = 43;
            
            
            /*** MOD::SHOP ***/
            
            const PRODUCTO = 50; 
            const PRODUCTO_FOTO = 51; 
            const PRODUCTO_FICHERO = 52; 
            const PEDIDO = 53;  
            const PEDIDO_PRODUCTO = 54;  
            const PRESUPUESTO = 55;  
            const PRESUPUESTO_PRODUCTO = 56;              
            const FACTURA = 57; 
            const CONFIG_TIENDA = 58; 
            
            
        }
        
        class CAT {

            const FAMILIA = 1;
            
            const CAT1 = 2;
            const CAT2 = 3;
            
        }
        
        class SEC {

            const SECCION_TEST = 1;            
            
        }
        
        class PAGE {

            const HOME = 1;
            const LISTADO = 2;
            const FICHA = 3;
            const RESULTADOS = 17;
            
        }
        
        class LANG {

            const ES = 'es';
            
        }

                
        
        //*************************************
        // Variables
        //*************************************

         $appEmptyDate = '0000-00-00';
         $appEmptyTime = '00:00:00';
         $appEmptyDateTime = '0000-00-00 00:00:00';
        
         
         //Variables de sesion  ***************************

         $appUserSession = 'USER_ID';
         $appTypeSession = 'TYPE_ID';         
         
         
         //dataTable settings

         $app_dataTable_lang = '"oLanguage": {
                                         "sSearch": "'.$opt_lang['dt_buscar'].': ",
                                         "sInfo": "'.$opt_lang['dt_mostrando'].'",
                                         "sLengthMenu": "'.$opt_lang['dt_registros'].'",
                                         "sEmptyTable": "'.$opt_lang['dt_no_datos'].'",
                                         "sInfoEmpty": "",
                                         "sProcessing": "'.$opt_lang['dt_cargando'].'",
                                         "oPaginate": {
                                             "sNext": "'.$opt_lang['dt_siguiente'].'",
                                             "sPrevious": "'.$opt_lang['dt_anterior'].'"
                                         }
                                }';
                                             

         //language settings
         
         $appLangInfo = array('table_name' => 'idioma',
                              'id_field' => 'id',
                              'code_field' => 'codigo',
                              'name_field' => 'nombre');



         //mensajes
         
         $error_message = array(SYS::FILE_NO_ERROR => $opt_lang['msg_fichero_cargado_ok'],
                                SYS::FILE_ERROR_FORMAT => $opt_lang['msg_fichero_formato_ko'],
                                SYS::FILE_ERROR_SIZE => $opt_lang['msg_fichero_supera_tamano_max'],
                                SYS::FILE_ERROR_UPLOAD => $opt_lang['msg_error_subir_fichero'],
                                SYS::FILE_ERROR_DELETE => $opt_lang['msg_error_eliminar_fichero']);

         $info_message = array(SYS::ACTION_ADD => $opt_lang['msg_datos_anadidos'],
                                SYS::ACTION_UPDATE => $opt_lang['msg_datos_modificados'],
                                SYS::ACTION_DELETE => $opt_lang['msg_registros_eliminados'],
                                SYS::ACTION_DELETE_FILE => $opt_lang['msg_fichero_eliminado'],
                                SYS::ACTION_SEARCH => '',
                                SYS::SHOW_NEXT_TAB => $opt_lang['msg_datos_actualizados'],
                                SYS::SHOW_SAME_PAGE => $opt_lang['msg_datos_modificados']);

         $psw_message = array(SYS::PASSWORD_OK => $opt_lang['msg_password_cambiada_ok'],
                              SYS::PASSWORD_ERROR => $opt_lang['msg_password_actual_ko'],
                              SYS::PASSWORD_SENT => $opt_lang['msg_password_enviada']);

         $login_message = array(SYS::LOGIN_OK => '',
                                SYS::LOGIN_ERROR => $opt_lang['msg_login_error']);

         $email_message = array(SYS::EMAIL_OK => '',
                                SYS::EMAIL_ERROR => $opt_lang['msg_email_error'],
                                SYS::EMAIL_NO_EXIST => $opt_lang['msg_email_no_existe']);
         
         
         
       
?>