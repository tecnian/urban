function save_form()
{
    var error = false;
    var format = true;    
    
    
    $('.form-control').parent('div').removeClass('has-error');
    $('.form-control').parent('div').removeClass('has-warning');
    
    
    $("#formConfig .form-control").each(function() {

        if ($(this).hasClass('form-decimal'))
        {
            if ($(this).val() != '')
            {
                if (isNaN(decimal_format($(this).val())))
                {
                    $(this).parent('div').addClass('has-warning');
                    format = false;
                }
            }
            else
            {
                $(this).val(0);
            }
        }
       
    });
    
    
    
    
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
        $('#formConfig').submit();
    }
}


function save_form_gastos_envio()
{
    var error = false;
    var format = true;
    
    $('#error_info_gastos_envio').css('display','none');
    $('#format_info_gastos_envio').css('display','none');
    
    
    if ($('#margen_ini').val() != '')
    {
        if (isNaN(decimal_format($('#margen_ini').val())))
        {
            $('#margen_ini').parent('div').addClass('has-warning');
            format = false;
        }
    }
    else
    {
        $('#margen_ini').val(0);
    }
    
    if ($('#margen_fin').val() != '')
    {
        if (isNaN(decimal_format($('#margen_fin').val())))
        {
            $('#margen_fin').parent('div').addClass('has-warning');
            format = false;
        }
    }
    else
    {
        $('#margen_fin').val(0);
    }
        
        
    if ($('#valor').val() == '')
    {
        $('#valor').parent('div').addClass('has-error');
        error = true;
    }
    else
    {
        if (isNaN(decimal_format($('#valor').val())))
        {
            $('#valor').parent('div').addClass('has-warning');
            format = false;
        }
    }
        
                        
    if (error == true)
    {
        $('#error_info_gastos_envio').css('display','block');
    }
    if (format == false)
    {
        $('#format_info_gastos_envio').css('display','block');
    }

    if (!error && format)
    {
        $('#jxFormDataGastosEnvio').submit();
    }

}


function get_list_gastos_envio()
{
    var url = 'shop_jx_list_gastos_envio.php';


    var callback = $.post(url,
                                {
                                
                                }
    );

    callback.done(function(data) {

        $("#jxGastosEnvio").empty().append(data);

    });
}

function get_form_gastos_envio(id,mode)
{
    var url = 'shop_jx_form_gastos_envio.php';
    
    var callback = $.post(url,
                                {
                                id: id,
                                mode: mode
                                }
    );

    callback.done(function(data) {

        $("#jxGastosEnvio").empty().append(data);

    });
}

function send_delete_gastos_envio(tbl)
{
    var form = document.jxFormGrid;

    var status = false;
    var url = 'server/delete.php';
    var params = '';

    //comprobamos si hay seleccionados
    for (i = 0; i < form.elements.length; i++)
    {
        if (form.elements[i].checked)
        {            
            status = true;
        }
    }

    var fields = $("#jxFormGrid").serializeArray();

    jQuery.each( fields, function( i, field ) {

            if (i > 0) params += '&';
            params += field.name + '=' + field.value;

    });


    if (status)
    {
        if (window.confirm(app_lang['desea_eliminar_registros']))
        {
            var callback = $.post(url,
                                        {
                                        tbl: tbl,
                                        params: params
                                        }
            );

            callback.done(function(data) {

                $("#jxGastosEnvio").empty().append(data);

            });
        }
    }
    else
    {
        alert(app_lang['no_elementos_seleccionados']);
    }
}



$(document).ready(function() {

    $('button').click(function(event) {

        event.preventDefault();
                
    });
    
    $("#btn_save").click(function() {

        save_form();
       
    });
    
    
});

