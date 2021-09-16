function save_form()
{
    var error = false;
    var format = true;
    
    
    $('.form-control').parent('div').removeClass('has-error');
    
    if ($('#nombre').val() == '')
    {
        $('#nombre').parent('div').addClass('has-error');
        error = true;
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
    
    $('.form-control').parent('div').removeClass('has-error');
    
    if ($('#imagen').val() == '')
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

function get_list_foto(id_slider)
{
    var url = 'jx_list_slider_item.php';


    var callback = $.post(url,
                                {
                                id_slider: id_slider
                                }
    );

    callback.done(function(data) {

        $("#jxFotos").empty().append(data);

    });
}

function get_form_foto(id_slider,id,mode)
{
    var url = 'jx_form_slider_item.php';

    var callback = $.post(url,
                                {
                                id_slider: id_slider,
                                id: id,
                                mode: mode
                                }
    );

    callback.done(function(data) {

        $("#jxFotos").empty().append(data);

    });
}

function send_delete_foto(id_slider,tbl)
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
                                        id_slider: id_slider,
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

function send_delete_file_foto(id,id_slider,tbl,fld,id_idioma)
{
    var url;    

    url = 'server/delete_file.php';
        
    if (window.confirm(app_lang['desea_eliminar_fichero']))
    {
        var callback = $.post(url,
                                {
                                id_slider: id_slider,
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

$(document).ready(function() {

    $('button').click(function(event) {

        event.preventDefault();
                
    });
    
    $("#btn_save").click(function() {

        save_form();
       
    });
    
    
});

