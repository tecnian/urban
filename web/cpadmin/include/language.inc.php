<?php
	/******************* Idiomas ******************/

        include("$appSystemPath/var/class.idioma.php");  
        
        $_idioma = new Idioma();   
        
        $def_lang = 'es';
        $adm_language = array();
        $adm_language_code = array();
        
        $_SESSION['APP_CODE_LANG'] = NULL;
        
        
        //lista de idiomas
        
        $query = "SELECT * FROM idioma
                  WHERE activo_admin = 1 
                  ORDER BY nombre";
        
        $idioma = $_idioma->get_query($query);
        
        for ($n = 0; $n < count($idioma); $n++)
        {
            $adm_language[$idioma[$n]['codigo']] = $idioma[$n]['nombre'];
            
            if ($idioma[$n]['defecto_admin'])
            {
                $def_lang = $idioma[$n]['codigo'];
            }
            
            array_push($adm_language_code,$idioma[$n]['codigo']);
        }
                
                
        //idioma activo        
        
        $lang = get_param('lang');      
        
        if (!empty($lang))
        {
            if (!in_array($lang, $adm_language_code))
            {
                if (isset($_SESSION['ADM_CODE_LANG']))
                {
                    $lang = $_SESSION['ADM_CODE_LANG'];
                }
                else
                {
                    $lang = $def_lang;
                }
            }
        }
        
        if (!empty($lang))
        {
            $adm_code_lang = $lang;            

            $_SESSION['ADM_CODE_LANG'] = $adm_code_lang;
        }
        else
        {
            $adm_code_lang = '';
            if (isset($_SESSION['ADM_CODE_LANG']))
            {
                $adm_code_lang = $_SESSION['ADM_CODE_LANG'];
            }
        }        

        if (empty($adm_code_lang))
        {
            $adm_code_lang = $def_lang;
            
            $_SESSION['ADM_CODE_LANG'] = $adm_code_lang;
        }
        
        $adm_id_lang = $_idioma->get_id($adm_code_lang);
        
        $_SESSION['ADM_ID_LANG'] = $adm_id_lang;
                
        
        
        //link cambio idioma
        
        $adm_link_lang = $appFrontUrl.$_SERVER["REQUEST_URI"];
        
        if (strpos($adm_link_lang,'?') !== false)
        {
            $adm_link_lang .= "&lang=";
        }
        else
        {
            $adm_link_lang .= "?lang=";
        }
        
                       
        
        //fichero traducciones   
        
        include("$appLangPath/backend.lang.php");
        include("$appLangPath/options.lang.php");
        
?>