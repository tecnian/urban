<?php

class SliderItem extends SQL {

    var $error = SYS::FILE_NO_ERROR;

	function __construct()
	{
		$this->db = $this->connect_db();
		$this->init();				
	}
		
	function init() {
		$this->table_name = "slider_item";

		$this->record["n_id"] = NULL;           
                $this->record["n_id_slider"] = NULL;    
                $this->record["t_imagen"] = NULL;                    
                $this->record["n_orden"] = NULL;    
                $this->record["n_activo"] = NULL;    
                
	}
	
	function request()
        {                
                $this->record["n_id_slider"] = get_param('id_slider',0);                
                $this->record["n_orden"] = get_param('orden',0);
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

class SliderItemIdioma extends SQL {

        function __construct()
	{
		$this->db = $this->connect_db();
		$this->init();
	}

        function init()
        {            
		$this->table_name = "slider_item_idioma";

		$this->record["n_id_slider_item"] = NULL;
                $this->record["n_id_idioma"] = NULL;
                $this->record["t_titulo"] = NULL;    
		$this->record["t_texto"] = NULL;     
                $this->record["t_enlace"] = NULL;     
                $this->record["n_id_target"] = NULL;     
                $this->record["t_imagen"] = NULL;     
                $this->record["t_img_alt"] = NULL;     
                              
	}

        function request($id_slider_item, $id_idioma)
        {
		$filled = true;

                $this->record["n_id_slider_item"] = $id_slider_item;
                $this->record["n_id_idioma"] = $id_idioma;
                $this->record["t_titulo"] = get_param('titulo_'.$id_idioma); 
                $this->record["t_texto"] = get_param('texto_'.$id_idioma);      
                $this->record["t_enlace"] = get_param('enlace_'.$id_idioma); 
                $this->record["n_id_target"] = get_param('id_target_'.$id_idioma); 
                $this->record["t_img_alt"] = get_param('img_alt_'.$id_idioma);
                
                $this->record["t_imagen"] = $this->upload_file('imagen_'.$id_idioma);
                
                
                //Verificamos que los campos esten rellenados
                if (trim($this->record["t_texto"] != '')) $filled = true;  
                if (trim($this->record["t_enlace"] != '')) $filled = true;  
                                

                return($filled);
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