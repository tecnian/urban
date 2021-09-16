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
    if ($('#usuario').val() == '')
    {
        $('#usuario').parent('div').addClass('has-error');
        error = true;
    }    
    if ($('#id_perfil').val() == 0)
    {
        $('#id_perfil').parent('div').addClass('has-error');
        error = true;
    }
    
    if (id == 0)
    {
        if ($('#password').val() == '')
        {
            $('#password').parent('div').addClass('has-error');
            error = true;
        }
        if ($('#password2').val() == '')
        {
            $('#password2').parent('div').addClass('has-error');
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
    
    
    if ($('#password').val() != '')
    {
        if ($('#password').val() != $('#password2').val())
        {
            $('#password').parent('div').addClass('has-error');
            $('#password2').parent('div').addClass('has-error');
            error = true;
            
            $('#error_psw').css('display','block');
        }
    }
    
    if ($('#usuario').val() == 'superadmin')
    {
        alert(app_lang['superadmin_reservado']);
        error = true;
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

