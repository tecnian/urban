function save_form()
{
    var error = false;
    var format = true;
    var check = true;

    var new_psw = $('#new_psw').val();
    
    $('.form-control').parent('div').removeClass('has-error');
    
            
    if ($('#current_psw').val() == '')
    {
        $('#current_psw').parent('div').addClass('has-error');
        error = true;
    }
    if ($('#new_psw').val() == '')
    {        
        $('#new_psw').parent('div').addClass('has-error');
        error = true;
    }
    if ($('#confirm_psw').val() == '')
    {
        $('#confirm_psw').parent('div').addClass('has-error');
        error = true;
    }

    if ($('#new_psw').val() != $('#confirm_psw').val() && error == false)
    {
        $('#confirm_psw').parent('div').addClass('has-warning');
        check = false;
    }

    if (new_psw.length < 5 && error == false)
    {
        $('#new_psw').parent('div').addClass('has-warning');
        format = false;
    }
   
    if (error == true)
    {
        $('#error_info').css('display','block');
    }
    if (check == false)
    {
        $('#check_info').css('display','block');
    }
    if (format == false)
    {
        $('#format_info').css('display','block');
    }

    if (!error && format && check)
    {        
        $('#formData').submit();
    }
}

$(document).ready(function() {

    $("#btn_save").click(function() {

        save_form();

    });
    
});
