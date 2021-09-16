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
    if ($('#codigo').val() == '')
    {
        $('#codigo').parent('div').addClass('has-error');
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

