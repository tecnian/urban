function save_form()
{
    var error = false;
    var format = true;
                
    
    if ($('#num_factura').val() == '')
    {
        $('#num_factura').parent('div').addClass('has-error');
        error = true;
    }
    if ($('#fecha').val() == '')
    {
        $('#fecha').parent('div').addClass('has-error');
        error = true;
    }
    if ($('#id_usuario').val() == 0)
    {
        $('#id_usuario').parent('div').addClass('has-error');
        error = true;
    }
    if ($('#importe').val() == '')
    {
        $('#importe').parent('div').addClass('has-error');
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



$(document).ready(function() {

    $('button').click(function(event) {

        event.preventDefault();
                
    });
    
    $("#btn_save").click(function() {

        save_form();
       
    });
    
    
});

