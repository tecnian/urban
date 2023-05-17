        <div class="row" id="header">
            
            <div class="content">
                
                <div class="col_15" id="logo">
                    <a href="<? echo $app_url['home'] ?>" title="Urban"><img src="<? echo $appFrontUrl ?>/assets/img/logo_urban_header.png" alt="Urban" /></a>
                </div>

                <div class="col_85">

                    <div id="pull"> <a onclick="menu_responsive()"><img src="<? echo $appFrontUrl ?>/assets/img/menu.png" alt="Menú" /></a> </div>
                                        

                    <ul id="menu-desktop">
                        <li> <a href="#home"> <? echo $app_lang['inicio'] ?> </a> </li>
                        <li> <a href="#localizacion"> <? echo $app_lang['localizacion'] ?> </a> </li>                        
                        <li> <a href="#comunicaciones"> <? echo $app_lang['comunicaciones'] ?> </a> </li>         
                        <li> <a href="#edificio"> <? echo $app_lang['el_edificio'] ?> </a> </li>        
                        <li> <a href="#calidades"> <? echo $app_lang['lofts'] ?> </a> </li>                        
                        <li> <a href="#video"> <? echo $app_lang['video'] ?> </a> </li>
                        <li> <a href="#contacto"> <? echo $app_lang['contacto'] ?> </a> </li>
                        
                        <li> 
                            <div class="idiomas">
                                <a href="#"> CAT </a>
                                <a href="#"> EN </a>
                            </div>
                        </li>

                    </ul>
                    
                </div>
                
            </div>
            
            <div class="col_100" id="menu-responsive">

                <ul>
                    <li> <a href="#home"> <? echo $app_lang['inicio'] ?> </a> </li>
                    <li> <a href="#localizacion"> <? echo $app_lang['localizacion'] ?> </a> </li>
                    <li> <a href="#comunicaciones"> <? echo $app_lang['comunicaciones'] ?> </a> </li>
                    <li> <a href="#edificio"> <? echo $app_lang['el_edificio'] ?> </a> </li>        
                    <li> <a href="#calidades"> <? echo $app_lang['lofts'] ?> </a> </li>           
                    <li> <a href="#video"> <? echo $app_lang['video'] ?> </a> </li>
                    <li> <a href="#contacto"> <? echo $app_lang['contacto'] ?> </a> </li>

                    <div class="idiomas">
                        <a href="#" title="Català"> CAT </a>
                        <a href="#" title="English"> EN </a>
                    </div>

                </ul>


            </div>

        </div>

                    <? if (!isset($_SESSION['INFO_COOKIES'])) { ?>
                        
                        <div id="container_cookies">
                            <div class="mensaje">
                                
                                <div class="txt">Esta web utiliza cookies propias y de terceros con la finalidad de analizar los hábitos de navegación de los usuarios y así poder proporcionar un mejor servicio en la web, de la forma descrita en la nuestra Política de Cookies. Si continua navegando, consideramos que acepta su uso. Para más información o cambiar la configuración, consulte nuestra <a target="_blank" href="<? echo $app_url['aviso-legal'] ?>">Política de Cookies</a>.</div>     
                                <div class="acepto"><? echo $app_lang['acepto'] ?></div>
                                                                
                            </div>
                        </div>     
                        
                    <? } ?>