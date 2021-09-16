<?php
    include("../system/config/config.inc.php");
    include("include/include.inc.php");
    $appTableName = TBL::SLIDER_ITEM;
    include("server/datagrid.php");
    
?>

                        <div class="page-header sublist">
                                <div class="page-leftheader">
                                    <h5 class="page-title"><? echo $adm_lang['imagenes'] ?></h5>
				</div>
                            
				<div class="page-rightheader ml-auto d-lg-flex d-none taula">
				
                                    <div class="btn-list">
                                        <button id="btn_add" class="btn btn-primary" onclick="javascript:get_form_foto(<? echo $id_slider ?>,0,'<? echo SYS::ACTION_ADD ?>');"><i class="fa fa-plus"></i> <? echo $adm_lang['anadir'] ?></button>
                                        <button id="btn_delete" class="btn btn-danger" onclick="javascript:send_delete_foto(<? echo $id_slider ?>,<? echo $appTableName ?>);"><i class="fa fa-close"></i> <? echo $adm_lang['eliminar'] ?></button>                                       
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
                                                                            <th><? echo $adm_lang['imagen'] ?></th>
                                                                            <th><? echo $adm_lang['activo'] ?></th>
                                                                    </tr>
                                                            </thead>
                                                            <tbody>
                                                                <? for($i = 0; $i < count($row); $i++) {

                                                                        if (!empty($row[$i]['imagen']))
                                                                         {
                                                                             $url_fichero = $appFilesUrlImg.'/'.$row[$i]['imagen'];
                                                                             $img_ok = true;
                                                                         }
                                                                         else
                                                                         {
                                                                             $img_ok = false;
                                                                             $msg = "[".$adm_lang['sin_imagen']."]";
                                                                         }
                                                               ?>
                                                               <tr>
                                                                   <td class="check"><input name="item_<? echo $row[$i]['id'] ?>" type="checkbox" /></td>
                                                                   <td><a href="javascript:get_form_foto(<? echo $id_slider ?>,<? echo $row[$i]['id'] ?>,'<? echo SYS::ACTION_UPDATE ?>');"><? if ($img_ok) { ?><img width="100" src="<? echo $url_fichero ?>" alt="<? echo $row[$i]['imagen'] ?>" border="0" /><? } else { ?><? echo $msg ?><? } ?></a></td>
                                                                   <td><? echo $options_si_no[$row[$i]['activo']] ?></td>      
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

    