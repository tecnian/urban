<?php

class Seccion extends SQL {

    var $error = SYS::FILE_NO_ERROR;

	function __construct()
	{
		$this->db = $this->connect_db();
		$this->init();				
	}
		
	function init() {
		$this->table_name = "seccion";

		$this->record["n_id"] = NULL;
                $this->record["t_nombre"] = NULL;
		$this->record["t_icono"] = NULL;	
                $this->record["n_orden"] = NULL;	
                
                $this->related_table[0]['table_name'] = 'catalogo';
                $this->related_table[0]['field_id'] = 'id_seccion';
	}
	
	function request()
        {
		$this->record["t_nombre"] = get_param('nombre');
		$this->record["t_icono"] = get_param('icono');	
                $this->record["n_orden"] = get_param('orden',0);	
	}
                
}

?>