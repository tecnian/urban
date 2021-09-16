<?php
    //MOD::multi_item

    include("../system/config/config.inc.php");
    include("../include/include.inc.php");
    include("$appAppPath/include/control.inc.php");   
    
    $last_item = 0;
    
    if (isset($_POST['last_item']))
    {
        $last_item = $_POST['last_item'];
    }
    
    $n = $last_item + 1;
    
    
    //selects
    
    $opt_forma_pago = '';
    
?>
<div class="multi_item" id="multi_item_<? echo $n ?>" data-item="<? echo $n ?>">
        <div class="field" style="width:25%">
            <input class="form-control form-fecha form-required" type="text" id="multi_item_fecha_<? echo $n ?>_0" name="multi_item_fecha_<? echo $n ?>_0" value="">
        </div>
                                                                
        <div class="field" style="width:25%">
            <input class="form-control form-required" type="text" id="multi_item_importe_<? echo $n ?>_0" name="multi_item_importe_<? echo $n ?>_0" value="">
        </div>
                                                                
        <div class="field" style="width:45%">
            <select class="form-control form-required" id="multi_item_id_forma_pago_<? echo $n ?>_0" name="multi_item_id_forma_pago_<? echo $n ?>_0">
                <option value=""></option>
                <? echo $opt_forma_pago ?>
            </select>
        </div>
                                                                
        <div class="field" style="width:5%">
            <div class="delete_multi_item" id="del_multi_item_<? echo $n ?>" data-item="<? echo $n ?>"><i class="mdi mdi-close-circle-outline"></i></div>
        </div>
                                                                
        <input type="hidden" id="multi_item_idx_<? echo $n ?>" name="multi_item_idx_<? echo $n ?>" value="0">
</div>

<script type="text/javascript">
    
        $(document).ready(function(){

                                                        
                $('#del_multi_item_<? echo $n ?>').click(function() {

                    if (window.confirm('¿Desea eliminar el elemento?'))
                    {
                        var item = $(this).attr('data-item');
                                                                
                        $('#multi_item_' + item).remove();
                    }
                });             
                                                
                                
        });

</script>    
