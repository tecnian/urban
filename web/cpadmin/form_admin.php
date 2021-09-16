<?php
    include("../system/config/config.inc.php");
    include("include/include.inc.php");    
    include("$appSystemPath/lib/data.inc.2.2.php");   
    $appTableName = TBL::ADMIN;
    include("server/form.php");
    
?>
<!DOCTYPE html>
<html>
  <head>

      <? include('include/head.php'); ?>
      
      <script src="<? echo $appAdmUrl ?>/js/admin.js?id=<? echo uniqid() ?>" type="text/javascript"></script>
      
      <script type="text/javascript">
          $(document).ready(function() {

            activate_menu('adm',1);      
                        
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
                                    <h4 class="page-title"><? echo $adm_lang['administradores'] ?></h4>
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
                                                                    <label class="form-label"><? echo $adm_lang['username'] ?> <span class="text-red">*</span></label>
                                                                    <input type="text" class="form-control" id="usuario" name="usuario" value="<? echo $row['t_usuario'] ?>" />                               
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-6">

                                                            <div class="form-group">
                                                                  <label class="form-label"><? echo $adm_lang['perfil'] ?> <span class="text-red">*</span></label>
                                                                  <select class="form-control custom-select select2" id="id_perfil" name="id_perfil">  
                                                                      <option value="0"></option>
                                                                      <? echo $opt_perfil ?>
                                                                  </select>
                                                            </div> 
                                                        
                                                    </div>
                                                    <div class="col-md-6">

                                                            <div class="form-group">
                                                                    <label class="form-label">Email</label>
                                                                    <input type="text" class="form-control" id="email" name="email" value="<? echo $row['t_email'] ?>" />                               
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
                                                    <div class="col-md-6">
                                                        
                                                            <div class="form-group-checkbox">
                                                                <label class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="activo" name="activo" value="1" <? echo $activo ?> />
                                                                    <span class="custom-control-label"><? echo $adm_lang['activo'] ?></span>
                                                                </label>                                                                                            
                                                            </div>
                                                        
                                                    </div>
                                                    
                                                    <div class="col-md-12">
                                                        
                                                        <hr>                                                           
                                                        
                                                    </div>
                                                    
                                                    <div class="col-md-4">

                                                            <div class="form-group">
                                                                    <label class="form-label">Password</label>
                                                                    <input type="password" class="form-control" id="password" name="password" value="" />                               
                                                            </div>  
                                                            
                                                    </div>
                                                    <div class="col-md-4">

                                                            <div class="form-group">
                                                                    <label class="form-label"><? echo $adm_lang['confirmar'] ?> Password</label>
                                                                    <input type="password" class="form-control" id="password2" name="password2" value="" />                               
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
                                    <div class="form-group has-error" id="error_psw" style="display:none">
                                            <label class="form-label"><i class="fa fa-times-circle-o"></i> <? echo $adm_lang['las_contraseñas_no_coinciden'] ?></label>
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