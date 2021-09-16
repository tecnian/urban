<?php
    include("system/config/config.inc.php");
    include("$appFrontPath/include/include.inc.php");
    include("$appFrontPath/include/common.inc.php");
    include("$appFrontPath/include/page.inc.php"); 
    include("$appFrontPath/include/meta.inc.php"); 
    include("$appFrontPath/include/control.inc.php");    
?>
<!DOCTYPE html>
<html>
	<head>
                        <title><? echo $app_meta_title ?></title>
                        <meta name="description" content="<? echo $app_meta_description ?>" />   
                        
                        <? if (!empty($app_meta_keywords)) { ?>
                        <meta name="keywords" content="<? echo $app_meta_keywords ?>" />  
                        <? } ?>
                        
                        
                        <? include($appContentPath.'/inc/head.php'); ?>    
						
	</head>

	<body<? echo $app_class ?>>

            
		<? include($appContentPath.'/inc/header.php'); ?>   

                <? if (!empty($app_php_file)) { ?>
		<? include($appContentPath.'/'.$app_php_file); ?>  
                <? } ?>
		

                <? include($appContentPath.'/inc/footer.php'); ?>   
            
                           
	</body>
</html>