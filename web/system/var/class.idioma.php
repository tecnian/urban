<?php

class Idioma extends SQL {
    

	function __construct()
	{
		$this->db = $this->connect_db();
		$this->init();				
	}
		
	function init() {
		$this->table_name = "idioma";

		$this->record["n_id"] = NULL; 
                $this->record["t_codigo"] = NULL;	
                $this->record["t_nombre"] = NULL;			
                $this->record["n_activo"] = NULL;
                $this->record["n_defecto"] = NULL;
                $this->record["n_activo_admin"] = NULL;
                $this->record["n_defecto_admin"] = NULL;
	}
	
	function request()
        {
		$this->record["t_codigo"] = get_param('codigo');	
                $this->record["t_nombre"] = get_param('nombre');		
                $this->record["n_activo"] = get_check('activo');   
                $this->record["n_defecto"] = get_check('defecto');   
                $this->record["n_activo_admin"] = get_check('activo_admin');   
                $this->record["n_defecto_admin"] = get_check('defecto_admin');   
	}
        
        function get_id($code)
        {
                $id_lang = 0;
                
                $condition = "codigo = '$code'";
                
                $id_lang = $this->field_value('id', $condition);
                
                
                return($id_lang);
        }
        
        function get_default()
        {
                $arr_idioma = array();
                
                $query = "SELECT id,codigo FROM idioma
                          WHERE defecto = 1";
        
                $idioma = $this->get_query($query);
                
                if (isset($idioma[0]['id']))
                {
                    $arr_idioma['id'] = $idioma[0]['id'];
                    $arr_idioma['code'] = $idioma[0]['codigo'];
                }                                
                
                return($arr_idioma);
        }
                
        
}

?>