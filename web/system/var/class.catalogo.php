<?php

class Catalogo extends SQL {

        var $max_level = 0;
        var $error = SYS::FILE_NO_ERROR;

	function __construct()
	{
		$this->db = $this->connect_db();
		$this->init();				
	}
		
	function init() {
		$this->table_name = "catalogo";

		$this->record["n_id"] = NULL;     
                $this->record["n_id_seccion"] = NULL;     
                $this->record["n_id_categoria"] = NULL;     
                $this->record["n_id_parent"] = NULL;     
                $this->record["t_fecha"] = NULL;   
                $this->record["n_precio"] = NULL;   
                $this->record["n_numero"] = NULL;     
                $this->record["t_referencia"] = NULL;      
                $this->record["t_imagen"] = NULL;      
                $this->record["t_fichero"] = NULL;      
                $this->record["n_orden"] = NULL;    
                $this->record["n_destacado"] = NULL;      
                $this->record["n_activo"] = NULL;  
                
                //definicion de relaciones para evitar eliminacion de registros
                //$this->related_table[0]['table_name'] = 'catalogo';
                //$this->related_table[0]['field_id'] = 'id_parent';
		
	}
	
	function request()
        {                
                $this->record["n_id_seccion"] = get_param('id_seccion',0);
                $this->record["n_id_categoria"] = get_param('id_categoria',0);
                $this->record["n_id_parent"] = get_param('id_parent',0);
                $this->record["t_fecha"] = get_date('fecha');
                $this->record["n_precio"] = get_number('precio',0);
                $this->record["n_numero"] = get_param('numero',0);
                $this->record["t_referencia"] = get_param('referencia');
                $this->record["n_orden"] = get_param('orden',0); 
                $this->record["n_destacado"] = get_check('destacado');
                $this->record["n_activo"] = get_check('activo');
                
                $this->record["t_imagen"] = $this->upload_file('imagen');    
                $this->record["t_fichero"] = $this->upload_file('fichero');    
                
	}
        
        function upload_file($name)
        {
            global $appFilesPathImg;

            $file_name = NULL;

            $_file = new FileManager();
            $_file->field = $name;
            $_file->path = $appFilesPathImg;            
            $_file->rename = SYS::FILE_RENAME_SUFFIX;

            $_file->upload();

            if ($_file->error == SYS::FILE_NO_ERROR)
            {
               $file_name = $_file->name;
            }

            $this->error = $_file->error;

            return($file_name);
        }  
        
        function reference($id)
        {
            $_categoria_lang = new CatalogoIdioma();
            
            $condition = "id = $id";
            $cond_lang = "id_catalogo = $id AND id_idioma = ".CONF::DEFAULT_LANGUAGE;
            
            $title = $_categoria_lang->field_value('titulo', $cond_lang);
            $id_parent = $this->field_value('id_parent', $condition);

            $reference = $title;

            while ($id_parent > 0)
            {
                $condition = "id = $id_parent";
                $cond_lang = "id_catalogo = $id_parent AND id_idioma = ".CONF::DEFAULT_LANGUAGE;
                
                $title = $_categoria_lang->field_value('titulo', $cond_lang);
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
                
}

class CatalogoIdioma extends SQL {

        function __construct()
	{
		$this->db = $this->connect_db();
		$this->init();
	}

        function init()
        {            
		$this->table_name = "catalogo_idioma";

		$this->record["n_id_catalogo"] = NULL;
                $this->record["n_id_idioma"] = NULL;
		$this->record["t_titulo"] = NULL;    
                $this->record["t_subtitulo"] = NULL;    
                $this->record["t_descripcion"] = NULL;  
                $this->record["t_friendly_url"] = NULL;  
                $this->record["t_imagen"] = NULL;  
                $this->record["t_img_alt"] = NULL;  
                $this->record["t_fichero"] = NULL;  
                              
	}

        function request($id_catalogo, $id_idioma)
        {
		$filled = false;

                $this->record["n_id_catalogo"] = $id_catalogo;
                $this->record["n_id_idioma"] = $id_idioma;
                $this->record["t_titulo"] = get_param('titulo_'.$id_idioma);     
                $this->record["t_subtitulo"] = get_param('subtitulo_'.$id_idioma);     
                $this->record["t_descripcion"] = get_param('descripcion_'.$id_idioma);  
                $this->record["t_img_alt"] = get_param('img_alt_'.$id_idioma);
                
                $this->record["t_imagen"] = $this->upload_file('imagen_'.$id_idioma);
                $this->record["t_fichero"] = $this->upload_file('fichero_'.$id_idioma);
                
                
                $this->record["t_friendly_url"] = $this->set_url($this->record["t_titulo"], $id_catalogo, $id_idioma);                                  
                
                
                //Verificamos que los campos esten rellenados
                if (trim($this->record["t_titulo"] != '')) $filled = true;  
                if (trim($this->record["t_subtitulo"] != '')) $filled = true;  
                if (trim($this->record["t_descripcion"] != '')) $filled = true;    
                if (trim($this->record["t_img_alt"] != '')) $filled = true;  
                if (trim($this->record["t_imagen"] != '')) $filled = true;  
                if (trim($this->record["t_fichero"] != '')) $filled = true;  
                                

                return($filled);
	}
        
        function upload_file($name)
        {
            global $appFilesPathImg;

            $file_name = NULL;

            $_file = new FileManager();
            $_file->field = $name;
            $_file->path = $appFilesPathImg;            
            $_file->rename = SYS::FILE_RENAME_SUFFIX;

            $_file->upload();

            if ($_file->error == SYS::FILE_NO_ERROR)
            {
               $file_name = $_file->name;
            }

            $this->error = $_file->error;

            return($file_name);
        }  
        
        function set_url($string, $id_catalogo, $id_idioma)
        {
            $friendly_url = '';
            
            if (!empty($string))
            {    
                
                $url_norm = normalize_url($string);

                $url_norm = substr($url_norm,0,145);

                $friendly_url = $url_norm;

                $exists = true;
                $sufix = 2;

                while ($exists)
                {
                    $cond_url = "friendly_url = '$friendly_url' AND id_catalogo <> $id_catalogo AND id_idioma = $id_idioma";

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
        
        function get_metas($friendly_url, $id_idioma)
        {
            $arr_metas = array();
            
            $sql = "SELECT titulo, subtitulo
                    FROM catalogo_idioma
                    WHERE friendly_url = '$friendly_url' AND id_idioma = $id_idioma";
            
            $data = $this->get_query($sql);
            
            if (isset($data[0]['titulo']))
            {
                $arr_metas['seo_title'] = $data[0]['titulo'];
                $arr_metas['seo_description'] = $data[0]['subtitulo'];
            }
            
            return($arr_metas);
            
        }
        
        function change_language($friendly_url,$id_current_lang,$id_new_lang)
        {
            $new_url = '';
            
            
            //id del registro
            
            $condition = "friendly_url = '$friendly_url' AND id_idioma = $id_current_lang";  
            
            $id_catalogo = $this->field_value('id_catalogo', $condition);  
            
            if (!isset($id_catalogo))  $id_catalogo = 0;
            
            
            //url amigable del nuevo idioma
            
            $condition = "id_catalogo = $id_catalogo AND id_idioma = $id_new_lang";
            
            $new_url = $this->field_value('friendly_url', $condition);
            
            if (!isset($new_url))  $new_url = '';
            
            
            return($new_url);
        }
        

}

?>