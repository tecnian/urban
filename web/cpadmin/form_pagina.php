<?php
    include("../system/config/config.inc.php");
    include("include/include.inc.php");    
    include("$appSystemPath/lib/data.inc.2.2.php");   
    $appTableName = TBL::PAGINA;
    include("server/form.php");
    
?>
<!DOCTYPE html>
<html>
  <head>

      <? include('include/head.php'); ?>
      
      <script type="text/javascript" src="<? echo $appSystemUrl ?>/js/ckeditor/ckeditor.js"></script>
      
      <script src="<? echo $appAdmUrl ?>/js/pagina.js?id=<? echo uniqid() ?>" type="text/javascript"></script>
      
      <script type="text/javascript">
          $(document).ready(function() {

            activate_menu('pag',1);
            
            <? if ($id > 0) { ?>
            get_list_contenido(<? echo $id ?>);
            <? } ?>
               
          });
     </script>

  </head>
  
  <body class="app sidebar-mini light-mode default-sidebar">
      
        <? include('include/loader.php'); ?>
      
        <div class="page">

            <div class="page-main">

                <? include('include/sidebar.php'); ?>
                
                <div class="app-content main-content">
                    
                    <div class="side-app">
                        
                        <? include('include/header.php'); ?>

                        <div class="page-header">
				<div class="page-leftheader">
                                    <h4 class="page-title"><? echo $adm_lang['paginas'] ?></h4>
				</div>
							
                                <div class="page-rightheader ml-auto d-lg-flex d-none">
					<div class="btn-list">
                                                <button id="btn_back" class="btn btn-primary" data-link="<? echo $grid_page ?>">< <? echo $adm_lang['volver'] ?></button>                                                                                                                                             
                                        </div>
				</div>
			</div>
                        
                        <div class="row">
                            
                            <form role="form" id="formData" method="post" enctype="multipart/form-data" action="<? echo $action_page ?>">   
                            		
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                                                        								
                                        <div class="card">

                                            <div class="card-body">

                                                <div class="row">

                                                    <div class="col-md-4">
                                                    
                                                            <div class="form-group">
                                                                    <label class="form-label"><? echo $adm_lang['nombre'] ?> <span class="text-red">*</span></label>
                                                                    <input type="text" class="form-control" id="nombre" name="nombre" value="<? echo $row['t_nombre'] ?>" />                               
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-4">

                                                            <? if ($user_profile == OPT::PROFILE_SUPERADMIN) { ?>
                                                            <div class="form-group">
                                                                  <label class="form-label"><? echo $adm_lang['fichero_php'] ?></label>
                                                                  <select class="form-control custom-select select2" id="php_file" name="php_file">  
                                                                      <option value="0"></option>
                                                                      <? echo $opt_fichero ?>
                                                                  </select>
                                                            </div>   
                                                            <? } ?>
                                                        
                                                    </div>
                                                    <div class="col-md-4">

                                                            <div class="form-group">
                                                                    <label class="form-label"><? echo $adm_lang['referencia'] ?></label>
                                                                    <input type="text" class="form-control" id="referencia" name="referencia" value="<? echo $row['t_referencia'] ?>" />                               
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-4">

                                                            <div class="form-group">
                                                                  <label class="form-label"><? echo $adm_lang['pagina_padre'] ?></label>
                                                                  <select class="form-control custom-select select2" id="id_parent" name="id_parent">  
                                                                      <option value="0">- <? echo $adm_lang['ninguna'] ?> -</option>
                                                                      <? echo $opt_parent ?>
                                                                  </select>
                                                                  <input type="hidden" id="id_parent_ini" name="id_parent_ini" value="<? echo $row['n_id_parent'] ?>" /> 
                                                            </div> 
                                                        
                                                    </div>
                                                    <div class="col-md-4">

                                                            <div class="form-group">
                                                                  <label class="form-label"><? echo $adm_lang['formato'] ?></label>
                                                                  <select class="form-control custom-select select2" id="id_formato" name="id_formato">  
                                                                      <option value="0"></option>
                                                                      <? echo $opt_formato ?>
                                                                  </select>
                                                                  <input type="hidden" id="id_parent_ini" name="id_parent_ini" value="<? echo $row['n_id_parent'] ?>" /> 
                                                            </div> 
                                                        
                                                    </div>
                                                    <div class="col-md-4">

                                                            <div class="form-group">
                                                                  <label class="form-label"><? echo $adm_lang['orden'] ?> <span class="text-red">*</span></label>
                                                                  <div id="jxOrden">
                                                                  <select class="form-control custom-select select2" id="orden" name="orden">  
                                                                      <? echo $opt_orden ?>
                                                                  </select>
                                                                  </div>
                                                            </div> 
                                                        
                                                    </div>
                                                    <div class="col-md-4">

                                                            <div class="form-group">
                                                                    <label class="form-label"><? echo $adm_lang['meta_robots'] ?></label>
                                                                    <input type="text" class="form-control" id="meta_robots" name="meta_robots" value="<? echo $row['t_meta_robots'] ?>" />                               
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-2">

                                                            <div class="form-group-checkbox">
                                                                <label class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="activo" name="activo" value="1" <? echo $activo ?> />
                                                                    <span class="custom-control-label"><? echo $adm_lang['activo'] ?></span>
                                                                </label>                                                                                            
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-2">

                                                            <div class="form-group-checkbox">
                                                                <label class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="mostrar_menu" name="mostrar_menu" value="1" <? echo $mostrar_menu ?> />
                                                                    <span class="custom-control-label"><? echo $adm_lang['mostrar_menu'] ?></span>
                                                                </label>                                                                                            
                                                            </div>
                                                
                                                    </div>
                                                    <div class="col-md-2">

                                                            <div class="form-group-checkbox">
                                                                <label class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="privada" name="privada" value="1" <? echo $privada ?> />
                                                                    <span class="custom-control-label"><? echo $adm_lang['pagina_privada'] ?></span>
                                                                </label>                                                                                            
                                                            </div>
                                                
                                                    </div>
                                                    
                                                    <input type="hidden" id="mode" name="mode" value="<? echo $mode ?>" />
                                                    
                                                        

                                                </div>
                                            </div>
                                        </div>
                                    
                                    
                                
				</div>
                            
                                <div class="col-xl-12 col-lg-12 col-md-12">
								<div class="card">
									<div class="card-body">
										
										<div class="panel panel-primary">
                                                                                    <div class=" tab-menu-heading p-0 bg-light">
                                                                                            <div class="tabs-menu1 ">
                                                                                                    <!-- Tabs -->
                                                                                                    <ul class="nav panel-tabs">
                                                                                                        <? for ($n = 1; $n <= count($opt_idioma); $n++) { ?>
                                                                                                            <li class=""><a href="#tab_<? echo $n ?>" <? if ($n == 1) {?> class="active"<? } ?> data-toggle="tab"><? echo $opt_idioma[$n] ?></a></li>                                                                                                            
                                                                                                        <? } ?>
                                                                                                    </ul>
                                                                                            </div>
                                                                                    </div>
                                                                                    <div class="panel-body tabs-menu-body">
                                                                                            <div class="tab-content">
                                                                                                
                                                                                                    <? for ($n = 1; $n <= count($opt_idioma); $n++) { ?>
                                                                                                
                                                                                                    <div class="tab-pane <? if ($n == 1) {?> active<? } ?>" id="tab_<? echo $n ?>">
                                                                                                        
                                                                                                        <div class="row">    
                                                                                                            
                                                                                                            <div class="col-md-12">
                                                                                                                <br/>
                                                                                                            </div>
                                                                                                        
                                                                                                            <div class="col-md-12">
                                                                                                            
                                                                                                                    <div class="form-group">
                                                                                                                            <label class="form-label"><? echo $adm_lang['titulo'] ?> <span class="required">*</span></label>
                                                                                                                            <input type="text" class="form-control" id="titulo_<? echo $n ?>" name="titulo_<? echo $n ?>" value="<? echo $row_lang[$n]['t_titulo'] ?>" />                               
                                                                                                                    </div>
                                                                                                                
                                                                                                            </div>
                                                                                                            <div class="col-md-12">

                                                                                                                    <div class="form-group">
                                                                                                                            <label class="form-label"><? echo $adm_lang['subtitulo'] ?></label>
                                                                                                                            <input type="text" class="form-control" id="abstract_<? echo $n ?>" name="abstract_<? echo $n ?>" value="<? echo $row_lang[$n]['t_abstract'] ?>" />                               
                                                                                                                    </div>
                                                                                                                
                                                                                                            </div>
                                                                                                            <div class="col-md-12">

                                                                                                                    <div class="form-group">
                                                                                                                            <label class="form-label"><? echo $adm_lang['url_amigable'] ?> <span class="required">*</span></label>
                                                                                                                            <input type="text" class="form-control" id="friendly_url_<? echo $n ?>" name="friendly_url_<? echo $n ?>" value="<? echo $row_lang[$n]['t_friendly_url'] ?>" />                               
                                                                                                                    </div>
                                                                                                                
                                                                                                            </div>
                                                                                                            <div class="col-md-12">

                                                                                                                    <div class="form-group">
                                                                                                                            <label class="form-label"><? echo $adm_lang['seo_title'] ?></label>
                                                                                                                            <input type="text" class="form-control" id="seo_title_<? echo $n ?>" name="seo_title_<? echo $n ?>" value="<? echo $row_lang[$n]['t_seo_title'] ?>" />                               
                                                                                                                    </div>
                                                                                                                
                                                                                                            </div>
                                                                                                            <div class="col-md-12">

                                                                                                                    <div class="form-group">
                                                                                                                            <label class="form-label"><? echo $adm_lang['seo_description'] ?></label>
                                                                                                                            <textarea class="form-control" name="seo_description_<? echo $n ?>" id="seo_description_<? echo $n ?>" rows="2"><? echo $row_lang[$n]['t_seo_description'] ?></textarea>                            
                                                                                                                    </div>
                                                                                                                
                                                                                                            </div>
                                                                                                            <div class="col-md-12">

                                                                                                                    <div class="form-group">
                                                                                                                            <label class="form-label"><? echo $adm_lang['seo_keywords'] ?></label>
                                                                                                                            <textarea class="form-control" name="seo_keywords_<? echo $n ?>" id="seo_keywords_<? echo $n ?>" rows="4"><? echo $row_lang[$n]['t_seo_keywords'] ?></textarea>                            
                                                                                                                    </div>
                                                                                                                
                                                                                                            </div>
                                                                                                            <div class="col-md-12">

                                                                                                                    <? if ($user_profile == OPT::PROFILE_SUPERADMIN) { ?>
                                                                                                                    <div class="form-group">
                                                                                                                          <label class="form-label"><? echo $adm_lang['fichero_php'] ?></label>
                                                                                                                          <select class="form-control custom-select select2" id="php_file_<? echo $n ?>" name="php_file_<? echo $n ?>">  
                                                                                                                              <option value="0"></option>
                                                                                                                              <? echo $opt_fichero_lang[$n] ?>
                                                                                                                          </select>
                                                                                                                    </div>   
                                                                                                                    <? } ?>
                                                                                                                
                                                                                                            </div>
                                                                                                                                                                                                                        
                                                                                                        </div>
                                                                                                        
                                                                                                    </div>
                                                                                                
                                                                                                    <? } ?>
                                                                                                    
                                                                                            </div>
                                                                                    </div>
                                                                                </div>
                                                                                
									</div>
								</div>
				</div>
                                
                                
                                <? if (count($perfil) > 0) { ?>
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    
                                    <div class="card">

                                            <div class="card-header">
						<h3 class="card-title"><? echo $adm_lang['perfiles_web'] ?></h3>
                                            </div>

                                            <div class="card-body">
                                                <div class="row">

                                                    <?  for ($n = 0; $n < count($perfil); $n++) { ?>

                                                    <div class="form-group col-sm-4">
                                                        <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" name="pagina_perfil_<? echo $perfil[$n]['id'] ?>" id="pagina_perfil_<? echo $perfil[$n]['id'] ?>" value="1" <? if ($chk_perfil[$n]['checked']) { ?>checked<? } ?> />
                                                            <span class="custom-control-label"><? echo $perfil[$n]['nombre'] ?></span>
                                                        </label>
                                                    </div>
                                                    
                                                    <? } ?>

                                                </div>
                                            </div>
                                        
                                    </div>

                                </div>
                                <? } ?>
                                
                                
                                <div class="col-xl-12 col-lg-12 col-md-12 mb-6">
                                    <div class="form-group has-error error_info" id="error_info">
                                            <label class="form-label"><i class="fa fa-times-circle-o"></i> <? echo $adm_lang['introduzca_campos'] ?></label>
                                    </div>
                                    <div class="form-group has-warning format_info" id="format_info">
                                            <label class="form-label"><i class="fa fa-times-circle-o"></i> <? echo $adm_lang['se_campos_incorrecto'] ?></label>
                                    </div>
                                    
                                    <button id="btn_save" class="btn btn-primary"><i class="fa fa-check"></i> <? echo $adm_lang['guardar'] ?></button>
                                      
                                    <input type="hidden" id="id" value="<? echo $id ?>" />
				</div>
					
                            </form>
                            
                            
                            
                            <? if ($id > 0) { ?>
                            
                                <div class="col-xl-12 col-lg-12 col-md-12">
								
                                    <div class="card">
									
                                        <div class="card-body">
																				
                                            <div id="jxContenidos"></div>
                                            <a name="contenidos"></a>
                                                                                
					</div>
                                        
                                    </div>
                                    
                                </div>
                            
                                <? } ?>                                                                                                                                                                                                                    
                                	
                              
                                
                                	
			</div>                                                                            
                        
                       
                    </div>
                </div>


            </div>

            <? include('include/footer.php'); ?>

        </div>

    
    </body>
    
   
</html>