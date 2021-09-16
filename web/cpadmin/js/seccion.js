function save_form()
{
    var error = false;
    var format = true;
    
    var id = $('#id').val();
    
    $('.form-control').parent('div').removeClass('has-error');
                
    
    if ($('#nombre').val() == '')
    {
        $('#nombre').parent('div').addClass('has-error');
        error = true;
    }
    
    if ($('#orden').val() == '')
    {
        $('#orden').val(0);
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

