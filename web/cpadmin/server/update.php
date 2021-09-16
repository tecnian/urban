<?php
    include("../../system/config/config.inc.php");
    include("$appAdmPath/include/include.inc.php");
    include("$appAdmPath/include/control.inc.php");
    include("$appSystemPath/lib/data.inc.2.2.php");
    include("$appSystemPath/lib/files.inc.1.11.php");
    

    $id = get_param('id');
    $table_id = get_param('tbl');
    $type = get_param('type');
    $tab = get_param('tab');
    $extra_param = '';
    $anchor = '';

    $_lang = new Language($appLangInfo,$db_global);
    $opt_idioma = $_lang->load_array();

    switch ($table_id)
    {        
        case TBL::ADMIN:
            include("$appSystemPath/var/class.admin.php");
            include("$appSystemPath/lib/crypto.inc.3.1.php");
            $_data = new Admin();     
            $_crypto = New Crypto('');

            $condition = "id = $id";        
            
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

            $condition = "id = $id";
            $condition_lang = "id_pagina = $id AND id_idioma = ";

            $ini_position = $_data->field_value('orden', $condition);

            $grid_page = "list_pagina.php";
            $form_page = "form_pagina.php";

            break;
        
                
        case TBL::CONTENIDO:
            include("$appSystemPath/var/class.contenido.php");
            $_data = new Contenido();
            $_data_lang = new ContenidoIdioma();
            $_sort = new Sort();
            $_sort->table_name = $_data->table_name;

            $id_pagina = get_param('id_pagina',0);

            $condition = "id = $id";
            $condition_lang = "id_contenido = $id AND id_idioma = ";

            $ini_position = $_data->field_value('orden', $condition);

            $grid_page = "form_pagina.php";
            $form_page = "form_pagina.php";

            $extra_param = 'id='.$id_pagina.'&';            
            $anchor = '#contenidos';

            break;
        
        
        case TBL::SLIDER:
            include("$appSystemPath/var/class.slider.php");
            $_data = new Slider();
            
            $condition = "id = $id";

            $grid_page = "list_slider.php";
            $form_page = "form_slider.php";
            
            break;
        
        
        case TBL::SLIDER_ITEM:
            include("$appSystemPath/var/class.slider_item.php");
            $_data = new SliderItem();
            $_data_lang = new SliderItemIdioma();
            $_sort = new Sort();
            $_sort->table_name = $_data->table_name;

            $id_slider = get_param('id_slider',0);

            $condition = "id = $id";
            $condition_lang = "id_slider_item = $id AND id_idioma = ";

            $ini_position = $_data->field_value('orden', $condition);

            $grid_page = "form_slider.php";
            $form_page = "form_slider.php";

            $extra_param = 'id='.$id_slider.'&';            
            $anchor = '#fotos';

            break;
        
        
        case TBL::CATALOGO:
            include("$appSystemPath/var/class.catalogo.php");
            $_data = new Catalogo();
            $_data_lang = new CatalogoIdioma();            
            $_sort = new Sort();
            $_sort->table_name = $_data->table_name;
            
            
            $condition = "id = $id";        
            $condition_lang = "id_catalogo = $id AND id_idioma = ";
            
            $ini_position = $_data->field_value('orden', $condition);

            $grid_page = "list_catalogo.php";
            $form_page = "form_catalogo.php";
            
            $extra_param = 'type='.$type.'&';

            break;
        
        
        case TBL::CATALOGO_FOTO:
            include("$appSystemPath/var/class.catalogo_foto.php");
            
            $_data = new CatalogoFoto();  
            $_data_lang = new CatalogoFotoIdioma(); 
            
            $_sort = new Sort();
            $_sort->table_name = $_data->table_name;
            

            $id_catalogo = get_param('id_catalogo',0);

            $condition = "id = $id";
            $condition_lang = "id_catalogo_foto = $id AND id_idioma = ";
            
            $ini_position = $_data->field_value('orden', $condition);
            
            $grid_page = "form_catalogo.php";
            $form_page = "form_catalogo.php";
            
            $extra_param = 'id='.$id_catalogo.'&type='.$type.'&';
            $anchor = '#fotos';

            break;
        
        
        case TBL::CONTACTO_WEB:
            include("$appSystemPath/var/class.contacto_web.php");
            $_data = new ContactoWeb();            

            $condition = "id = $id";            

            $grid_page = "list_contacto_web.php";
            $form_page = "form_contacto_web.php";

            break;
        
        
        case TBL::PAIS_WEB:
            include("$appSystemPath/var/class.pais_web.php");
            include("$appSystemPath/var/class.pais_web_idioma.php");
            
            $_data = new PaisWeb();   
            $_pais_idioma = new PaisWebIdioma();
            $_multi = new MultiValue();

            $condition = "id = $id";            

            $grid_page = "list_pais_web.php";
            $form_page = "form_pais_web.php";

            break;
        
        
        case TBL::PERFIL_WEB:
            include("$appSystemPath/var/class.perfil_web.php");
            $_data = new PerfilWeb();            

            $condition = "id = $id";            

            $grid_page = "list_perfil_web.php";
            $form_page = "form_perfil_web.php";

            break;
        
        
        case TBL::IDIOMA:
            include_once("$appSystemPath/var/class.idioma.php");
            $_data = new Idioma();            

            $condition = "id = $id";            

            $grid_page = "list_idioma.php";
            $form_page = "form_idioma.php";

            break;
        
        
        case TBL::CATEGORIA:
            include("$appSystemPath/var/class.categoria.php");            
            $_data = new Categoria();
            $_data_lang = new CategoriaIdioma();
            $_sort = new Sort();
            $_sort->table_name = $_data->table_name;
            
            
            $condition = "id = $id";        
            $condition_lang = "id_categoria = $id AND id_idioma = ";
            
            $ini_position = $_data->field_value('orden', $condition);
                        

            $grid_page = "list_categoria.php";
            $form_page = "form_categoria.php";
            
            $extra_param = 'type='.$type.'&';
                        
            break;
        
        
        case TBL::SECCION:
            include("$appSystemPath/var/class.seccion.php");
            $_data = new Seccion();
            
            $condition = "id = $id";

            $grid_page = "list_seccion.php";
            $form_page = "form_seccion.php";
            
            break;
        
        
        case TBL::USUARIO:
            include("$appSystemPath/var/class.usuario.php");            
            $_data = new Usuario();            
            
            $condition = "id = $id";
            
            
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
            
            $condition = "id = $id";        
            $condition_lang = "id_producto = $id AND id_idioma = ";
                        

            $grid_page = "shop_list_producto.php";
            $form_page = "shop_form_producto.php";
                        

            break;
        
        
        case TBL::PRODUCTO_FOTO:
            include("$appSystemPath/var/shop/class.producto_foto.php");
            
            $_data = new ProductoFoto();  
            $_data_lang = new ProductoFotoIdioma(); 
                        

            $id_producto = get_param('id_producto',0);

            $condition = "id = $id";
            $condition_lang = "id_producto_foto = $id AND id_idioma = ";                        
            
            $grid_page = "shop_form_producto.php";
            $form_page = "shop_form_producto.php";
            
            $extra_param = 'tab=3&id='.$id_producto.'&';            

            break;
        
        
        case TBL::PRODUCTO_FICHERO:
            include("$appSystemPath/var/shop/class.producto_fichero.php");
            
            $_data = new ProductoFichero();  
            $_data_lang = new ProductoFicheroIdioma(); 
                        

            $id_producto = get_param('id_producto',0);

            $condition = "id = $id";
            $condition_lang = "id_producto_fichero = $id AND id_idioma = ";                        
            
            $grid_page = "shop_form_producto.php";
            $form_page = "shop_form_producto.php";
            
            $extra_param = 'tab=4&id='.$id_producto.'&';            

            break;
        
        
        case TBL::PEDIDO:
            include("$appSystemPath/var/shop/class.pedido.php");            
            $_data = new Pedido();              

            $condition = "id = $id";            

            $grid_page = "shop_list_pedido.php";
            $form_page = "shop_form_pedido.php";

            break;
        
        
        case TBL::PRESUPUESTO:
            include("$appSystemPath/var/shop/class.presupuesto.php");            
            $_data = new Presupuesto();              

            $condition = "id = $id";            

            $grid_page = "shop_list_presupuesto.php";
            $form_page = "shop_form_presupuesto.php";

            break;
        
        
        case TBL::FACTURA:
            include("$appSystemPath/var/shop/class.factura.php");            
            $_data = new Factura();                 

            $condition = "id = $id";        
            
            $grid_page = "shop_list_factura.php";
            $form_page = "shop_form_factura.php";

            break;
        
        
        case TBL::CONFIG_TIENDA:
            include("$appSystemPath/var/shop/class.config_tienda.php");            
            $_data = new ConfigTienda();                 

            $condition = "id = $id";        
            
            $grid_page = "shop_form_config_tienda.php";
            $form_page = "shop_form_config_tienda.php";

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

            $condition = "id = $id";
            $condition_lang = "id_forms = $id AND id_idioma = ";

            $grid_page = "forms_list_forms.php";
            $form_page = "forms_form_forms.php";

            break;
        
        
        case TBL::FORMS_FIELDS:
            include("$appSystemPath/var/forms/class.forms_fields.php");

            $_data = new FormsFields();
            $_data_lang = new FormsFieldsIdioma();       

            $_sort = new Sort();
            $_sort->table_name = $_data->table_name;

            $id_forms = get_param('id_forms',0);            

            $condition = "id = $id";
            $condition_lang = "id_forms_fields = $id AND id_idioma = ";

            $ini_position = $_data->field_value('ord', $condition);
            

            $grid_page = "forms_list_forms_fields.php";
            $form_page = "forms_form_forms_fields.php";

            break;
        
        
        case TBL::FORMS_FIELDS_OPTIONS:
            include("$appSystemPath/var/forms/class.forms_fields_options.php");

            $_data = new FormsFieldsOptions();
            $_data_lang = new FormsFieldsOptionsIdioma();       
            
            $_sort = new Sort();
            $_sort->table_name = $_data->table_name;

            $condition = "id = $id";
            $condition_lang = "id_forms_fields_options = $id AND id_idioma = ";
            
            $id_forms_fields = get_param('id_forms_fields',0);
            
            $ini_position = $_data->field_value('ord', $condition);

            $grid_page = "forms_list_forms_fields_options.php";
            $form_page = "forms_form_forms_fields_options.php";

            $extra_param = "id_forms_fields=$id_forms_fields&";

            break;
        
        
        case TBL::FORMS_SECTIONS:
            include("$appSystemPath/var/forms/class.forms_sections.php");

            $_data = new FormsSections();
            $_data_lang = new FormsSectionsIdioma();       

            $_sort = new Sort();
            $_sort->table_name = $_data->table_name;

            $id_forms = get_param('id_forms',0);            

            $condition = "id = $id";
            $condition_lang = "id_forms_sections = $id AND id_idioma = ";

            $ini_position = $_data->field_value('ord', $condition);
            

            $grid_page = "forms_list_forms_sections.php";
            $form_page = "forms_form_forms_sections.php";

            break;
         
        */
        

    }

    $_data->request();
    
    
    
    if ($table_id == TBL::ADMIN)
    {
        //encriptacion password
        
        $psw = trim($_data->record['t_password']);
        
        if (!empty($psw))
        {
                $pass_enc = $_crypto->encrypt($_data->record['t_password']);
                
                $_data->record['t_password'] = $pass_enc;
        }
        else
        {
            $_data->record['t_password'] = NULL;
        }
            
    }
    
    
    
    $_data->update_record($condition);

    if (isset($_data_lang))
    {
        for ($n = 1; $n <= count($opt_idioma); $n++)
        {
            $condition = $condition_lang.$n;
            if ($_data_lang->record_exists($condition))
            {
                //Si existe el registro para el idioma lo actualizamos
                $_data_lang->request($id, $n);
                $_data_lang->update_record($condition);
            }
            else
            {
                //Si no existe el registro para el idioma lo a�adimos
                if ($_data_lang->request($id, $n))
                {
                    $_data_lang->insert_record(0);
                }
            }
        }
    }

    
    //******  orden  *************
    switch ($table_id)
    {
        case TBL::PAGINA:

            $cond_sort = "id_parent = ".$_data->record['n_id_parent'];
            $_sort->update($id, $_data->record['n_orden'], $ini_position, 'orden', 'id', $cond_sort);

            break;
        
        case TBL::CONTENIDO:

            $cond_sort = "id_pagina = ".$_data->record['n_id_pagina'];
            $_sort->update($id, $_data->record['n_orden'], $ini_position, 'orden', 'id', $cond_sort);

            break;
        
        case TBL::SLIDER_ITEM:

            $cond_sort = "id_slider = ".$_data->record['n_id_slider'];
            $_sort->update($id, $_data->record['n_orden'], $ini_position, 'orden', 'id', $cond_sort);

            break;
        
        case TBL::CATEGORIA:

            $cond_sort = "id_tipo = ".$_data->record['n_id_tipo']." AND id_parent = ".$_data->record['n_id_parent'];
            $_sort->update($id, $_data->record['n_orden'], $ini_position, 'orden', 'id', $cond_sort);

            break;
        
        case TBL::CATALOGO:

            $cond_sort = "id_seccion = ".$_data->record['n_id_seccion']." AND id_categoria = ".$_data->record['n_id_categoria']." AND id_parent = ".$_data->record['n_id_parent'];
            $_sort->update($id, $_data->record['n_orden'], $ini_position, 'orden', 'id', $cond_sort);

            break;
        
        case TBL::CATALOGO_FOTO:        
            
            $cond_sort = "id_catalogo = ".$_data->record['n_id_catalogo']." AND id_categoria = ".$_data->record['n_id_categoria'];
            $_sort->update($id, $_data->record['n_orden'], $ini_position, 'orden', 'id', $cond_sort);

            break;
        
        
        
        /*******************************/
        /********* MOD::FORMS ***********/
        /*******************************/
        
        
        /*
        case TBL::FORMS_FIELDS:

            $cond_sort = "id_forms = ".$_data->record['n_id_forms']." AND id_section = ".$_data->record['n_id_section'];
            $_sort->update($id, $_data->record['n_ord'], $ini_position, 'ord', 'id', $cond_sort);

            break;
        
        case TBL::FORMS_FIELDS_OPTIONS:

            $cond_sort = "id_forms_fields = ".$_data->record['n_id_forms_fields'];
            $_sort->update($id, $_data->record['n_ord'], $ini_position, 'ord', 'id', $cond_sort);

            break;
        
        case TBL::FORMS_SECTIONS:

            $cond_sort = "id_forms = ".$_data->record['n_id_forms'];
            $_sort->update($id, $_data->record['n_ord'], $ini_position, 'ord', 'id', $cond_sort);

            break;

        */
    }
    
    
    //****** checkboxes *************
    switch ($table_id)
    {
        case TBL::PAGINA:

            $_multi->get_checkboxes($_pagina_perfil, 'n_id_perfil_web', 'n_id_pagina', $id);            

            break;
        
        case TBL::PAIS_WEB:

            $_multi->get_checkboxes($_pais_idioma, 'n_id_idioma', 'n_id_pais_web', $id);            

            break;
        
        
        /*******************************/
        /********* MOD::SHOP ***********/
        /*******************************/
        
        /*
        
        case TBL::PRODUCTO:

            $_multi->get_checkboxes($_prod_categ, 'n_id_categoria', 'n_id_producto', $id);                           

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
                              WHERE id <> $id";

                    $_data->execute_query($query);
                }
                
                if ($_data->record['n_defecto_admin'])
                {
                    //desmarcamos el defecto admin en el resto de idiomas
                    
                    $query = "UPDATE idioma SET defecto_admin = false
                              WHERE id <> $id";

                    $_data->execute_query($query);
                }

                break;
                
            case TBL::CATALOGO_FOTO:

                if ($_data->record['n_principal'])
                {
                    //desmarcamos el campo principal para la resta de fotos
                    $query = "UPDATE catalogo_foto SET principal = false
                              WHERE id_catalogo = $id_catalogo AND id <> $id";

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


                        if ($id_multi == 0)
                        {
                            //insertamos

                            $_multi_item->record["n_id_cliente"] = $id;
                            $_multi_item->record["t_fecha"] = $fecha;	
                            $_multi_item->record["n_importe"] = $importe;
                            $_multi_item->record["n_id_forma_pago"] = $id_forma_pago;                        

                            $new_id = $_multi_item->insert_record();     

                            array_push($arr_multi_item,$new_id);
                        }
                        else
                        {
                            $sql = "UPDATE cliente_quirofano SET
                                    fecha = '$fecha',
                                    importe = $importe,
                                    id_forma_pago = $id_forma_pago
                                    WHERE id = $id_multi";

                            $_multi_item->execute_query($sql);  


                            array_push($arr_multi_item,$id_multi);
                        }
                    }
                }


                //borramos elementos eliminados

                $sql2 = "SELECT id
                         FROM cliente_quirofano
                         WHERE id_cliente = $id";

                $multi_aux = $_multi_item->get_query($sql2);

                for ($i = 0; $i < count($multi_aux); $i++)
                {
                    if (!in_array($multi_aux[$i]['id'], $arr_multi_item))
                    {
                        $cond_del = "id = ".$multi_aux[$i]['id'];

                        $_multi_item->delete_record($cond_del);
                    }
                }*/

                break;


                                                            
            
        }
    
    

    if ($_data->error == SYS::FILE_NO_ERROR)
    {
            header("Location: $appAdmUrl/".$grid_page."?".$extra_param."mode=".SYS::ACTION_UPDATE.$anchor);
    }
    else
    {
            header("Location: $appAdmUrl/".$form_page."?".$extra_param."id=".$id."&mode=".SYS::ACTION_UPDATE."&status=".$_data->error);
    }
    
    
?>