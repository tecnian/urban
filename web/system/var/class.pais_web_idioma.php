<?php

class PaisWebIdioma extends SQL {

    var $error = SYS::FILE_NO_ERROR;

	function __construct()
	{
		$this->db = $this->connect_db();
		$this->init();				
	}
		
	function init()
        {
		$this->table_name = "pais_web_idioma";
		
		$this->record["n_id_pais_web"] = NULL;
                $this->record["n_id_idioma"] = NULL;

        }
	
	function request($id_pais_web, $id_idioma)
        {
                $this->record["n_id_pais_web"] = $id_pais_web;
                $this->record["n_id_idioma"] = $id_idioma;
	}
}

?>