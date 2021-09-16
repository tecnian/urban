<?
	/****************************************************************/
        // Versio 2.1
        // load_array() - parametre 'condition'
        /***************************************************************/

        class Language
	{            

            var $info = array();
            var $db;
            var $charset = 'utf-8';

            const TYPE_LABEL = 'label';
            const TYPE_MESSAGE = 'message';

            function __construct($arr_info, $db)
            {
                $this->info = $arr_info;
                $this->db = $db;
            }

            function load_array($condition = '')
            {
                $options = array();

                $sql = "SELECT * FROM ".$this->info['table_name']; 
                
                if ($condition != '')
                {
                    $sql .= " WHERE $condition";
                }

                $result = mysqli_query($this->db,$sql);
                while ($rst = mysqli_fetch_array($result))
                {
                    $options[$rst[$this->info['id_field']]] = $rst[$this->info['name_field']];
                }

                return($options);
            }

            function get_code($id_lang)
            {
                $code = '';

                $sql = "SELECT ".$this->info['code_field'];
                $sql .= " FROM ".$this->info['table_name'];
                $sql .= " WHERE ".$this->info['id_field']." = $id_lang";

                $result = mysqli_query($this->db,$sql);
                if ($rst = mysqli_fetch_array($result))
                {
                    $code = $rst[$this->info['code_field']];
                }
                return($code);
            }

            function get_id($lang_code)
            {
                $id = 0;

                $sql = "SELECT ".$this->info['id_field'];
                $sql .= " FROM ".$this->info['table_name'];
                $sql .= " WHERE ".$this->info['code_field']." = '$lang_code'";

                $result = mysqli_query($this->db,$sql);
                if ($rst = mysqli_fetch_array($result))
                {
                    $id = $rst[$this->info['id_field']];
                }
                return($id);
            }

            function load_labels($xml_file, $type)
            {
                $elements = array();
                
                //abrimos el fichero xml
                $xml = simplexml_load_file($xml_file);

                //leemos los nodos secundarios
                $nodes = $xml->children();

                foreach ($nodes as $node)
                {
                    //leemos los elementos del tipo indicado
                    if ($node->getName() == $type)
                    {
                        $items = $node->children();
                        foreach ($items as $key => $value)
                        {
                            if ($this->charset == 'utf-8')
                            {
                                $elements[$key] = $value;                                
                            }
                            else
                            {
                                $elements[$key] = utf8_decode($value);                                
                            }
                        }
                    }
                }
                
                return($elements);

            }

            function load_json_labels($json_file, $type)
            {
                $json = file_get_contents($json_file);
                                                
                $json_data = json_decode($json,true);
                
                $data = $json_data[$type];

                return ($data);
            }

        }
?>