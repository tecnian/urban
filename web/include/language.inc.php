<?php
    
        /******************* Idiomas ******************/

        include("$appSystemPath/var/class.idioma.php");  
        
        $_idioma = new Idioma();   
        
        $def_lang = '';
        $app_language_code = array();
        
        
        //lista de idiomas
        
        $query = "SELECT * FROM idioma
                  WHERE activo = 1 
                  ORDER BY nombre";
        
        $idioma = $_idioma->get_query($query);
        
        for ($n = 0; $n < count($idioma); $n++)
        {
            $app_language[$idioma[$n]['codigo']] = $idioma[$n]['nombre'];
            
            if ($idioma[$n]['defecto'])
            {
                $def_lang = $idioma[$n]['codigo'];
            }
            
            array_push($app_language_code,$idioma[$n]['codigo']);
        }
                
                
        //idioma activo        
        
        $lang = get_param('lang');      
        
        if (!empty($lang))
        {
            if (!in_array($lang, $app_language_code))
            {
                if (isset($_SESSION['APP_CODE_LANG']))
                {
                    $lang = $_SESSION['APP_CODE_LANG'];
                }
                else
                {
                    $lang = $def_lang;
                }
            }
        }
        
        if (!empty($lang))
        {
            $app_code_lang = $lang;            

            $_SESSION['APP_CODE_LANG'] = $app_code_lang;
        }
        else
        {
            $app_code_lang = '';
            if (isset($_SESSION['APP_CODE_LANG']))
            {
                $app_code_lang = $_SESSION['APP_CODE_LANG'];
            }
        }        

        if (empty($app_code_lang))
        {
            $app_code_lang = $def_lang;
            
            $_SESSION['APP_CODE_LANG'] = $app_code_lang;
        }
        
        $app_id_lang = $_idioma->get_id($app_code_lang);
        
        $_SESSION['APP_ID_LANG'] = $app_id_lang;
                
        
        //fichero traducciones   
        
        include("$appLangPath/frontend.lang.php");
        include("$appLangPath/options.lang.php");
        
                
        
        
?>