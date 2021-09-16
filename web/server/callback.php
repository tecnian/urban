<?php
    include("../system/config/config.inc.php");
    include("../include/include.inc.php");    
    
    
    $clbk = get_param('clbk');       
    
    
    switch ($clbk)
    {        
        
        case 'aceptar_cookies':

            $_SESSION['INFO_COOKIES'] = 1;                     

            break;
                        
        
    }

    
    
?>

