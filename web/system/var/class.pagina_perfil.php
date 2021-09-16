<?php

class PaginaPerfil extends SQL {

    var $error = SYS::FILE_NO_ERROR;

	function __construct()
	{
		$this->db = $this->connect_db();
		$this->init();				
	}
		
	function init()
        {
		$this->table_name = "pagina_perfil";
		
		$this->record["n_id_pagina"] = NULL;
                $this->record["n_id_perfil_web"] = NULL;

        }
	
	function request($id_pagina, $id_perfil_web)
        {
                $this->record["n_id_pagina"] = $id_pagina;
                $this->record["n_id_perfil_web"] = $id_perfil_web;
	}
}

?>