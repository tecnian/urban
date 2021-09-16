<?php
    
        
        /*******************  Menu (Sin e-commerce)  ******************/
        
        
        include("$appSystemPath/var/class.pagina.php");  
        include("$appSystemPath/var/class.categoria.php");  
        
        $_pagina = new Pagina();   
        
        $app_menu = array();
        $app_submenu = array();
        
        $query = "SELECT id,titulo,friendly_url 
                  FROM pagina INNER JOIN pagina_idioma ON pagina.id = pagina_idioma.id_pagina
                  WHERE activo = 1 AND id_parent = 0 AND mostrar_menu = 1 AND id_idioma = $app_id_lang
                  ORDER BY orden";  
        
        
        $app_menu = $_pagina->get_query($query);
        
        for ($n = 0; $n < count($app_menu); $n++)
        {
            $query2 = "SELECT id,titulo,friendly_url 
                       FROM pagina INNER JOIN pagina_idioma ON pagina.id = pagina_idioma.id_pagina
                       WHERE activo = 1 AND mostrar_menu = 1 AND id_parent = ".$app_menu[$n]['id']." AND id_idioma = $app_id_lang
                       ORDER BY orden";  
            
            $app_submenu[$app_menu[$n]['id']] = $_pagina->get_query($query2);
        }
        
        
        
        
        /******************* Menu categorías producto (Con e-commerce) ******************/
        /*
        include("$appSystemPath/var/class.pagina.php");  
        include("$appSystemPath/var/class.categoria.php");                  
        
        $_pagina = new Pagina();   
        $_categoria = new Categoria();           
        
        $app_menu = array();
        $app_submenu = array();        
        
        $query = "SELECT id,nombre,friendly_url FROM categoria
                  INNER JOIN categoria_idioma ON categoria.id = categoria_idioma.id_categoria
                  WHERE id_tipo = ".CAT::FAMILIA." AND id_idioma = $app_id_lang AND activo = 1 AND id_parent = 0
                  ORDER BY nombre";
                
        $app_menu = $_categoria->get_query($query);
        
        for ($n = 0; $n < count($app_menu); $n++)
        {
            $query2 = "SELECT id,nombre,friendly_url FROM categoria
                       INNER JOIN categoria_idioma ON categoria.id = categoria_idioma.id_categoria
                       WHERE id_tipo = ".CAT::FAMILIA." AND id_idioma = $app_id_lang AND activo = 1 AND id_parent = ".$app_menu[$n]['id']."
                       ORDER BY nombre";  
            
            $app_submenu[$app_menu[$n]['id']] = $_categoria->get_query($query2);
        }
        */
        
        
        
         
        /******************* URLs amigables ******************/
        
        $_pagina_lang = new PaginaIdioma();   
        
        $app_url = array();
        
        
        $appFrontBaseUrl = $appFrontUrl.'/'.$app_code_lang;
        
        if (count($idioma) == 1 && $appUrlLangMode == CONF::URL_LANG_HIDE)
        {
            $appFrontBaseUrl = $appFrontUrl;
        }
        
        
        $query = "SELECT id_pagina,friendly_url,referencia
                  FROM pagina_idioma
                  INNER JOIN pagina ON pagina_idioma.id_pagina = pagina.id
                  WHERE id_idioma = $app_id_lang";
        
        $url = $_pagina_lang->get_query($query);
        
        for ($n = 0; $n < count($url); $n++)
        {            
            $app_url[$url[$n]['id_pagina']] = $appFrontBaseUrl.'/'.$url[$n]['friendly_url'];    
            
            if (trim($url[$n]['referencia']) != '')
            {
                $app_url[$url[$n]['referencia']] = $appFrontBaseUrl.'/'.$url[$n]['friendly_url'];    
            }
        }
        
        $_SESSION['APP_URL'] = $app_url;
        
        
        
        /*** Categorias producto (sin e-commerce) *****/                
        
        /*$_categoria = new Categoria();  

        $query = "SELECT id,nombre,friendly_url
                  FROM categoria INNER JOIN categoria_idioma ON categoria.id = categoria_idioma.id_categoria
                  WHERE id_tipo = ".CAT::CAT_PRODUCTO." AND id_idioma = $app_id_lang
                  ORDER BY orden";

        $gama = $_categoria->get_query($query);*/
        
        
        
        
        
        /*******************************/
        /********* ECOMMERCE ***********/
        /*******************************/
        
        
        
        /******** Carrito *********/
        
        /*
        include("$appSystemPath/var/shop/class.carrito.php");  
        
        $_carrito = new Carrito();  
        
        $id_usuario = 0;
        $sesion_id = session_id();
        
        
        if ($id_usuario > 0)
        {
            $cond_cesta = "id_usuario = $id_usuario";
        }
        else
        {
            $cond_cesta = "sesion_id = '$sesion_id'";
        }
        
        $sql_cesta = "SELECT id FROM carrito WHERE $cond_cesta";
        
        $app_items_carrito = $_carrito->record_count($sql_cesta);
        */
        
        
        /******** Favoritos *********/
        
        /*
        include("$appSystemPath/var/shop/class.favorito.php");  
        
        $_favorito = new Favorito();  
        
        $app_items_fav = 0;
        
        if (isset($_SESSION['APP_USER_ID']))
        {                        
            $sql_fav = "SELECT id_producto FROM favorito WHERE id_usuario = ".$_SESSION['APP_USER_ID'];
        
            $app_items_fav = $_favorito->record_count($sql_fav);
        }
        */
        
        
        
        
    
    
?>