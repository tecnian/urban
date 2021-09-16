<?php

class CatalogoFoto extends SQL {

    var $error = SYS::FILE_NO_ERROR;

	function __construct()
	{
		$this->db = $this->connect_db();
		$this->init();				
	}
		
	function init() {
		$this->table_name = "catalogo_foto";

		$this->record["n_id"] = NULL;           
                $this->record["n_id_catalogo"] = NULL; 
                $this->record["n_id_categoria"] = NULL; 
                $this->record["t_imagen"] = NULL;   
                $this->record["n_principal"] = NULL;   
                $this->record["n_tamano"] = NULL;  
                $this->record["t_extension"] = NULL;   
                $this->record["n_orden"] = NULL;   
		
	}
	
	function request()
        {                
                $this->record["n_id_catalogo"] = get_param('id_catalogo',0);
                $this->record["n_id_categoria"] = get_param('id_categoria',0);
                $this->record["n_principal"] = get_check('principal');
                $this->record["n_tamano"] = get_param('tamano',0);
                $this->record["t_extension"] = get_param('extension');
                $this->record["n_orden"] = get_param('orden',0);
                
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

class CatalogoFotoIdioma extends SQL {

        function __construct()
	{
		$this->db = $this->connect_db();
		$this->init();
	}

        function init()
        {            
		$this->table_name = "catalogo_foto_idioma";

		$this->record["n_id_catalogo_foto"] = NULL;
                $this->record["n_id_idioma"] = NULL;    
                $this->record["t_titulo"] = NULL;  
                $this->record["t_texto"] = NULL;  
                $this->record["t_enlace"] = NULL;  
                $this->record["t_title"] = NULL;  
                $this->record["n_id_target"] = NULL;  
                $this->record["t_follow"] = NULL;  
                $this->record["t_img_alt"] = NULL;     
                $this->record["t_fichero"] = NULL;     
                              
	}

        function request($id_catalogo_foto, $id_idioma)
        {
		$filled = true;

                $this->record["n_id_catalogo_foto"] = $id_catalogo_foto;
                $this->record["n_id_idioma"] = $id_idioma;
                $this->record["t_titulo"] = get_param('titulo_'.$id_idioma);
                $this->record["t_texto"] = get_param('texto_'.$id_idioma);
                $this->record["t_enlace"] = get_param('enlace_'.$id_idioma);
                $this->record["t_title"] = get_param('title_'.$id_idioma);
                $this->record["n_id_target"] = get_param('id_target_'.$id_idioma,0);
                $this->record["t_follow"] = get_param('follow_'.$id_idioma);
                $this->record["t_img_alt"] = get_param('img_alt_'.$id_idioma);
                
                $this->record["t_fichero"] = $this->upload_file('fichero_'.$id_idioma);
                
                
                
                //Verificamos que los campos esten rellenados
                if (trim($this->record["t_titulo"] != '')) $filled = true;   
                if (trim($this->record["t_texto"] != '')) $filled = true;   
                if (trim($this->record["t_img_alt"] != '')) $filled = true;                  
                                

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
                
}


?>