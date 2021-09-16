<?php
        include("$appSystemPath/var/class.contenido.php");  
        include("$appSystemPath/var/class.slider_item.php");  
        include("$appSystemPath/var/class.perfil_web.php");  
        include("$appSystemPath/var/class.catalogo.php"); 
        
        $_contenido = new Contenido();  
        $_slider_item = new SliderItem();  
        $_perfil_web = new PerfilWeb();  
        
        
        $url =  get_param('url');  //url pagina
        $url_cat =  get_param('urlc');  //url categoria
        $url_item =  get_param('urlx');  //url detalle
        
        $id_pagina = 0;
        $app_id_page = 0;
        $app_php_file = '';
                
        
        //indicador pagina listado o detalle
        
        $app_page_mode = SYS::PAGE_LIST;  
        
        if (!empty($url_item))
        {
            $app_page_mode = SYS::PAGE_DETAIL;  
        }
               
        $app_is_page = false;
        $app_is_category = false;
        $app_is_product = false;
        
        $app_categoria = array();      
        $app_producto = array();    
        
        $app_private_page = false;
        
        
        
        // *** Datos página (sin e-commerce) **/
        
        
        $condition = "friendly_url = '$url' AND id_idioma = $app_id_lang"; 
        
        $app_page = $_pagina_lang->get_record($condition);
        
        if (isset($app_page['n_id_pagina']))
        {            
            if ($app_page['n_id_pagina'] != '' && is_numeric($app_page['n_id_pagina']))
            {
                $id_pagina = $app_page['n_id_pagina'];   

                $app_php_file = $app_page['t_php_file'];
                
                $app_id_page = $id_pagina;
            }
        }
        
        //************************//
        
        
        
        // *** Datos página (con e-commerce) **/
        
        /*
        include("$appSystemPath/var/shop/class.producto.php");  
        
        $_categoria_lang = new CategoriaIdioma(); 
        $_producto_lang = new ProductoIdioma();         
        
        $condition = "friendly_url = '$url' AND id_idioma = $app_id_lang";   
        
        $app_page = $_pagina_lang->get_record($condition);
        
        if (isset($app_page['n_id_pagina']))
        {            
            $id_pagina = $app_page['n_id_pagina'];   
            
            $app_php_file = $app_page['t_php_file'];
         
            $app_is_page = true;
                        
        }
        else
        {
            $sql0 = "SELECT id_categoria,nombre,seo_title,seo_description,seo_keywords FROM categoria
                     INNER JOIN categoria_idioma ON categoria.id = categoria_idioma.id_categoria
                     WHERE friendly_url = '$url' AND id_idioma = $app_id_lang AND id_tipo = ".CAT::FAMILIA;
            
            $aux_categoria = $_categoria_lang->get_query($sql0);
            
            if (isset($aux_categoria[0]['id_categoria']))
            {
                $app_categoria = $aux_categoria[0];
                
                $id_pagina = PAGE::LISTADO;   
                
                $app_is_category = true;
            }
            else
            {
                $sql1 = "SELECT id_producto,nombre,seo_title,seo_description,seo_keywords,activo
                         FROM producto_idioma INNER JOIN producto
                         ON producto_idioma.id_producto = producto.id
                         WHERE friendly_url = '$url' AND id_idioma = $app_id_lang";
                
                $aux_producto = $_producto_lang->get_query($sql1);
                
                if (isset($aux_producto[0]['id_producto']))
                {
                    $app_producto = $aux_producto[0];
                    
                    $id_pagina = PAGE::FICHA;   

                    $app_is_product = true;
                }
                
            }
        }
                
        */
        //************************//
        
        
        
        
        
        $cond = "id = $id_pagina";
            
        $app_page_data = $_pagina->get_record($cond);
            
        if (empty($app_php_file))
        {
            $app_php_file = $app_page_data['t_php_file'];
            
            $app_private_page = $app_page_data['n_privada'];  
                
            
            
            if ($app_page_data['n_id_formato'] > 0)
            {
                $app_php_file = $options_file_format[$app_page_data['n_id_formato']];
            }
        }
        
        
        
        
        //Contenidos pagina
        
        $query = "SELECT id,id_tipo,contenido.imagen,img_alt,id_slider,titulo,subtitulo,texto,texto_html,enlace,title,id_target,follow,video,
                  nombre,destacado,contenido.fichero,contenido_idioma.fichero AS fichero_idioma,contenido_idioma.imagen AS imagen_idioma
                  FROM contenido INNER JOIN contenido_idioma ON contenido.id = contenido_idioma.id_contenido
                  WHERE id_pagina = $id_pagina AND id_idioma = $app_id_lang AND activo = 1
                  ORDER BY orden";  
        
        $app_din_content = $_contenido->get_query($query);
        
        
        
        //Sliders
        
        /*$app_slider = array();
        $app_fix_content = array();
        
        for ($i = 0; $i < count($app_din_content); $i++) 
        {
            if ($app_din_content[$i]['id_tipo'] == OPT::CONT_SLIDER || $app_din_content[$i]['id_tipo'] == OPT::CONT_CARRUSEL)               
            {
                $query2 = "SELECT slider_item.imagen,img_alt,titulo,texto,enlace,id_target,slider_item_idioma.imagen AS imagen_idioma
                           FROM slider_item INNER JOIN slider_item_idioma ON slider_item.id = slider_item_idioma.id_slider_item
                           WHERE id_slider = ".$app_din_content[$i]['id_slider']." AND activo = 1 AND id_idioma = $app_id_lang
                           ORDER BY orden";
                
                $app_slider[$app_din_content[$i]['id']] = $_slider_item->get_query($query2);
            }
            
            
            //datos para presentar contenidos fijos
            
            $app_fix_content[$app_din_content[$i]['id']] = $app_din_content[$i];
            
        }*/
        
        
        
        //ID pagina padre seccion
        
        $app_main_page_id = $_pagina->get_main_id($id_pagina);
        
        
        
        //URL canonical
        
        $app_url_canonical = '';
        
        if (isset($app_url[$id_pagina]))
        {
            $app_url_canonical = $app_url[$id_pagina];
        }
        
        
        
        
        //Clase CSS del perfil web de la página
        
        $app_class = '';
        
        $query = "SELECT class_name FROM perfil_web
                  INNER JOIN pagina_perfil ON perfil_web.id = pagina_perfil.id_perfil_web
                  WHERE id_pagina = $id_pagina";
        
        $perfilweb = $_perfil_web->get_query($query);
        
        if (isset($perfilweb[0]['class_name']))
        {
            $app_class = $perfilweb[0]['class_name'];
        }
        
        if (!empty($app_class))
        {
            $app_class = ' class="'.$app_class.'"';
        }
        
        
        
        //link cambio idioma
        
        $_catalogo_lang = new CatalogoIdioma(); 
        $_categoria_lang = new CategoriaIdioma();  
        

        $app_lang_change = array();
        
        for ($x = 0; $x < count($idioma); $x++)
        {
            $app_lang_change[$idioma[$x]['id']] = $_pagina_lang->change_language($app_id_page,$idioma[$x]['codigo']);
            
            
            if (!empty($url_cat))
            {
                $app_lang_change[$idioma[$x]['id']] .= '/'.$_categoria_lang->change_language($url_cat,$app_id_lang,$idioma[$x]['id']);
            }
            
            if (!empty($url_item))
            {
                $app_lang_change[$idioma[$x]['id']] .= '/'.$_catalogo_lang->change_language($url_item,$app_id_lang,$idioma[$x]['id']);
            }
            
        }
        
        
        
        //error 404
        
        if ($id_pagina == 0)
        {
            Header("Location: ".$app_url['error404']);
            exit();
        }
        
    
?>