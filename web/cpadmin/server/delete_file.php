<?php
    include("../../system/config/config.inc.php");
    include("../include/include.inc.php");
    include("$appSystemPath/lib/files.inc.1.11.php");

    $_file = new FileManager();
    $status = SYS::FILE_NO_ERROR;

    $id = get_param('id');
    $table_id = get_param('tbl');
    $field_name = get_param('fld');
    $type = get_param('type');
    
    $extra_param = '';
    

    switch ($table_id)
    {
        case TBL::ADMIN:
            include("$appSystemPath/var/class.admin.php");
            $_data = new Admin();

            $condition = "id = $id";
            $app_files_path = $appFilesPathBack;

            $form_page = "form_admin.php";

            break;
        
        
        case TBL::PERFIL_WEB:
            include("$appSystemPath/var/class.perfil_web.php");
            $_data = new PerfilWeb();

            $condition = "id = $id";
            $app_files_path = $appFilesPathImg;

            $form_page = "form_perfil_web.php";

            break;
        
        
        case TBL::CATALOGO:
            include("$appSystemPath/var/class.catalogo.php");
            $_data = new Catalogo();
            
            $id_idioma = get_param('id_idioma',0);

            if ($id_idioma == 0)
            {
                $_data = new Catalogo();
                
                $condition = "id = $id";
            }
            else
            {
                $_data = new CatalogoIdioma();
                
                $condition = "id_catalogo = $id AND id_idioma = $id_idioma";
            }
            
            $app_files_path = $appFilesPathImg;

            $form_page = "form_catalogo.php";
            
            $extra_param = "&type=$type";

            break;
        
        
        case TBL::CATALOGO_FOTO:
            include("$appSystemPath/var/class.catalogo_foto.php");            

            $id_catalogo = get_param('id_catalogo',0);
            $id_idioma = get_param('id_idioma',0);
            
            
            if ($id_idioma == 0)
            {
                $_data = new CatalogoFoto();
                
                $condition = "id = $id";
            }
            else
            {
                $_data = new CatalogoFotoIdioma();
                
                $condition = "id_catalogo_foto = $id AND id_idioma = $id_idioma";
            }
            

            $app_files_path = $appFilesPathImg;

            $extra_param = "&id_catalogo=$id_catalogo&type=$type";

            $form_page = "jx_form_catalogo_foto.php";          

            break;
        
        
        
        case TBL::SLIDER_ITEM:
            include("$appSystemPath/var/class.slider_item.php");            

            $id_slider = get_param('id_slider',0);  
            $id_idioma = get_param('id_idioma',0);

            if ($id_idioma == 0)
            {
                $_data = new SliderItem();
                
                $condition = "id = $id";
            }
            else
            {
                $_data = new SliderItemIdioma();
                
                $condition = "id_slider_item = $id AND id_idioma = $id_idioma";
            }

            $app_files_path = $appFilesPathImg;

            $extra_param = "&id_slider=$id_slider";

            $form_page = "jx_form_slider_item.php";
            break;
            
            
        case TBL::CONTENIDO:
            include("$appSystemPath/var/class.contenido.php");   
            
            $_data = new Contenido();
                
            $id_pagina = get_param('id_pagina',0);   
            $id_idioma = get_param('id_idioma',0);
            
            if ($id_idioma == 0)
            {
                $_data = new Contenido();
                
                $condition = "id = $id";
            }
            else
            {
                $_data = new ContenidoIdioma();
                
                $condition = "id_contenido = $id AND id_idioma = $id_idioma";
            }
            

            $app_files_path = $appFilesPathImg;

            $extra_param = "&id_pagina=$id_pagina";

            $form_page = "jx_form_contenido.php";
            break;
            
            
        case TBL::USUARIO:
            include("$appSystemPath/var/class.usuario.php");
            $_data = new Usuario();
            
            $condition = "id = $id";
            
            $app_files_path = $appFilesPathImg;

            $form_page = "form_usuario.php";
            
            $extra_param = "&type=$type";

            break;
        
        
        case TBL::CATEGORIA:
            include("$appSystemPath/var/class.categoria.php");
            $_data = new Categoria();
            
            $condition = "id = $id";
            
            $app_files_path = $appFilesPathImg;

            $form_page = "form_categoria.php";
            
            $extra_param = "&type=$type";

            break;
        
        
        
        
        /*******************************/
        /********* MOD::SHOP ***********/
        /*******************************/
        
        
        /*
         
        case TBL::PRODUCTO_FOTO:
            include("$appSystemPath/var/shop/class.producto_foto.php");            

            $id_producto = get_param('id_producto',0);
            
            $_data = new ProductoFoto();
                
            $condition = "id = $id";
            

            $app_files_path = $appFilesPathImg;

            $extra_param = "&id_producto=$id_producto";

            $form_page = "shop_jx_form_producto_foto.php";          

            break;
        
        
        case TBL::PRODUCTO_FICHERO:
            include("$appSystemPath/var/shop/class.producto_fichero.php");            

            $id_producto = get_param('id_producto',0);
            
            $_data = new ProductoFichero();
                
            $condition = "id = $id";
            

            $app_files_path = $appFilesPathPdf;

            $extra_param = "&id_producto=$id_producto";

            $form_page = "shop_jx_form_producto_fichero.php";          

            break;
        
        
        
        case TBL::PEDIDO:
            include("$appSystemPath/var/shop/class.pedido.php");
            $_data = new Pedido();

            $condition = "id = $id";
            $app_files_path = $appFilesPathLogo;

            $form_page = "shop_form_pedido.php";

            break;
        
        
        case TBL::FACTURA:
            include("$appSystemPath/var/shop/class.factura.php");
            $_data = new Factura();

            $condition = "id = $id";
            $app_files_path = $appFilesPathPdf;

            $form_page = "shop_form_factura.php";

            break;
        
        */
        
        
        

    }
   

    $_file->file = $app_files_path.'/'.$_data->field_value($field_name,$condition);
    if ($_file->delete())
    {
        
    }
    else
    {
        //$status = SYS::FILE_ERROR_DELETE;
    }
    
    $_data->update_field('t_'.$field_name,'',$condition);
    

    header("Location: $appAdmUrl/$form_page?id=$id&mode=".SYS::ACTION_DELETE_FILE."&status=$status".$extra_param);
    
?>