function save_form()
{
    var error = false;
    var format = true;
    
    $('.form-control').parent('div').removeClass('has-error');
                
    if ($('#nombre_1').val() == '')
    {
        $('#nombre_1').parent('div').addClass('has-error');
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


function get_sort(id_tipo,id_parent,mode)
{
    var url = 'server/callback.php';
    
    
            var callback = $.post(url,
                                        {
                                        id_tipo: id_tipo,    
                                        id_parent: id_parent,
                                        mode: mode,
                                        clbk: 'orden_categoria'
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
        var id_tipo = $('#id_tipo').val();  
        
        var mode = 'update';
        if (id_parent != id_parent_ini)
        {
            mode = 'add';
        }
        
        if ($('#mode').val() == 'add')
        {
            mode = 'add';
        }
        
        get_sort(id_tipo,id_parent,mode);

    });
    
    
    
});

