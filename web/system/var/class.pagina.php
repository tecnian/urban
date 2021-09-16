<?php

class Pagina extends SQL {
    
    var $max_level = 0;
    var $error = SYS::FILE_NO_ERROR;

	function __construct()
	{
		$this->db = $this->connect_db();
		$this->init();				
	}
		
	function init() {
		$this->table_name = "pagina";

		$this->record["n_id"] = NULL;           
                $this->record["n_id_parent"] = NULL;   
                $this->record["t_nombre"] = NULL;  
                $this->record["n_orden"] = NULL;  
                $this->record["n_activo"] = NULL;  
                $this->record["t_php_file"] = NULL;  
                $this->record["n_id_formato"] = NULL;  
                $this->record["n_mostrar_menu"] = NULL;  
                $this->record["t_referencia"] = NULL;  
                $this->record["t_meta_robots"] = NULL;  
                $this->record["n_privada"] = NULL;  
		
	}
	
	function request()
        {                
                $this->record["n_id_parent"] = get_param('id_parent',NULL);
                $this->record["t_nombre"] = get_param('nombre');
                $this->record["n_orden"] = get_param('orden',0);
                $this->record["n_activo"] = get_check('activo');
                $this->record["t_php_file"] = get_param('php_file',NULL);
                $this->record["n_id_formato"] = get_param('id_formato',0);
                $this->record["n_mostrar_menu"] = get_check('mostrar_menu');
                $this->record["t_referencia"] = get_param('referencia',NULL);
                $this->record["t_meta_robots"] = get_param('meta_robots');
                $this->record["n_privada"] = get_check('privada');
                
	}
        
        function reference($id)
        {
              $condition = "id = $id";
              
              $id_parent = $this->field_value('id_parent', $condition);
              $title = $this->field_value('nombre', $condition);

              $reference = $title;

              while ($id_parent > 0)
              {                 
                  $condition = "id = $id_parent";
                  
                  $id_parent = $this->field_value('id_parent', $condition);
                  $title = $this->field_value('nombre', $condition);

                  $reference = $title." &raquo; ".$reference;
              }

              return ($reference);

        }

        function get_list($condition = '')
        {
            $list = array();

            $query = "SELECT id FROM ".$this->table_name;
            if (!empty($condition))
            {
                $query .= " AND $condition";
            }

            $row = $this->get_query($query);
            for($i = 0; $i < count($row); $i++)
            {
                //limitaremos la jerarquia del listado segun nivel indicado
                $categ_level = $this->level($row[$i]['id']);

                if ($this->max_level == 0 || $categ_level <= $this->max_level)
                {
                    $list[$row[$i]['id']] = $this->reference($row[$i]['id']);
                }
            }

            asort($list);

            return ($list);
        }

        function level($id)
        {
          $level = 1;

          $condition = "id = $id";
          $id_parent = $this->field_value('id_parent', $condition);

          while ($id_parent > 0)
          {
              $level++;

              $condition = "id = $id_parent";
              $id_parent = $this->field_value('id_parent', $condition);
          }

          return ($level);

        }
        
        function get_array($condition = '')
        {
            $list = array();
            $ord = array();

            $query = "SELECT id FROM ".$this->table_name;
            if (!empty($condition))
            {
                $query .= " WHERE $condition";
            }

            $row = $this->get_query($query);
            for($i = 0; $i < count($row); $i++)
            {
                $list[$i]['id'] = $row[$i]['id'];
                $list[$i]['nombre'] = $this->reference($row[$i]['id']); 

                //array para definir el orden
                $ord[$row[$i]['id']] = $list[$i]['nombre'];
            }

            array_multisort($ord, SORT_ASC, $list);

            return ($list);
        }


        function has_children($id)
        {
            $children = false;

            $condition = "id_parent = $id";
            $children = $this->record_exists($condition);

            return ($children);
        }

        function get_main_id($id)
        {
            $condition = "id = $id";
            $id_parent = $this->field_value('id_parent', $condition);

            $main_id = $id_parent;

            if ($id_parent == 0)
            {
                $main_id = $id;
            }
                       

            while ($id_parent > 0)
            {
                $main_id = $id_parent;
                $condition = "id = $id_parent";
                $id_parent = $this->field_value('id_parent', $condition);                                      
            }         

            return ($main_id);
        }                
        
}

class PaginaIdioma extends SQL {

        function __construct()
	{
		$this->db = $this->connect_db();
		$this->init();
	}

        function init()
        {            
		$this->table_name = "pagina_idioma";

		$this->record["n_id_pagina"] = NULL;
                $this->record["n_id_idioma"] = NULL;
		$this->record["t_titulo"] = NULL;                      
                $this->record["t_abstract"] = NULL;
                $this->record["t_friendly_url"] = NULL;
                $this->record["t_seo_title"] = NULL;    
                $this->record["t_seo_description"] = NULL;  
                $this->record["t_seo_keywords"] = NULL;    
                $this->record["t_php_file"] = NULL;  
                              
	}

        function request($id_pagina, $id_idioma)
        {
		$filled = false;

                $this->record["n_id_pagina"] = $id_pagina;
                $this->record["n_id_idioma"] = $id_idioma;
                $this->record["t_titulo"] = get_param('titulo_'.$id_idioma);  
                $this->record["t_abstract"] = get_param('abstract_'.$id_idioma);  
                $this->record["t_friendly_url"] = get_param('friendly_url_'.$id_idioma);
                $this->record["t_seo_title"] = get_param('seo_title_'.$id_idioma);     
                $this->record["t_seo_description"] = get_param('seo_description_'.$id_idioma);  
                $this->record["t_seo_keywords"] = get_param('seo_keywords_'.$id_idioma); 
                $this->record["t_php_file"] = get_param('php_file_'.$id_idioma); 
                
                $this->record["t_friendly_url"] = $this->set_url($this->record["t_friendly_url"], $id_pagina, $id_idioma);    
                
                
                //Verificamos que los campos esten rellenados
                if (trim($this->record["t_titulo"] != '')) $filled = true;                       
                if (trim($this->record["t_abstract"] != '')) $filled = true;
                if (trim($this->record["t_friendly_url"] != '')) $filled = true; 
                if (trim($this->record["t_seo_title"] != '')) $filled = true;
                if (trim($this->record["t_seo_description"] != '')) $filled = true;
                if (trim($this->record["t_seo_keywords"] != '')) $filled = true;
                if (trim($this->record["t_php_file"] != '')) $filled = true;
                                

                return($filled);
	}
        
        function set_url($string, $id_pagina, $id_idioma)
        {
            $friendly_url = '';
            
            if (!empty($string))
            {
                $url_norm = normalize_url($string);

                $url_norm = substr($url_norm,0,95);

                $friendly_url = $url_norm;

                $exists = true;
                $sufix = 2;

                while ($exists)
                {
                    $cond_url = "friendly_url = '$friendly_url' AND id_pagina <> $id_pagina AND id_idioma = $id_idioma";

                    if ($this->record_exists($cond_url))
                    {
                        $friendly_url = $url_norm.'-'.$sufix;

                        $sufix++;
                    }
                    else
                    {
                        $exists = false;
                    }
                }

            }
            
            
            return($friendly_url);
            
        }
        
        function change_language($id_pagina,$cod_idioma)
        {
            $new_url = '';
            
            $sql = "SELECT codigo,friendly_url FROM pagina_idioma
                    INNER JOIN idioma ON pagina_idioma.id_idioma = idioma.id
                    WHERE id_pagina = $id_pagina AND codigo = '$cod_idioma'";
            
            $data = $this->get_query($sql);
            
            if (isset($data[0]))
            {
                $new_url = APP_ROOT_URL.'/'.$data[0]['codigo'].'/'.$data[0]['friendly_url'];
            }
            
            return($new_url);
        }
        

}

?>