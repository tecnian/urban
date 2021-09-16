function save_form()
{
    var error = false;
    var format = true;
    var max_size = 1024*1024;
                
    
    $('.form-control').parent('div').removeClass('has-error');
    
    
    if ($('#fecha').val() == '')
    {
        $('#fecha').parent('div').addClass('has-error');
        error = true;
    }
    
    if ($('#titulo_1').val() == '')
    {
        $('#titulo_1').parent('div').addClass('has-error');
        error = true;
    }
    
    if ($('#precio').val() == '')
    {
        $('#precio').val(0);
    }
    else if (isNaN(decimal_format($('#precio').val())))
    {
        $('#precio').parent('div').addClass('has-warning');
        format = false;
    }
    
    if ($('#numero').val() == '')
    {
        $('#numero').val(0);
    }
    else if (isNaN($('#numero').val()))
    {
        $('#numero').parent('div').addClass('has-warning');
        format = false;
    }
    
    if ($('#imagen').val() != '' && $('#imagen').val() != undefined)
    {
        var filesize0 = document.getElementById('imagen').files[0].size;
    
        if (filesize0 > max_size)
        {
            $('#imagen').parent('div').addClass('has-warning');
            format = false;
        }
    }
    
    
    //leer campo CKEDITOR
        
    //var name = CKEDITOR.instances.name.getData();
    
    
    
        //MOD::multi_item
        
        /*$('.multi_items .form-required').each(function(){            

            if ($(this).val() == '')
            {
                $(this).addClass('form-error');
                error = true;
            }

        });

        $('.multi_items .form-cant').each(function(){            

            if (isNaN(decimal_format($(this).val())))
            {
                $(this).addClass('form-error');
                format = false;
            }

        });*/
    
    
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
    
    if ($('#tamano').val() == '')
    {
        $('#tamano').val(0);
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

function get_list_foto(type,id_catalogo)
{
    var url = 'jx_list_catalogo_foto.php';


    var callback = $.post(url,
                                {
                                type: type,
                                id_catalogo: id_catalogo
                                }
    );

    callback.done(function(data) {

        $("#jxFotos").empty().append(data);

    });
}

function get_form_foto(type,id_catalogo,id,mode)
{
    var url = 'jx_form_catalogo_foto.php';

    var callback = $.post(url,
                                {
                                type: type,
                                id_catalogo: id_catalogo,
                                id: id,
                                mode: mode
                                }
    );

    callback.done(function(data) {

        $("#jxFotos").empty().append(data);

    });
}

function send_delete_foto(type,id_catalogo,tbl)
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
                                        type: type,
                                        id_catalogo: id_catalogo,
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

function send_delete_file_foto(id,type,id_catalogo,tbl,fld,id_idioma)
{
    var url;    

    url = 'server/delete_file.php';
    

    if (window.confirm(app_lang['desea_eliminar_fichero']))
    {
        var callback = $.post(url,
                                {
                                type: type,
                                id_catalogo: id_catalogo,
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

function send_delete_file_fichero(id,type,id_catalogo,tbl,fld,id_idioma)
{
    var url;    

    url = 'server/delete_file.php';
        
    if (window.confirm(app_lang['desea_eliminar_fichero']))
    {
        var callback = $.post(url,
                                {
                                type: type,
                                id_catalogo: id_catalogo,
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

function get_sort(id_seccion,id_categoria,id_parent,mode)
{
    var url = 'server/callback.php';
    
    
            var callback = $.post(url,
                                        {
                                        id_seccion: id_seccion,
                                        id_categoria: id_categoria,
                                        id_parent: id_parent,
                                        mode: mode,
                                        clbk: 'orden_catalogo'
                                        }
            );

            callback.done(function(data) {

                $("#jxOrden").empty().append(data);

            });

}

function get_sort_foto(id_catalogo,id_categoria,mode)
{
    var url = 'server/callback.php';
    
    
            var callback = $.post(url,
                                        {
                                        id_catalogo: id_catalogo,
                                        id_categoria: id_categoria,
                                        mode: mode,
                                        clbk: 'orden_catalogo_foto'
                                        }
            );

            callback.done(function(data) {

                $("#jxOrdenFoto").empty().append(data);

            });

}



/*function add_multi_item()
{
    //MOD::multi_item
    
    var url = 'server/add_multi_item.php'; 
    
    var last_item = 0;
    
    $('.multi_item').each(function(){            

        if ($(this).attr('data-item') > last_item)
        {
            last_item = $(this).attr('data-item');
        }
            
    });
    
    var callback = $.post(url,
                                {
                                last_item: last_item
                                }
    );

    callback.done(function(data) {

        $("#jxMultiItem").append(data);        

    });
}*/


//******* Subir un fichero por ajax ********//

/*
function upload_file_ajax(field_name)
{
    var input_file = document.getElementById(field_name);
    var file = input_file.files[0]; 
    var file_size = 0;

    if (input_file)
    {
        if (input_file.files[0] != undefined)
        {
            file_size = $('#' + field_name)[0].files[0].size;     
        }
        else
        {
            ok = false;
        }
    }

    var data = new FormData();
    data.append(field_name,file);
    data.append('field_name',field_name);    
    data.append("type",'test');
    
    var url = "server/upload_file.php";
        
    
    if (file_size <= 307200)
    {
        
        $.ajax({

            url: url,
            type: "POST",
            contentType: false,
            data: data,
            processData: false,
            cache: false

        })
        .done(function(data){

            $("#jxImagenes").append(data);                
    
        });
        
    }
    else
    {
        alert(app_lang['tamano_maximo_fichero'] + ' 300Kb');
    } 
}
*/





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
        var id_categoria = $('#id_categoria').val();
        var id_seccion = $('#id_seccion').val();
        
        var mode = 'update';
        if (id_parent != id_parent_ini)
        {
            mode = 'add';
        }
        
        if ($('#mode').val() == 'add')
        {
            mode = 'add';
        }
        
        get_sort(id_seccion,id_categoria,id_parent,mode);

    });
    
    $("#id_categoria").change(function() {

        var id_categoria = $(this).val();        
        var id_categoria_ini = $('#id_categoria_ini').val();
        var id_parent = $('#id_parent').val();    
        var id_seccion = $('#id_seccion').val();
        
        var mode = 'update';
        if (id_categoria != id_categoria_ini)
        {
            mode = 'add';
        }
        
        if ($('#mode').val() == 'add')
        {
            mode = 'add';
        }
        
        get_sort(id_seccion,id_categoria,id_parent,mode);

    });
        
    
});

