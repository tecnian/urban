<?php
    include("../system/config/config.inc.php");
    include("include/include.inc.php");      
    $appTableName = TBL::SECCION;
    include("server/datagrid.php");
    
?>
<!DOCTYPE html>
<html>
    <head>

        <? include('include/head.php'); ?>
      
        <script type="text/javascript">
            $(document).ready(function() {

                activate_menu('cnf',4);
            
                $("#tbl_data").dataTable({
                    "bStateSave": true,
                    "order": [[ 1, "asc" ]],                
                    <? echo $app_dataTable_lang; ?>
                });           

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
                                    <h4 class="page-title"><? echo $adm_lang['secciones'] ?></h4>
				</div>
							
                                <div class="page-rightheader ml-auto d-lg-flex d-none taula">
				
                                    <div class="btn-list">
                                        <a href="<? echo $add_page ?>" class="btn btn-primary"><i class="fa fa-plus"></i> <? echo $adm_lang['anadir'] ?></a>
                                        <a class="btn btn-secondary" id="btn_delete"><i class="fa fa-close"></i> <? echo $adm_lang['eliminar'] ?></a>                                        
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
                                                                            <th><? echo $adm_lang['nombre'] ?></th>     
                                                                            <th>ID</th>    
                                                                    </tr>
                                                            </thead>
                                                            <tbody>
                                                                <? for($i = 0; $i < count($row); $i++) { ?>
                                                                
                                                                <? $related = $_data->related_items($row[$i]['id']); ?>
                                                                
                                                                    <tr>
                                                                            <td class="check"><input class="check_box" name="item_<? echo $row[$i]['id'] ?>" type="checkbox"<? if ($related) { ?> disabled<? } ?> /></td>
                                                                            <td><a href="<? echo $update_page ?>&id=<? echo $row[$i]['id'] ?>"><? echo $row[$i]['nombre'] ?></a></td>    
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
                        
                    </div>
                </div>


            </div>

            <? include('include/footer.php'); ?>

        </div>

    
    </body>
</html>