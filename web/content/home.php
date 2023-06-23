        <!-- home
        - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->

        <div class="row" id="home">
            
            <div class="slider-container">

                <div class="slider-control left inactive"></div>

                <div class="slider-control right"></div>

                <div class="slider">
                    
                    <div class="slide slide-0 active">

                        <div class="slide__bg" style="background-image: url('<? echo $appFrontUrl ?>/assets/img/slider1_1.jpg');"></div>

                        <div class="slide__content">

                            <div class="slide__text">

                                <div class="capa">
                                    
                                    <? if ($app_code_lang == LANG::ES) { ?>
                                    <h1> 
                                        25 viviendas tipo loft en alquiler.<br/>                                        
                                    </h1> 
                                    
                                    <h1 class="color"> 
                                        Todo empieza ahora.<br/>
                                        Un nuevo proyecto, una nueva vida.
                                    </h1> 
                                    
                                    <h1> 
                                        <span>¡VIVE TU PROYECTO DE VIDA!</span>
                                    </h1> 
                                    <? } ?>
                                    
                                    <? if ($app_code_lang == LANG::CAT) { ?>
                                    <h1> 
                                        25 habitatges tipus loft en lloguer.<br/>                                        
                                    </h1> 
                                    
                                    <h1 class="color"> 
                                        Tot comença ara.<br/>
                                        Un nou projecte, una nova vida.
                                    </h1> 
                                    
                                    <h1> 
                                        <span>VIU EL TEU PROJECTE DE VIDA!</span>
                                    </h1> 
                                    <? } ?>
                                    
                                    <? if ($app_code_lang == LANG::EN) { ?>
                                    <h1> 
                                        25 loft-style homes for rent.<br/>                                        
                                    </h1> 
                                    
                                    <h1 class="color"> 
                                        It all starts now.<br/>
                                        A new project, a new life.   
                                    </h1> 
                                    
                                    <h1> 
                                        <span>LIVE YOUR LIFE PROJECT!</span>
                                    </h1> 
                                    <? } ?>
                                    

                                </div>
                                
                            </div>

                        </div>                        

                    </div>
                    
                             
                </div>

            </div>
                
        </div>
        
        
        <!-- nuevo
        - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->

        <div class="row" id="intro">
            
            <div class="content">

                <div class="ico-down"> <a href="#intro"> <img src="<? echo $appFrontUrl ?>/assets/img/flecha_main_image.png" /> </a> </div>

                <div class="col_100">
                    
                    <div class="texto"> 
                                              
                        <? if ($app_code_lang == LANG::ES) { ?>
                            <p>Urban Lofts BCN es un proyecto de promoción de viviendas tipo lofts que se ubica en el Distrito de Sant Martí de Barcelona y forma parte del Área 22@.</p>
                            <p>La parcela en que se ubica, en la confluencia de la Calle Perú con la Calle Bilbao, está próxima a la Avenida Diagonal, la Gran Vía de les Corts Catalanes.</p>
                            <p>Esta nueva promoción forma parte de un conjunto mayor que integrará nuevos edificios de oficinas, un hotel y nuevas zonas verdes y de servicios. Una vez consolidado constituirá un nuevo eje de centralidad del Área 22@ y de la ciudad de Barcelona en su conjunto.</p>                        
                        <? } ?>   
                            
                        <? if ($app_code_lang == LANG::CAT) { ?>
                            <p>URBAN LOFT BCN és un projecte de promoció d'habitatges tipus lofts que se situa en el Districte de Sant Martí de Barcelona i forma part de l'Àrea 22@.</p>
                            <p>La parcel·la en què se situa, en la confluència del Carrer Perú amb el Carrer Bilbao, és pròxima a l'Avinguda Diagonal, al nou Parc del Centre i a la Gran Via de les Corts Catalans.</p>
                            <p>Aquesta nova promoció forma part d'un conjunt major que integrarà nous edificis d'oficines, un hotel i noves zones verdes i de serveis. Una vegada consolidat constituirà un nou eix de centralitat de l'Àrea 22@ i de la ciutat de Barcelona en el seu conjunt.</p>                        
                        <? } ?>   
                            
                        <? if ($app_code_lang == LANG::EN) { ?>
                            <p>URBAN LOFT BCN is a loft-style housing development project located in the Sant Martí District of Barcelona, within the 22@ Area.</p>
                            <p>It is located at the junction of Peru Street and Bilbao Street, very close to Diagonal Avenue, the new Parc del Centre and Gran Via de les Corts Catalanes.</p>
                            <p>This new development is part of a larger complex that integrates new office buildings, a hotel and new green areas and services. Once completed, it will constitute a new axis of centrality for the 22@ Area and the city of Barcelona as a whole.</p>                        
                        <? } ?>   
                            
                    </div>

                </div>
    
            </div>

        </div>        
    


        
        <!-- localizacion
        - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->

        <div class="row" id="localizacion">
            
            <div class="content">

                <div class="col_40 text-right">

                    <h2 style="text-transform:uppercase"> <? echo $app_lang['localizacion'] ?> </h2>

                    <div class="abstract"> 
                        
                        <? if ($app_code_lang == LANG::ES) { ?>
                        <strong>El Área 22@:</strong>
                        <br/>
                        Un distrito innovador, tecnológico,<br/>
                        social y cultural que sitúa a Barcelona<br/>
                        como referente europeo
                        <? } ?>
                        
                        <? if ($app_code_lang == LANG::CAT) { ?>
                        <strong>L'Àrea 22@:</strong>
                        <br/>
                        Un districte innovador, tecnològic, social i cultural que situa a Barcelona com a referent europeu
                        <? } ?>
                        
                        <? if ($app_code_lang == LANG::EN) { ?>
                        <strong>22@ Area:</strong>
                        <br/>
                        An innovative, technological, social,<br/>
                        and cultural district which places<br/>
                        Barcelona as a European benchmark
                        <? } ?>
                        
                    </div>

                </div>

                <div class="col_60 text-left">
                    
                    <? if ($app_code_lang == LANG::ES) { ?>
                    <p>
                        El Área 22@ en el distrito de Sant Martí, transforma 200 hectáreas de suelo industrial del barrio del Poblenou, en un distrito innovador que ofrece espacios modernos para la concentración estratégica de actividades intensivas del conocimiento. Es el proyecto de transformación urbanística más importante de la ciudad de Barcelona en los últimos años y uno de los más ambiciosos de Europa de estas características.
                        <br/><br/>
                        El proyecto 22@Barcelona transforma las antiguas áreas industriales del Poblenou en un entorno de elevada calidad para trabajar, vivir y aprender así como reinterpreta la función de los antiguos tejidos industriales del Poblenou y crea un nuevo modelo de espacio urbano.
                    </p>
                    <? } ?>
                    
                    <? if ($app_code_lang == LANG::CAT) { ?>
                    <p>
                        L'Àrea 22@ en el districte de Sant Martí, transforma 200 hectàrees de sòl industrial del barri del Poblenou, en un districte innovador que ofereix espais moderns per a la concentració estratègica d'activitats intensives del coneixement. És el projecte de transformació urbanística més important de la ciutat de Barcelona en els últims anys i un dels més ambiciosos d'Europa d'aquestes característiques.
                        <br/><br/>
                        El projecte 22@Barcelona transforma les antigues àrees industrials del Poblenou en un entorn d'elevada qualitat per a treballar, viure i aprendre així com reinterpreta la funció dels antics teixits industrials del Poblenou i crea un nou model d'espai urbà.
                    </p>
                    <? } ?>

                    <? if ($app_code_lang == LANG::EN) { ?>
                    <p>
                        22@, in the Sant Martí district, transforms 200 hectares of industrial land, in the Poblenou (New Town) neighborhood, into an innovative district which offers modern spaces for the strategic concentration of knowledge-intensive activities. It is the most important urban transformation project in the city of Barcelona in recent years and one of the most ambitious of its kind in Europe.
                        <br/><br/>
                        The 22@Barcelona project reinvents the former industrial areas of Poblenou into a high-quality environment for working, living, and learning, and reinterprets the function of the former industrial spaces of Poblenou, creating a new model of urban space.
                    </p>
                    <? } ?>
                    
                </div>
    
            </div>

        </div>




        <!-- mapas
        - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->

        <div class="row" id="mapas">
            
            <div class="col_100">

                <div id="fotos">


                    <!-- lightbox mapas
                    - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->

                    <div class="lightbox-mapa" id="lightbox1">
                        
                        <div class="ico-close"> <a><img src="<? echo $appFrontUrl ?>/assets/img/close_icon.png" /></a> </div>

                        <div class="mapa-info" id="mapa_info_1" data-item="1">
                            <div class="izq">
                                <div class="imagen"> <img src="<? echo $appFrontUrl ?>/assets/img/icon_glories.png" /> </div>
                            </div>

                            <div class="der">
                                <div class="con-der">
                                    <div class="textos">
                                        <? if ($app_code_lang == LANG::ES) { ?>
                                        Glòries es más que un parque, es un motor para la transformación de la ciudad, es un ecosistema urbano, autosuficiencia energética, gestión económica de los recursos, entorno digital y eficiencia en los desplazamientos, son algunos de los factores destinados a desarrollarse más ampliamente en la ciudad. Glòries es la piedra angular de un nuevo dinamismo y del desarrollo de una estrategia ecológica a escala de la metrópolis catalana, una naturaleza confortable al servicio de los ciudadanos.          
                                        <? } ?>
                                        
                                        <? if ($app_code_lang == LANG::CAT) { ?>
                                        Glòries és més que un parc, és un motor per a la transformació de la ciutat, és un ecosistema urbà, autosuficiència energètica, gestió econòmica dels recursos, entorn digital i eficiència en els desplaçaments, són alguns dels factors destinats a desenvolupar-se més àmpliament a la ciutat. Glòries és la pedra angular d'un nou dinamisme i del desenvolupament d'una estratègia ecològica a escala de la metròpolis catalana, una naturalesa confortable al servei dels ciutadans.       
                                        <? } ?>
                                        
                                        <? if ($app_code_lang == LANG::EN) { ?>
                                        Glòries is more than a park, it is an engine for the transformation of the city, an urban ecosystem, it is energy self-sufficiency, economic management of resources, a digital environment and travel efficiency, all of which are factors which will develop more widely in the city. Glòries is the cornerstone of a new dynamism and the development of an ecological strategy for the Catalan metropolis, a comfortable nature that serves the citizens.     
                                        <? } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mapa-info" id="mapa_info_2" data-item="2">
                            <div class="izq">
                                <div class="imagen"> <img src="<? echo $appFrontUrl ?>/assets/img/icon_can_ricart.png" /> </div>
                            </div>

                            <div class="der">
                                <div class="con-der">
                                    <div class="textos">
                                        <? if ($app_code_lang == LANG::ES) { ?>
                                        Can Ricart, una de las primeras fábricas de estampación mecánica de tejidos de algodón en Cataluña, y referente histórico de la industrialización de la Ciudad Condal, será finalmente un espacio de ampliación de estudios de la Universidad de Barcelona. En un futuro cercano, será uno de los principales centros de formación universitaria del sector 22@ del Poble Nou.                                        
                                        <? } ?>
                                        
                                        <? if ($app_code_lang == LANG::CAT) { ?>
                                        Can Ricart, una de les primeres fàbriques d'estampació mecànica de teixits de cotó a Catalunya, i referent històric de la industrialització de la Ciutat Comtal, serà finalment un espai d'ampliació d'estudis de la Universitat de Barcelona. En un futur pròxim, serà un dels principals centres de formació universitària del sector 22@ del Poble Nou.                                     
                                        <? } ?>
                                        
                                        <? if ($app_code_lang == LANG::EN) { ?>
                                        Can Ricart, one of the first cotton fabric mechanical printing factories in Catalonia, and a historical reference of the industrialization of the city of Barcelona, will ultimately become a space for further studies of the University of Barcelona. In the near future, it will be one of the main centres of higher education in the 22@ sector of Poblenou.                           
                                        <? } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mapa-info" id="mapa_info_3" data-item="3">
                            <div class="izq">
                                <div class="imagen"> <img src="<? echo $appFrontUrl ?>/assets/img/icon_diagonal_mar.png" /> </div>
                            </div>

                            <div class="der">
                                <div class="con-der">
                                    <div class="textos">
                                        <? if ($app_code_lang == LANG::ES) { ?>
                                        Diagonal Mar es una zona cosmopolita, moderna y multicultural, muy valorada por los clientes internacionales por ofrecer apartamentos lujosos y confortables. Propiedades como Diagonal Mar ofrecen fantásticas vistas y todas las comodidades necesarias para garantizar una excelente calidad de vida a sus residentes.
                                        La mayoría de estos proyectos han sido gestionados por el equipo de ACTUAL BCN.                             
                                        <? } ?>
                                        
                                        <? if ($app_code_lang == LANG::CAT) { ?>
                                        Diagonal Mar és una zona cosmopolita, moderna i multicultural, molt valorada pels clients internacionals per oferir apartaments luxosos i confortables. Propietats com Diagonal Mar ofereixen fantàstiques vistes i totes les comoditats necessàries per a garantir una excel·lent qualitat de vida als seus residents.
                                        La majoria d'aquests projectes han estat gestionats per l'equip d'ACTUAL BCN.                            
                                        <? } ?>
                                        
                                        <? if ($app_code_lang == LANG::EN) { ?>
                                        Diagonal Mar is a cosmopolitan, modern, and multicultural area, highly appreciated by international clients due to its luxurious and comfortable housing. Properties such as Diagonal Mar offer fantastic views and all the amenities necessary to ensure an excellent quality of life for its residents.
                                        Most of these projects have been managed by the ACTUAL BCN team.                            
                                        <? } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mapa-info" id="mapa_info_4" data-item="4">
                            <div class="izq">
                                <div class="imagen"> <img src="<? echo $appFrontUrl ?>/assets/img/icon_ocio_mar_<? echo $app_code_lang ?>.png" /> </div>
                            </div>

                            <div class="der">
                                <div class="con-der">
                                    <div class="textos">
                                        <? if ($app_code_lang == LANG::ES) { ?>
                                        La zona del 22@ (Poblenou), está perfectamente equipada con parques, zonas verdes, instalaciones deportivas y zonas de ocio como el Parc del Centre, situado junto a "Urban Lofts BCN", el Parc Diagonal Mar, la Rambla del Poble Nou (centro neurálgico del distrito, repleto de tiendas, bares y restaurantes), la Avenida Diagonal, el Teatro Nacional de Catalunya (TNC) o el Museo del Diseño, entre otros.
                                        <br/>
                                        Las mejores playas de Barcelona se encuentran cerca del Urban Lofts BCN, al igual que los puertos deportivos Port Fórum y Port Olímpic.                     
                                        <? } ?>
                                        
                                        <? if ($app_code_lang == LANG::CAT) { ?>
                                        La zona del 22@ (Poblenou), está perfectamente equipada con parques, zonas verdes, instalaciones deportivas y zonas de ocio como el Parc del Centre, situado junto a "Urban Lofts BCN", el Parc Diagonal Mar, la Rambla del Poble Nou (centro neurálgico del distrito, repleto de tiendas, bares y restaurantes), la Avenida Diagonal, el Teatro Nacional de Catalunya (TNC) o el Museo del Diseño, entre otros.
                                        <br/>
                                        Las mejores playas de Barcelona se encuentran cerca del Urban Lofts BCN, al igual que los puertos deportivos Port Fórum y Port Olímpic.                     
                                        <? } ?>
                                        
                                        <? if ($app_code_lang == LANG::EN) { ?>
                                        The 22@ area (Poblenou), is perfectly integrated with parks, green areas, sports facilities, and leisure areas such as the Parc del Centre, located next to "Urban Lofts BCN", Parc Diagonal Mar, Rambla del Poblenou (the heart of the district with its many stores, bars and restaurants), Avenida Diagonal, the Teatro Nacional de Catalunya (TNC) or the Design Museum, among others. 
                                        <br/>
                                        The best beaches in Barcelona are just a few minutes away from Urban Lofts BCN, as well as the marinas Port Fórum and Port Olímpic.                    
                                        <? } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mapa-info" id="mapa_info_5" data-item="5">
                            <div class="izq">
                                <div class="imagen"> <img src="<? echo $appFrontUrl ?>/assets/img/icon_hoteles_<? echo $app_code_lang ?>.png" /> </div>
                            </div>

                            <div class="der">
                                <div class="con-der">
                                    <div class="textos">
                                        <? if ($app_code_lang == LANG::ES) { ?>
                                        En el Distrito 22@, y cerca de Urban Lofts BCN, podemos encontrar algunos de los mejores hoteles de Barcelona, como Meliá Barcelona, Hilton, AC, Princess, Silken Diagonal o Four Points by Sheraton, entre otros.                  
                                        <? } ?>
                                        
                                        <? if ($app_code_lang == LANG::CAT) { ?>
                                        En el Districte 22@, i prop de Urban Lofts BCN, podem trobar alguns dels millors hotels de Barcelona, com Meliá Barcelona, Hilton, AC, Princess, Silken Diagonal o Four Points by Sheraton, entre altres.             
                                        <? } ?>
                                        
                                        <? if ($app_code_lang == LANG::EN) { ?>
                                        Some of the best hotels in Barcelona, such as Meliá Barcelona, Hilton, AC, Princess, Silken Diagonal or Four Points by Sheraton, among others, can be found close to Urban Lofts BCN in the 22@ district.       
                                        <? } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mapa-info" id="mapa_info_6" data-item="6">
                            <div class="izq">
                                <div class="imagen"> <img src="<? echo $appFrontUrl ?>/assets/img/icon_ejes_comerciales_<? echo $app_code_lang ?>.png" /> </div>
                            </div>

                            <div class="der">
                                <div class="con-der">
                                    <div class="textos">
                                        <? if ($app_code_lang == LANG::ES) { ?>
                                        Alrededor de Urban Lofts BCN podemos encontrar grandes centros comerciales, Glòries y Diagonal Mar, así como multitud de tiendas, una amplia oferta gastronómica y multicines, entre otros. Asimismo, el conocido mercado de Nous Encants, establecido hace 7 siglos, donde se comercializan artículos de segunda mano y vintage, crea un ambiente de especial singularidad para el entorno.          
                                        <? } ?>
                                        
                                        <? if ($app_code_lang == LANG::CAT) { ?>
                                        Al voltant de Urban Lofts BCN podem trobar grans centres comercials, Glòries i Diagonal Mar, així com multitud de botigues, una àmplia oferta gastronòmica i multicines, entre altres. Així mateix, el conegut mercat de Nous Encants, establert fa 7 segles, on es comercialitzen articles de segona mà i vintage, crea un ambient d'especial singularitat per a l'entorn.       
                                        <? } ?>
                                        
                                        <? if ($app_code_lang == LANG::EN) { ?>
                                        Located around Urban Lofts BCN are large shopping centers, Glòries and Diagonal Mar, as well as a variety of stores, a wide gastronomic offer, and multiplex cinemas, among others. Also, the famous Nous Encants market, established 7 centuries ago, commercializing second hand and vintage items, creates an atmosphere of special uniqueness to the environment.
                                        <? } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mapa-info" id="mapa_info_7" data-item="7">
                            <div class="izq">
                                <div class="imagen"> <img src="<? echo $appFrontUrl ?>/assets/img/icon_ejes_empresariales_<? echo $app_code_lang ?>.png" /> </div>
                            </div>

                            <div class="der">
                                <div class="con-der">
                                    <div class="textos">
                                        <? if ($app_code_lang == LANG::ES) { ?>
                                        El distrito 22@, donde se ubica Urban Lofts BCN, se ha transformado en una zona de negocios, donde más de 8.800 empresas han optado por establecer sus sedes, el 30% de las cuales trabajan en tecnología o educación.
                                        Una parte del área está formada por empresas de telecomunicaciones y nuevas tecnologías, así como universidades, centros de formación continua y centros de investigación y tecnología, como la sede de la Comisión del Mercado de las Telecomunicaciones y las oficinas de la Torre Glòries, entre otros.      
                                        <? } ?>
                                        
                                        <? if ($app_code_lang == LANG::CAT) { ?>
                                        El districte 22@, on se situa Urban Lofts BCN, s'ha transformat en una zona de negocis, on més de 8.800 empreses han optat per establir les seves seus, el 30% de les quals treballen en tecnologia o educació.
                                        Una part de l'àrea està formada per empreses de telecomunicacions i noves tecnologies, així com universitats, centres de formació contínua i centres de recerca i tecnologia, com la seu de la Comissió del Mercat de les Telecomunicacions i les oficines de la Torre Glòries, entre altres.
                                        <? } ?>
                                        
                                        <? if ($app_code_lang == LANG::EN) { ?>
                                        The 22@ has become a business district, where more than 8,800 companies have established their headquarters, 30% of which are involved in technology or education. 
                                        Telecommunications and new technology companies make up part of this area, as well as universities, continuing education centers and research and technology centers, such as the headquarters of the Telecommunications Market Commission and the offices of Torre Glòries, among others. 
                                        <? } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                    </div>


                    <img src="<? echo $appFrontUrl ?>/assets/img/mapa_localiza.jpg" class="foto-localizacion" id="localizacion0" style="display: block;" />
                    <img src="<? echo $appFrontUrl ?>/assets/img/mapa_localiza_glories.jpg" class="foto-localizacion" id="localizacion1" style="display: none;" />
                    <img src="<? echo $appFrontUrl ?>/assets/img/mapa_localiza_canricart.jpg" class="foto-localizacion" id="localizacion2" style="display: none;" />
                    <img src="<? echo $appFrontUrl ?>/assets/img/mapa_localiza_diagonalmar.jpg" class="foto-localizacion" id="localizacion3" style="display: none;" />
                    <img src="<? echo $appFrontUrl ?>/assets/img/mapa_localiza_ocio.jpg" class="foto-localizacion" id="localizacion4" style="display: none;" />
                    <img src="<? echo $appFrontUrl ?>/assets/img/mapa_localiza_hoteles.jpg" class="foto-localizacion" id="localizacion5" style="display: none;" />
                    <img src="<? echo $appFrontUrl ?>/assets/img/mapa_localiza_comercio.jpg" class="foto-localizacion" id="localizacion6" style="display: none;" />
                    <img src="<? echo $appFrontUrl ?>/assets/img/mapa_localiza_ejes.jpg" class="foto-localizacion" id="localizacion7" style="display: none;" />
                
                </div>

            </div>

            <div class="col_100">

                <div id="donde-select">

                    <select name="mapa" id="mapa">
                        <option value="0"> - <? echo $app_lang['seleccionar_zona'] ?> - </option>
                        <option value="1"> <? echo $app_lang['placa_les_glories'] ?> </option>
                        <option value="2"> <? echo $app_lang['can_ricart'] ?> </option>
                        <option value="3"> <? echo $app_lang['diagonal_mar'] ?> </option>
                        <option value="4"> <? echo $app_lang['ocio_mar'] ?> </option>
                        <option value="5"> <? echo $app_lang['hoteles_area_22'] ?> </option>
                        <option value="6"> <? echo $app_lang['ejes_comerciales_area_22'] ?> </option>
                        <option value="7"> <? echo $app_lang['ejes_empresariales'] ?> </option>
                    </select>

                </div>

                <div id="donde">
                        
                    <a id="tit-localizacion1" class="btn_localizacion" data-item="1"> <? echo $app_lang['placa_les_glories'] ?> </a>
                    <a id="tit-localizacion2" class="btn_localizacion" data-item="2"> <? echo $app_lang['can_ricart'] ?> </a>
                    <a id="tit-localizacion3" class="btn_localizacion" data-item="3"> <? echo $app_lang['diagonal_mar'] ?> </a>
                    <a id="tit-localizacion4" class="btn_localizacion" data-item="4"> <? echo $app_lang['ocio_mar'] ?> </a>
                    <a id="tit-localizacion5" class="btn_localizacion" data-item="5"> <? echo $app_lang['hoteles_area_22'] ?> </a>
                    <a id="tit-localizacion6" class="btn_localizacion" data-item="6"> <? echo $app_lang['ejes_comerciales_area_22'] ?> </a>
                    <a id="tit-localizacion7" class="btn_localizacion" data-item="7"> <? echo $app_lang['ejes_empresariales'] ?> </a>
                
                </div>

            </div>

        </div>



        <!-- comunicaciones
        - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->

        <div class="row" id="comunicaciones">
            
            <div class="content">

                <div class="col_100">

                    <h2 style="text-transform:uppercase"> <? echo $app_lang['comunicaciones'] ?> </h2>

                    <div class="linea"></div>

                </div>
                
                <div class="col_100">
                    
                    <div class="texto"> 
                                        
                        <? if ($app_code_lang == LANG::ES) { ?>
                            <p>Urban Lofts BCN está ubicado entre dos de las mayores arterias de comunicación de Barcelona, la Avenida Diagonal y la Gran Via de les Corts Catalanes, por lo que está perfectamente conectado por transporte público. Además, se encuentra muy cerca de la Ronda de Dalt y la Ronda Litoral, las principales vías rápidas de acceso y salida de la ciudad.</p>
                            <p>(Tiempo estimado hasta el aeropuerto: 20 minutos).</p>  
                        <? } ?>
                            
                        <? if ($app_code_lang == LANG::CAT) { ?>
                            <p>Urban Lofts BCN està situat entre dues de les majors artèries de comunicació de Barcelona, l'Avinguda Diagonal i la Gran Via de les Corts Catalans, per la qual cosa està perfectament connectat per transport públic. A més, es troba molt prop de la Ronda de Dalt i la Ronda Litoral, les principals vies ràpides d'accés i sortida de la ciutat.</p>
                            <p>(Temps estimat fins a l'aeroport: 20 minuts).</p>  
                        <? } ?>
                            
                        <? if ($app_code_lang == LANG::EN) { ?>
                            <p>Urban Lofts BCN is located between two of the main arterial roads in Barcelona, Avenida Diagonal and Gran Via de les Corts Catalanes, so it is perfectly connected to public transport. It is also very close to Ronda de Dalt and Ronda Litoral, the main rapid ring roads to and from the city. </p>
                            <p>(Estimated time to the airport: 20 minutes).</p>  
                        <? } ?>
                            
                        <br/><br/><br/>
                                                
                    </div>

                </div>
                
            </div>
            
            <div class="col_100">
                
                <div class="col_70 mapa-com resp">
                        <img src="<? echo $appFrontUrl ?>/assets/img/com_mapa.jpg" alt="" />                    
                </div>
                
                <div class="col_70 mapa-com no-resp">
                                      
                </div>


                <div class="col_30 icons-com">

                    <div class="box">

                        <!-- item
                        - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
                        <div class="item">
                            <div class="icono"> 
                                <div class="con-icono">
                                    <img class="icon-anim" src="<? echo $appFrontUrl ?>/assets/img/metro_icon.png" style="width:60px" /> 
                                </div>
                            </div>
                            <div class="tit"> Metro </div>
                            <table>
                                <tr>
                                    <td class="dato text-right"> 1.370 m </td>
                                    <td class="descr text-left"> Glories (Línea 1) </td>
                                </tr>
                                <tr>
                                    <td class="dato text-right"> 1.111 m </td>
                                    <td class="descr text-left"> Clot (Línea 2) </td>
                                </tr>
                                <tr>
                                    <td class="dato text-right"> 823 m </td>
                                    <td class="descr text-left"> Poble Nou (Línea 4) </td>
                                </tr>
                            </table>
                        </div>

                        <!-- item
                        - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
                        <div class="item">
                            <div class="icono"> 
                                <div class="con-icono">
                                    <img class="icon-anim" src="<? echo $appFrontUrl ?>/assets/img/com_bus_icon.png" style="width:50px" /> 
                                </div>
                            </div>
                            <div class="tit"> Bus </div>
                            <table>
                                <tr>
                                    <td class="dato text-right"> 349 m </td>
                                    <td class="descr text-left"> Línea </td>
                                </tr>
                                <tr>
                                    <td class="dato text-right"> 260 m </td>
                                    <td class="descr text-left"> Línea </td>
                                </tr>
                                <tr>
                                    <td class="dato text-right"> 50 m </td>
                                    <td class="descr text-left"> Línea </td>
                                </tr>
                                <tr>
                                    <td class="dato text-right"> 547 m </td>
                                    <td class="descr text-left"> Línea </td>
                                </tr>
                                <tr>
                                    <td class="dato text-right"> 160 m </td>
                                    <td class="descr text-left"> Línea </td>
                                </tr>
                            </table>
                        </div>
                        
                        <!-- item
                        - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
                        <div class="item tram">
                            <div class="icono"> 
                                <div class="con-icono">
                                    <img class="icon-anim" src="<? echo $appFrontUrl ?>/assets/img/com_tram_icon.png" style="width:90px" /> 
                                </div>
                            </div>
                            <div class="tit"> Tram </div>
                            <table>
                                <tr>
                                    <td class="dato text-right"> 330 m </td>
                                    <td class="descr text-left"> Pere IV (línea T4) </td>
                                </tr>
                                <tr>
                                    <td class="dato text-right"> 340 m </td>
                                    <td class="descr text-left"> Can Jaumandreu<br/>(Línea 5 y 6) </td>
                                </tr>
                            </table>
                        </div>                        

                        <!-- item
                        - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
                        <div class="item">
                            <div class="icono"> 
                                <div class="con-icono">
                                    <img class="icon-anim" src="<? echo $appFrontUrl ?>/assets/img/com_bicing_icon.png" style="width:45px" />
                                </div>
                            </div>
                            <div class="tit"> Bicing </div>
                            <table>
                                <tr>
                                    <td class="dato text-right"> 138 m </td>
                                    <td class="descr text-left"> Estación Bicing </td>
                                </tr>
                            </table>
                        </div>                        

                        <!-- item
                        - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
                        <div class="item">
                            <div class="icono"> 
                                <div class="con-icono">
                                    <img class="icon-anim" src="<? echo $appFrontUrl ?>/assets/img/com_pie_icon.png" style="width:25px" /> 
                                </div>
                            </div>
                            <div class="tit"> A pie </div>
                            <table>
                                <tr>
                                    <td class="dato text-right"> 6 min. </td>
                                    <td class="descr text-left"> Metro </td>
                                </tr>
                                <tr>
                                    <td class="dato text-right"> 1/2 min. </td>
                                    <td class="descr text-left"> Bus </td>
                                </tr>
                                <tr>
                                    <td class="dato text-right"> 6 min. </td>
                                    <td class="descr text-left"> Centro Comercial </td>
                                </tr>
                                <tr>
                                    <td class="dato text-right"> 3 min. </td>
                                    <td class="descr text-left"> Parc del Centre </td>
                                </tr>
                                <tr>
                                    <td class="dato text-right"> 3 min. </td>
                                    <td class="descr text-left"> Tranvía </td>
                                </tr>
                            </table>
                        </div>                        

                        <!-- item
                        - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
                        <div class="item">
                            <div class="icono"> 
                                <div class="con-icono">
                                    <img class="icon-anim" src="<? echo $appFrontUrl ?>/assets/img/com_rodalies_icon.png" style="width:40px" /> 
                                </div>
                            </div>
                            <div class="tit"> Rodalies </div>
                            <table>
                                <tr>
                                    <td class="dato text-right"> 1.100 m </td>
                                    <td class="descr text-left"> Estación Clot-Aragó <br/>Línea R1<br/> Línea R2, R2 Nord </td>
                                </tr>
                            </table>
                        </div>                        

                        <!-- item
                        - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
                        <div class="item coche">
                            <div class="icono"> 
                                <div class="con-icono">
                                    <img class="icon-anim" src="<? echo $appFrontUrl ?>/assets/img/com_coche_icon.png" style="width:50px" />
                                </div>                        
                            </div>
                            <div class="tit"> Coche </div>
                            <table>
                                <tr>
                                    <td class="descr descr-full text-center"> 
                                        <? if ($app_code_lang == LANG::ES) { ?>
                                        La proximidad a la Ronda de Dalt y Ronda Litoral, permite una rápida conexión con las principales calles, autopistas y el aeropuerto.<br/><br/>(20 minutos)
                                        <? } ?>
                                        
                                        <? if ($app_code_lang == LANG::CAT) { ?>
                                        La proximitat a la Ronda de Dalt i Ronda Litoral, permet una ràpida connexió amb els principals carrers, autopistes i l'aeroport.<br/><br/>(20 minuts)
                                        <? } ?>
                                        
                                        <? if ($app_code_lang == LANG::EN) { ?>
                                        Its proximity to the Ronda de Dalt and Ronda Litoral allows for quick access to main roads, highways, and the airport.<br/><br/>(20 minutes) 
                                        <? } ?>
                                    </td>
                                </tr>
                            </table>
                        </div>                        

                    </div>

                </div>    
                
            </div>
            
        </div>


        
        <!-- Edificio
        - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
        
        <div class="row" id="edificio">
            
            <div class="content">
                
                <div class="col_100">

                    <h2 style="text-transform:uppercase"> <? echo $app_lang['el_edificio'] ?> </h2>

                    <div class="linea"></div>

                </div>
                
                <div class="col_100">
                    
                    <div class="texto colx2"> 
                                            
                        <? if ($app_code_lang == LANG::ES) { ?>
                        <div class="col_50">
                            <p>Urban Lofts BCN, localizado en el número 88 de la calle Perú, lo forman dos edificios conectados a través de tres núcleos de comunicaciones verticales. El conjunto ha sido objeto de una rehabilitación integral en la que se han respetado el sistema compositivo, el lenguaje arquitectónico y los materiales de la fachada original para preservar ese antiguo espíritu industrial.</p>
                        </div>  
                        <div class="col_50">
                            <p>Se trata de una construcción moderna, actual, con una amplia variedad de servicios y prestaciones, además de diversos espacios comunes en planta baja y en cubierta diseñados para la comodidad y el disfrute de sus residentes.</p>                        
                            <p>Todas las viviendas tienen la opción de disponer, además, de plazas de parking y trastero en las plantas sótano del edificio.</p>                    
                        </div>
                        <? } ?>
                        
                        <? if ($app_code_lang == LANG::CAT) { ?>
                        <div class="col_50">
                            <p>Urban Lofts BCN, localitzat en el número 88 del carrer Perú, el formen dos edificis connectats a través de tres nuclis de comunicacions verticals. El conjunt ha estat objecte d'una rehabilitació integral en la qual s'han respectat el sistema compositiu, el llenguatge arquitectònic i els materials de la façana original per a preservar aquest antic esperit industrial.</p>
                        </div>  
                        <div class="col_50">
                            <p>Es tracta d'una construcció moderna, actual, amb una àmplia varietat de serveis i prestacions, a més de diversos espais comuns en planta baixa i en coberta dissenyats per a la comoditat i el gaudi dels seus residents.</p>                        
                            <p>Tots els habitatges tenen l'opció de disposar, a més, de places de pàrquing i traster en les plantes soterrani de l'edifici.</p>                    
                        </div>
                        <? } ?>
                        
                        <? if ($app_code_lang == LANG::EN) { ?>
                        <div class="col_50">
                            <p>Urban Lofts BCN, located at 88 Peru Street, is formed by two buildings connected by three vertical cores. The complex has undergone an integral rehabilitation respecting the compositional system, the architectural language, and the materials of the original facade in order to preserve the old industrial essence of the building.</p>
                        </div>  
                        <div class="col_50">
                            <p>It is a modern, contemporary building with an ample number of services and amenities, as well as several common areas on the ground and top floors designed for the comfort and enjoyment of residents.</p>                        
                            <p>In addition, all apartments have the option of parking spaces and storage rooms in the basement of the building.</p>                    
                        </div>
                        <? } ?>
                                               
                    </div>

                </div>
                
            </div>
            
        </div>

        <div class="row" id="slider">
            
            <div class="gallery">
                <? for ($x = 1; $x <= 8; $x++) { ?>
                <div class="gallery-cell" style="background-image: url('<? echo $appFrontUrl ?>/assets/img/slider_<? echo $x ?>_edificio.jpg')"></div>
                <? } ?>       
            </div>    
            
        </div>






        <!-- servicios
        - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->

        <div class="row" id="servicios">
            
            <div class="content">

                <div class="col_100">

                    <h2 class="text-white" style="text-transform:uppercase"> <? echo $app_lang['servicios_comunes'] ?> </h2>

                    <div class="linea"></div>

                </div>

                <div class="col_100">


                    <!-- lightbox servicios
                    - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->

                    <div class="lightbox-servicios" id="lightbox2">
                        
                        <div class="ico-close"> <a><img src="<? echo $appFrontUrl ?>/assets/img/close_icon.png" /></a> </div>

                        <div class="servicio-info" id="servicio_info_1">
                            <div class="tit"> <? echo $app_lang['serv_conserjeria_tit'] ?> </div>

                            <div class="imagen"> <img src="<? echo $appFrontUrl ?>/assets/img/serv_conserjeria.jpg" /> </div>

                            <div class="des"> <? echo $app_lang['serv_conserjeria_txt'] ?> </div>
                        </div>
                        
                        <div class="servicio-info" id="servicio_info_2">
                            <div class="tit"> <? echo $app_lang['serv_gym_tit'] ?> </div>

                            <div class="imagen"> <img src="<? echo $appFrontUrl ?>/assets/img/serv_gym.jpg" /> </div>

                            <div class="des"> <? echo $app_lang['serv_gym_txt'] ?></div>
                        </div>
                        
                        <div class="servicio-info" id="servicio_info_3">
                            <div class="tit"> <? echo $app_lang['serv_vestuarios_tit'] ?> </div>

                            <div class="imagen"> <img src="<? echo $appFrontUrl ?>/assets/img/serv_vestuarios.jpg" /> </div>

                            <div class="des"> <? echo $app_lang['serv_vestuarios_txt'] ?> </div>
                        </div>
                        
                        <div class="servicio-info" id="servicio_info_4">
                            <div class="tit"> <? echo $app_lang['serv_lavanderia_tit'] ?> </div>

                            <div class="imagen"> <img src="<? echo $appFrontUrl ?>/assets/img/serv_lavanderia.jpg" /> </div>

                            <div class="des"> <? echo $app_lang['serv_lavanderia_txt'] ?></div>
                        </div>
                        
                        <div class="servicio-info" id="servicio_info_5">
                            <div class="tit"> <? echo $app_lang['serv_vestibulo_tit'] ?> </div>

                            <div class="imagen"> <img src="<? echo $appFrontUrl ?>/assets/img/serv_vestibulo.jpg" /> </div>

                            <div class="des"> <? echo $app_lang['serv_vestibulo_txt'] ?></div>
                        </div>
                        
                        <div class="servicio-info" id="servicio_info_6">
                            <div class="tit"> <? echo $app_lang['serv_sala_polivalente_tit'] ?> </div>

                            <div class="imagen"> <img src="<? echo $appFrontUrl ?>/assets/img/serv_polivalente.jpg" /> </div>

                            <div class="des"> <? echo $app_lang['serv_sala_polivalente_txt'] ?></div>
                        </div>
                        
                        <div class="servicio-info" id="servicio_info_7">
                            <div class="tit"> <? echo $app_lang['serv_bicis_tit'] ?> </div>

                            <div class="imagen"> <img src="<? echo $appFrontUrl ?>/assets/img/serv_bicis.jpg" /> </div>

                            <div class="des"> <? echo $app_lang['serv_bicis_txt'] ?></div>
                        </div>
                        
                        <div class="servicio-info" id="servicio_info_8">
                            <div class="tit"> <? echo $app_lang['serv_taquillas_tit'] ?> </div>

                            <div class="imagen"> <img src="<? echo $appFrontUrl ?>/assets/img/serv_taquillas_inteligentes.jpg" /> </div>

                            <div class="des"> <? echo $app_lang['serv_taquillas_txt'] ?></div>
                        </div>
                        
                        <div class="servicio-info" id="servicio_info_9">
                            <div class="tit"> <? echo $app_lang['serv_wifi_tit'] ?> </div>

                            <div class="imagen"> <img src="<? echo $appFrontUrl ?>/assets/img/serv_wifi.jpg" /> </div>

                            <div class="des"> <? echo $app_lang['serv_wifi_txt'] ?></div>
                        </div>
                        
                        <div class="servicio-info" id="servicio_info_10">
                            <div class="tit"> <? echo $app_lang['serv_solarium_tit'] ?> </div>

                            <div class="imagen"> <img src="<? echo $appFrontUrl ?>/assets/img/serv_solarium.jpg" /> </div>

                            <div class="des"> <? echo $app_lang['serv_solarium_txt'] ?></div>
                        </div>
                        
                        <div class="servicio-info" id="servicio_info_11">
                            <div class="tit"> <? echo $app_lang['serv_piscinas_tit'] ?> </div>

                            <div class="imagen"> <img src="<? echo $appFrontUrl ?>/assets/img/serv_piscinas.jpg" /> </div>

                            <div class="des"> <? echo $app_lang['serv_piscinas_txt'] ?></div>
                        </div>
                        
                        <div class="servicio-info" id="servicio_info_12">
                            <div class="tit"> <? echo $app_lang['serv_chill_out_tit'] ?> </div>

                            <div class="imagen"> <img src="<? echo $appFrontUrl ?>/assets/img/serv_cill_out.jpg" /> </div>

                            <div class="des"> <? echo $app_lang['serv_chill_out_txt'] ?></div>
                        </div>                                                
                        
                    </div>
                    
                    
                    <div class="box images-anim">

                        <!-- item
                        - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
                        <div class="item">
                            <div class="icono"> 
                                <div class="con-icono">
                                    <img class="icon-anim" src="<? echo $appFrontUrl ?>/assets/img/video_vigila_icon.png" style="width: 100px" /> 
                                </div>
                            </div>
                            <div class="tit text-white"> <? echo $app_lang['serv_conserjeria'] ?> </div>
                            <a class="boton btn_servicio" data-item="1"></a>
                        </div>
                                                                                                                                                
                        <!-- item
                        - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
                        <div class="item">
                            <div class="icono"> 
                                <div class="con-icono">
                                    <img class="icon-anim" src="<? echo $appFrontUrl ?>/assets/img/gym_icon.png" style="width: 100px" /> 
                                </div>
                            </div>
                            <div class="tit text-white"> <? echo $app_lang['serv_gym'] ?> </div>
                            <a class="boton btn_servicio" data-item="2"></a>
                        </div>

                        <!-- item
                        - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
                        <div class="item">
                            <div class="icono"> 
                                <div class="con-icono">
                                    <img class="icon-anim" src="<? echo $appFrontUrl ?>/assets/img/vestuario_icon.png" style="width: 100px" /> 
                                </div>
                            </div>
                            <div class="tit text-white"> <? echo $app_lang['serv_vestuarios'] ?> </div>
                            <a class="boton btn_servicio" data-item="3"></a>
                        </div>
                        
                        <!-- item
                        - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
                        <div class="item">
                            <div class="icono"> 
                                <div class="con-icono">
                                    <img class="icon-anim" src="<? echo $appFrontUrl ?>/assets/img/lavanderia_icon.png" style="width: 80px" /> 
                                </div>
                            </div>
                            <div class="tit text-white"> <? echo $app_lang['serv_lavanderia'] ?> </div>
                            <a class="boton btn_servicio" data-item="4"></a>
                        </div>
                                                
                        <!-- item
                        - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
                        <div class="item">
                            <div class="icono"> 
                                <div class="con-icono">
                                    <img class="icon-anim" src="<? echo $appFrontUrl ?>/assets/img/vestibulo_icon.png" style="width: 80px" /> 
                                </div>
                            </div>
                            <div class="tit text-white"> <? echo $app_lang['serv_vestibulo'] ?> </div>
                            <a class="boton btn_servicio" data-item="5"></a>
                        </div>
                                                
                        <!-- item
                        - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
                        <div class="item">
                            <div class="icono"> 
                                <div class="con-icono">
                                    <img class="icon-anim" src="<? echo $appFrontUrl ?>/assets/img/polivalent_icon.png" style="width: 100px" /> 
                                </div>
                            </div>
                            <div class="tit text-white"> <? echo $app_lang['serv_sala_polivalente'] ?> </div>
                            <a class="boton btn_servicio" data-item="6"></a>
                        </div>
                        
                        <!-- item
                        - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
                        <div class="item">
                            <div class="icono"> 
                                <div class="con-icono">
                                    <img class="icon-anim" src="<? echo $appFrontUrl ?>/assets/img/bicipark_icon.png" style="width: 100px" /> 
                                </div>
                            </div>
                            <div class="tit text-white"> <? echo $app_lang['serv_bicis'] ?> </div>
                            <a class="boton btn_servicio" data-item="7"></a>
                        </div>
                        
                        <!-- item
                        - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
                        <div class="item">
                            <div class="icono"> 
                                <div class="con-icono">
                                    <img class="icon-anim" src="<? echo $appFrontUrl ?>/assets/img/taquillas_icon.png" style="width: 100px" /> 
                                </div>
                            </div>
                            <div class="tit text-white"> <? echo $app_lang['serv_taquillas'] ?> </div>
                            <a class="boton btn_servicio" data-item="8"></a>
                        </div>
                        
                        <!-- item
                        - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
                        <div class="item">
                            <div class="icono"> 
                                <div class="con-icono">
                                    <img class="icon-anim" src="<? echo $appFrontUrl ?>/assets/img/wi-fi_icon.png" style="width: 100px" /> 
                                </div>
                            </div>
                            <div class="tit text-white"> <? echo $app_lang['serv_wifi'] ?> </div>
                            <a class="boton btn_servicio" data-item="9"></a>
                        </div>
                        
                        <!-- item
                        - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
                        <div class="item">
                            <div class="icono"> 
                                <div class="con-icono">
                                    <img class="icon-anim" src="<? echo $appFrontUrl ?>/assets/img/solarium_icon.png" style="width: 100px" /> 
                                </div>
                            </div>
                            <div class="tit text-white"> <? echo $app_lang['serv_solarium'] ?> </div>
                            <a class="boton btn_servicio" data-item="10"></a>
                        </div>
                        
                        <!-- item
                        - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
                        <div class="item">
                            <div class="icono"> 
                                <div class="con-icono">
                                    <img class="icon-anim" src="<? echo $appFrontUrl ?>/assets/img/piscina_icon.png" style="width: 100px" /> 
                                </div>
                            </div>
                            <div class="tit text-white"> <? echo $app_lang['serv_piscinas'] ?> </div>
                            <a class="boton btn_servicio" data-item="11"></a>
                        </div>
                        
                        <!-- item
                        - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
                        <div class="item">
                            <div class="icono"> 
                                <div class="con-icono">
                                    <img class="icon-anim" src="<? echo $appFrontUrl ?>/assets/img/chill_icon.png" style="width: 80px" /> 
                                </div>
                            </div>
                            <div class="tit text-white"> <? echo $app_lang['serv_chill_out'] ?> </div>
                            <a class="boton btn_servicio" data-item="12"></a>
                        </div>
                                                                                                
                    </div>
                    
                    
                </div>
                                
            </div>

        </div>
        
        

        <!-- calidades
        - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->

        <div class="row" id="calidades">
            
            <div class="content">
                
                <div class="col_100" id="sostenibilidad">

                    <h2 style="text-transform:uppercase"> <? echo $app_lang['lofts'] ?> </h2>

                    <div class="linea"></div>

                </div>

                <div class="col_100">

                    <div id="slider_lofts" class="imagen-sostenibilidad">

                        <div class="gallery">
                            <? for ($s = 1; $s <= 9; $s++) { ?>
                            <div class="gallery-cell" style="background-image: url('<? echo $appFrontUrl ?>/assets/img/lofts_slider_<? echo $s ?>.jpg')"></div>
                            <? } ?>
                        </div>  

                    </div>

                </div>

            
            </div>
        
        </div>




        <!-- prestaciones
        - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->

        <div class="row" id="prestaciones">
            
            <div class="content">
                
                <div class="col_100">
                    
                    <div class="texto colx2"> 
                                              
                        <? if ($app_code_lang == LANG::ES) { ?>
                        <div class="col_50">
                            <p>El proyecto cuenta con 25 viviendas tipo loft, de 1 o 2 dormitorios, distribuidas en planta baja, primera y segunda planta, y con orientación a la calle Perú o al interior de la manzana.</p>
                            <p>La superficie de los lofts varía entre los 100 y los 126 m2 construidos. Las plantas bajas, además, disponen de unas amplias terrazas ajardinadas. </p>
                            <p>Las viviendas disponen de grandes ventanales que proporcionan luminosidad, calidez y confort a todas las estancias. Y la distribución de cada loft se ha diseñado para conseguir el máximo aprovechamiento de los espacios. </p>
                            <p>Detalles como la potenciación de las jácenas de los techos o el tubo de ventilación aportan ese aire industrial tan característico en el interior de este tipo de viviendas.</p>
                        </div>    
                        <div class="col_50">
                            <p>Los lofts con 2 dormitorios tienen un núcleo central de 2 baños y una cocina abierta con un amplio salón comedor. Los de 1 dormitorio disponen de un amplio espacio abierto de cocina comedor y un baño completo, con bañera y ducha.</p>
                            <p>Todas las viviendas están listas para entrar a vivir. Disponen de cocina totalmente equipada, incluyendo frigorífico-combi y lavavajillas, luminarias en todas las dependencias, armarios empotrados forrados, iluminados y completamente preparados con barras, estantes y cajones, y baños completos con mueble bajo lavabo y todos los accesorios necesarios ya instalados, como toalleros, portarrollos, etc.</p>
                        </div>      
                        <? } ?>
                        
                        <? if ($app_code_lang == LANG::CAT) { ?>
                        <div class="col_50">
                            <p>El projecte compta amb 25 habitatges tipus loft, d'1 o 2 dormitoris, distribuïdes en planta baixa, primera i segona planta, i amb orientació al carrer Perú o a l'interior de la poma.</p>
                            <p>La superfície dels lofts varia entre els 100 i els 126 m² construïts. Les plantes baixes, a més, disposen d'unes àmplies terrasses enjardinades.</p>
                            <p>Els habitatges disposen de grans finestrals que proporcionen lluminositat, calidesa i confort a totes les estades. I la distribució de cada loft s'ha dissenyat per a aconseguir el màxim aprofitament dels espais.</p>
                            <p>Detalls com la potenciació de les jàsseres dels sostres o el tub de ventilació aporten aquest aire industrial tan característic a l'interior d'aquesta mena d'habitatges.</p>
                        </div>    
                        <div class="col_50">
                            <p>Els lofts amb 2 dormitoris tenen un nucli central de 2 banys i una cuina oberta amb un ampli saló menjador. Els d'1 dormitori disposen d'un ampli espai obert de cuina menjador i un bany complet, amb banyera i dutxa.</p>
                            <p>Tots els habitatges estan llestes per a entrar a viure. Disposen de cuina totalment equipada, incloent-hi frigorífic-combi i rentavaixella, lluminàries en totes les dependències, armaris de paret folrats, il·luminats i completament preparats amb barres, prestatges i calaixos, i banys complets amb moble sota lavabo i tots els accessoris necessaris ja instal·lats, com a tovallolers, porta-rotllos, etc.</p>
                        </div>      
                        <? } ?>
                        
                        <? if ($app_code_lang == LANG::EN) { ?>
                        <div class="col_50">
                            <p>The project has 25 1 or 2-bedroom loft-style apartments, distributed on the ground, first and second floors, and facing Peru Street or the interior of the block.</p>
                            <p>Their surface area ranges between 100 and 126 m2 of built-up area. The apartments on the ground floor also have large, landscaped terraces. </p>
                            <p>All apartments have large windows providing brightness, warmth, and comfort to all the rooms. The layout of each loft has been designed to make the best use of the space.</p>
                            <p>Details such as the exposed reinforced beams on the ceilings or the ventilation pipe provide that distinctive industrial feel to the interior of this type of apartments.</p>
                        </div>    
                        <div class="col_50">
                            <p>The 2-bedroom lofts have a main central core with 2 bathrooms and an open kitchen with a large living-dining area. The 1-bedroom lofts have a large open kitchen-dining area and a full bathroom with bathtub and shower.</p>
                            <p>All units are move-in ready. They have fully equipped kitchens, including fridge-freezer and dishwasher, lighting in all rooms, lined built-in closets, with lighting and equipped with bars, shelves and drawers, as well as complete bathrooms with vanity units and all the necessary accessories already installed, such as towel racks, toilet roll holders, etc.</p>
                        </div>      
                        <? } ?>
                    </div>

                </div>
                

                <div class="col_100 box">

                    <div class="col_20">
                        &nbsp;
                    </div>
                    
                    <div class="col_30">
                        <a href="<? echo $app_url['tour-360'] ?>" target="_blank" class="btn"><? echo $app_lang['ver_tour_360'] ?></a>
                    </div>
                    
                    <div class="col_30">
                        <a href="<? echo $appFrontUrl ?>/assets/pdf/memoria_calidades_esp.pdf" target="_blank" class="btn"><? echo $app_lang['descargar_memoria'] ?></a>
                    </div>
                    
                    <div class="col_20">
                        &nbsp;
                    </div>
                    

                </div>

            </div>

        </div>


        

        <!-- planos
        - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->

        <div class="row" id="planos">
            
            <div class="content">

                <div class="list-plantas">

                    <h2 class="text-white" style="text-transform:uppercase"> <? echo $app_lang['planos'] ?> </h2>
        
                    <div class="linea"></div>

                    <select name="planta" id="planta">
                        <option value="-1"><? echo $app_lang['seleccionar_planta'] ?></option>
                        <option value="0"><? echo $app_lang['planta_baja'] ?></option>       
                        <option value="1"><? echo $app_lang['planta_primera'] ?></option>    
                        <option value="2"><? echo $app_lang['planta_segunda'] ?></option>       
                      </select>

                </div>

                <div class="plantas">

                    <div class="box">

                        <h2 class="text-white" style="text-transform:uppercase"> <? echo $app_lang['planos'] ?> </h2>
        
                        <div class="linea"></div>

                        <div class="botones">
                                                    
                            <a data-item="2" class="btn btn-small btn_planta"> <? echo $app_lang['planta_segunda'] ?> </a>
                            <a data-item="1" class="btn btn-small btn_planta"> <? echo $app_lang['planta_primera'] ?> </a>
                            <a data-item="0" class="btn btn-small btn_planta"> <? echo $app_lang['planta_baja'] ?> </a>                                                        
                            <br/>
                        
                        </div>

                    </div>                                    
                                
                </div>

                <div class="imagenes">
                    

                    
                    <!-- item plano -->
                    
                    <div id="planta2" class="div_planta" style="display: none;">

                        <div class="fotos" style="position:relative">
    
                            <img id="p2" class="piso_sel piso_def" src="<? echo $appFrontUrl ?>/assets/img/planos/segunda.jpg" /> 
                            <img id="p2_e1_p1" class="piso_sel" src="<? echo $appFrontUrl ?>/assets/img/planos/P2_esc_1_p1.jpg" /> 
                            <img id="p2_e1_p2" class="piso_sel" src="<? echo $appFrontUrl ?>/assets/img/planos/P2_esc_1_p2.jpg" /> 
                            <img id="p2_e1_p3" class="piso_sel" src="<? echo $appFrontUrl ?>/assets/img/planos/P2_esc_1_p3.jpg" /> 
                            <img id="p2_e1_p4" class="piso_sel" src="<? echo $appFrontUrl ?>/assets/img/planos/P2_esc_1_p4.jpg" /> 
                            <img id="p2_e2_p1" class="piso_sel" src="<? echo $appFrontUrl ?>/assets/img/planos/P2_esc_2_p1.jpg" /> 
                            <img id="p2_e2_p2" class="piso_sel" src="<? echo $appFrontUrl ?>/assets/img/planos/P2_esc_2_p2.jpg" /> 
                            <img id="p2_e3_p1" class="piso_sel" src="<? echo $appFrontUrl ?>/assets/img/planos/P2_esc_3_p1.jpg" /> 
                            <img id="p2_e3_p2" class="piso_sel" src="<? echo $appFrontUrl ?>/assets/img/planos/P2_esc_3_p2.jpg" />
                            <img id="p2_e3_p3" class="piso_sel" src="<? echo $appFrontUrl ?>/assets/img/planos/P2_esc_3_p3.jpg" /> 
                            <img id="p2_e3_p4" class="piso_sel" src="<? echo $appFrontUrl ?>/assets/img/planos/P2_esc_3_p4.jpg" /> 
                            
                            <div class="template">
                                <table cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td><a href="<? echo $appFrontUrl ?>/assets/pdf/p2_esc1_puerta2.pdf" target="_blank"><img data-id="p2_e1_p2" class="piso" src="<? echo $appFrontUrl ?>/assets/img/plano_trans.png" /></a></td>
                                        <td><a href="<? echo $appFrontUrl ?>/assets/pdf/p2_esc1_puerta1.pdf" target="_blank"><img data-id="p2_e1_p1" class="piso" src="<? echo $appFrontUrl ?>/assets/img/plano_trans.png" /></a></td>
                                        <td><a href="<? echo $appFrontUrl ?>/assets/pdf/p2_esc2_puerta1.pdf" target="_blank"><img data-id="p2_e2_p1" class="piso" src="<? echo $appFrontUrl ?>/assets/img/plano_trans.png" /></a></td>
                                        <td><a href="<? echo $appFrontUrl ?>/assets/pdf/p2_esc3_puerta1.pdf" target="_blank"><img data-id="p2_e3_p1" class="piso" src="<? echo $appFrontUrl ?>/assets/img/plano_trans.png" /></a></td>
                                        <td><a href="<? echo $appFrontUrl ?>/assets/pdf/p2_esc3_puerta2.pdf" target="_blank"><img data-id="p2_e3_p2" class="piso" src="<? echo $appFrontUrl ?>/assets/img/plano_trans.png" /></a></td>
                                    </tr>
                                    <tr>
                                        <td><img src="<? echo $appFrontUrl ?>/assets/img/plano_trans0.png" /></td>
                                        <td><img src="<? echo $appFrontUrl ?>/assets/img/plano_trans0.png" /></td>
                                        <td><img src="<? echo $appFrontUrl ?>/assets/img/plano_trans0.png" /></td>
                                        <td><img src="<? echo $appFrontUrl ?>/assets/img/plano_trans0.png" /></td>
                                        <td><img src="<? echo $appFrontUrl ?>/assets/img/plano_trans0.png" /></td>
                                    </tr>
                                    <tr>
                                        <td><a href="<? echo $appFrontUrl ?>/assets/pdf/p2_esc1_puerta3.pdf" target="_blank"><img data-id="p2_e1_p3" class="piso" src="<? echo $appFrontUrl ?>/assets/img/plano_trans.png" /></a></td>
                                        <td><a href="<? echo $appFrontUrl ?>/assets/pdf/p2_esc1_puerta4.pdf" target="_blank"><img data-id="p2_e1_p4" class="piso" src="<? echo $appFrontUrl ?>/assets/img/plano_trans.png" /></a></td>
                                        <td><a href="<? echo $appFrontUrl ?>/assets/pdf/p2_esc2_puerta2.pdf" target="_blank"><img data-id="p2_e2_p2" class="piso" src="<? echo $appFrontUrl ?>/assets/img/plano_trans.png" /></a></td>
                                        <td><a href="<? echo $appFrontUrl ?>/assets/pdf/p2_esc3_puerta4.pdf" target="_blank"><img data-id="p2_e3_p4" class="piso" src="<? echo $appFrontUrl ?>/assets/img/plano_trans.png" /></a></td>
                                        <td><a href="<? echo $appFrontUrl ?>/assets/pdf/p2_esc3_puerta3.pdf" target="_blank"><img data-id="p2_e3_p3" class="piso" src="<? echo $appFrontUrl ?>/assets/img/plano_trans.png" /></a></td>
                                    </tr>
                                </table>
                            </div>
                                                               
                        </div>
                        
                        
    
                        
                        <div class="boton">
                            <div class="txtinfo"><? echo $app_lang['pasar_encima_imagen'] ?></div>                            
                            <a class="btn btn-small btn-planos" href="<? echo $appFrontUrl ?>/assets/pdf/planos_urban_P2.pdf" target="_blank"> <? echo $app_lang['descargar_planos'] ?> <? echo $app_lang['planta_segunda'] ?></a> 
                        </div>
                        
                    </div>


                    <!-- item plano -->
                    
                    <div id="planta1" class="div_planta" style="display: none;">

                        <div class="fotos" style="position:relative">
    
                            <img id="p1" class="piso_sel piso_def" src="<? echo $appFrontUrl ?>/assets/img/planos/primera.jpg" /> 
                            <img id="p1_e1_p1" class="piso_sel" src="<? echo $appFrontUrl ?>/assets/img/planos/P1_esc_1_p1.jpg" /> 
                            <img id="p1_e1_p2" class="piso_sel" src="<? echo $appFrontUrl ?>/assets/img/planos/P1_esc_1_p2.jpg" /> 
                            <img id="p1_e1_p3" class="piso_sel" src="<? echo $appFrontUrl ?>/assets/img/planos/P1_esc_1_p3.jpg" /> 
                            <img id="p1_e1_p4" class="piso_sel" src="<? echo $appFrontUrl ?>/assets/img/planos/P1_esc_1_p4.jpg" /> 
                            <img id="p1_e2_p1" class="piso_sel" src="<? echo $appFrontUrl ?>/assets/img/planos/P1_esc_2_p1.jpg" /> 
                            <img id="p1_e2_p2" class="piso_sel" src="<? echo $appFrontUrl ?>/assets/img/planos/P1_esc_2_p2.jpg" /> 
                            <img id="p1_e3_p1" class="piso_sel" src="<? echo $appFrontUrl ?>/assets/img/planos/P1_esc_3_p1.jpg" /> 
                            <img id="p1_e3_p2" class="piso_sel" src="<? echo $appFrontUrl ?>/assets/img/planos/P1_esc_3_p2.jpg" />
                            <img id="p1_e3_p3" class="piso_sel" src="<? echo $appFrontUrl ?>/assets/img/planos/P1_esc_3_p3.jpg" /> 
                            <img id="p1_e3_p4" class="piso_sel" src="<? echo $appFrontUrl ?>/assets/img/planos/P1_esc_3_p4.jpg" /> 
                            
                            <div class="template">
                                <table cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td><a href="<? echo $appFrontUrl ?>/assets/pdf/p1_esc1_puerta2.pdf" target="_blank"><img data-id="p1_e1_p2" class="piso" src="<? echo $appFrontUrl ?>/assets/img/plano_trans.png" /></a></td>
                                        <td><a href="<? echo $appFrontUrl ?>/assets/pdf/p1_esc1_puerta1.pdf" target="_blank"><img data-id="p1_e1_p1" class="piso" src="<? echo $appFrontUrl ?>/assets/img/plano_trans.png" /></a></td>
                                        <td><a href="<? echo $appFrontUrl ?>/assets/pdf/p1_esc2_puerta1.pdf" target="_blank"><img data-id="p1_e2_p1" class="piso" src="<? echo $appFrontUrl ?>/assets/img/plano_trans.png" /></a></td>
                                        <td><a href="<? echo $appFrontUrl ?>/assets/pdf/p1_esc3_puerta1.pdf" target="_blank"><img data-id="p1_e3_p1" class="piso" src="<? echo $appFrontUrl ?>/assets/img/plano_trans.png" /></a></td>
                                        <td><a href="<? echo $appFrontUrl ?>/assets/pdf/p1_esc3_puerta2.pdf" target="_blank"><img data-id="p1_e3_p2" class="piso" src="<? echo $appFrontUrl ?>/assets/img/plano_trans.png" /></a></td>
                                    </tr>
                                    <tr>
                                        <td><img src="<? echo $appFrontUrl ?>/assets/img/plano_trans0.png" /></td>
                                        <td><img src="<? echo $appFrontUrl ?>/assets/img/plano_trans0.png" /></td>
                                        <td><img src="<? echo $appFrontUrl ?>/assets/img/plano_trans0.png" /></td>
                                        <td><img src="<? echo $appFrontUrl ?>/assets/img/plano_trans0.png" /></td>
                                        <td><img src="<? echo $appFrontUrl ?>/assets/img/plano_trans0.png" /></td>
                                    </tr>
                                    <tr>
                                        <td><a href="<? echo $appFrontUrl ?>/assets/pdf/p1_esc1_puerta3.pdf" target="_blank"><img data-id="p1_e1_p3" class="piso" src="<? echo $appFrontUrl ?>/assets/img/plano_trans.png" /></a></td>
                                        <td><a href="<? echo $appFrontUrl ?>/assets/pdf/p1_esc1_puerta4.pdf" target="_blank"><img data-id="p1_e1_p4" class="piso" src="<? echo $appFrontUrl ?>/assets/img/plano_trans.png" /></a></td>
                                        <td><a href="<? echo $appFrontUrl ?>/assets/pdf/p1_esc2_puerta2.pdf" target="_blank"><img data-id="p1_e2_p2" class="piso" src="<? echo $appFrontUrl ?>/assets/img/plano_trans.png" /></a></td>
                                        <td><a href="<? echo $appFrontUrl ?>/assets/pdf/p1_esc3_puerta4.pdf" target="_blank"><img data-id="p1_e3_p4" class="piso" src="<? echo $appFrontUrl ?>/assets/img/plano_trans.png" /></a></td>
                                        <td><a href="<? echo $appFrontUrl ?>/assets/pdf/p1_esc3_puerta3.pdf" target="_blank"><img data-id="p1_e3_p3" class="piso" src="<? echo $appFrontUrl ?>/assets/img/plano_trans.png" /></a></td>
                                    </tr>
                                </table>
                            </div>
                            
                        </div>
                        
                        <div class="boton">
                            <div class="txtinfo"><? echo $app_lang['pasar_encima_imagen'] ?></div>
                            <a class="btn btn-small btn-planos" href="<? echo $appFrontUrl ?>/assets/pdf/planos_urban_P1.pdf" target="_blank"> <? echo $app_lang['descargar_planos'] ?> <? echo $app_lang['planta_primera'] ?> </a> 
                        </div>
                        
    
                    </div>


                    <!-- item plano -->
                    
                    <div id="planta0" class="div_planta" style="display: none;">

                        <div class="fotos" style="position:relative">
    
                            <img id="pb" class="piso_sel piso_def" src="<? echo $appFrontUrl ?>/assets/img/planos/baixa.jpg" /> 
                            <img id="pb_e1_p1" class="piso_sel" src="<? echo $appFrontUrl ?>/assets/img/planos/PB_esc_1_p1.jpg" /> 
                            <img id="pb_e1_p2" class="piso_sel" src="<? echo $appFrontUrl ?>/assets/img/planos/PB_esc_1_p2.jpg" /> 
                            <img id="pb_e2_p1" class="piso_sel" src="<? echo $appFrontUrl ?>/assets/img/planos/PB_esc_2_p1.jpg" /> 
                            <img id="pb_e3_p1" class="piso_sel" src="<? echo $appFrontUrl ?>/assets/img/planos/PB_esc_3_p1.jpg" /> 
                            <img id="pb_e3_p2" class="piso_sel" src="<? echo $appFrontUrl ?>/assets/img/planos/PB_esc_3_p2.jpg" />
                            
                            <div class="template">
                                <table cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td><a href="<? echo $appFrontUrl ?>/assets/pdf/PB_esc1_puerta2.pdf" target="_blank"><img data-id="pb_e1_p2" class="piso" src="<? echo $appFrontUrl ?>/assets/img/plano_trans_b.png" /></a></td>
                                        <td><a href="<? echo $appFrontUrl ?>/assets/pdf/PB_esc1_puerta1.pdf" target="_blank"><img data-id="pb_e1_p1" class="piso" src="<? echo $appFrontUrl ?>/assets/img/plano_trans_b.png" /></a></td>
                                        <td><a href="<? echo $appFrontUrl ?>/assets/pdf/PB_esc2_puerta1.pdf" target="_blank"><img data-id="pb_e2_p1" class="piso" src="<? echo $appFrontUrl ?>/assets/img/plano_trans_b.png" /></a></td>
                                        <td><a href="<? echo $appFrontUrl ?>/assets/pdf/PB_esc3_puerta1.pdf" target="_blank"><img data-id="pb_e3_p1" class="piso" src="<? echo $appFrontUrl ?>/assets/img/plano_trans_b.png" /></a></td>
                                        <td><a href="<? echo $appFrontUrl ?>/assets/pdf/PB_esc3_puerta2.pdf" target="_blank"><img data-id="pb_e3_p2" class="piso" src="<? echo $appFrontUrl ?>/assets/img/plano_trans_b.png" /></a></td>
                                    </tr>
                                    <tr>
                                        <td><img src="<? echo $appFrontUrl ?>/assets/img/plano_trans_b.png" /></td>
                                        <td><img src="<? echo $appFrontUrl ?>/assets/img/plano_trans_b.png" /></td>
                                        <td><img src="<? echo $appFrontUrl ?>/assets/img/plano_trans_b.png" /></td>
                                        <td><img src="<? echo $appFrontUrl ?>/assets/img/plano_trans_b.png" /></td>
                                        <td><img src="<? echo $appFrontUrl ?>/assets/img/plano_trans_b.png" /></td>
                                    </tr>                                    
                                </table>
                            </div>
                            
                        </div>
                        
                        <div class="boton">
                            <div class="txtinfo"><? echo $app_lang['pasar_encima_imagen'] ?></div>                            
                            <a class="btn btn-small btn-planos" href="<? echo $appFrontUrl ?>/assets/pdf/planos_urban_PB.pdf" target="_blank"> <? echo $app_lang['descargar_planos'] ?> <? echo $app_lang['planta_baja'] ?> </a> 
                        </div>
                        
    
                    </div>
                    
                    
                    
                    <div id="plantaseccion" class="div_planta">

                        <!--<div class="info">
                            
                        </div>-->
    
                        <div class="fotos">
    
                            <img src="<? echo $appFrontUrl ?>/assets/img/fachada_planos.jpg" />
    
                        </div>
                        
                        
                    </div>



                </div>
    
            </div>

        </div>



        <!-- video
        - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->

        <div class="row" id="video" style="background-image: url('<? echo $appFrontUrl ?>/assets/img/video_image.jpg');">
            
            <div class="btn-play"> 
                <div class="con-play">
                    <div class="ico-play">
                        <span> <? echo $app_lang['ver_video'] ?> </span>
                    </div>                    
                </div>
            </div>
            
            <div class="embed-container video_iframe">
                <iframe id="yt_video" width="560" height="315" src="https://www.youtube.com/embed/WJhZs7OK4_I?rel=0&showinfo=0&modestbranding=1&wmode=transparent" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            
        </div> 
        
        
        <div class="row" id="catalogo">
            
            <div class="content-catalogo">

                <div id="back-catalogo">
                     
                    <div class="content">
                            
                        <div class="col_100">

                            <div class="box-h2">

                                <h2 style="text-transform:uppercase"> <? echo $app_lang['catalogo'] ?> </h2>
                                <div class="linea"></div>

                            </div>

                        </div>

                        <div class="col_50">

                            <div class="texto">

                                <div class="comillas"> " </div>
                                
                                <div class="comen">
                                    <? if ($app_code_lang == LANG::ES) { ?>
                                    En <strong>Urban Lofts BCN</strong><br/>encontrarás viviendas concebidas para proporcionar la calidez y el confort de un hogar.   
                                    <? } ?>
                                    
                                    <? if ($app_code_lang == LANG::CAT) { ?>
                                    En <strong>Urban Lofts BCN</strong><br/>trobaràs habitatges concebuts per a proporcionar la calidesa i el confort d'una llar.   
                                    <? } ?>
                                    
                                    <? if ($app_code_lang == LANG::EN) { ?>
                                    En <strong>Urban Lofts BCN</strong><br/>encontrarás viviendas concebidas para proporcionar la calidez y el confort de un hogar.   
                                    <? } ?>
                                </div>

                                <div class="autor">
                                        
                                </div>

                                <div class="boton">
                                    <a class="btn btn-catalogo" href="<? echo $appContentUrl ?>/pageflip/index.html" target="_blank"> <? echo $app_lang['ver_catalogo'] ?> </a>
                                </div>

                            </div>                    

                        </div>
                    
                    </div>

                </div>
    
                
            </div>

        </div>



        <!-- contacto
        - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->

        <div class="row" id="contacto">
            
            <div class="content-contacto">

                <div class="col_100">

                    <div class="box-h2">

                        <h2 style="text-transform:uppercase"> <? echo $app_lang['contacto'] ?> </h2>
                        <div class="linea"></div>

                    </div>

                </div>

                <div class="col_100">

                    <form id="frmContacto" method="post">

                        <input type="text" name="nombre" id="nombre" class="w33 form-required" placeholder="<? echo $app_lang['nombre'] ?> *" />
                        <input type="text" name="email" id="email" class="w33 form-required form-email" placeholder="<? echo $app_lang['correo_electronico'] ?> *" />
                        <input type="text" name="empresa" id="empresa" class="w33 form-required" placeholder="<? echo $app_lang['empresa'] ?> *" />
                        <textarea name="mensaje" id="mensaje" class="w100 form-required" style="margin-top:50px" placeholder="<? echo $app_lang['mensaje'] ?> *"></textarea>
                        
                        <div class="chk">
                            <input type="checkbox" id="acepto" name="acepto" value="1">
                            <label for="acepto"><? echo $app_lang['leido_acepto'] ?> <a target="_blank" href="<? echo $app_url['aviso-legal'] ?>"><? echo $app_lang['politica_privacidad'] ?></a></label>
                        </div>
                        
                        <a class="btn" id="btn_send_contact"> <? echo $app_lang['enviar'] ?> </a>

                        <div class="msg-alerta" id="confirm_send"></div>
                        
                        <input type="hidden" id="email_check" name="email_check" value="1" />
                
                    </form>

                </div>
    
            </div>

        </div>        


        <!-- comercializa
        - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->

        <div class="row" id="comercializa">
            
            <div class="content-contacto">

                <div class="col">

                    <div class="titulo w1">
                        <div class="tit"> <? echo $app_lang['comercializa'] ?> </div>
                        <div class="linea"></div>
                    </div>

                    <div class="logo">
                        <div class="con">
                            <!--<img src="<? echo $appFrontUrl ?>/assets/img/jll_logo.png" style="width: 130px" />-->
                        </div>                    
                    </div>
                    <div class="datos w1">
                        +34 93 XXX XX XX 
                    </div>

                </div>

                <div class="col">

                    <div class="titulo w2">
                        <div class="tit"> <? echo $app_lang['promotor_delegado'] ?> </div>
                        <div class="linea"></div>
                    </div>

                    <div class="logo">
                        <div class="con">
                            <a href="http://actualadv.com" target="_blank"><img src="<? echo $appFrontUrl ?>/assets/img/actual_logo.png" style="width: 180px" /></a>
                        </div>
                    </div>
                    <div class="datos w2"> 
                        +34 93 303 03 78
                        <br/>
                        www.actualadv.com
                    </div>
                    
                </div>

            </div>

        </div>        
        
                
        <script src="<? echo $appSystemUrl ?>/js/slider/stopExecutionOnTimeout.js"></script>        
        <script src="<? echo $appSystemUrl ?>/js/slider/slider.js?id=<? echo uniqid() ?>"></script>                                 
                
                
        <script>          

            
            $(document).ready(function() {
                
                $('#slider .gallery').flickity({
                    //autoPlay: 3000
                });
                
                $('#slider_lofts .gallery').flickity({
                    //autoPlay: 3000
                });
                
                $('#header #menu-desktop li a').click(function() {

                    $('#header #menu-desktop li a').removeClass('active');
                    $(this).addClass('active');

                });
                
                $('#donde').mouseout(function() {

                    //show_mapa(0);
                    
                });

                var scroll = $(window).scrollTop();
                $('#posicion').text(scroll);

                $(window).scroll(function(event) {
                    var scroll = $(window).scrollTop();
                    $('#posicion').text(scroll);
                    
                    if (scroll>160) {

                        $('#header').css({
                            background: 'rgba(0,0,0,0.9)',
                            padding: '10px 0px'
                        });
                        
                        $('#logo img').addClass('small');

                    } else {

                        $('#header').css({
                            background: 'rgba(0,0,0,0)',
                            padding: '30px 0px'
                        });
                        
                        $('#logo img').removeClass('small');
                    }
                });
                
                $(window).resize(function() {
                    
                    lightbox_mapa_position();
                    lightbox_servicios_position();
                    lightbox_empresa_position();
                    
                    set_mapa_com_height();
                    
                });
                
                lightbox_mapa_position();
                lightbox_servicios_position();
                lightbox_empresa_position();
                
                set_mapa_com_height();
                
                /*setTimeout(function(){ 
                    $('.slide__text').css('transition','transform 0.8s 0.8s, opacity 0.8s 0.8s');
                    $('.slide__text').css('transform','translateY(-250%)');
                }, 3000);*/
                
                $('.slider-control').css('display','none');
                
                
            });

        </script>


        

