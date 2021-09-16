<?php

class Slider extends SQL {

    var $error = SYS::FILE_NO_ERROR;

	function __construct()
	{
		$this->db = $this->connect_db();
		$this->init();				
	}
		
	function init() {
		$this->table_name = "slider";

		$this->record["n_id"] = NULL;           
                $this->record["t_nombre"] = NULL;                    
                
	}
	
	function request()
        {                
                $this->record["t_nombre"] = get_param('nombre');                
	}                
        
}

?>