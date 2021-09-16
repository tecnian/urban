<?php

class Contenido extends SQL {

    var $error = SYS::FILE_NO_ERROR;

	function __construct()
	{
		$this->db = $this->connect_db();
		$this->init();				
	}
		
	function init() {
		$this->table_name = "contenido";

		$this->record["n_id"] = NULL;           
                $this->record["n_id_pagina"] = NULL;     
                $this->record["n_id_tipo"] = NULL;     
                $this->record["t_nombre"] = NULL;  
                $this->record["t_imagen"] = NULL;   
                $this->record["t_fichero"] = NULL;  
                $this->record["n_id_slider"] = NULL;     
                $this->record["n_destacado"] = NULL;  
                $this->record["n_orden"] = NULL;                   
                $this->record["n_activo"] = NULL;     
		
	}
	
	function request()
        {                
                $this->record["n_id_pagina"] = get_param('id_pagina',0);
                $this->record["n_id_tipo"] = get_param('id_tipo',0);   
                $this->record["t_nombre"] = get_param('nombre');   
                $this->record["n_id_slider"] = get_param('id_slider',0);
                $this->record["n_destacado"] = get_check('destacado');
                $this->record["n_orden"] = get_param('orden',0);
                $this->record["n_activo"] = get_check('activo');
                
                $this->record["t_imagen"] = $this->upload_file('imagen');
                $this->record["t_fichero"] = $this->upload_file('fichero');
                
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

class ContenidoIdioma extends SQL {

        function __construct()
	{
		$this->db = $this->connect_db();
		$this->init();
	}

        function init()
        {            
		$this->table_name = "contenido_idioma";

		$this->record["n_id_contenido"] = NULL;
                $this->record["n_id_idioma"] = NULL;
                $this->record["t_titulo"] = NULL;      
                $this->record["t_subtitulo"] = NULL;      
		$this->record["t_texto"] = NULL;    
                $this->record["t_texto_html"] = NULL;    
                $this->record["t_enlace"] = NULL;    
                $this->record["t_title"] = NULL;    
                $this->record["n_id_target"] = NULL;    
                $this->record["t_follow"] = NULL;    
                $this->record["t_video"] = NULL;    
                $this->record["t_fichero"] = NULL;   
                $this->record["t_imagen"] = NULL;      
                $this->record["t_img_alt"] = NULL;   
                              
	}

        function request($id_contenido, $id_idioma)
        {
		$filled = true;

                $this->record["n_id_contenido"] = $id_contenido;
                $this->record["n_id_idioma"] = $id_idioma;
                $this->record["t_titulo"] = get_param('titulo_'.$id_idioma);   
                $this->record["t_subtitulo"] = get_param('subtitulo_'.$id_idioma);   
                $this->record["t_texto"] = get_param('texto_'.$id_idioma);   
                $this->record["t_texto_html"] = get_param('texto_html_'.$id_idioma);   
                $this->record["t_enlace"] = get_param('enlace_'.$id_idioma);
                $this->record["t_title"] = get_param('title_'.$id_idioma);
                $this->record["n_id_target"] = get_param('id_target_'.$id_idioma,0);
                $this->record["t_follow"] = get_param('follow_'.$id_idioma);
                $this->record["t_video"] = get_param('video_'.$id_idioma);  
                $this->record["t_img_alt"] = get_param('img_alt_'.$id_idioma);
                
                $this->record["t_fichero"] = $this->upload_file('fichero_'.$id_idioma);
                $this->record["t_imagen"] = $this->upload_file('imagen_'.$id_idioma);
                                                
                
                //Verificamos que los campos esten rellenados
                if (trim($this->record["t_titulo"] != '')) $filled = true;  
                if (trim($this->record["t_subtitulo"] != '')) $filled = true;  
                if (trim($this->record["t_texto"] != '')) $filled = true;  
                if (trim($this->record["t_texto_html"] != '')) $filled = true;  
                if (trim($this->record["t_enlace"] != '')) $filled = true;  
                if (trim($this->record["t_video"] != '')) $filled = true;  
                                

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