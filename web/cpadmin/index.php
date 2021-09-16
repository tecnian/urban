<?php
    include("../system/config/config.inc.php");
    include($appAdmPath."/include/include.inc.php");
    include($appAdmPath."/server/login.php");
?>
<!DOCTYPE html>
<html>
  <head>

      <? include('include/head.php'); ?>     

  </head>
  
  <body class="h-100vh login page-style1 light-mode default-sidebar">
		<div class="page">
			<div class="page-single">
				<div class="container">
					<div class="row">
						<div class="col mx-auto">
							<div class="row justify-content-center">
								<div class="col-md-7 col-lg-5">
									<div class="card card-group mb-0">
										<div class="card p-4">
											<div class="card-body">
												<div class="text-center title-style mb-6">
													<h1 class="mb-2"><img src="<? echo $appAdmUrl ?>/assets/images/brand/logo.png" class="header-brand-img desktop-lgo" alt="Covido logo"></h1>
                                                                                                        
                                                                                                        
													<hr>
													<p class="text-muted"><? echo $adm_lang['acceso_administrador'] ?></p>
												</div>
                                                                                            
                                                                                                <? if (!empty($message)) { ?>
                                                                                                <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><? echo $message ?></div>
												<? } ?>
												
                                                                                                <form action="index.php" id="formLogin" name="formLogin" method="post">
                                                                                                    <div class="input-group mb-3">
                                                                                                            <span class="input-group-addon"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 16c-2.69 0-5.77 1.28-6 2h12c-.2-.71-3.3-2-6-2z" opacity=".3"/><circle cx="12" cy="8" opacity=".3" r="2"/><path d="M12 14c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4zm-6 4c.22-.72 3.31-2 6-2 2.7 0 5.8 1.29 6 2H6zm6-6c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0-6c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2z"/></svg></span>
                                                                                                            <input type="text" id="username" name="username" class="form-control form-required" placeholder="<? echo $adm_lang['usuario'] ?>" />
                                                                                                    </div>
                                                                                                    <div class="input-group mb-4">
                                                                                                            <span class="input-group-addon"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><g fill="none"><path d="M0 0h24v24H0V0z"/><path d="M0 0h24v24H0V0z" opacity=".87"/></g><path d="M6 20h12V10H6v10zm6-7c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2z" opacity=".3"/><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM9 6c0-1.66 1.34-3 3-3s3 1.34 3 3v2H9V6zm9 14H6V10h12v10zm-6-3c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z"/></svg></span>
                                                                                                            <input type="password" id="password" name="password" class="form-control form-required" placeholder="<? echo $adm_lang['contrasena'] ?>" />
                                                                                                    </div>
                                                                                                    <div class="input-group mb-4">
                                                                                                        <label class="custom-control custom-checkbox">
                                                                                                            <input type="checkbox" class="custom-control-input" id="recordarme" name="recordarme" value="1" />
                                                                                                            <span class="custom-control-label"><? echo $adm_lang['recordarme'] ?></span>
                                                                                                        </label>                                                                                                                                                                                                    
                                                                                                    </div>
                                                                                                    <div class="row">
                                                                                                            <div class="col-12">
                                                                                                                    <button id="btn_login_entrar" type="button" class="btn btn-lg btn-primary btn-block"><i class="fe fe-arrow-right"></i> Login</button>
                                                                                                            </div>
                                                                                                            <!--<div class="col-12">
                                                                                                                    <a href="#" class="btn btn-link box-shadow-0 px-0">Forgot password?</a>
                                                                                                            </div>-->
                                                                                                            
                                                                                                    </div>
                                                                                                </form>
											</div>
										</div>
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Jquery js-->
		<script src="<? echo $appAdmUrl ?>/assets/js/vendors/jquery-3.5.1.min.js"></script>

		<!-- Bootstrap4 js-->
		<script src="<? echo $appAdmUrl ?>/assets/plugins/bootstrap/popper.min.js"></script>
		<script src="<? echo $appAdmUrl ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
                
                <!-- App -->
                <script src="<? echo $appAdmUrl ?>/js/app.global.js?id=<? echo uniqid() ?>?>" type="text/javascript"></script>
                
                
                <script>
                    $(document).ready(function() {

                        $(document).on('keypress',function(event) {
                            
                            if (event.which == 13 && check_login()) 
                            {
                                $('#btn_login_entrar').trigger('click');
                            }
                        });
                        
                        $('#btn_login_entrar').on('click',function() {
                            
                            if (check_login())
                            {
                                $('#formLogin').submit();
                            }
                            
                        });

                    });
                </script>
                
                
                
                
		

	</body>
</html>