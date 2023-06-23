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
                                <? if ($app_code_lang != LANG::ES) { ?>
                                <a href="/es"> ES </a>
                                <? } ?>
                                <? if ($app_code_lang != LANG::CAT) { ?>
                                <a href="/cat"> CAT </a>
                                <? } ?>
                                <? if ($app_code_lang != LANG::EN) { ?>
                                <a href="/en"> EN </a>
                                <? } ?>                                
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
                        <? if ($app_code_lang != LANG::ES) { ?>
                        <a href="/es"> ES </a>
                        <? } ?>
                        <? if ($app_code_lang != LANG::CAT) { ?>
                        <a href="/cat"> CAT </a>
                        <? } ?>
                        <? if ($app_code_lang != LANG::EN) { ?>
                        <a href="/en"> EN </a>
                        <? } ?>                        
                    </div>

                </ul>


            </div>

        </div>

                    <? if (!isset($_SESSION['INFO_COOKIES'])) { ?>
                        
                        <div id="container_cookies">
                            <div class="mensaje">
                                
                                <? if ($app_code_lang == LANG::ES) { ?>
                                <div class="txt">Esta web utiliza cookies propias y de terceros con la finalidad de analizar los hábitos de navegación de los usuarios y así poder proporcionar un mejor servicio en la web, de la forma descrita en la nuestra Política de Cookies. Si continua navegando, consideramos que acepta su uso. Para más información o cambiar la configuración, consulte nuestra <a target="_blank" href="<? echo $app_url['aviso-legal'] ?>">Política de Cookies</a>.</div>   
                                <? } ?>
                                <? if ($app_code_lang == LANG::CAT) { ?>
                                <div class="txt">Aquesta web utilitza cookies pròpies i de tercers amb la finalitat d'analitzar els hàbits de navegació dels usuaris i així poder proporcionar un millor servei en la web, de la forma descrita en la la nostra Política de Cookies. Si contínua navegant, considerem que accepta el seu ús. Per a més informació o canviar la configuració, consulti la nostra <a target="_blank" href="<? echo $app_url['aviso-legal'] ?>">Política de Cookies</a>.</div>   
                                <? } ?>
                                <? if ($app_code_lang == LANG::EN) { ?>
                                <div class="txt">This website uses its own and third-party cookies in order to analyze the browsing habits of users and thus be able to provide a better service on the web, in the manner described in our Cookies Policy. If you go on surfing, we will consider you accepting its use. For more information or to change the settings, see our <a target="_blank" href="<? echo $app_url['aviso-legal'] ?>">Cookies Policy</a>.</div>   
                                <? } ?>
                                
                                
                                <div class="acepto"><? echo $app_lang['acepto'] ?></div>
                                                                
                            </div>
                        </div>     
                        
                    <? } ?>