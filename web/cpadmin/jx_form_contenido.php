<?php
    include("../system/config/config.inc.php");
    include("include/include.inc.php");    
    include("$appSystemPath/lib/data.inc.2.2.php");   
    $appTableName = TBL::CONTENIDO;
    include("server/form.php");
    
?>    

    <div class="page-header">
	<div class="page-leftheader">
		<div class="btn-list">
                        <button id="btn_back" class="btn btn-primary" onclick="javascript:get_list_contenido(<? echo $id_pagina ?>);">< <? echo $adm_lang['volver'] ?></button>
                </div>
	</div>
    </div>
    
    <form name="jxFormData" id="jxFormData" method="post" enctype="multipart/form-data" action="<? echo $action_page ?>">
    
    <div class="row">
        
        
        
            <div class="col-xl-12 col-lg-12 col-md-12">
                        
                
                <div class="card">

                    <div class="card-body">

                        <div class="row">
                            
                            <div class="col-md-6">
                                                          
                                <div class="form-group">
                                      <label class="form-label"><? echo $adm_lang['tipo'] ?> <span class="text-red">*</span></label>
                                      <select class="form-control custom-select select2" id="id_tipo" name="id_tipo">  
                                          <option value="0"></option>
                                          <? echo $opt_tipo ?>
                                      </select>
                                </div>
                                
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                      <label class="form-label"><? echo $adm_lang['orden'] ?> <span class="text-red">*</span></label>
                                      <select class="form-control custom-select select2" id="orden" name="orden">  
                                          <? echo $opt_orden ?>
                                      </select>
                                </div>
                                
                            </div>
                            <div class="col-md-12 f-nombre field">

                                <div class="form-group">
                                        <label class="form-label"><? echo $adm_lang['nombre'] ?> <span class="text-red">*</span></label>
                                        <input type="text" class="form-control" id="nombre_cont" name="nombre" value="<? echo $row['t_nombre'] ?>" />                               
                                </div>
                                
                            </div>
                            <div class="col-md-6 f-fichero field">

                                <div class="form-group">
                                    <? if (!empty($url_fichero)) { ?>

                                    <label class="form-label"><? echo $adm_lang['fichero'] ?></label><br/>
                                    <a href="<? echo $url_fichero ?>" target="_blank"><? echo $row['t_fichero'] ?></a>
                                    <a class="link link_del" href="javascript:send_delete_file_contenido(<? echo $id ?>,<? echo $id_pagina ?>,<? echo $appTableName ?>,'fichero');"><i class="fa fa-trash-o"></i> <? echo $adm_lang['borrar'] ?></a>  

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
                            <div class="col-md-6 f-imagen field">

                                <div class="form-group form-group-file">
                                    <? if (!empty($url_imagen)) { ?>

                                    <label class="form-label"><? echo $adm_lang['imagen'] ?></label><br/>
                                    <img name="img" id="img" src="<? echo $url_imagen ?>" style="max-width:200px" />
                                    <a class="link link_del" href="javascript:send_delete_file_contenido(<? echo $id ?>,<? echo $id_pagina ?>,<? echo $appTableName ?>,'imagen');"><i class="fa fa-trash-o"></i> <? echo $adm_lang['borrar'] ?></a>

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
                            <div class="col-md-6 f-slider field">

                                <div class="form-group">
                                      <label class="form-label"><? echo $adm_lang['slider'] ?> <span class="text-red">*</span></label>
                                      <select class="form-control custom-select select2" id="id_slider" name="id_slider">  
                                          <option value="0"></option>
                                          <? echo $opt_slider ?>
                                      </select>
                                </div>
                                
                            </div>
                            
                            <div class="col-md-3">

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
                                                                                                            <li class=""><a href="#tab2_<? echo $n ?>" <? if ($n == 1) {?> class="active"<? } ?> data-toggle="tab"><? echo $opt_idioma[$n] ?></a></li>                                                                                                            
                                                                                                        <? } ?>
                                                                                                    </ul>
                                                                                            </div>
                                                                                    </div>
                                                                                    <div class="panel-body tabs-menu-body">
                                                                                            <div class="tab-content">
                                                                                                
                                                                                                    <? for ($n = 1; $n <= count($opt_idioma); $n++) { ?>
                                                                                                
                                                                                                    <div class="tab-pane <? if ($n == 1) {?> active<? } ?>" id="tab2_<? echo $n ?>">
                                                                                                        
                                                                                                        <div class="row">    
                                                                                                            
                                                                                                            <div class="col-md-12">
                                                                                                                <br/>
                                                                                                            </div>
                                                                                                        
                                                                                                            <div class="col-md-12 f-titulo field">
                                                                                                            
                                                                                                                    <div class="form-group">
                                                                                                                            <label class="form-label"><? echo $adm_lang['titulo'] ?> <span class="text-red">*</span></label>
                                                                                                                            <input type="text" class="form-control" id="titulo_cont_<? echo $n ?>" name="titulo_<? echo $n ?>" value="<? echo $row_lang[$n]['t_titulo'] ?>" />                               
                                                                                                                    </div>
                                                                                                                
                                                                                                            </div>
                                                                                                            <div class="col-md-12 f-subtitulo field">

                                                                                                                    <div class="form-group">
                                                                                                                            <label class="form-label"><? echo $adm_lang['subtitulo'] ?></label>
                                                                                                                            <input type="text" class="form-control" id="subtitulo_cont_<? echo $n ?>" name="subtitulo_<? echo $n ?>" value="<? echo $row_lang[$n]['t_subtitulo'] ?>" />                               
                                                                                                                    </div>
                                                                                                                
                                                                                                            </div>
                                                                                                            <div class="col-md-12 f-texto-editor field">

                                                                                                                    <div class="form-group">
                                                                                                                            <label class="form-label"><? echo $adm_lang['texto'] ?></label>
                                                                                                                            <textarea class="form-control" name="texto_html_<? echo $n ?>" id="texto_html_<? echo $n ?>" rows="5"><? echo $row_lang[$n]['t_texto_html'] ?></textarea>                            
                                                                                                                    </div>
                                                                                                                
                                                                                                            </div>
                                                                                                            <div class="col-md-12 f-texto field">

                                                                                                                    <div class="form-group">
                                                                                                                            <label class="form-label"><? echo $adm_lang['texto'] ?> <span class="text-red">*</span></label>
                                                                                                                            <textarea class="form-control" name="texto_<? echo $n ?>" id="texto_<? echo $n ?>" rows="5"><? echo $row_lang[$n]['t_texto'] ?></textarea>                            
                                                                                                                    </div>
                                                                                                                
                                                                                                            </div>
                                                                                                            <div class="col-md-6 f-enlace field">

                                                                                                                    <div class="form-group">
                                                                                                                            <label class="form-label"><? echo $adm_lang['enlace'] ?></label>
                                                                                                                            <input type="text" class="form-control" id="enlace_<? echo $n ?>" name="enlace_<? echo $n ?>" value="<? echo $row_lang[$n]['t_enlace'] ?>" />                               
                                                                                                                    </div>
                                                                                                           
                                                                                                            </div>
                                                                                                            <div class="col-md-6 f-title field">

                                                                                                                    <div class="form-group">
                                                                                                                            <label class="form-label">Title</label>
                                                                                                                            <input type="text" class="form-control" id="title_<? echo $n ?>" name="title_<? echo $n ?>" value="<? echo $row_lang[$n]['t_title'] ?>" />                               
                                                                                                                    </div>
                                                                                                                
                                                                                                            </div>
                                                                                                            <div class="col-md-6 f-target field">

                                                                                                                    <div class="form-group">
                                                                                                                        <label class="form-label"><? echo $adm_lang['tipo_enlace'] ?></label>
                                                                                                                        <select class="form-control custom-select select2" id="id_target_<? echo $n ?>" name="id_target_<? echo $n ?>">  
                                                                                                                            <? echo $opt_target[$n] ?>
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                
                                                                                                            </div>
                                                                                                            <div class="col-md-6 f-enlace field">

                                                                                                                    <div class="form-group">
                                                                                                                            <label class="form-label">Follow</label>
                                                                                                                            <input type="text" class="form-control" id="follow_<? echo $n ?>" name="follow_<? echo $n ?>" value="<? echo $row_lang[$n]['t_follow'] ?>" />                               
                                                                                                                    </div>
                                                                                                                
                                                                                                            </div>
                                                                                                            <div class="col-md-12 f-video field">

                                                                                                                    <div class="form-group">
                                                                                                                            <label class="form-label"><? echo $adm_lang['video'] ?> <span class="text-red">*</span></label>
                                                                                                                            <textarea class="form-control" name="video_<? echo $n ?>" id="video_<? echo $n ?>" rows="5"><? echo $row_lang[$n]['t_video'] ?></textarea>                            
                                                                                                                    </div>
                                                                                                                
                                                                                                            </div>
                                                                                                            <div class="col-md-6 f-fichero field">

                                                                                                                    <div class="form-group">
                                                                                                                        <? if (!empty($url_fichero_lang[$n])) { ?>

                                                                                                                        <label class="form-label"><? echo $adm_lang['fichero'] ?></label><br/>
                                                                                                                        <a href="<? echo $url_fichero_lang[$n] ?>" target="_blank"><? echo $row_lang[$n]['t_fichero'] ?></a>
                                                                                                                        <a class="link link_del" href="javascript:send_delete_file_contenido(<? echo $id ?>,<? echo $id_pagina ?>,<? echo $appTableName ?>,'fichero',<? echo $n ?>);"><i class="fa fa-trash-o"></i> <? echo $adm_lang['borrar'] ?></a>                                        

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
                                                                                                            <div class="col-md-6 f-imagen field">

                                                                                                                    <div class="form-group">
                                                                                                                        <? if (!empty($url_imagen_lang[$n])) { ?>

                                                                                                                        <label class="form-label"><? echo $adm_lang['imagen'] ?></label><br/>
                                                                                                                        <img name="img" id="img" src="<? echo $url_imagen_lang[$n] ?>" style="max-width:200px" />
                                                                                                                        <a class="link link_del" href="javascript:send_delete_file_contenido(<? echo $id ?>,<? echo $id_pagina ?>,<? echo $appTableName ?>,'imagen',<? echo $n ?>);"><i class="fa fa-trash-o"></i> <? echo $adm_lang['borrar'] ?></a>

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
                                                                                                            <div class="col-md-6 f-alt field">

                                                                                                                    <div class="form-group">
                                                                                                                            <label class="form-label"><? echo $adm_lang['alt_imagen'] ?></label>
                                                                                                                            <input type="text" class="form-control" id="img_alt_<? echo $n ?>" name="img_alt_<? echo $n ?>" value="<? echo $row_lang[$n]['t_img_alt'] ?>" />                               
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
                                    <div class="form-group has-error error_info" id="error_info_cont">
                                            <label class="form-label"><i class="fa fa-times-circle-o"></i> <? echo $adm_lang['introduzca_campos'] ?></label>
                                    </div>                                    
                                    
                                    <button id="btn_save_content" type="button" class="btn btn-primary"><i class="fa fa-check"></i> <? echo $adm_lang['guardar'] ?></button>
                                     
				</div>
        
            
        
    </div>
    
    </form>
    
      
<!--Select2 js -->
<script src="<? echo $appAdmUrl ?>/assets/plugins/select2/select2.full.min.js"></script>
<script src="<? echo $appAdmUrl ?>/assets/js/select2.js"></script>

<script src="<? echo $appAdmUrl ?>//assets/js/file-upload.js"></script>

<script>
 
$(document).ready(function() {

    $(".field").css('display','none');
    
    show_fields($("#id_tipo").val());
        
    $("#btn_save_content").click(function() {

        save_form_contenido();

    });
    
    $("#id_tipo").change(function() {

        show_fields($("#id_tipo").val());

    });
    
    <? for ($n = 1; $n <= count($opt_idioma); $n++) { ?>     
                    
                CKEDITOR.replace('texto_html_<? echo $n ?>',
                {
                    customConfig : '<? echo $appAdmUrl ?>/js/ckeditor.config.js',
                    width: '100%',
                    height: '200px'
                });
                                
    <? } ?>
        

});
</script>