<?php            
    include("$appSystemPath/lib/data.inc.2.2.php");
    include("$appSystemPath/lib/phpexcel/PHPExcel.php");
    
    
    $_export = New Export();   
    
    $format = get_param('format');
    
    $row_exp = $_SESSION['EXPORT_CONTACTO'];
    
    $xml_file = 'contacto.xml';    
    
    
    switch ($format)
    {        
        case 'csv':
            
            $_export->xml_file = "$appAdmPath/export/$xml_file";
            $_export->csv_file = "$appExportPath/contactos.csv";
            $_export->show_title = true;
                                        
            $_export->export_data($row_exp);
            $_export->open();
            
            break;
        
        
        case 'xls':
            
            $_export->xml_file = "$appAdmPath/export/$xml_file";
            $_export->csv_file = "contactos.xls";
            $_export->show_title = true;
                                        
            $_export->export_excel($row_exp);            
            
            break;
    }

            
    
            
            



        
     
    
?>