function save_form()
{
    var error = false;
    var format = true;
    //var max_size = 1024*1024;
                
    
    
    $('.form-control').parent('div').removeClass('has-error');
    
    
    if ($('#referencia').val() == '')
    {
        $('#referencia').parent('div').addClass('has-error');
        error = true;
    }
        
    if ($('#nombre_1').val() == '')
    {
        $('#nombre_1').parent('div').addClass('has-error');
        error = true;
    }
    
    if ($('#precio').val() != '')
    {
        if (isNaN(decimal_format($('#precio').val())))
        {
            $('#precio').parent('div').addClass('has-warning');
            format = false;
        }
    }
    else
    {
        $('#precio').val(0);
    }
    
    if ($('#precio_oferta').val() != '')
    {
        if (isNaN(decimal_format($('#precio_oferta').val())))
        {
            $('#precio_oferta').parent('div').addClass('has-warning');
            format = false;
        }
    }
    else
    {
        $('#precio_oferta').val(0);
    }
    
    if ($('#ptje_descuento').val() != '')
    {
        if (isNaN(decimal_format($('#ptje_descuento').val())))
        {
            $('#ptje_descuento').parent('div').addClass('has-warning');
            format = false;
        }
    }
    else
    {
        $('#ptje_descuento').val(0);
    }
    
    
    if ($('#peso').val() == '')
    {
        $('#peso').val(0);
    }
    if ($('#largo').val() == '')
    {
        $('#largo').val(0);
    }
    if ($('#alto').val() == '')
    {
        $('#alto').val(0);
    }
    if ($('#ancho').val() == '')
    {
        $('#ancho').val(0);
    }
    if ($('#diametro').val() == '')
    {
        $('#diametro').val(0);
    }
    
    
    if ($('#caja_unidades').val() != '')
    {
        if (isNaN($('#caja_unidades').val()))
        {
            $('#caja_unidades').parent('div').addClass('has-warning');
            format = false;
        }
    }
    else
    {
        $('#caja_unidades').val(0);
    }
    
    if ($('#unidades_min').val() != '')
    {
        if (isNaN($('#unidades_min').val()))
        {
            $('#unidades_min').parent('div').addClass('has-warning');
            format = false;
        }
    }
    else
    {
        $('#unidades_min').val(0);
    }
    
    if ($('#prioridad').val() != '')
    {
        if (isNaN($('#prioridad').val()))
        {
            $('#prioridad').parent('div').addClass('has-warning');
            format = false;
        }
    }
    else
    {
        $('#prioridad').val(0);
    }
    
    
    
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


function save_form_foto()
{
    var error = false;

    if ($('#imagen_foto').val() == '')
    {
        $('.form-group-file').addClass('has-error');
        error = true;
    }
        
    if (error == true)
    {
        $('#error_info_foto').css('display','block');
    }

    if (!error)
    {
        $('#jxFormData').submit();
    }

}

function get_list_foto(id_producto)
{
    var url = 'shop_jx_list_producto_foto.php';


    var callback = $.post(url,
                                {
                                id_producto: id_producto
                                }
    );

    callback.done(function(data) {

        $("#jxFotos").empty().append(data);

    });
}

function get_form_foto(id_producto,id,mode)
{
    var url = 'shop_jx_form_producto_foto.php';
    
    var id_proveedor = $('#id_proveedor').val(); 

    var callback = $.post(url,
                                {
                                id_producto: id_producto,
                                id_proveedor: id_proveedor,
                                id: id,
                                mode: mode
                                }
    );

    callback.done(function(data) {

        $("#jxFotos").empty().append(data);

    });
}

function send_delete_foto(id_producto,tbl)
{
    var form = document.jxFormGrid2;

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

    var fields = $("#jxFormGrid2").serializeArray();

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
                                        id_producto: id_producto,
                                        tbl: tbl,
                                        params: params
                                        }
            );

            callback.done(function(data) {

                $("#jxFotos").empty().append(data);

            });
        }
    }
    else
    {
        alert(app_lang['no_elementos_seleccionados']);
    }
}

function send_delete_file_foto(id,id_producto,tbl,fld,id_idioma)
{
    var url;    

    url = 'server/delete_file.php';
    

    if (window.confirm(app_lang['desea_eliminar_fichero']))
    {
        var callback = $.post(url,
                                {
                                id_producto: id_producto,
                                id: id,
                                tbl: tbl,
                                fld: fld,
                                id_idioma: id_idioma
                                }
        );

        callback.done(function(data) {

            $("#jxFotos").empty().append(data);

        });

    }
}

function send_delete_file_fichero(id,id_producto,tbl,fld,id_idioma)
{
    var url;    

    url = 'server/delete_file.php';
        
    if (window.confirm(app_lang['desea_eliminar_fichero']))
    {
        var callback = $.post(url,
                                {
                                id_producto: id_producto,
                                id: id,
                                tbl: tbl,
                                fld: fld,
                                id_idioma: id_idioma
                                }
        );

        callback.done(function(data) {

            $("#jxFotos").empty().append(data);

        });

    }
}

/* documentos */

function save_form_fichero()
{
    var error = false;

    if ($('#fichero').val() == '')
    {
        $('.form-group-file').addClass('has-error');
        error = true;
    }
    if ($('#titulo_1').val() == '')
    {
        $('#titulo_1').parent('div').addClass('has-error');
        error = true;
    }
        
    if (error == true)
    {
        $('#error_info_fichero').css('display','block');
    }

    if (!error)
    {
        $('#jxFormDataFichero').submit();
    }

}

function get_list_fichero(id_producto)
{
    var url = 'shop_jx_list_producto_fichero.php';


    var callback = $.post(url,
                                {
                                id_producto: id_producto
                                }
    );

    callback.done(function(data) {

        $("#jxDocumentos").empty().append(data);

    });
}

function get_form_fichero(id_producto,id,mode)
{
    var url = 'shop_jx_form_producto_fichero.php';        

    var callback = $.post(url,
                                {
                                id_producto: id_producto,                                
                                id: id,
                                mode: mode
                                }
    );

    callback.done(function(data) {

        $("#jxDocumentos").empty().append(data);

    });
}

function send_delete_fichero(id_producto,tbl)
{
    var form = document.jxFormGridFichero;

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

    var fields = $("#jxFormGridFichero").serializeArray();

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
                                        id_producto: id_producto,
                                        tbl: tbl,
                                        params: params
                                        }
            );

            callback.done(function(data) {

                $("#jxDocumentos").empty().append(data);

            });
        }
    }
    else
    {
        alert(app_lang['no_elementos_seleccionados']);
    }
}

function send_delete_file_documento(id,id_producto,tbl,fld,id_idioma)
{
    var url;    

    url = 'server/delete_file.php';
    

    if (window.confirm(app_lang['desea_eliminar_documento']))
    {
        var callback = $.post(url,
                                {
                                id_producto: id_producto,
                                id: id,
                                tbl: tbl,
                                fld: fld,
                                id_idioma: id_idioma
                                }
        );

        callback.done(function(data) {

            $("#jxDocumentos").empty().append(data);

        });

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

