<?php
    include("$appAdmPath/include/control.inc.php");

    $mode = get_param('mode');
    $page = get_param('page');
    $type = get_param('type');
    $status = get_param('status',0);
    $export = get_param('export');

    $str_cond = '';
    $message = '';
    $extra_param = '';
    $grid_page = '';
    $form_page = '';    
    $query_sess_name = '';    

    $sess = New Sess();
    $type_sess_name = $appTypeSession;
    $type_session = $sess->get_value($type_sess_name);

    $data_in_array = false;

    switch ($appTableName)
    {        
        case TBL::ADMIN:
            include("$appSystemPath/var/class.admin.php");           

            $_data = new Admin();
            
            $sql = "SELECT id, id_perfil, nombre, usuario, email, activo 
                    FROM admin WHERE id_perfil > 0";
            

            $grid_page = 'list_admin.php';
            $form_page = 'form_admin.php';
            
            break;
        
        
        case TBL::PAGINA:
            include("$appSystemPath/var/class.pagina.php");           

            $_data = new Pagina();
            
            $sql = "SELECT id, nombre, activo, titulo, referencia
                    FROM pagina INNER JOIN pagina_idioma ON pagina.id = pagina_idioma.id_pagina
                    WHERE id_idioma = ".CONF::DEFAULT_LANGUAGE;
            

            $grid_page = 'list_pagina.php';
            $form_page = 'form_pagina.php';
            
            break;
        
        
        case TBL::CONTENIDO:
            include("$appSystemPath/var/class.contenido.php");          
            include("$appSystemPath/var/class.slider.php");          

            $_data = new Contenido();
            $_slider = new Slider();
            
            $id_pagina = get_param('id_pagina',0);
            
            $sql = "SELECT id, id_tipo, id_slider, orden, activo, titulo, texto, texto_html, enlace, contenido.imagen, nombre 
                    FROM contenido INNER JOIN contenido_idioma ON contenido.id = contenido_idioma.id_contenido
                    WHERE id_pagina = $id_pagina AND id_idioma = ".CONF::DEFAULT_LANGUAGE.
                    " ORDER BY orden";
                        
            break;
        
        
        case TBL::SLIDER:
            include("$appSystemPath/var/class.slider.php");           

            $_data = new Slider();
                        
            $sql = "SELECT id, nombre
                    FROM slider";
            
            
            $grid_page = 'list_slider.php';
            $form_page = 'form_slider.php';
            
                        
            break;
        
        
        case TBL::SLIDER_ITEM:
            include("$appSystemPath/var/class.slider_item.php");           

            $_data = new SliderItem();
            
            $id_slider = get_param('id_slider',0);
            
            $sql = "SELECT id, slider_item.imagen, orden, activo
                    FROM slider_item INNER JOIN slider_item_idioma ON slider_item.id = slider_item_idioma.id_slider_item
                    WHERE id_slider = $id_slider AND id_idioma = ".CONF::DEFAULT_LANGUAGE.
                    " ORDER BY orden";
                        
            break;
        
        
        case TBL::CATALOGO:
            include("$appSystemPath/var/class.catalogo.php");     
            include("$appSystemPath/var/class.seccion.php");     

            $_data = new Catalogo();
            $_seccion = new Seccion();
            
            $sql = "SELECT id, fecha, activo, titulo 
                    FROM catalogo INNER JOIN catalogo_idioma ON catalogo.id = catalogo_idioma.id_catalogo
                    WHERE id_seccion = $type AND id_idioma = ".CONF::DEFAULT_LANGUAGE;
            
            
            $cond_sec = "id = $type";
            $nom_seccion = $_seccion->field_value('nombre', $cond_sec);
            

            $grid_page = 'list_catalogo.php';
            $form_page = 'form_catalogo.php';
            
            $extra_param = "type=$type&";
            
            break;
        
        
        case TBL::CATALOGO_FOTO:
            include("$appSystemPath/var/class.catalogo_foto.php");

            $id_catalogo = get_param('id_catalogo',0);

            $_data = new CatalogoFoto();

            $sql = "SELECT id, imagen, principal FROM catalogo_foto
                    WHERE id_catalogo = $id_catalogo
                    ORDER BY orden";  

            break;
        
        
        case TBL::CONTACTO_WEB:
            include("$appSystemPath/var/class.contacto_web.php");           

            $_data = new ContactoWeb();
            
            $sql = "SELECT * 
                    FROM contacto_web";
            

            $grid_page = 'list_contacto_web.php';
            $form_page = 'form_contacto_web.php';
            
            break;
        
        
        case TBL::PAIS_WEB:
            include("$appSystemPath/var/class.pais_web.php");           

            $_data = new PaisWeb();
            
            $sql = "SELECT id, nombre, codigo, email, telefono, activo
                    FROM pais_web";
            

            $grid_page = 'list_pais_web.php';
            $form_page = 'form_pais_web.php';
            
            break;
        
        
        case TBL::PERFIL_WEB:
            include("$appSystemPath/var/class.perfil_web.php");           

            $_data = new PerfilWeb();
            
            $sql = "SELECT id, nombre, activo
                    FROM perfil_web";
            

            $grid_page = 'list_perfil_web.php';
            $form_page = 'form_perfil_web.php';
            
            break;
        
        
        case TBL::IDIOMA:
            include_once("$appSystemPath/var/class.idioma.php");           

            $_data = new Idioma();
            
            $sql = "SELECT id, nombre, codigo, activo, defecto, activo_admin, defecto_admin
                    FROM idioma";
            

            $grid_page = 'list_idioma.php';
            $form_page = 'form_idioma.php';
            
            break;
        
        
        case TBL::CATEGORIA:
            include("$appSystemPath/var/class.categoria.php");

            $_data = new Categoria();
            
            $sql = "SELECT id, nombre, orden, activo
                    FROM categoria INNER JOIN categoria_idioma ON categoria.id = categoria_idioma.id_categoria
                    WHERE id_tipo = $type AND id_idioma = ".CONF::DEFAULT_LANGUAGE;
                    
            
            $cond_list = "id_tipo = $type";
            
            $list = $_data->get_array($cond_list); 
            
            
            $grid_page = 'list_categoria.php';
            $form_page = 'form_categoria.php';
            
            $extra_param = "type=$type&";
                       
            break;        
        
        
        case TBL::SECCION:
            include("$appSystemPath/var/class.seccion.php");           

            $_data = new Seccion();
            
            $sql = "SELECT id, nombre 
                    FROM seccion";
            

            $grid_page = 'list_seccion.php';
            $form_page = 'form_seccion.php';
            
            break;
        
        
        case TBL::USUARIO:
            include("$appSystemPath/var/class.usuario.php");

            $_data = new Usuario();
            
            $sql = "SELECT id, nombre, apellidos, email, movil, activo
                    FROM usuario";
            if ($type > 0)
            {
                $sql .= " WHERE id_tipo = $type";
            }
            
                    
            $grid_page = 'list_usuario.php';
            $form_page = 'form_usuario.php';
            
            $extra_param = "type=$type&";
                       
            break;  
            
            
        
            
        /*******************************/
        /********* MOD::SHOP ***********/
        /*******************************/
            
        
        /*    
        case TBL::PRODUCTO:
            include("$appSystemPath/var/shop/class.producto.php");                 

            $_data = new Producto();
            
            $id_estado = get_param('id_estado',-2);
            
            if ($id_estado > -2)
            {
                $_SESSION['ADM_PROD_ESTADO'] = $id_estado;
            }
            else
            {
                if (isset($_SESSION['ADM_PROD_ESTADO']))
                {
                    $id_estado = $_SESSION['ADM_PROD_ESTADO'];
                }
                else
                {
                    $id_estado = -1;
                }
            }
                
                
            
            $sql = "SELECT id, referencia, nombre
                    FROM producto INNER JOIN producto_idioma ON producto.id = producto_idioma.id_producto
                    WHERE producto_idioma.id_idioma = ".CONF::DEFAULT_LANGUAGE;
            
            if ($id_estado > -1)
            {
                $sql .= " AND producto.activo = $id_estado";
            }
            
            
            $opt_estado = build_options($options_activo, $id_estado);
            
            
            $grid_page = 'shop_list_producto.php';
            $form_page = 'shop_form_producto.php';
                        
            
            break;
        
        
        case TBL::PRODUCTO_FOTO:
            include("$appSystemPath/var/shop/class.producto_foto.php");

            $id_producto = get_param('id_producto',0);

            $_data = new ProductoFoto();

            $sql = "SELECT id, imagen, principal FROM producto_foto
                    WHERE id_producto = $id_producto
                    ORDER BY orden";  

            break;    
        
        
        case TBL::PRODUCTO_FICHERO:
            include("$appSystemPath/var/shop/class.producto_fichero.php");

            $id_producto = get_param('id_producto',0);

            $_data = new ProductoFichero();

            $sql = "SELECT id, fichero, titulo 
                    FROM producto_fichero
                    INNER JOIN producto_fichero_idioma ON producto_fichero.id = producto_fichero_idioma.id_producto_fichero
                    WHERE id_producto = $id_producto AND id_idioma = ".CONF::DEFAULT_LANGUAGE."
                    ORDER BY titulo";  

            break;    
                    
        
        
        case TBL::PEDIDO:
            include("$appSystemPath/var/shop/class.pedido.php");

            $_data = new Pedido();
            
            
            //filtros
            
            $fecha_ini = get_param('fecha_ini');   
            $fecha_fin = get_param('fecha_fin');   
            
            $fecha_inicio = '';
            if (isset($fecha_ini))
            {
                if ($fecha_ini != '')
                {
                    $fecha_inicio = build_date_str($fecha_ini); 
                }
            }
            
            $fecha_final = '';
            if (isset($fecha_fin))
            {
                if ($fecha_fin != '')
                {
                    $fecha_final = build_date_str($fecha_fin);  
                }                
            }
            
                                    
            $sql = "SELECT id, nombre, apellidos, num_pedido, fecha, id_estado, total
                    FROM pedido
                    WHERE id_estado > ".OPT::PED_NONE;
            
            if (!empty($fecha_inicio))
            {
                $sql .= " AND fecha >= '$fecha_inicio'";
            }
            if (!empty($fecha_final))
            {
                $sql .= " AND fecha <= '$fecha_final'";
            }
            
            
            
            $grid_page = 'shop_list_pedido.php';
            $form_page = 'shop_form_pedido.php';            
                        
            break;
            
            
        case TBL::PEDIDO_PRODUCTO:
            include("$appSystemPath/var/shop/class.pedido_producto.php");            
            include("$appSystemPath/var/shop/class.pedido.php");               

            $id_pedido = get_param('id_pedido',0);

            $_data = new PedidoProducto();            
            $_pedido = new Pedido();                  

            
            $sql = "SELECT pedido_producto.id,pedido_producto.id_producto,nombre,referencia,cantidad,pedido_producto.precio
                      FROM pedido_producto
                      INNER JOIN producto ON pedido_producto.id_producto = producto.id    
                      INNER JOIN producto_idioma ON pedido_producto.id_producto = producto_idioma.id_producto              
                      WHERE id_idioma = ".CONF::DEFAULT_LANGUAGE." AND id_pedido = $id_pedido
                      ORDER BY pedido_producto.id";             

            $pedido_prod = $_data->get_query($sql);
            
            
            
            $cond = "id = $id_pedido";
            $pedido = $_pedido->get_record($cond);
            

            break;
        
        
        case TBL::PRESUPUESTO:
            include("$appSystemPath/var/shop/class.presupuesto.php");

            $_data = new Presupuesto();
            
            
            //filtros
            
            $fecha_ini = get_param('fecha_ini');   
            $fecha_fin = get_param('fecha_fin');   
            
            $fecha_inicio = '';
            if (isset($fecha_ini))
            {
                if ($fecha_ini != '')
                {
                    $fecha_inicio = build_date_str($fecha_ini); 
                }
            }
            
            $fecha_final = '';
            if (isset($fecha_fin))
            {
                if ($fecha_fin != '')
                {
                    $fecha_final = build_date_str($fecha_fin);  
                }                
            }
            
                                    
            $sql = "SELECT presupuesto.id, num_presup, fecha, id_estado, total, nombre, apellidos
                    FROM presupuesto WHERE presupuesto.id > 0";
            
            if (!empty($fecha_inicio))
            {
                $sql .= " AND fecha >= '$fecha_inicio'";
            }
            if (!empty($fecha_final))
            {
                $sql .= " AND fecha <= '$fecha_final'";
            }
            
            
            $grid_page = 'shop_list_presupuesto.php';
            $form_page = 'shop_form_presupuesto.php';            
                        
            break;
            
            
        case TBL::PRESUPUESTO_PRODUCTO:
            include("$appSystemPath/var/shop/class.presupuesto_producto.php");            
            include("$appSystemPath/var/shop/class.presupuesto.php");               

            $id_presupuesto = get_param('id_presupuesto',0);

            $_data = new PresupuestoProducto();            
            $_presupuesto = new Presupuesto();      
            
            
            $sql = "SELECT presupuesto_producto.id,presupuesto_producto.id_producto,nombre,referencia,cantidad,presupuesto_producto.precio
                    FROM presupuesto_producto
                    INNER JOIN producto ON presupuesto_producto.id_producto = producto.id    
                    INNER JOIN producto_idioma ON presupuesto_producto.id_producto = producto_idioma.id_producto              
                    WHERE id_idioma = ".CONF::DEFAULT_LANGUAGE." AND id_presupuesto = $id_presupuesto
                    ORDER BY presupuesto_producto.id";    

            $presup_prod = $_data->get_query($sql);           
    
            
            
            $cond = "id = $id_presupuesto";
            $presupuesto = $_presupuesto->get_record($cond);
            

            break;
            
            
        case TBL::FACTURA:
            include("$appSystemPath/var/shop/class.factura.php");           

            $_data = new Factura();
            
            
            //filtros
            
            $fecha_ini = get_param('fecha_ini');   
            $fecha_fin = get_param('fecha_fin');   
            
            $fecha_inicio = '';
            if (isset($fecha_ini))
            {
                if ($fecha_ini != '')
                {
                    $fecha_inicio = build_date_str($fecha_ini); 
                }
            }
            
            $fecha_final = '';
            if (isset($fecha_fin))
            {
                if ($fecha_fin != '')
                {
                    $fecha_final = build_date_str($fecha_fin);  
                }                
            }
            
                                    
            $sql = "SELECT factura.id, num_factura, fecha, importe, fichero, nombre, apellidos
                    FROM factura
                    INNER JOIN usuario ON factura.id_usuario = usuario.id
                    WHERE factura.id > 0";
            
            if (!empty($fecha_inicio))
            {
                $sql .= " AND fecha >= '$fecha_inicio'";
            }
            if (!empty($fecha_final))
            {
                $sql .= " AND fecha <= '$fecha_final'";
            }
            
            
            
            $grid_page = 'shop_list_factura.php';
            $form_page = 'shop_form_factura.php';
            
            break;
            
        
        case TBL::CONFIG_TIENDA:
            include("$appSystemPath/var/shop/class.config_tienda.php");
            
            $_data = new ConfigTienda();

            $sql = "SELECT * FROM config_tienda
                    WHERE codigo = '".OPT::SHOP_GASTO_ENVIO."'
                    ORDER BY id_destino,margen_ini,margen_fin";  

            break;   
        */
        
        
            
            
        
        /*******************************/
        /********* MOD::FORMS ***********/
        /*******************************/
            
        /*
        case TBL::FORMS:
            include("$appSystemPath/var/forms/class.forms.php");

            $_data = new Forms();
            
            
            if (!empty($type))
            {
                $_SESSION['FORMS_TYPE'] = $type;
            }
            else
            {
                if (isset($_SESSION['FORMS_TYPE']))
                {
                    $type = $_SESSION['FORMS_TYPE'];
                }
            }
            
            
            $sql = "SELECT id,title
                    FROM forms 
                    INNER JOIN forms_idioma ON forms.id = forms_idioma.id_forms
                    WHERE id_idioma = ".CONF::DEFAULT_LANGUAGE." AND id_type = $type
                    ORDER BY title";
            
            $grid_page = 'forms_list_forms.php';
            $form_page = 'forms_form_forms.php';

            break;
        
        
        case TBL::FORMS_FIELDS:
            include("$appSystemPath/var/forms/class.forms_fields.php");
            include("$appSystemPath/var/forms/class.forms.php");

            $_data = new FormsFields();
            $_forms = new FormsIdioma();
            
            $id_forms = get_param('id_forms',0);
            
            if ($id_forms > 0)
            {
                $_SESSION['FORMS_ID'] = $id_forms;
            }
            else
            {
                if (isset($_SESSION['FORMS_ID']))
                {
                    $id_forms = $_SESSION['FORMS_ID'];
                }
            }
            
            if (empty($type))
            {
                if (isset($_SESSION['FORMS_TYPE']))
                {
                    $type = $_SESSION['FORMS_TYPE'];
                }
            }
            
            $sql0 = "SELECT id,name
                     FROM forms_sections
                     INNER JOIN forms_sections_idioma ON forms_sections.id = forms_sections_idioma.id_forms_sections 
                     WHERE id_idioma = ".CONF::DEFAULT_LANGUAGE;
            
            $sql = "SELECT forms_fields.id,id_type,forms_fields_idioma.name,tbl_section.name AS section_name
                    FROM forms_fields
                    INNER JOIN forms_fields_idioma ON forms_fields.id = forms_fields_idioma.id_forms_fields
                    LEFT JOIN ($sql0) AS tbl_section ON tbl_section.id = forms_fields.id_section
                    WHERE forms_fields.id_forms = $id_forms AND forms_fields_idioma.id_idioma = ".CONF::DEFAULT_LANGUAGE."
                    ORDER BY tbl_section.name,forms_fields.ord"; 
                
            $cond = "id_forms = $id_forms AND id_idioma = ".CONF::DEFAULT_LANGUAGE;
            $form_name = $_forms->field_value('title', $cond);
            

            $grid_page = 'forms_list_forms_fields.php';
            $form_page = 'forms_form_forms_fields.php';
            
            break;
        
        
        case TBL::FORMS_FIELDS_OPTIONS:
            include("$appSystemPath/var/forms/class.forms_fields_options.php");
            include("$appSystemPath/var/forms/class.forms_fields.php");
            include("$appSystemPath/var/forms/class.forms.php");

            $_data = new FormsFieldsOptions();
            $_forms_field = new FormsFieldsIdioma();
            $_forms = new FormsIdioma();

            $id_forms_fields = get_param('id_forms_fields',0);
            
            $id_forms = 0;
            if (isset($_SESSION['FORMS_ID']))
            {
                $id_forms = $_SESSION['FORMS_ID'];
            }
            
            if (empty($type))
            {
                if (isset($_SESSION['FORMS_TYPE']))
                {
                    $type = $_SESSION['FORMS_TYPE'];
                }
            }

            $sql = "SELECT id,name 
                    FROM forms_fields_options
                    INNER JOIN forms_fields_options_idioma ON forms_fields_options.id = forms_fields_options_idioma.id_forms_fields_options
                    WHERE id_forms_fields = $id_forms_fields AND id_idioma = ".CONF::DEFAULT_LANGUAGE."
                    ORDER BY ord"; 
                  

            $cond = "id_forms_fields = $id_forms_fields AND id_idioma = ".CONF::DEFAULT_LANGUAGE;
            $forms_fields_name = $_forms_field->field_value('name', $cond);
            
            $forms_fields_name = str_replace('<p>','',$forms_fields_name);
            $forms_fields_name = str_replace('</p>','',$forms_fields_name);
            
            $cond = "id_forms = $id_forms AND id_idioma = ".CONF::DEFAULT_LANGUAGE;
            $form_name = $_forms->field_value('title', $cond);

            $grid_page = 'forms_list_forms_fields.php';
            $form_page = 'forms_form_forms_fields_options.php';

            $extra_param = "id_forms_fields=$id_forms_fields&";

            break;
            
            
        case TBL::FORMS_SECTIONS:
            include("$appSystemPath/var/forms/class.forms_sections.php");
            include("$appSystemPath/var/forms/class.forms.php");

            $_data = new FormsSections();
            $_forms = new FormsIdioma();
            
            $id_forms = get_param('id_forms',0);
            
            if ($id_forms > 0)
            {
                $_SESSION['FORMS_ID'] = $id_forms;
            }
            else
            {
                if (isset($_SESSION['FORMS_ID']))
                {
                    $id_forms = $_SESSION['FORMS_ID'];
                }
            }
            
            if (empty($type))
            {
                if (isset($_SESSION['FORMS_TYPE']))
                {
                    $type = $_SESSION['FORMS_TYPE'];
                }
            }
            
            $sql = "SELECT id,name 
                    FROM forms_sections
                    INNER JOIN forms_sections_idioma ON forms_sections.id = forms_sections_idioma.id_forms_sections
                    WHERE id_forms = $id_forms AND id_idioma = ".CONF::DEFAULT_LANGUAGE."
                    ORDER BY ord";
                
            $cond = "id_forms = $id_forms AND id_idioma = ".CONF::DEFAULT_LANGUAGE;
            $form_name = $_forms->field_value('title', $cond);
            

            $grid_page = 'forms_list_forms_sections.php';
            $form_page = 'forms_form_forms_sections.php';
            
            break;
                      
        */
    }

    //consulta realizada / busqueda
    if (!empty($query_sess_name))
    {
        if (($mode != SYS::ACTION_SEARCH) && (empty($type) || ($type_session == $type)))
        {
            $query_session = $sess->get_value($query_sess_name);
            if (isset($query_session))
            {
                $query = $query_session;
                $sess->set_value($query_sess_name,$query);
            }
            else
            {
                $query = $sql;
                $sess->create($query_sess_name,$query);
            }            
        }
        else
        {
            $sess->set_value($query_sess_name,$sql);
            $query = $sql;            

            $page = 1;
            $sess->set_value($page_sess_name,$page);

        }
        $sess->delete_all($array_query_sessions, $query_sess_name);        
    }
    else
    {
        $query = $sql;
    }

   

    //guardamos el tipo de categoria
    if (isset($type_session))
    {
        $sess->set_value($type_sess_name,$type);
    }
    else
    {
        $sess->create($type_sess_name,$type);
    }

    
    $row = $_data->get_query($query);  
       

    //definicion de la accion a realizar
    $add_page = $form_page.'?'.$extra_param.'mode='.SYS::ACTION_ADD;
    $update_page = $form_page.'?'.$extra_param.'mode='.SYS::ACTION_UPDATE;
    $delete_page = "server/delete.php?".$extra_param."tbl=$appTableName";   
    

    //mensajes
    if (!empty($mode))
    {
        $message = $info_message[$mode];
    }
    elseif ($status > 0)
    {
        $message = $info_message[$status];
    }
  
?>