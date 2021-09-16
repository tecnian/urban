<?php
//***********************************************
//   Evitar pujar fixers PHP
//***********************************************

class FileManager {
	var $file;
	var $path;
        var $field;
	var $max_size = 0;
	var $mode = SYS::FILE_MODE_NONE;	
	var $error = SYS::FILE_NO_ERROR;
	var $rename = SYS::FILE_RENAME_NONE;
        var $name;
        var $trans_color = array();
        var $root_extract = false;
        

	//funcion que valida el formato y tama�o m�ximo para subir un file
	function validate_format($file_type, $file_size)
        {
		$this->error = SYS::FILE_NO_ERROR;

		if ($this->mode == SYS::FILE_MODE_IMG)
                {
			if (!(strpos($file_type, SYS::FILE_TYPE_GIF) || strpos($file_type, SYS::FILE_TYPE_JPEG) || strpos($file_type, SYS::FILE_TYPE_PNG)))
                        {
				$this->error = SYS::FILE_ERROR_FORMAT;
			}
		}
		if ($this->mode == SYS::FILE_MODE_PDF)
                {
			if (!(strpos($file_type, SYS::FILE_TYPE_PDF)))
                        {
				$this->error = SYS::FILE_ERROR_FORMAT;
			}
		}
		if ($this->mode == SYS::FILE_MODE_DOC)
                {
			if (!(strpos($file_type, SYS::FILE_TYPE_DOC))) {
				$this->error = SYS::FILE_ERROR_FORMAT;
			}
		}
		if ($this->max_size > 0)
                {
                    if ($file_size > $this->max_size)
                    {
                            $this->error = SYS::FILE_ERROR_SIZE;
                    }
                }
                
                if (($file_type == 'text/php') || ($file_type == 'application/octet-stream'))
                {
                    $this->error = SYS::FILE_ERROR_FORMAT;
                }
	}

	//Funcion que elimina file del servidor
	function delete() {

            $status = false;
            if (!empty($this->file))
            {
		if (file_exists($this->file))
                {
		  unlink($this->file);
                  $status = true;
		}
            }          

            return($status);
            
	}

	//funci�n que renombra el nombre de un file si ya existe
	function set_name($name)
        {
		$exists = true;
                $new_name = $name;
                $number = 1;

		while ($exists) {
			$exists = false;
			if (file_exists($this->path.'/'.$new_name))
                        {
				$exists = true;
                                $number++;

				$extension = explode(".",$name);
				$num = count($extension) - 1;
				$new_name = $extension[0]."_".$number.".".$extension[$num];
			}
		}

		return($new_name);
	}

        //funcion que devuelve el nombre del fichero a partir de la ruta completa
	function get_name()
        {
		$rev = strrev($this->file);
		$parts = explode("/",$rev);

		$name = strrev($parts[0]);

		return($name);
	}

        //funcion que separa nombre y extensi�n
        function get_parts($name)
        {
            $parts = array();

            $aux_name = strrev($name);
            $aux_parts = explode(".",$aux_name);
            
            $parts['extension'] = strrev($aux_parts[0]);

            $parts['filename'] = '';
            for($i = 1; $i < count($aux_parts); $i++)
            {
                $parts['filename'] = strrev($aux_parts[$i]).$parts['filename'];
            }

            return($parts);
        }
        
        //funcion que devuelve la extensi�n del fichero a partir del nombre
        function get_extension($name)
        {
            $parts = $this->get_parts($name);
            $extension = $parts['extension'];

            return($extension);
        }

        //funcion que devuelve el nombre del fichero sin la extensi�n
        function get_filename($name)
        {
            $parts = $this->get_parts($name);
            $filename = $parts['filename'];

            return($filename);
        }

	//funcion para subir un fichero al servidor
	function upload($params = '')
        {            
            $tmp_name = '';
            
            if (isset($_FILES[$this->field]))
            {                	                                                        
                if ($_FILES[$this->field]["name"] != '')
                {                    	                                                                    
                   $this->validate_format($_FILES[$this->field]["type"], $_FILES[$this->field]["size"]);

                   if ($this->error == SYS::FILE_NO_ERROR)
                   {                                                                                                                       
                        $tmp_name = $_FILES[$this->field]["name"];

                        if ($this->rename == SYS::FILE_RENAME_NONE)
                        {                            
                            $this->name = str_replace(' ','',replace_accent($tmp_name));
                        }
			if ($this->rename == SYS::FILE_RENAME_SUFFIX)
                        {                            
                            $tmp_name = str_replace(' ','',$tmp_name);

                            $name = $this->get_filename($tmp_name);
                            $ext = $this->get_extension($tmp_name);

                            $name = normalize_filename($name);

                            $name = $name.'.'.$ext;  

                            $this->name = $this->set_name($name);
			}
                        if ($this->rename == SYS::FILE_RENAME_FIXED)
                        {                            
                            $base_name = $params['base_name'];
                            $this->name = str_replace(' ','',$base_name).'.'.$this->get_extension($tmp_name);
			}
                        if ($this->rename == SYS::FILE_RENAME_CUSTOM)
                        {
                            $tmp_filename = $this->get_filename($tmp_name);
                            $this->name = set_custom_filename($tmp_filename, $params).'.'.$this->get_extension($tmp_name);
			}
                        if ($this->rename == SYS::FILE_RENAME_AUTO)
                        {                                                                                    
                            $tmp_name = str_replace(' ','',$tmp_name);

                            $name = $this->get_filename($tmp_name);
                            $ext = $this->get_extension($tmp_name);
                            
                            $name = uniqid();
                            
                            $name = $name.'.'.$ext;

                            $this->name = $this->set_name($name);
			}
                        
			$server_file = $this->path.'/'.$this->name;  
                                               
			if(!copy($_FILES[$this->field]["tmp_name"], $server_file))
                        {                              
                              $this->error = SYS::FILE_ERROR_UPLOAD;
                        }                    
                        
                        
                        if ($this->mode==SYS::FILE_MODE_ZIP)
                        {
                               
                            $foldername = $this->name;
                            $foldername = substr($foldername, 0, -4);
                            
                            $folderpath = $this->path;
                            
                            if (!$this->root_extract)
                            {
                                $folderpath = $this->path.'/'.$foldername;
                            }
                            
                            $zip = new ZipArchive;
                            
                            $res = $zip->open($server_file);
                            
                            if ($res === true) 
                            {
                                if (!is_dir($folderpath))
                                {
                                    mkdir($folderpath);
                                }

                                $zip->extractTo($folderpath);
                                
                                $zip->close();
                            }
                       }    
		   }
		}
            }
	}

	//Funcion para redimensionar una imagen
	function change_image($max_w, $max_h, $img_cut = false, $fixed = SYS::FILE_IMG_FIXED_HORIZONTAL, $mode = SYS::FILE_IMG_MODE_SHOW, $img_saved = '',$delete_source = true)
	{
            $img_source = $this->file;           

            //dimensiones originales
	    list($width, $height, $type) = getimagesize($img_source);           

            $new_width = $width;
            $new_height = $height;
            $cut_w = 0;
            $cut_h = 0;

            //nuevas dimensiones
            if ($max_w <= $max_h)
            {
		if ($max_w < $width)
		{
                	$ratio = $max_w / $width;
			$new_width = $max_w;
			$new_height = $height * $ratio;
		}
		elseif ($max_h < $height)
		{
			$ratio = $max_h / $height;
			$new_height = $max_h;
			$new_width = $width * $ratio;
		}
            }
            else
            {
		if ($max_h < $height)
		{
			$ratio = $max_h / $height;
			$new_height = $max_h;
			$new_width = $width * $ratio;
		}
		elseif ($max_w < $width)
		{
			$ratio = $max_w / $width;
			$new_width = $max_w;
			$new_height = $height * $ratio;
		}
            }


            if ($img_cut)
            {
                //Recortamos la imagen
                if ($fixed == SYS::FILE_IMG_FIXED_HORIZONTAL)
                {
                        $new_width = $max_w;
                        $new_height = $new_width * $height/$width;
                }
                else
                {
                        $new_height = $max_h;
                        $new_width = $new_height * $width/$height;
                }

                if (($new_height > $max_h) && ($max_h > 0))
                {
                        $cut_h = $new_height - $max_h;
                }
                if (($new_width > $max_w) && ($max_w > 0))
                {
                        $cut_w = $new_width - $max_w;
                }
            }

            // Cargamos la imagen
            $img_new = imagecreatetruecolor($new_width-$cut_w, $new_height-$cut_h);

            $img_ini = '';
            switch ($type)
            {
		case SYS::IMG_TYPE_GIF:
			$img_ini = imagecreatefromgif($img_source);
			break;

		case SYS::IMG_TYPE_JPEG:
			$img_ini = imagecreatefromjpeg($img_source);
			break;

		case SYS::IMG_TYPE_PNG:
			$img_ini = imagecreatefrompng($img_source);

                        //aplicamos color transparencia si se ha definido valor
                        if (count($this->trans_color) > 0)
                        {
                            $id_color_trans = imagecolorallocate($img_new, $this->trans_color[0], $this->trans_color[1], $this->trans_color[2]);
                            imagefill($img_new, 0, 0, $id_color_trans);
                            imagecolortransparent($img_new, $id_color_trans); 
                        }
                        
                        break;
            }

            // Redimensionamos
            imagecopyresampled($img_new, $img_ini, 0, 0, 0, 0, $new_width-$cut_w, $new_height-$cut_h, $width-$cut_w, $height-$cut_h);

            if ($mode == SYS::FILE_IMG_MODE_SHOW)
            {
                //Visualizamos la imagen redimensionada
                switch ($type)
                {
                    case SYS::IMG_TYPE_GIF:
                            header("Content-type: image/gif");
                            imagegif($img_new);
                            break;

                    case SYS::IMG_TYPE_JPEG:
                            header("Content-type: image/jpeg");
                            imagejpeg($img_new);
                            break;

                    case SYS::IMG_TYPE_PNG:
                            header("Content-type: image/png");
                            imagepng($img_new);
                            break;
                }

            }
            elseif ($mode == SYS::FILE_IMG_MODE_SAVE)
            {
                // Guardamos la nueva imagen
                switch ($type)
                {
                    case SYS::IMG_TYPE_GIF:
                            imagegif($img_new, $img_saved);
                            break;

                    case SYS::IMG_TYPE_JPEG:
                            imagejpeg($img_new, $img_saved);
                            break;

                    case SYS::IMG_TYPE_PNG:
                            imagepng($img_new, $img_saved);
                            break;
                }

                if ($delete_source)
                {
                    //Eliminamos la imagen original
                    $this->delete();
                }
            }

            imagedestroy($img_new);
        }

        //funcion que devuelve un array con la lista de ficheros de un directorio
        function get_file_list($extension = true)
        {
            $list = array();
            $dir = dir($this->path);

            while ($file = $dir->read())
            {
                if (($file != '.') && ($file != '..'))
                {
                    $value = $file;

                    if (!$extension)
                    {
                        //quitamos la extensi�n del fichero
                        $ext = '.'.$this->get_extension($file);
                        $value = str_replace($ext,'',$file);
                    }
                    $key = $value;

                    $list[$key] = $value;
                }
            }

            return ($list);
        }
        
        //funcion para descargar un fichero
        function download()
            {
                $file = $this->file;

                header("Pragma: public");
                header("Expires: 0");
                header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
                header("Content-Type: application/force-download");
                header("Content-Type: application/octet-stream");
                header("Content-Type: application/download");
                header("Content-Disposition: attachment; filename=".basename($file).";");
                header("Content-Transfer-Encoding: binary");
                header("Content-Length: ".filesize($file));

                $f = fopen("$file", "r");
                fpassthru($f);
                fclose($f);
                exit();

            }

        //funcion para crear un ZIP de los ficheros de una carpeta
        function create_zip($folder,$zip_file,$delete_files = false)
        {
            $_zip = new ZipArchive();

            if (file_exists($folder.'/'.$zip_file))
            {
                unlink($folder.'/'.$zip_file);
            }

            if ($_zip->open($folder.'/'.$zip_file,ZIPARCHIVE::CREATE) === true)
            {
                $dir = dir($folder);

                while ($file = $dir->read())
                {
                    if ( ($file != '.') && ($file != '..'))
                    {
                        $_zip->addFile($folder.'/'.$file,$file);
                    }
                }

                $_zip->close();


                if ($delete_files)
                {
                    //borramos ficheros
                    $dir = dir($folder);

                    while ($file = $dir->read())
                    {
                        if ( ($file != '.') && ($file != '..'))
                        {
                            $arr_file = explode('.',$file);

                            if ($arr_file[1] != 'zip')
                            {
                                unlink($folder.'/'.$file);
                            }
                        }
                    }
                }


            }
            else
            {
                $this->error = SYS::FILE_ERROR_ZIP;
            }
        }
}

?>