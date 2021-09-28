                
                <meta charset=UTF-8>
                <meta http-equiv=X-UA-Compatible content="IE=edge">
                <meta name=viewport content="width=device-width, initial-scale=1">    
                
                <meta name="apple-mobile-web-app-capable" content="yes" />
                <meta name="apple-mobile-web-app-status-bar-style" content="black" />
                       
                <link rel="icon" type="image/png" href="<? echo $appFrontUrl ?>/assets/img/favicon.png" />
                
                <link rel="stylesheet" type="text/css" href="<? echo $appFrontUrl ?>/assets/css/flickity.css" />
                <link rel="stylesheet" href="<? echo $appFrontUrl ?>/assets/css/slider.css?id=<? echo uniqid() ?>">
                <link rel="stylesheet" href="<? echo $appFrontUrl ?>/assets/css/css.css?id=<? echo uniqid() ?>">
                
                <script type="text/javascript" src="<? echo $appSystemUrl ?>/js/jquery.3.6.0.js"></script>  
                <script type="text/javascript" src="<? echo $appSystemUrl ?>/js/lib.global.2.1.js"></script>  
                <script src='<? echo $appFrontUrl ?>/assets/js/flickity.pkgd.js'></script>
                <script type="text/javascript" src="<? echo $appFrontUrl ?>/assets/js/site.js?id=<? echo uniqid() ?>"></script>
                
                <? if (!empty($app_meta_robots)) { ?>
                <meta name="robots" content="<? echo $app_meta_robots ?>">
                <? } ?>
                
                <link rel="canonical" href="<? echo $app_canonical_url ?>"/>
                                
                
                <script type="text/javascript">
                    var app_folder = '<? echo $appServerUrl ?>';
                </script>
                
                