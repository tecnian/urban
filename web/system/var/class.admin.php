<?php

class Admin extends SQL {

    var $error = SYS::FILE_NO_ERROR;

	function __construct()
	{
		$this->db = $this->connect_db();
		$this->init();				
	}
		
	function init() {
		$this->table_name = "admin";

		$this->record["n_id"] = NULL;
                $this->record["n_id_perfil"] = NULL;
                $this->record["t_nombre"] = NULL;
		$this->record["t_usuario"] = NULL;
		$this->record["t_password"] = NULL;
                $this->record["t_email"] = NULL;
                $this->record["t_imagen"] = NULL;
                $this->record["n_activo"] = NULL;
	}
	
	function request()
        {
		$this->record["n_id_perfil"] = get_param('id_perfil',0);
		$this->record["t_nombre"] = get_param('nombre');
		$this->record["t_usuario"] = get_param('usuario');
		$this->record["t_password"] = get_param('password',NULL);
                $this->record["t_email"] = get_param('email');
                $this->record["n_activo"] = get_check('activo');
                
                $this->record["t_imagen"] = $this->upload_file('imagen');
	}
        
        function upload_file($name)
        {
            global $appFilesPathBack;

            $file_name = NULL;

            $_file = new FileManager();
            $_file->field = $name;
            $_file->path = $appFilesPathBack;
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