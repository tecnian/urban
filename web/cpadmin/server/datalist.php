<?php
    include("../../system/config/config.inc.php");    
    include("../include/include.inc.php");                
    
    $table_id = get_param('table_id');     
    $type = get_param('type',0);  
    
    
    switch ($table_id)
    {
        case TBL::CATALOGO:
            
            include("$appSystemPath/var/class.catalogo.php");     
            
            $_data = new Catalogo();
            
            $data = array();
            $search = '';
            $arr_order = array();
            
            $arr_col[0] = 'id';
            $arr_col[1] = 'titulo';
            $arr_col[2] = 'activo';
            
            
            foreach($_REQUEST as $name => $value)
            {
                //echo $name.' = '.$value.'\r\n';
                
                if ($name == 'search')
                {
                    $arr_search = $_REQUEST['search'];
                    
                    $search = $arr_search['value'];
                }
                
                if ($name == 'order')
                {
                    $arr_order = $_REQUEST['order'][0];                    
                }
            }  
                
              
            $draw = get_param('draw',0); 
            $start = get_param('start',0); 
            $length = get_param('length',0); 
            
            
            
            $sql = "SELECT id, fecha, activo, titulo 
                    FROM catalogo INNER JOIN catalogo_idioma ON catalogo.id = catalogo_idioma.id_catalogo
                    WHERE id_seccion = $type AND id_idioma = ".CONF::DEFAULT_LANGUAGE;
            
            if (!empty($search))
            {
                $sql .= " AND titulo LIKE '%$search%'";
            }
            
            if (count($arr_order) > 0)
            {
                $sql .= " ORDER BY ".$arr_col[$arr_order['column']];
                
                if ($arr_order['dir'] == 'desc')
                {
                    $sql .= ' ASC';
                }
                else
                {
                    $sql .= ' DESC';
                }
            }                        
            
            $total_rows = $_data->record_count($sql);
            
            $sql .= " LIMIT $start, $length";
            
            
            $row = $_data->get_query($sql);
                
            for ($i = 0; $i< count($row); $i++)
            {
                $data[$i][0] = '<input class="check_box" name="item_'.$row[$i]['id'].'" type="checkbox" />';
                $data[$i][1] = '<a href="form_catalogo.php?mode=update&type='.$type.'&id='.$row[$i]['id'].'">'.$row[$i]['titulo'].'</a>';
                $data[$i][2] = $options_si_no[$row[$i]['activo']];
            }
            
            
            
            
            
            $arr_data['draw'] = $draw;
            $arr_data['recordsTotal'] = $total_rows;
            $arr_data['recordsFiltered'] = $total_rows;
            $arr_data['data'] = $data;
            
            
            
            $json = json_encode($arr_data);
            
            echo $json;
            
            break;
    }
  
?>