<?php
    include("../system/config/config.inc.php");
    include("include/include.inc.php");    
    include("$appSystemPath/lib/data.inc.2.2.php");   
    $appTableName = TBL::CATEGORIA;
    include("server/form.php");
    
?>
<!DOCTYPE html>
<html>
  <head>

      <? include('include/head.php'); ?>
      
      <script type="text/javascript" src="<? echo $appSystemUrl ?>/js/ckeditor/ckeditor.js"></script>
      
      <script src="<? echo $appAdmUrl ?>/js/categoria.js?id=<? echo uniqid() ?>" type="text/javascript"></script>
      
      <script type="text/javascript">
          $(document).ready(function() {

            activate_menu('cat',<? echo $type ?>);
               
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
                                    <h4 class="page-title"><? echo $adm_lang['categorias'] ?> &raquo; <? echo $options_categoria[$type] ?></h4>
				</div>
							
                                <div class="page-rightheader ml-auto d-lg-flex d-none">
					<div class="btn-list">
                                                <button id="btn_back" class="btn btn-primary" data-link="<? echo $grid_page ?>">< <? echo $adm_lang['volver'] ?></button>                                                                                                                                             
                                        </div>
				</div>
			</div>
                        
                        <form role="form" id="formData" method="post" enctype="multipart/form-data" action="<? echo $action_page ?>">   
                        
                        <div class="row">
                            
                            
                            		
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                                                        
								
                                        <div class="card">

                                            <div class="card-body">

                                                <div class="row">
                                                    
                                                    <div class="col-md-8">
                                                        
                                                        <div class="form-group">
                                                                <label class="form-label"><? echo $adm_lang['categoria_padre'] ?></label>
                                                                <select class="form-control custom-select select2" id="id_parent" name="id_parent">  
                                                                    <option value="0">- <? echo $adm_lang['ninguna'] ?> -</option>
                                                                    <? echo $opt_parent ?>
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
                                                    
                                                    <div class="col-md-8">

                                                            <div class="form-group">
                                                                <? if (!empty($url_imagen)) { ?>

                                                                <label class="form-label"><? echo $adm_lang['imagen'] ?></label><br/>
                                                                <img name="img" id="img" src="<? echo $url_imagen ?>" style="max-width:200px" />
                                                                <a class="link link_del" href="javascript:delete_file('<? echo $delete_file_page ?>&type=<? echo $type?>','imagen');"><i class="fa fa-trash-o"></i> <? echo $adm_lang['borrar'] ?></a>

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
                                                     
                                                    <div class="col-md-3">
                                                        
                                                            <div class="form-group-checkbox">
                                                                <label class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="activo" name="activo" value="1" <? echo $activo ?> />
                                                                    <span class="custom-control-label"><? echo $adm_lang['activo'] ?></span>
                                                                </label>                                                                                            
                                                            </div>                                                                                                                                                                        
                                                                                                                                                                             
                                                    </div>
                                                    
                                                    <input type="hidden" id="id_tipo" name="id_tipo" value="<? echo $type ?>" />                          											

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
                                                                                                                            <label class="form-label"><? echo $adm_lang['nombre'] ?> <span class="text-red">*</span></label>
                                                                                                                            <input type="text" class="form-control" id="nombre_<? echo $n ?>" name="nombre_<? echo $n ?>" value="<? echo $row_lang[$n]['t_nombre'] ?>" />                               
                                                                                                                    </div>                                                                                                                                                                                                                                                                        
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
                        
                        </form>
                        
                    </div>
                </div>


            </div>

            <? include('include/footer.php'); ?>

        </div>

    
    </body>
    
   
</html>