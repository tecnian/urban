<?php
    include("../system/config/config.inc.php");
    include("include/include.inc.php");    
    $appTableName = TBL::IDIOMA;
    include("server/form.php");
    
?>
<!DOCTYPE html>
<html>
  <head>

      <? include('include/head.php'); ?>
      
      <script src="<? echo $appAdmUrl ?>/js/idioma.js?id=<? echo uniqid() ?>" type="text/javascript"></script>
      
      <script type="text/javascript">
          $(document).ready(function() {

            activate_menu('cnf',1);  
                        
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
                                    <h4 class="page-title"><? echo $adm_lang['idiomas'] ?></h4>
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

                                                                                                        
                                                    <div class="col-md-6">
                                                    
                                                            <div class="form-group">
                                                                    <label class="form-label"><? echo $adm_lang['nombre'] ?> <span class="text-red">*</span></label>
                                                                    <input type="text" class="form-control" id="nombre" name="nombre" value="<? echo $row['t_nombre'] ?>" />                               
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-6">

                                                            <div class="form-group">
                                                                    <label class="form-label"><? echo $adm_lang['codigo'] ?> <span class="text-red">*</span></label>
                                                                    <input type="text" class="form-control" id="codigo" name="codigo" value="<? echo $row['t_codigo'] ?>" />                               
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-3">
                                                        
                                                            <div class="form-group-checkbox">
                                                                <label class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="activo" name="activo" value="1" <? echo $activo ?> />
                                                                    <span class="custom-control-label"><? echo $adm_lang['activo'] ?></span>
                                                                </label>                                                                                            
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-3">
                                                        
                                                            <div class="form-group-checkbox">
                                                                <label class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="defecto" name="defecto" value="1" <? echo $defecto ?> />
                                                                    <span class="custom-control-label"><? echo $adm_lang['idioma_defecto'] ?></span>
                                                                </label>                                                                                            
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-3">
                                                        
                                                            <div class="form-group-checkbox">
                                                                <label class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="activo_admin" name="activo_admin" value="1" <? echo $activo_admin ?> />
                                                                    <span class="custom-control-label"><? echo $adm_lang['activo_backend'] ?></span>
                                                                </label>                                                                                            
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-3">
                                                        
                                                            <div class="form-group-checkbox">
                                                                <label class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="defecto_admin" name="defecto_admin" value="1" <? echo $defecto_admin ?> />
                                                                    <span class="custom-control-label"><? echo $adm_lang['idioma_defecto_backend'] ?></span>
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