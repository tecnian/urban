<?php
    include("../../system/config/config.inc.php");
    include("$appAdmPath/include/include.inc.php");
    include("$appAdmPath/include/control.inc.php");
    include("$appSystemPath/lib/data.inc.2.2.php");  
    

    $table_id = get_param('tbl');
    $type = get_param('type');
    $params = get_param('params');
    $extra_param = '';
    
    $is_ajax = false;
    

    switch ($table_id)
    {        
        case TBL::ADMIN:
            include("$appSystemPath/var/class.admin.php");
            $_data = new Admin();
            
            $index_field = "id";
            $grid_page = "list_admin.php";

            break;
        
        
        case TBL::PAGINA:
            include("$appSystemPath/var/class.pagina.php");
            $_data = new Pagina();            
	    
	    $_sort = new Sort();
            $_sort->table_name = $_data->table_name;

            $index_field = "id";
            $grid_page = "list_pagina.php";

            break;
        
        
        case TBL::CONTENIDO:
            include("$appSystemPath/var/class.contenido.php");
            $_data = new Contenido();
            
            $_sort = new Sort();
            $_sort->table_name = $_data->table_name;
                        
            $id_pagina = get_param('id_pagina',0);

            $index_field = "id";
            $grid_page = "jx_list_contenido.php";

            $extra_param = "id_pagina=$id_pagina&";

            $is_ajax = true;

            break;
        
        
        case TBL::SLIDER:
            include("$appSystemPath/var/class.slider.php");
            $_data = new Slider();
            
            $index_field = "id";
            $grid_page = "list_slider.php";
            
            break;
        
        
        case TBL::SLIDER_ITEM:
            include("$appSystemPath/var/class.slider_item.php");
            $_data = new SliderItem();
            
            $_sort = new Sort();
            $_sort->table_name = $_data->table_name;
                        
            $id_slider = get_param('id_slider',0);

            $index_field = "id";
            $grid_page = "jx_list_slider_item.php";

            $extra_param = "id_slider=$id_slider&";

            $is_ajax = true;

            break;
        
        
        case TBL::CATALOGO:
            include("$appSystemPath/var/class.catalogo.php");
            $_data = new Catalogo();       
            
            $_sort = new Sort();
            $_sort->table_name = $_data->table_name;            
            
            $index_field = "id";
            $grid_page = "list_catalogo.php";
            
            $extra_param = 'type='.$type.'&';

            break;
        
        
        case TBL::CATALOGO_FOTO:
            include("$appSystemPath/var/class.catalogo_foto.php");
            $_data = new CatalogoFoto();
            
            $_sort = new Sort();
            $_sort->table_name = $_data->table_name;
            
            
            $id_catalogo = get_param('id_catalogo',0);

            $index_field = "id";
            $grid_page = "jx_list_catalogo_foto.php";

            $extra_param = "id_catalogo=$id_catalogo&type=$type&";

            $is_ajax = true;

            break;
        
        
        case TBL::CONTACTO_WEB:
            include("$appSystemPath/var/class.contacto_web.php");
            $_data = new ContactoWeb();            	    	    

            $index_field = "id";
            $grid_page = "list_contacto_web.php";

            break;
        
        
        case TBL::PAIS_WEB:
            include("$appSystemPath/var/class.pais_web.php");
            $_data = new PaisWeb();            	    	    

            $index_field = "id";
            $grid_page = "list_pais_web.php";

            break;
        
        
        case TBL::PERFIL_WEB:
            include("$appSystemPath/var/class.perfil_web.php");
            $_data = new PerfilWeb();            	    	    

            $index_field = "id";
            $grid_page = "list_perfil_web.php";

            break;
        
        
        case TBL::IDIOMA:
            include_once("$appSystemPath/var/class.idioma.php");
            $_data = new Idioma();            	    	    

            $index_field = "id";
            $grid_page = "list_idioma.php";

            break;
        
        
        case TBL::CATEGORIA:
            include("$appSystemPath/var/class.categoria.php");
            $_data = new Categoria();
                        
            $_sort = new Sort();
            $_sort->table_name = $_data->table_name;
            
            $index_field = "id";
            $grid_page = "list_categoria.php";
            
            $extra_param = 'type='.$type.'&';
                        
            break;  
        
        
        case TBL::SECCION:
            include("$appSystemPath/var/class.seccion.php");
            $_data = new Seccion();
            
            $index_field = "id";
            $grid_page = "list_seccion.php";

            break;
        
        
        case TBL::USUARIO:
            include("$appSystemPath/var/class.usuario.php");
            $_data = new Usuario();
                                    
            $index_field = "id";
            $grid_page = "list_usuario.php";
            
            $extra_param = 'type='.$type.'&';
                        
            break;  
        
        
        
        /*******************************/
        /********* MOD::SHOP ***********/
        /*******************************/
        
        
        /* 
        case TBL::PRODUCTO:
            include("$appSystemPath/var/shop/class.producto.php");
            $_data = new Producto();       
            
            
            $index_field = "id";
            $grid_page = "shop_list_producto.php";
                        

            break;
        
        
        case TBL::PRODUCTO_FOTO:
            include("$appSystemPath/var/shop/class.producto_foto.php");
            $_data = new ProductoFoto();
            
            $_sort = new Sort();
            $_sort->table_name = $_data->table_name;
            
            
            $id_producto = get_param('id_producto',0);

            $index_field = "id";
            $grid_page = "shop_jx_list_producto_foto.php";

            $extra_param = "id_producto=$id_producto&";

            $is_ajax = true;

            break;
        
        
        case TBL::PRODUCTO_FICHERO:
            include("$appSystemPath/var/shop/class.producto_fichero.php");
            $_data = new ProductoFichero();
                        
            
            $id_producto = get_param('id_producto',0);

            $index_field = "id";
            $grid_page = "shop_jx_list_producto_fichero.php";

            $extra_param = "id_producto=$id_producto&";

            $is_ajax = true;

            break;
        
        
        case TBL::PEDIDO:
            include("$appSystemPath/var/shop/class.pedido.php");
            $_data = new Pedido();            

	    $index_field = "id";
            $grid_page = "shop_list_pedido.php";            

            break;
        
        
        case TBL::PRESUPUESTO:
            include("$appSystemPath/var/shop/class.presupuesto.php");
            $_data = new Presupuesto();            

	    $index_field = "id";
            $grid_page = "shop_list_presupuesto.php";            

            break;
        
        
        case TBL::FACTURA:
            include("$appSystemPath/var/shop/class.factura.php");
            $_data = new Factura();
            
            $index_field = "id";
            $grid_page = "shop_list_factura.php";

            break;
        
        
        case TBL::CONFIG_TIENDA:
            include("$appSystemPath/var/shop/class.config_tienda.php");
            $_data = new ConfigTienda();
            
            $index_field = "id";
            $grid_page = "shop_form_config_tienda.php";
            
            $is_ajax = true;

            break;
        */
        
        
        
        
        /*******************************/
        /********* MOD::FORMS ***********/
        /*******************************/
        
        /*
        case TBL::FORMS:
            include("$appSystemPath/var/forms/class.forms.php");
            $_data = new Forms();

            $index_field = "id";            

            $grid_page = "forms_list_forms.php";

            break;
        
        
        case TBL::FORMS_FIELDS:
            include("$appSystemPath/var/forms/class.forms_fields.php");
            $_data = new FormsFields();           

            $_sort = new Sort();
            $_sort->table_name = $_data->table_name;

            $index_field = "id";    

            $grid_page = "forms_list_forms_fields.php";

            break;
        
        
        case TBL::FORMS_FIELDS_OPTIONS:
            include("$appSystemPath/var/forms/class.forms_fields_options.php");
            $_data = new FormsFieldsOptions();
            
            $_sort = new Sort();
            $_sort->table_name = $_data->table_name;

            $index_field = "id";    
            
            $id_forms_fields = get_param('param',0);
            
            if ($id_forms_fields == 0)
            {
                if (isset($_SESSION['FORMS_FIELDS_ID']))
                {
                    $id_forms_fields = $_SESSION['FORMS_FIELDS_ID'];
                }
            }

            $grid_page = "forms_list_forms_fields_options.php";

            $extra_param = "id_forms_fields=$id_forms_fields&";

            break;
        
        
        case TBL::FORMS_SECTIONS:
            include("$appSystemPath/var/forms/class.forms_sections.php");
            $_data = new FormsSections();           

            $_sort = new Sort();
            $_sort->table_name = $_data->table_name;

            $index_field = "id";    

            $grid_page = "forms_list_forms_sections.php";

            break;
         
        */ 
    }

    
    if (!$is_ajax)
    {
        
            foreach($_REQUEST as $name => $value)
            {
                                  
                  if (strpos($name,"item_") !== false)
                  {
  
                        $items = explode('_', $name);
                        $id_item = $items[1];

                        $condition = "$index_field = $id_item"; 
                        
                        
                        //orden
                        switch ($table_id)
                        {
                            case TBL::PAGINA:
                            
                                $id_parent = $_data->field_value('id_parent', $condition);
                                $cond_sort = "id_parent = $id_parent";
                                $_sort->update_all($id_item, 'orden', 'id', $cond_sort);
                                
                                break;       
                            
                            case TBL::CATEGORIA:
                            
                                $id_tipo = $_data->field_value('id_tipo', $condition);
                                $id_parent = $_data->field_value('id_parent', $condition);
                                $cond_sort = "id_tipo = $id_tipo AND id_parent = $id_parent";
                                $_sort->update_all($id_item, 'orden', 'id', $cond_sort);
                                
                                break;  
                            
                            case TBL::CATALOGO:
                                
                                $id_seccion = $_data->field_value('id_seccion', $condition);
                                $id_categoria = $_data->field_value('id_categoria', $condition);
                                $id_parent = $_data->field_value('id_parent', $condition);
                                $cond_sort = "id_seccion = $id_seccion AND id_categoria = $id_categoria AND id_parent = $id_parent";
                                $_sort->update_all($id_item, 'orden', 'id', $cond_sort);
                                
                                break;  
                            
                            
                            
                            /*******************************/
                            /********* MOD::FORMS ***********/
                            /*******************************/
                            
                            /*
                            case TBL::FORMS_FIELDS:
                                
                                $id_forms = $_data->field_value('id_forms', $condition);        
                                $id_section = $_data->field_value('id_section', $condition);        

                                $cond_sort = "id_forms = $id_forms AND id_section = $id_section";
                                $_sort->update_all($id_item, 'ord', 'id', $cond_sort);
                                
                                break;  
                            
                            
                            case TBL::FORMS_FIELDS_OPTIONS:
                                
                                $id_forms_fields = $_data->field_value('id_forms_fields', $condition);        

                                $cond_sort = "id_forms_fields = $id_forms_fields";
                                $_sort->update_all($id_item, 'ord', 'id', $cond_sort);
                                
                                break;  
                            
                            
                            case TBL::FORMS_SECTIONS:
                                
                                $id_forms = $_data->field_value('id_forms', $condition);        

                                $cond_sort = "id_forms = $id_forms";  
                                $_sort->update_all($id_item, 'ord', 'id', $cond_sort);
                                
                                break;  
                            */
                        }
                                                                        
                                                                        
                        $_data->delete_record($condition);

                  }
            }
           
        
        
    }
    else
    {
        $arr_params = explode('&',$params);

        for ($n = 0; $n < count($arr_params); $n++)
        {
            $arr_resp = explode('=',$arr_params[$n]);

            $resp = explode('_',$arr_resp[0]);

            $id_item = $resp[1];

            $condition = "$index_field = $id_item";
            
            
            //******* orden *************
                        
            switch ($table_id)
            {
                case TBL::CONTENIDO:
                                                                
                    $id_pagina = $_data->field_value('id_pagina', $condition);
                    $cond_sort = "id_pagina = $id_pagina";
                    $_sort->update_all($id_item, 'orden', 'id', $cond_sort);
                                
                    break;
                
                case TBL::SLIDER_ITEM:
                                                                
                    $id_slider = $_data->field_value('id_slider', $condition);
                    $cond_sort = "id_slider = $id_slider";
                    $_sort->update_all($id_item, 'orden', 'id', $cond_sort);
                                
                    break;
                
                case TBL::CATALOGO_FOTO:
                                                                
                    $id_catalogo = $_data->field_value('id_catalogo', $condition);
                    $id_categoria = $_data->field_value('id_categoria', $condition);
                    $cond_sort = "id_catalogo = $id_catalogo AND id_categoria = $id_categoria";
                    $_sort->update_all($id_item, 'orden', 'id', $cond_sort);
                                
                    break;
                                
            }
                 
            
            $_data->delete_record($condition);

        }
    }
    

    header("Location: $appAdmUrl/$grid_page?".$extra_param."mode=".SYS::ACTION_DELETE);
    
    
?>