function save_form()
{
    var error = false;
    var format = true;
                
    
    
    
    if (error == true)
    {
        $('#error_info').css('display','block');
    }
    if (format == false)
    {
        $('#format_info').css('display','block');
    }

    if (!error && format)
    {        
        $('#formData').submit();
    }
}

function get_list_producto(id_presupuesto)
{
    var url = 'shop_jx_list_presupuesto_producto.php';


    var callback = $.post(url,
                                {
                                id_presupuesto: id_presupuesto
                                }
    );

    callback.done(function(data) {

        $("#jxProductos").empty().append(data);

    });
}



$(document).ready(function() {

    $('button').click(function(event) {

        event.preventDefault();
                
    });
    
    $("#btn_save").click(function() {

        save_form();
       
    });
    
    
});

