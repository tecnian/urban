      <?
        include_once("$appSystemPath/var/class.seccion.php");           

        $_seccion = new Seccion();
        
        $sql_sec = "SELECT * FROM seccion ORDER BY orden DESC,nombre";
        
        $seccion = $_seccion->get_query($sql_sec);
        
      ?>


                                <div class="app-sidebar app-sidebar2">
					<div class="app-sidebar__logo">
						<a class="header-brand" href="<? echo $appAdmHomePage ?>">
							<img src="<? echo $appAdmUrl ?>/assets/images/brand/logo.png" class="header-brand-img desktop-lgo" alt="">
							<img src="<? echo $appAdmUrl ?>/assets/images/brand/logo.png" class="header-brand-img mobile-logo" alt="">							
						</a>
					</div>
				</div>

                                <aside class="app-sidebar app-sidebar3">
                                    
                                    <ul class="side-menu">
                                        
                                        <li class="slide treeview" id="treeview_pag">
                                            <a class="side-menu__item" href="list_pagina.php">
                                                <span class="side-menu-icon fa fa-file-o"></span>
                                                <span class="side-menu__label"><? echo $adm_lang['paginas'] ?></span><i class="angle fa fa-angle-right"></i>
                                            </a>
                                            <ul class="slide-menu treeview-menu"></ul>  
                                        </li>
                                        
                                        <li class="slide treeview" id="treeview_sli">
                                            <a class="side-menu__item" href="list_slider.php">
                                                <span class="side-menu-icon fa fa-picture-o"></span>
                                                <span class="side-menu__label"><? echo $adm_lang['sliders'] ?></span><i class="angle fa fa-angle-right"></i>
                                            </a>
                                            <ul class="slide-menu treeview-menu"></ul>  
                                        </li>
                                        
                                        <li class="slide treeview" id="treeview_con">
                                            <a class="side-menu__item" href="list_contacto_web.php">
                                                <span class="side-menu-icon fa fa-envelope-o"></span>
                                                <span class="side-menu__label"><? echo $adm_lang['contactos'] ?></span><i class="angle fa fa-angle-right"></i>
                                            </a>	
                                            <ul class="slide-menu treeview-menu"></ul>  
                                        </li>
                                        
                                        <li class="slide treeview" id="treeview_usu">
                                            <a class="side-menu__item" href="list_usuario.php">
                                                <span class="side-menu-icon fa fa-user"></span>
                                                <span class="side-menu__label"><? echo $adm_lang['usuarios_registrados'] ?></span><i class="angle fa fa-angle-right"></i>
                                            </a>
                                            <ul class="slide-menu treeview-menu"></ul>  
                                        </li>
                                        
                                        <? for ($m = 0; $m < count($seccion); $m++) { ?>
                                        <li class="slide treeview" id="treeview_sec<? echo $seccion[$m]['id'] ?>">
                                            <a class="side-menu__item" href="list_catalogo.php?type=<? echo $seccion[$m]['id'] ?>">
                                                <?
                                                $icono = 'fa-table';
                                                if (!empty($seccion[$m]['icono']))  $icono = $seccion[$m]['icono'];
                                                ?>
                                                <span class="side-menu-icon fa <? echo $icono ?>"></span>
                                                <span class="side-menu__label"><? echo $seccion[$m]['nombre'] ?></span><i class="angle fa fa-angle-right"></i>
                                            </a>	
                                            <ul class="slide-menu treeview-menu"></ul>  
                                        </li>
                                        <? } ?>
                                        
                                        <? if ($user_profile != OPT::PROFILE_USER) { ?>
                                        <li class="slide treeview" id="treeview_adm">
                                            <a class="side-menu__item" href="list_admin.php">
                                                <span class="side-menu-icon fa fa-key"></span>
                                                <span class="side-menu__label"><? echo $adm_lang['administradores'] ?></span><i class="angle fa fa-angle-right"></i>
                                            </a>	
                                            <ul class="slide-menu treeview-menu"></ul>                                                                                                
                                        </li>
                                        <? } ?>
                                        
                                        <li class="slide treeview" id="treeview_cat">
                                            <a class="side-menu__item" data-toggle="slide" href="#">
                                                <span class="side-menu-icon fa fa-table"></span>
                                                <span class="side-menu__label"><? echo $adm_lang['categorias'] ?></span><i class="angle fa fa-angle-right"></i>
                                            </a>
						<ul class="slide-menu treeview-menu">
                                                    <? foreach ($options_categoria as $key => $value) { ?>
                                                    <li class="treemenu_<? echo $key ?>"><a href="list_categoria.php?type=<? echo $key ?>" class="slide-item"><? echo $value ?></a></li>
                                                    <? } ?>                                                    
						</ul>
                                        </li>
                                        
                                        <? if ($user_profile != OPT::PROFILE_USER) { ?>
                                        <li class="slide treeview" id="treeview_cnf">
                                            <a class="side-menu__item" data-toggle="slide" href="#">
                                                <span class="side-menu-icon fa fa-gear"></span>
                                                <span class="side-menu__label"><? echo $adm_lang['configuracion'] ?></span><i class="angle fa fa-angle-right"></i>
                                            </a>
						<ul class="slide-menu treeview-menu">
                                                    <li class="treemenu_1"><a href="list_idioma.php" class="slide-item"><? echo $adm_lang['idiomas'] ?></a></li>
                                                    <li class="treemenu_2"><a href="list_pais_web.php" class="slide-item"><? echo $adm_lang['paises'] ?></a></li>
                                                    <li class="treemenu_3"><a href="list_perfil_web.php" class="slide-item"><? echo $adm_lang['perfiles_web'] ?></a></li>
                                                    <li class="treemenu_4"><a href="list_seccion.php" class="slide-item"><? echo $adm_lang['secciones'] ?></a></li>
						</ul>
                                        </li>
                                        <? } ?>
                                        
                                        
                                        
                                        
                                        
                                        <!--  ******  MOD::FORMS ******** -->
                                        
                                        <!--
                                        <li class="slide treeview" id="treeview_frm">
                                            <a class="side-menu__item" data-toggle="slide" href="#">
                                                <span class="side-menu-icon fa fa-list"></span>
                                                <span class="side-menu__label"><? echo $adm_lang['formularios'] ?></span><i class="angle fa fa-angle-right"></i>
                                            </a>
						<ul class="slide-menu treeview-menu">
                                                    <li class="treemenu_1"><a href="forms_list_forms.php?type=<? echo $key ?>" class="slide-item"><? echo $value ?></a></li>
						</ul>
                                        </li>
                                        -->
                                        
                                        
                                        <!--  ******  MOD::SHOP ******** -->
                                        <!--                                                  
                                        <li class="slide treeview" id="treeview_ped">
                                            <a class="side-menu__item" href="shop_list_pedido.php">
                                                <span class="side-menu-icon fa fa-shopping-cart"></span>
                                                <span class="side-menu__label"><? echo $adm_lang['pedidos'] ?></span><i class="angle fa fa-angle-right"></i>
                                            </a>
                                            <ul class="slide-menu treeview-menu"></ul>  
                                        </li>

                                        <li class="slide treeview" id="treeview_pre">
                                            <a class="side-menu__item" href="shop_list_presupuesto.php">
                                                <span class="side-menu-icon fa fa-edit"></span>
                                                <span class="side-menu__label"><? echo $adm_lang['presupuestos'] ?></span><i class="angle fa fa-angle-right"></i>
                                            </a>
                                            <ul class="slide-menu treeview-menu"></ul>  
                                        </li>

                                        <li class="slide treeview" id="treeview_fac">
                                            <a class="side-menu__item" href="shop_list_factura.php">
                                                <span class="side-menu-icon fa fa-euro"></span>
                                                <span class="side-menu__label"><? echo $adm_lang['facturas'] ?></span><i class="angle fa fa-angle-right"></i>
                                            </a>
                                            <ul class="slide-menu treeview-menu"></ul>  
                                        </li>

                                        <li class="slide treeview" id="treeview_pro">
                                            <a class="side-menu__item" href="shop_list_producto.php">
                                                <span class="side-menu-icon fa fa-tags"></span>
                                                <span class="side-menu__label"><? echo $adm_lang['productos'] ?></span><i class="angle fa fa-angle-right"></i>
                                            </a>
                                            <ul class="slide-menu treeview-menu"></ul>  
                                        </li>

                                        <li class="slide treeview" id="treeview_cat">
                                            <a class="side-menu__item" href="list_categoria.php?type=<? echo CAT::FAMILIA ?>">
                                                <span class="side-menu-icon fa fa-table"></span>
                                                <span class="side-menu__label"><? echo $adm_lang['categorias_producto'] ?></span><i class="angle fa fa-angle-right"></i>
                                            </a>
                                            <ul class="slide-menu treeview-menu"></ul>  
                                        </li>

                                        <li class="slide treeview" id="treeview_shp">
                                            <a class="side-menu__item" href="shop_form_config_tienda.php">
                                                <span class="side-menu-icon fa fa-gear"></span>
                                                <span class="side-menu__label"><? echo $adm_lang['configuracion_tienda'] ?></span><i class="angle fa fa-angle-right"></i>
                                            </a>
                                            <ul class="slide-menu treeview-menu"></ul>  
                                        </li>
                                        -->                       
            
            
            
                                                                           
                                                
                                    </ul>

                                </aside>







            
            
            
            
           