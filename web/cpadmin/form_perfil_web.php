<?php
    include("../system/config/config.inc.php");
    include("include/include.inc.php");    
    $appTableName = TBL::PERFIL_WEB;
    include("server/form.php");
    
?>
<!DOCTYPE html>
<html>
  <head>

      <? include('include/head.php'); ?>
      
      <script src="<? echo $appAdmUrl ?>/js/perfil_web.js?id=<? echo uniqid() ?>" type="text/javascript"></script>
      
      <script type="text/javascript">
          $(document).ready(function() {

            activate_menu('cnf',3);      
                        
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
                                    <h4 class="page-title"><? echo $adm_lang['perfiles_web'] ?></h4>
				</div>
							
                                <div class="page-rightheader ml-auto d-lg-flex d-none">
					<div class="btn-list">
                                                <button id="btn_back" class="btn btn-primary" data-link="<? echo $grid_page ?>">< <? echo $adm_lang['volver'] ?></button>                                                                                                                                             
                                        </div>
				</div>
			</div>
                        
                        <div class="row">
                            		
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    
                                    <form role="form" id="formData" method="post" enctype="multipart/form-data" action="<? echo $action_page ?>">   
								
                                        <div class="card">

                                            <div class="card-body">

                                                <div class="row">

                                                    
                                                    
                                                    
                                                    <div class="col-md-12">
                                                        
                                                        <div class="form-group">
                                                                <label class="form-label"><? echo $adm_lang['nombre'] ?> <span class="text-red">*</span></label>
                                                                <input type="text" class="form-control" id="nombre" name="nombre" value="<? echo $row['t_nombre'] ?>" />                               
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                                <label class="form-label"><? echo $adm_lang['clase_css'] ?></label>
                                                                <input type="text" class="form-control" id="class_name" name="class_name" value="<? echo $row['t_class_name'] ?>" />                               
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="col-md-6">

                                                            <div class="form-group">
                                                                <? if (!empty($url_imagen)) { ?>

                                                                <label class="form-label"><? echo $adm_lang['imagen'] ?></label><br/>
                                                                <img name="img" id="img" src="<? echo $url_imagen ?>" style="max-width:200px" />
                                                                <a class="link link_del" href="javascript:delete_file('<? echo $delete_file_page ?>','imagen');"><i class="fa fa-trash-o"></i> <? echo $adm_lang['borrar'] ?></a>

                                                                <? } else { ?>

                                                                <div class="input-group">
                                                                    <div class="form-label"><? echo $adm_lang['imagen'] ?></div>                                                                                                        
								</div>  
                                                                <div class="input-group mb-5">
                                                                    <input type="text" class="form-control form-file browse-file" placeholder="<? echo $adm_lang['seleccionar_fichero'] ?>">
                                                                    <label class="input-group-btn">
                                                                        <span class="btn btn-primary">
                                                                            <? echo $adm_lang['seleccionar'] ?> <input type="file" style="display: none;" id="imagen" name="imagen">
                                                                        </span>
                                                                    </label>                                                                    
                                                                </div>
                                                                <div class="help-block"><? echo $adm_lang['tamaño_maximo_1mb'] ?></div>                                                                                                  
								
                                                                <? } ?>
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-12">
                                                        
                                                            <div class="form-group-checkbox">
                                                                <label class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="activo" name="activo" value="1" <? echo $activo ?> />
                                                                    <span class="custom-control-label"><? echo $adm_lang['activo'] ?></span>
                                                                </label>                                                                                            
                                                            </div>
                                                        
                                                    </div>
                                                    
                                                    <input type="hidden" id="mode" name="mode" value="<? echo $mode ?>" />  

                                                </div>
                                            </div>
                                        </div>
                                    
                                    </form>
                                
				</div>
                                
                                
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
					
                                                                                                                                                      
                                		
			</div>                                                                            
                        
                    </div>
                </div>


            </div>

            <? include('include/footer.php'); ?>

        </div>

    
    </body>
    
   
</html>