<?php

class Usuario extends SQL {

    var $error = SYS::FILE_NO_ERROR;

	function __construct()
	{
		$this->db = $this->connect_db();
		$this->init();				
	}
		
	function init() {
		$this->table_name = "usuario";

		$this->record["n_id"] = NULL;
                $this->record["n_id_tipo"] = NULL;
                $this->record["t_nombre"] = NULL;
		$this->record["t_apellidos"] = NULL;
                $this->record["t_email"] = NULL;
		$this->record["t_password"] = NULL;
                $this->record["t_codigo"] = NULL;
                $this->record["n_id_documento"] = NULL;
                $this->record["t_nif"] = NULL;
                $this->record["t_empresa"] = NULL;
                $this->record["t_cif"] = NULL;
                $this->record["t_direccion"] = NULL;
                $this->record["t_numero"] = NULL;
                $this->record["t_piso"] = NULL;
                $this->record["t_puerta"] = NULL;
                $this->record["t_cod_postal"] = NULL;
                $this->record["n_id_poblacion"] = NULL;
                $this->record["t_poblacion"] = NULL;
                $this->record["n_id_provincia"] = NULL;
                $this->record["t_provincia"] = NULL;
                $this->record["n_id_pais"] = NULL;
                $this->record["t_pais"] = NULL;
                $this->record["t_telefono"] = NULL;
                $this->record["t_movil"] = NULL;
                $this->record["t_fax"] = NULL;
                $this->record["t_web"] = NULL;
                $this->record["n_id_tratamiento"] = NULL;
                $this->record["t_fecha_nac"] = NULL; 
                $this->record["n_newsletter"] = NULL;
                $this->record["t_foto"] = NULL;
                $this->record["t_fecha_alta"] = NULL;
                $this->record["n_activo"] = NULL;
                $this->record["n_ptje_descuento"] = NULL;
                $this->record["t_razon_social"] = NULL;
	}
	
	function request()
        {
		$this->record["n_id_tipo"] = get_param('id_tipo',0);
		$this->record["t_nombre"] = get_param('nombre');
		$this->record["t_apellidos"] = get_param('apellidos');
                $this->record["t_email"] = get_param('email');
		$this->record["t_password"] = get_param('password',NULL);
                $this->record["t_codigo"] = get_param('codigo');
                $this->record["n_id_documento"] = get_param('id_documento',0);
                $this->record["t_nif"] = get_param('nif');
                $this->record["t_empresa"] = get_param('empresa');
                $this->record["t_cif"] = get_param('cif');
                $this->record["t_direccion"] = get_param('direccion');
                $this->record["t_numero"] = get_param('numero');
                $this->record["t_piso"] = get_param('piso');
                $this->record["t_puerta"] = get_param('puerta');
                $this->record["t_cod_postal"] = get_param('cod_postal');
                $this->record["n_id_poblacion"] = get_param('id_poblacion',0);
                $this->record["t_poblacion"] = get_param('poblacion');
                $this->record["n_id_provincia"] = get_param('id_provincia',0);
                $this->record["t_provincia"] = get_param('provincia');
                $this->record["n_id_pais"] = get_param('id_pais',0);
                $this->record["t_pais"] = get_param('pais');
                $this->record["t_telefono"] = get_param('telefono');
                $this->record["t_movil"] = get_param('movil');
                $this->record["t_fax"] = get_param('fax');
                $this->record["t_web"] = get_param('web');
                $this->record["n_id_tratamiento"] = get_param('id_tratamiento',0);
                $this->record["t_fecha_nac"] = get_date('fecha_nac');
                $this->record["n_newsletter"] = get_check('newsletter');
                $this->record["t_fecha_alta"] = get_param('fecha_alta',NULL);                                
                $this->record["n_activo"] = get_check('activo');
                $this->record["n_ptje_descuento"] = get_param('ptje_descuento',NULL);   
                $this->record["t_razon_social"] = get_param('razon_social');
                
                //$this->record["t_foto"] = $this->upload_file('foto');
                //(activar esta linea solo cuando haya foto)
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