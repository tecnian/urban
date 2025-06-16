<?php
	//session_save_path("/tmp");
        session_start();
	error_reporting(E_ALL);
        ini_set("display_errors",1);  
        //ini_set("display_errors",0);    
        header('Content-Type: text/html; charset=utf-8');
        
        date_default_timezone_set('Europe/Madrid');

        
        //***** funcion para obtener la carpeta raiz del servidor web ****
        
        function get_document_root()
	{
            $appDocRoot = '';

            if (!isset($_SERVER['DOCUMENT_ROOT']))
            {
		$absolutePath = str_replace("\\", "/", $_SERVER["PATH_TRANSLATED"]);
		$scriptPath = str_replace("\\", "/", $_SERVER["SCRIPT_NAME"]);
		$appDocRoot = str_replace($scriptPath, '', $absolutePath);
            }
            else
            {
		$appDocRoot = $_SERVER['DOCUMENT_ROOT'];
            }

            if ($appDocRoot == '')
            {
            	echo "ERROR : Can't get the DOCUMENT_ROOT on this machine (virtual path)";
		exit;
            }            
            
            return($appDocRoot);
	}
	
        
        
	//*****  Definicion rutas  *****
        
	$host = $_SERVER['SERVER_NAME'];
        $appDocumentRoot = get_document_root();
        
        
	switch ($host)
	{
		case 'urban.dvp':
                case 'urban.local':
                    
                        $appServerRoot = '';
                        $appServerUrl = '';
                        
                        define("APP_ROOT_PATH","$appDocumentRoot$appServerRoot");
                        define("APP_ROOT_URL","http://$host$appServerUrl");
                    			
			break;
                    
                case 'urban.server-develop.com':
                    
                        $appServerRoot = '';
                        $appServerUrl = '';
                        
                        define("APP_ROOT_PATH","$appDocumentRoot$appServerRoot");
                        define("APP_ROOT_URL","https://$host$appServerUrl");
                    			
			break;
                                    
		default:
                        $appServerRoot = '';
                        $appServerUrl = '';
                        
                        define("APP_ROOT_PATH","$appDocumentRoot$appServerRoot");
                        define("APP_ROOT_URL","https://$host$appServerUrl");
                    
			break;
	}

        

        //**** Carpetas del sistema ****************
        
	$appSystemPath = APP_ROOT_PATH."/system";
        $appAdmPath = APP_ROOT_PATH."/cpadmin";
        $appFrontPath = APP_ROOT_PATH;
        $appContentPath = APP_ROOT_PATH."/content";
        $appFilesPath = APP_ROOT_PATH."/files";    
        $appFilesPathBack = APP_ROOT_PATH."/files/back";         
        $appFilesPathImg = APP_ROOT_PATH."/files/img";              
        $appFilesPath_CKEditor = APP_ROOT_PATH."/files/ckeditor";    
        $appExportPath = APP_ROOT_PATH."/files/csv"; 
        $appFilesPathPdf = APP_ROOT_PATH."/files/pdf";            
        $appLangPath = APP_ROOT_PATH."/lang";

        $appSystemUrl = APP_ROOT_URL."/system";
        $appAdmUrl = APP_ROOT_URL."/cpadmin";
        $appFrontUrl = APP_ROOT_URL;
        $appContentUrl = APP_ROOT_URL."/content";
        $appFilesUrl = APP_ROOT_URL."/files";    
        $appFilesUrlBack = APP_ROOT_URL."/files/back";    
        $appFilesUrlImg = APP_ROOT_URL."/files/img";    
        $appFilesUrl_CKEditor = APP_ROOT_URL."/files/ckeditor";    
        $appExportUrl = APP_ROOT_URL."/files/csv";
        $appFilesUrlPdf = APP_ROOT_URL."/files/pdf";            
        $appLangUrl = APP_ROOT_URL."/lang";
	
		
        
	//*****  Conexion base de datos  *****
        
        include("$appSystemPath/lib/dbo.inc.2.1.php");
        
	switch ($host)
	{		
                case 'urban.dvp':
			class CONN_DB
			{
				const HOST = 'localhost';
				const USER = 'root';
				const PSW = 'root';
				const NAME = 'db_urban';
			}
			break; 
                    
                case 'urban.local':
			class CONN_DB
			{
				const HOST = 'localhost';
				const USER = 'develop';
				const PSW = 'develop';
				const NAME = 'db_urban';
			}
			break; 
                
                case 'urban.server-develop.com':
			class CONN_DB
			{
				const HOST = 'localhost';
				const USER = 'userdburban';
				const PSW = '0D!hli97';
				const NAME = 'db_urban';
			}
			break; 
               
		default:
			class CONN_DB
			{
				const HOST = 'localhost';
				const USER = 'urbanlofts';
				const PSW = '9h@pDNhN';
				const NAME = 'urbanlofts_bd';
			}
			break;
	}
        $dbo = New DBO();
        $db_global = $dbo->connect_db();
        
							
	//**** Servidor de correo ****
        
        class MAIL
	{
		const HOST = '';
                const PORT = 0;
                
                const ADDRESS = 'info@actualbcn.com';  
                const TITLE = 'Urban Lofts BCN';
                const ADMIN = 'info@actualbcn.com';
                const SMTP = false;
                
                const AUTH = false;
                const USERNAME = '';
                const PASSWORD = '';
	}
        

	//**** Parametros configurables ****
        
	class CONF
	{		
                const FILE_MAX_SIZE = 1048576;
                const IMG_THUMB_WIDTH = 250;
                const DEFAULT_LANGUAGE = 1;          
                
                const URL_LANG_HIDE = 1;
                const URL_LANG_SHOW = 2;                                
                                                
	}
        
        
        
        
        $appAdmTitle = 'Gestor contenidos Urban';
        $appAdmVersion = '';
        $appAdmHomePage = 'list_pagina.php';
        
        //$appUrlLangMode = CONF::URL_LANG_HIDE;
        $appUrlLangMode = CONF::URL_LANG_SHOW;
        
        $appMods = array('shop','forms');
			
?>