<?php

class Categoria extends SQL {

        var $max_level = 0;
        var $error = SYS::FILE_NO_ERROR;

	function __construct()
	{
		$this->db = $this->connect_db();
		$this->init();				
	}
		
	function init() {
		$this->table_name = "categoria";

		$this->record["n_id"] = NULL;                
                $this->record["n_id_tipo"] = NULL;    
                $this->record["n_id_parent"] = NULL;    
                $this->record["n_orden"] = NULL; 
                $this->record["n_activo"] = NULL; 
                $this->record["t_imagen"] = NULL;
		
	}
	
	function request()
        {                
                $this->record["n_id_tipo"] = get_param('id_tipo',0); 
                $this->record["n_id_parent"] = get_param('id_parent',0); 
                $this->record["n_orden"] = get_param('orden',0);  
                $this->record["n_activo"] = get_check('activo');  
                
                $this->record["t_imagen"] = $this->upload_file('imagen');
	}
        
        function reference($id)
        {
            $_categoria_lang = new CategoriaIdioma();
            
            $condition = "id = $id";
            $cond_lang = "id_categoria = $id AND id_idioma = ".CONF::DEFAULT_LANGUAGE;
            
            $title = $_categoria_lang->field_value('nombre', $cond_lang);
            $id_parent = $this->field_value('id_parent', $condition);

            $reference = $title;

            while ($id_parent > 0)
            {
                $condition = "id = $id_parent";
                $cond_lang = "id_categoria = $id_parent AND id_idioma = ".CONF::DEFAULT_LANGUAGE;
                
                $title = $_categoria_lang->field_value('nombre', $cond_lang);
                $id_parent = $this->field_value('id_parent', $condition);

                $reference = $title." &raquo; ".$reference;
            }

            return ($reference);

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

        function get_array($condition = '')
        {
            $list = array();
            $ord = array();

            $query = "SELECT id,orden FROM ".$this->table_name;
            if (!empty($condition))
            {
                $query .= " WHERE $condition";
            }
            
            $row = $this->get_query($query);            
            for($i = 0; $i < count($row); $i++)
            {                                
                $list[$i]['id'] = $row[$i]['id'];
                $list[$i]['orden'] = $row[$i]['orden'];
                $list[$i]['nombre'] = $this->reference($row[$i]['id']);                

                //array para definir el orden
                $ord[$row[$i]['id']] = $this->reference($row[$i]['id']);
            }
                       
            array_multisort($ord, SORT_ASC, $list);
            
            return ($list);
        }

        function get_list($condition = '')
        {
            $list = array();

            $query = "SELECT id FROM ".$this->table_name;
            if (!empty($condition))
            {
                $query .= " WHERE $condition";
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
        
        function upload_file($name)
        {
            global $appFilesPathImg;

            $file_name = NULL;

            $_file = new FileManager();
            $_file->field = $name;
            $_file->path = $appFilesPathImg;
            $_file->mode = SYS::FILE_MODE_IMG;
            $_file->rename = SYS::FILE_RENAME_SUFFIX;

            $_file->upload();

            if ($_file->error == SYS::FILE_NO_ERROR)
            {
               $file_name = $_file->name;
            }

            $this->error = $_file->error;

            return($file_name);
        }  
        
}

class CategoriaIdioma extends SQL {

        function __construct()
	{
		$this->db = $this->connect_db();
		$this->init();
	}

        function init()
        {            
		$this->table_name = "categoria_idioma";

		$this->record["n_id_categoria"] = NULL;
                $this->record["n_id_idioma"] = NULL;
		$this->record["t_nombre"] = NULL;         
                $this->record["t_friendly_url"] = NULL;         
                              
	}

        function request($id_categoria, $id_idioma)
        {
		$filled = false;

                $this->record["n_id_categoria"] = $id_categoria;
                $this->record["n_id_idioma"] = $id_idioma;
                $this->record["t_nombre"] = get_param('nombre_'.$id_idioma);      
                
                $this->record["t_friendly_url"] = $this->set_url($this->record["t_nombre"], $id_categoria, $id_idioma);  
                
                
                //Verificamos que los campos esten rellenados
                if (trim($this->record["t_nombre"] != '')) $filled = true;         
                

                return($filled);
	}
        
        function set_url($string, $id_categoria, $id_idioma)
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
                    $cond_url = "friendly_url = '$friendly_url' AND id_categoria <> $id_categoria AND id_idioma = $id_idioma";

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
        
        
        function change_language($friendly_url,$id_current_lang,$id_new_lang)
        {
            $new_url = '';
            
            
            //id del registro
            
            $condition = "friendly_url = '$friendly_url' AND id_idioma = $id_current_lang";  
            
            $id_categoria = $this->field_value('id_categoria', $condition);  
            
            if (!isset($id_categoria))  $id_categoria = 0;
            
            
            //url amigable del nuevo idioma
            
            $condition = "id_categoria = $id_categoria AND id_idioma = $id_new_lang";
            
            $new_url = $this->field_value('friendly_url', $condition);
            
            if (!isset($new_url))  $new_url = '';
            
            
            return($new_url);
        }
        
        
        

}

?>