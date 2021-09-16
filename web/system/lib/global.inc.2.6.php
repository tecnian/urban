<?php
        /*********************************
	Version 2.6
	- modificacio funcio set_checked
        - eliminacio get_magic_quotes_gpc()
	*********************************/

	
	/***********************************************************************/
	// Funciones generales
	/***********************************************************************/
	function get_var($name)
	{
		if (isset($_POST[$name])) 
		{ 
                    $value = $_POST[$name];
		}
		else if(isset($_GET[$name]))
		{ 
                    $value = $_GET[$name];
		}
		else 
		{ 
                    $value = NULL;
		}
		
		return ($value);
	}
	
	function get_param($name, $default_value = '')
	{
		global $db_global;
		
		$value = get_var($name);               
		
		if (is_null($value))
		{
                    $value = $default_value;                       
		}

                if (!is_null($value))
                {
                    $str = stripslashes($value);
                    
                    $res = mysqli_real_escape_string($db_global,$str);
                    
                    $res = str_replace("'","´",$res);
                }
                else
                {
                    $res = NULL;
                }

		return ($res);
	}
	
	function get_check($name)
	{
		if (get_var($name) != '')
		{
                    return (1);
		}
		return (0);
	}

        function set_checked($field,$value)
	{
                if ($field == $value)
                {
                    $res = true;
                }
                else
                {
                    $res = false;
                }
                
		$out = '';
		if ($res)
		{
                    $out = " checked=\"checked\"";
		}

		return ($out);
	}

        function get_date($name)
        {
            $date = '';
            $fecha = get_param($name);

            if (!empty($fecha))
            {
                $str_aux = explode('/', $fecha);
                $fecha_dia = $str_aux[0];
                $fecha_mes = $str_aux[1];
                $fecha_ano = $str_aux[2];

                $date = build_date($fecha_dia,$fecha_mes,$fecha_ano);
            }
            
            return ($date);
        }

        function get_number($name, $default_value = 0)
	{
		$res = get_param($name, $default_value);

                $res = str_replace(',','.',$res);

		return ($res);
	}

        function set_options_array($table_name, $index, $value, $condition = '', $sort = '')
        {
            global $db_global;

            $options = array();

            $sql = "SELECT * FROM $table_name";
            if (!empty($condition))
            {
                $sql .= " WHERE $condition";
            }
            if (!empty($sort))
            {
                $sql .= " ORDER BY $sort";
            }

            $result = mysqli_query($db_global,$sql);
            while ($rst = mysqli_fetch_array($result))
            {
                $options[$rst[$index]] = $rst[$value];
            }

            mysqli_free_result($result);

            return($options);
        }
	
	/***********************************************************************/
	// Funciones tratamiento fechas
	/***********************************************************************/
        function build_date($day, $month, $year, $hour = '00:00:00')
        {
            if (!empty($day) && !empty($month) && !empty($year))
            {
                $new_date = $year.'-'.$month.'-'.$day.' '.$hour;
            }
            else
            {
                $new_date = NULL;
            }

            return($new_date);
        }

        function build_date_str($str_date)
        {
            if (!empty($str_date))
            {
                $str_aux = explode('/', $str_date);
                $day = $str_aux[0];
                $month = $str_aux[1];
                $year = $str_aux[2];

                $new_date = $year.'-'.$month.'-'.$day;
            }
            else
            {
                $new_date = NULL;
            }

            return($new_date);
        }

        function explode_date($str_date)
        {
            $res = array();
            $res['day'] = '';
            $res['month'] = '';
            $res['year'] = '';

            if (!empty($str_date))
            {
                $str_aux = explode('-', $str_date);

                $res['day'] = substr($str_aux[2],0,2);
                $res['month'] = $str_aux[1];
                $res['year'] = $str_aux[0];
            }
            
            return($res);
        }       

        function date_dif($date_ini, $date_fin)
        {
            $date_diff = floor(abs(strtotime($date_fin) - strtotime($date_ini))/86400);

            return($date_diff);
        }

        function seconds_to_time($seconds)
        {
            $minutes = round($seconds)/60;
            $hours = floor($minutes/60);
            $minutes_2 = $minutes%60;
            $seconds_2 = $seconds%60%60%60;

            if ($minutes_2 < 10)
            {
                $minutes_2 = '0'.$minutes_2;
            }
            if ($seconds_2 < 10)
            {
                $seconds_2 = '0'.$seconds_2;
            }
            if ($seconds < 60)
            {
                $result = '00:00:'.$seconds_2;
            }
            elseif (($seconds > 60) && ($seconds < 3600))
            {
                $result = '00:'.$minutes_2.':'.$seconds_2;
            }
            else
            {
                $result = $hours.':'.$minutes_2.':'.$seconds_2;
            }

            return $result;
        }

        function month_last_day($month, $year)
        {

            $last = strftime("%d", mktime(0, 0, 0, $month + 1, 0, $year));

            return($last);

        }
        
        function is_date($str_date)
        { 
            
            $arr = explode('/',$str_date);
            
            if (count($arr) == 3)
            {
                $str = str_replace('/', '-', $str_date);  
            
                $stamp = strtotime($str);  

                if (is_numeric($stamp))
                {  

                    $month = date( 'm', $stamp ); 
                    $day   = date( 'd', $stamp ); 
                    $year  = date( 'Y', $stamp ); 

                    return checkdate($month, $day, $year); 

                }  
            }
            
            return false; 
            
        }
        
        function get_age($fecha_nac)
        {
            list($ano,$mes,$dia) = explode("-",$fecha_nac);
            
            $ano_dif  = date("Y") - $ano;            
            $mes_dif = date("m") - $mes;
            $dia_dif   = date("d") - $dia;
            
            if ($dia_dif < 0 || $mes_dif < 0)
            {
                $ano_dif--;
            }
              
            return $ano_dif;
        }

        /***********************************************************************/
	// Funciones tratamiento campos formulario
	/***********************************************************************/        
	function build_options($options, $current_value)
	{
		$format = "<option value=\"%s\"%s>%s</option>";

                $all_options = '';
		foreach ($options as $value => $label)
		{
			$selected = '';
                        if ($value == $current_value)
                        {
                            $selected = " selected=\"selected\"";
                        }

                        $all_options .= sprintf($format, $value, $selected, $label);
		}
                
		return($all_options);
	}       

        function load_select($table_name, $index, $value, $selected = 0, $condition = '', $sort = '', $inner = false)
        {
            global $db_global;

            $format = "<option value=\"%s\"%s>%s</option>";
            $all_options = '';

            if ($inner == false)
            {
                $sql = "SELECT * FROM $table_name";
            }
            else
            {
                //en este caso pasamos directamente una consulta
                $sql = $table_name;
            }

            if (!empty($condition))
            {
                $sql .= " WHERE $condition";
            }
            if (!empty($sort))
            {
                $sql .= " ORDER BY $sort";
            }

            $result = mysqli_query($db_global,$sql);
            while ($rst = mysqli_fetch_array($result))
            {
                $str_selected = '';
                if ($selected == $rst[$index])
                {
                    $str_selected = " selected=\"selected\"";
                }
                $all_options .= sprintf($format, $rst[$index], $str_selected, $rst[$value]);
            }

            mysqli_free_result($result);

            return($all_options);
        }
        
        function load_select_multiple($table_name, $index, $value, $arr_selected = array(), $condition = '', $sort = '', $inner = false)
        {
            global $db_global;

            $format = "<option value=\"%s\"%s>%s</option>";
            $all_options = '';

            if ($inner == false)
            {
                $sql = "SELECT * FROM $table_name";
            }
            else
            {
                //en este caso pasamos directamente una consulta
                $sql = $table_name;
            }

            if (!empty($condition))
            {
                $sql .= " WHERE $condition";
            }
            if (!empty($sort))
            {
                $sql .= " ORDER BY $sort";
            }

            $result = mysqli_query($db_global,$sql);
            while ($rst = mysqli_fetch_array($result))
            {
                $str_selected = '';
                //if ($selected == $rst[$index])
                if (in_array($rst[$index],$arr_selected))
                {
                    $str_selected = " selected=\"selected\"";
                }
                $all_options .= sprintf($format, $rst[$index], $str_selected, $rst[$value]);
            }

            mysqli_free_result($result);

            return($all_options);
        }

        function build_date_day($active_day)
        {
            $date_day = '';
            $format = "<option value=\"%s\"%s>%s</option>";

            for ($j = 1; $j <= 31; $j++)
            {
                $selected = '';
                if ($j == $active_day)
                {
                    $selected = " selected=\"selected\"";
                }

                $date_day .= sprintf($format, $j, $selected, $j);
            }
            
            return($date_day);
        }

        function build_date_month($active_month)
        {
            global $array_month;

            $date_month = '';
            $format = "<option value=\"%s\"%s>%s</option>";

            for ($j = 1; $j <= 12; $j++)
            {
                $selected = '';
                if ($j == $active_month)
                {
                    $selected = " selected=\"selected\"";
                }
                $month_name = $array_month[$j];

                $date_month .= sprintf($format, $j, $selected, $month_name);
            }

            return($date_month);
        }

        function build_date_year($active_year, $initial, $margin)
        {
            $date_year = '';
            $format = "<option value=\"%s\"%s>%s</option>";

            $current_date = time();
            $final_year = date("Y",$current_date) + $margin;

            for ($j = $initial; $j<= $final_year; $j++)
            {
                $selected = '';
                if ($j == $active_year)
                {
                    $selected = " selected=\"selected\"";
                }

                $date_year .= sprintf($format, $j, $selected, $j);
            }

            return($date_year);
        }

        /***********************************************************************/
	// Funciones tratamiento datagrid
	/***********************************************************************/
        function paginate_datagrid($current_page, $total, $rows_per_page, $group_size, $link, $numbers_only = false)
        {
            $str_html = '';
            $is_js = false;

            //comprobamos si el link es una funci�n javascript
            if (preg_match("/javascript:/",$link))
            {
                $is_js = true;
            }

            if ($rows_per_page > $total) {
                $total_pages = 1;
            } else {
                $total_pages = ceil($total / $rows_per_page);
            }
            $previous = $current_page - 1;
            $next = $current_page + 1;

            if ($current_page > 1 && !$numbers_only) {
                if ($is_js)
                {
                    $str_html .= "<a href=\"$link($previous)\"><< Anterior</a> ";
                }
                else
                {
                    $str_html .= "<a href=\"$link$previous\"><< Anterior</a> ";
                }
            }

            $num_ini = $current_page - floor($group_size / 2);
            if ($num_ini <= 0) {
                $num_ini = 1;
            }
            for ($i = $num_ini; $i < $current_page; $i++)
            {
                if ($is_js)
                {
                    $str_html .= "<a href=\"$link($i)\">$i</a> ";
                }
                else
                {
                    $str_html .= "<a href=\"$link$i\">$i</a> ";
                }
            }

            $str_html .= " <div class='current_page'>$current_page</div> ";

            $num_fin = $current_page + floor($group_size / 2);

            if ($num_fin > $total_pages) {
                $num_fin = $total_pages;
            }
            for ($i = $current_page + 1; $i <= $num_fin; $i++)
            {
                if ($is_js)
                {
                    $str_html .= "<a href=\"$link($i)\">$i</a> ";
                }
                else
                {
                    $str_html .= "<a href=\"$link$i\">$i</a> ";
                }
            }
            if ($current_page < $total_pages && !$numbers_only) {
                if ($is_js)
                {
                    $str_html .= "<a href=\"$link($next)\">Siguiente >></a>";
                }
                else
                {
                    $str_html .= "<a href=\"$link$next\">Siguiente >></a>";
                }
            }

            return($str_html);
        }

        /***********************************************************************/
	// Funciones tratamiento texto
	/***********************************************************************/
        function set_strtoupper($str)
        {
            $str_new = $str;

            $str_new = strtoupper($str_new);

            $str_new = str_replace('á','Á',$str_new);
            $str_new = str_replace('é','É',$str_new);
            $str_new = str_replace('í','Í',$str_new);
            $str_new = str_replace('ó','Ó',$str_new);
            $str_new = str_replace('ú','Ú',$str_new);
            $str_new = str_replace('à','À',$str_new);
            $str_new = str_replace('è','È',$str_new);
            $str_new = str_replace('ì','Ì',$str_new);
            $str_new = str_replace('ò','Ò',$str_new);
            $str_new = str_replace('ù','Ù',$str_new);
            $str_new = str_replace('ñ','Ñ',$str_new);
            $str_new = str_replace('ç','Ç',$str_new);

            return $str_new;
        }

	function replace_accent($str)
        {
            $str_new = $str;

            $str_ini = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕªº';
            
            $str_fin = 'AAAAAAACEEEEIIIIDNOOOOOOUUUUYbsaaaaaaaceeeeiiiidnoooooouuuyybyRrao';
            
            $str_new = utf8_decode($str_new);
            $str_new = strtr($str_new, utf8_decode($str_ini), $str_fin);            
            
            $str_new = str_replace("ç","c",$str_new);
            $str_new = str_replace("Ç","C",$str_new);
            $str_new = str_replace("ñ","n",$str_new);
            $str_new = str_replace("Ñ","N",$str_new);

            return $str_new;
        }
        
        function normalize_filename($name)
        {
               $filename = '';
               
               $cadena = $name;

               $cadena = normalize_string($cadena);
               
               $cadena = str_replace("-","",$cadena);
               $cadena = str_replace("[","",$cadena);
               $cadena = str_replace("]","",$cadena);
               $cadena = str_replace(" ","",$cadena);

               $filename = normalize_string($cadena);

               return ($filename);
        }

        function normalize_url($name)
        {
               $str_url = '';
               
               $cadena = $name;

               $cadena = normalize_string($cadena);
               
               $cadena = str_replace("'","",$cadena);
               $cadena = str_replace("-"," ",$cadena);
               $cadena = str_replace(" ","-",$cadena);
               
               //eliminamos guiones seguidos
               $str = "-";
               
               for ($n = 1; $n <= 10; $n++)
               {
                   $str .= "-";
                   
                   $cadena = str_replace($str,"",$cadena);
               }
               
               
               $str_url = strtolower($cadena);

               return ($str_url);
        }

        function normalize_string($string)
        {
            
            $str_ini = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýýþÿŔŕ[]!|\"@#$%?&/()=?¿¡+.·:;,{}´ºª';
            
            $str_fin = 'AAAAAAACEEEEIIIIDNOOOOOOUUUUYbsaaaaaaaceeeeiiiidnoooooouuuuyybyRr------------------------------';
            
            $cadena = utf8_decode($string);
            $cadena = strtr($cadena, utf8_decode($str_ini), $str_fin);            

            return utf8_encode($cadena);
                        
        }


        function clip_text($string, $char_limit)
        {
            $clip_string = '';

            if (strlen($string) <= $char_limit)
            {
                $clip_string = $string;
            }
            else
            {
                if (substr($string,$char_limit - 1, 1) != ' ')
                {
                    $new_string = substr($string,0,$char_limit);
                    $final_text = substr($string, $char_limit, strlen($string));
                    $i = 0;

                    while ($final_text[$i] != " " && $i < strlen($final_text))
                    {
                        $new_string .= $final_text[$i];
                        $i++;

                        if (!isset($final_text[$i]))
                        {
                            break;
                        }
                    }
                    $clip_string = $new_string.'...';
                }
                else
                {
                    $clip_string = substr($string,0,$char_limit-1).'...';
                }
            }

            return ($clip_string);
        }

        function cut_text($string, $length)
        {
            $cut_string = '';

            if (strlen($string) <= $length)
            {
                $cut_string = $string;
            }
            else
            {
                $cut_string = substr($string,0,$length).'...';
            }

            return ($cut_string);
        }

        function content_paragraphs($content, $tags, $newline = false)
        {
            $k = 0;
            $paragraph = array();
            $result = '';

            $aux = $content;
            $pos = strpos($aux, chr(13));

            while ($pos > 0)
            {
                $paragraph[$k] = substr($aux, 0, $pos);
                $aux = substr($aux, $pos + 1, strlen($aux) - $pos);
                $pos = strpos($aux, chr(13));
                $k++;
            }

            $paragraph[$k] = $aux;

            for ($j = 0; $j <= $k; $j++)
            {                                                                
                if ((!(strlen($paragraph[$j]) == 1 &&  ord($paragraph[$j]) == 10)) || $newline)
                {
                    $result .= $paragraph[$j];
                    if ($j < $k) {
                        $result .= $tags;
                    }                   
                }
            }

            return ($result);
        }
		
	
        /***********************************************************************/
        // Funciones conversion colores
        /***********************************************************************/

        /** Funcion que convierte un color hexadecimal en rgb */
        function convert_hex_rgb($hex)
        {
                $hex = str_replace("#", "", $hex);
                $color = array();

                if(strlen($hex) == 3)
                {
                        $color['r'] = hexdec(substr($hex, 0, 1).substr($hex, 0, 1));
                        $color['g'] = hexdec(substr($hex, 1, 1).substr($hex, 1, 1));
                        $color['b'] = hexdec(substr($hex, 2, 1).substr($hex, 2, 1));
                }
                elseif (strlen($hex) == 6)
                {
                        $color['r'] = hexdec(substr($hex, 0, 2));
                        $color['g'] = hexdec(substr($hex, 2, 2));
                        $color['b'] = hexdec(substr($hex, 4, 2));
                }

                return $color;
        }

        /** Funcion que convierte los valores rgb a formato hexadecimal */
        function convert_rgb_hex($r,$g,$b)
        {
                $hex = "#";

                $hex.= str_pad(dechex($r), 2, "0", STR_PAD_LEFT);
                $hex.= str_pad(dechex($g), 2, "0", STR_PAD_LEFT);
                $hex.= str_pad(dechex($b), 2, "0", STR_PAD_LEFT);
                
                return $hex;
        }
        
        
        
        /***********************************************************************/
        // Funciones varias
        /***********************************************************************/
        
        /** Funcion para validar el NIF */
        
        function validate_nif($cif) 
        {                        
            //Returns: 1 = NIF ok, 2 = CIF ok, 3 = NIE ok, 
            //         -1 = NIF bad, -2 = CIF bad, -3 = NIE bad, 0 = ??? bad
            
            
            $cif = strtoupper($cif);
            
            for ($i = 0; $i < 9; $i ++)
            {
                $num[$i] = substr($cif, $i, 1);
            }
            
            //si no tiene un formato valido devuelve error
            
            if (!preg_match('/((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)/', $cif))
            {
                return 0;
            }
            
            
            //comprobacion de NIFs estandar
            
            if (preg_match('/(^[0-9]{8}[A-Z]{1}$)/', $cif))
            {
                if ($num[8] == substr('TRWAGMYFPDXBNJZSQVHLCKE', substr($cif, 0, 8) % 23, 1))
                {
                    return 1;
                }
                else
                {
                    return -1;
                }            
            }
            
            
            //algoritmo para comprobacion de codigos tipo CIF
            
            $suma = $num[2] + $num[4] + $num[6];
            
            for ($i = 1; $i < 8; $i += 2)
            {
                $suma += substr((2 * $num[$i]),0,1) + substr((2 * $num[$i]), 1, 1);
            }
            
            $n = 10 - substr($suma, strlen($suma) - 1, 1);
            
            
            //comprobacion de NIFs especiales (se calculan como CIFs o como NIFs)
            
            if (preg_match('/^[KLM]{1}/', $cif))
            {
                if ($num[8] == chr(64 + $n) || $num[8] == substr('TRWAGMYFPDXBNJZSQVHLCKE', substr($cif, 1, 8) % 23, 1))
                {
                    return 1;
                }
                else
                {
                    return -1;
                }
            }
            
            //comprobacion de CIFs
            
            if (preg_match('/^[ABCDEFGHJNPQRSUVW]{1}/', $cif))
            {
                if ($num[8] == chr(64 + $n) || $num[8] == substr($n, strlen($n) - 1, 1))
                {
                    return 2;
                }
                else
                {
                    return -2;
                }
            }
            
            //comprobacion de NIEs
            
            if (preg_match('/^[XYZ]{1}/', $cif))
            {
                if ($num[8] == substr('TRWAGMYFPDXBNJZSQVHLCKE', substr(str_replace(array('X','Y','Z'),array('0','1','2'), $cif), 0, 8) % 23, 1))
                {
                    return 3;
                }
                else
                {
                    return -3;
                }
            }
            
            //si todavia no se ha verificado devuelve error
            return 0;
        }
        
        
        /* Transformar SOAP en Array */
        
        function parse_soap_to_array($xml)
        {
            $obj = SimpleXML_Load_String($xml);
            
            if ($obj === FALSE) return $xml;

            
            // GET NAMESPACES, IF ANY
            $nss = $obj->getNamespaces(TRUE);
            if (empty($nss)) return $xml;

            
            // CHANGE ns: INTO ns_
            $nsm = array_keys($nss);
            
            foreach ($nsm as $key)
            {
                // A REGULAR EXPRESSION TO MUNG THE XML
                $rgx
                = '#'               // REGEX DELIMITER
                . '('               // GROUP PATTERN 1
                . '\<'              // LOCATE A LEFT WICKET
                . '/?'              // MAYBE FOLLOWED BY A SLASH
                . preg_quote($key)  // THE NAMESPACE
                . ')'               // END GROUP PATTERN
                . '('               // GROUP PATTERN 2
                . ':{1}'            // A COLON (EXACTLY ONE)
                . ')'               // END GROUP PATTERN
                . '#'               // REGEX DELIMITER
                ;
                // INSERT THE UNDERSCORE INTO THE TAG NAME
                $rep
                = '$1'          // BACKREFERENCE TO GROUP 1
                . '_'           // LITERAL UNDERSCORE IN PLACE OF GROUP 2
                ;
                // PERFORM THE REPLACEMENT
                $xml =  preg_replace($rgx, $rep, $xml);
            }
            
            return $xml;
        }
        
        
        /** Funcion para validar codigo IBAN */
        
        function validar_iban($codigo_iban)
        {
            $iban = strtolower($codigo_iban);
            
            $arr_countries = array(
              'al'=>28,'ad'=>24,'at'=>20,'az'=>28,'bh'=>22,'be'=>16,'ba'=>20,'br'=>29,'bg'=>22,'cr'=>21,'hr'=>21,'cy'=>28,'cz'=>24,
              'dk'=>18,'do'=>28,'ee'=>20,'fo'=>18,'fi'=>18,'fr'=>27,'ge'=>22,'de'=>22,'gi'=>23,'gr'=>27,'gl'=>18,'gt'=>28,'hu'=>28,
              'is'=>26,'ie'=>22,'il'=>23,'it'=>27,'jo'=>30,'kz'=>20,'kw'=>30,'lv'=>21,'lb'=>28,'li'=>21,'lt'=>20,'lu'=>20,'mk'=>19,
              'mt'=>31,'mr'=>27,'mu'=>30,'mc'=>27,'md'=>24,'me'=>22,'nl'=>18,'no'=>15,'pk'=>24,'ps'=>29,'pl'=>28,'pt'=>25,'qa'=>29,
              'ro'=>24,'sm'=>27,'sa'=>24,'rs'=>22,'sk'=>24,'si'=>19,'es'=>24,'se'=>24,'ch'=>21,'tn'=>24,'tr'=>26,'ae'=>23,'gb'=>22,'vg'=>24
            );
            
            $arr_chars = array(
              'a'=>10,'b'=>11,'c'=>12,'d'=>13,'e'=>14,'f'=>15,'g'=>16,'h'=>17,'i'=>18,'j'=>19,'k'=>20,'l'=>21,'m'=>22,
              'n'=>23,'o'=>24,'p'=>25,'q'=>26,'r'=>27,'s'=>28,'t'=>29,'u'=>30,'v'=>31,'w'=>32,'x'=>33,'y'=>34,'z'=>35
            );
 
            if (strlen($iban) != $arr_countries[substr($iban,0,2)]) 
            { 
                return false;                 
            }
 
            $moved_char = substr($iban, 4) . substr($iban,0,4);
            $arr_moved_char = str_split($moved_char);
            $new_string = "";
 
            foreach ($arr_moved_char as $k => $v) 
            {
              if ( !is_numeric($arr_moved_char[$k]) ) 
              {
                  $arr_moved_char[$k] = $arr_chars[$arr_moved_char[$k]];
              }
              
              $new_string .= $arr_moved_char[$k];
            }
  
            if (function_exists("bcmod")) 
            { 
                return bcmod($new_string, '97') == 1;                
            }
   
            $x = $new_string; 
            $y = "97";
            $take = 5; 
            $mod = "";
 
            do 
            {
              $a = (int)$mod . substr($x, 0, $take);
              $x = substr($x, $take);
              $mod = $a % $y;
            }
            while (strlen($x));
 
            return (int)$mod == 1;
        }
?>