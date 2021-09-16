<?php

class ContactoWeb extends SQL {

    var $error = SYS::FILE_NO_ERROR;

	function __construct()
	{
		$this->db = $this->connect_db();
		$this->init();				
	}
		
	function init() {
		$this->table_name = "contacto_web";

		$this->record["n_id"] = NULL;     
                $this->record["t_fecha"] = NULL;
                $this->record["t_nombre"] = NULL;
		$this->record["t_email"] = NULL;
		$this->record["t_telefono"] = NULL;
                $this->record["t_ip"] = NULL;
                $this->record["t_comentarios"] = NULL;
                $this->record["n_gestionado"] = NULL;
	}
	
	function request()
        {
		$this->record["t_fecha"] = get_param('fecha',NULL);
		$this->record["t_nombre"] = get_param('nombre',NULL);
		$this->record["t_email"] = get_param('email',NULL);
		$this->record["t_telefono"] = get_param('telefono',NULL);
                $this->record["t_ip"] = get_param('ip',NULL);
                $this->record["t_comentarios"] = get_param('comentarios',NULL);
                $this->record["n_gestionado"] = get_check('gestionado');                
	}
                
        
}

?>