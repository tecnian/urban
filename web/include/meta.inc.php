<?php
        
    $app_meta_title = $app_page['t_seo_title'];
    $app_meta_description = $app_page['t_seo_description'];
    $app_meta_keywords = trim($app_page['t_seo_keywords']);
    
    
    if ($app_page_mode == SYS::PAGE_DETAIL) 
    {
        
        switch ($app_php_file)
        {        
            default:
                
                $_data = new CatalogoIdioma();
                
                $arr_metas = $_data->get_metas($url_item,$app_id_lang);
                
                if (isset($arr_metas['seo_title']))
                {
                    $app_meta_title = $arr_metas['seo_title'];
                    $app_meta_description = $arr_metas['seo_description'];
                    $app_meta_keywords = '';
                }
                
                break;
            
        }
        
    }
    
    
    //canonical url
    
    $app_canonical_url = get_current_uri();
    
    
    
    //meta robots
    
    $app_meta_robots = trim($app_page_data['t_meta_robots']);
    
    
    
?>