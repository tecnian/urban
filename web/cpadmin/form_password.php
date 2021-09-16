<?php
    include("../system/config/config.inc.php");
    include("include/include.inc.php");    
    include("$appAdmPath/include/control.inc.php");    
    include("server/psw.php");
    
?>
<!DOCTYPE html>
<html>
  <head>

      <? include('include/head.php'); ?>
      
      <script src="<? echo $appAdmUrl ?>/js/psw.js" type="text/javascript"></script>
      <script type="text/javascript">
          $(document).ready(function() {

            activate_menu('home',0);     
                        
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
                                    <h4 class="page-title"><? echo $adm_lang['cambiar_contrasena'] ?></h4>
				</div>
							
                                <div class="page-rightheader ml-auto d-lg-flex d-none">
					<div class="btn-list">
                                                                                                                                                                                       
                                        </div>
				</div>
			</div>
                        
                        <div class="row">
                            
                                
                                <? if (!empty($message) && $status_ok) { ?>
                                <div class="col-12">
                                    <div class="alert alert-success" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <span class="icon"><i class="icon fa fa-check"></i> <? echo $message ?></span>
                                    </div>
                                </div>
                                <? } ?>
                                <? if (!empty($message) && !$status_ok) { ?>
                                <div class="col-12">
                                    <div class="alert alert-warning" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <span class="icon"><i class="icon fa fa-warning"></i> <? echo $message ?></span>
                                    </div>
                                </div>                            
                                <? } ?>
                            		
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    
                                    <form role="form" id="formData" method="post" enctype="multipart/form-data" action="<? echo $action_page ?>">   
								
                                        <div class="card">

                                            <div class="card-body">

                                                <div class="row">

                                                    <div class="col-md-12">
                                                    
                                                            <div class="form-group">
                                                                    <label class="form-label"><? echo $adm_lang['contrasena_actual'] ?> <span class="text-red">*</span></label>
                                                                    <input type="password" class="form-control" id="current_psw" name="current_psw" value="" />                                                                
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-12">

                                                            <div class="form-group">                                                                
                                                                    <label class="form-label"><? echo $adm_lang['nueva_contrasena'] ?> <span class="text-red">*</span></label>
                                                                    <input type="password" class="form-control" id="new_psw" name="new_psw" value="" />                                                                
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-12">

                                                            <div class="form-group">                                                                
                                                                    <label class="form-label"><? echo $adm_lang['confirmar_contrasena'] ?> <span class="text-red">*</span></label>
                                                                    <input type="password" class="form-control" id="confirm_psw" name="confirm_psw" value="" />                                                                
                                                            </div>
                                                        
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    
                                    </form>
                                
				</div>
                                
                                
                                <div class="col-xl-12 col-lg-12 col-md-12 mb-6">
                                    <div class="form-group has-error error_info" id="error_info">
                                            <label class="form-label"><i class="fa fa-times-circle-o"></i> <? echo $adm_lang['introduzca_campos'] ?></label>
                                    </div>
                                    <div class="form-group has-warning" id="check_info" style="display:none">
                                            <label class="form-label"><i class="fa fa-times-circle-o"></i> <? echo $adm_lang['las_contraseñas_no_coinciden'] ?></label>
                                    </div>
                                    <div class="form-group has-warning" id="format_info" style="display:none">
                                            <label class="form-label"><i class="fa fa-times-circle-o"></i> <? echo $adm_lang['contrasena_minimo_caracteres'] ?></label>
                                    </div>
                                                                        
                                    <button id="btn_save" class="btn btn-primary"><i class="fa fa-check"></i> <? echo $adm_lang['cambiar'] ?></button>
                                    
				</div>
					
                                                                                                                                                      
                                		
			</div>                                                                            
                        
                    </div>
                </div>


            </div>

            <? include('include/footer.php'); ?>

        </div>

    
    </body>
    
   
</html>