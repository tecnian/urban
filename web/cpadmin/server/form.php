<?php
    include("$appAdmPath/include/control.inc.php");    
    
    $id = get_param('id',0);
    $mode = get_param('mode');
    $status = get_param('status',0);
    $type = get_param('type');
    $tab = get_param('tab');

    $row = array();    
    $message = '';
    $subtitle = '';
    $extra_param = '';
    $grid_page = '';
    $add_sort = false;

    if (empty($mode) || $mode == SYS::ACTION_DELETE)
    {
        $mode = SYS::ACTION_UPDATE;
    }
    if ($id == 0)
    {
        $mode = SYS::ACTION_ADD;
    }
    
    
    
    $html_div_link = '';

    $_lang = new Language($appLangInfo,$db_global);
    $opt_idioma = $_lang->load_array();
    
    switch ($appTableName)
    {        
        case TBL::ADMIN:
            include("$appSystemPath/var/class.admin.php");
            include("$appSystemPath/lib/crypto.inc.3.1.php");
            
            $_data = new Admin();     
            $_crypto = New Crypto('');
            
            $condition = "id = $id";
            $row = $_data->get_record($condition);
            
            $password = '';
            if ($id > 0)
            {
                $password = $_crypto->decrypt($row['t_password']);      
                $password = rtrim($password,"\0\4");     
            }
            
            $opt_perfil = build_options($options_profile, $row['n_id_perfil']);
            
            
            //checkbox
            $activo = '';
            
            if ($id == 0)
            {
                $row['n_activo'] = 1;
            }
            if (isset($row['n_activo']))
            {
                $activo = set_checked($row['n_activo'],1);
            }
            
            
            $url_imagen = '';
            if (isset($row['t_imagen']))
            {
                if (!empty($row['t_imagen']))
                {
                    $url_imagen = $appFilesUrlBack.'/'.$row['t_imagen'];
                }
            }
            
            
            $grid_page = "list_admin.php";
            
            break;
            
            
        case TBL::PAGINA:
            include("$appSystemPath/var/class.pagina.php");
            include("$appSystemPath/var/class.pagina_perfil.php");
            include("$appSystemPath/var/class.perfil_web.php");
            
            $_data = new Pagina();
            $_data_lang = new PaginaIdioma();
            $_pagina_perfil = new PaginaPerfil();
            $_perfil_web = new PerfilWeb();   
            
            
            $_sort = new Sort();
            $_sort->table_name = $_data->table_name;
            
            
            $condition = "id = $id";
            $row = $_data->get_record($condition);
            
            
            
            //ficheros php
            
            foreach (glob("$appContentPath/*.*") as $fichero) 
            {
                $fichero = str_replace($appContentPath.'/','',$fichero);

                $arr_fichero[$fichero] = $fichero;
            }
            
            for ($x = 0; $x < count($appMods); $x++)
            {
                $mod = $appMods[$x];
                foreach (glob("$appContentPath/$mod/*.*") as $fichero) 
                {
                    $fichero = str_replace($appContentPath.'/','',$fichero);
                    
                    $str_fichero = str_replace('/',' / ',$fichero);

                    $arr_fichero[$fichero] = $str_fichero;
                }
            }
            
            ksort($arr_fichero);
            
            $opt_fichero = build_options($arr_fichero,$row['t_php_file']);
                
            
            
            
            //datos idiomas
            for ($k = 1; $k <= count($opt_idioma); $k++)
            {
                $condition = "id_pagina = $id AND id_idioma = $k";
                $row_lang[$k] = $_data_lang->get_record($condition);
                
                
                $opt_fichero_lang[$k] = build_options($arr_fichero,$row_lang[$k]['t_php_file']);
            }
            
            
            
            $opt_parent = build_options($_data->get_list(),$row['n_id_parent']);
            
            $opt_formato = build_options($options_page_format,$row['n_id_formato']);
            
            
            //checkboxs
            $activo = '';
            $mostrar_menu = '';
            
            if ($id == 0)
            {
                $row['n_activo'] = 1;
                $row['n_mostrar_menu'] = 1;
            }
            
            if (isset($row['n_activo']))
            {
                $activo = set_checked($row['n_activo'],1);
            }
            
            if (isset($row['n_mostrar_menu']))
            {
                $mostrar_menu = set_checked($row['n_mostrar_menu'],1);
            }
            
            if (isset($row['n_privada']))
            {
                $privada = set_checked($row['n_privada'],1);
            }
            
            
            //orden
            if ($id == 0) 
            {
                $add_sort = true;
                $row['n_id_parent'] = 0;
            }
            
            $cond_sort = "id_parent = ".$row['n_id_parent'];
            $last_sort = $_sort->last_position('orden',$add_sort,$cond_sort);

            if ($id == 0)
            {
                $current_sort = $last_sort;
            }
            else
            {
                $current_sort = $row['n_orden'];
            }
            $opt_orden = $_sort->build_list($current_sort, $last_sort);
            
            
            
            
            //checkboxes perfiles web

            $sql = "SELECT id,nombre FROM perfil_web ORDER BY nombre";
            $perfil = $_perfil_web->get_query($sql);
            
            $chk_perfil = array();
            
            for ($n = 0; $n < count($perfil); $n++)
            {
                $chk_perfil[$n]['checked'] = false;

                $cond = "id_pagina = $id AND id_perfil_web = ".$perfil[$n]['id'];  
                $chk_perfil[$n]['checked'] = $_pagina_perfil->record_exists($cond);
            }
            

            $grid_page = "list_pagina.php";            
            

            break;
            
            
        case TBL::CONTENIDO:
            include("$appSystemPath/var/class.contenido.php");
            
            $_data = new Contenido();
            $_data_lang = new ContenidoIdioma();
            
            $_sort = new Sort();
            $_sort->table_name = $_data->table_name;
            
            
            $id_pagina = get_param('id_pagina',0);

            $condition = "id = $id";
            $row = $_data->get_record($condition);
            
            
                        
            //datos idiomas
            for ($k = 1; $k <= count($opt_idioma); $k++)
            {
                $condition = "id_contenido = $id AND id_idioma = $k";
                $row_lang[$k] = $_data_lang->get_record($condition);
                
                
                $opt_target[$k] = build_options($options_target,$row_lang[$k]['n_id_target']);
                
                
                $url_imagen_lang[$k] = '';
                if (isset($row_lang[$k]['t_imagen']))
                {
                    if (!empty($row_lang[$k]['t_imagen']))
                    {
                        $url_imagen_lang[$k] = $appFilesUrlImg.'/'.$row_lang[$k]['t_imagen'];
                    }
                }
                
                $url_fichero_lang[$k] = '';
                if (isset($row_lang[$k]['t_fichero']))
                {
                    if (!empty($row_lang[$k]['t_fichero']))
                    {
                        $url_fichero_lang[$k] = $appFilesUrlImg.'/'.$row_lang[$k]['t_fichero'];
                    }
                }
                                
            }
                        
            
            $opt_tipo = build_options($options_tipo_contenido,$row['n_id_tipo']);
            
            $opt_slider = load_select('slider','id','nombre',$row['n_id_slider'],'','nombre');
            
            
            
            $url_imagen = '';
            if (isset($row['t_imagen']))
            {
                if (!empty($row['t_imagen']))
                {
                    $url_imagen = $appFilesUrlImg.'/'.$row['t_imagen'];
                }
            }
            
            $url_fichero = '';
            if (isset($row['t_fichero']))
            {
                if (!empty($row['t_fichero']))
                {
                    $url_fichero = $appFilesUrlImg.'/'.$row['t_fichero'];
                }
            }

            
            //checkboxes
            $activo = '';            
            
            if ($id == 0)
            {
                $row['n_activo'] = 1;
            }
            if (isset($row['n_activo']))
            {
                $activo = set_checked($row['n_activo'],1);
            }
            
            
            $destacado = '';
            
            if (isset($row['n_destacado']))
            {
                $destacado = set_checked($row['n_destacado'],1);
            }
            
            
            //orden
            if ($id == 0) 
            {
                $add_sort = true;
                $row['n_id_pagina'] = $id_pagina;
            }
            
            if (!isset($row['n_id_pagina'])) $row['n_id_pagina'] = $id_pagina;
            
            $cond_sort = "id_pagina = ".$row['n_id_pagina']; 
            $last_sort = $_sort->last_position('orden',$add_sort,$cond_sort);

            if ($id == 0)
            {
                $current_sort = $last_sort;
            }
            else
            {
                $current_sort = $row['n_orden'];
            }
            $opt_orden = $_sort->build_list($current_sort, $last_sort);
           

            $extra_param = "id_pagina=$id_pagina&";

            break;
            
            
        case TBL::SLIDER:
            include("$appSystemPath/var/class.slider.php");
            
            $_data = new Slider();

            
            $condition = "id = $id";
            $row = $_data->get_record($condition);
            
            
            $grid_page = "list_slider.php";            
            
            break;
        
        
        case TBL::SLIDER_ITEM:
            include("$appSystemPath/var/class.slider_item.php");
            
            $_data = new SliderItem();
            $_data_lang = new SliderItemIdioma();
            
            $_sort = new Sort();
            $_sort->table_name = $_data->table_name;
            
            
            $id_slider = get_param('id_slider',0);

            $condition = "id = $id";
            $row = $_data->get_record($condition);
            
            
            //datos idiomas
            for ($k = 1; $k <= count($opt_idioma); $k++)
            {
                $condition = "id_slider_item = $id AND id_idioma = $k";
                $row_lang[$k] = $_data_lang->get_record($condition);
                
                
                $opt_target[$k] = build_options($options_target,$row_lang[$k]['n_id_target']);
                
                
                $url_imagen_lang[$k] = '';
                if (isset($row_lang[$k]['t_imagen']))
                {
                    if (!empty($row_lang[$k]['t_imagen']))
                    {
                        $url_imagen_lang[$k] = $appFilesUrlImg.'/'.$row_lang[$k]['t_imagen'];
                    }
                }
            }
            
            
            
            $url_imagen = '';
            if (isset($row['t_imagen']))
            {
                if (!empty($row['t_imagen']))
                {
                    $url_imagen = $appFilesUrlImg.'/'.$row['t_imagen'];
                }
            }

            
            //checkbox
            $activo = '';
            
            if ($id == 0)
            {
                $row['n_activo'] = 1;
            }
            if (isset($row['n_activo']))
            {
                $activo = set_checked($row['n_activo'],1);
            }
            
            
            //orden
            if ($id == 0) 
            {
                $add_sort = true;
                $row['n_id_slider'] = $id_slider;
            }
            if (!isset($row['n_id_slider'])) $row['n_id_slider'] = $id_slider;
            
            $cond_sort = "id_slider = ".$row['n_id_slider']; 
            $last_sort = $_sort->last_position('orden',$add_sort,$cond_sort);

            if ($id == 0)
            {
                $current_sort = $last_sort;
            }
            else
            {
                $current_sort = $row['n_orden'];
            }
            $opt_orden = $_sort->build_list($current_sort, $last_sort);
           

            $extra_param = "id_slider=$id_slider&";

            break;
            
            
            
        case TBL::CATEGORIA:
            include("$appSystemPath/var/class.categoria.php");
            
            $_data = new Categoria();
            $_data_lang = new CategoriaIdioma();
            $_sort = new Sort();
            $_sort->table_name = $_data->table_name;
            
            
            $condition = "id = $id";
            $row = $_data->get_record($condition);
            
            
            //datos idiomas
            for ($k = 1; $k <= count($opt_idioma); $k++)
            {
                $condition = "id_categoria = $id AND id_idioma = $k";
                $row_lang[$k] = $_data_lang->get_record($condition);
            }
            
            
            //checkbox
            $activo = '';
            
            if ($id == 0)
            {
                $row['n_activo'] = 1;
            }
            if (isset($row['n_activo']))
            {
                $activo = set_checked($row['n_activo'],1);
            }
            
            $cond_list = "id_tipo = $type";
            $opt_parent = build_options($_data->get_list($cond_list),$row['n_id_parent']);
            
            
            $url_imagen = '';
            if (isset($row['t_imagen']))
            {
                if (!empty($row['t_imagen']))
                {
                    $url_imagen = $appFilesUrlImg.'/'.$row['t_imagen'];
                }
            }
            
            
            //orden
            if ($id == 0) 
            {
                $add_sort = true;
                $row['n_id_tipo'] = $type;
                $row['n_id_parent'] = 0;
            }
            
            $cond_sort = "id_tipo = ".$row['n_id_tipo']." AND id_parent = ".$row['n_id_parent'];
            $last_sort = $_sort->last_position('orden',$add_sort,$cond_sort);

            if ($id == 0)
            {
                $current_sort = $last_sort;
            }
            else
            {
                $current_sort = $row['n_orden'];
            }
            $opt_orden = $_sort->build_list($current_sort, $last_sort);
            

            $grid_page = "list_categoria.php?type=$type";
            $extra_param = 'type='.$type.'&';
            

            break;
            
        
        case TBL::CATALOGO:
            include("$appSystemPath/var/class.catalogo.php");
            include("$appSystemPath/var/class.seccion.php");
            
            $_data = new Catalogo();
            $_data_lang = new CatalogoIdioma();
            $_seccion = new Seccion();
            $_sort = new Sort();
            $_sort->table_name = $_data->table_name;

            
            $condition = "id = $id";
            $row = $_data->get_record($condition);

            //datos idiomas
            for ($k = 1; $k <= count($opt_idioma); $k++)
            {
                $condition = "id_catalogo = $id AND id_idioma = $k";
                $row_lang[$k] = $_data_lang->get_record($condition);
                
                
                $url_imagen_lang[$k] = '';
                if (isset($row_lang[$k]['t_imagen']))
                {
                    if (!empty($row_lang[$k]['t_imagen']))
                    {
                        $url_imagen_lang[$k] = $appFilesUrlImg.'/'.$row_lang[$k]['t_imagen'];
                    }
                }
                
                $url_fichero_lang[$k] = '';
                if (isset($row_lang[$k]['t_fichero']))
                {
                    if (!empty($row_lang[$k]['t_fichero']))
                    {
                        $url_fichero_lang[$k] = $appFilesUrlImg.'/'.$row_lang[$k]['t_fichero'];
                    }
                }                
            }

            $url_imagen = '';
            if (isset($row['t_imagen']))
            {
                if (!empty($row['t_imagen']))
                {
                    $url_imagen = $appFilesUrlImg.'/'.$row['t_imagen'];
                }
            }
            
            $url_fichero = '';
            if (isset($row['t_fichero']))
            {
                if (!empty($row['t_fichero']))
                {
                    $url_fichero = $appFilesUrlImg.'/'.$row['t_fichero'];
                }
            }
                                    
            
            $opt_parent = build_options($_data->get_list(),$row['n_id_parent']);
            
            
            $opt_categoria = '';
            
            
            //activar este código para cargar un categoria concreta
            
            /*$sql0 = "SELECT id, nombre FROM categoria
                     INNER JOIN categoria_idioma ON categoria.id = categoria_idioma.id_categoria
                     WHERE id_idioma = ".CONF::DEFAULT_LANGUAGE." AND id_tipo = ".CAT::CAT1;
            
            $opt_categoria = load_select($sql0,'id','nombre',$row['n_id_categoria'],'','nombre',true);*/
            
            
            
            
            //checkboxes
            $activo = '';
            
            if ($id == 0)
            {
                $row['n_activo'] = 1;
            }
            if (isset($row['n_activo']))
            {
                $activo = set_checked($row['n_activo'],1);
            }
            
            $destacado = '';
                        
            if (isset($row['n_destacado']))
            {
                $destacado = set_checked($row['n_destacado'],1);
            }
                        
                        
            //data
            $fecha = '';
            if ($mode != SYS::ACTION_ADD)
            {
                if ($row['t_fecha'] != '0000-00-00')
                {
                    $fecha = date('d/m/Y',strtotime($row['t_fecha']));
                }
            }
            elseif ($mode == SYS::ACTION_ADD)
            {
                $fecha = date('d/m/Y');
            }
            
            
            //orden
            if ($id == 0) 
            {
                $add_sort = true;
                $row['n_id_seccion'] = $type;
                $row['n_id_categoria'] = 0;
                $row['n_id_parent'] = 0;
            }
            
            $cond_sort = "id_seccion = ".$row['n_id_seccion']." AND id_categoria = ".$row['n_id_categoria']." AND id_parent = ".$row['n_id_parent'];
            $last_sort = $_sort->last_position('orden',$add_sort,$cond_sort);

            if ($id == 0)
            {
                $current_sort = $last_sort;
            }
            else
            {
                $current_sort = $row['n_orden'];
            }
            $opt_orden = $_sort->build_list($current_sort, $last_sort);
            
            
            
            $cond_sec = "id = $type";
            $nom_seccion = $_seccion->field_value('nombre', $cond_sec);
            
            
            
            //MOD::multi_item
            
            /*$query2 = "SELECT *
                       FROM cliente_quirofano
                       WHERE id_cliente = $id
                       ORDER BY fecha DESC, id DESC";

            $multi_item = $_quirofano->get_query($query2);*/
    
            
            
            $grid_page = "list_catalogo.php?type=$type";
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
            $row = $_data->get_record($condition);
            
            
            //datos idiomas
            for ($k = 1; $k <= count($opt_idioma); $k++)
            {
                $condition = "id_catalogo_foto = $id AND id_idioma = $k";
                $row_lang[$k] = $_data_lang->get_record($condition);
                
                $opt_target[$k] = build_options($options_target,$row_lang[$k]['n_id_target']);
                
                $url_fichero_lang[$k] = '';
                if (isset($row_lang[$k]['t_fichero']))
                {
                    if (!empty($row_lang[$k]['t_fichero']))
                    {
                        $url_fichero_lang[$k] = $appFilesUrlImg.'/'.$row_lang[$k]['t_fichero'];
                    }
                }
            }
            

            $url_imagen = '';
            if (isset($row['t_imagen']))
            {
                if (!empty($row['t_imagen']))
                {
                    $url_imagen = $appFilesUrlImg.'/'.$row['t_imagen'];
                }
            }

            $principal = '';
            if (isset($row['n_principal']))
            {
                $principal = set_checked($row['n_principal'],1);
            }
            
            
            $opt_categoria = '';
            
            
            //orden
            if ($id == 0) 
            {
                $add_sort = true;
                $row['n_id_catalogo'] = 0;
                $row['n_id_categoria'] = 0;
            }
            if (!isset($row['n_id_catalogo'])) $row['n_id_catalogo'] = $id_catalogo;
            if (!isset($row['n_id_categoria'])) $row['n_id_categoria'] = 0;
            
            $cond_sort = "id_catalogo = ".$row['n_id_catalogo']." AND id_categoria = ".$row['n_id_categoria']; 
            $last_sort = $_sort->last_position('orden',$add_sort,$cond_sort);

            if ($id == 0)
            {
                $current_sort = $last_sort;
            }
            else
            {
                $current_sort = $row['n_orden'];
            }
            $opt_orden = $_sort->build_list($current_sort, $last_sort);
           

            $extra_param = "id_catalogo=$id_catalogo&";

            break;
                       
            
            
        case TBL::IDIOMA:
            include_once("$appSystemPath/var/class.idioma.php");            
            
            $_data = new Idioma();                 
            
            $condition = "id = $id";
            $row = $_data->get_record($condition);
            
            
            
            //checkbox
            $activo = '';
            
            if ($id == 0)
            {
                $row['n_activo'] = 1;
            }
            if (isset($row['n_activo']))
            {
                $activo = set_checked($row['n_activo'],1);
            }
            
            $defecto = '';            
            if (isset($row['n_defecto']))
            {
                $defecto = set_checked($row['n_defecto'],1);
            }
            
            $activo_admin = '';            
            if (isset($row['n_activo_admin']))
            {
                $activo_admin = set_checked($row['n_activo_admin'],1);
            }
            
            $defecto_admin = '';            
            if (isset($row['n_defecto_admin']))
            {
                $defecto_admin = set_checked($row['n_defecto_admin'],1);
            }
            
            
            $grid_page = "list_idioma.php";
            
            break;
            
            
        case TBL::PAIS_WEB:
            include("$appSystemPath/var/class.pais_web.php"); 
            include("$appSystemPath/var/class.pais_web_idioma.php");
            include_once("$appSystemPath/var/class.idioma.php");
            
            $_data = new PaisWeb();    
            $_pais_idioma = new PaisWebIdioma();
            $_idioma = new Idioma();    
            
            $condition = "id = $id";
            $row = $_data->get_record($condition);
            
            
            
            //checkbox
            $activo = '';
            
            if ($id == 0)
            {
                $row['n_activo'] = 1;
            }
            if (isset($row['n_activo']))
            {
                $activo = set_checked($row['n_activo'],1);
            }
            
            
            //checkboxes idiomas

            $sql = "SELECT id,nombre FROM idioma ORDER BY nombre";
            $idioma = $_idioma->get_query($sql);
            
            $chk_idioma = array();
            
            for ($n = 0; $n < count($idioma); $n++)
            {
                $chk_idioma[$n]['checked'] = false;

                $cond = "id_pais_web = $id AND id_idioma = ".$idioma[$n]['id'];
                $chk_idioma[$n]['checked'] = $_pais_idioma->record_exists($cond);
            }
            
            
            $grid_page = "list_pais_web.php";
            
            break;
            
            
        case TBL::PERFIL_WEB:
            include("$appSystemPath/var/class.perfil_web.php");            
            
            $_data = new PerfilWeb();                 
            
            $condition = "id = $id";
            $row = $_data->get_record($condition);
            
            
            $url_imagen = '';
            if (isset($row['t_imagen']))
            {
                if (!empty($row['t_imagen']))
                {
                    $url_imagen = $appFilesUrlImg.'/'.$row['t_imagen'];
                }
            }
            
            
            //checkbox
            $activo = '';
            
            if ($id == 0)
            {
                $row['n_activo'] = 1;
            }
            if (isset($row['n_activo']))
            {
                $activo = set_checked($row['n_activo'],1);
            }
            
            
            $grid_page = "list_perfil_web.php";
            
            break;
            
           
        case TBL::CONTACTO_WEB:
            include("$appSystemPath/var/class.contacto_web.php");            
            
            $_data = new ContactoWeb();                 
            
            $condition = "id = $id";
            $row = $_data->get_record($condition);
            
            
            
            //checkbox
            $gestionado = '';
                        
            if (isset($row['n_gestionado']))
            {
                $gestionado = set_checked($row['n_gestionado'],1);
            }
            
            
            $grid_page = "list_contacto_web.php";
            
            break;      
            
            
        case TBL::SECCION:
            include("$appSystemPath/var/class.seccion.php");            
            
            $_data = new Seccion();                 
            
            $condition = "id = $id";
            $row = $_data->get_record($condition);
            
            
            $grid_page = "list_seccion.php";
            
            break;      
        
        
        case TBL::USUARIO:
            include("$appSystemPath/var/class.usuario.php");
            
            $_data = new Usuario();
            
            
            $condition = "id = $id";
            $row = $_data->get_record($condition);
            
            
            
            //checkbox
            $activo = '';
            
            if ($id == 0)
            {
                $row['n_activo'] = 1;
            }
            if (isset($row['n_activo']))
            {
                $activo = set_checked($row['n_activo'],1);
            }
            
            $newsletter = '';
            if (isset($row['n_newsletter']))
            {
                $newsletter = set_checked($row['n_newsletter'],1);
            }
            
            
            $url_foto = '';
            if (isset($row['t_foto']))
            {
                if (!empty($row['t_foto']))
                {
                    $url_foto = $appFilesUrlImg.'/'.$row['t_foto'];
                }
            }
            
            //selects
            
            $opt_tipo = '';
            $opt_documento = '';
            $opt_poblacion = '';
            $opt_provincia = '';
            $opt_pais = '';
            $opt_tratamiento = '';
            
            $opt_tipo = build_options($options_tipo_usuario,$row['n_id_tipo']);
            
            
            //fechas
            $fecha_nac = '';
            $fecha_alta = '';
            if ($mode != SYS::ACTION_ADD)
            {
                if ($row['t_fecha_nac'] != '0000-00-00')
                {
                    $fecha_nac = date('d/m/Y',strtotime($row['t_fecha_nac']));
                }
                if ($row['t_fecha_alta'] != '0000-00-00')
                {
                    $fecha_alta = date('d/m/Y',strtotime($row['t_fecha_alta']));
                }
            }
            
            
                        

            $grid_page = "list_usuario.php?type=$type";
            $extra_param = 'type='.$type.'&';
            

            break;
            
            
            
        /*******************************/
        /********* MOD::SHOP ***********/
        /*******************************/
            
        
        /*    
        case TBL::PRODUCTO:
            include("$appSystemPath/var/shop/class.producto.php");   
            include("$appSystemPath/var/class.categoria.php");   
            include("$appSystemPath/var/shop/class.producto_categoria.php");   
          
            
            $_data = new Producto();
            $_data_lang = new ProductoIdioma();
            $_categoria = new Categoria();
            $_categ_lang = new CategoriaIdioma();
            $_prod_categ = new ProductoCategoria();                       
            
            
            $condition = "id = $id";
            $row = $_data->get_record($condition);
                                    

            //datos idiomas
            for ($k = 1; $k <= count($opt_idioma); $k++)
            {
                $condition = "id_producto = $id AND id_idioma = $k";
                $row_lang[$k] = $_data_lang->get_record($condition);
                
                $row_lang[$k]['t_nombre'] = str_replace('"',"´",$row_lang[$k]['t_nombre']);
                $row_lang[$k]['t_seo_title'] = str_replace('"',"´",$row_lang[$k]['t_seo_title']);
                                          
            }                        
            
            //selects
            
            $opt_marca = '';
            
            //$sql0 = "SELECT id, titulo 
            //         FROM catalogo INNER JOIN catalogo_idioma ON catalogo.id = catalogo_idioma.id_catalogo
            //         WHERE id_seccion = ".SEC::MARCA." AND id_idioma = ".CONF::DEFAULT_LANGUAGE;  
                
            //$opt_marca = load_select($sql0,'id','titulo',$row['n_id_marca'],'','titulo',true);
            
           
                        
            //checkboxes
            $activo = '';
            
            if ($id == 0)
            {
                $row['n_activo'] = 1;
            }
            if (isset($row['n_activo']))
            {
                $activo = set_checked($row['n_activo'],1);
            }
            
            $destacado = '';
                        
            if (isset($row['n_destacado']))
            {
                $destacado = set_checked($row['n_destacado'],1);
            }
                        
            
            //checkboxes categorias

            
            $chk_categoria = array();
            
            $cond_categ = "id_tipo = ".CAT::FAMILIA;
            
            $chk_categoria = $_categoria->get_list($cond_categ);
                                                                                                                                                
                        
            
            $grid_page = "shop_list_producto.php";                    
            
            break;
            
            
        case TBL::PRODUCTO_FOTO:
            include("$appSystemPath/var/shop/class.producto_foto.php");
            
            $_data = new ProductoFoto();
            $_data_lang = new ProductoFotoIdioma();
            
            $_sort = new Sort();
            $_sort->table_name = $_data->table_name;
            
            
            $id_producto = get_param('id_producto',0);                        
            

            $condition = "id = $id";
            $row = $_data->get_record($condition);
            
            
            //datos idiomas
            for ($k = 1; $k <= count($opt_idioma); $k++)
            {
                $condition = "id_producto_foto = $id AND id_idioma = $k";
                $row_lang[$k] = $_data_lang->get_record($condition);                                
            }
            

            $url_imagen = '';
            if (isset($row['t_imagen']))
            {
                if (!empty($row['t_imagen']))
                {
                    $url_imagen = $appFilesUrlImg.'/'.$row['t_imagen'];
                }
            }

            $principal = '';
            if (isset($row['n_principal']))
            {
                $principal = set_checked($row['n_principal'],1);
            }
            
            
            $opt_tipo = '';
            
            //$sql0 = "SELECT id, nombre 
            //         FROM categoria INNER JOIN categoria_idioma ON categoria.id = categoria_idioma.id_categoria
            //         WHERE id_tipo = ".CAT::COLOR." AND id_idioma = ".CONF::DEFAULT_LANGUAGE." AND id_proveedor = $id_proveedor";   
                
            //$opt_tipo = load_select($sql0,'id','nombre',$row['n_id_tipo'],'','nombre',true);
            
                        
            
            //orden
            if ($id == 0) $add_sort = true;
            if (!isset($row['n_id_producto'])) $row['n_id_producto'] = $id_producto;  
            
            if ($row['n_id_producto'] == '')
            {
                $row['n_id_producto'] = $id_producto;  
            }
            
            $cond_sort = "id_producto = ".$row['n_id_producto'];
            $last_sort = $_sort->last_position('orden',$add_sort,$cond_sort);

            if ($id == 0)
            {
                $current_sort = $last_sort;
            }
            else
            {
                $current_sort = $row['n_orden'];
            }
            $opt_orden = $_sort->build_list($current_sort, $last_sort);
           

            $extra_param = "id_producto=$id_producto&";

            break;
            
            
        case TBL::PRODUCTO_FICHERO:
            include("$appSystemPath/var/shop/class.producto_fichero.php");
            
            $_data = new ProductoFichero();
            $_data_lang = new ProductoFicheroIdioma();
            
            
            $id_producto = get_param('id_producto',0);            
            

            $condition = "id = $id";
            $row = $_data->get_record($condition);
            
            
            //datos idiomas
            for ($k = 1; $k <= count($opt_idioma); $k++)
            {
                $condition = "id_producto_fichero = $id AND id_idioma = $k";
                $row_lang[$k] = $_data_lang->get_record($condition);                                
            }
            

            $url_fichero = '';
            if (isset($row['t_fichero']))
            {
                if (!empty($row['t_fichero']))
                {
                    $url_fichero = $appFilesUrlPdf.'/'.$row['t_fichero'];
                }
            }

            $activo = '';
            
            if ($id == 0)
            {
                $row['n_activo'] = 1;
            }
            if (isset($row['n_activo']))
            {
                $activo = set_checked($row['n_activo'],1);
            }
                                    

            $extra_param = "id_producto=$id_producto&";

            break;                       

            
        case TBL::PEDIDO:
            include("$appSystemPath/var/shop/class.pedido.php");              
            
            $_data = new Pedido();      
            
            $condition = "id = $id";
            $row = $_data->get_record($condition);
            

            $opt_estado = build_options($options_estado_pedido['es'],$row['n_id_estado']);
                        
            
            $opt_poblacion = '';
            $opt_fac_poblacion = '';
            
            $opt_provincia = load_select('provincia','id','nombre',$row['n_id_provincia'],'','nombre');
            $opt_fac_provincia = load_select('provincia','id','nombre',$row['n_fac_id_provincia'],'','nombre');
            
            //$opt_pais = load_select('pais','id','nombre_es',$row['n_id_pais'],'','nombre');
            //$opt_fac_pais = load_select('pais','id','nombre_es',$row['n_fac_id_pais'],'','nombre');

            
            $fecha = '';            
            if ($row['t_fecha'] != '0000-00-00')
            {
                $fecha = date('d/m/Y H:i',strtotime($row['t_fecha']));
            }                                       
            
            
            $grid_page = "shop_list_pedido.php";
            
            break;
            
            
        case TBL::PRESUPUESTO:
            include("$appSystemPath/var/shop/class.presupuesto.php");     
            include("$appSystemPath/var/class.usuario.php");     
            
            $_data = new Presupuesto();    
            $_usuario = new Usuario();    
            
            $condition = "id = $id";
            $row = $_data->get_record($condition);
            

            $opt_estado = build_options($options_estado_presupuesto['es'],$row['n_id_estado']);                                    

            
            $fecha = '';            
            if ($row['t_fecha'] != '0000-00-00')
            {
                $fecha = date('d/m/Y H:i',strtotime($row['t_fecha']));
            }
            
            
            $opt_tipo = build_options($options_tipo_usuario,$row['n_id_tipo']);
            
            $opt_poblacion = '';
            $opt_provincia = load_select('provincia','id','nombre',$row['n_id_provincia'],'','nombre');
            //$opt_pais = load_select('pais','id','nombre_es',$row['n_id_pais'],'','nombre');
            
            
            //nombre usuario registrado
            
            $nom_usuario = '-';
            
            if ($row['n_id_usuario'] > 0)
            {
                $cond = "id = ".$row['n_id_usuario'];
                
                $nom_usuario = $_usuario->field_value('nombre', $cond);
                $nom_usuario .= ' '.$_usuario->field_value('apellidos', $cond);
            }
                                    
            
            $grid_page = "shop_list_presupuesto.php";
            
            break;
                       
            
        case TBL::FACTURA:
            include("$appSystemPath/var/shop/class.factura.php");            
            
            $_data = new Factura();     
            
            
            $condition = "id = $id";
            $row = $_data->get_record($condition);
            
            
            $sql0 = "SELECT id, CONCAT(nombre, ' ', apellidos) AS name 
                     FROM usuario";  
                
            $opt_usuario = load_select($sql0,'id','name',$row['n_id_usuario'],'','name',true);
            
            
            $fecha = '';  
            if ($id > 0)
            {
                if ($row['t_fecha'] != '0000-00-00')
                {
                    $fecha = date('d/m/Y',strtotime($row['t_fecha']));
                }
            }
                        
            
            $url_fichero = '';
            if (isset($row['t_fichero']))
            {
                if (!empty($row['t_fichero']))
                {
                    $url_fichero = $appFilesUrlPdf.'/'.$row['t_fichero'];
                }
            }
            
            
            $grid_page = "shop_list_factura.php";
            
            break; 
            
           
        case TBL::CONFIG_TIENDA:
            include("$appSystemPath/var/shop/class.config_tienda.php");            
            
            $_data = new ConfigTienda();     
            
            $condition = "id = $id";
            $row = $_data->get_record($condition);
            
            
            $opt_destino = '';
                                    
            
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
            $row = $_data->get_record($condition);
            
            if ($id == 0)
            {
                if (isset($_SESSION['FORMS_TYPE']))
                {
                    $row['n_id_type'] = $_SESSION['FORMS_TYPE'];
                }
            }
            
            if (empty($type))
            {
                if (isset($_SESSION['FORMS_TYPE']))
                {
                    $type = $_SESSION['FORMS_TYPE'];
                }
            }
            
            
            //datos idiomas
            for ($k = 1; $k <= count($opt_idioma); $k++)
            {
                $condition = "id_forms = $id AND id_idioma = $k";
                $row_lang[$k] = $_data_lang->get_record($condition);
            }


            $grid_page = "forms_list_forms.php";

            break;
        
        
        case TBL::FORMS_FIELDS:
            include("$appSystemPath/var/forms/class.forms_fields.php");
            include("$appSystemPath/var/forms/class.forms.php");

            $_data = new FormsFields();
            $_data_lang = new FormsFieldsIdioma();
            $_forms = new FormsIdioma();

            $_sort = new Sort();
            $_sort->table_name = $_data->table_name;

            $condition = "id = $id";
            $row = $_data->get_record($condition);
            
            
            //datos idiomas
            for ($k = 1; $k <= count($opt_idioma); $k++)
            {
                $condition = "id_forms_fields = $id AND id_idioma = $k";
                $row_lang[$k] = $_data_lang->get_record($condition);
            }
            

            $id_forms = 0;
            $id_section = 0;
            if ($row['n_id_forms'] == '')
            {
                $row['n_id_forms'] = 0;
                if (isset($_SESSION['FORMS_ID']))
                {
                    $row['n_id_forms'] = $_SESSION['FORMS_ID'];
                }
            }
            if ($row['n_id_section'] == '')
            {
                $row['n_id_section'] = 0;
            }
            
            if (empty($type))
            {
                if (isset($_SESSION['FORMS_TYPE']))
                {
                    $type = $_SESSION['FORMS_TYPE'];
                }
            }
            
            $id_forms = $row['n_id_forms'];    
            $id_section = $row['n_id_section'];    
                
            
            $cond = "id_forms = $id_forms AND id_idioma = ".CONF::DEFAULT_LANGUAGE;
            $form_name = $_forms->field_value('title', $cond);

            //order
            if ($id == 0) $add_sort = true;

            $cond_sort = "id_forms = $id_forms AND id_section = $id_section";
            $last_sort = $_sort->last_position('ord',$add_sort,$cond_sort);

            if ($id == 0)
            {
                $current_sort = $last_sort;
            }
            else
            {
                $current_sort = $row['n_ord'];
            }
            $opt_order = $_sort->build_list($current_sort, $last_sort);


            $opt_type = build_options($options_forms_field_type,$row['n_id_type']);            
            $opt_width = build_options($options_forms_field_width,$row['n_id_width']);
            
            $sql0 = "SELECT id, name
                     FROM forms_sections INNER JOIN forms_sections_idioma ON forms_sections.id = forms_sections_idioma.id_forms_sections
                     WHERE id_idioma = ".CONF::DEFAULT_LANGUAGE." AND id_forms = $id_forms";   
                
            $opt_section = load_select($sql0,'id','name',$row['n_id_section'],'','name',true);
            
            
            $required = '';            
            if (isset($row['n_required']))
            {
                $required = set_checked($row['n_required'],1);
            }
            
            $hide = '';            
            if (isset($row['n_hide']))
            {
                $hide = set_checked($row['n_hide'],1);
            }


            $grid_page = "forms_list_forms_fields.php";

            break;
            
            
        case TBL::FORMS_FIELDS_OPTIONS:
            include("$appSystemPath/var/forms/class.forms_fields_options.php");
            include("$appSystemPath/var/forms/class.forms_fields.php");
            include("$appSystemPath/var/forms/class.forms.php");

            $_data = new FormsFieldsOptions();
            $_data_lang = new FormsFieldsOptionsIdioma();
            $_forms_field = new FormsFieldsIdioma();
            $_forms = new FormsIdioma();
            
            $_sort = new Sort();
            $_sort->table_name = $_data->table_name;

            $condition = "id = $id";
            $row = $_data->get_record($condition);
            
            
            //datos idiomas
            for ($k = 1; $k <= count($opt_idioma); $k++)
            {
                $condition = "id_forms_fields_options = $id AND id_idioma = $k";
                $row_lang[$k] = $_data_lang->get_record($condition);
            }
            

            $id_forms_fields = get_param('id_forms_fields',0);
            
            $_SESSION['FORMS_FIELDS_ID'] = $id_forms_fields;
            
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
            

            $cond = "id_forms_fields = $id_forms_fields AND id_idioma = ".CONF::DEFAULT_LANGUAGE;
            $forms_fields_name = $_forms_field->field_value('name', $cond);
            
            $forms_fields_name = str_replace('<p>','',$forms_fields_name);
            $forms_fields_name = str_replace('</p>','',$forms_fields_name);
            
            $cond = "id_forms = $id_forms AND id_idioma = ".CONF::DEFAULT_LANGUAGE;
            $form_name = $_forms->field_value('title', $cond);
          
         
            $specify = '';            
            if (isset($row['n_specify']))
            {
                $specify = set_checked($row['n_specify'],1);
            }
       

            
            //order
            if ($id == 0) $add_sort = true;

            $cond_sort = "id_forms_fields = $id_forms_fields";
            $last_sort = $_sort->last_position('ord',$add_sort,$cond_sort);

            if ($id == 0)
            {
                $current_sort = $last_sort;
            }
            else
            {
                $current_sort = $row['n_ord'];
            }
            $opt_order = $_sort->build_list($current_sort, $last_sort);
            

            $grid_page = "forms_list_forms_fields_options.php?id_forms_fields=$id_forms_fields";
            
            $extra_param = "id_forms_fields=$id_forms_fields&";

            break;
            
            
        case TBL::FORMS_SECTIONS:
            include("$appSystemPath/var/forms/class.forms_sections.php");
            include("$appSystemPath/var/forms/class.forms.php");

            $_data = new FormsSections();
            $_data_lang = new FormsSectionsIdioma();
            $_forms = new FormsIdioma();

            $_sort = new Sort();
            $_sort->table_name = $_data->table_name;

            $condition = "id = $id";
            $row = $_data->get_record($condition);
            
            
            //datos idiomas
            for ($k = 1; $k <= count($opt_idioma); $k++)
            {
                $condition = "id_forms_sections = $id AND id_idioma = $k";
                $row_lang[$k] = $_data_lang->get_record($condition);
            }
            

            $id_forms = 0;
            if ($row['n_id_forms'] == '')
            {
                $row['n_id_forms'] = 0;
                if (isset($_SESSION['FORMS_ID']))
                {
                    $row['n_id_forms'] = $_SESSION['FORMS_ID'];
                }
            }
            $id_forms = $row['n_id_forms'];       
            
            if (empty($type))
            {
                if (isset($_SESSION['FORMS_TYPE']))
                {
                    $type = $_SESSION['FORMS_TYPE'];
                }
            }
            
            $hide_title = '';            
            if (isset($row['n_hide_title']))
            {
                $hide_title = set_checked($row['n_hide_title'],1);
            }
            
            $table_format = '';            
            if (isset($row['n_table_format']))
            {
                $table_format = set_checked($row['n_table_format'],1);
            }
                
            
            $cond = "id_forms = $id_forms AND id_idioma = ".CONF::DEFAULT_LANGUAGE;
            $form_name = $_forms->field_value('title', $cond);

            //order
            if ($id == 0) $add_sort = true;

            $cond_sort = "id_forms = $id_forms";
            $last_sort = $_sort->last_position('ord',$add_sort,$cond_sort);

            if ($id == 0)
            {
                $current_sort = $last_sort;
            }
            else
            {
                $current_sort = $row['n_ord'];
            }
            $opt_order = $_sort->build_list($current_sort, $last_sort);

           

            $grid_page = "forms_list_forms_sections.php";

            break;
          
        */
    }
    
    
    //mensajes actualizacion
    if ($status == SYS::SHOW_SAME_PAGE)
    {
        $message = $info_message[SYS::ACTION_UPDATE];
    }
    elseif ($status == SYS::SHOW_NEXT_TAB)
    {
        $message = $info_message[SYS::ACTION_ADD];
    }
    elseif ($status == SYS::ACTION_DELETE)
    {
        $message = $info_message[SYS::ACTION_DELETE];
    }
    //mensajes de error
    elseif (($status != SYS::FILE_NO_ERROR) && ($status != SYS::SHOW_NEXT_TAB))
    {
        $message = $error_message[$status];        
    }
    
    //definicion de la accion a realizar
    if ($mode == SYS::ACTION_UPDATE || $mode == SYS::ACTION_DELETE_FILE)
    {
        $action_page = "server/update.php?".$extra_param."id=$id&tbl=$appTableName";              
    }
    elseif ($mode == SYS::ACTION_ADD)
    {
        $action_page = "server/add.php?".$extra_param."tbl=$appTableName";              
    }
    elseif ($mode == SYS::ACTION_DELETE_FILE)
    {
        if ($status == SYS::FILE_NO_ERROR)
        {            
            $message = $info_message[$mode];
        }        
    }
    $delete_file_page = "server/delete_file.php?id=$id&tbl=$appTableName";    
    

?>