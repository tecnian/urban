        <div class="row" id="header">
            
            <div class="content">
                
                <div class="col_15" id="logo">
                    <a href="<? echo $app_url['home'] ?>" title="Urban"><img src="<? echo $appFrontUrl ?>/assets/img/logo_urban.png" alt="Urban" /></a>
                </div>

                <div class="col_85">

                    <div id="pull"> <a onclick="menu_responsive()"><img src="<? echo $appFrontUrl ?>/assets/img/menu.png" alt="Menú" /></a> </div>
                                        

                    <ul id="menu-desktop">
                        <li> <a href="#intro" title="Inicio"> Descripción </a> </li>
                        <li> <a href="#localizacion" title="Localización"> Localización </a> </li>
                        <li> <a href="#servicios" title="Servicios"> Servicios </a> </li>
                        <li> <a href="#tecnologia" title="Tecnología"> Tecnología </a> </li>
                        <li> <a href="#sostenibilidad" title="Sostenibilidad"> Sostenibilidad </a> </li>
                        <li> <a href="#planos" title="Planos"> Planos </a> </li>
                        <li> <a href="#video" title="Vídeo"> Vídeo </a> </li>
                        <li> <a href="#catalogo" title="Catálogo"> Catálogo </a> </li>
                        <li> <a href="#contacto" title="Contacto"> Contacto </a> </li>

                        <div class="idiomas">
                            <a href="#" title="Català"> CAT </a>
                            <a href="#" title="English"> EN </a>
                        </div>

                    </ul>
                    
                </div>
                
            </div>
            
            <div class="col_100" id="menu-responsive">

                <ul>
                    <li> <a href="#intro" title="Inicio"> Descripción </a> </li>
                    <li> <a href="#localizacion" title="Localización"> Localización </a> </li>
                    <li> <a href="#servicios" title="Servicios"> Servicios </a> </li>
                    <li> <a href="#tecnologia" title="Tecnología"> Tecnología </a> </li>
                    <li> <a href="#sostenibilidad" title="Sostenibilidad"> Sostenibilidad </a> </li>
                    <li> <a href="#planos" title="Planos"> Planos </a> </li>
                    <li> <a href="#video" title="Vídeo"> Vídeo </a> </li>
                    <li> <a href="#catalogo" title="Catálogo"> Catálogo </a> </li>
                    <li> <a href="#contacto" title="Contacto"> Contacto </a> </li>

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
                                <div class="acepto">Acepto</div>
                                                                
                            </div>
                        </div>     
                        
                    <? } ?>