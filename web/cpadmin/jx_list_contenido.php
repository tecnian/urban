<?php
    include("../system/config/config.inc.php");
    include("include/include.inc.php");
    $appTableName = TBL::CONTENIDO;
    include("server/datagrid.php");
    
?>

                        <div class="page-header sublist">
                                <div class="page-leftheader">
                                    <h5 class="page-title"><? echo $adm_lang['contenidos'] ?></h5>
				</div>
                            
				<div class="page-rightheader ml-auto d-lg-flex d-none taula">
				
                                    <div class="btn-list">
                                        <button id="btn_add" class="btn btn-primary" onclick="javascript:get_form_contenido(<? echo $id_pagina ?>,0,'<? echo SYS::ACTION_ADD ?>');"><i class="fa fa-plus"></i> <? echo $adm_lang['anadir'] ?></button>
                                        <button id="btn_delete" class="btn btn-danger" onclick="javascript:send_delete_contenido(<? echo $id_pagina ?>,<? echo $appTableName ?>);"><i class="fa fa-close"></i> <? echo $adm_lang['eliminar'] ?></button>                                     
                                    </div>
				
                                </div>
			</div>


                        <div class="row">
							
                            <div class="col-12 m">
								
				<form name="jxFormGrid2" id="jxFormGrid2" method="post" action="<? echo $delete_page ?>">
                                    
                                        <div class="card">
									
                                            <div class="card-body">
										
                                                <div class="table-responsive">
                                                    
                                                        <table id="tbl_data" class="table table-striped table-bordered text-nowrap table-custom subtable">

                                                            <thead>
                                                                    <tr>
                                                                            <th class="check"><input class="check_box" name="all_items" id="all_items" type="checkbox" /></th>
                                                                            <th><? echo $adm_lang['tipo'] ?></th> 
                                                                            <th><? echo $adm_lang['contenido'] ?></th>     
                                                                            <th><? echo $adm_lang['activo'] ?></th> 
                                                                            <th>ID</th> 
                                                                    </tr>
                                                            </thead>
                                                            <tbody>
                                                            <? for($i = 0; $i < count($row); $i++) { ?>
                                                            <?
                                                            $texto = '';

                                                            if ($row[$i]['id_tipo'] == OPT::CONT_TITULO || $row[$i]['id_tipo'] == OPT::CONT_SUBTITULO)
                                                            {
                                                                $texto = $row[$i]['titulo'];
                                                            }
                                                            if ($row[$i]['id_tipo'] == OPT::CONT_TEXTO_CORTO)
                                                            {
                                                                $texto = clip_text(strip_tags($row[$i]['texto']),100);
                                                            }
                                                            if ($row[$i]['id_tipo'] == OPT::CONT_TEXTO_HTML || $row[$i]['id_tipo'] == OPT::CONT_TEXTO_IMAGEN)
                                                            {
                                                                $texto = clip_text(strip_tags($row[$i]['texto_html']),100);
                                                            }    
                                                            if ($row[$i]['id_tipo'] == OPT::CONT_LINK)
                                                            {
                                                                $texto = $row[$i]['enlace'];
                                                            }
                                                            if ($row[$i]['id_tipo'] == OPT::CONT_IMAGEN)
                                                            {
                                                                $texto = '<img src="'.$appFilesUrlImg.'/'.$row[$i]['imagen'].'" alt="" style="max-width:300px;max-height:150px" />';
                                                            }
                                                            if ($row[$i]['id_tipo'] == OPT::CONT_SLIDER || $row[$i]['id_tipo'] == OPT::CONT_CARRUSEL)
                                                            {
                                                                $cond = "id = ".$row[$i]['id_slider'];
                                                                $nom_slider = $_slider->field_value('nombre',$cond);

                                                                $texto = '[ '.$nom_slider.' ]';
                                                            }
                                                            if ($row[$i]['id_tipo'] == OPT::CONT_VIDEO)
                                                            {
                                                                $texto = '[ vídeo ]';
                                                            }
                                                            if ($row[$i]['id_tipo'] == OPT::CONT_FICHERO)
                                                            {
                                                                $texto = '[ '.$row[$i]['nombre'].' ]';
                                                            }
                                                            ?>
                                                            <tr>
                                                                <td class="check"><input name="item_<? echo $row[$i]['id'] ?>" type="checkbox" /></td>
                                                                <td><a href="javascript:get_form_contenido(<? echo $id_pagina ?>,<? echo $row[$i]['id'] ?>,'<? echo SYS::ACTION_UPDATE ?>');"><? echo $options_tipo_contenido[$row[$i]['id_tipo']] ?></a></td>   
                                                                <td><? echo $texto ?></td>
                                                                <td><? echo $options_si_no[$row[$i]['activo']] ?></td>    
                                                                <td><? echo $row[$i]['id'] ?></td>    
                                                            </tr>
                                                            <? } ?>
                                                          </tbody>  

                                                        </table>
                                                    
						</div>
					
                                            </div>
								
                                        </div>
                                
                            </form>
																						
                            </div>
						
                        </div>

    