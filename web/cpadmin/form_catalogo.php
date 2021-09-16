<?php
    include("../system/config/config.inc.php");
    include("include/include.inc.php");    
    include("$appSystemPath/lib/data.inc.2.2.php");   
    $appTableName = TBL::CATALOGO;
    include("server/form.php");
    
?>
<!DOCTYPE html>
<html>
  <head>

      <? include('include/head.php'); ?>
      
      <script type="text/javascript" src="<? echo $appSystemUrl ?>/js/ckeditor/ckeditor.js"></script>
      
      <script src="<? echo $appAdmUrl ?>/js/catalogo.js?id=<? echo uniqid() ?>" type="text/javascript"></script>
      
      <script type="text/javascript">
          $(document).ready(function() {

            activate_menu('sec<? echo $type ?>',1);
            
            get_list_foto(<? echo $type ?>,<? echo $id ?>);
            
            
            <? for ($n = 1; $n <= count($opt_idioma); $n++) { ?>     
                    
                CKEDITOR.replace('descripcion_<? echo $n ?>',
                {
                    customConfig : '<? echo $appAdmUrl ?>/js/ckeditor.config.js',
                    width: '100%',
                    height: '200px'
                });                
                                
            <? } ?>
            
            
            
            //MOD::multi_item
            
            /*$('.add_multi_item').click(function(){            

                add_multi_item();                             

            });
    
            <? //for ($n = 0; $n < count($multi_item); $n++) { ?>
            $('#del_multi_item_<? //echo $n ?>').click(function() {

                    if (window.confirm(app_lang['desea_eliminar_elemento']))
                    {
                        var item = $(this).attr('data-item');
                                                                
                        $('#multi_item_' + item).remove();
                    }

            });     
            <? //} ?>
            */ 
               
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
                                    <h4 class="page-title"><? echo $nom_seccion ?></h4>
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

                                                    <div class="col-md-2">

                                                            <div class="form-group">
                                                                    <label class="form-label"><? echo $adm_lang['fecha'] ?> <span class="text-red">*</span></label>
                                                                    <input type="text" class="form-control form-fecha" id="fecha" name="fecha" value="<? echo $fecha ?>" />                               
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-5">

                                                            <div class="form-group">
                                                                  <label class="form-label"><? echo $adm_lang['categoria'] ?></label>
                                                                  <select class="form-control custom-select select2" id="id_categoria" name="id_categoria">  
                                                                      <option value="0"></option>
                                                                      <? echo $opt_categoria ?>
                                                                  </select>
                                                                  <input type="hidden" id="id_categoria_ini" name="id_categoria_ini" value="<? echo $row['n_id_categoria'] ?>" /> 
                                                            </div>  
                                                        
                                                    </div>
                                                    <div class="col-md-5">

                                                            <div class="form-group">
                                                                  <label class="form-label"><? echo $adm_lang['parent'] ?></label>
                                                                  <select class="form-control custom-select select2" id="id_parent" name="id_parent">  
                                                                      <option value="0">- <? echo $adm_lang['ninguna'] ?> -</option>
                                                                      <? echo $opt_parent ?>
                                                                  </select>
                                                                  <input type="hidden" id="id_parent_ini" name="id_parent_ini" value="<? echo $row['n_id_parent'] ?>" /> 
                                                            </div>  
                                                        
                                                    </div>
                                                    <div class="col-md-4">

                                                            <div class="form-group">
                                                                    <label class="form-label"><? echo $adm_lang['precio'] ?></label>
                                                                    <input type="text" class="form-control" id="precio" name="precio" value="<? echo str_replace(".",",",$row['n_precio']) ?>" />                               
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-4">

                                                            <div class="form-group">
                                                                    <label class="form-label"><? echo $adm_lang['numero'] ?></label>
                                                                    <input type="text" class="form-control" id="numero" name="numero" value="<? echo $row['n_numero'] ?>" />                               
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-4">

                                                            <div class="form-group">
                                                                    <label class="form-label"><? echo $adm_lang['referencia'] ?></label>
                                                                    <input type="text" class="form-control" id="referencia" name="referencia" value="<? echo $row['t_referencia'] ?>" />                               
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-6">

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
                                                    <div class="col-md-6">

                                                            <div class="form-group">
                                                                <? if (!empty($url_fichero)) { ?>

                                                                <label class="form-label"><? echo $adm_lang['fichero'] ?></label><br/>
                                                                <a href="<? echo $url_fichero ?>" target="_blank"><? echo $row['t_fichero'] ?></a>
                                                                <a class="link link_del" href="javascript:delete_file('<? echo $delete_file_page ?>&type=<? echo $type?>','fichero');"><i class="fa fa-trash-o"></i> <? echo $adm_lang['borrar'] ?></a>                                

                                                                <? } else { ?>

                                                                <div class="input-group">
                                                                    <div class="form-label"><? echo $adm_lang['fichero'] ?></div>                                                                                                        
								</div>  
                                                                <div class="input-group mb-5">
                                                                    <input type="text" class="form-control form-file browse-file" placeholder="<? echo $adm_lang['seleccionar_fichero'] ?>">
                                                                    <label class="input-group-btn">
                                                                        <span class="btn btn-primary">
                                                                            <? echo $adm_lang['seleccionar'] ?> <input type="file" style="display: none;" id="fichero" name="fichero">
                                                                        </span>
                                                                    </label>                                                                    
                                                                </div>
                                                                <!--<div class="help-block"><? echo $adm_lang['tamaño_maximo_1mb'] ?></div> -->  

                                                                <? } ?>
                                                            </div>  
                                                        
                                                    </div>
                                                    <div class="col-md-3">

                                                            <div class="form-group">
                                                                  <label class="form-label"><? echo $adm_lang['orden'] ?> <span class="text-red">*</span></label>
                                                                  <div id="jxOrden">
                                                                  <select class="form-control custom-select select2" id="orden" name="orden">  
                                                                      <? echo $opt_orden ?>
                                                                  </select>
                                                                  </div>
                                                            </div> 
                                                        
                                                    </div>
                                                    <div class="col-md-2">

                                                            <div class="form-group-checkbox">
                                                                <label class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="destacado" name="destacado" value="1" <? echo $destacado ?> />
                                                                    <span class="custom-control-label"><? echo $adm_lang['destacado'] ?></span>
                                                                </label>                                                                                            
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
                                                    <div class="col-md-12">
                                                        
                                                            <br/><br/>  
                            
                                                            <!-- MOD::multi_item -->

                                                            <!--

                                                            <div class="form-group">

                                                                    <div class="multi_items quirofano">
                                                                                        <div class="multi_item">
                                                                                            <div class="caption" style="width:25%">Fecha</div>
                                                                                            <div class="caption" style="width:25%">Importe (&euro;)</div>
                                                                                            <div class="caption" style="width:40%">Forma de Pago</div>
                                                                                            <div class="caption" style="width:10%">&nbsp;</div>
                                                                                        </div>
                                                                                        <div id="jxMultiItem">
                                                                                            <? for ($n = 0; $n < count($multi_item); $n++) { ?>
                                                                                            <?

                                                                                                $opt_forma_pago = '';

                                                                                            ?>
                                                                                            <div class="multi_item" id="multi_item_<? echo $n ?>" data-item="<? echo $n ?>">
                                                                                                <div class="field" style="width:25%">
                                                                                                      <input class="form-control form-fecha form-required" type="text" id="multi_item_fecha_<? echo $n ?>_<? echo $multi_item[$n]['id'] ?>" name="multi_item_fecha_<? echo $n ?>_<? echo $multi_item[$n]['id'] ?>" value="<? echo date('d/m/Y',strtotime($multi_item[$n]['fecha'])) ?>">
                                                                                                </div>

                                                                                                <div class="field" style="width:25%">
                                                                                                      <input class="form-control form-cant form-required" type="text" id="multi_item_importe_<? echo $n ?>_<? echo $multi_item[$n]['id'] ?>" name="multi_item_importe_<? echo $n ?>_<? echo $multi_item[$n]['id'] ?>" value="<? echo $multi_item[$n]['importe'] ?>">
                                                                                                </div>

                                                                                                <div class="field" style="width:45%">
                                                                                                      <select class="form-control form-required" id="multi_item_id_forma_pago_<? echo $n ?>_<? echo $multi_item[$n]['id'] ?>" name="multi_item_id_forma_pago_<? echo $n ?>_<? echo $multi_item[$n]['id'] ?>">
                                                                                                          <option value=""></option>
                                                                                                          <? echo $opt_forma_pago ?>
                                                                                                      </select>
                                                                                                </div>


                                                                                                <div class="field" style="width:5%">
                                                                                                      <div class="delete_multi_item" id="del_multi_item_<? echo $n ?>" data-item="<? echo $n ?>"><i class="mdi mdi-close-circle-outline"></i></div>
                                                                                                </div>

                                                                                                <input type="hidden" id="multi_item_idx_<? echo $n ?>" name="multi_item_idx_<? echo $n ?>" value="<? echo $multi_item[$n]['id'] ?>">
                                                                                            </div>
                                                                                            <? } ?>
                                                                                        </div>

                                                                                        <a class="add_multi_item">+ añadir item</a>                                                        

                                                                            </div>
                                                            </div>

                                                            <br/><br/>  

                                                            -->
                            


                                                    </div>	
                                                    
                                                    
                                                    <input type="hidden" id="mode" name="mode" value="<? echo $mode ?>" />
                                                    <input type="hidden" id="id_seccion" name="id_seccion" value="<? echo $type ?>" />
                                                        

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
                                                                                                                            <label class="form-label"><? echo $adm_lang['titulo'] ?> <span class="text-red">*</span></label>
                                                                                                                            <input type="text" class="form-control" id="titulo_<? echo $n ?>" name="titulo_<? echo $n ?>" value="<? echo $row_lang[$n]['t_titulo'] ?>" />                               
                                                                                                                    </div>
                                                                                                            </div>
                                                                                                            <div class="col-md-12">
                                                                                                                    <div class="form-group">
                                                                                                                            <label class="form-label"><? echo $adm_lang['subtitulo'] ?></label>
                                                                                                                            <input type="text" class="form-control" id="subtitulo_<? echo $n ?>" name="subtitulo_<? echo $n ?>" value="<? echo $row_lang[$n]['t_subtitulo'] ?>" />                               
                                                                                                                    </div>
                                                                                                            </div>
                                                                                                            <div class="col-md-12">
                                                                                                                    <div class="form-group">
                                                                                                                            <label class="form-label"><? echo $adm_lang['descripcion'] ?></label>
                                                                                                                            <textarea name="descripcion_<? echo $n ?>" id="descripcion_<? echo $n ?>" rows="10"><? echo $row_lang[$n]['t_descripcion'] ?></textarea>                            
                                                                                                                    </div>
                                                                                                            </div>
                                                                                                            <div class="col-md-6">
                                                                                                                    <div class="form-group f-imagen field">
                                                                                                                        <? if (!empty($url_imagen_lang[$n])) { ?>

                                                                                                                        <label class="form-label"><? echo $adm_lang['imagen'] ?></label><br/>
                                                                                                                        <img name="img" id="img" src="<? echo $url_imagen_lang[$n] ?>" style="max-width:200px" />
                                                                                                                        <a class="link link_del" href="javascript:delete_file('<? echo $delete_file_page ?>&id_idioma=<? echo $n ?>&type=<? echo $type?>','imagen');"><i class="fa fa-trash-o"></i> <? echo $adm_lang['borrar'] ?></a>

                                                                                                                        <? } else { ?>

                                                                                                                        <div class="input-group">
                                                                                                                            <div class="form-label"><? echo $adm_lang['imagen'] ?></div>                                                                                                        
                                                                                                                        </div>  
                                                                                                                        <div class="input-group mb-5">
                                                                                                                            <input type="text" class="form-control form-file browse-file" placeholder="<? echo $adm_lang['seleccionar_fichero'] ?>">
                                                                                                                            <label class="input-group-btn">
                                                                                                                                <span class="btn btn-primary">
                                                                                                                                    <? echo $adm_lang['seleccionar'] ?> <input type="file" style="display: none;" id="imagen_<? echo $n ?>" name="imagen_<? echo $n ?>">
                                                                                                                                </span>
                                                                                                                            </label>                                                                    
                                                                                                                        </div>
                                                                                                                        <div class="help-block"><? echo $adm_lang['tamaño_maximo_1mb'] ?></div>    

                                                                                                                        <? } ?>
                                                                                                                    </div>
                                                                                                            </div>
                                                                                                            <div class="col-md-6">
                                                                                                                    <div class="form-group">
                                                                                                                            <label class="form-label"><? echo $adm_lang['alt_imagen'] ?></label>
                                                                                                                            <input type="text" class="form-control" id="img_alt_<? echo $n ?>" name="img_alt_<? echo $n ?>" value="<? echo $row_lang[$n]['t_img_alt'] ?>" />                               
                                                                                                                    </div>
                                                                                                            </div>
                                                                                                            <div class="col-sm-6 col-md-6">
                                                                                                                    <div class="form-group f-fichero field">
                                                                                                                        <? if (!empty($url_fichero_lang[$n])) { ?>

                                                                                                                        <label class="form-label"><? echo $adm_lang['fichero'] ?></label><br/>
                                                                                                                        <a href="<? echo $url_fichero_lang[$n] ?>" target="_blank"><? echo $row_lang[$n]['t_fichero'] ?></a>
                                                                                                                        <a class="link link_del" href="javascript:delete_file('<? echo $delete_file_page ?>&id_idioma=<? echo $n ?>&type=<? echo $type?>','fichero');"><i class="fa fa-trash-o"></i> <? echo $adm_lang['borrar'] ?></a>                                        

                                                                                                                        <? } else { ?>

                                                                                                                        <div class="input-group">
                                                                                                                            <div class="form-label"><? echo $adm_lang['fichero'] ?></div>                                                                                                        
                                                                                                                        </div>  
                                                                                                                        <div class="input-group mb-5">
                                                                                                                            <input type="text" class="form-control form-file browse-file" placeholder="<? echo $adm_lang['seleccionar_fichero'] ?>">
                                                                                                                            <label class="input-group-btn">
                                                                                                                                <span class="btn btn-primary">
                                                                                                                                    <? echo $adm_lang['seleccionar'] ?> <input type="file" style="display: none;" id="fichero_<? echo $n ?>" name="fichero_<? echo $n ?>">
                                                                                                                                </span>
                                                                                                                            </label>                                                                    
                                                                                                                        </div>
                                                                                                                        <!--<div class="help-block"><? echo $adm_lang['tamaño_maximo_1mb'] ?></div>-->    

                                                                                                                        <? } ?>
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
					
                            </form>
                              
                                
                                <? if ($id > 0) { ?>
                            
                                <div class="col-xl-12 col-lg-12 col-md-12">
								
                                    <div class="card">
									
                                        <div class="card-body">
																				
                                            <div id="jxFotos"></div>
                                            <a name="fotos"></a>
                                                                                
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