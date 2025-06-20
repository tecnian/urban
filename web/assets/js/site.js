

$(document).ready(function(){

	
        $('#app-pull').click(function() {
            
            menu_responsive();

        });
        
        $('#menu-responsive li a').click(function() {
            
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
        
        
        $('.lightbox-servicios .ico-close a').click(function() {
            
            close_lightbox_servicios();

        });
        
        $('.btn_servicio').click(function() {
            
            var item = $(this).attr('data-item');
            
            lightbox_servicios_position();
            
            open_lightbox_servicios(item);

        });
        
        $('.btn_planta').click(function() {
            
            var item = $(this).attr('data-item');
            
            show_planta(item);
            
            $('.btn_planta').removeClass('active');
            $(this).addClass('active');

        });
        
        $('#planta').change(function() {
            
            var item = $(this).val();
            
            show_planta(item);
            
            $('.btn_planta').removeClass('active');
            $(this).addClass('active');

        });
        
        $('.btn_localizacion').mouseover(function() {
            
            var item = $(this).attr('data-item');
            
            show_mapa(item);
            
            $(this).trigger('click');

        });
        
        $('.btn_localizacion').click(function() {
            
            var item = $(this).attr('data-item');
            
            open_lightbox_mapa(item);
            
            lightbox_mapa_position();
            
            $(".btn_localizacion").removeClass('active');
            $(this).addClass('active');

        });
        
        $('#donde').mouseout(function() {
            
            $(".btn_localizacion").removeClass('active');
            
            $(".mapa-info").css('display','none');

        });
        
        $('#mapa').change(function() {
            
            var item = $(this).val(); 
            
            if (item > 0)
            {
                lightbox_mapa_position();
                
                open_lightbox_mapa(item);
            }

        });
        
        $('.lightbox-mapa .ico-close a').click(function() {
            
            close_lightbox_mapa();

        });
        
        $('.btn_certif').click(function() {
            
            var item = $(this).attr('data-item');
            
            open_lightbox_empresa(item);

        });
        
        $('.lightbox-empresa .ico-close a').click(function() {
            
            close_lightbox_empresa();

        });
        
        $('.btn-play').click(function(ev) {
            
            $('.btn-play').css('display','none');
            $('.video_iframe').css('display','block');
            
            $("#video").css('background','none');
            $("#video").css('height','auto');
            
            $("#yt_video")[0].src += "&autoplay=1";
            ev.preventDefault();            

        });
        
        $('#planos .piso').mouseover(function() {
            
            var id = $(this).attr('data-id');
            
            $('#planos .piso_sel').css('display','none');
            
            $('#' + id).css('display','block');

        });
        
        $('#planos .template').mouseout(function() {
            
            $('#planos .div_planta .piso_sel').css('display','none');
            $('#planos .div_planta .piso_def').css('display','block');

        });
        
        
                        
        
        $('a[href*=\\#]').click(function() {

                if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
                    && location.hostname == this.hostname) {

                        var $target = $(this.hash);  

                        $target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');

                        if ($target.length) {

                            var targetOffset = $target.offset().top - 90; 
                            
                            if (this.hash.slice(1) == 'intro')
                            {
                                targetOffset = $target.offset().top - 160; 
                            }
                            if (this.hash.slice(1) == 'sostenibilidad')
                            {
                                targetOffset = $target.offset().top - 150; 
                            }
                            
                            $('html,body').animate({scrollTop: targetOffset}, 1000);

                            return false;

                        }

                }

        });
        
        
        $(window).scroll(function() {

                $('.icon-anim').each(function() {
            
                    var margin = $(this).offset().top - $(window).height() + 100;
                    
                    if ($(window).scrollTop() >= margin)
                    {                                                                                                                    
                        $(this).addClass('zoom');                                
                    }

                });

        });
                
                               
});


            function menu_responsive(){

                $("#menu-responsive").slideToggle('fast');

            }

            function open_lightbox_servicios(item){

                $("#lightbox2").show();
                
                $(".servicio-info").css('display','none');
                $("#servicio_info_" + item).css('display','block');

            }

            function close_lightbox_servicios(){
                
                $("#lightbox2").hide();

            }

            function open_lightbox_empresa(item){

                $("#lightbox_well").show();
                
                $(".certif-info").css('display','none');
                $("#certif_info_" + item).css('display','block');

            }

            function close_lightbox_empresa(){

                $("#lightbox_well").hide();

            }            

            function close_lightbox_mapa(){
                
                $("#lightbox1").hide();
                
                $(".btn_localizacion").removeClass('active');
                
                $(".btn_localizacion").css({
                    'color': 'var(--color-white)',
                    'border-bottom': '2px solid var(--color-secundary)'
                });  

            }

            function open_lightbox_mapa(item){

                $("#lightbox1").show();
                
                $(".mapa-info").css('display','none');
                $("#mapa_info_" + item).css('display','block');

            }


            function show_planta(item){

                $(".div_planta").hide();    
                   
                $("#planta" + item).show();   
               
            }

            function show_mapa(i){

                lightbox_mapa_position();
                
                var imapa = i;                                              
                
                for (n=0; n<8; n++){

                    $("#localizacion"+n).hide();    
                    
                    if (!$("#tit-localizacion"+n).hasClass('active'))
                    {
                        $("#tit-localizacion"+n).css({
                            'color': 'var(--color-white)',
                            'border-bottom': 'none'
                        });         
                    }

                }

                $("#localizacion"+imapa).show();    

                $("#tit-localizacion"+imapa).css({
                    'color': 'var(--color-secondary)',
                    'border-bottom': '2px solid var(--color-secondary)'
                });

            }
            
            function lightbox_mapa_position()
            {
                
                var window_w = parseInt($(window).width());
                var lightbox_w = parseInt($('.lightbox-mapa').width());
                
                var left = (window_w / 2) - (lightbox_w / 2);
                
                var window_h = parseInt($('#fotos').height()); 
                var lightbox_h = parseInt($('.lightbox-mapa').height());
                
                var top = ((window_h / 2) - (lightbox_h / 2));
                
                
                $('.lightbox-mapa').css('left',left + 'px');
                
                if (window_w > 1060)
                {
                    $('.lightbox-mapa').css('top',top + 'px');
                }
            }


            function lightbox_servicios_position()
            {
                
                var window_w = parseInt($(window).width());
                var lightbox_w = parseInt($('.lightbox-servicios').width());
                
                var left = (window_w / 2) - (lightbox_w / 2);
                
                left = left - (left * 20 / 100);
                
                $('.lightbox-servicios').css('left',left + 'px');  
                
                if (window_w <= 1060)
                {
                    var top = parseInt($(window).scrollTop()) + 100;
                    
                    $('.lightbox-servicios').css('top',top + 'px');  
                }
            }
            
            function lightbox_empresa_position()
            {
                
                var window_w = parseInt($(window).width());
                var lightbox_w = parseInt($('.lightbox-empresa').width());
                
                var left = (window_w / 2) - (lightbox_w / 2);
                
                
                $('.lightbox-empresa').css('left',left + 'px');                
            }

            function set_mapa_com_height()
            {
                var h = $('#comunicaciones .icons-com').height();
                
                var new_h = parseFloat(h) + 30;
                
                $('#comunicaciones .mapa-com.no-resp').height(new_h);
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

function open_tour_360()
{
    $("#tour360").css('display','block');    
    
}



