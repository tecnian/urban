function save_form()
{
    var error = false;
    var format = true;
    
    var id = $('#id').val();  
    var mode = $('#mode').val();  
    
                
    $('.form-control').parent('div').removeClass('has-error');
    
    
    if ($('#nombre').val() == '')
    {
        $('#nombre').parent('div').addClass('has-error');
        error = true;
    }
    
    if ($('#titulo_1').val() == '')
    {
        $('#titulo_1').parent('div').addClass('has-error');
        error = true;
    }
    
    if (id > 1 || mode == 'add')
    {
        if ($('#friendly_url_1').val() == '')
        {
            $('#friendly_url_1').parent('div').addClass('has-error');
            error = true;
        }
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



function save_form_contenido()
{
    var error = false;
    var id_tipo = $('#id_tipo').val();
    
    
    $('.form-control').parent('div').removeClass('has-error');
    
    //var message = CKEDITOR.instances.message.getData();
    
    
    if ($('#id_tipo').val() == 0)
    {
        $('#id_tipo').parent('div').addClass('has-error');
        error = true;
    }
    
    if (id_tipo == 1)
    {        
        if ($('#titulo_cont_1').val() == '')
        {
            $('#titulo_cont_1').parent('div').addClass('has-error');
            error = true;
        }
    }
    if (id_tipo == 2)
    {
        if ($('#titulo_cont_1').val() == '')
        {
            $('#titulo_cont_1').parent('div').addClass('has-error');
            error = true;
        }
    }
    if (id_tipo == 3)
    {
        if ($('#texto_1').val() == '')
        {
            $('#texto_1').parent('div').addClass('has-error');
            error = true;
        }
    }
    if (id_tipo == 4)
    {
        
    }
    if (id_tipo == 5)
    {
        if ($('#imagen').val() == '')
        {
            $('.form-group-file').addClass('has-error');            
            error = true;
        }
    }
    if (id_tipo == 6)
    {
        if ($('#enlace_1').val() == '')
        {
            $('#enlace_1').parent('div').addClass('has-error');
            error = true;
        }
    }
    if (id_tipo == 7)
    {
        if ($('#imagen').val() == '')
        {
            $('.form-group-file').addClass('has-error');
            error = true;
        }
    }
    if (id_tipo == 8)
    {
        if ($('#id_slider').val() == 0)
        {
            $('#id_slider').parent('div').addClass('has-error');
            error = true;
        }
    }
    if (id_tipo == 9)
    {
        if ($('#id_slider').val() == 0)
        {
            $('#id_slider').parent('div').addClass('has-error');
            error = true;
        }
    }
    if (id_tipo == 10)
    {
        if ($('#video_1').val() == '')
        {
            $('#video_1').parent('div').addClass('has-error');
            error = true;
        }
    }
    if (id_tipo == 11)
    {
        if ($('#nombre_cont').val() == '')
        {
            $('#nombre_cont').parent('div').addClass('has-error');
            error = true;
        }
    }
    

    if (error == true)
    {
        $('#error_info_cont').css('display','block');
    }

    if (!error)
    {                
        $('#jxFormData').submit();
    }

}

function get_list_contenido(id_pagina)
{
    var url = 'jx_list_contenido.php';


    var callback = $.post(url,
                                {
                                id_pagina: id_pagina
                                }
    );

    callback.done(function(data) {

        $("#jxContenidos").empty().append(data);

    });
}

function get_form_contenido(id_pagina,id,mode)
{
    var url = 'jx_form_contenido.php';

    var callback = $.post(url,
                                {
                                id_pagina: id_pagina,
                                id: id,
                                mode: mode
                                }
    );

    callback.done(function(data) {

        $("#jxContenidos").empty().append(data);

    });
}

function send_delete_contenido(id_pagina,tbl)
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
                                        id_pagina: id_pagina,
                                        tbl: tbl,
                                        params: params
                                        }
            );

            callback.done(function(data) {

                $("#jxContenidos").empty().append(data);

            });
        }
    }
    else
    {
        alert(app_lang['no_elementos_seleccionados']);
    }
}

function send_delete_file_contenido(id,id_pagina,tbl,fld,id_idioma)
{
    var url;    

    url = 'server/delete_file.php';
    

    if (window.confirm(app_lang['desea_eliminar_fichero']))
    {
        var callback = $.post(url,
                                {
                                id_pagina: id_pagina,
                                id: id,
                                tbl: tbl,
                                fld: fld,
                                id_idioma: id_idioma
                                }
        );

        callback.done(function(data) {

            $("#jxContenidos").empty().append(data);

        });

    }
}

function show_fields(id_tipo)
{
    $(".field").css('display','none');
    
    if (id_tipo == 1)
    {
        $(".f-titulo").css('display','block');
        $(".f-enlace").css('display','block');
        $(".f-follow").css('display','block');
        $(".f-title").css('display','block');
        $(".f-target").css('display','block');
    }
    if (id_tipo == 2)
    {
        $(".f-titulo").css('display','block');
        $(".f-enlace").css('display','block');
        $(".f-follow").css('display','block');
        $(".f-title").css('display','block');
        $(".f-target").css('display','block');
    }
    if (id_tipo == 3)
    {
        $(".f-texto").css('display','block');
    }
    if (id_tipo == 4)
    {
        $(".f-texto-editor").css('display','block');
    }
    if (id_tipo == 5)
    {
        $(".f-texto-editor").css('display','block');
        $(".f-imagen").css('display','block');
        $(".f-alt").css('display','block');
    }
    if (id_tipo == 6)
    {
        $(".f-enlace").css('display','block');
        $(".f-follow").css('display','block');
        $(".f-title").css('display','block');
        $(".f-target").css('display','block');
    }
    if (id_tipo == 7)
    {
        $(".f-imagen").css('display','block');
        $(".f-alt").css('display','block');
    }
    if (id_tipo == 8)
    {
        $(".f-slider").css('display','block');
    }
    if (id_tipo == 9)
    {
        $(".f-slider").css('display','block');
    }
    if (id_tipo == 10)
    {
        $(".f-video").css('display','block');
    }
    if (id_tipo == 11)
    {
        $(".f-fichero").css('display','block');
        $(".f-imagen").css('display','block');
        $(".f-nombre").css('display','block');
        $(".f-titulo").css('display','block');
        $(".f-subtitulo").css('display','block');
        $(".f-texto-editor").css('display','block');
    }
    
}

function get_sort(id_parent,mode)
{
    var url = 'server/callback.php';
    
    
            var callback = $.post(url,
                                        {
                                        id_parent: id_parent,
                                        mode: mode,
                                        clbk: 'orden_pagina'
                                        }
            );

            callback.done(function(data) {

                $("#jxOrden").empty().append(data);

            });

}


$(document).ready(function() {

    $('button').click(function(event) {

        event.preventDefault();
                
    });
    
    $("#btn_save").click(function() {

        save_form();
       
    });
    
    $("#id_parent").change(function() {

        var id_parent = $(this).val();
        var id_parent_ini = $('#id_parent_ini').val();
        
        var mode = 'update';
        if (id_parent != id_parent_ini)
        {
            mode = 'add';
        }
        
        if ($('#mode').val() == 'add')
        {
            mode = 'add';
        }
        
        get_sort(id_parent,mode);

    });
    
    
});

