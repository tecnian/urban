<?php

class PaisWeb extends SQL {

    var $error = SYS::FILE_NO_ERROR;

	function __construct()
	{
		$this->db = $this->connect_db();
		$this->init();				
	}
		
	function init() {
		$this->table_name = "pais_web";

		$this->record["n_id"] = NULL;                
                $this->record["t_nombre"] = NULL;
		$this->record["t_codigo"] = NULL;
		$this->record["t_direccion"] = NULL;
                $this->record["t_email"] = NULL;
                $this->record["t_telefono"] = NULL;
                $this->record["n_activo"] = NULL;
	}
	
	function request()
        {
		$this->record["t_nombre"] = get_param('nombre');
		$this->record["t_codigo"] = get_param('codigo');
		$this->record["t_direccion"] = get_param('direccion');
                $this->record["t_email"] = get_param('email');
                $this->record["t_telefono"] = get_param('telefono');
                $this->record["n_activo"] = get_check('activo');
                
	}
        
        
}

?>