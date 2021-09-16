<?php
    include("../system/config/config.inc.php");
    include("include/include.inc.php");      
    $appTableName = TBL::CONTACTO_WEB;
    include("server/datagrid.php");
    
    $row_exp = array();
    
    if (!empty($export))
    {
        include("server/exportar.php");
    }
    
?>
<!DOCTYPE html>
<html>
    <head>

        <? include('include/head.php'); ?>
      
        <script type="text/javascript">
            $(document).ready(function() {

                activate_menu('con',1);
            
                $("#tbl_data").dataTable({
                    "bStateSave": true,
                    "order": [[ 1, "asc" ]],                
                    <? echo $app_dataTable_lang; ?>
                });

                $('#btn_exportar').click(function() {

                    exportar();   

                }); 

                $('#btn_exportar_xls').click(function() {

                    exportar_excel();   

                });        
                
                
                function exportar()
                {
                         if (window.confirm(app_lang['desea_exportar_listado']))
                         {                                                
                              document.location = 'list_contacto_web.php?export=yes&format=csv';
                         }                                                            
                }  
                function exportar_excel()
                {
                         if (window.confirm(app_lang['desea_exportar_listado']))
                         {                                                
                              document.location = 'list_contacto_web.php?export=yes&format=xls';
                         }                                                            
                }  
              
              

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
                                    <h4 class="page-title"><? echo $adm_lang['contactos'] ?></h4>
				</div>
							
                                <div class="page-rightheader ml-auto d-lg-flex d-none taula">
				
                                    <div class="btn-list">
                                        <a class="btn btn-secondary" id="btn_delete"><i class="fa fa-close"></i> <? echo $adm_lang['eliminar'] ?></a>   
                                        
                                        <button id="btn_exportar" class="btn btn-success"><? echo $adm_lang['exportar_csv'] ?></button>
                                        <button id="btn_exportar_xls" class="btn btn-success"><? echo $adm_lang['exportar_xls'] ?></button>
                                    </div>
				
                                </div>
			</div>
                        
                        <div class="row">
                            
                            <? if (!empty($message)) { ?>
                            <div class="col-12">
                                <div class="alert alert-success" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <span class="icon"><i class="icon fa fa-check"></i> <? echo $message ?></span>
                                </div>
                            </div>
                            <? } ?>
							
                            <div class="col-12">
								
				<form name="formGrid" method="post" action="<? echo $delete_page ?>">		
                                    
                                        <div class="card">
									
                                            <div class="card-body">
										
                                                <div class="table-responsive">
                                                    
                                                        <table id="tbl_data" class="table table-striped table-bordered text-nowrap table-custom">

                                                            <thead>
                                                                    <tr>
                                                                            <th class="check"><input class="check_box" name="all_items" id="all_items" type="checkbox" /></th>
                                                                            <th><? echo $adm_lang['fecha'] ?></th>  
                                                                            <th><? echo $adm_lang['nombre'] ?></th>   
                                                                            <th><? echo $adm_lang['telefono'] ?></th>  
                                                                            <th>Email</th>  
                                                                            <th><? echo $adm_lang['gestionado'] ?></th>  
                                                                    </tr>
                                                            </thead>
                                                            <tbody>
                                                                <? for($i = 0; $i < count($row); $i++) { ?>
                                                                <?
                                                                      $row[$i]['str_gestionado'] = $options_si_no[$row[$i]['gestionado']];
                                                                      $row[$i]['fecha_trans'] = date('d/m/Y H:i',strtotime($row[$i]['fecha']));

                                                                      $row[$i]['comentarios'] = strip_tags($row[$i]['comentarios']);
                                                                      $row[$i]['comentarios'] = trim($row[$i]['comentarios']);
                                                                      $row[$i]['comentarios'] = str_replace("\n", " ",$row[$i]['comentarios']);
                                                                      $row[$i]['comentarios'] = str_replace("\r", " ",$row[$i]['comentarios']);   

                                                                      array_push($row_exp,$row[$i]);
                                                                ?>
                                                                <tr>
                                                                    <td class="check"><input class="check_box" name="item_<? echo $row[$i]['id'] ?>" type="checkbox" /></td>
                                                                    <td data-order="<? echo $row[$i]['fecha'] ?>"><a href="<? echo $update_page ?>&id=<? echo $row[$i]['id'] ?>"><? echo date('d/m/Y H:i',strtotime($row[$i]['fecha'])) ?></a></td>    
                                                                    <td><? echo $row[$i]['nombre'] ?></td>    
                                                                    <td><? echo $row[$i]['telefono'] ?></td>    
                                                                    <td><? echo $row[$i]['email'] ?></td>    
                                                                    <td><? echo $options_si_no[$row[$i]['gestionado']] ?></td>      
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
                        
                    </div>
                </div>


            </div>

            <? include('include/footer.php'); ?>

        </div>

    
    </body>
</html>