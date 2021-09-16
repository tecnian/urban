function save_form()
{
    var error = false;
    var format = true;    
    
    
    $('.form-control').parent('div').removeClass('has-error');
    $('.form-control').parent('div').removeClass('has-warning');
    
    
    if ($('#title_1').val() == '')
    {
        $('#title_1').parent('div').addClass('has-error');
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


function save_form_field()
{
    var error = false;
    var format = true;    
    
    
    $('.form-control').parent('div').removeClass('has-error');
    $('.form-control').parent('div').removeClass('has-warning');
    
    var name = CKEDITOR.instances.name_1.getData();
    
    if (name == '')
    {
        $('#name_1').parent('div').addClass('has-error');
        error = true;
    }
    
    if ($('#id_type').val() == 0)
    {
        $('#id_type').parent('div').addClass('has-error');
        error = true;
    }
    
    if ($('#num_min_answers').val() == '')
    {
        $('#num_min_answers').val(0);
    }
    if ($('#num_max_answers').val() == '')
    {
        $('#num_max_answers').val(0);
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

function save_form_section()
{
    var error = false;
    var format = true;    
    
    
    $('.form-control').parent('div').removeClass('has-error');
    $('.form-control').parent('div').removeClass('has-warning');
    
    
    if ($('#name_1').val() == '')
    {
        $('#name_1').parent('div').addClass('has-error');
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

function save_form_option()
{
    var error = false;
    var format = true;    
    
    
    $('.form-control').parent('div').removeClass('has-error');
    $('.form-control').parent('div').removeClass('has-warning');
    
    
    if ($('#name_1').val() == '')
    {
        $('#name_1').parent('div').addClass('has-error');
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

function get_field_sort(id_section,id_forms,mode)
{
    var url = 'server/callback.php';
    
    
            var callback = $.post(url,
                                        {
                                        id_section: id_section,
                                        id_forms: id_forms,
                                        mode: mode,
                                        clbk: 'orden_forms_fields'
                                        }
            );

            callback.done(function(data) {

                $("#jxOrden").empty().append(data);

            });

}


function get_field_sort(id_section,id_forms,mode)
{
    var url = 'server/callback.php';
    
    
            var callback = $.post(url,
                                        {
                                        id_section: id_section,
                                        id_forms: id_forms,
                                        mode: mode,
                                        clbk: 'orden_forms_fields'
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
    
    $("#btn_save_section").click(function() {

        save_form_section();
       
    });
    
    $("#btn_save_field").click(function() {

        save_form_field();
       
    });
    
    $("#btn_save_option").click(function() {

        save_form_option();
       
    });
    
    $("#id_section").change(function() {

        var id_section = $(this).val();
        var id_section_ini = $('#id_section_ini').val();
        var id_forms = $('#id_forms').val();
        
        var mode = 'update';
        if (id_section != id_section_ini)
        {
            mode = 'add';
        }
        
        if ($('#mode').val() == 'add')
        {
            mode = 'add';
        }
        
        get_field_sort(id_section,id_forms,mode);

    });
    
    
    $("#id_section").change(function() {

        var id_section = $(this).val();
        var id_section_ini = $('#id_section_ini').val();
        var id_forms = $('#id_forms').val();
        
        var mode = 'update';
        if (id_section != id_section_ini)
        {
            mode = 'add';
        }
        
        if ($('#mode').val() == 'add')
        {
            mode = 'add';
        }
        
        get_field_sort(id_section,id_forms,mode);

    });
    
    
});

