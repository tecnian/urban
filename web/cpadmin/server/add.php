<?php
    include("../../system/config/config.inc.php");
    include("$appAdmPath/include/include.inc.php");
    include("$appAdmPath/include/control.inc.php");
    include("$appSystemPath/lib/data.inc.2.2.php");
    include("$appSystemPath/lib/files.inc.1.11.php");
    

    $table_id = get_param('tbl');
    $type = get_param('type');
    $last_id = 0;
    $extra_param = '';
    $insert_mode = SYS::INSERT_AUTO;
    $status = 0;
    $is_ajax = false;

    $_lang = new Language($appLangInfo,$db_global);
    $opt_idioma = $_lang->load_array();

    switch ($table_id)
    {        
        case TBL::ADMIN:
            include("$appSystemPath/var/class.admin.php");
            include("$appSystemPath/lib/crypto.inc.3.1.php");
            $_data = new Admin();            
            $_crypto = New Crypto('');
            
            
            $grid_page = "list_admin.php";
            $form_page = "form_admin.php";
            
            break;
        
        
        case TBL::PAGINA:
            include("$appSystemPath/var/class.pagina.php");
            include("$appSystemPath/var/class.pagina_perfil.php");
            
            $_data = new Pagina();
            $_data_lang = new PaginaIdioma();
            $_multi = new MultiValue();
            $_pagina_perfil = new PaginaPerfil();
            
            $_sort = new Sort();
            $_sort->table_name = $_data->table_name;

            $id_parent = get_param('id_parent',0);
            
            $cond_sort = "id_parent = $id_parent";
            $last_position = $_sort->last_position('orden',true,$cond_sort);

            $grid_page = "list_pagina.php";
            $form_page = "form_pagina.php";
            
            break;
        
               
        case TBL::CONTENIDO:
            include("$appSystemPath/var/class.contenido.php");
            $_data = new Contenido();
            $_data_lang = new ContenidoIdioma();
            $_sort = new Sort();
            $_sort->table_name = $_data->table_name;

            $id_item = get_param('id_pagina',0);
                        
            $cond_sort = "id_pagina = ".$id_item;
            $last_position = $_sort->last_position('orden',true,$cond_sort);

            $grid_page = "form_pagina.php";
            $form_page = "form_pagina.php";

            $status = SYS::SHOW_CHILDREN;
            $extra_param = '#contenidos';

            break;
        
        
        case TBL::SLIDER:
            include("$appSystemPath/var/class.slider.php");
            $_data = new Slider();
            
            $grid_page = "list_slider.php";
            $form_page = "form_slider.php";

            break;
        
        
        case TBL::SLIDER_ITEM:
            include("$appSystemPath/var/class.slider_item.php");
            $_data = new SliderItem();
            $_data_lang = new SliderItemIdioma();
            $_sort = new Sort();
            $_sort->table_name = $_data->table_name;

            $id_item = get_param('id_slider',0);
                        
            $cond_sort = "id_slider = ".$id_item;
            $last_position = $_sort->last_position('orden',true,$cond_sort);

            $grid_page = "form_slider.php";
            $form_page = "form_slider.php";

            $status = SYS::SHOW_CHILDREN;
            $extra_param = '#fotos';

            break;

        
        case TBL::CATALOGO:
            include("$appSystemPath/var/class.catalogo.php");
            $_data = new Catalogo();
            $_data_lang = new CatalogoIdioma();       
                        
            $_sort = new Sort();
            $_sort->table_name = $_data->table_name;
            
            $id_seccion = get_param('id_seccion',0);
            $id_categoria = get_param('id_categoria',0);
            $id_parent = get_param('id_parent',0);
            
            $cond_sort = "id_seccion = ".$id_seccion." AND id_categoria = ".$id_categoria." AND id_parent = $id_parent";
            $last_position = $_sort->last_position('orden',true,$cond_sort);
            

            $grid_page = "list_catalogo.php";
            $form_page = "form_catalogo.php";
            
            $extra_param = 'type='.$type.'&';
            
            break;
        
        
        case TBL::CATALOGO_FOTO:
            include("$appSystemPath/var/class.catalogo_foto.php");            

            $_data = new CatalogoFoto();   
            $_data_lang = new CatalogoFotoIdioma();    

            $id_item = get_param('id_catalogo',0);
            $id_categoria = get_param('id_categoria',0);
            
            
            $_sort = new Sort();
            $_sort->table_name = $_data->table_name;

            $cond_sort = "id_catalogo = ".$id_item." AND id_categoria = ".$id_categoria;
            $last_position = $_sort->last_position('orden',true,$cond_sort);

            $grid_page = "list_catalogo.php";
            $form_page = "form_catalogo.php";
            
            
            $status = SYS::SHOW_CHILDREN;
            $extra_param = '&type='.$type.'#fotos';

            break;         
        
        
        case TBL::CONTACTO_WEB:
            include("$appSystemPath/var/class.contacto_web.php");
            $_data = new ContactoWeb();            
            
            $grid_page = "list_contacto_web.php";
            $form_page = "form_contacto_web.php";
            
            break;
        
        
        case TBL::PAIS_WEB:
            include("$appSystemPath/var/class.pais_web.php");
            include("$appSystemPath/var/class.pais_web_idioma.php");
            
            $_data = new PaisWeb();       
            $_multi = new MultiValue();
            $_pais_idioma = new PaisWebIdioma();
            
            $grid_page = "list_pais_web.php";
            $form_page = "form_pais_web.php";
            
            break;
        
        
        case TBL::PERFIL_WEB:
            include("$appSystemPath/var/class.perfil_web.php");
            $_data = new PerfilWeb();            
            
            $grid_page = "list_perfil_web.php";
            $form_page = "form_perfil_web.php";
            
            break;
        
        
        case TBL::IDIOMA:
            include_once("$appSystemPath/var/class.idioma.php");
            $_data = new Idioma();            
            
            $grid_page = "list_idioma.php";
            $form_page = "form_idioma.php";
            
            break;
        
        
        case TBL::CATEGORIA:
            include("$appSystemPath/var/class.categoria.php");
            $_data = new Categoria();       
            $_data_lang = new CategoriaIdioma(); 
            $_sort = new Sort();
            $_sort->table_name = $_data->table_name;
            
            
            $id_tipo = get_param('id_tipo',0);
            $id_parent = get_param('id_parent',0);
            
            $cond_sort = "id_tipo = ".$id_tipo." AND id_parent = $id_parent";
            $last_position = $_sort->last_position('orden',true,$cond_sort);
                        

            $grid_page = "list_categoria.php";
            $form_page = "form_categoria.php";
            
            $extra_param = 'type='.$type.'&';
                        
            break; 
        
        
        case TBL::SECCION:
                include("$appSystemPath/var/class.seccion.php");
                $_data = new Seccion();            

                $grid_page = "list_seccion.php";
                $form_page = "form_seccion.php";

                break;
            
            
        case TBL::USUARIO:
            include("$appSystemPath/var/class.usuario.php");
            include("$appSystemPath/lib/crypto.inc.3.1.php");
            $_crypto = New Crypto('');
            $_data = new Usuario();       
            

            $grid_page = "list_usuario.php";
            $form_page = "form_usuario.php";
            
            $extra_param = 'type='.$type.'&';
                        
            break; 
        
        
        
        
        /*******************************/
        /********* MOD::SHOP ***********/
        /*******************************/
        
        
        /* 
        case TBL::PRODUCTO:
            include("$appSystemPath/var/shop/class.producto.php");
            include("$appSystemPath/var/shop/class.producto_categoria.php");
            
            $_data = new Producto();
            $_data_lang = new ProductoIdioma();  
            $_prod_categ = new ProductoCategoria();              
            $_multi = new MultiValue();
                                    

            $grid_page = "shop_list_producto.php";
            $form_page = "shop_form_producto.php";                       
            
            break;
        
        
        case TBL::PRODUCTO_FOTO:
            include("$appSystemPath/var/shop/class.producto_foto.php");            

            $_data = new ProductoFoto();   
            $_data_lang = new ProductoFotoIdioma();    

            $id_item = get_param('id_producto',0);            
            
            
            $_sort = new Sort();
            $_sort->table_name = $_data->table_name;

            $cond_sort = "id_producto = ".$id_item;
            $last_position = $_sort->last_position('orden',true,$cond_sort);

            $grid_page = "shop_list_producto.php";
            $form_page = "shop_form_producto.php";
            
            
            $status = SYS::SHOW_CHILDREN;
            $extra_param = '&tab=3';       

            break;        
        
        
        case TBL::PRODUCTO_FICHERO:
            include("$appSystemPath/var/shop/class.producto_fichero.php");            

            $_data = new ProductoFichero();   
            $_data_lang = new ProductoFicheroIdioma();    

            $id_item = get_param('id_producto',0);            
                                    

            $grid_page = "shop_list_producto.php";
            $form_page = "shop_form_producto.php";
            
            
            $status = SYS::SHOW_CHILDREN;
            $extra_param = '&tab=4';       

            break;   
        
                
        case TBL::FACTURA:
            include("$appSystemPath/var/shop/class.factura.php");            
            $_data = new Factura();                        
            
            
            $grid_page = "shop_list_factura.php";
            $form_page = "shop_form_factura.php";
            
            break;
        
                
        case TBL::CONFIG_TIENDA:
            include("$appSystemPath/var/shop/class.config_tienda.php");            
            $_data = new ConfigTienda();                        
            
            
            $grid_page = "shop_list_config_tienda.php";
            $form_page = "shop_form_config_tienda.php";
            
            $status = SYS::SHOW_CHILDREN;               
            
            break;
        */
        
        
        
        
        /*******************************/
        /********* MOD::FORMS ***********/
        /*******************************/
        
        /*
        case TBL::FORMS:
            include("$appSystemPath/var/forms/class.forms.php");

            $_data = new Forms();
            $_data_lang = new FormsIdioma();

            $grid_page = "forms_list_forms.php";
            $form_page = "forms_form_forms.php";

            break;
        
        
        case TBL::FORMS_FIELDS:
            include("$appSystemPath/var/forms/class.forms_fields.php");

            $_data = new FormsFields();
            $_data_lang = new FormsFieldsIdioma();

            $id_forms = get_param('id_forms',0);            
            $id_section = get_param('id_section',0);            

            $_sort = new Sort();
            $_sort->table_name = $_data->table_name;

            $cond_sort = "id_forms = $id_forms AND id_section = $id_section";
            $last_position = $_sort->last_position('ord',true,$cond_sort);
            

            $grid_page = "forms_list_forms_fields.php";
            $form_page = "forms_form_forms_fields.php";
                        
            break;
        
        
        case TBL::FORMS_FIELDS_OPTIONS:
            include("$appSystemPath/var/forms/class.forms_fields_options.php");

            $_data = new FormsFieldsOptions();
            $_data_lang = new FormsFieldsOptionsIdioma();

            $id_forms_fields = get_param('id_forms_fields',0);
            
            $_sort = new Sort();
            $_sort->table_name = $_data->table_name;
            
            $cond_sort = "id_forms_fields = $id_forms_fields";
            $last_position = $_sort->last_position('ord',true,$cond_sort);

            $grid_page = "forms_list_forms_fields_options.php";
            $form_page = "forms_form_forms_fields_options.php";

            $extra_param = "id_forms_fields=$id_forms_fields&";

            break;
        
        
        case TBL::FORMS_SECTIONS:
            include("$appSystemPath/var/forms/class.forms_sections.php");

            $_data = new FormsSections();
            $_data_lang = new FormsSectionsIdioma();

            $id_forms = get_param('id_forms',0);            

            $_sort = new Sort();
            $_sort->table_name = $_data->table_name;

            $cond_sort = "id_forms = $id_forms";
            $last_position = $_sort->last_position('ord',true,$cond_sort);
            

            $grid_page = "forms_list_forms_sections.php";
            $form_page = "forms_form_forms_sections.php";

            break;
         
         */
        
        
    }
    

    $_data->request();
    
    
    if ($table_id == TBL::ADMIN || $table_id == TBL::USUARIO)
    {
        //encriptacion password
        
        if (!empty($_data->record['t_password']))
        {
                $pass_enc = $_crypto->encrypt($_data->record['t_password']);
        
                $_data->record['t_password'] = $pass_enc;
        }
            
    }
    
    
    
    $last_id = $_data->insert_record($insert_mode);

    if (isset($_data_lang))
    {        
        for ($n = 1; $n <= count($opt_idioma); $n++)
        {            
            if ($_data_lang->request($last_id, $n))
            {
                $_data_lang->insert_record(0);
            }
        }
    }

    
    //******  orden  *************
    switch ($table_id)
    {
        case TBL::PAGINA:
        case TBL::CONTENIDO:
        case TBL::SLIDER_ITEM:
        case TBL::CATEGORIA:
        case TBL::CATALOGO: 
        case TBL::CATALOGO_FOTO: 

            $_sort->update($last_id, $_data->record['n_orden'], $last_position, 'orden', 'id', $cond_sort);

            break;
        
        
        
        /*******************************/
        /********* MOD::FORMS ***********/
        /*******************************/
        
        /*
        case TBL::FORMS_FIELDS:
        case TBL::FORMS_FIELDS_OPTIONS:
        case TBL::FORMS_SECTIONS:

            $_sort->update($last_id, $_data->record['n_ord'], $last_position, 'ord', 'id', $cond_sort);

            break;    
         */            

    }
    
    
    //****** checkboxes *************
    switch ($table_id)
    {
        
        case TBL::PAGINA:

            $_multi->get_checkboxes($_pagina_perfil, 'n_id_perfil_web', 'n_id_pagina', $last_id);            

            break;
        
        case TBL::PAIS_WEB:

            $_multi->get_checkboxes($_pais_idioma, 'n_id_idioma', 'n_id_pais_web', $last_id);            

            break;
        
        
        /*******************************/
        /********* MOD::SHOP ***********/
        /*******************************/
        
        /*
         
        case TBL::PRODUCTO:

            $_multi->get_checkboxes($_prod_categ, 'n_id_categoria', 'n_id_producto', $last_id);                 

            break;
        
        */
    }

    
    //****** otras acciones *************
        switch ($table_id)
        {
            case TBL::IDIOMA:

                if ($_data->record['n_defecto'])
                {
                    //desmarcamos el defecto en el resto de idiomas
                    
                    $query = "UPDATE idioma SET defecto = false
                              WHERE id <> $last_id";

                    $_data->execute_query($query);
                }
                
                if ($_data->record['n_defecto_admin'])
                {
                    //desmarcamos el defecto admin en el resto de idiomas
                    
                    $query = "UPDATE idioma SET defecto_admin = false
                              WHERE id <> $last_id";

                    $_data->execute_query($query);
                }

                break;
                
            case TBL::CATALOGO_FOTO:

                if ($_data->record['n_principal'])
                {
                    //desmarcamos el campo principal para el resto de fotos
                    $query = "UPDATE catalogo_foto SET principal = false
                              WHERE id_catalogo = $id_item AND id <> $last_id";

                    $_data->execute_query($query);
                }

                break;
                
                
            case TBL::CATALOGO:

                //MOD::multi_item

                /*include("$appSystemPath/var/class.cliente_quirofano.php");    

                $_multi_item = new ClienteQuirofano();     


                $arr_multi_item = array();

                foreach($_REQUEST as $name => $value)
                {
                    if (strpos($name,"multi_item_idx_") !== false)
                    {
                        $items = explode('_', $name);
                        $id_item = $items[3];
                        $id_multi = $value;

                        $fecha = get_date('multi_item_fecha_'.$id_item.'_'.$id_multi);
                        $importe = get_number('multi_item_importe_'.$id_item.'_'.$id_multi,0);
                        $id_forma_pago = get_param('multi_item_id_forma_pago_'.$id_item.'_'.$id_multi,0);


                        //insertamos

                        $_multi_item->record["n_id_cliente"] = $last_id;
                        $_multi_item->record["t_fecha"] = $fecha;	
                        $_multi_item->record["n_importe"] = $importe;
                        $_multi_item->record["n_id_forma_pago"] = $id_forma_pago;                        

                        $new_id = $_multi_item->insert_record();     

                        array_push($arr_multi_item,$new_id);
                        
                    }
                }*/


                break;

                                           
        }

    
    
    if (!$is_ajax)
    {
        if ($_data->error == SYS::FILE_NO_ERROR)
        {
            if ($status == SYS::SHOW_NEXT_TAB)
            {
                header("Location: $appAdmUrl/$form_page?id=".$last_id."&mode=".SYS::ACTION_UPDATE."&status=".SYS::SHOW_NEXT_TAB.$extra_param);
            }
            elseif ($status == SYS::SHOW_CHILDREN)
            {
                header("Location: $appAdmUrl/$form_page?id=".$id_item."&mode=".SYS::ACTION_UPDATE."&status=".SYS::SHOW_NEXT_TAB.$extra_param);
            }
            else
            {
                header("Location: $appAdmUrl/$grid_page?".$extra_param."mode=".SYS::ACTION_ADD);
            }
        }
        else
        {
            header("Location: $appAdmUrl/$form_page?id=".$id_item.$extra_param."&mode=".SYS::ACTION_ADD."&status=".$_data->error);
        }
    }
    
?>