<?php
    include("../../system/config/config.inc.php");
    include("../include/include.inc.php");
    include("$appSystemPath/lib/data.inc.2.2.php");
    
    
    $clbk = get_param('clbk');   
    $mode = get_param('mode');   
    
    
    switch ($clbk)
    {        
        
        case 'orden_pagina':
            
            $_sort = new Sort();
            
            $id_parent = get_param('id_parent',0);
            
            $_sort->table_name = 'pagina';

            $add_order = false;
            if ($mode == SYS::ACTION_ADD)
            {
                $add_order = true;
            }

            $opt_orden = '';
            $cond_sort = "id_parent = ".$id_parent;
            $last_sort = $_sort->last_position('orden',$add_order,$cond_sort);
            $opt_orden = $_sort->build_list($last_sort, $last_sort);
            

            $str_field = '<select class="form-control custom-select select2" id="orden" name="orden">'.
                             $opt_orden
                        .'</select>';

            echo $str_field;

            break;
            
            
        case 'orden_categoria':
            
            $_sort = new Sort();
            
            $id_tipo = get_param('id_tipo',0);
            $id_parent = get_param('id_parent',0);
            
            $_sort->table_name = 'categoria';

            $add_order = false;
            if ($mode == SYS::ACTION_ADD)
            {
                $add_order = true;
            }

            $opt_orden = '';
            $cond_sort = "id_tipo = $id_tipo AND id_parent = ".$id_parent;  
            $last_sort = $_sort->last_position('orden',$add_order,$cond_sort);
            $opt_orden = $_sort->build_list($last_sort, $last_sort);
            

            $str_field = '<select class="form-control custom-select select2" id="orden" name="orden">'.
                             $opt_orden
                        .'</select>';

            echo $str_field;

            break;
            
            
        case 'orden_catalogo':
            
            $_sort = new Sort();
            
            $id_seccion = get_param('id_seccion',0);
            $id_categoria = get_param('id_categoria',0);
            $id_parent = get_param('id_parent',0);
            
            $_sort->table_name = 'catalogo';

            $add_order = false;
            if ($mode == SYS::ACTION_ADD)
            {
                $add_order = true;
            }

            $opt_orden = '';
            $cond_sort = "id_seccion = $id_seccion AND id_categoria = $id_categoria AND id_parent = ".$id_parent;  
            $last_sort = $_sort->last_position('orden',$add_order,$cond_sort);
            $opt_orden = $_sort->build_list($last_sort, $last_sort);
            

            $str_field = '<select class="form-control custom-select select2" id="orden" name="orden">'.
                             $opt_orden
                        .'</select>';

            echo $str_field;

            break;
            
        
        case 'orden_catalogo_foto':
            
            $_sort = new Sort();
            
            $id_catalogo = get_param('id_catalogo',0);
            $id_categoria = get_param('id_categoria',0);            
            
            $_sort->table_name = 'catalogo_foto';

            $add_order = false;
            if ($mode == SYS::ACTION_ADD)
            {
                $add_order = true;
            }

            $opt_orden = '';
            $cond_sort = "id_catalogo = $id_catalogo AND id_categoria = $id_categoria";  
            $last_sort = $_sort->last_position('orden',$add_order,$cond_sort);
            $opt_orden = $_sort->build_list($last_sort, $last_sort);
            

            $str_field = '<select class="form-control custom-select select2" id="orden" name="orden">'.
                             $opt_orden
                        .'</select>';

            echo $str_field;

            break;
            
            
        case 'orden_forms_fields':
            
            $_sort = new Sort();
            
            $id_section = get_param('id_section',0);
            $id_forms = get_param('id_forms',0);
            
            $_sort->table_name = 'forms_fields';

            $add_order = false;
            if ($mode == SYS::ACTION_ADD)
            {
                $add_order = true;
            }

            $opt_orden = '';
            $cond_sort = "id_section = $id_section AND id_forms = $id_forms";
            $last_sort = $_sort->last_position('ord',$add_order,$cond_sort);
            $opt_orden = $_sort->build_list($last_sort, $last_sort);
            

            $str_field = '<select class="form-control custom-select select2" id="ord" name="ord">'.
                             $opt_orden
                        .'</select>';

            echo $str_field;

            break;
            
            
        case 'orden_forms_fields':
            
            $_sort = new Sort();
            
            $id_section = get_param('id_section',0);
            $id_forms = get_param('id_forms',0);
            
            $_sort->table_name = 'forms_fields';

            $add_order = false;
            if ($mode == SYS::ACTION_ADD)
            {
                $add_order = true;
            }

            $opt_orden = '';
            $cond_sort = "id_section = $id_section AND id_forms = $id_forms";
            $last_sort = $_sort->last_position('ord',$add_order,$cond_sort);
            $opt_orden = $_sort->build_list($last_sort, $last_sort);
            

            $str_field = '<select class="form-control" id="ord" name="ord">'.
                             $opt_orden
                        .'</select>';

            echo $str_field;

            break;
            
            
        /*
        case 'callback2':
            
            $arr_result = array('status' => 0);            
            

            echo json_encode($arr_result);
            
            
            break;
        */
        
        
    }

    
    
?>

