<?php
    include("../system/config/config.inc.php");
    include("include/include.inc.php");    
    include("$appSystemPath/lib/data.inc.2.2.php");   
    $appTableName = TBL::USUARIO;
    include("server/form.php");
    
?>
<!DOCTYPE html>
<html>
  <head>

      <? include('include/head.php'); ?>
      
      <script src="<? echo $appAdmUrl ?>/js/usuario.js?id=<? echo uniqid() ?>" type="text/javascript"></script>
      
      <script type="text/javascript">
          $(document).ready(function() {

            activate_menu('usu',1);      
                        
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
                                    <h4 class="page-title"><? echo $adm_lang['usuarios_registrados'] ?></h4>
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
                                                                                                        
                                                    <div class="col-md-3">
                                                    
                                                            <div class="form-group">
                                                                  <label class="form-label"><? echo $adm_lang['tipo'] ?></label>
                                                                  <select class="form-control custom-select select2" id="id_tipo" name="id_tipo">  
                                                                      <option value="0"></option>
                                                                      <? echo $opt_tipo ?>
                                                                  </select>
                                                            </div> 
                                                       
                                                    </div>
                                                    <div class="col-md-4">

                                                            <div class="form-group">
                                                                    <label class="form-label"><? echo $adm_lang['nombre'] ?> <span class="text-red">*</span></label>
                                                                    <input type="text" class="form-control" id="nombre" name="nombre" value="<? echo $row['t_nombre'] ?>" />                               
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-5">

                                                            <div class="form-group">
                                                                    <label class="form-label"><? echo $adm_lang['apellidos'] ?> <span class="text-red">*</span></label>
                                                                    <input type="text" class="form-control" id="apellidos" name="apellidos" value="<? echo $row['t_apellidos'] ?>" />                               
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-8">

                                                            <div class="form-group">
                                                                    <label class="form-label">Email <span class="text-red">*</span></label>
                                                                    <input type="text" class="form-control" id="email" name="email" value="<? echo $row['t_email'] ?>" />                               
                                                            </div>
                                                        
                                                    </div>
                                                    
                                                    <? if ($id == 0) { ?>
                                                    <div class="col-md-4">
                                                            
                                                            <div class="form-group">
                                                                    <label class="form-label">Password</label>
                                                                    <input type="password" class="form-control" id="password" name="password" value="" />                               
                                                            </div>                                                              
                                                        
                                                    </div>
                                                    <? } ?>
                                                    
                                                    <div class="col-md-4">

                                                            <div class="form-group">
                                                                    <label class="form-label"><? echo $adm_lang['codigo'] ?></label>
                                                                    <input type="text" class="form-control" id="codigo" name="codigo" value="<? echo $row['t_codigo'] ?>" />                               
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-4">

                                                            <div class="form-group">
                                                                  <label class="form-label"><? echo $adm_lang['tipo_documento'] ?></label>
                                                                  <select class="form-control custom-select select2" id="id_documento" name="id_documento">  
                                                                      <option value="0"></option>
                                                                      <? echo $opt_documento ?>
                                                                  </select>
                                                            </div> 
                                                        
                                                    </div>
                                                    <div class="col-md-4 s">    

                                                            <div class="form-group">
                                                                    <label class="form-label"><? echo $adm_lang['nif'] ?></label>
                                                                    <input type="text" class="form-control" id="nif" name="nif" value="<? echo $row['t_nif'] ?>" />                               
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-8">    

                                                            <div class="form-group">
                                                                    <label class="form-label"><? echo $adm_lang['empresa'] ?></label>
                                                                    <input type="text" class="form-control" id="empresa" name="empresa" value="<? echo $row['t_empresa'] ?>" />                               
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-4">    

                                                            <div class="form-group">
                                                                    <label class="form-label"><? echo $adm_lang['cif'] ?></label>
                                                                    <input type="text" class="form-control" id="cif" name="cif" value="<? echo $row['t_cif'] ?>" />                               
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-12">    

                                                            <div class="form-group">
                                                                    <label class="form-label"><? echo $adm_lang['direccion'] ?></label>
                                                                    <input type="text" class="form-control" id="direccion" name="direccion" value="<? echo $row['t_direccion'] ?>" />                               
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-4">    

                                                            <div class="form-group">
                                                                    <label class="form-label"><? echo $adm_lang['numero'] ?></label>
                                                                    <input type="text" class="form-control" id="numero" name="numero" value="<? echo $row['t_numero'] ?>" />                               
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-4">    

                                                            <div class="form-group">
                                                                    <label class="form-label"><? echo $adm_lang['piso'] ?></label>
                                                                    <input type="text" class="form-control" id="piso" name="piso" value="<? echo $row['t_piso'] ?>" />                               
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-4">    

                                                            <div class="form-group">
                                                                    <label class="form-label"><? echo $adm_lang['puerta'] ?></label>
                                                                    <input type="text" class="form-control" id="puerta" name="puerta" value="<? echo $row['t_puerta'] ?>" />                               
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-4">    

                                                            <div class="form-group">
                                                                    <label class="form-label"><? echo $adm_lang['codigo_postal'] ?></label>
                                                                    <input type="text" class="form-control" id="cod_postal" name="cod_postal" value="<? echo $row['t_cod_postal'] ?>" />                               
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-8">    

                                                            <div class="form-group">
                                                                  <label class="form-label"><? echo $adm_lang['poblacion'] ?></label>
                                                                  <select class="form-control custom-select select2" id="id_poblacion" name="id_poblacion">  
                                                                      <option value="0"></option>
                                                                      <? echo $opt_poblacion ?>
                                                                  </select>
                                                            </div> 
                                                        
                                                    </div>
                                                    <div class="col-md-12">    

                                                            <div class="form-group">
                                                                    <label class="form-label"><? echo $adm_lang['poblacion'] ?></label>
                                                                    <input type="text" class="form-control" id="poblacion" name="poblacion" value="<? echo $row['t_poblacion'] ?>" />                               
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-6">    

                                                            <div class="form-group">
                                                                  <label class="form-label"><? echo $adm_lang['provincia'] ?></label>
                                                                  <select class="form-control custom-select select2" id="id_provincia" name="id_provincia">  
                                                                      <option value="0"></option>
                                                                      <? echo $opt_provincia ?>
                                                                  </select>
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-6">    

                                                            <div class="form-group">
                                                                    <label class="form-label"><? echo $adm_lang['provincia'] ?></label>
                                                                    <input type="text" class="form-control" id="provincia" name="provincia" value="<? echo $row['t_provincia'] ?>" />                               
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-6">    

                                                            <div class="form-group">
                                                                  <label class="form-label"><? echo $adm_lang['pais'] ?></label>
                                                                  <select class="form-control custom-select select2" id="id_pais" name="id_pais">  
                                                                      <option value="0"></option>
                                                                      <? echo $opt_pais ?>
                                                                  </select>
                                                            </div> 
                                                        
                                                    </div>
                                                    <div class="col-md-6">    

                                                            <div class="form-group">
                                                                    <label class="form-label"><? echo $adm_lang['pais'] ?></label>
                                                                    <input type="text" class="form-control" id="pais" name="pais" value="<? echo $row['t_pais'] ?>" />                               
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-3">    

                                                            <div class="form-group">
                                                                    <label class="form-label"><? echo $adm_lang['telefono'] ?></label>
                                                                    <input type="text" class="form-control" id="telefono" name="telefono" value="<? echo $row['t_telefono'] ?>" />                               
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-3">    

                                                            <div class="form-group">
                                                                    <label class="form-label"><? echo $adm_lang['movil'] ?></label>
                                                                    <input type="text" class="form-control" id="movil" name="movil" value="<? echo $row['t_movil'] ?>" />                               
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-3">    

                                                            <div class="form-group">
                                                                    <label class="form-label"><? echo $adm_lang['fax'] ?></label>
                                                                    <input type="text" class="form-control" id="fax" name="fax" value="<? echo $row['t_fax'] ?>" />                               
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-3">    

                                                            <div class="form-group">
                                                                    <label class="form-label"><? echo $adm_lang['web'] ?></label>
                                                                    <input type="text" class="form-control" id="web" name="web" value="<? echo $row['t_web'] ?>" />                               
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-3">    

                                                            <div class="form-group">
                                                                    <label class="form-label"><? echo $adm_lang['fecha_nacimiento'] ?></label>
                                                                    <input type="text" class="form-control" id="fecha_nac" name="fecha_nac" value="<? echo $fecha_nac ?>" data-provide="datepicker" />                               
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-3">    

                                                            <div class="form-group">
                                                                  <label class="form-label"><? echo $adm_lang['tratamiento'] ?></label>
                                                                  <select class="form-control custom-select select2" id="id_tratamiento" name="id_tratamiento">  
                                                                      <option value="0"></option>
                                                                      <? echo $opt_tratamiento ?>
                                                                  </select>
                                                            </div> 
                                                        
                                                    </div>
                                                    
                                                    <div class="col-md-6">

                                                            <div class="form-group">
                                                                <? if (!empty($url_foto)) { ?>

                                                                <label class="form-label"><? echo $adm_lang['foto'] ?></label><br/>
                                                                <img name="img" id="img" src="<? echo $url_foto ?>" style="max-width:200px" />
                                                                <a class="link link_del" href="javascript:delete_file('<? echo $delete_file_page ?>','foto');"><i class="fa fa-trash-o"></i> <? echo $adm_lang['borrar'] ?></a>

                                                                <? } else { ?>

                                                                <div class="input-group">
                                                                    <div class="form-label"><? echo $adm_lang['foto'] ?></div>                                                                                                        
								</div>  
                                                                <div class="input-group mb-5">
                                                                    <input type="text" class="form-control form-file browse-file" placeholder="<? echo $adm_lang['seleccionar_fichero'] ?>">
                                                                    <label class="input-group-btn">
                                                                        <span class="btn btn-primary">
                                                                            <? echo $adm_lang['seleccionar'] ?> <input type="file" style="display: none;" id="foto" name="foto">
                                                                        </span>
                                                                    </label>                                                                    
                                                                </div>
                                                                <div class="help-block"><? echo $adm_lang['tamaño_maximo_1mb'] ?></div>                                                                                                  
								
                                                                <? } ?>
                                                            </div>
                                                        
                                                    </div>
                                                    
                                                    <? if ($id > 0) { ?>
                                                    <div class="col-md-3">    

                                                            
                                                            <div class="form-group">
                                                                    <label class="form-label"><? echo $adm_lang['fecha_alta'] ?></label>
                                                                    <div><? echo $fecha_alta ?></div>                              
                                                            </div>                                                            
                                                        
                                                    </div>
                                                    <? } ?>
                                                    
                                                    <div class="col-md-3">
                                                        
                                                            <div class="form-group-checkbox">
                                                                <label class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="newsletter" name="newsletter" value="1" <? echo $newsletter ?> />
                                                                    <span class="custom-control-label"><? echo $adm_lang['recibe_newsletter'] ?></span>
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
                                                    
                                                    
                                                    
                                                    <? if ($id == 0) { ?>
                                                    <input type="hidden" id="fecha_alta" name="fecha_alta" value="<? echo date('Y-m-d') ?>" />   
                                                    <? } ?>
                                                                                
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