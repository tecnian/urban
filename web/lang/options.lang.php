<?php
	$opt_lang = array();
        
        $opt_code_lang = '';
        
        if (isset($_SESSION['APP_CODE_LANG']))
        {
            $opt_code_lang = $_SESSION['APP_CODE_LANG'];            
        }
        elseif (isset($_SESSION['ADM_CODE_LANG']))
        {
            $opt_code_lang = $_SESSION['ADM_CODE_LANG'];            
        }
        
        switch ($opt_code_lang)
        {        
            
            case 'en':
                
                //opciones
                
                $opt_lang['abril'] = "April";
                $opt_lang['aceptado'] = "Accepted";
                $opt_lang['activos'] = "Actives";
                $opt_lang['administrador'] = "Administrator";
                $opt_lang['agosto'] = "August";
                $opt_lang['botones_opcion'] = "Radio buttons";
                $opt_lang['carrusel_imagenes'] = "Image carousel";
                $opt_lang['categorias_producto'] = "Product Categories";
                $opt_lang['checkbox'] = "Checkbox";
                $opt_lang['diciembre'] = "December";
                $opt_lang['empresa'] = "Company";
                $opt_lang['en_preparacion'] = "In preparation";
                $opt_lang['encuestas'] = "Surveys";
                $opt_lang['enero'] = "January";
                $opt_lang['enlace_externo'] = "External link";
                $opt_lang['enlace_interno'] = "Internal link";
                $opt_lang['enviado'] = "Sent";
                $opt_lang['febrero'] = "February";
                $opt_lang['fichero'] = "File";
                $opt_lang['imagen'] = "Image";
                $opt_lang['inactivos'] = "Inactives";
                $opt_lang['julio'] = "July";
                $opt_lang['junio'] = "June";
                $opt_lang['link'] = "Link";
                $opt_lang['marzo'] = "March";
                $opt_lang['mayo'] = "May";
                $opt_lang['no'] = "No";
                $opt_lang['noviembre'] = "November";
                $opt_lang['numero'] = "Number";
                $opt_lang['octubre'] = "October";
                $opt_lang['particular'] = "Individual";
                $opt_lang['pendiente'] = "Pending";
                $opt_lang['pendiente_pago'] = "Outstanding";
                $opt_lang['selector_opciones'] = "Select option";
                $opt_lang['septiembre'] = "September";
                $opt_lang['si'] = "Yes";
                $opt_lang['si_no'] = "Yes/No";
                $opt_lang['sin_finalizar'] = "Unfinished";
                $opt_lang['slider'] = "Slider";
                $opt_lang['subtitulo'] = "Subtitle";
                $opt_lang['texto_corto'] = "Short description text";
                $opt_lang['texto_html'] = "Description text (html editor)";
                $opt_lang['texto_imagen'] = "Paragraph text with image";
                $opt_lang['texto_linea'] = "Text (1 line)";
                $opt_lang['texto_multilinea'] = "Text (multiline)";
                $opt_lang['titulo'] = "Title";
                $opt_lang['todos'] = "All";
                $opt_lang['usuario'] = "User";
                $opt_lang['video'] = "Video";
                
                
                //DataTables
                
                $opt_lang['dt_buscar'] = "Search";
                $opt_lang['dt_mostrando'] = "Showing _START_ to _END_ of _TOTAL_ entries";
                $opt_lang['dt_registros'] = "_MENU_ records per page";
                $opt_lang['dt_no_datos'] = "No matching records found";
                $opt_lang['dt_cargando'] = "Loading...";
                $opt_lang['dt_siguiente'] = "Next";
                $opt_lang['dt_anterior'] = "Previous";
                
                
                //mensajes
                
                $opt_lang['msg_datos_anadidos'] = "The data has been added";
                $opt_lang['msg_datos_modificados'] = "The data has been modified";
                $opt_lang['msg_registros_eliminados'] = "Selected records have been deleted";
                $opt_lang['msg_fichero_eliminado'] = "The file has been deleted";
                $opt_lang['msg_datos_actualizados'] = "The data has been updated";                
                $opt_lang['msg_superadmin_reservado'] = 'The username "superadmin" is reserved and cannot be used';
                $opt_lang['msg_no_elementos_seleccionados'] = "No items selected";
                $opt_lang['msg_tamano_maximo_fichero'] = "The maximum file size must be";
                $opt_lang['msg_desea_eliminar_elemento'] = "Do you want to delete this item?";
                $opt_lang['msg_desea_eliminar_registros'] = "Do you want to delete the selected records?";
                $opt_lang['msg_desea_eliminar_fichero'] = "Do you want to delete the file?";
                $opt_lang['msg_desea_eliminar_documento'] = "Do you want to delete the document?";
                $opt_lang['msg_desea_exportar_listado'] = "Do you want to export the list?";
                                
                $opt_lang['msg_fichero_cargado_ok'] = "The file has been loaded correctly";
                $opt_lang['msg_fichero_formato_ko'] = "The image file is not in the correct format";
                $opt_lang['msg_fichero_supera_tamano_max'] = "The size of the file exceeds the maximum size allowed";
                $opt_lang['msg_error_subir_fichero'] = "An error occurred while uploading the file to the server";
                $opt_lang['msg_error_eliminar_fichero'] = "An error occurred while trying to delete the file";
                
                $opt_lang['msg_password_cambiada_ok'] = "The password has been changed correctly";
                $opt_lang['msg_password_actual_ko'] = "The current password is incorrect";
                $opt_lang['msg_password_enviada'] = "A new password has been sent to your email";
                
                $opt_lang['msg_login_error'] = "User data is incorrect";
                
                $opt_lang['msg_email_error'] = "An error has occurred on the mail server. Contact the administrator.";
                $opt_lang['msg_email_no_existe'] = "The email does not exist in our database";
                

                break;
            
                        
            case 'es':
            default:
                
                //opciones
                
                $opt_lang['abril'] = "Abril";
                $opt_lang['aceptado'] = "Aceptado";
                $opt_lang['activos'] = "Activos";
                $opt_lang['administrador'] = "Administrador";
                $opt_lang['agosto'] = "Agosto";
                $opt_lang['botones_opcion'] = "Botones opción";
                $opt_lang['carrusel_imagenes'] = "Carrusel de imágenes";
                $opt_lang['categorias_producto'] = "Categorías Producto";
                $opt_lang['checkbox'] = "Casilla verificación";
                $opt_lang['diciembre'] = "Diciembre";
                $opt_lang['empresa'] = "Empresa";
                $opt_lang['en_preparacion'] = "En preparación";
                $opt_lang['encuestas'] = "Encuestas";
                $opt_lang['enero'] = "Enero";
                $opt_lang['enlace_externo'] = "Enlace externo";
                $opt_lang['enlace_interno'] = "Enlace interno";
                $opt_lang['enviado'] = "Enviado";
                $opt_lang['febrero'] = "Febrero";
                $opt_lang['fichero'] = "Fichero";
                $opt_lang['imagen'] = "Imagen";
                $opt_lang['inactivos'] = "Inactivos";
                $opt_lang['julio'] = "Julio";
                $opt_lang['junio'] = "Junio";
                $opt_lang['link'] = "Link";
                $opt_lang['marzo'] = "Marzo";
                $opt_lang['mayo'] = "Mayo";
                $opt_lang['no'] = "No";
                $opt_lang['noviembre'] = "Noviembre";
                $opt_lang['numero'] = "Número";
                $opt_lang['octubre'] = "Octubre";
                $opt_lang['particular'] = "Particular";
                $opt_lang['pendiente'] = "Pendiente";
                $opt_lang['pendiente_pago'] = "Pendiente de pago";
                $opt_lang['selector_opciones'] = "Selector opciones";
                $opt_lang['septiembre'] = "Septiembre";
                $opt_lang['si'] = "Si";
                $opt_lang['si_no'] = "Si/No";
                $opt_lang['sin_finalizar'] = "Sin finalizar";
                $opt_lang['slider'] = "Slider";
                $opt_lang['subtitulo'] = "Subtítulo";
                $opt_lang['texto_corto'] = "Texto descripción corta";
                $opt_lang['texto_html'] = "Texto descripción (editor html)";
                $opt_lang['texto_imagen'] = "Texto párrafo con imagen";
                $opt_lang['texto_linea'] = "Texto (1 línea)";
                $opt_lang['texto_multilinea'] = "Texto (multilínea)";
                $opt_lang['titulo'] = "Título";
                $opt_lang['todos'] = "Todos";
                $opt_lang['usuario'] = "Usuario";
                $opt_lang['video'] = "Vídeo";
                
                
                //DataTables
                
                $opt_lang['dt_buscar'] = "Buscar";
                $opt_lang['dt_mostrando'] = "Mostrando del _START_ al _END_ de _TOTAL_ registros";
                $opt_lang['dt_registros'] = "_MENU_ registros por página";
                $opt_lang['dt_no_datos'] = "No se han encontrado datos";
                $opt_lang['dt_cargando'] = "Cargando...";
                $opt_lang['dt_siguiente'] = "Siguiente";
                $opt_lang['dt_anterior'] = "Anterior";
                
                
                //mensajes
                
                $opt_lang['msg_datos_anadidos'] = "Los datos han sido añadidos";
                $opt_lang['msg_datos_modificados'] = "Los datos han sido modificados";
                $opt_lang['msg_registros_eliminados'] = "Los registros seleccionados han sido eliminados";
                $opt_lang['msg_fichero_eliminado'] = "El fichero ha sido eliminado";
                $opt_lang['msg_datos_actualizados'] = "Los datos han sido actualizados";                
                $opt_lang['msg_superadmin_reservado'] = 'El nombre de usuario "superadmin" está reservado y no se puede utilizar';
                $opt_lang['msg_no_elementos_seleccionados'] = "No hay elementos seleccionados";
                $opt_lang['msg_tamano_maximo_fichero'] = "El tamaño máximo del fichero debe ser de";
                $opt_lang['msg_desea_eliminar_elemento'] = "¿Desea eliminar este elemento?";
                $opt_lang['msg_desea_eliminar_registros'] = "¿Desea eliminar los registros seleccionados?";
                $opt_lang['msg_desea_eliminar_fichero'] = "¿Desea eliminar el fichero?";
                $opt_lang['msg_desea_eliminar_documento'] = "¿Desea eliminar el documento?";
                $opt_lang['msg_desea_exportar_listado'] = "¿Desea exportar el listado?";
                                
                $opt_lang['msg_fichero_cargado_ok'] = "El fichero ha sido cargado correctamente";
                $opt_lang['msg_fichero_formato_ko'] = "El fichero imagen no tiene el formato correcto";
                $opt_lang['msg_fichero_supera_tamano_max'] = "El tama&ntilde;o del fichero supera el tama&ntilde;o m&aacute;ximo permitido";
                $opt_lang['msg_error_subir_fichero'] = "Ha ocurrido un error al subir el fichero al servidor";
                $opt_lang['msg_error_eliminar_fichero'] = "Ha ocurrido un error al intentar eliminar el fichero";
                
                $opt_lang['msg_password_cambiada_ok'] = "La contrase&ntilde;a ha sido cambiada correctamente";
                $opt_lang['msg_password_actual_ko'] = "La contrase&ntilde;a actual es incorrecta";
                $opt_lang['msg_password_enviada'] = "Una nueva contrase&ntilde;a ha sido enviada a tu correo electr&oacute;nico";
                
                $opt_lang['msg_login_error'] = "Los datos de usuario son incorrectos";
                
                $opt_lang['msg_email_error'] = "Ha ocurrido un error en el servidor de correo. Contacte con el administrador.";
                $opt_lang['msg_email_no_existe'] = "El email no existe en nuestra base de datos";
                

                break;
            
        }
        
        
        $_SESSION['OPT_LANG'] = $opt_lang;
        
?>