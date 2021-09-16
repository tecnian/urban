<?
        /* Version 2.2:
         *
         * Export:  exportacion a Excel
         */


        /******* Clase exportacion de datos ********/

	class Export
	{            
            const ITEM_NAME = 'name';
            const ITEM_TITLE = 'title';
            const ITEM_LENGTH = 'length';

            var $show_title = false;
            var $apply_length = false;
            var $separator = ';';
            var $xml_file;
            var $new_xml_file;
            var $csv_file;         
            var $show_caption = false;		
            var $root_xml = '';
            var $node_xml = '';	
            var $title = '';	
            

            function get_xml_model()
            {
                $fields = array();
                $k = 0;              

                //abrimos el modelo xml
                $xml = simplexml_load_file($this->xml_file);

                //leemos los nodos secundarios (items)
                $nodes = $xml->children();

                foreach ($nodes as $node)
                {
                    //leemos los elementos de cada item
                    $items = $node->children();
                    foreach ($items as $key => $value)
                    {
                        $fields[$k][$key] = $value;
                    }
                    $k++;
                }

                return($fields);
            }

            function add_element($elements = array())
            {
                $_xmldoc = New DOMDocument();

                if (count($elements) > 0)
                {                    
                    $_xmldoc->load($this->xml_file);

                    $main_node = $_xmldoc->firstChild;

                    $node = $_xmldoc->createElement("item");
                    $node = $main_node->appendChild($node);

                    for($k = 0; $k < count($elements); $k++)
                    {
                        $subnode = $_xmldoc->createElement($elements[$k]['tagname'],$elements[$k]['value']);
                        $subnode = $node->appendChild($subnode);
                    }

                    if (!empty($this->new_xml_file))
                    {
                        $_xmldoc->save($this->new_xml_file);
                    }
                }
            }

            function export_data($data, $caption = array())
            {
                $line = '';
                $title = '';
                $field_name = '';
                $field_value = '';
                $field_length = 0;
                
                //leemos el modelo de datos
				$model = $this->get_xml_model();

                //abrimos el fichero
                $file = fopen($this->csv_file, "w");
				
				//cabecera informacion
                if ($this->show_caption)
                {                    
                    for($n = 0; $n < count($caption); $n++)
                    {
                        $cap = '';

                        for($k = 0; $k < count($model); $k++)
                        {
                            if (isset($caption[$n][$k]))
                            {
                                $cap .= $caption[$n][$k];                                
                            }
                            else
                            {
                                $cap .= '';
                            }

                            if ($k < count($model) - 1)
                            {
                                $cap .= $this->separator;
                            }
                        }
                        $cap .= chr(13).chr(10);                       
                        fwrite($file, $cap);
                    }

                    //linea en blanco
                    $cap = '';
                    for($k = 0; $k < count($model); $k++)
                    {
                        $cap .= '';

                        if ($k < count($model) - 1)
                        {
                            $cap .= $this->separator;
                        }                        
                    }
                    $cap .= chr(13).chr(10);
                    fwrite($file, $cap);
                }


                if ($this->show_title)
                {
                    //leemos los titulos y creamos una linea
                    for($k = 0; $k < count($model); $k++)
                    {
                        $title .= $model[$k][self::ITEM_TITLE];
                        if ($k < count($model) - 1)
                        {
                            $title .= $this->separator;
                        }                        
                    }
                    $title .= chr(13).chr(10);
                    fwrite($file, $title);
                }

                //leemos el array de datos y creamos las lineas del archivo
                for($i = 0; $i < count($data); $i++)
                {
                    $line = '';
                    
                    //Guardamos el valor de cada campo en la linea
                    for($j = 0; $j < count($model); $j++)
                    {
                        $field_name = $model[$j][self::ITEM_NAME];
                        $field_value = '';
                        if (isset($data[$i]["$field_name"]))
                        {
                            $field_value = $data[$i]["$field_name"];
                        }
                        
                        if ($this->apply_length)
                        {
                            $field_length = $model[$j][self::ITEM_LENGTH];
                            $field_value = substr($field_value, 0, $field_length);
                            $field_value = str_pad($field_value, $field_length, " ", STR_PAD_LEFT);
                        }
                        $line .= $field_value;
                        
                        if ($j < count($model) - 1)
                        {
                            $line .= $this->separator;
                        }                        
                    }
                    if ($i < count($data) - 1)
                    {
                        $line .= chr(13).chr(10);
                    }
                    fwrite($file, $line);                   
                }

                //cerramos el fichero
                fclose($file);                               
            }
			
	    function export_xml($data)
            {
                $_xml = new DomDocument("1.0","UTF-8");

                $root = $_xml->createElement($this->root_xml);
                $root = $_xml->appendChild($root);


                //leemos el modelo de datos
	        $model = $this->get_xml_model();


                //leemos el array de datos y creamos las lineas del archivo
                for($i = 0; $i < count($data); $i++)
                {
                    $node = $_xml->createElement($this->node_xml);
                    $node = $root->appendChild($node);

                    for($j = 0; $j < count($model); $j++)
                    {
                        $field_name = $model[$j][self::ITEM_NAME];
                        $field_value = $data[$i]["$field_name"];
                        
                        $item = $_xml->createElement($field_name, $field_value);
                        $item = $node->appendChild($item);
                    }

                }

                //guardamos el fichero
                $_xml->formatOut=true;

                $strings_xml = $_xml->saveXML();
                $_xml->save($this->csv_file);
               
            }
            
            function export_excel($data,$assoc = true)
            {
                $objPHPExcel = new PHPExcel();
                
                $objPHPExcel->getProperties()->setTitle($this->title);
                
                $row = 1;
                $col = 0;
                
                
                if ($assoc == true)
                {
                    /* La estructura esta asociada al fichero xml */
                    
                    
                    //leemos el modelo de datos
                    $model = $this->get_xml_model();


                    if ($this->show_title)
                    {
                        //titulos
                        for($j = 0; $j < count($model); $j++)
                        {
                            $title = $model[$j][self::ITEM_TITLE];

                            $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow($col, $row, $title);

                            $col++;
                        }

                        $row++;
                        $col = 0;
                    }


                    //datos

                    for($i = 0; $i < count($data); $i++)
                    {
                        for($j = 0; $j < count($model); $j++)
                        {
                            $field_name = $model[$j][self::ITEM_NAME];
                            $field_value = '';
                            
                            if (isset($data[$i]["$field_name"]))
                            {
                                $field_value = $data[$i]["$field_name"];
                            }

                            $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow($col, $row, $field_value);

                            $col++;                        
                        }

                        $row++;
                        $col = 0;
                    }
                    
                }
                
                if ($assoc == false)
                {
                    /* La estructura viene definida en el array de datos */
                    
                    for($i = 0; $i < count($data); $i++)
                    {
                        for ($n = 0; $n < count($data[$i]); $n++)
                        {
                            $field_value = $data[$i][$n];
                            
                            $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow($col, $row, $field_value);
                            
                            $col++;  
                        }
                        
                        $row++;
                        $col = 0;
                    }
                }
                
                
                //$objPHPExcel->getActiveSheet()->setTitle($this->title);
                $objPHPExcel->setActiveSheetIndex(0);

                $xls_file = $this->csv_file;
                
                header('Content-Type: application/vnd.ms-excel');
                header('Content-Disposition: attachment;filename="'.$xls_file.'"');
                header('Cache-Control: max-age=0');

                $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
                $objWriter->save('php://output');
                
                exit;
                
            }

            function open()
            {
                $csv = $this->csv_file;

                header("Pragma: public");
                header("Expires: 0");
                header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
                header("Content-Type: application/force-download");
                header("Content-Type: application/octet-stream");
                header("Content-Type: application/download");                
                header("Content-Disposition: attachment; filename=".basename($csv).";");
                header("Content-Transfer-Encoding: binary");
                header("Content-Length: ".filesize($csv));

                $file = fopen("$csv", "r");
                fpassthru($file);
                fclose($file);
                exit();
                
            }
            
        }

        /******* Clase importacion de datos ********/

        class Import
	{
            const ITEM_NAME = 'name';
            const ITEM_TITLE = 'title';
            const ITEM_FORMAT = 'format';
            const ITEM_MIN_LENGTH = 'min_length';
            const ITEM_MAX_LENGTH = 'max_length';
            const ITEM_REQUIRED = 'required';

            //**** Codificaci�n valores *******
            //Format:   T -> Texto
            //          Tt -> Texto (solo alfanumerico)
            //          Tn -> Texto (solo caracteres numericos
            //          N -> Numerico (sin decimales)
            //          Nx -> Numerico con x decimales
            //
            //Required: S -> obligatorio
            //          N (o sin valor) -> no obligatorio

            var $has_title = true;
            var $separator = ';';
            var $xml_file;
            var $data_file;
            var $errors = array();
            var $msg_err = array();
            var $overwrite = true;

            function get_xml_model()
            {
                $fields = array();
                $k = 0;

                //abrimos el modelo xml
                $xml = simplexml_load_file($this->xml_file);

                //leemos los nodos secundarios (items)
                $nodes = $xml->children();

                foreach ($nodes as $node)
                {
                    //leemos los elementos de cada item
                    $items = $node->children();
                    foreach ($items as $key => $value)
                    {
                        $fields[$k][$key] = $value;
                    }
                    $k++;
                }

                return($fields);
            }

            function get_data_file()
            {
                $file = file($this->data_file);

                if ($file)
                {
                    //inicializamos el array de errores
                    for($i = 0; $i < count($file); $i++)
                    {
                        $this->errors[$i] = '';
                    }

                }

                return ($file);
            }

            function main_validation($data_file, $model)
            {
                $valid = true;

                //Verificamos que el fichero tenga contenido
                if (!isset($data_file[0]))
                {
                    $valid = false;
                }
                //Verificamos el num. de campos
                else
                {
                    $fields = explode($this->separator,$data_file[0]);   
                    if (count($fields) != count($model))
                    {
                        $valid = false;
                    }
                    //Verificamos que el fichero contenga registros
                    else
                    {
                        if ($this->has_title && count($data_file) < 2)
                        {
                            $valid = false;
                        }
                        elseif (count($data_file) < 1)
                        {
                            $valid = false;
                        }
                    }
                }
                return ($valid);
            }

            function line_validation($fields, $model, $line)
            {
                $valid = true;

                //num. de linea
                $n = $line;
                if ($this->has_title)
                {
                    $n = $line - 1;
                }

                for($i = 0; $i < count($model); $i++)
                {
                    if (isset($fields[$i]))
                    {
                        $value = trim($fields[$i]);
                        $error = false;

                        $format = NULL;
                        $min_length = NULL;
                        $max_length = NULL;
                        $required = NULL;

                        //**** validacion obligatorio ****

                        if (isset($model[$i][self::ITEM_REQUIRED]))
                        {
                            $required = $model[$i][self::ITEM_REQUIRED];

                            if ($required == 'S')
                            {
                                if (empty($value))
                                {
                                    $valid = false;
                                    $error = true;
                                    $this->errors[$n] .= $this->add_error_info($model[$i][self::ITEM_TITLE], self::ITEM_REQUIRED);
                                }
                            }
                        }

                        //**** validacion de formato ****
                        if (!$error)
                        {
                            if (isset($model[$i][self::ITEM_FORMAT]))
                            {
                                $format = $model[$i][self::ITEM_FORMAT];

                                $num_expr = '/[0-9]/';

                                switch ($format)
                                {
                                    case 'T':
                                        //No es necesaria validacion
                                        break;

                                    case 'Tt':
                                        if (preg_match($num_expr, $value))
                                        {
                                            $valid = false;
                                            $error = true;
                                            $this->errors[$n] .= $this->add_error_info($model[$i][self::ITEM_TITLE], self::ITEM_FORMAT);
                                        }
                                        break;

                                    case 'Tn':
                                        if (!empty($value))
                                        {
                                            if (!is_numeric($value))
                                            {
                                                $valid = false;
                                                $error = true;
                                                $this->errors[$n] .= $this->add_error_info($model[$i][self::ITEM_TITLE], self::ITEM_FORMAT);
                                            }
                                        }
                                        break;

                                    case 'N':
                                        if (!is_numeric($value))
                                        {
                                            $valid = false;
                                            $error = true;
                                            $this->errors[$n] .= $this->add_error_info($model[$i][self::ITEM_TITLE], self::ITEM_FORMAT);
                                        }
                                        break;
                                        
                                    case 'D':
                                        if (!is_date($value))
                                        {
                                            $valid = false;
                                            $error = true;
                                            $this->errors[$n] .= $this->add_error_info($model[$i][self::ITEM_TITLE], self::ITEM_FORMAT);
                                        }
                                        break;

                                    default:
                                        //caso Nx
                                        if (!is_numeric(str_replace(',','.',$value)))
                                        {
                                            $valid = false;
                                            $error = true;
                                            $this->errors[$n] .= $this->add_error_info($model[$i][self::ITEM_TITLE], self::ITEM_FORMAT);
                                        }
                                        break;
                                }
                            }
                        }

                        //**** validacion longitud minima ****

                        if (!$error)
                        {
                            if (isset($model[$i][self::ITEM_MIN_LENGTH]))
                            {
                                $min_length = $model[$i][self::ITEM_MIN_LENGTH];

                                if ($format != 'T' && $format != 'Tn' && $format != 'Tt')
                                {
                                    $value = str_replace(",",".",$value);
                                    if ($value < $min_length)
                                    {
                                        $valid = false;
                                        $this->errors[$n] .= $this->add_error_info($model[$i][self::ITEM_TITLE], self::ITEM_MIN_LENGTH);
                                    }
                                }
                                else
                                {
                                    if ($required != 'S' && strlen($value) == 0)
                                    {
                                        //si el campo no es obligatorio aceptamos que tenga longitud 0
                                    }
                                    else
                                    {
                                        if (strlen($value) < $min_length)
                                        {
                                            $valid = false;
                                            $this->errors[$n] .= $this->add_error_info($model[$i][self::ITEM_TITLE], self::ITEM_MIN_LENGTH);
                                        }
                                    }
                                }
                            }
                        }

                        //**** validacion longitud maxima ****

                        if (!$error)
                        {
                            if (isset($model[$i][self::ITEM_MAX_LENGTH]))
                            {
                                $max_length = $model[$i][self::ITEM_MAX_LENGTH];

                                if ($format != 'T' && $format != 'Tn' && $format != 'Tt')
                                {
                                    if ($value > $max_length)
                                    {
                                        $valid = false;
                                        $this->errors[$n] .= $this->add_error_info($model[$i][self::ITEM_TITLE], self::ITEM_MAX_LENGTH);
                                    }
                                }
                                else
                                {
                                    if (strlen($value) > $max_length)
                                    {
                                        $valid = false;
                                        $this->errors[$n] .= $this->add_error_info($model[$i][self::ITEM_TITLE], self::ITEM_MAX_LENGTH);
                                    }
                                }
                            }
                        }
                    }
                }

                return ($valid);
            }

            function add_error_info($title, $type)
            {
               $info = '<b>'.$title.'</b>:  '.$this->msg_err[$type].'<br/>';

               return ($info);
            }

            function import_data($row, $_data, $condition = '', $compare_by = '')
            {
                $n = 1;
                if ($this->has_title)
                {
                    $n++;
                }
                
                for($i = 0; $i < count($row); $i++)
                {
                    if (empty($compare_by))
                    {
                        if (!empty($condition))
                        {
                            $cond = sprintf($condition, $i + $n);

                            if (!$_data->record_exists($cond))
                            {
                                $_data->record = $row[$i];
                                $_data->insert_record();
                            }
                        }
                        else
                        {
                            $_data->record = $row[$i];
                            $_data->insert_record();
                        }
                    }
                    else
                    {
                        //comparamos información del listado y la BD

                        $cond = sprintf($condition, $row[$i][$compare_by]);  

                        if (!$_data->record_exists($cond) || !$this->overwrite)
                        {
                            $_data->record = $row[$i];
                            $_data->insert_record();
                        }
                        else
                        {
                            $_data->record = $row[$i];
                            $_data->update_record($cond);                            
                        }

                    }
                }
            }

            function file_to_array()
            {
               $row = array();
               $data_file = $this->get_data_file();

               $ini = 0;
               if ($this->has_title) $ini = 1;

               for($i = 0; $i < count($data_file) - $ini; $i++)
               {
                   $n = $i + $ini;

                   $fields = explode($this->separator,$data_file[$n]);

                   for($j = 0; $j < count($fields); $j++)
                   {
                       $row[$i][$j] = $fields[$j];
                   }                                           
               }

               return ($row);
           }

        }

        /******* Clase valores m�ltiples ********/

	class MultiValue extends SQL
	{
            const MODE_TABLE = 1;
            const MODE_ARRAY = 2;

            var $mode = self::MODE_TABLE;
            var $html_element;
            var $prefix = 'div_form_';

            function __construct()
            {
		$this->db = $this->connect_db();
            }

            function show_checkboxes($main_table, $sub_table, $sub_field_id, $condition = '' ,$main_field_id = '', $main_field_value = '', $main_condition = '', $inner = false)
            {
                //$main_table: nombre tabla principal u objeto array (ej: propiedades)
                //$sub_table: nombre tabla relacionada (ej: productos_propiedades)
                //$sub_field_id: nombre del campo identificador en la tabla relacionada (ej: id_propiedad)
                //$condition: condicion que se cumple en la tabla relacionada (ej: id_producto = 1)
                //$main_field_id: nombre del campo identificador en la tabla principal (ej: id)
                //$main_field_value: nombre del campo en la tabla principal que se usa para mostrar el nombre del valor (ej: nombre)

                $html = '';

                if ($this->mode == self::MODE_TABLE)
                {
                    //Los valores principales estan en una tabla
                    if ($inner == false)
                    {
                        $sql = "SELECT * FROM $main_table";
                    }
                    else
                    {
                        //en este caso pasamos directamente una consulta
                        $sql = $main_table;
                    }

                    //$sql = "SELECT * FROM $main_table";
                    if (!empty($main_condition))
                    {
                        $sql .= " WHERE $main_condition";
                    }                    
                    $result = mysqli_query($this->db,$sql);

                    while ($row = mysqli_fetch_array($result))
                    {
                        $html .= $this->draw_checkbox($sub_table, $sub_field_id, $row[$main_field_id], $row[$main_field_value], $condition);
                    }
                }
                else
                {
                    //Los valores principales estan en un array
                    $n = 0;
                    foreach (array_keys($main_table) as $key)
                    {                        
                        $value = $main_table[$key];

                        $html .= $this->draw_checkbox($sub_table, $sub_field_id, $key, $value, $condition);

                        $n++;
                    }
                }

                return ($html);
            }

            function draw_checkbox($sub_table, $sub_field_id, $id, $value, $condition = '')
            {
                $html = '';
                $checked = '';
                $name = $sub_table."_".$id;

                $sql = "SELECT * FROM $sub_table WHERE $sub_field_id = $id";
		if (!empty($condition))
                {
                    $sql .= " AND $condition";
		}

                $result = mysqli_query($this->db,$sql);

                if ($row = mysqli_fetch_array($result))
                {
                    $checked = 'checked';
		}

                $html = sprintf($this->html_element, $name, $name, $checked, $value);

                return ($html);                
            }

            function get_checkboxes($_data, $sub_field_id, $data_field_id, $data_id, $condition = '')
            {
                //$data: clase que representa los datos de tabla relacionada
                //$sub_field_id: nombre campo identificador en tabla relacionada, relacionado con tabla principal (ej: id_propiedad)                
                //$data_field_id: nombre campo identificador en tabla relacionada, relacionado con tabla de datos (ej: id_producto)
                //$data_id: valor del identificador ("id_producto") de la tabla de datos
                //$condition: condicion que se cumple en la tabla relacionada para eliminar los datos inicialmente (ej: id_producto = 1)

                $table_name = $_data->table_name;                
                $data_field = substr($data_field_id,2,strlen($data_field_id));

                $sql="DELETE FROM $table_name WHERE $data_field = $data_id";
                if (!empty($condition))
                {
                    $sql .= " AND ".$condition;
                }
                $result = mysqli_query($this->db,$sql);

                //Leemos los checkbox del formulario
                foreach($_REQUEST as $name => $value)
                {                                        
                    if (strpos($name,$table_name."_") !== false)
                    {
                        $items = explode('_', $name);
                        $id_item = $items[count($items)-1];                        
                        
                        //Guardamos los valores seleccionados
                        if ($value == true)
                        {                                                        
                            $_data->record[$sub_field_id] = $id_item;
                            $_data->record[$data_field_id] = $data_id;
                            
                            $_data->insert_record(SYS::INSERT_NO_AUTO);
                        }
                    }
                }

            }

            // crea un array con los elementos que deben mostrarse
            // (esta funci�n est� asociada a la libreria javascript "div_form")
            function create_elements($query)
            {
                //El primer campo de la consulta debe corresponder al ID
                //El resto de campos se asignaran al valor de los elementos. En la sintaxis 
                //de la consulta debe respetarse el mismo orden de los elementos en el formulario.
                
                //array bidimensional:
                //"id": guarda el valor del ID
                //"html": guarda el c�digo html de los elementos
                $elements = array();

                //array para guardar el valor de todos los campos
                $values = array();
                
                $result = mysqli_query($this->db,$query);
                $n = 0;
                while ($row = mysqli_fetch_array($result,MYSQL_NUM))
                {
                    //guardamos el ID
                    $elements[$n]["id"] = $row[0];

                    //guardamos codigo html de los elementos                                                         
                    for ($i = 0; $i < count($row); $i++)
                    {
                        $values[$i] = $row[$i];                        
                    }                    
                    $elements[$n]["html"] = vsprintf($this->html_element,$values);
                    
                    $n++;
		}
                
                return ($elements);

            }

            // lee los valores de los campos y los guarda en la BD
            // (esta funci�n est� asociada a la libreria javascript "div_form")
            function get_elements($table_name, $field_id, $data_field_id, $id, $_data)
            {
                //$table_name: tabla en la que se guardan los datos
                //$field_id: campo "id" de la tabla
                //$data_field_id: nombre campo identificador en tabla relacionada, relacionado con tabla de datos (ej: id_producto)
                //$id: valor del identificador ("id_producto") de la tabla de datos
                //$_data: clase con la estructura de la tabla

                //array donde guardaremos los valores de los campos leidos
                $element = array();                

                //guardamos los nombres de los campos en un array
                $keys = array_keys($_data->record);

                $m = 0;
                
                //leemos los campos recibidos del formulario y guardamos el valor
                //en un array cuando coincida con el campo esperado
                for ($k = 0; $k < count($keys); $k++)
                {
                    //quitamos los prefijos 't/n'
                    $fields_name[$k] = substr($keys[$k],2,strlen($keys[$k]));

                    $n = 0;
                    foreach($_REQUEST as $name => $value)
                    {                                                                                                                        
                        $pattern = $this->prefix.$fields_name[$k];
                        
                        if (preg_match("/".$pattern."_/",$name))
                        {                            
                            //si el nombre coincide con un campo guardamos su valor
                            $name = strrev($name);
                            $id_list = explode("_", $name);
                            $id_item = strrev($id_list[0]);
                            
                            if (isset($_REQUEST[$pattern."_".$id_item]))
                            {                                                                                                
                                $element[$n][$fields_name[$k]] = $_REQUEST[$pattern."_".$id_item];

                                $n++;
                                $m = $n;
                            }
                        }                       
                    }                    
                    
                    if ($n == 0)
                    {                       
                        ////si el nombre no coincide, asignamos el valor que lleva la clase
                        for ($i = 0; $i < $m; $i++)
                        {
                            $element[$i][$fields_name[$k]] = $_data->record[$keys[$k]];
                        }
                    }
                }               

                //eliminamos los registros borrados
                $sql = "SELECT $field_id FROM $table_name WHERE $data_field_id = $id";
                $result = mysqli_query($this->db,$sql);
                while ($row = mysqli_fetch_array($result))
                {
                    $exists = false;
                    $value_id = $row[$field_id];

                    for($j = 0; $j < $m; $j++)
                    {                                                
                        if ($value_id == $element[$j][$field_id]) $exists = true;
                    }
                    
                    if (!$exists)
                    {
                        $sql2 = "DELETE FROM $table_name WHERE $field_id = $value_id";
                        $result2 = mysqli_query($this->db,$sql2);
                    }
                }
                               
                //guardamos los registros existentes
                for($j = 0; $j < $m; $j++)
                {
                    //asignamos los valores a la clase
                    for ($k = 0; $k < count($keys); $k++)
                    {
                        $_data->record[$keys[$k]] = $element[$j][$fields_name[$k]];
                    }                                        

                    if (!empty($element[$j][$field_id]))
                    {
                        //actualizamos los registros existentes
                        $condition = "$field_id = ".$element[$j][$field_id];
                        $_data->update_record($condition);
                    }
                    else
                    {
                       //a�adimos los registros que son nuevos
                       $_data->insert_record();   
                    }
               }

            }

        }

        /******* Clase ordenaci�n ********/

	class Sort extends SQL
	{

            var $table_name;

            function __construct()
            {
		$this->db = $this->connect_db();
            }

            //Funci�n que devuelve el �ltimo orden
            function last_position($field, $add = false, $condition = '', $first = 1)
            {
                $value = 0;

                $inc = 0;
                if ($add) $inc = 1;
                
                $sql = "SELECT $field FROM ".$this->table_name;
                if (!empty($condition))
                {
                    $sql .= " WHERE $condition";
                }
                $sql = $sql." ORDER BY $field DESC";

                $result = mysqli_query($this->db,$sql);
                if ($row = mysqli_fetch_array($result))
                {
                    $value = $row[$field] + $inc;
                } 
                else
                {
                    $value = $first;
                }

                return ($value);
            }

            //Funci�n que reordena todos los registros
            function update($id, $new_value, $old_value, $field_sort, $field_id, $condition = '')
            {     
                $sql = "SELECT $field_id,$field_sort FROM ".$this->table_name." WHERE $field_id <> $id";
                if (!empty($condition))
                {
                    $sql .= " AND $condition";
                }
                
                if ($new_value < $old_value)
                {
                    $sql .= " AND $field_sort >= $new_value AND $field_sort < $old_value";
                    $sql .= " ORDER BY $field_sort DESC";

                    $result = mysqli_query($this->db,$sql); 
                    while ($row = mysqli_fetch_array($result))
                    {
                        $next_value = $row[$field_sort] + 1;

                        $sql2 = "UPDATE ".$this->table_name." SET ";
                        $sql2 .= " $field_sort = $next_value";
                        $sql2 .= " WHERE $field_id = ".$row[$field_id];

                        $result2 = mysqli_query($this->db,$sql2);
                    }
                } 
                else if ($new_value > $old_value)
                {
                    $sql .= " AND $field_sort <= $new_value AND $field_sort > $old_value";
                    $sql .= " ORDER BY $field_sort";

                    $result = mysqli_query($this->db,$sql);
                    while ($row = mysqli_fetch_array($result))
                    {
                        $previous_value = $row[$field_sort] - 1;
                        
                        $sql2 = "UPDATE ".$this->table_name." SET ";
                        $sql2 .= " $field_sort = $previous_value";
                        $sql2 .= " WHERE $field_id = ".$row[$field_id];

                        $result2 = mysqli_query($this->db,$sql2);
                    }
                }
            }

            //Funcion que reordena despues de eliminar un registro
            function update_all($id, $field_sort, $field_id, $condition = '')
            {
                $sql = "SELECT $field_sort FROM ".$this->table_name." WHERE $field_id = $id";
                $result=mysqli_query($this->db,$sql);
                
                if ($row = mysqli_fetch_array($result))
                {
                    $sort = $row[$field_sort];

                    $sql0 = "SELECT $field_sort,$field_id FROM ".$this->table_name." WHERE $field_id <> $id";
                    $sql0 .= " AND $field_sort > $sort";
                    if (!empty($condition))
                    {
                        $sql0 .= " AND $condition";
                    }
                    $sql0 .= " ORDER BY $field_sort";
                    $result0 = mysqli_query($this->db,$sql0);
                                    
                    while ($row0 = mysqli_fetch_array($result0))
                    {
                        $new_sort = $row0[$field_sort] - 1;

                        $sql2 = "UPDATE ".$this->table_name." SET ";
                        $sql2 .= " $field_sort = $new_sort";
                        $sql2 .= " WHERE $field_id = ".$row0[$field_id];
                        $result2 = mysqli_query($this->db,$sql2);
                    }
                }
            }

            //Creaci�n del select con los valores posibles
            function build_list($current_value, $last, $first = 1)
            {
                $format = "<option value=\"%s\"%s>%s</option>";

                $options = '';
		for($k = $first; $k <= $last; $k++)
		{
			$selected = '';
                        if ($k == $current_value)
                        {
                            $selected = " selected=\"selected\"";
                        }

                        $options .= sprintf($format, $k, $selected, $k);                        
		}

		return($options);
            }

        }
?>