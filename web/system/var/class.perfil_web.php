<?php

class PerfilWeb extends SQL {

    var $error = SYS::FILE_NO_ERROR;

	function __construct()
	{
		$this->db = $this->connect_db();
		$this->init();				
	}
		
	function init() {
		$this->table_name = "perfil_web";

		$this->record["n_id"] = NULL;               
                $this->record["t_nombre"] = NULL;		
                $this->record["t_imagen"] = NULL;
                $this->record["t_class_name"] = NULL;
                $this->record["n_activo"] = NULL;
	}
	
	function request()
        {
		$this->record["t_nombre"] = get_param('nombre');
                $this->record["t_class_name"] = get_param('class_name',NULL);
		$this->record["n_activo"] = get_check('activo');
                
                $this->record["t_imagen"] = $this->upload_file('imagen');
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

?>