<?php
//*******************************************************************************
//*****  Version 2.3:  adaptacions php7.4  *****
//*******************************************************************************

class SQL extends DBO
{
	
	var $db;
	var $table_name;
	var $record = array();
        var $related_table = array();

	//****  funcion que inserta un registro en una tabla  ****
	function insert_record($auto = 1) 	
	{				
		$last_id = 0;

                //numero de campos del array
		$fields_count = count($this->record);
	
		//La clave en el array debe seguir 
		//el formato:  t/n + Nombre del campo en la base de datos
	
		//Inicializamos los vectores de claves y valores
		$key = array_keys($this->record);
		$item = array_values($this->record);    
		
		//si hay id autonumerico no tenemos en cuenta el primer campo
		if ($auto == 1) 
		{
			$ini = 1;
		} 
		else 
		{
			$ini = 0;
		}
	
		$sql = "INSERT INTO ".$this->table_name." (";
                if ($fields_count > $ini)
                {
                    For ($k = $ini; $k < $fields_count; $k++)
                    {
                       if (isset($item[$k]))
                       {
                            $sql .= substr($key[$k],2,strlen($key[$k])).",";
                       }
                    }
                    $sql = substr($sql,0,strlen($sql)-1);
                }
                $sql .= ") VALUES (";

                if ($fields_count > $ini)
                {
                    for ($k = $ini; $k < $fields_count; $k++) {
                            if (isset($item[$k]))
                            {
                                //primero comprobamos si es un campo numerico o de texto
                                if (substr($key[$k],0,1) == "t")
                                {
                                        $sql .= "'".$item[$k]."',";
                                }
                                elseif (substr($key[$k],0,1) == "n")
                                {
                                        $sql .= $item[$k].",";
                                }
                            }
                    }
                    //Borramos la coma del final
                    $sql = substr($sql,0,strlen($sql)-1);
                }

                $sql .= ")"; 
                               
                $result = mysqli_query($this->db,$sql);

                $last_id = mysqli_insert_id($this->db);               

                return($last_id);		
	}
	
	//*** funcion que actualiza un registro  ***
	function update_record($condition) 
	{			
		//numero de campos del array
		$fields_count = count($this->record);
		
		//Inicializamos los vectores de claves y valores
		$key = array_keys($this->record);
		$item = array_values($this->record);         
	
		$sql = "UPDATE ".$this->table_name." SET ";
	
		for ($k = 1; $k < $fields_count; $k++) 
		{
			if (isset($item[$k]))
                        {                            
                            //Tomamos el nombre del campo
                            $field = substr($key[$k],2,strlen($key[$k]));

                            //Comprobamos el tipo de campo
                            if (substr($key[$k],0,1) == "t")
                            {
                                    $sql .= $field."='".$item[$k]."',";
                            }
                            elseif (substr($key[$k],0,1) == "n")
                            {
                                    $sql .= $field."=".$item[$k].",";
                            }
                        }
		}
	
		//Borramos la coma del final
		$sql = substr($sql,0,strlen($sql)-1);
		
		$sql .= " WHERE $condition";  
	   
		$result = mysqli_query($this->db,$sql);
	
	}
	
	
	//*** Funcion que lee los campos de un registro que cumplen una   ***
	//*** condicion y los devuelve en un array                  ***
	function get_record($condition) 
	{
		$row = array();
                
                $condition = str_replace('information_schema','',$condition);
                $condition = str_replace('table_schema','',$condition);
                $condition = str_replace('database()','',$condition);
                $condition = str_replace('@@version','',$condition);
                $condition = str_replace('@@hostname','',$condition);
                
		
		//numero de campos del array
		$fields_count = count($this->record);
		
		//Guardamos las claves
		$keys = array_keys($this->record);
	
		$sql = "SELECT * FROM ".$this->table_name." WHERE $condition";
		$result = mysqli_query($this->db,$sql);
		if ($result) 
		{
			$rst = mysqli_fetch_row($result);
	
			for ($k = 0; $k < $fields_count; $k++) 
			{
			   //Leemos el valor del campo
                           if (isset($keys[$k]) && isset($rst[$k]))
                           {
                              $row[$keys[$k]] = $rst[$k];      
                           }
                           else
                           {
                               $row[$keys[$k]] = "";
                               
                           }                       
			}
		}    
		else 
		{
			for ($k = 0; $k < $fields_count; $k++) 
			{
				//Inicializamos a cero
			   	$row[$keys[$k]] = "";
			}
		}               
		
		mysqli_free_result($result);               
		
		return ($row);		
			 
	}
	
	// Funcion que elimina el registro que cumple la condicion
	function delete_record($condition) 
	{
		$sql = "DELETE FROM ".$this->table_name." WHERE $condition";
		$result = mysqli_query($this->db,$sql);		
	}
	
	// Funcion que actualiza un campo en los registros
	// que cumplen la condicion indicada
	function update_field($key, $value, $condition) 
	{
		$sql = "UPDATE ".$this->table_name." SET ";
	
		//Tomamos el nombre del campo
		$field = substr($key,2,strlen($key));
	   
		//Comprobamos el tipo de campo
		if (substr($key,0,1) == "t") 
		{
		   $sql .= $field."='".$value."',";
		}
		elseif (substr($key,0,1) == "n") 
		{
		   $sql .= $field."=".$value.",";
		}
		$sql = substr($sql,0,strlen($sql)-1);
	
		$sql .= " WHERE $condition";               
		
		$result = mysqli_query($this->db,$sql);
		
	}
	
	//Funcion que devuelve el valor de un campo en funcion de una condicion
	function field_value($field_name, $condition, $default_value = '') 
	{
		$value = $default_value;
            
                $sql = "SELECT $field_name FROM ".$this->table_name." WHERE $condition";               
		
		$result = mysqli_query($this->db,$sql);
		if ($result) 
		{
			$rst = mysqli_fetch_array($result);
			mysqli_free_result($result);
			
			if (isset($rst[$field_name]))
                        {
                            $value = $rst[$field_name];
                        }
		}
                
                return($value);
	}
		
	// Funcion que devuelve el n. de registros que cumplen condicion
	function record_count($sql) 
	{
		$result = mysqli_query($this->db,$sql);
		$num = mysqli_num_rows($result);
		
		return ($num);	
	}   
	
	// Funcion que comprueba si un registro existe 
	function record_exists($condition) 
	{
		$sql="SELECT * FROM ".$this->table_name." WHERE $condition"; 
	
		$result = mysqli_query($this->db,$sql);
		if ($rst = mysqli_fetch_array($result)) 
		{
			mysqli_free_result($result);
			return (true);
		} 
		else 
		{
			return (false);
		}
	}
	
	//Funcion que devuelve un array con las filas de una consulta
	function get_query($query) 
	{
		$row = array();
                
                $query = str_replace('information_schema','',$query);
                $query = str_replace('table_schema','',$query);
                $query = str_replace('database()','',$query);
                $query = str_replace('@@version','',$query);
                $query = str_replace('@@hostname','',$query);
                
		
		$result = mysqli_query($this->db,$query);
		while ($rst = mysqli_fetch_array($result)) 
		{
			array_push($row,$rst);
		}
		mysqli_free_result($result);
		
		return ($row);    	
	}

        //Funcion que ejecuta una consulta
        function execute_query($query)
        {
            $result = mysqli_query($this->db,$query);
        }
	
	//Funcion que pagina los registros de una consulta
	function paginate($query, $page, $page_size)
	{
		$current_page = $page;
		$total_rows = $this->record_count($query);
		
		if ($page_size >= $total_rows) 
		{
			$total_pages = 1;
		} 
		else 
		{
			$total_pages = ceil($total_rows / $page_size);
		}
		
		$first = ($current_page - 1) * $page_size;
		
		$res = $query." LIMIT ".$first.",".$page_size;			
		
		return ($res);		
	}

        //Funcion que comprueba si existen registros relacionados en tablas principales
        function related_items($id, $type = 0)
        {
            $related = false;

            for ($k = 0; $k < count($this->related_table); $k++)
            {
                $id_type = 0;
                if (isset($this->related_table[$k]['id_type']))
                {
                    $id_type = $this->related_table[$k]['id_type'];
                }

                if ($type == $id_type)
                {
                    if (!is_array($id))
                    {
                        $sql = "SELECT * FROM ".$this->related_table[$k]['table_name'].
                               " WHERE ".$this->related_table[$k]['field_id']." = $id";
                    }
                    else
                    {
                        $sql = "SELECT * FROM ".$this->related_table[$k]['table_name']." WHERE ";
                        for ($n = 0; $n < count($id); $n++)
                        {
                            $sql .= $this->related_table[$k]['field_id'][$n]." = ".$id[$n]." AND ";
                        }
                        $sql = substr($sql,0,strlen($sql) - 4);
                    }

                    $result = mysqli_query($this->db,$sql);
                    if ($rst = mysqli_fetch_array($result))
                    {
                        $related = true;
                    }
                    mysqli_free_result($result);
                }
            }                               

            return($related);
        }

        //Funcion que elimina los registros relacionados en las tablas secundarias relacionadas
        function delete_relations($id)
        {
            if (isset($this->relation))
            {
                for ($k = 0; $k < count($this->relation); $k++)
                {
                    $sql = "DELETE FROM ".$this->relation[$k]['table_name'].
                           " WHERE ".$this->relation[$k]['field_id']." = $id";

                    if (!empty($this->relation[$k]['condition']))
                    {
                        $sql .= " AND ".$this->relation[$k]['condition'];
                    }

                    $result = mysqli_query($this->db,$sql);
                }
            }
        }
}

?>