

$(document).ready(function(){

	
        $('#app-pull').click(function() {
            
            menu_responsive();

        });
        
        $('#btn_send_contact').click(function() {
            
            send_contact();

        });
        
        $('#btn_send_registro').click(function() {
            
            send_registro();

        });
        
        $('#btn_send_login').click(function() {
            
            send_login();

        });
        
        $('#btn_send_psw').click(function() {
            
            send_password();

        });
        
        $('#container_cookies .acepto').click(function() {
            
            aceptar_cookies();

        });
        
        
        
                
                               
});


function menu_responsive()
{
    $('#app-menu-responsive').slideToggle('fast');
}


function send_contact()
{
        
    $('.form-required').removeClass('warning');
    $('.form-email').removeClass('warning');
    $('#confirm_send').css('display','none');
    
    
    $("#email_check").val(1);      
    
    if ($("#email").val() != '')
    {        
        if (!check_email($("#email").val()))
        {        
            $("#email_check").val(0);      
        }           
    }
    
    
    //validacion formulario     
    
    var url = app_folder + '/server/check_form.php';
    
    var datos = $('#frmContacto').serialize();
    
    $.ajax({
        type: "POST",
        url: url,
        data: datos,   
        dataType: "json",
        success: function(data) {
            
            if (data.status == 1) 
            {
                //enviamos datos contacto
               
                $("#btn_send_contact").attr('disabled',true);
                        
                var url = app_folder + '/server/send_form.php';
                
                $.ajax({
                    type: "POST",
                    url: url,
                    data: datos,                       
                    success: function(data) {

                        $("#btn_send_contact").attr('disabled',false);
                        $('#confirm_send').css('display','block');

                        $('#frmContacto')[0].reset();        
                                
                    },
                    error: function() {

                    }
                });
                
            }
            else
            {
                if (data.classname != '')
                {
                    $('.' + data.classname).addClass('warning');
                }
                
                if (data.classname == 'form-required')
                {
                    $('.form-required').each(function() {

                        if ($(this).val() != '')
                        {
                            $(this).removeClass('warning');
                        }

                    });
                }
            }  
                        
            $('#confirm_send').html(data.message);
            $('#confirm_send').css('display','block');
                        
        },
        error: function() {
            
        }
    });
            
                                
}

function send_registro()
{
    
    $('.form-required').removeClass('warning');
    $('.form-email').removeClass('warning');
    $('#msg_alerta').css('display','none');
    
    $("#email_check").val(1);      
    
    if ($("#email").val() != '')
    {        
        if (!check_email($("#email").val()))
        {        
            $("#email_check").val(0);      
        }           
    }
    
    
    //validacion formulario     
    
    var url = app_folder + '/server/check_registro.php';
    
    var datos = $('#frmRegistro').serialize();
    
    $.ajax({
        type: "POST",
        url: url,
        data: datos,   
        dataType: "json",
        success: function(data) {
            
            if (data.status == 1) 
            {
                //enviamos datos registro
                                
                $("#btn_send_registro").attr('disabled',true);
                        
                var url = app_folder + '/server/send_registro.php';
                
                $.ajax({
                    type: "POST",
                    url: url,
                    data: datos,                       
                    success: function(data) {

                        $("#btn_send_registro").attr('disabled',false);
                        $('#msg_alerta').css('display','block');

                        $('#frmRegistro')[0].reset();        
                                
                    },
                    error: function() {

                    }
                });
                
            }
            else
            {
                if (data.classname != '')
                {
                    $('.' + data.classname).addClass('warning');
                }
                
                if (data.classname == 'form-required')
                {
                    $('.form-required').each(function() {

                        if ($(this).val() != '')
                        {
                            $(this).removeClass('warning');
                        }

                    });
                }
            }  
                        
            $('#msg_alerta').html(data.message);
            $('#msg_alerta').css('display','block');
                        
        },
        error: function() {
            
        }
    });
            
                                
}

function send_login()
{
    $('.form-required').removeClass('warning');    
    $('#msg_alerta').css('display','none');
    
    var url_area = $('#url_area').val();
    var url = app_folder + '/server/send_login.php';
    
    var datos = $('#frmLogin').serialize();
    
    $.ajax({
        type: "POST",
        url: url,
        data: datos,   
        dataType: "json",
        success: function(data) {
            
            if (data.status == 1) 
            {
                document.location = url_area;
            }
            else
            {
                if (data.classname != '')
                {
                    $('.' + data.classname).addClass('warning');
                }
                
                $('.form-required').each(function() {
            
                    if ($(this).val() != '')
                    {
                        $(this).removeClass('warning');
                    }

                });
                
            }
            
            $('#msg_alerta').html(data.message);
            $('#msg_alerta').css('display','block');
                        
        },
        error: function() {
            
        }
    });
                 
}    

function send_password()
{
    $('.form-required').removeClass('warning');    
    $('#msg_alerta').css('display','none');
        
    var url = app_folder + '/server/send_password.php';
    
    var datos = $('#frmPsw').serialize();
    
    $.ajax({
        type: "POST",
        url: url,
        data: datos,   
        dataType: "json",
        success: function(data) {
            
            if (data.status == 1) 
            {                
                $('#frmPsw')[0].reset();    
            }
            else
            {
                if (data.classname != '')
                {
                    $('.' + data.classname).addClass('warning');
                }
                
            }
            
            $('#msg_alerta').html(data.message);
            $('#msg_alerta').css('display','block');
                        
        },
        error: function() {
            
        }
    });
                 
}    

function aceptar_cookies()
{
            var url = app_folder + '/server/callback.php';
    
    
            var callback = $.post(url,
                                        {
                                        clbk: 'aceptar_cookies'
                                        }
            );

            callback.done(function(data) {

                $('#container_cookies').slideUp('slow');

            });

}   


function autocomplete_value(elem_obj,elem_id,name_field,type)
{
                
                var options = {
                        url: function(phrase) {
                                return app_folder + "/server/autocomplete.php?phrase=" + phrase + "&type=" + type + "&format=json";
                        },
                        list: {
                                    onSelectItemEvent: function() {
                                        
                                        var index = $("#" + elem_obj).getSelectedItemData().id;

                                        $("#" + elem_id).val(index);
                                        
                                    }
                            },
                        getValue: name_field
                };

                $("#" + elem_obj).easyAutocomplete(options);
                    
}
                        
                        

